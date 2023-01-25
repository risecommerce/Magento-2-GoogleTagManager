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

namespace Risecommerce\GoogleTagManager\DataLayer\QuoteData;

class QuoteItemProvider extends QuoteItemAbstract
{
    /**
     * @param array $quoteItemProviders
     * @codeCoverageIgnore
     */
    public function __construct(
        array $quoteItemProviders = []
    ) {
        $this->quoteItemProviders = $quoteItemProviders;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getItemData();
        $arraysToMerge = [];

        /** @var QuoteItemAbstract $quoteItemProvider */
        foreach ($this->getQuoteItemProviders() as $quoteItemProvider) {
            $quoteItemProvider->setItem($this->getItem())->setItemData($data);
            $arraysToMerge[] = $quoteItemProvider->getData();
        }

        return empty($arraysToMerge) ? $data : array_merge($data, ...$arraysToMerge);
    }
}
