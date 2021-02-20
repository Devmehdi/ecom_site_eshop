<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'price'=>$this->price,
            'name'=>$this->productname,
            'image'=>$this->productimage,
            'description'=>$this->description,
            'color'=>$this->color,
            'size'=>$this->size,
            'qte'=>$this->productQte
          ];
        return parent::toArray($request);
    }
}
