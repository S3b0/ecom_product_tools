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
	 * @var string
	 */
	protected $icon = '';

	/**
	 * The approval icon (user-spec)
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $iconUser = NULL;

	/**
	 * The approval icon for setcard (flag)
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $setcardIcon = '';

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
	 * @return string $icon
	 */
	public function getIcon() {
		return $this->icon ? \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/Images/Approvals/' . $this->icon . '.png' : ($this->iconUser ? $this->iconUser->getOriginalResource()->getPublicUrl() : '');
	}

	/**
	 * Sets the icon
	 *
	 * @param string $icon
	 * @return void
	 */
	public function setIcon($icon) {
		$this->icon = $icon;
	}

	/**
	 * Returns the iconUser
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $iconUser
	 */
	public function getIconUser() {
		return $this->iconUser;
	}

	/**
	 * Sets the iconUser
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $iconUser
	 * @return void
	 */
	public function setIconUser(\TYPO3\CMS\Extbase\Domain\Model\FileReference $iconUser) {
		$this->iconUser = $iconUser;
	}

	/**
	 * Returns the setcardIcon
	 *
	 * @return string $setcardIcon
	 */
	public function getSetcardIcon() {
		return $this->setcardIcon;
	}

	/**
	 * Sets the setcardIcon
	 *
	 * @param string $setcardIcon
	 * @return void
	 */
	public function setSetcardIcon($setcardIcon) {
		$this->setcardIcon = $setcardIcon;
	}

}