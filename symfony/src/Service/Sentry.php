<?php

namespace App\Service;

class Sentry
{
    public function getTracesSampler(): callable
    {
        return function(\Sentry\Tracing\SamplingContext $context): float {
            // return a number between 0 and 1
            return 1.0;
        };
    }
}