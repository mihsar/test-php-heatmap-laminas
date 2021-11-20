<?php

declare(strict_types=1);

namespace Heatmap\V1\Db\TableGateway;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSetInterface;
use Laminas\Db\Sql\Sql;
use Laminas\Db\TableGateway\TableGateway;

class HitTableGateway extends TableGateway
{
    protected $table = 'hits';

    public function __construct(
        AdapterInterface $adapter,
        $features = null,
        ?ResultSetInterface $resultSetPrototype = null,
        ?Sql $sql = null
    ) {
        // will use table `hits`
        $table = 'hits';

//        die(__METHOD__);

        parent::__construct($table, $adapter, $features, $resultSetPrototype, $sql);
    }
}