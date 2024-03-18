<?php

namespace Pyz\Zed\Sales\Business\OrderWriter;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Generated\Shared\Transfer\SpySalesOrderEntityTransfer;
use Spryker\Zed\Kernel\Persistence\EntityManager\TransactionTrait;
use Spryker\Zed\Sales\Business\OrderWriter\SalesOrderWriter as SprykerSalesOrderWriter;

class SalesOrderWriter extends SprykerSalesOrderWriter
{
    use TransactionTrait;

    public function saveOrder(QuoteTransfer $quoteTransfer, SaveOrderTransfer $saveOrderTransfer): void
    {
        parent::saveOrder($quoteTransfer, $saveOrderTransfer);
    }

    protected function hydrateSalesOrderEntityTransfer(QuoteTransfer $quoteTransfer, SpySalesOrderEntityTransfer $salesOrderEntityTransfer): SpySalesOrderEntityTransfer
    {
        $salesOrderEntityTransfer->setOrderName($quoteTransfer->getOrderName());
        return parent::hydrateSalesOrderEntityTransfer($quoteTransfer, $salesOrderEntityTransfer);
    }
}