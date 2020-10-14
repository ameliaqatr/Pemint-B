<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::all();
		return $products;
	}

	public function show($id)
	{
		$product = Product::find($id);
		if($product){
			return $product;
		} else {
			return response()->json([
				'message' => 'Produk tidak tersedia'
			], 404);
		}
	}
}
