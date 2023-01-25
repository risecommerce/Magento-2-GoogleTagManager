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

namespace Risecommerce\GoogleTagManager\Block\Data;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Risecommerce\GoogleTagManager\Block\DataLayer;

/**
 * @method $this setOrderIds(Array $orderIds)
 * @method Array getOrderIds()
 */
class Order extends Template
{
    /** @var \Risecommerce\GoogleTagManager\Model\Order */
    protected $orderDataArray;

    /**
     * @param Context $context
     * @param \Risecommerce\GoogleTagManager\Model\Order $orderDataArray
     * @param array $data
     */
    public function __construct(
        Context $context,
        \Risecommerce\GoogleTagManager\Model\Order $orderDataArray,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->orderDataArray = $orderDataArray;
    }

    /**
     * Render information about specified orders and their items
     *
     * @return void|string
     * @throws NoSuchEntityException
     */
    public function addOrderLayer()
    {
        $transactions = $this->orderDataArray->setOrderIds($this->getOrderIds())->getOrderLayer();

        if (!empty($transactions)) {
            /** @var $tm DataLayer */
            $tm = $this->getParentBlock();
            foreach ($transactions as $order) {
                $tm->addCustomDataLayer($order);
            }
        }
    }
}
