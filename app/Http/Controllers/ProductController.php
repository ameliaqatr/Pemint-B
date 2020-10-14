<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::all();
		return response()->json([
			'message' => 'Menampilkan semua produk',
			'data' => $products
		], 200);
	}

	public function show($id)
	{
		$product = Product::find($id);
		if($product){
			return response()->json([
				'message' => 'Produk berhasil ditemukan',
				'data' => $product
			], 200);
		} else {
			return response()->json([
				'message' => 'Produk tidak ditemukan'
			], 404);
		}
	}
}
