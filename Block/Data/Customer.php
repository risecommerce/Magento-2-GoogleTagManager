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

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Risecommerce\GoogleTagManager\Block\DataLayer;
use Risecommerce\GoogleTagManager\Model\Customer as GtmCustomerModel;

class Customer extends Template
{
    /**
     * @var GtmCustomerModel
     */
    protected $gtmCustomer;

    /**
     * @param Context $context
     * @param GtmCustomerModel $gtmCustomer
     * @param array $data
     */
    public function __construct(
        Context $context,
        GtmCustomerModel $gtmCustomer,
        array $data = []
    ) {
        $this->gtmCustomer = $gtmCustomer;
        parent::__construct($context, $data);
    }
    /**
     * Add product data to datalayer
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        /** @var $tm DataLayer */
        $tm = $this->getParentBlock();
        $tm->addVariable('customer', $this->gtmCustomer->getCustomer());

        return $this;
    }
}
