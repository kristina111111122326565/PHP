<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function add(Request $req)
	{
		$validator = Validator::make($req->all(), [
			"pr_name" => "required",
			"number" => "required",
			"pr_price" => "required",
		]);
		if($validator->fails()) 
		{
			return response()->json(
				[
					"message" => $validator->errors(),
				]);
		}
			
		Product::create($req->all());
		return response()->json("product add");
	}

	public function renewal(Request $renewal){

		$validator = Validator::make($renewal->all(), [
			"pr_name" => "required",
		]);

		$Produrt = Produrt::where("pr_name", $renewal->pr_name)->first();

		if ($product) 
		{
			$new_number = Validator::make($renewal->all(),
			[
				"number" => "required",
			]);
			$product->number = $new_number->number;
			$product->save();
			return response()->json(
					[
						"number" => $product->number, 
					]
				);
		}

		return response()->json("Товар не существует");
	}

	public function delete(Request $del){

	       $validator=Validator::make($del->all(),[
	           "pr_name"=>"required",
	       ]);

	       $product=Product::where("pr_name",$del->pr_name)->first();
	       
	       if($product){
	           $product -> delete();
	           $product -> save();
	       }
	       return response()->json("Вы успешно удалили товар");	
	
}


