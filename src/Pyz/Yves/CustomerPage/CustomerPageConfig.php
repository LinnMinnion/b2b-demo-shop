<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CustomerPage;

use SprykerShop\Yves\CustomerPage\CustomerPageConfig as SprykerCustomerPageConfig;

class CustomerPageConfig extends SprykerCustomerPageConfig
{
    protected const IS_ORDER_HISTORY_SEARCH_ENABLED = true;

    /**
     * @uses \Pyz\Zed\Customer\CustomerConfig::MIN_LENGTH_CUSTOMER_PASSWORD
     */
    protected const MIN_LENGTH_CUSTOMER_PASSWORD = 8;

    /**
     * @uses \Pyz\Zed\Customer\CustomerConfig::MAX_LENGTH_CUSTOMER_PASSWORD
     */
    protected const MAX_LENGTH_CUSTOMER_PASSWORD = 64;

    /**
     * {@inheritDoc}
     *
     * @return bool
     */
    public function isDoubleOptInEnabled(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @deprecated Will be removed without replacement. In the future the locale-specific URL will be used.
     *
     * @return bool
     */
    public function isLocaleInLoginCheckPath(): bool
    {
        return true;
    }
}
