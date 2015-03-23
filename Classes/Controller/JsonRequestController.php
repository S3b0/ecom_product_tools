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
 * JsonRequestController
 */
class JsonRequestController extends \S3b0\EcomProductTools\Controller\ExtensionController {

	/**
	 * @var \TYPO3\CMS\Extbase\Mvc\View\JsonView $view
	 */
	protected $view;

	/**
	 * @var string
	 */
	protected $defaultViewObjectName = 'TYPO3\\CMS\\Extbase\\Mvc\\View\\JsonView';

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
	public function initializeGetProductCategoriesByProductDivisionAction() {
		if ( !$this->request->getArgument('division') instanceof \S3b0\EcomProductTools\Domain\Model\ProductDivision && \TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($this->request->getArgument('division')) ) {
			$this->request->setArgument('division', $this->productDivisionRepository->findByUid($this->request->getArgument('division')));
		}
	}

	/**
	 * action getProductCategoriesByProductDivision
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductDivision $division
	 * @return void
	 */
	public function getProductCategoriesByProductDivisionAction(\S3b0\EcomProductTools\Domain\Model\ProductDivision $division) {
		$this->view->assign('value', $this->productCategoryRepository->setExtQuerySettings()->findByProductDivision($division));
	}

	/**
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
	 */
	public function initializeGetProductsByProductCategoryAction() {
		if ( !$this->request->getArgument('category') instanceof \S3b0\EcomProductTools\Domain\Model\ProductDivision && \TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($this->request->getArgument('category')) ) {
			$this->request->setArgument('category', $this->productCategoryRepository->findByUid($this->request->getArgument('category')));
		}
		if ( !is_bool($this->request->getArgument('discontinued')) ) {
			$this->request->setArgument('discontinued', $this->request->getArgument('discontinued') == 'true');
		}
	}

	/**
	 * action getProductsByProductCategory
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\ProductCategory $category
	 * @param boolean                                             $discontinued
	 * @return void
	 */
	public function getProductsByProductCategoryAction(\S3b0\EcomProductTools\Domain\Model\ProductCategory $category, $discontinued = FALSE) {
		$this->view->assign('value', $this->productRepository->setExtQuerySettings()->findByProductCategory($category, $discontinued));
	}

}
