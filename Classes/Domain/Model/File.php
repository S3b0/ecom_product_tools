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
 * A file relation providing detail on files not delivered with FAL
 */
class File extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The fileReference
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 * @validate NotEmpty
	 */
	protected $fileReference = NULL;

	/**
	 * File title to be displayed
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * Last modification date
	 *
	 * @var \DateTime
	 */
	protected $lastModification = NULL;

	/**
	 * The file revision#, if any
	 *
	 * @var integer
	 */
	protected $revision = 0;

	/**
	 * File content language
	 *
	 * @var \S3b0\EcomProductTools\Domain\Model\Language
	 * @lazy
	 */
	protected $language = NULL;

	/**
	 * Affected products
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product>
	 * @lazy
	 */
	protected $products = NULL;

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
		$this->products = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the fileReference
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
	 */
	public function getFileReference() {
		return $this->fileReference;
	}

	/**
	 * Sets the fileReference
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference
	 * @return void
	 */
	public function setFileReference(\TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference) {
		$this->fileReference = $fileReference;
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
	 * Returns the lastModification
	 *
	 * @return \DateTime $lastModification
	 */
	public function getLastModification() {
		return $this->lastModification;
	}

	/**
	 * Sets the lastModification
	 *
	 * @param \DateTime $lastModification
	 * @return void
	 */
	public function setLastModification(\DateTime $lastModification) {
		$this->lastModification = $lastModification;
	}

	/**
	 * Returns the revision
	 *
	 * @return integer $revision
	 */
	public function getRevision() {
		return $this->revision;
	}

	/**
	 * Sets the revision
	 *
	 * @param integer $revision
	 * @return void
	 */
	public function setRevision($revision) {
		$this->revision = $revision;
	}

	/**
	 * Returns the language
	 *
	 * @return \S3b0\EcomProductTools\Domain\Model\Language $language
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * Sets the language
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Language $language
	 * @return void
	 */
	public function setLanguage(\S3b0\EcomProductTools\Domain\Model\Language $language) {
		$this->language = $language;
	}

	/**
	 * Adds a Product
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Product $product
	 * @return void
	 */
	public function addProduct(\S3b0\EcomProductTools\Domain\Model\Product $product) {
		$this->products->attach($product);
	}

	/**
	 * Removes a Product
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Product $productToRemove The Product to be removed
	 * @return void
	 */
	public function removeProduct(\S3b0\EcomProductTools\Domain\Model\Product $productToRemove) {
		$this->products->detach($productToRemove);
	}

	/**
	 * Returns the products
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product> $products
	 */
	public function getProducts() {
		return $this->products;
	}

	/**
	 * Sets the products
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product> $products
	 * @return void
	 */
	public function setProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $products) {
		$this->products = $products;
	}

}