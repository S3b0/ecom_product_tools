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

/**
 * ActionController
 */
class ActionController extends ExtensionController {

	public function initializeDownloadCenterAction() {
		if ( $this->request->hasArgument('division') && (int)$this->request->getArgument('division') === 0 ) {
			$this->request->setArgument('division', NULL);
			$this->request->setArgument('category', NULL);
			$this->request->setArgument('product', NULL);
		} elseif ( $this->request->hasArgument('category') && (int)$this->request->getArgument('category') === 0 ) {
			$this->request->setArgument('category', NULL);
			$this->request->setArgument('product', NULL);
		} elseif ( $this->request->hasArgument('product') && (int)$this->request->getArgument('product') === 0 ) {
			$this->request->setArgument('product', NULL);
		}
	}

	/**
	 * action downloadCenter
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductDivision $division
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductCategory $category
	 * @param \S3b0\EcomProductTools\Domain\Model\Product         $product
	 * @param boolean                                             $discontinued
	 * @return void
	 */
	public function downloadCenterAction(\S3b0\EcomProductTools\Domain\Model\ProductDivision $division = NULL, \S3b0\EcomProductTools\Domain\Model\ProductCategory $category = NULL, \S3b0\EcomProductTools\Domain\Model\Product $product = NULL, $discontinued = FALSE) {
		$this->view->assignMultiple(array(
			'discontinued' => $discontinued,
			'product' => $product,
			'category' => $category,
			'division' => $division,
			'files' => $product instanceof \S3b0\EcomProductTools\Domain\Model\Product ? $this->fileRepository->findByProduct($product) : NULL,
			'products' => $category instanceof \S3b0\EcomProductTools\Domain\Model\ProductCategory ? $this->productRepository->findByProductCategory($category, $discontinued) : NULL,
			'productCategories' => $division instanceof \S3b0\EcomProductTools\Domain\Model\ProductDivision ? $this->productCategoryRepository->findByProductDivision($division) : NULL,
			'productDivisions' => $this->productDivisionRepository->findAll()
		));
	}

}