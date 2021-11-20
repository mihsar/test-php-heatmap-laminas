<?php

declare(strict_types=1);

namespace Heatmap\V1\Rest\Hit;

use ArrayObject;

class HitEntity extends ArrayObject
{
    /** @var string */
    public $id;

    /** @var int */
    public $id_customer;

    /** @var string */
    public $link;

    /** @var string */
    public $link_type;

    /** @var string */
    public $accessed_at;
}
