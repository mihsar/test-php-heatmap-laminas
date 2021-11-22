<?php

declare(strict_types=1);

namespace Heatmap\V1\Rest\Hit\CustomerSameJourney;

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
        return $this->createCustomerSameJourneyCollection($data);
    }

    private function createCustomerSameJourneyCollection($data = [])
    {
        $customerId = $this->getEvent()->getRouteParam('customer_id');

        $select = $this->table->getSelectCustomerSameJourneyAs($customerId);

        $sql = $this->table->getSql();
        $resultSetPrototype = $this->table->getResultSetPrototype();
        $adapter = new DbSelect($select, $sql, $resultSetPrototype);
        return new $this->collectionClass($adapter);
    }
}
