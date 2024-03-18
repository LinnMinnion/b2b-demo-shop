<?php

namespace Pyz\Yves\CheckoutPage\Process;

use Pyz\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderDetailsStep;
use SprykerShop\Yves\CheckoutPage\Process\Steps\PlaceOrderStep;
use Spryker\Yves\StepEngine\Process\StepCollection;
use Spryker\Yves\StepEngine\Process\StepCollectionInterface;
use SprykerShop\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin as CheckoutPageRouteProviderPluginAlias;
use SprykerShop\Yves\CheckoutPage\Process\StepFactory as SprykerShopStepFactory;
class StepFactory extends SprykerShopStepFactory
{
    /**
     * @return StepCollectionInterface
     */
    public function createStepCollection()
    {
        return new StepCollection(
            $this->getRouter(),
            CheckoutPageRouteProviderPlugin::ROUTE_NAME_CHECKOUT_ERROR,
        );
    }

    /**
     * @return array<\Spryker\Yves\StepEngine\Dependency\Step\StepInterface>
     */
    public function getSteps(): array
    {
        $steps = parent::getSteps();

        array_splice($steps, array_search($this->createAddressStep(), $steps), 0, [$this->createOrderDetailsStep()]);

        return $steps;
    }

    /**
     * @return OrderDetailsStep
     */
    private function createOrderDetailsStep(): OrderDetailsStep
    {
        return new OrderDetailsStep(
            CheckoutPageRouteProviderPlugin::ROUTE_NAME_CHECKOUT_ORDER_DETAILS,
            $this->getConfig()->getEscapeRoute(),
        );
    }

    /**
     * @return PlaceOrderStep
     */
    public function createPlaceOrderStep(): PlaceOrderStep
    {
        return new PlaceOrderStep(
            $this->getCheckoutClient(),
            $this->getFlashMessenger(),
            $this->getLocaleClient()->getCurrentLocale(),
            $this->getGlossaryStorageClient(),
            CheckoutPageRouteProviderPluginAlias::ROUTE_NAME_CHECKOUT_PLACE_ORDER,
            $this->getConfig()->getEscapeRoute(),
            [
                static::ERROR_CODE_GENERAL_FAILURE => static::ROUTE_CART,
                'payment failed' => CheckoutPageRouteProviderPluginAlias::ROUTE_NAME_CHECKOUT_PAYMENT,
                'shipment failed' => CheckoutPageRouteProviderPluginAlias::ROUTE_NAME_CHECKOUT_SHIPMENT,
            ],
        );
    }

}
