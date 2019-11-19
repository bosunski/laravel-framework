<?php

namespace Illuminate\Routing;

use Generator;
use React\Promise\PromiseInterface;

class LaravelRouter extends Router
{
    public static function toResponse($request, $response)
    {
        if ($response instanceof Generator) {
            return $response;
        }

        if ($response instanceof PromiseInterface) {
            return $response->then(function ($response) use ($request) {
                return static::toResponse($request, $response);
            });
        }

        return parent::toResponse($request, $response);
    }
}
