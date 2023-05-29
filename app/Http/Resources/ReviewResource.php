<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'product_id'=>$this->product_id,
            'review' => $this->review,
            'star' => $this->star,
       ];
    }
}