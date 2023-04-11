<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
class UserController extends Controller
{
    public function products($id)
    {  
        return ProductCollection::collection(User::find($id)->products);
    }
}
