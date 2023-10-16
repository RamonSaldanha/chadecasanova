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
		
		dd($product);

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
					"auto_return" => "all",
					"back_urls" => [
						"success" => env('APP_URL') . '/payment-callback/success/' . $product->slug,
						"failure" => env('APP_URL') . '/payment-callback/failure/' . $product->slug,
						"pending" => env('APP_URL') . '/payment-callback/pending/' . $product->slug
					]
				]
			]);

			$responseBody = json_decode($response->getBody()->getContents(), true);

			$file = fopen('payment.json', 'w');
			fwrite($file, json_encode($responseBody));
			fclose($file);

			$initPoint = $responseBody['init_point'];
		} catch (RequestException $e) {
			echo "Request error: " . $e->getMessage();
		}


		$product->mercado_pago_url = $initPoint;
		$product->paid = 1;
		$product->available = 0;
		$product->save();


		return view('livewire.payment', [
			'product' => $product
		]);
	}


}
