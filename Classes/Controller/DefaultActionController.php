<?php
namespace S3b0\EcomProductTools\Controller;


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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * DefaultActionController
 */
class DefaultActionController extends ExtensionController
{

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException
     */
    public function initializeDownloadCenterAction()
    {
        if (!GeneralUtility::_POST('product') && GeneralUtility::_GET('product') && MathUtility::canBeInterpretedAsInteger(GeneralUtility::_GET('product'))) {
            /** @var \S3b0\EcomProductTools\Domain\Model\Product $product */
            $product = $this->productRepository->findByUid(MathUtility::convertToPositiveInteger(GeneralUtility::_GET('product')));
            $this->request->setArguments([
                'division' => $product->getProductCategory()->getProductDivision(),
                'category' => $product->getProductCategory(),
                'product'  => $product
            ]);
        }

        if (GeneralUtility::_POST('division') && (int)GeneralUtility::_POST('division') === 0) {
            $this->request->setArgument('division', null);
        }
        if (GeneralUtility::_POST('category') && (int)GeneralUtility::_POST('category') === 0) {
            $this->request->setArgument('category', null);
        }
        if (GeneralUtility::_POST('product') && (int)GeneralUtility::_POST('product') === 0) {
            $this->request->setArgument('product', null);
        }
    }

    /**
     * action downloadCenter
     *
     * @param \S3b0\EcomProductTools\Domain\Model\ProductDivision $division
     * @param \S3b0\EcomProductTools\Domain\Model\ProductCategory $category
     * @param \S3b0\EcomProductTools\Domain\Model\Product         $product
     * @param boolean                                             $discontinued
     *
     * @return void
     */
    public function downloadCenterAction(\S3b0\EcomProductTools\Domain\Model\ProductDivision $division = null, \S3b0\EcomProductTools\Domain\Model\ProductCategory $category = null, \S3b0\EcomProductTools\Domain\Model\Product $product = null, $discontinued = false)
    {
        $category = $category instanceof \S3b0\EcomProductTools\Domain\Model\ProductCategory ? ($category->getProductDivisions()->contains($division) ? $category : null) : null;
        $product = $product instanceof \S3b0\EcomProductTools\Domain\Model\Product ? ($product->getProductCategories()->contains($category) ? $product : null) : null;

        $this->view->assignMultiple([
            'discontinued'      => $discontinued,
            'product'           => $product,
            'category'          => $category,
            'division'          => $division,
            'files'             => $product instanceof \S3b0\EcomProductTools\Domain\Model\Product ? $this->fileRepository->ignoreStoragePidAndSysLanguageUid()->findByProduct($product) : null,
            'products'          => $category instanceof \S3b0\EcomProductTools\Domain\Model\ProductCategory ? $this->productRepository->ignoreStoragePidAndSysLanguageUid()->findByProductCategory($category, $discontinued) : null,
            'productCategories' => $division instanceof \S3b0\EcomProductTools\Domain\Model\ProductDivision ? $this->productCategoryRepository->ignoreStoragePidAndSysLanguageUid()->findByProductDivision($division) : null,
            'productDivisions'  => $this->productDivisionRepository->findAll()
        ]);
    }

}