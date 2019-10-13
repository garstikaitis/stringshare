<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BandResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo,
            'manager' => $this->manager,
            'genres' => $this->genres()->pluck('name')
        ];
    }
}
