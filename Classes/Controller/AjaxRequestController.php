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
 * AjaxRequestController
 */
class AjaxRequestController extends \S3b0\EcomProductTools\Controller\ExtensionController {

	/**
	 * Initializes the controller before invoking an action method.
	 *
	 * Override this method to solve tasks which all actions have in
	 * common.
	 *
	 * @return void
	 * @api
	 *
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
	 */
	public function initializeAction() {
		global $TYPO3_CONF_VARS;
		/** !!! IMPORTANT TO MAKE JSON WORK !!! */
		$TYPO3_CONF_VARS['FE']['debug'] = '0';
	}

	/**
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
	 */
	public function initializeGetProductDataAction() {
		if ( !$this->request->getArgument('product') instanceof \S3b0\EcomProductTools\Domain\Model\Product && \TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($this->request->getArgument('product')) ) {
			$this->request->setArgument('product', $this->productRepository->findByUid($this->request->getArgument('product')));
		}
	}

	/**
	 * action getProductData
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Product $product
	 * @return void
	 */
	public function getProductDataAction(\S3b0\EcomProductTools\Domain\Model\Product $product){
		$this->view->assignMultiple(array(
			'product' => $product,
			'files' => $this->fileRepository->setExtQuerySettings()->findByProduct($product)
		));
	}

}
