<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

	public function store(Request $request)
	{
		$product = Product::create([
			'name' => $request->name,
			'price' => $request->price,
			'rating' => $request->rating,
			'quantity' => $request->quantity
		]);
		if($product){
			return response()->json([
				'message' => 'Produk berhasil disimpan',
				'data' => $product
			], 200);
		} else {
			return response()->json([
				'message' => 'Produk gagal ditemukan'
			], 404);
		}
	}

	public function destroy($id)
	{
		$product = Product::find($id);
		if($product){
			$product->delete();
			return response()->json([
				'message' => 'Produk berhasil dihapus',
				'data' => $product
			], 200);
		} else {
			return response()->json([
				'message' => 'Produk gagal dihapus'
			], 404);
		}
	}

		public function update(Request $request, $id)
		{
			$product = Product::whereid($id)->update([
				'name' => $request->name,
				'price' => $request->price,
				'rating' => $request->rating,
				'quantity' => $request->quantity
			]);
			if($product){
				return response()->json([
					'message' => 'Produk berhasil diupdate',
					'data' => $id
				], 200);
			} else {
				return response()->json([
					'message' => 'Produk gagal diupdate'
				], 404);
			}
		}
}
