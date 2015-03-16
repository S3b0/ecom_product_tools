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
	protected $lastModification;

	/**
	 * The file revision#, if any
	 *
	 * @var integer
	 */
	protected $revision = 0;

	/**
	 * Assigned approval
	 *
	 * @var \S3b0\EcomProductTools\Domain\Model\Approval
	 */
	protected $approval = NULL;

	/**
	 * File content language
	 *
	 * @var \S3b0\EcomProductTools\Domain\Model\Language
	 */
	protected $language = NULL;

	/**
	 * Affected products
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product>
	 */
	protected $products = NULL;

	/**
	 * TYPO3 CMS fileCategories
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
	 */
	protected $fileCategories = NULL;

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
		$this->fileCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
		if ( $this->title ) {
			return $this->title;
		} elseif ( $this->getFileCategory()->_languageUid !== $this->language->getSysLanguage() ) {
			/** @var \TYPO3\CMS\Core\Database\DatabaseConnection $db */
			$db = $GLOBALS['TYPO3_DB'];
			$row = $db->exec_SELECTgetSingleRow('title', 'sys_category', 'l10n_parent=' . $this->getFileCategory()->getUid() . ' AND sys_language_uid=' . $this->language->getSysLanguage() . \TYPO3\CMS\Backend\Utility\BackendUtility::BEenableFields('sys_category'));
			return $row['title'] ?: $this->getFileCategory()->getTitle();
		} else {
			return $this->getFileCategory()->getTitle();
		}
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
	 * Returns the approval
	 *
	 * @return \S3b0\EcomProductTools\Domain\Model\Approval $approval
	 */
	public function getApproval() {
		return $this->approval;
	}

	/**
	 * Sets the approval
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Approval $approval
	 * @return void
	 */
	public function setApproval(\S3b0\EcomProductTools\Domain\Model\Approval $approval) {
		$this->approval = $approval;
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
	public function setLanguage(\S3b0\EcomProductTools\Domain\Model\Language $language = NULL) {
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
	public function setProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $products = NULL) {
		$this->products = $products;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $fileCategory
	 * @return void
	 */
	public function addFileCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $fileCategory) {
		$this->fileCategories->attach($fileCategory);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $fileCategoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeFileCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $fileCategoryToRemove) {
		$this->fileCategories->detach($fileCategoryToRemove);
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
	 */
	public function getFileCategories() {
		return $this->fileCategories;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $fileCategories
	 */
	public function setFileCategories($fileCategories = NULL) {
		$this->fileCategories = $fileCategories;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\Category
	 */
	public function getFileCategory() {
		return $this->fileCategories->current();
	}

}