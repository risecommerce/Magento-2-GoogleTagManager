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


namespace Risecommerce\GoogleTagManager\DataLayer\OrderData;

class OrderItemProvider extends OrderItemAbstract
{
    /**
     * @param array $orderItemProviders
     */
    public function __construct(
        array $orderItemProviders = []
    ) {
        $this->orderItemProviders = $orderItemProviders;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getItemData();
        $arraysToMerge = [];

        foreach ($this->getOrderItemProviders() as $orderItemProvider) {
            $orderItemProvider->setItem($this->getItem())->setItemData($data);
            $arraysToMerge[] = $orderItemProvider->getData();
        }

        return empty($arraysToMerge) ? $data : array_merge($data, ...$arraysToMerge);
    }
}
