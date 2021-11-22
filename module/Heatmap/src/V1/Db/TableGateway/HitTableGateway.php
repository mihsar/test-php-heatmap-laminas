<?php

declare(strict_types=1);

namespace Heatmap\V1\Db\TableGateway;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSetInterface;
use Laminas\Db\Sql\Expression as SqlExpr;
use Laminas\Db\Sql\Having;
use Laminas\Db\Sql\Predicate\Expression;
use Laminas\Db\Sql\Sql;
use Laminas\Db\TableGateway\TableGateway;

class HitTableGateway extends TableGateway
{
    const TYPE_LINK = 'link';
    const TYPE_LINK_TYPE = 'link_type';

    protected $table = 'hits';

    public function __construct(
        AdapterInterface $adapter,
        $features = null,
        ?ResultSetInterface $resultSetPrototype = null,
        ?Sql $sql = null
    ) {
        // will use table `hits`
        $table = 'hits';

        parent::__construct($table, $adapter, $features, $resultSetPrototype, $sql);
    }

    public function getSelectHitsCountGroupBy($type = self::TYPE_LINK)
    {
        $select = $this->sql->select();
        $select->columns([
            $type,
            'hits_count' => new SqlExpr('COUNT(*)')
        ]);
        $select->group($type);

        return $select;
    }

    public function getSelectCustomerJourney($customerId)
    {
        $select = $this->sql->select();
        $select->columns(['link'])
            ->where(['id_customer' => $customerId])
            ->order('accessed_at');

        return $select;
    }

    public function getSelectCustomerSameJourneyAs($customerId)
    {
        $tbl = $this->table;
        $adapter = $this->getAdapter()->getPlatform();

        $select = $this->sql->select();
        $select->columns(['id_customer']);

        // creating sub-query to count distinct links of given customer, to be used later in having cond
        $countSelect = $this->sql->select();
        $countSelect->columns([new SqlExpr('COUNT(DISTINCT link)')])
            ->where(['id_customer' => $customerId]);

        $select
            ->join(['h2' => $tbl], new Expression('h2.link = ' . $tbl . '.link'), [])
            ->where(['h2.id_customer' => $customerId])
            ->group($tbl . '.id_customer')
            ->having(function (Having $having) use ($tbl, $countSelect, $adapter) {
                $having->equalTo(
                    new Expression('COUNT(DISTINCT ' . $tbl . '.link)'),
                    new Expression('(' . $countSelect->getSqlString($adapter) . ')')
                );
            });

        return $select;
    }
}
