<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request = null)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'active' => $this->active,
            'facebook_id' => $this->facebook_id,
            'google_id' => $this->google_id,
            'role' => $this->getRoleNames()->first()
        ];
    }
}
