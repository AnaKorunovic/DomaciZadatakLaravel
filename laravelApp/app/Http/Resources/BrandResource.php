<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap='brand';//menja ime objekta u postmanu
    public function toArray($request)
    {
        return [

            'id'=>$this->resource->id,
           'name'=>$this->resource->name,
           'slug'=>$this->resource->slug,
           'category'=>$this->resource->category
            

        ];
    }
}
