<?php

declare(strict_types=1);

namespace Heatmap\V1\Rest\Hit\LinkTypeCount;

use ArrayObject;

class LinkTypeCountEntity extends ArrayObject
{
    /** @var string */
    public $link_type;

    /** @var int */
    public $hits_count;
}
