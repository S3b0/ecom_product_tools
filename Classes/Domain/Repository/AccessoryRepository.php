<?php
namespace S3b0\EcomProductTools\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
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
 * The repository for Accessories
 */
class AccessoryRepository extends AbstractRepository
{

    /**
     * @param \S3b0\EcomProductTools\Domain\Model\AccessoryCategory $category
     * @param string                                                $list
     *
     * @return array
     */
    public function findByCategoryAndList(\S3b0\EcomProductTools\Domain\Model\AccessoryCategory $category, $list = '')
    {
        $query = $this->createQuery();

        if ($uidCollection = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $list, true)) {
            $sortingArray = array_flip($uidCollection);
            $constraint = [
                $query->equals('accessoryCategory', $category),
                $query->in('uid', $uidCollection)
            ];
            if ($result = $query->matching($query->logicalAnd($constraint))->execute()) {
                $sortedArray = [];
                /** @var \S3b0\EcomProductTools\Domain\Model\Accessory $accessory */
                foreach ($result as $accessory) {
                    $sortedArray[$sortingArray[$accessory->getUid()]] = $accessory;
                }
            }
            ksort($sortedArray);

            return $sortedArray;
        }

        return [];
    }

    /**
     * @param integer $uid
     *
     * @return array|bool|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByProduct($uid = 0)
    {
        if ($uid) {
            return $this->createQuery()->matching(
                $this->createQuery()->contains('products', $uid)
            )->execute();
        }

        return false;
    }

}