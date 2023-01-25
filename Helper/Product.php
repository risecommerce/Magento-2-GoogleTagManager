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


namespace Risecommerce\GoogleTagManager\Helper;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\UrlInterface;

class Product extends Data
{
    public function getImageUrl($product)
    {
        /** @var $product ProductInterface */
        return $this->_urlBuilder->getBaseUrl(['_type' => UrlInterface::URL_TYPE_MEDIA])
            . 'catalog/product' . ($product->getData('image') ?: $product->getData('small_image'));
    }
}
