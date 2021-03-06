<?php

namespace S3b0\EcomProductTools\Utility;

/***************************************************************
 * Copyright notice
 *
 * 2015 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
 * All rights reserved
 *
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Core\Utility as CoreUtility;

/**
 * Class AjaxDispatcher
 *
 * @author Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
 */
class AjaxDispatcher extends \Ecom\EcomToolbox\Utility\AjaxDispatcher
{

    protected $defaultVendorName     = 'S3b0';
    protected $defaultExtensionName  = 'EcomProductTools';
    protected $defaultPluginName     = 'ecomproducttools_downloadcenter';
    protected $defaultControllerName = 'AjaxRequest';
    protected $defaultActionName     = 'getProductCategoriesByProductDivision';
    protected $pageType              = 1425988258;

}

global $TYPO3_CONF_VARS;

/** !!! IMPORTANT TO MAKE JSON WORK !!! */
$TYPO3_CONF_VARS[ 'FE' ][ 'debug' ] = '0';

/** @var \S3b0\EcomProductTools\Utility\AjaxDispatcher $dispatcher */
$dispatcher = CoreUtility\GeneralUtility::makeInstance(\S3b0\EcomProductTools\Utility\AjaxDispatcher::class);

// ATTENTION! Dispatcher first needs to be initialized here!!!
echo $dispatcher
    ->init($TYPO3_CONF_VARS)
    ->dispatch();

?>
