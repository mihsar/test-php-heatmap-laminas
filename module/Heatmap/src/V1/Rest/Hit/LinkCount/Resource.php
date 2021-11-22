<?php

declare(strict_types=1);

namespace Heatmap\V1\Rest\Hit\LinkCount;

use Heatmap\V1\Db\TableGateway\HitTableGateway;
use Laminas\ApiTools\DbConnectedResource;
use Laminas\Paginator\Adapter\DbSelect;
use Laminas\Paginator\Paginator;

class Resource extends DbConnectedResource
{
    /** @var HitTableGateway */
    protected $table;

    /**
     * Fetch a paginated set of resources.
     *
     * @param array|object $data Ignored.
     * @return Paginator
     */
    public function fetchAll($data = [])
    {
        $start = $this->getEvent()->getRouteParam('start');
        $end = $this->getEvent()->getRouteParam('end', date(DATE_ATOM));

        $select = $this->table->getSelectHitsCountGroupBy($this->table::TYPE_LINK);
        if ($start) {
            $select->where->between('accessed_at', $start, $end);
        }

        $sql = $this->table->getSql();
        $resultSetPrototype = $this->table->getResultSetPrototype();
        $adapter = new DbSelect($select, $sql, $resultSetPrototype);
        return new $this->collectionClass($adapter);
    }
}
