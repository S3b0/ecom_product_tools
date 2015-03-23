<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.' . $_EXTKEY,
	'MarkUp',
	array(
		'Product' => 'showMarkUp',
	),
	// non-cacheable actions
	array()
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.' . $_EXTKEY,
	'Certifications',
	array(
		'Product' => 'listApprovals',
	),
	// non-cacheable actions
	array()
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.' . $_EXTKEY,
	'DownloadCenter',
	array(
		'Action' => 'downloadCenter',
		'ProductCategory' => 'listByDivision',
		/*'File' => 'listByCategory, listByProduct',*/
		'AjaxRequest' => 'getProductData',
		'JsonRequest' => 'getProductCategoriesByProductDivision, getProductsByProductCategory'

	),
	// non-cacheable actions
	array(
		'Action' => 'downloadCenter',
		'ProductCategory' => 'listByDivision',
		/*'File' => 'listByCategory, listByProduct',*/
		'AjaxRequest' => 'getProductData',
		'JsonRequest' => 'getProductCategoriesByProductDivision, getProductsByProductCategory'
	)
);

$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['EcomProductTools'] = 'EXT:ecom_product_tools/Classes/Utility/AjaxDispatcher.php';