<?php

namespace App\Livewire;

use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Payment extends Component
{
	public $productSlug;
	



	public function mount($product_slug, $result = null)
	{
		$this->productSlug = $product_slug;

	}


	public function render()
	{

		$product = Product::where('slug', $this->productSlug)->firstOrFail();
		
		$client = new Client();

		try {
			$response = $client->post('https://api.mercadopago.com/checkout/preferences', [
				'headers' => [
					'Authorization' => 'Bearer ' . env('MERCADO_PAGO_ACCESS_TOKEN'),
					'Content-Type' => 'application/json'
				],
				'json' => [
					"items" => [
						[
							"id" => $product->id,
							"title" => $product->title,
							"description" => $product->description,
							"picture_url" => Storage::url($product->photo),
							"category_id" => "home",
							"quantity" => 1,
							"currency_id" => "BRL",
							"unit_price" => $product->price
						]
					],
					"notification_url" => env('MERCADO_PAGO_NOTIFY_URL'),
					"back_urls" => [
						"success" => env('APP_URL') . '/payment-callback/success/' . $product->slug,
						"failure" => env('APP_URL') . '/payment-callback/failure/' . $product->slug,
						"pending" => env('APP_URL') . '/payment-callback/pending/' . $product->slug
					]
				]
			]);

			$responseBody = json_decode($response->getBody()->getContents(), true);
			$initPoint = $responseBody['init_point'];
		} catch (RequestException $e) {
			echo "Request error: " . $e->getMessage();
		}


		$product->mercado_pago_url = $initPoint;
		$product->paid = 1;
		$product->save();


		return view('livewire.payment', [
			'product' => $product
		]);
	}


}