<?php

namespace Pyz\Zed\Sales\Persistence\Propel\QueryBuilder;

use Generated\Shared\Transfer\FilterFieldTransfer;
use Orm\Zed\Sales\Persistence\Map\SpySalesOrderItemTableMap;
use Orm\Zed\Sales\Persistence\Map\SpySalesOrderTableMap;
use Orm\Zed\Sales\Persistence\SpySalesOrderQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Sales\Persistence\Propel\QueryBuilder\OrderSearchFilterFieldQueryBuilder as SprykerOrderSearchFilterFieldQueryBuilder;
class OrderSearchFilterFieldQueryBuilder extends SprykerOrderSearchFilterFieldQueryBuilder
{
    /**
     * @uses \Spryker\Shared\Sales\SalesConfig::ORDER_SEARCH_TYPES
     *
     * @var string
     */
    protected const SEARCH_TYPE_ORDER_NAME = 'orderName';

    /**
     * @var array<string, string>
     */
    protected const ORDER_SEARCH_TYPE_MAPPING = [
        self::SEARCH_TYPE_ORDER_REFERENCE => SpySalesOrderTableMap::COL_ORDER_REFERENCE,
        self::SEARCH_TYPE_ORDER_NAME => SpySalesOrderTableMap::COL_ORDER_NAME,
        self::SEARCH_TYPE_ITEM_NAME => SpySalesOrderItemTableMap::COL_NAME,
        self::SEARCH_TYPE_ITEM_SKU => SpySalesOrderItemTableMap::COL_SKU,
    ];

    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderQuery $salesOrderQuery
     * @param \Generated\Shared\Transfer\FilterFieldTransfer $filterFieldTransfer
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderQuery
     */
    protected function addSearchTypeFilter(
        SpySalesOrderQuery $salesOrderQuery,
        FilterFieldTransfer $filterFieldTransfer
    ): SpySalesOrderQuery {
        $searchType = $filterFieldTransfer->getType();
        $searchValue = $filterFieldTransfer->getValue();

        if ($searchType === static::SEARCH_TYPE_ITEM_NAME || $searchType === static::SEARCH_TYPE_ITEM_SKU || $searchType === static::SEARCH_TYPE_ORDER_NAME) {
            $salesOrderQuery->leftJoinItem();
        }

        if ($searchType !== static::SEARCH_TYPE_ALL && in_array($searchType, $this->getMappedSearchTypes())) {
            $salesOrderQuery->add(
                static::ORDER_SEARCH_TYPE_MAPPING[$searchType],
                $this->generateLikePattern($searchValue),
                Criteria::LIKE,
            );

            return $salesOrderQuery;
        }

        return $this->addAllSearchTypeFilter($salesOrderQuery, $filterFieldTransfer);
    }
}
