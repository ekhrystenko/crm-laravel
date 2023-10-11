<?php

namespace App\Http\Controllers\Api\V1\Swagger;

/**
 *  @OA\Info(
 *     title="API Docs",
 *     version="1.0"
 *  ),
 *
 *  @OA\PathItem(
 *     path="/api/v1"
 * ),
 *
 * @OA\SecurityScheme(
 *     type="http",
 *     securityScheme="bearerAuth",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * ),
 *
 * @OA\Get(
 *     tags={"Client Company"},
 *     path="/api/v1/companies",
 *     summary="Отримати список компаній з клієнтами",
 *
 *     security={
 *         {"bearerAuth": {}}
 *     },
 *
 *     @OA\RequestBody(),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(
 *             property="data", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example="1"),
 *                     @OA\Property(property="name", type="string", example="Some Name"),
 *                     @OA\Property(property="email", type="string", example="some@email.com"),
 *                     @OA\Property(property="foundation_year", type="date", example="11.10.1996"),
 *                     @OA\Property(property="clients_count", type="integer", example="23"),
 *                     @OA\Property(
 *                         property="clients", type="array",
 *                         @OA\Items(
 *                             @OA\Property(property="id", type="integer", example="1"),
 *                             @OA\Property(property="name", type="string", example="Some Name"),
 *                             @OA\Property(property="surname", type="string", example="Some Surname"),
 *                             @OA\Property(property="email", type="string", example="some@email.com"),
 *
 *                         ),
 *                     ),
 *                 ),
 *             ),
 *         ),
 *     ),
 * ),
 *
 * @OA\Get(
 *     tags={"Client Company"},
 *     path="/api/v1/clients/{company}",
 *     summary="Отримати список клієнтів компанії",
 *
 *     security={
 *         {"bearerAuth": {}}
 *     },
 *
 *     @OA\Parameter(
 *         description="Company ID",
 *         in="path",
 *         name="company",
 *         required=true,
 *         example=1,
 *     ),
 *
 *     @OA\RequestBody(),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(
 *             property="data", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example="1"),
 *                     @OA\Property(property="name", type="string", example="Some Name"),
 *                     @OA\Property(property="surname", type="string", example="Some Surname"),
 *                     @OA\Property(property="email", type="string", example="some@email.com"),
 *                 ),
 *             ),
 *         ),
 *     ),
 * ),
 *
 * @OA\Get(
 *     tags={"Client Company"},
 *     path="/api/v1/companies/{client}",
 *     summary="Оримати список компаній, пов'язаних з клієнтом",
 *
 *     security={
 *         {"bearerAuth": {}}
 *     },
 *
 *     @OA\Parameter(
 *         description="Client ID",
 *         in="path",
 *         name="client",
 *         required=true,
 *         example=1,
 *     ),
 *
 *     @OA\RequestBody(),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(
 *             property="data", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="id", type="integer", example="1"),
 *                     @OA\Property(property="name", type="string", example="Some Name"),
 *                     @OA\Property(property="email", type="string", example="some@email.com"),
 *                     @OA\Property(property="foundation_year", type="date", example="11.10.1996"),
 *                 ),
 *             ),
 *         ),
 *     ),
 * ),
 *
 */
class GeneralApiController
{}