<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.EcomProductTools',
	'MarkUp',
	[ 'Product' => 'showMarkUp' ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.EcomProductTools',
	'Certifications',
	[ 'Product' => 'listApprovals' ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.EcomProductTools',
	'DownloadCenter',
	[
		'DefaultAction' => 'downloadCenter',
		/*'File' => 'listByCategory, listByProduct',*/
		'AjaxRequest' => 'getProductCategoriesByProductDivision, getProductsByProductCategory, getProductData'

	],
	// non-cacheable actions
	[
		'DefaultAction' => 'downloadCenter',
		/*'File' => 'listByCategory, listByProduct',*/
		'AjaxRequest' => 'getProductCategoriesByProductDivision, getProductsByProductCategory, getProductData'
	]
);

$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['EcomProductTools'] = 'EXT:ecom_product_tools/Classes/Utility/AjaxDispatcher.php';