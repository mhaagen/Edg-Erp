<?php
/**
 * Data
 *
 * @copyright Copyright © 2017 Bold Commerce BV. All rights reserved.
 * @author    dev@boldcommerce.nl
 */

namespace Bold\PIM\Plugin\Helper\Shipping;


class Data
{
    protected $helper;
    
    public function __construct(
        \Bold\PIM\Helper\Tracktrace $helper
    )
    {
        $this->helper = $helper;    
    }

    /**
     * @param \Magento\Shipping\Helper\Data $subject
     * @param \Closure $proceed
     * @param $model
     */
    public function aroundGetTrackingPopupUrlBySalesModel(
        \Magento\Shipping\Helper\Data $subject,
        \Closure $proceed,
        $model
    ) {
        if ($model instanceof \Magento\Sales\Model\Order\Shipment\Track && $this->helper->isPostNL($model)) {
            $trackCode = $model->getNumber();
            $postCode = $model->getShipment()->getShippingAddress()->getPostcode();
            return $this->helper->getPostNLUrl($trackCode, $postCode);
        }

        return $proceed($model);
    }
}