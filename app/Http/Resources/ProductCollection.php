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
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet',
            'href' => [
               'link' => route('products.show',$this->id)
            ]
        ];
    }
}