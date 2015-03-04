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
		'File' => 'listByCategory, listByProduct',

	),
	// non-cacheable actions
	array(
		'Action' => 'downloadCenter',
		'ProductCategory' => 'listByDivision',
		'File' => 'listByCategory, listByProduct',
	)
);
