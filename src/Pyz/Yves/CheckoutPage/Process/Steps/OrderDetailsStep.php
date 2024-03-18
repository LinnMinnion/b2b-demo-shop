<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithBreadcrumbInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\AbstractBaseStep;
use Symfony\Component\HttpFoundation\Request;

class OrderDetailsStep extends AbstractBaseStep implements StepWithBreadcrumbInterface
{
    /**
     * @param $stepRoute
     * @param $escapeRoute
     */
    public function __construct($stepRoute, $escapeRoute)
    {
        parent::__construct($stepRoute, $escapeRoute);
    }

    /**
     * @inheritDoc
     */
    public function requireInput(AbstractTransfer $quoteTransfer): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function postCondition(AbstractTransfer $quoteTransfer): bool
    {
        $input = $quoteTransfer->getOrderName();

        $pattern = '/^[a-z0-9]+$/';

        if (preg_match($pattern, $input)) {
            return $quoteTransfer->getOrderName() !== null;
        } else {
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function getBreadcrumbItemTitle(): string
    {
        return 'checkout.step.order_details.title';
    }

    /**
     * @inheritDoc
     */
    public function isBreadcrumbItemEnabled(QuoteTransfer|AbstractTransfer $quoteTransfer): bool
    {
        return $this->postCondition($quoteTransfer);
    }

    /**
     * @inheritDoc
     */
    public function isBreadcrumbItemHidden(AbstractTransfer $quoteTransfer): bool
    {
        return !$this->requireInput($quoteTransfer);
    }
}
