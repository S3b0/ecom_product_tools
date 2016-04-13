<?php
namespace S3b0\EcomProductTools\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
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
 * AccessoryCategory
 */
class AccessoryCategory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    protected $accessories;

    /**
     * AccessoryCategory constructor.
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     */
    protected function initStorageObjects()
    {
        $this->accessories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getAccessories()
    {
        return $this->accessories;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|array $accessories
     */
    public function setAccessories($accessories)
    {
        if ($accessories instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage) {
            $this->accessories = $accessories;
        } elseif (is_array($accessories)) {
            if ($this->accessories instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage === false) {
                $this->accessories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            }
            /** @var \S3b0\EcomProductTools\Domain\Model\Accessory $accessory */
            foreach ($accessories as $accessory) {
                if ($this->accessories->contains($accessory) === false) {
                    $this->accessories->attach($accessory);
                }
            }
        }
    }

}