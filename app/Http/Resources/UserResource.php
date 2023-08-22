<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "full_name"=> $this->full_name,
            "front_image"=> $this->front_image,
            "back_image"=>$this->back_image,
            "personal_image"=> $this->personal_image,
            "mobile"=> $this->mobile,
            "birth_date"=> $this->birth_date,
            "country"=> $this->country,
            "bank_account"=> $this->bank_account,
            "bank_name"=>$this->bank_name,
            "gender"=>$this->gender,
            "email"=> $this->email,
            "amount" => $this->fund->amount ,
            "container" => $this->container ,
            "totalProfit" => (float)collect($this->container)->sum('profit'),
        ];
    }
}
