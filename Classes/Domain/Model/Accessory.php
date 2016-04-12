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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Accessory
 */
class Accessory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    const BADGE_NEW    = 1;
    const BADGE_ATEX   = 2;
    const BADGE_NEC    = 4;
    const BADGE_NON_EX = 8;

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $teaser = '';

    /**
     * @var string
     */
    protected $articleNumbers = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images = null;

    /**
     * @var string
     */
    protected $videos = '';

    /**
     * @var string
     */
    protected $link = '';

    /**
     * @var string
     */
    protected $linkTitle = '';

    /**
     * @var integer
     */
    protected $atexZone = 0;

    /**
     * @var integer
     */
    protected $necDivision = 0;

    /**
     * @var integer
     */
    protected $badges = 0;

    /**
     * @var \S3b0\EcomProductTools\Domain\Model\AccessoryCategory
     * @validate NotEmpty
     */
    protected $accessoryCategory;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\File>
     */
    protected $files = null;

    /**
     * Accessory constructor.
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
        $this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->files = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @return string $teaser
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * @return array
     */
    public function getArticleNumbers()
    {
        return GeneralUtility::trimExplode(PHP_EOL, $this->articleNumbers, true);
    }

    /**
     * @param string $articleNumbers
     */
    public function setArticleNumbers($articleNumbers)
    {
        $this->articleNumbers = $articleNumbers;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     */
    public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images = null)
    {
        $this->images = $images instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage ? $images : new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference|null $image
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image = null)
    {
        if ($image instanceof \TYPO3\CMS\Extbase\Domain\Model\FileReference) {
            if ($this->images instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage === false) {
                $this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            }
            if ($this->images->contains($image) === false) {
                $this->images->attach($image);
            }
        }
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference|null $imageToRemove
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove = null)
    {
        if ($imageToRemove instanceof \TYPO3\CMS\Extbase\Domain\Model\FileReference && $this->images instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage && $this->images->contains($image)) {
            $this->images->detach($imageToRemove);
        }
    }

    /**
     * @return array
     */
    public function getVideos()
    {
        return GeneralUtility::trimExplode(PHP_EOL, $this->videos, true);
    }

    /**
     * @param string $videos
     */
    public function setVideos($videos)
    {
        $this->videos = $videos;
    }

    /**
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string $linkTitle
     */
    public function getLinkTitle()
    {
        return $this->linkTitle;
    }

    /**
     * @param string $linkTitle
     */
    public function setLinkTitle($linkTitle)
    {
        $this->linkTitle = $linkTitle;
    }

    /**
     * @return null|string
     */
    public function getAtexZone()
    {
        return LocalizationUtility::translate("product.atex_zone.{$this->atexZone}", 'ecom_product_tools');
    }

    /**
     * @param integer $atexZone
     */
    public function setAtexZone($atexZone)
    {
        $this->atexZone = $atexZone;
    }

    /**
     * @return null|string
     */
    public function getNecDivision()
    {
        return LocalizationUtility::translate("product.nec_division.{$this->necDivision}", 'ecom_product_tools');
    }

    /**
     * @param integer $necDivision
     */
    public function setNecDivision($necDivision)
    {
        $this->necDivision = $necDivision;
    }

    /**
     * @return boolean
     */
    public function isIntrinsicallySafe()
    {
        return $this->getAtexZone() || $this->getNecDivision();
    }

    /**
     * @return string $output
     */
    public function getBadges()
    {
        $output = '';
        if ($this->badges & self::BADGE_NEW) {
            $output .= '<span class="label label-danger">NEW</span><div class="clearfix"></div>';
        }
        if ($this->badges & self::BADGE_ATEX && $this->getAtexZone()) {
            $output .= '<span class="label label-primary">' . $this->getAtexZone() . '</span><div class="clearfix"></div>';
        }
        if ($this->badges & self::BADGE_NEC && $this->getNecDivision()) {
            $output .= '<span class="label label-primary">' . $this->getNecDivision() . '</span><div class="clearfix"></div>';
        }
        if ($this->badges & self::BADGE_NON_EX && $this->isIntrinsicallySafe() === false) {
            $output .= '<span class="label label-warning">' . LocalizationUtility::translate("product.non_ex", 'ecom_product_tools') . '</span><div class="clearfix"></div>';
        }

        return $output;
    }

    /**
     * @param integer $badges
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
    }

    /**
     * @return \S3b0\EcomProductTools\Domain\Model\AccessoryCategory $accessoryCategory
     */
    public function getAccessoryCategory()
    {
        return $this->accessoryCategory;
    }

    /**
     * @param \S3b0\EcomProductTools\Domain\Model\AccessoryCategory $accessoryCategory
     */
    public function setAccessoryCategory(\S3b0\EcomProductTools\Domain\Model\AccessoryCategory $accessoryCategory)
    {
        $this->accessoryCategory = $accessoryCategory;
    }

    /**
     * @param \S3b0\EcomProductTools\Domain\Model\File $file
     */
    public function addFile(\S3b0\EcomProductTools\Domain\Model\File $file = null)
    {
        if ($file instanceof \S3b0\EcomProductTools\Domain\Model\File) {
            if ($this->files instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage === false) {
                $this->files = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            }
            if ($this->files->contains($file) === false) {
                $this->files->attach($file);
            }
        }
    }

    /**
     * @param \S3b0\EcomProductTools\Domain\Model\File $fileToRemove
     */
    public function removeFile(\S3b0\EcomProductTools\Domain\Model\File $fileToRemove = null)
    {
        if ($fileToRemove instanceof \S3b0\EcomProductTools\Domain\Model\File && $this->files instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage && $this->files->contains($fileToRemove)) {
            $this->files->detach($fileToRemove);
        }
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\File> $files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\File> $files
     */
    public function setFiles(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $files = null)
    {
        $this->files = $files instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage ? $files : new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return string
     */
    public function getLightboxGroup()
    {
        return 'lightbox' . preg_replace('/\D+/', '', md5($this->uid));
    }

}