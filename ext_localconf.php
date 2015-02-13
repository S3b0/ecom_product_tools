<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.' . $_EXTKEY,
	'Setcard',
	array(
		'Product' => 'showSetcard',
		'File' => 'listByCategory, listByProduct',
		
	),
	// non-cacheable actions
	array(
		'Product' => '',
		'File' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.' . $_EXTKEY,
	'Certifications',
	array(
		'Product' => 'showSetcard',
		'File' => 'listByCategory, listByProduct',
		
	),
	// non-cacheable actions
	array(
		'Product' => '',
		'File' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'S3b0.' . $_EXTKEY,
	'Downloadcenter',
	array(
		'Product' => 'showSetcard',
		'File' => 'listByCategory, listByProduct',
		
	),
	// non-cacheable actions
	array(
		'Product' => '',
		'File' => '',
		
	)
);
