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

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Risecommerce\GoogleTagManager\Block\DataLayer;
use Risecommerce\GoogleTagManager\Model\Cart as GtmCartModel;
use Risecommerce\GoogleTagManager\Model\DataLayerEvent;

class Checkout extends Template
{

    /**
     * @var GtmCartModel
     */
    protected $gtmCart;

    /**
     * @param Context $context
     * @param GtmCartModel $gtmCart
     * @param array $data
     */
    public function __construct(
        Context $context,
        GtmCartModel $gtmCart,
        $data = []
    ) {
        $this->gtmCart = $gtmCart;
        parent::__construct($context, $data);
    }

    /**
     * Add product data to datalayer
     *
     * @return $this
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    protected function _prepareLayout()
    {
        /** @var $tm DataLayer */
        $tm = $this->getParentBlock();

        $data = [
            'event' => DataLayerEvent::CHECKOUT_PAGE_EVENT,
            'cart' => $this->gtmCart->getCart()
        ];

        $tm->addVariable('list', 'checkout');
        $tm->addCustomDataLayerByEvent(DataLayerEvent::CHECKOUT_PAGE_EVENT, $data);

        return $this;
    }
}
