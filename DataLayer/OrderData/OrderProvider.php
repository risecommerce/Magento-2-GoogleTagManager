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

class OrderProvider extends OrderAbstract
{
    /**
     * @param array $orderProviders
     */
    public function __construct(
        array $orderProviders = []
    ) {
        $this->orderProviders = $orderProviders;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getTransactionData();
        $arraysToMerge = [];

        foreach ($this->getOrderProviders() as $orderProvider) {
            $orderProvider->setOrder($this->getOrder())->setTransactionData($data);
            $arraysToMerge[] = $orderProvider->getData();
        }

        return empty($arraysToMerge) ? $data : array_merge($data, ...$arraysToMerge);
    }
}
