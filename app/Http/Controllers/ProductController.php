<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{   

    public function __construct()
    {
        // $this->middleware('auth:api')->except('index','show');
    }

   
    public function index()
    {
       
        return ProductCollection::collection(Product::paginate(5));
    }
    
    public function store(Request $request)
    {
       $product = Product::create($request->all());

       return response([

         'data' => $product

       ],Response::HTTP_CREATED);

    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
    
    public function update(Request $request, Product $product)
    {   

        $product->update($request->all());

       return response([

         'data' =>$product

       ],Response::HTTP_CREATED);

    }
   
    public function destroy(Product $product)
    {
        $product->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }

     public function userAuthorize($product)
    {
        if(Auth::user()->id != $product->user_id){
            //throw your exception text here;
            
        }
    }
}
