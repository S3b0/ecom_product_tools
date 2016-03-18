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
 * ProductController
 */
class ProductController extends ExtensionController {

	/**
	 * action showMarkUp
	 *
	 * @return void
	 */
	public function showMarkUpAction() {
		$this->view->assign('product', $this->productRepository->findByUid((int) $this->settings['product']));
	}

	/**
	 * action listCompatibleProductsAction
	 */
	public function listCompatibleProductsAction() {
		$products = [ ];
		if ( preg_match('[\d,]', $this->settings['products']) ) {
			foreach ( \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $this->settings['products'], TRUE) as $uid ) {
				$products[] = $this->productRepository->findByUid($uid);
			}
		}

		$this->view->assignMultiple(array(
            'products' => $products,
            'tt_content' => $this->configurationManager->getContentObject()->data
        ));
	}

	/**
	 * action listApprovalsAction
	 */
	public function listApprovalsAction() {
		/** @var \S3b0\EcomProductTools\Domain\Model\Product $product */
		$product = $this->productRepository->findByUid((int) $this->settings['product']);

		/**
		 * Include flags.css depending on TYPO3 version (moved in 7.1)
		 * @var \TYPO3\CMS\Frontend\Controller\TyposcriptFrontendController $TSFE
		 */
		$TSFE = $GLOBALS['TSFE'];
		$TSFE->getPageRenderer()->addCssFile('/typo3conf/ext/ecom_product_tools/Resources/Public/CSS/m.flags.css');

		$this->view->assign('product', $product);
		$this->view->assign('files', $this->fileRepository->ignoreStoragePidAndSysLanguageUid()->findApprovalDocuments($product));
	}
}