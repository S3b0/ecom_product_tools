<?php
namespace S3b0\EcomProductTools\Domain\Repository;


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
use Ecom\EcomToolbox\Domain\Repository\AbstractRepository;

/**
 * The repository for Files
 */
class FileRepository extends AbstractRepository {

	protected $defaultOrderings = [
		'fileCategories.sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
		'pid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	];

	/**
	 * Set repository wide settings
	 */
	public function initializeObject() {
		/** @var \TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface $querySettings */
		$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface');
		$querySettings->setRespectStoragePage(FALSE); // Disable storage pid
		$this->setDefaultQuerySettings($querySettings);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
	 *
	 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findByCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $category) {
		$query = $this->createQuery();

		return $query->matching(
			$query->contains('file_categories', $category)
		)->execute();
	}

	/**
	 * @param \S3b0\EcomProductTools\Domain\Model\Product $product
	 *
	 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findByProduct(\S3b0\EcomProductTools\Domain\Model\Product $product) {
		$query = $this->createQuery();

		return $query->matching(
			$query->contains('products', $product)
		)->execute();
	}

	/**
	 * @param \S3b0\EcomProductTools\Domain\Model\Product $product
	 *
	 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findApprovalDocuments(\S3b0\EcomProductTools\Domain\Model\Product $product) {
		$query = $this->createQuery();

		return $query->matching(
			$query->logicalAnd([
				$query->contains('products', $product),
				$query->greaterThan('approval', 0)
			])
		)->execute();
	}
}