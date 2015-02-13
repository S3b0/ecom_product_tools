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
class ExtensionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * approvalRepository
	 *
	 * @var \S3b0\EcomProductTools\Domain\Repository\ApprovalRepository
	 * @inject
	 */
	protected $approvalRepository = NULL;

	/**
	 * attestationRepository
	 *
	 * @var \S3b0\EcomProductTools\Domain\Repository\AttestationRepository
	 * @inject
	 */
	protected $attestationRepository = NULL;

	/**
	 * certificationRepository
	 *
	 * @var \S3b0\EcomProductTools\Domain\Repository\CertificationRepository
	 * @inject
	 */
	protected $certificationRepository = NULL;

	/**
	 * fileRepository
	 *
	 * @var \S3b0\EcomProductTools\Domain\Repository\FileRepository
	 * @inject
	 */
	protected $fileRepository = NULL;

	/**
	 * productCategoryRepository
	 *
	 * @var \S3b0\EcomProductTools\Domain\Repository\ProductCategoryRepository
	 * @inject
	 */
	protected $productCategoryRepository = NULL;

	/**
	 * productDivisionRepository
	 *
	 * @var \S3b0\EcomProductTools\Domain\Repository\ProductDivisionRepository
	 * @inject
	 */
	protected $productDivisionRepository = NULL;

	/**
	 * productRepository
	 *
	 * @var \S3b0\EcomProductTools\Domain\Repository\ProductRepository
	 * @inject
	 */
	protected $productRepository = NULL;

	public function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view) {
		$view->assign('addLayoutClasses', '');
		parent::initializeView($view);
	}
}