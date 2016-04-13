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
use Ecom\EcomToolbox\Domain\Model\Language;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * A file relation providing detail on files not delivered with FAL
 */
class File extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var \DateTime
     */
    protected $crdate = null;

    /**
     * The fileReference
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $fileReference = null;

    /**
     * The externalUrl
     *
     * @var string
     */
    protected $externalUrl = '';

    /**
     * File title to be displayed
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * String to append to tile, if any
     *
     * @var string
     */
    protected $appendToTitle = '';

    /**
     * Last modification date
     *
     * @var \DateTime
     */
    protected $lastModification;

    /**
     * The file revision#, if any
     *
     * @var string
     */
    protected $revision = '';

    /**
     * Assigned approval
     *
     * @var \S3b0\EcomProductTools\Domain\Model\Approval
     */
    protected $approval = null;

    /**
     * File content language
     *
     * @var \Ecom\EcomToolbox\Domain\Model\Language
     */
    protected $language = null;

    /**
     * Affected products
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product>
     */
    protected $products = null;

    /**
     * TYPO3 CMS fileCategories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $fileCategories = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->products = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->fileCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the fileReference
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
     */
    public function getFileReference()
    {
        return $this->fileReference;
    }

    /**
     * Sets the fileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference
     *
     * @return void
     */
    public function setFileReference(\TYPO3\CMS\Extbase\Domain\Model\FileReference $fileReference)
    {
        $this->fileReference = $fileReference;
    }

    /**
     * Returns the externalUrl
     *
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->externalUrl;
    }

    /**
     * Sets the externalUrl
     *
     * @param string $externalUrl
     */
    public function setExternalUrl($externalUrl)
    {
        $this->externalUrl = $externalUrl;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        if ($this->title) {
            return $this->title;
        } elseif ($this->language instanceof Language && $this->getFileCategory()->_languageUid !== $this->language->getSysLanguage()) { // If current language differs from file language
            /** @var \TYPO3\CMS\Core\Database\DatabaseConnection $db */
            $db = $GLOBALS[ 'TYPO3_DB' ];
            $row = $db->exec_SELECTgetSingleRow('title', 'sys_category', "l10n_parent={$this->getFileCategory()->getUid()} AND sys_language_uid={$this->language->getSysLanguage()}" . BackendUtility::BEenableFields('sys_category'));
            // If no translation exists, fetch default!
            if (!$row) {
                $row = $db->exec_SELECTgetSingleRow('title', 'sys_category', "uid={$this->getFileCategory()->getUid()}" . BackendUtility::BEenableFields('sys_category'));
            }

            return ($row && $row[ 'title' ] ? $row[ 'title' ] : $this->getFileCategory()->getTitle()) . " {$this->getAppendToTitle()}";
        } else {
            return $this->getFileCategory()->getTitle() . $this->getAppendToTitle();
        }
    }

    /**
     * Sets the title
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getAppendToTitle()
    {
        return ' ' . $this->appendToTitle;
    }

    /**
     * Sets the title
     *
     * @param string $appendToTitle
     */
    public function setAppendToTitle($appendToTitle)
    {
        $this->appendToTitle = $appendToTitle;
    }

    /**
     * Returns the lastModification
     *
     * @return \DateTime $lastModification
     */
    public function getLastModification()
    {
        return $this->lastModification;
    }

    /**
     * Sets the lastModification
     *
     * @param \DateTime $lastModification
     *
     * @return void
     */
    public function setLastModification(\DateTime $lastModification)
    {
        $this->lastModification = $lastModification;
    }

    /**
     * Returns the revision
     *
     * @return string $revision
     */
    public function getRevision()
    {
        return $this->revision ?: '-';
    }

    /**
     * Sets the revision
     *
     * @param string $revision
     *
     * @return void
     */
    public function setRevision($revision)
    {
        $this->revision = $revision;
    }

    /**
     * Returns the approval
     *
     * @return \S3b0\EcomProductTools\Domain\Model\Approval $approval
     */
    public function getApproval()
    {
        return $this->approval;
    }

    /**
     * Sets the approval
     *
     * @param \S3b0\EcomProductTools\Domain\Model\Approval $approval
     *
     * @return void
     */
    public function setApproval(\S3b0\EcomProductTools\Domain\Model\Approval $approval)
    {
        $this->approval = $approval;
    }

    /**
     * Returns the language
     *
     * @return \Ecom\EcomToolbox\Domain\Model\Language $language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Sets the language
     *
     * @param \Ecom\EcomToolbox\Domain\Model\Language $language
     *
     * @return void
     */
    public function setLanguage(\Ecom\EcomToolbox\Domain\Model\Language $language = null)
    {
        $this->language = $language;
    }

    /**
     * Adds a Product
     *
     * @param \S3b0\EcomProductTools\Domain\Model\Product $product
     *
     * @return void
     */
    public function addProduct(\S3b0\EcomProductTools\Domain\Model\Product $product)
    {
        $this->products->attach($product);
    }

    /**
     * Removes a Product
     *
     * @param \S3b0\EcomProductTools\Domain\Model\Product $productToRemove The Product to be removed
     *
     * @return void
     */
    public function removeProduct(\S3b0\EcomProductTools\Domain\Model\Product $productToRemove)
    {
        $this->products->detach($productToRemove);
    }

    /**
     * Returns the products
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product> $products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Sets the products
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\EcomProductTools\Domain\Model\Product> $products
     *
     * @return void
     */
    public function setProducts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $products = null)
    {
        $this->products = $products;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $fileCategory
     *
     * @return void
     */
    public function addFileCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $fileCategory)
    {
        $this->fileCategories->attach($fileCategory);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $fileCategoryToRemove The Category to be removed
     *
     * @return void
     */
    public function removeFileCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $fileCategoryToRemove)
    {
        $this->fileCategories->detach($fileCategoryToRemove);
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    public function getFileCategories()
    {
        return $this->fileCategories;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $fileCategories
     */
    public function setFileCategories($fileCategories = null)
    {
        $this->fileCategories = $fileCategories;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\Category
     */
    public function getFileCategory()
    {
        return $this->fileCategories->current();
    }

    /**
     * FLUID HELPERS (file.{pseudoProperty})
     * avoiding some if-else loops, making fluid easier to read
     */

    /**
     * @return array
     */
    public function getInfo()
    {
        $lastModifiedDate = null;
        if ($this->lastModification instanceof \DateTime) {
            $lastModifiedDate = $this->lastModification;
        } elseif ($this->fileReference instanceof \TYPO3\CMS\Extbase\Domain\Model\FileReference) {
            $lastModifiedDate = $this->fileReference->getOriginalResource()->getCreationTime();
        } elseif ($this->crdate instanceof \DateTime) {
            $lastModifiedDate = $this->crdate;
        }

        if ($this->fileReference instanceof \TYPO3\CMS\Extbase\Domain\Model\FileReference) {
            return [
                'link'         => $this->fileReference->getOriginalResource()->getPublicUrl(),
                'type'         => $this->fileReference->getOriginalResource()->getExtension(),
                'size'         => $this->formatSize($this->fileReference->getOriginalResource()->getSize()),
                'lastModified' => $lastModifiedDate
            ];
        } elseif (GeneralUtility::isValidUrl($this->externalUrl)) {
            /** @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $cObj */
            $cObj = GeneralUtility::makeInstance(\TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer::class);
            $typolinkParams = GeneralUtility::unQuoteFilenames($this->externalUrl, true);
            $url = $typolinkParams[ 0 ];
            $file = new \SplFileInfo($url);

            return [
                'link'         => $cObj->getTypoLink_URL($this->externalUrl),
                'type'         => $file->getExtension() ?: 'URI',
                'size'         => $file->isReadable() ? $this->formatSize($file->getSize()) : 'n/a',
                'lastModified' => $lastModifiedDate
            ];
        } else {
            return [
                'link'         => '#',
                'type'         => '',
                'size'         => 'n/a',
                'lastModified' => $lastModifiedDate
            ];
        }
    }

    /**
     * @return boolean
     */
    public function isUri()
    {
        return (bool)preg_match('/^(php\d?|html?|uri)$/i', $this->getInfo()[ 'type' ]);
    }

    /**
     * @return string
     */
    public function getSha1()
    {
        return $this->fileReference instanceof \TYPO3\CMS\Extbase\Domain\Model\FileReference ? $this->fileReference->getOriginalResource()->getSha1() : '-';
    }

    /**
     * @param int $value
     *
     * @return mixed
     * @throws \TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException
     */
    protected function formatSize($value = 0)
    {
        $units = GeneralUtility::trimExplode('|', LocalizationUtility::translate('file_size_units', 'ecom_toolbox'), true) ?: [
            'B',
            'KB',
            'MB',
            'GB',
            'TB',
            'PB',
            'EB',
            'ZB',
            'YB'
        ];
        /** @var ConfigurationManager $configurationManager */
        $configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);
        $settings = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);

        if (!is_integer($value) && !is_float($value)) {
            if (is_numeric($value)) {
                $value = (float)$value;
            } else {
                $value = 0;
            }
        }
        $bytes = max($value, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(2, (10 * $pow));

        return sprintf(
            '%s %s',
            number_format(round($bytes, 8), 2, $settings[ 'decimalSeparator' ], $settings[ 'thousandsSeparator' ]),
            $units[ $pow ]
        );
    }

}