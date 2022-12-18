<?php

use Taxionus\ResponseBuilder\ResponseBuilder;

/*
    * @param $data
    * @param null $msg
    * @param int $http_code
    * @return \Illuminate\Http\JsonResponse
    */

if (!function_exists('respond')) {
    function respond($data, $msg = null, $http_code = 200)
    {
        return ResponseBuilder::asSuccess($http_code)->withData($data["data"] ?? $data)->withMessage($data['message'] ?? $msg)->build();
    }
}

/**
 * @param $data
 * @param null $msg
 * @param int $http_code
 * @return \Illuminate\Http\JsonResponse
 */

if (!function_exists('respondWithMessage')) {
    function respondWithMessage($data, $msg = null, $http_code = 200)
    {
        return ResponseBuilder::asSuccess()->withMessage($msg["message"] ?? $msg)->build();
    }
}

/**
 * @param null $msg
 * @param int $api_code
 * @return \Illuminate\Http\JsonResponse
 */

if (!function_exists('respondWithError')) {
    function respondWithError(
        $msg = null,
        $api_code = 500
    ) {
        return ResponseBuilder::asError($api_code)->withMessage($msg['message'] ?? $msg)->withHttpCode($api_code)->build();
    }
}

/**
 * @param $api_code
 * @param array $data
 * @param null $msg
 * @param null $http_code
 * @return \Illuminate\Http\JsonResponse
 */

if (!function_exists('respondWithDataError')) {
    function respondWithDataError($api_code, $data = [], $msg = null, $http_code = null)
    {
        return ResponseBuilder::asError($api_code)->withData($data)->withMessage($data['message'] ?? $msg)->withHttpCode($http_code)->build();
    }
}

/**
 * @param null $msg
 * @param int $api_code
 * @return \Illuminate\Http\JsonResponse
 */
if (!function_exists('respondWithDataError')) {

    function respondBadRequest($msg, $api_code = 400)
    {
        return respondWithError($msg ??  trans("builder.http_400"), $api_code);
    }
}


/**
 * @param null $msg
 * @param int $api_code
 * @return \Illuminate\Http\JsonResponse
 */
if (!function_exists('respondUnAuthorizedRequest')) {
    function respondUnAuthorizedRequest($msg = [], $api_code = 401)
    {
        return respondWithError(trans('builder.http_401'), $api_code);
    }
}
