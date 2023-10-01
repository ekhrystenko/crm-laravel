<?php

namespace App\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ClientCompaniesResource
 * @package App\Resources\Api\V1
 */
class ClientCompaniesResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'foundation_year' => $this->foundation_year->format('d.m.Y'),
        ];
    }
}
