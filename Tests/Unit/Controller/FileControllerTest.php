<?php
namespace S3b0\EcomProductTools\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class S3b0\EcomProductTools\Controller\FileController.
 *
 * @author Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>
 */
class FileControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \S3b0\EcomProductTools\Controller\FileController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('S3b0\\EcomProductTools\\Controller\\FileController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllFilesFromRepositoryAndAssignsThemToView() {

		$allFiles = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$fileRepository = $this->getMock('S3b0\\EcomProductTools\\Domain\\Repository\\FileRepository', array('findAll'), array(), '', FALSE);
		$fileRepository->expects($this->once())->method('findAll')->will($this->returnValue($allFiles));
		$this->inject($this->subject, 'fileRepository', $fileRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('files', $allFiles);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllFilesFromRepositoryAndAssignsThemToView() {

		$allFiles = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$fileRepository = $this->getMock('S3b0\\EcomProductTools\\Domain\\Repository\\FileRepository', array('findAll'), array(), '', FALSE);
		$fileRepository->expects($this->once())->method('findAll')->will($this->returnValue($allFiles));
		$this->inject($this->subject, 'fileRepository', $fileRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('files', $allFiles);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}
}
