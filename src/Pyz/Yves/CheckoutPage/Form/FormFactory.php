<?php

namespace Pyz\Yves\CheckoutPage\Form;

use Pyz\Yves\CheckoutPage\Form\Steps\OrderDetailsForm;
use Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface;
use SprykerShop\Yves\CheckoutPage\Form\FormFactory as SprykerShopFormFactory;

class FormFactory extends SprykerShopFormFactory
{
    /**
     * @return FormCollectionHandlerInterface
     */
    public function createOrderDetailsFormCollection(): FormCollectionHandlerInterface
    {
        return $this->createFormCollection($this->getOrderDetailsFormTypes());
    }

    /**
     * @return string[]
     */
    private function getOrderDetailsFormTypes(): array
    {
        return [
            $this->getOrderDetailsFormT(),
        ];
    }

    /**
     * @return string
     */
    private function getOrderDetailsFormT(): string
    {
        return OrderDetailsForm::class;
    }
}
