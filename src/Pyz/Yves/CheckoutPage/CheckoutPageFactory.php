<?php

namespace Pyz\Yves\CheckoutPage;

use Pyz\Yves\CheckoutPage\Form\FormFactory;
use Pyz\Yves\CheckoutPage\Process\StepFactory;
use SprykerShop\Yves\CheckoutPage\CheckoutPageFactory as SprykerShopCheckoutPageFactory;
class CheckoutPageFactory extends SprykerShopCheckoutPageFactory
{
    /**
     * @return StepFactory
     */
    public function createStepFactory(): StepFactory
    {
        return new StepFactory();
    }

    /**
     * @return FormFactory
     */
    public function createCheckoutFormFactory(): FormFactory
    {
        return new FormFactory();
    }
}
