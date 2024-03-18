<?php

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\Sales\Business\OrderWriter\SalesOrderWriter;
use Spryker\Zed\Sales\Business\OrderWriter\SalesOrderWriterInterface;
use Spryker\Zed\Sales\Business\SalesBusinessFactory as SprykerSalesBusinessFactory;

class SalesBusinessFactory extends SprykerSalesBusinessFactory
{
    /**
     * @return \Spryker\Zed\Sales\Business\OrderWriter\SalesOrderWriterInterface
     */
    public function createSalesOrderWriter(): SalesOrderWriterInterface
    {
        return new SalesOrderWriter(
            $this->getCountryFacade(),
            $this->getStoreFacade(),
            $this->createReferenceGenerator(),
            $this->getConfig(),
            $this->getLocaleFacade(),
            $this->getOrderExpanderPreSavePlugins(),
            $this->getOrderPostSavePlugins(),
            $this->getEntityManager(),
        );
    }
}
