<?php

namespace App\Http\Controllers;

use App\CPU\Helpers;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function generate($seller_id, $seller_name, $product_slug)
    {
        $dropship = Seller::with('shop')->find($seller_id);
        $shop = $dropship->shop;
        $data['title'] = 'Toko '.$shop->name;
        $data['product'] = Product::where('slug', $product_slug)->first();
        if ($dropship) {
            $direct = [
                'phone' => '62'.(int) $dropship->phone,
                'product' => $data['product']['name'],
                'price' => $data['product']['dropship'],
                'link' => URL::to('/product/'.$data['product']['slug']),
            ];

            $data['direct_wa'] = Helpers::directWa($direct);
        } else {
            $data['direct_wa'] = '';
        }

        // dd($seller_id, $seller_name, $product_slug);
        return view('generated', $data);
    }
}
