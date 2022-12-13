<?php

// TODO: need to check helper function exists or not

// create helper function for response builder success
if (!function_exists('success')) {
    /**
     * @param mixed $data
     * @param int $code
     * @param string $message
     * @param array $headers
     * @param int $options
     * @return \Illuminate\Http\JsonResponse
     */
    function success($data = null, int $code = 200, string $message = '', array $headers = [], int $options = 0): \Illuminate\Http\JsonResponse
    {
        return \Taxionus\ResponseBuilder\ResponseBuilder::success($data, $code, $message, $headers, $options);
    }
}



// create helper function for response builder error
if (!function_exists('error')) {
    /**
     * @param int $code
     * @param string $message
     * @param array $headers
     * @param int $options
     * @return \Illuminate\Http\JsonResponse
     */
    function error(int $code = 500, string $message = '', array $headers = [], int $options = 0): \Illuminate\Http\JsonResponse
    {
        return \Taxionus\ResponseBuilder\ResponseBuilder::error($code, $message, $headers, $options);
    }
}


// create helper function for response builder unauthorized
if (!function_exists('unauthorized')) {
    /**
     * @param string $message
     * @param array $headers
     * @param int $options
     * @return \Illuminate\Http\JsonResponse
     */
    function unauthorized(string $message = '', array $headers = [], int $options = 0): \Illuminate\Http\JsonResponse
    {
        // return \Taxionus\ResponseBuilder\ResponseBuilder::unauthorized($message, $headers, $options);
    }
}


