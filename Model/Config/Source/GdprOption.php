<?php
/**
 * PHP version 7 & 8
 *
 * @category Risecommerce
 * @package  Risecommerce_GoogleTagManager
 * @author   Risecommerce <magento@risecommerce.com>
 * @license  https://www.risecommerce.com  Open Software License (OSL 3.0)
 * @link     https://www.risecommerce.com
 */

namespace Risecommerce\GoogleTagManager\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class GdprOption implements ArrayInterface
{
    const USE_COOKIE_RESTRICTION_MODE = 1;
    const IF_COOKIE_EXIST = 2;
    const IF_COOKIE_NOT_EXIST = 3;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::USE_COOKIE_RESTRICTION_MODE, 'label' => __('Use Magento Cookie Restriction Mode')],
            ['value' => self::IF_COOKIE_EXIST, 'label' => __('Enable Google Analytics Tracking if Cookie Exist')],
            ['value' => self::IF_COOKIE_NOT_EXIST, 'label' => __('Disable Google Analytics Tracking if Cookie Exist')]
        ];
    }
}
