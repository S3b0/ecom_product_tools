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

	public function listApprovalsAction() {
		/** @var \S3b0\EcomProductTools\Domain\Model\Product $product */
		$product = $this->productRepository->findByUid((int) $this->settings['product']);

		/**
		 * Include flags.css depending on TYPO3 version (moved in 7.1)
		 * @var \TYPO3\CMS\Frontend\Controller\TyposcriptFrontendController $TSFE
		 */
		$TSFE = $GLOBALS['TSFE'];
		$TSFE->getPageRenderer()->addCssFile('/typo3conf/ext/ecom_product_tools/Resources/Public/CSS/m.' . (version_compare(TYPO3_branch, '7.1', '>=') ? 'flags-7.1' : 'flags') . ( preg_match('/(?i)msie [1-8]/', $_SERVER['HTTP_USER_AGENT']) ? '_msie_lt9.css' : '.css' ));

		$this->view->assign('product', $product);
		$this->view->assign('files', $this->fileRepository->ignoreStoragePidAndSysLanguageUid()->findApprovalDocuments($product));
	}
}