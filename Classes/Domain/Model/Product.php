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
 * Product
 */
class Product extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * teaser
	 *
	 * @var string
	 */
	protected $teaser = '';

	/**
	 * image
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
	 * @lazy
	 */
	protected $image = NULL;

	/**
	 * linkTitle
	 *
	 * @var string
	 */
	protected $linkTitle = '';

	/**
	 * linkToPage
	 *
	 * @var string
	 */
	protected $linkToPage = '';

	/**
	 * discontinued
	 *
	 * @var boolean
	 */
	protected $discontinued = FALSE;

	/**
	 * atexZone
	 *
	 * @var integer
	 */
	protected $atexZone = 0;

	/**
	 * necDivision
	 *
	 * @var integer
	 */
	protected $necDivision = 0;

	/**
	 * The corresponding (product-)category
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductCategory>
	 * @lazy
	 */
	protected $productCategories = NULL;

	/**
	 * certifications
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Certification>
	 */
	protected $certifications = NULL;

	/**
	 * attestations
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Certification>
	 */
	protected $attestations = NULL;

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
		$this->productCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->certifications = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->attestations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title . ($this->isDiscontinued() ? \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('product.discontinued', 'ecom_product_tools') : '');
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
	 * Returns the teaser
	 *
	 * @return string $teaser
	 */
	public function getTeaser() {
		return $this->teaser;
	}

	/**
	 * Sets the teaser
	 *
	 * @param string $teaser
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image = NULL) {
		$this->image = $image;
	}

	/**
	 * Returns the linkTitle
	 *
	 * @return string $linkTitle
	 */
	public function getLinkTitle() {
		return $this->linkTitle;
	}

	/**
	 * Sets the linkTitle
	 *
	 * @param string $linkTitle
	 * @return void
	 */
	public function setLinkTitle($linkTitle) {
		$this->linkTitle = $linkTitle;
	}

	/**
	 * Returns the linkToPage
	 *
	 * @return string $linkToPage
	 */
	public function getLinkToPage() {
		return $this->linkToPage;
	}

	/**
	 * Sets the linkToPage
	 *
	 * @param string $linkToPage
	 * @return void
	 */
	public function setLinkToPage($linkToPage) {
		$this->linkToPage = $linkToPage;
	}

	/**
	 * Returns the discontinued
	 *
	 * @return boolean $discontinued
	 */
	public function getDiscontinued() {
		return $this->discontinued;
	}

	/**
	 * Sets the discontinued
	 *
	 * @param boolean $discontinued
	 * @return void
	 */
	public function setDiscontinued($discontinued) {
		$this->discontinued = $discontinued;
	}

	/**
	 * Returns the boolean state of discontinued
	 *
	 * @return boolean
	 */
	public function isDiscontinued() {
		return $this->discontinued;
	}

	/**
	 * Returns the atexZone
	 *
	 * @return integer $atexZone
	 */
	public function getAtexZone() {
		return $this->atexZone;
	}

	/**
	 * Sets the atexZone
	 *
	 * @param integer $atexZone
	 * @return void
	 */
	public function setAtexZone($atexZone) {
		$this->atexZone = $atexZone;
	}

	/**
	 * Returns the necDivision
	 *
	 * @return integer $necDivision
	 */
	public function getNecDivision() {
		return $this->necDivision;
	}

	/**
	 * Sets the necDivision
	 *
	 * @param integer $necDivision
	 * @return void
	 */
	public function setNecDivision($necDivision) {
		$this->necDivision = $necDivision;
	}

	/**
	 * Adds a ProductCategory
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductCategory $productCategory
	 * @return void
	 */
	public function addProductCategory(\S3b0\EcomProductTools\Domain\Model\ProductCategory $productCategory) {
		$this->productCategories->attach($productCategory);
	}

	/**
	 * Removes a ProductCategory
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductCategory $productCategoryToRemove The ProductCategory to be removed
	 * @return void
	 */
	public function removeProductCategory(\S3b0\EcomProductTools\Domain\Model\ProductCategory $productCategoryToRemove) {
		$this->productCategories->detach($productCategoryToRemove);
	}

	/**
	 * Returns the productCategories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductCategory> $productCategories
	 */
	public function getProductCategories() {
		return $this->productCategories;
	}

	/**
	 * Sets the productCategories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\ProductCategory> $productCategories
	 * @return void
	 */
	public function setProductCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $productCategories) {
		$this->productCategories = $productCategories;
	}

	/**
	 * Adds a Certification
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Certification $certification
	 * @return void
	 */
	public function addCertification(\S3b0\EcomProductTools\Domain\Model\Certification $certification) {
		$this->certifications->attach($certification);
	}

	/**
	 * Removes a Certification
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Certification $certificationToRemove The Certification to be removed
	 * @return void
	 */
	public function removeCertification(\S3b0\EcomProductTools\Domain\Model\Certification $certificationToRemove) {
		$this->certifications->detach($certificationToRemove);
	}

	/**
	 * Returns the certifications
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Certification> $certifications
	 */
	public function getCertifications() {
		return $this->certifications;
	}

	/**
	 * Sets the certifications
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Certification> $certifications
	 * @return void
	 */
	public function setCertifications(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $certifications) {
		$this->certifications = $certifications;
	}

	/**
	 * Adds an Attestation
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Certification $attestation
	 * @return void
	 */
	public function addAttestation(\S3b0\EcomProductTools\Domain\Model\Certification $attestation) {
		$this->attestations->attach($attestation);
	}

	/**
	 * Removes an Attestation
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Certification $attestationToRemove The Attestation to be removed
	 * @return void
	 */
	public function removeAttestation(\S3b0\EcomProductTools\Domain\Model\Certification $attestationToRemove) {
		$this->attestations->detach($attestationToRemove);
	}

	/**
	 * Returns the attestations
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Certification> $attestations
	 */
	public function getAttestations() {
		return $this->attestations;
	}

	/**
	 * Sets the attestations
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Certification> $attestations
	 * @return void
	 */
	public function setAttestations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attestations) {
		$this->attestations = $attestations;
	}

	/**
	 * Returns the approvals (similar to groupedFor in Fluid @see Resources/Private/Templates/Product/ShowMarkup.html)
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getApprovals() {
		$approvals = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();

		if ( $this->certifications->count() ) {
			/** @var \S3b0\EcomProductTools\Domain\Model\Certification $certification */
			foreach ( $this->certifications as $certification ) {
				if ( !$approvals->contains($certification->getApproval()) ) {
					$approvals->attach($certification->getApproval());
				}
			}
		}

		return $approvals;
	}

}