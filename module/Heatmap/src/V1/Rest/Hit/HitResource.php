<?php

declare(strict_types=1);

namespace Heatmap\V1\Rest\Hit;

use Laminas\ApiTools\DbConnectedResource;
use Laminas\Db\TableGateway\TableGatewayInterface as TableGateway;

class HitResource extends DbConnectedResource
{
    public function __construct(TableGateway $table, $identifierName, $collectionClass)
    {
//        die(__METHOD__);
        parent::__construct($table, $identifierName, $collectionClass);
    }

    public function getCustomData()
    {
    }
}
