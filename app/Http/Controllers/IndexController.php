<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Attributes;
use App\Models\ProductAttributes;
use App\Models\Products;

class IndexController extends Controller {

    public function index() {
	return view('index/index');
    }
}
