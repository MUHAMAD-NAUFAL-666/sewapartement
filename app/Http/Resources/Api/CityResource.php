<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'photo'=> $this->photo,
            'officeSpaces_count'=> $this-> officeSpaces_count,
            'officeSpaces' => OfficeSpaceResource::collection($this->whenLoaded('officeSpaces')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
