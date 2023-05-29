<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
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
    public function delete_review($id)
    {
        $review = Review::find($id);
        $review->delete();
        return response(200);
    }
    
    public function update_review(Request $request)
    {
        $review = Review::find($request->id);
        $review->update([
            "product_id"=>$request->product_id,
            "user_id"=>$request->user_id,
            "review"=>$request->review,
            "star"=>$request->star
        ]);
    }
    
}
