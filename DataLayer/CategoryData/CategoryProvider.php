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


namespace Risecommerce\GoogleTagManager\DataLayer\CategoryData;

class CategoryProvider extends CategoryAbstract
{
    /**
     * @param array $categoryProviders
     */
    public function __construct(
        array $categoryProviders = []
    ) {
        $this->categoryProviders = $categoryProviders;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data =  $this->getcategoryData();
        $arraysToMerge = [];

        /** @var CategoryProvider $categoryProvider */
        foreach ($this->getCategoryProviders() as $categoryProvider) {
            $categoryProvider->setCategory($this->getCategory())->setCategoryData($data);
            $arraysToMerge[] = $categoryProvider->getData();
        }

        return empty($arraysToMerge) ? $data : array_merge($data, ...$arraysToMerge);
    }
}
