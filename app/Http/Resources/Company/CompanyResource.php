<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid'     => $this->uuid,
            'name'     => $this->name,
            'category' => new CategoryResource($this->category_id),
            'phone'    => $this->phone,
            'whatsapp' => $this->whatsapp,
            'email'    => $this->email,
            'instagram'=> $this->instagram,

        ];
    }
}
