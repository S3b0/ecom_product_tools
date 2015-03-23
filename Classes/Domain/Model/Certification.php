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
 * Certification
 */
class Certification extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The type, whether certification [0] or attestation [1]
	 *
	 * @var integer
	 */
	protected $type = 0;

	/**
	 * The certification or attestation!
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * Assigned approval
	 *
	 * @var \S3b0\EcomProductTools\Domain\Model\Approval
	 */
	protected $approval = NULL;

	/**
	 * @return integer
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param integer $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return str_ireplace('|', PHP_EOL, $this->title);
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
	 * Returns the approval
	 *
	 * @return \S3b0\EcomProductTools\Domain\Model\Approval $approval
	 */
	public function getApproval() {
		return $this->approval;
	}

	/**
	 * Sets the approval
	 *
	 * @param \S3b0\EcomProductTools\Domain\Model\Approval $approval
	 * @return void
	 */
	public function setApproval(\S3b0\EcomProductTools\Domain\Model\Approval $approval) {
		$this->approval = $approval;
	}

}