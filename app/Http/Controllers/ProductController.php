<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends _GenericController
{
    public function __construct() {
        parent::__construct('Product');
    }
    
    public function saveProduct(Request $request) {
        return true;
    }
}
