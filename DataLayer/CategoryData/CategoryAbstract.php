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

use Magento\Catalog\Model\Category;

abstract class CategoryAbstract
{
    /**
     * @var CategoryProvider[]
     */
    protected $categoryProviders;

    /**
     * @var array
     */
    private $categoryData = [];

    /**
     * @var Category
     */
    private $category;

    /**
     * @return array
     */
    abstract public function getData();

    /**
     * @return array
     */
    public function getCategoryData()
    {
        return (array) $this->categoryData;
    }

    /**
     * @param array $categoryData
     * @return CategoryAbstract
     */
    public function setCategoryData(array $categoryData)
    {
        $this->categoryData = $categoryData;
        return $this;
    }

    /**
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return CategoryAbstract
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return array|CategoryProvider[]
     */
    public function getCategoryProviders()
    {
        return $this->categoryProviders;
    }
}
