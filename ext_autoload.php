<?php
/**
 * Created by PhpStorm.
 * User: sebo
 * Date: 03.03.15
 * Time: 14:17
 */

	$extensionClassesPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('ecom_product_tools') . 'Classes/';

	return array(
		'TYPO3\CMS\Fluid\ViewHelpers\Link\TypolinkViewHelper' => $extensionClassesPath . 'ViewHelpers/Link/TypolinkViewHelper.php',
		'TYPO3\CMS\Fluid\ViewHelpers\S3b0\Format\BytesViewHelper' => $extensionClassesPath . 'ViewHelpers/S3b0/Format/BytesViewHelper.php',
		'TYPO3\CMS\Fluid\ViewHelpers\S3b0\GetLocalizedCategoryTitleViewHelper' => $extensionClassesPath . 'ViewHelpers/S3b0/GetLocalizedCategoryTitleViewHelper.php'
	);