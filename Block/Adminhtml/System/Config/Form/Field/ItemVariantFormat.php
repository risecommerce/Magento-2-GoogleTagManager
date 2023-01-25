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


namespace Risecommerce\GoogleTagManager\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\Option\ArrayInterface;

class ItemVariantFormat implements ArrayInterface
{
    const SHORT_FORMAT = 1;

    const LONG_FORMAT = 2;

    const DEFAULT_FORMAT = self::SHORT_FORMAT;

    const FORMAT = [
        self::SHORT_FORMAT => '{{value}}',
        self::LONG_FORMAT => '{{label}} / {{value}}'
    ];

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Option Value (XS/Black)'), 'value' => self::SHORT_FORMAT],
            ['label' => __('Option Name : Option Value (Size : XS / Color : Black)'), 'value' => self::LONG_FORMAT]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            [self::SHORT_FORMAT => __('Option Value (XS/Black)')],
            [self::LONG_FORMAT => __('Option Name : Option Value (Size : XS / Color : Black)')]
        ];
    }
}
