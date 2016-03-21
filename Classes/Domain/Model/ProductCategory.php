<?php
namespace S3b0\EcomProductTools\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * ProductCategory
 */
class ProductCategory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Category title to be displayed
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * The corresponding (product-)divisions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductDivision>
     * @lazy
     */
    protected $productDivisions = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->productDivisions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Adds a ProductDivision
     *
     * @param \S3b0\EcomProductTools\Domain\Model\ProductDivision $productDivision
     *
     * @return void
     */
    public function addProductDivision(\S3b0\EcomProductTools\Domain\Model\ProductDivision $productDivision)
    {
        $this->productDivisions->attach($productDivision);
    }

    /**
     * Removes a ProductDivision
     *
     * @param \S3b0\EcomProductTools\Domain\Model\ProductDivision $productDivisionToRemove The ProductDivision to be removed
     *
     * @return void
     */
    public function removeProductDivision(\S3b0\EcomProductTools\Domain\Model\ProductDivision $productDivisionToRemove)
    {
        $this->productDivisions->detach($productDivisionToRemove);
    }

    /**
     * Returns the productDivisions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductDivision> $productDivisions
     */
    public function getProductDivisions()
    {
        return $this->productDivisions;
    }

    /**
     * Sets the productDivisions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductDivision> $productDivisions
     *
     * @return void
     */
    public function setProductDivisions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $productDivisions)
    {
        $this->productDivisions = $productDivisions;
    }

    /**
     * @param int $offset
     *
     * @return \S3b0\EcomProductTools\Domain\Model\ProductDivision
     */
    public function getProductDivision($offset = 0)
    {
        return $this->productDivisions->toArray()[ $offset ];
    }

}