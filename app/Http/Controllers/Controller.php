<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function generate($seller_id, $seller_name, $product_slug)
    {
        $shop = Shop::where('seller_id', $seller_id)->first();
        $data['title'] = 'Toko '.$shop->name;
        $data['product'] = Product::where('slug', $product_slug)->first();

        // dd($seller_id, $seller_name, $product_slug);
        return view('generated', $data);
    }
}
