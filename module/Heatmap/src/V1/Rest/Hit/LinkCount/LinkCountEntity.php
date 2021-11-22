<?php

declare(strict_types=1);

namespace Heatmap\V1\Rest\Hit\LinkCount;

use ArrayObject;

class LinkCountEntity extends ArrayObject
{
    /** @var string */
    public $link;

    /** @var int */
    public $hits_count;
}
