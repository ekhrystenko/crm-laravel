<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Client;
use App\Models\Company;
use App\Resources\Api\V1\ClientCompaniesResource;
use App\Resources\Api\V1\ClientsResource;
use App\Resources\Api\V1\CompaniesResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class GeneralApiController
 * @package App\Http\Controllers\Api\V1
 */
class GeneralApiController
{
    /**
     * @return JsonResponse|ResourceCollection
     */
    public function getCompanies(): JsonResponse|ResourceCollection
    {
        $companies = Company::with('clients')->paginate(10);

        if ($companies->isEmpty()) {
            return response()->json(['message' => 'Companies not found'], 404);
        }
        return CompaniesResource::collection($companies);
    }

    /**
     * @param Company $company
     * @return JsonResponse|ResourceCollection
     */
    public function getClients(Company $company): JsonResponse|ResourceCollection
    {
        if (!$company) {
            return response()->json(['message' => 'Company not found'], 404);
        }

        $clients = $company->clients()->paginate(10);

        return ClientsResource::collection($clients);
    }

    /**
     * @param $client
     * @return JsonResponse|ResourceCollection
     */
    public function getClientCompanies(Client $client): JsonResponse|ResourceCollection
    {
        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $companies = $client->companies;

        return ClientCompaniesResource::collection($companies);
    }
}