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

use Magento\Sales\Model\Order\Item;

abstract class OrderItemAbstract
{
    const LIST_TYPE_GOOGLE = 1;

    const LIST_TYPE_GENERIC = 2;

    protected $listType;

    /**
     * @var OrderItemProvider[]
     */
    protected $orderItemProviders;

    /**
     * @var array
     */
    private $itemData = [];

    /**
     * @var Item
     */
    private $item;

    /**
     * @return array
     */
    abstract public function getData();

    /**
     * @return array
     */
    public function getItemData()
    {
        return (array) $this->itemData;
    }

    /**
     * @param array $itemData
     * @return OrderItemAbstract
     */
    public function setItemData(array $itemData)
    {
        $this->itemData = $itemData;
        return $this;
    }

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     * @return OrderItemAbstract
     */
    public function setItem(Item $item)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return OrderItemProvider[]
     */
    public function getOrderItemProviders()
    {
        return $this->orderItemProviders;
    }

    /**
     * @return mixed
     */
    public function getListType()
    {
        return $this->listType;
    }

    /**
     * @param mixed $listType
     * @return OrderItemAbstract
     */
    public function setListType($listType)
    {
        $this->listType = $listType;
        return $this;
    }
}
