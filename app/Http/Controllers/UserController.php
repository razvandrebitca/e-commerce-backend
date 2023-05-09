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
    public function update_user(Request $request)
    {
        User::where('id', $request->id)->update($request->all());
        return User::find($request->id);
    }
    public function update_user_password(Request $request)
    {
        if ($request->password != '') {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return $user;
        }
    }
}
