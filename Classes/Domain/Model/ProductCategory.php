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
class ProductCategory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Category title to be displayed
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * The corresponding (product-)division
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductDivision>
	 * @lazy
	 */
	protected $productDivision = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
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
	protected function initStorageObjects() {
		$this->productDivision = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Adds a ProductDivision
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductDivision $productDivision
	 * @return void
	 */
	public function addProductDivision(\S3b0\EcomProductTools\Domain\Model\ProductDivision $productDivision) {
		$this->productDivision->attach($productDivision);
	}

	/**
	 * Removes a ProductDivision
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductDivision $productDivisionToRemove The ProductDivision to be removed
	 * @return void
	 */
	public function removeProductDivision(\S3b0\EcomProductTools\Domain\Model\ProductDivision $productDivisionToRemove) {
		$this->productDivision->detach($productDivisionToRemove);
	}

	/**
	 * Returns the productDivision
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductDivision> $productDivision
	 */
	public function getProductDivision() {
		return $this->productDivision;
	}

	/**
	 * Sets the productDivision
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductDivision> $productDivision
	 * @return void
	 */
	public function setProductDivision(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $productDivision) {
		$this->productDivision = $productDivision;
	}

}