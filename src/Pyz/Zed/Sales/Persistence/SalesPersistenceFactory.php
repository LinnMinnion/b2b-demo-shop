<?php

namespace Pyz\Zed\Sales\Persistence;

use Orm\Zed\Sales\Persistence\PyzOrderDetailsQuery;
use Pyz\Zed\Sales\Persistence\Propel\Mapper\OrderDetailsMapper;
use Pyz\Zed\Sales\SalesConfig;
use Pyz\Zed\Sales\Persistence\Propel\QueryBuilder\OrderSearchFilterFieldQueryBuilder;
use Spryker\Zed\Sales\Persistence\Propel\QueryBuilder\OrderSearchFilterFieldQueryBuilderInterface;
use Spryker\Zed\Sales\Persistence\SalesEntityManagerInterface;
use Spryker\Zed\Sales\Persistence\SalesPersistenceFactory as SprykerSalesPersistenceFactory;
use Spryker\Zed\Sales\Persistence\SalesQueryContainerInterface;
use Spryker\Zed\Sales\Persistence\SalesRepositoryInterface;

/**
 * @method SalesConfig getConfig()
 * @method SalesQueryContainerInterface getQueryContainer()
 * @method SalesEntityManagerInterface getEntityManager()
 * @method SalesRepositoryInterface getRepository()
 */
class SalesPersistenceFactory extends SprykerSalesPersistenceFactory
{
    /**
     * @return \Spryker\Zed\Sales\Persistence\Propel\QueryBuilder\OrderSearchFilterFieldQueryBuilderInterface
     */
    public function createOrderSearchFilterFieldQueryBuilder(): OrderSearchFilterFieldQueryBuilderInterface
    {
        return new OrderSearchFilterFieldQueryBuilder();
    }
}
