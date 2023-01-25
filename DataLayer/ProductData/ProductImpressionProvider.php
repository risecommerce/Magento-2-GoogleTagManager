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

namespace Risecommerce\GoogleTagManager\DataLayer\ProductData;

class ProductImpressionProvider extends ProductImpressionAbstract
{

    /**
     * @param array $productImpressionProviders
     * @codeCoverageIgnore
     */
    public function __construct(
        array $productImpressionProviders = []
    ) {
        $this->productImpressionProviders = $productImpressionProviders;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getItemData();
        $arraysToMerge = [];

        /** @var ProductImpressionAbstract $productImpressionProvider */
        foreach ($this->getProductImpressionProviders() as $productImpressionProvider) {
            $productImpressionProvider->setProduct($this->getProduct())->setItemData($data);
            $arraysToMerge[] = $productImpressionProvider->getData();
        }

        return empty($arraysToMerge) ? $data : array_merge($data, ...$arraysToMerge);
    }
}
