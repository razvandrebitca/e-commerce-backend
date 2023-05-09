<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource {

    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name' => $this->name,
            'totalPrice' => round((1-($this->discount/100)) * $this->price,2),
            'discount' => $this->discount,
            'stock'=>$this->stock,
            'description'=>$this->detail,
            'image_1'=>$this->image_1,
            'image_2'=>$this->image_2,
            'image_3'=>$this->image_3,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet',
            'href' => [
               'link' => route('products.show',$this->id)
            ]
        ];
    }
}