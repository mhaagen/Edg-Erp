<?php
/**
 * Tracking
 *
 * @copyright Copyright © 2017 Bold Commerce BV. All rights reserved.
 * @author    dev@boldcommerce.nl
 */

namespace Bold\PIM\Plugin\Block\Admin\Shipping;


class Tracking
{
    public function afterGetCarriers(
        \Magento\Shipping\Block\Adminhtml\Order\Tracking $subject,
        $result
    )
    {
        if(!is_array($result)){
            return $result;
        }

        foreach($result as $code=>$label){
            if($code == 'PostNL'){
                return $result;
            }
        }

        $result['PostNL'] = __('PostNL');
        return $result;
    }
}