<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Setcard',
	'Product setcard'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Certifications',
	'Product certifications'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Downloadcenter',
	'Download center'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'ecom Product Tools');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_approval', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_approval.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_attestation', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_attestation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_certification', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_certification.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_file', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_file.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_language', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_language.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_product', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_product.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_productdivision', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_productdivision.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_productcategory', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_productcategory.xlf');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
    'tx_ecomproducttools_domain_model_file'
);
