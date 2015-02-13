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
 * Test case for class \S3b0\EcomProductTools\Domain\Model\File.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>
 */
class FileTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \S3b0\EcomProductTools\Domain\Model\File
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \S3b0\EcomProductTools\Domain\Model\File();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFileReturnsInitialValueForFileReference() {
		$this->assertEquals(
			NULL,
			$this->subject->getFileReference()
		);
	}

	/**
	 * @test
	 */
	public function setFileForFileReferenceSetsFile() {
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setFileReference($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'fileReference',
			$this->subject
		);
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
	public function getLastModificationReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getLastModification()
		);
	}

	/**
	 * @test
	 */
	public function setLastModificationForDateTimeSetsLastModification() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setLastModification($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'lastModification',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRevisionReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getRevision()
		);
	}

	/**
	 * @test
	 */
	public function setRevisionForIntegerSetsRevision() {
		$this->subject->setRevision(12);

		$this->assertAttributeEquals(
			12,
			'revision',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLanguageReturnsInitialValueForLanguage() {
		$this->assertEquals(
			NULL,
			$this->subject->getLanguage()
		);
	}

	/**
	 * @test
	 */
	public function setLanguageForLanguageSetsLanguage() {
		$languageFixture = new \S3b0\EcomProductTools\Domain\Model\Language();
		$this->subject->setLanguage($languageFixture);

		$this->assertAttributeEquals(
			$languageFixture,
			'language',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProductsReturnsInitialValueForProduct() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getProducts()
		);
	}

	/**
	 * @test
	 */
	public function setProductsForObjectStorageContainingProductSetsProducts() {
		$product = new \S3b0\EcomProductTools\Domain\Model\Product();
		$objectStorageHoldingExactlyOneProducts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneProducts->attach($product);
		$this->subject->setProducts($objectStorageHoldingExactlyOneProducts);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneProducts,
			'products',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addProductToObjectStorageHoldingProducts() {
		$product = new \S3b0\EcomProductTools\Domain\Model\Product();
		$productsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$productsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($product));
		$this->inject($this->subject, 'products', $productsObjectStorageMock);

		$this->subject->addProduct($product);
	}

	/**
	 * @test
	 */
	public function removeProductFromObjectStorageHoldingProducts() {
		$product = new \S3b0\EcomProductTools\Domain\Model\Product();
		$productsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$productsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($product));
		$this->inject($this->subject, 'products', $productsObjectStorageMock);

		$this->subject->removeProduct($product);

	}
}
