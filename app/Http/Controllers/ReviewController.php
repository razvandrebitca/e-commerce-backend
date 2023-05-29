<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        $reviews = $product->reviews;
        foreach ($reviews as $review) {
            $review->user = User::find($review->user_id);
        }
        return $reviews;
    }

    public function store(Request $request)
    {
        $review = new Review($request->all());
        $product = Product::find($request->product_id);
        $product->reviews()->save($review);

        return response([
            'data' => new ReviewResource($review)
        ], Response::HTTP_CREATED);
    }

    // public function update(Request $request)
    // {
    //     $review = Review::find($request->id);
    //     $review->update([
    //         "product_id"=>$request->product_id,
    //         "user_id"=>$request->user_id,
    //         "review"=>$request->review,
    //         "star"=>$request->star
    //     ]);
    // }

    // public function destroy(Request $request)
    // {
    //     $review = Review::find($$request->id);
    //     $review->delete();
    //     return response(null,Response::HTTP_NO_CONTENT);
    // }
}
