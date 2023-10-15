<?php

namespace App\Livewire;

use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Livewire\Component;

class Payment extends Component
{
    public $productSlug;

    public function mount($product_slug)
    {
        $this->productSlug = $product_slug;
    }
    public function render()
    {
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
                            "title" => "Dummy Title",
                            "description" => "Dummy description",
                            "picture_url" => "http://www.myapp.com/myimage.jpg",
                            "category_id" => "car_electronics",
                            "quantity" => 1,
                            "currency_id" => "BRL",
                            "unit_price" => 10
                        ]
                    ],
                    "payer" => [
                        "phone" => new \stdClass(),
                        "identification" => new \stdClass(),
                        "address" => new \stdClass()
                    ],
                    "payment_methods" => [
                        "excluded_payment_methods" => [new \stdClass()],
                        "excluded_payment_types" => [new \stdClass()]
                    ],
                    "shipments" => [
                        "free_methods" => [new \stdClass()],
                        "receiver_address" => new \stdClass()
                    ],
                    "back_urls" => new \stdClass(),
                    "differential_pricing" => new \stdClass(),
                    "metadata" => new \stdClass()
                ]
            ]);
        
            $responseBody = json_decode($response->getBody()->getContents(), true);
            $initPoint = $responseBody['init_point'];
        
        } catch (RequestException $e) {
            echo "Request error: " . $e->getMessage();
        }


        $product = Product::where('slug', $this->productSlug)->firstOrFail();
        $product->mercado_pago_url = $initPoint;
        $product->paid = 1;
        $product->save();


        return view('livewire.payment', [
            'product' => $product
        ]);
    }
}
