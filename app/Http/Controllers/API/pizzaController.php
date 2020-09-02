<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\pizza;

class pizzaController extends Controller
{
    public function getpaginate()
    {
        return pizza::paginate(12);
    }

    public function getcategory($category)
    {
        return pizza::where('categoryName',$category)->paginate(12);
    }
}
