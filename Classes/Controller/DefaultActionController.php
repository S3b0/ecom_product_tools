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
use S3b0\EcomProductTools\Domain\Model as Model;
use TYPO3\CMS\Core\Utility as CoreUtility;
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
        if (!CoreUtility\GeneralUtility::_POST('product') && CoreUtility\GeneralUtility::_GET('product') && MathUtility::canBeInterpretedAsInteger(CoreUtility\GeneralUtility::_GET('product'))) {
            /** @var Model\Product $product */
            $product = $this->productRepository->findByUid(MathUtility::convertToPositiveInteger(CoreUtility\GeneralUtility::_GET('product')));
            $this->request->setArguments([
                'division' => $product->getProductCategory()->getProductDivision(),
                'category' => $product->getProductCategory(),
                'product'  => $product
            ]);
        }

        if (CoreUtility\GeneralUtility::_POST('division') && (int)CoreUtility\GeneralUtility::_POST('division') === 0) {
            $this->request->setArgument('division', null);
        }
        if (CoreUtility\GeneralUtility::_POST('category') && (int)CoreUtility\GeneralUtility::_POST('category') === 0) {
            $this->request->setArgument('category', null);
        }
        if (CoreUtility\GeneralUtility::_POST('product') && (int)CoreUtility\GeneralUtility::_POST('product') === 0) {
            $this->request->setArgument('product', null);
        }
    }

    /**
     * action downloadCenter
     *
     * @param Model\ProductDivision $division
     * @param Model\ProductCategory $category
     * @param Model\Product         $product
     * @param boolean               $discontinued
     *
     * @return void
     */
    public function downloadCenterAction(Model\ProductDivision $division = null, Model\ProductCategory $category = null, Model\Product $product = null, $discontinued = false)
    {
        $category = $category instanceof Model\ProductCategory ? ($category->getProductDivisions()->contains($division) ? $category : null) : null;
        $product = $product instanceof Model\Product ? ($product->getProductCategories()->contains($category) ? $product : null) : null;

        $this->view->assignMultiple([
            'discontinued'      => $discontinued,
            'product'           => $product,
            'category'          => $category,
            'division'          => $division,
            'files'             => $product instanceof Model\Product ? $this->fileRepository->ignoreStoragePidAndSysLanguageUid()->findByProduct($product) : null,
            'products'          => $category instanceof Model\ProductCategory ? $this->productRepository->ignoreStoragePidAndSysLanguageUid()->findByProductCategory($category, $discontinued) : null,
            'productCategories' => $division instanceof Model\ProductDivision ? $this->productCategoryRepository->ignoreStoragePidAndSysLanguageUid()->findByProductDivision($division) : null,
            'productDivisions'  => $this->productDivisionRepository->findAll()
        ]);
    }

}