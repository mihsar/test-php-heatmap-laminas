<?php

declare(strict_types=1);

namespace Heatmap\V1\Rest\Hit;

class HitEntity
{
    /** @var string */
    public $id;

    /** @var string */
    public $id_customer;

    /** @var string */
    public $link;

    /** @var string */
    public $link_type;

    /** @var int */
    public $timestamp;
}
