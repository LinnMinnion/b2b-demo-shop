<?php

namespace Pyz\Yves\CheckoutPage\Form\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class OrderDetailsForm extends AbstractType
{
    public const ORDER_NAME_PROPERTY_PATH = QuoteTransfer::ORDER_NAME;
    const FIELD_ID_ORDER_NAME = 'order-name';

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'orderDetailsForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array<string, mixed> $options
     * @return OrderDetailsForm
     */
    public function buildForm(FormBuilderInterface $builder, array $options): OrderDetailsForm
    {
        $builder->add(self::FIELD_ID_ORDER_NAME, TextType::class, [
            'required' => true,
            'property_path' => static::ORDER_NAME_PROPERTY_PATH,
            'constraints' => [
                new NotBlank(),
            ],
            'label' => 'Order name',
        ]);

        return $this;
    }
}
