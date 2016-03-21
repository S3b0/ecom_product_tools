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
 * The repository for Products
 */
class ProductRepository extends AbstractRepository
{

    /**
     * @var array
     */
    protected $defaultOrderings = [
        'discontinued' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        'pid'          => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        'sorting'      => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];

    /**
     * @param string $list
     * @param array  $storagePids
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByUidList($list, array $storagePids = [])
    {
        $query = $this->createQuery();
        $query->setQuerySettings(
            $query->getQuerySettings()
                  ->setRespectSysLanguage(false)
                  ->setRespectStoragePage(false)
        );

        return $query->matching(
            $query->in('uid', \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $list, true))
        )->execute();
    }

    /**
     * @param \S3b0\EcomProductTools\Domain\Model\ProductCategory $category
     * @param boolean                                             $excludeDiscontinuedItems
     * @param boolean                                             $excludeExcludedInDownloadCenterItems
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByProductCategory(\S3b0\EcomProductTools\Domain\Model\ProductCategory $category, $excludeDiscontinuedItems = false, $excludeExcludedInDownloadCenterItems = false)
    {
        $query = $this->createQuery();

        $andConstraint = [
            $query->contains('productCategories', $category)
        ];
        if ($excludeDiscontinuedItems) {
            $andConstraint[] = $query->equals('discontinued', 0);
        }
        if ($excludeExcludedInDownloadCenterItems) {
            $andConstraint[] = $query->equals('excludedInDownloadCenter', 0);
        }
        $constraint = $query->logicalAnd($andConstraint);

        return $query->matching($constraint)->execute();
    }

}