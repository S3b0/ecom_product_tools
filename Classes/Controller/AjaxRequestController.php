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
use Ecom\EcomToolbox\Utility as ToolboxUtility;
use S3b0\EcomProductTools\Domain\Model\Product;
use S3b0\EcomProductTools\Domain\Model\ProductCategory;
use S3b0\EcomProductTools\Domain\Model\ProductDivision;
use TYPO3\CMS\Core\Utility as CoreUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * AjaxRequestController
 */
class AjaxRequestController extends \S3b0\EcomProductTools\Controller\ExtensionController
{

    /**
     * @var JsonView $view
     */
    protected $view;

    /**
     * @var string
     */
    protected $defaultViewObjectName = JsonView::class;

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
    public function initializeAction()
    {
        global $TYPO3_CONF_VARS;
        /** !!! IMPORTANT TO MAKE JSON WORK !!! */
        $TYPO3_CONF_VARS[ 'FE' ][ 'debug' ] = '0';
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
     */
    public function initializeGetProductCategoriesByProductDivisionAction()
    {
        if (!$this->request->getArgument('division') instanceof ProductDivision && CoreUtility\MathUtility::canBeInterpretedAsInteger($this->request->getArgument('division'))) {
            $this->request->setArgument('division', $this->productDivisionRepository->findByUid($this->request->getArgument('division')));
        }
    }

    /**
     * action getProductCategoriesByProductDivision
     *
     * @param ProductDivision $division
     *
     * @return void
     */
    public function getProductCategoriesByProductDivisionAction(ProductDivision $division)
    {
        $this->view->assign('value', $this->productCategoryRepository->ignoreStoragePidAndSysLanguageUid()->jsonRequestSetOrderingByAlphabet()->findByProductDivision($division));
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
     */
    public function initializeGetProductsByProductCategoryAction()
    {
        if (!$this->request->getArgument('category') instanceof ProductDivision && CoreUtility\MathUtility::canBeInterpretedAsInteger($this->request->getArgument('category'))) {
            $this->request->setArgument('category', $this->productCategoryRepository->findByUid($this->request->getArgument('category')));
        }
        if (!is_bool($this->request->getArgument('discontinued'))) {
            $this->request->setArgument('discontinued', $this->request->getArgument('discontinued') == 'true');
        }
    }

    /**
     * action getProductsByProductCategory
     *
     * @param ProductCategory $category
     * @param boolean         $discontinued
     *
     * @return void
     */
    public function getProductsByProductCategoryAction(ProductCategory $category, $discontinued = false)
    {
        $this->view->assign('value', $this->productRepository->ignoreStoragePidAndSysLanguageUid()->findByProductCategory($category, $discontinued, true));
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
     */
    public function initializeGetProductDataAction()
    {
        if (!$this->request->getArgument('product') instanceof Product && CoreUtility\MathUtility::canBeInterpretedAsInteger($this->request->getArgument('product'))) {
            $this->request->setArgument('product', $this->productRepository->findByUid($this->request->getArgument('product')));
        }
    }

    /**
     * action getProductData
     *
     * @param Product $product
     *
     * @return void
     */
    public function getProductDataAction(Product $product)
    {
        $html = $this->getHTML('GetProductData', [
            'product' => $product,
            'files'   => $this->fileRepository->ignoreStoragePidAndSysLanguageUid()->findByProduct($product)
        ]);
        $this->view->assign('value', new \ArrayObject([
            'html' => ToolboxUtility\Div::sanitize_output($html)
        ]));
    }

    /**
     * @param string $templateName template name (UpperCamelCase)
     * @param array  $variables    variables to be passed to the Fluid view
     *
     * @return string
     */
    private function getHTML($templateName, array $variables = [])
    {
        /** @var StandaloneView $view */
        $view = $this->objectManager->get(StandaloneView::class);

        $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        $templateRootPath = CoreUtility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration[ 'view' ][ 'templateRootPath' ] ?: end($extbaseFrameworkConfiguration[ 'view' ][ 'templateRootPaths' ]));
        $partialRootPath = CoreUtility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration[ 'view' ][ 'partialRootPath' ] ?: end($extbaseFrameworkConfiguration[ 'view' ][ 'partialRootPaths' ]));
        $templatePathAndFilename = $templateRootPath . 'StandAloneViews/' . $templateName . '.html';
        $view->setTemplatePathAndFilename($templatePathAndFilename);
        $view->setPartialRootPaths([$partialRootPath]);
        $view->assignMultiple($variables);
        $view->setFormat('html');

        return $view->render();
    }

}
