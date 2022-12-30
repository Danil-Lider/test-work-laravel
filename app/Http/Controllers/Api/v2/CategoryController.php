<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
       	
        parent::__construct();
        $this->model_name = 'App\Models\Category';
    }


   
}
