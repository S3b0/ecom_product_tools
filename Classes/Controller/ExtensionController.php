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
 * Class ExtensionController
 */
class ExtensionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * approvalRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\ApprovalRepository
     * @inject
     */
    protected $approvalRepository = null;

    /**
     * certificationRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\CertificationRepository
     * @inject
     */
    protected $certificationRepository = null;

    /**
     * fileRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\FileRepository
     * @inject
     */
    protected $fileRepository = null;

    /**
     * productCategoryRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\ProductCategoryRepository
     * @inject
     */
    protected $productCategoryRepository = null;

    /**
     * productDivisionRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\ProductDivisionRepository
     * @inject
     */
    protected $productDivisionRepository = null;

    /**
     * productRepository
     *
     * @var \S3b0\EcomProductTools\Domain\Repository\ProductRepository
     * @inject
     */
    protected $productRepository = null;

    /**
     * Initializes the view before invoking an action method.
     *
     * Override this method to solve assign variables common for all actions
     * or prepare the view in another way before the action is called.
     *
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view The view to be initialized
     *
     * @return void
     * @api
     */
    public function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view)
    {
        $view->assignMultiple([
            'addLayoutClasses' => strtolower($this->request->getPluginName()),
            'language'         => $GLOBALS[ 'TSFE' ]->sys_language_uid,
            'pageUid'          => $GLOBALS[ 'TSFE' ]->id
        ]);
        parent::initializeView($view);
    }
}