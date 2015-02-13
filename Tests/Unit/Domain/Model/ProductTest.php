<?php

namespace S3b0\EcomProductTools\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \S3b0\EcomProductTools\Domain\Model\Product.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>
 */
class ProductTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \S3b0\EcomProductTools\Domain\Model\Product
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \S3b0\EcomProductTools\Domain\Model\Product();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTeaserReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTeaser()
		);
	}

	/**
	 * @test
	 */
	public function setTeaserForStringSetsTeaser() {
		$this->subject->setTeaser('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'teaser',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinkTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLinkTitle()
		);
	}

	/**
	 * @test
	 */
	public function setLinkTitleForStringSetsLinkTitle() {
		$this->subject->setLinkTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'linkTitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinkToPageReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLinkToPage()
		);
	}

	/**
	 * @test
	 */
	public function setLinkToPageForStringSetsLinkToPage() {
		$this->subject->setLinkToPage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'linkToPage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDiscontinuedReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getDiscontinued()
		);
	}

	/**
	 * @test
	 */
	public function setDiscontinuedForBooleanSetsDiscontinued() {
		$this->subject->setDiscontinued(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'discontinued',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAtexZoneReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getAtexZone()
		);
	}

	/**
	 * @test
	 */
	public function setAtexZoneForIntegerSetsAtexZone() {
		$this->subject->setAtexZone(12);

		$this->assertAttributeEquals(
			12,
			'atexZone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNecDivisionReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getNecDivision()
		);
	}

	/**
	 * @test
	 */
	public function setNecDivisionForIntegerSetsNecDivision() {
		$this->subject->setNecDivision(12);

		$this->assertAttributeEquals(
			12,
			'necDivision',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProductCategoriesReturnsInitialValueForProductCategory() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getProductCategories()
		);
	}

	/**
	 * @test
	 */
	public function setProductCategoriesForObjectStorageContainingProductCategorySetsProductCategories() {
		$productCategory = new \S3b0\EcomProductTools\Domain\Model\ProductCategory();
		$objectStorageHoldingExactlyOneProductCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneProductCategories->attach($productCategory);
		$this->subject->setProductCategories($objectStorageHoldingExactlyOneProductCategories);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneProductCategories,
			'productCategories',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addProductCategoryToObjectStorageHoldingProductCategories() {
		$productCategory = new \S3b0\EcomProductTools\Domain\Model\ProductCategory();
		$productCategoriesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$productCategoriesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($productCategory));
		$this->inject($this->subject, 'productCategories', $productCategoriesObjectStorageMock);

		$this->subject->addProductCategory($productCategory);
	}

	/**
	 * @test
	 */
	public function removeProductCategoryFromObjectStorageHoldingProductCategories() {
		$productCategory = new \S3b0\EcomProductTools\Domain\Model\ProductCategory();
		$productCategoriesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$productCategoriesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($productCategory));
		$this->inject($this->subject, 'productCategories', $productCategoriesObjectStorageMock);

		$this->subject->removeProductCategory($productCategory);

	}

	/**
	 * @test
	 */
	public function getCertificationsReturnsInitialValueForCertification() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCertifications()
		);
	}

	/**
	 * @test
	 */
	public function setCertificationsForObjectStorageContainingCertificationSetsCertifications() {
		$certification = new \S3b0\EcomProductTools\Domain\Model\Certification();
		$objectStorageHoldingExactlyOneCertifications = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCertifications->attach($certification);
		$this->subject->setCertifications($objectStorageHoldingExactlyOneCertifications);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCertifications,
			'certifications',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCertificationToObjectStorageHoldingCertifications() {
		$certification = new \S3b0\EcomProductTools\Domain\Model\Certification();
		$certificationsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$certificationsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($certification));
		$this->inject($this->subject, 'certifications', $certificationsObjectStorageMock);

		$this->subject->addCertification($certification);
	}

	/**
	 * @test
	 */
	public function removeCertificationFromObjectStorageHoldingCertifications() {
		$certification = new \S3b0\EcomProductTools\Domain\Model\Certification();
		$certificationsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$certificationsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($certification));
		$this->inject($this->subject, 'certifications', $certificationsObjectStorageMock);

		$this->subject->removeCertification($certification);

	}

	/**
	 * @test
	 */
	public function getAttestationsReturnsInitialValueForAttestation() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAttestations()
		);
	}

	/**
	 * @test
	 */
	public function setAttestationsForObjectStorageContainingAttestationSetsAttestations() {
		$attestation = new \S3b0\EcomProductTools\Domain\Model\Attestation();
		$objectStorageHoldingExactlyOneAttestations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAttestations->attach($attestation);
		$this->subject->setAttestations($objectStorageHoldingExactlyOneAttestations);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAttestations,
			'attestations',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAttestationToObjectStorageHoldingAttestations() {
		$attestation = new \S3b0\EcomProductTools\Domain\Model\Attestation();
		$attestationsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$attestationsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($attestation));
		$this->inject($this->subject, 'attestations', $attestationsObjectStorageMock);

		$this->subject->addAttestation($attestation);
	}

	/**
	 * @test
	 */
	public function removeAttestationFromObjectStorageHoldingAttestations() {
		$attestation = new \S3b0\EcomProductTools\Domain\Model\Attestation();
		$attestationsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$attestationsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($attestation));
		$this->inject($this->subject, 'attestations', $attestationsObjectStorageMock);

		$this->subject->removeAttestation($attestation);

	}
}
