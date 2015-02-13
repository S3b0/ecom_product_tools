<?php
namespace S3b0\EcomProductTools\Domain\Model;


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
 * Approval
 */
class Approval extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The approval title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * The approval icon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 * @validate NotEmpty
	 */
	protected $icon = NULL;

	/**
	 * The approval icon for setcard (flag)
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 * @validate NotEmpty
	 */
	protected $setcardIcon = NULL;

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the icon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $icon
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * Sets the icon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $icon
	 * @return void
	 */
	public function setIcon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $icon) {
		$this->icon = $icon;
	}

	/**
	 * Returns the setcardIcon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $setcardIcon
	 */
	public function getSetcardIcon() {
		return $this->setcardIcon;
	}

	/**
	 * Sets the setcardIcon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $setcardIcon
	 * @return void
	 */
	public function setSetcardIcon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $setcardIcon) {
		$this->setcardIcon = $setcardIcon;
	}

}