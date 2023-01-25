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

namespace Risecommerce\GoogleTagManager\Observer\Frontend;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Store\Model\StoreManagerInterface;

class OrderSuccessPageViewObserver implements ObserverInterface
{
    /**
     * @var LayoutInterface
     */
    protected $_layout;

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @param StoreManagerInterface $storeManager
     * @param LayoutInterface $layout
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        LayoutInterface $layout
    ) {
        $this->_layout = $layout;
        $this->_storeManager = $storeManager;
    }

    /**
     * Add order information into GA block to render on checkout success pages
     *
     * @param EventObserver $observer
     * @return void
     */
    public function execute(EventObserver $observer)
    {
        $orderIds = $observer->getEvent()->getOrderIds();
        if (empty($orderIds) || !is_array($orderIds)) {
            return;
        }

        /** @var BlockInterface $block */
        $block = $this->_layout->getBlock('risecommerce_gtm_datalayer');
        if ($block) {
            $block->setOrderIds($orderIds);
        }
    }
}
