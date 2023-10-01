<?php

namespace App\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CompaniesResource
 * @package App\Resources\Api
 */
class CompaniesResource extends JsonResource
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
            'clients_count' => $this->clients->count(),
            'clients' => ClientsResource::collection($this->clients),
        ];
    }
}
