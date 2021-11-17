<?php

declare(strict_types=1);

namespace Heatmap\V1\Rest\Hit;

class HitResourceFactory
{
    public function __invoke($services)
    {
        return new HitResource($services->get(\Heatmap\V1\Rest\Mapper::class));
    }
}
