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
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * ProductController
 */
class ProductController extends ExtensionController
{

    /**
     * accessoryRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\AccessoryRepository
     * @inject
     */
    protected $accessoryRepository = null;

    /**
     * accessoryCategoryRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\AccessoryCategoryRepository
     * @inject
     */
    protected $accessoryCategoryRepository = null;

    /**
     * action showMarkUp
     *
     * @return void
     */
    public function showMarkUpAction()
    {
        $this->view->assign('product', $this->productRepository->findByUid((int)$this->settings[ 'product' ]));
    }

    /**
     * action listCompatibleProductsAction
     */
    public function listCompatibleProductsAction()
    {
        $products = [];
        if (preg_match('/[\d,]/', $this->settings[ 'products' ])) {
            foreach (GeneralUtility::intExplode(',', $this->settings[ 'products' ], true) as $uid) {
                $products[] = $this->productRepository->findByUid($uid);
            }
        }

        $this->view->assignMultiple([
            'products'      => $products,
            'contentObject' => $this->configurationManager->getContentObject()->data
        ]);
    }

    /**
     * action listAccessory
     */
    public function listAccessoryAction()
    {
        if ($categories = GeneralUtility::intExplode(',', $this->settings['categories'], true)) {
            $assign = [];
            /** @var integer $uid */
            foreach ($categories as $uid) {
                /** @var Model\AccessoryCategory $category */
                if ($category = $this->accessoryCategoryRepository->findByUid($uid)) {
                    $category->setAccessories($this->accessoryRepository->findByCategoryAndList($category, $this->settings['accessories'], true));
                    $assign[] = $category;
                }
            }
            $this->view->assign('categories', $assign);
        }
    }

    /**
     * action listApprovalsAction
     */
    public function listApprovalsAction()
    {
        /** @var Model\Product $product */
        $product = $this->productRepository->findByUid((int)$this->settings[ 'product' ]);

        /**
         * Include flags.css depending on TYPO3 version (moved in 7.1)
         *
         * @var PageRenderer $pageRenderer
         */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->addCssFile('/typo3conf/ext/ecom_product_tools/Resources/Public/Styles/m.flags.css');

        $this->view->assign('product', $product);
        $this->view->assign('files', $this->fileRepository->ignoreStoragePidAndSysLanguageUid()->findApprovalDocuments($product));
    }
}