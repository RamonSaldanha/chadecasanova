<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class Webhook extends Controller
{
	public function __invoke(Request $request)
	{

		$client = new Client();

		try {
			$response = $client->request('GET', 'https://api.mercadopago.com/v1/payments/' . $request->input('data.id'), [
				'headers' => [
					'Authorization' => 'Bearer ' . env('MERCADO_PAGO_ACCESS_TOKEN'),
				],
				'timeout' => 30,
			]);

			
			$body = $response->getBody();
			$json = json_decode($body, true);

			$product = Product::find($json['additional_info']['items'][0]['id']);
			$product->paid = ($json['status'] == 'approved') ? 1 : 2;

			$file = fopen('payment.json', 'w');
						
			fwrite($file, $json);
			// fwrite($file, json_encode(
			// 	[
			// 		'product_id' => $json['additional_info']['items'][0]['id'],
			// 		'status' => $json['status'],
			// 	]
			// ));

			fclose($file);
			
		} catch (RequestException $e) {
			echo "Guzzle Error: " . $e->getMessage();
		}

		return response()->json([
			'success' => true
		], 200);
	}
}
