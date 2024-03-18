<?php

namespace Pyz\Yves\CheckoutPage\Controller;
use Pyz\Yves\CheckoutPage\CheckoutPageFactory;
use SprykerShop\Yves\CheckoutPage\Controller\CheckoutController as SprykerShopCheckoutController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CheckoutPageFactory getFactory()
 */
class CheckoutController extends SprykerShopCheckoutController
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function orderDetailsAction(Request $request): mixed
    {
        $response = $this->createStepProcess()->process(
            $request,
            $this->getFactory()
                ->createCheckoutFormFactory()
                ->createOrderDetailsFormCollection()
        );

        if (!is_array($response)) {
            return $response;
        }

        return $this->view(
            $response,
            $this->getFactory()->getCustomerPageWidgetPlugins(),
            '@CheckoutPage/views/order-details/order-details.twig'
        );
    }
}
