<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    public function product_details(string $id)
    {
        $product = Product::find($id);
        return view('user.productdetails', compact('product'));
    }
}
