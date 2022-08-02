<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Attributes;
use App\Models\ProductAttributes;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller {

    public function __construct() {
	$this->middleware('VerifyAuthToken');
    }

    public function products($sid = null, $id = null) {
	$rez = new \stdClass();
	if ($id != null) {
	    $rez = DB::table('products')
		    ->select('id', 'name', 'description')
		    ->where('id', $id)
		    ->first();
	    $attributes = DB::table('product_attributes')
		    ->select('attribute_val', 'attribute_name')
		    ->join('attributes', 'product_attributes.attribute_id', '=', 'attributes.id')
		    ->where('product_attributes.product_id', $id)
		    ->get();
	    foreach ($attributes as $item) {
		$product_attributes[$item->attribute_name] = $item->attribute_val;
	    }
	    if ($rez)
		$rez->product_attributes = $product_attributes;
	} else {
	    $rez = DB::table('products')->get();
	}

	return response()->json($rez);
    }

    public function attributes($sid = null) {
	$rez = DB::table('attributes')->get();
	return response()->json($rez);
    }

    public function productedit(Request $request, $sid = null) {
	$rez = new \stdClass();
	$req = $request->only('data');
	$error = 0;
	$upd = 0;
	if ($req) {

	    $data = json_decode($req['data']);

	    $product = Products::where('id', $data->id)->first();
	    if ($product) {
		$product->name = $data->name;
		$product->description = $data->description;
		if (!$product->save())
		    $error = 1;
	    }
	    if ($data->id === 0) {
		$product = new Products;
		$product->name = $data->name;
		$product->description = $data->description;
		if (!$product->save())
		    $error = 1;
	    }
	    if ($product) {
		ProductAttributes::where('product_id', $product->id)->delete();

		foreach ($data->product_attributes as $key => $item) {
		    $attributes = Attributes::where('attribute_name', $key)
			    ->firstOr(function () use ($key) {
			$d = new Attributes;
			$d->attribute_name = $key;
			$d->save();
			return $d;
		    });

		    $product_attributes = new ProductAttributes;
		    $product_attributes->attribute_id = $attributes->id;
		    $product_attributes->product_id = $product->id;
		    $product_attributes->attribute_val = $item;
		    if (!$product_attributes->save())
			$error = 1;
		    else
			$upd = 1;
		}
	    }

	    if ($error == 1) {
		return response()->json([
			    'status' => false,
			    'message' => 'DB error',
				], 500);
		exit;
	    } else {
		if ($upd == 1) {
		    return response()->json([
				'status' => true,
				'message' => 'Product updated',
				    ], 201);
		    exit;
		} else {
		    return response()->json([
				'status' => true,
				'message' => 'Nothing to update',
				    ], 200);
		    exit;
		}
	    }
	}
	return response()->json([
		    'status' => false,
		    'message' => 'No data',
			], 406);
	exit;
    }

    public function attributeedit(Request $request, $sid = null) {
	$rez = new \stdClass();
	$req = $request->only('data');
	$error = 0;
	$upd = 0;
	if ($req) {
	    $data = json_decode($req['data']);

	    $attributes = Attributes::where('id', $data->id)->first();
	    if ($attributes) {
		$attributes->attribute_name = $data->attribute_name;
		if (!$attributes->save())
		    $error = 1;
		else
		    $upd = 1;
	    }
	    if ($data->id === 0) {
		$attributes = new Attributes;
		$attributes->attribute_name = $data->attribute_name;
		if (!$attributes->save())
		    $error = 1;
		else
		    $upd = 1;
	    }

	    if ($error == 1) {
		return response()->json([
			    'status' => false,
			    'message' => 'DB error',
				], 500);
		exit;
	    } else {
		if ($upd == 1) {
		    return response()->json([
				'status' => true,
				'message' => 'Attribute updated',
				    ], 201);
		    exit;
		} else {
		    return response()->json([
				'status' => true,
				'message' => 'Nothing to update',
				    ], 200);
		    exit;
		}
	    }
	}
	return response()->json([
		    'status' => false,
		    'message' => 'No data',
			], 406);
	exit;
    }

    public function productdelete($sid = null, $id = null) {
	$error = 0;
	if ($id > 0) {
	    $product = Products::where('id', $id)->first();
	    if ($product && !$product->delete())
		$error = 1;
	    $product_attributes = ProductAttributes::where('product_id', $id);
	    if ($product_attributes && !$product_attributes->delete())
		$error = 1;

	    if ($error == 1) {
		return response()->json([
			    'status' => false,
			    'message' => 'DB error',
				], 500);
		exit;
	    } else {
		return response()->json([
			    'status' => true,
			    'message' => 'Product deleted',
				], 200);
	    }
	}
    }

    public function attributedelete($sid = null, $id = null) {
	$error = 0;
	if ($id > 0) {
	    $attribute = Attributes::where('id', $id)->first();

	    if ($attribute && !$attribute->delete())
		$error = 1;
	    $product_attributes = ProductAttributes::where('attribute_id', $id);
	    if ($product_attributes && !$product_attributes->delete())
		$error = 1;

	    if ($error == 1) {
		return response()->json([
			    'status' => false,
			    'message' => 'DB error',
				], 500);
		exit;
	    } else {
		return response()->json([
			    'status' => true,
			    'message' => 'Attribute deleted',
				], 200);
		exit;
	    }
	}
    }

}
