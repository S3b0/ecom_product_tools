<?php
/**
 * Created by PhpStorm.
 * User: sebo
 * Date: 03.03.15
 * Time: 14:17
 */

$extensionClassesPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('ecom_product_tools') . 'Classes/';

return [
    'TYPO3\CMS\Fluid\ViewHelpers\S3b0\GetLocalizedCategoryTitleViewHelper' => $extensionClassesPath . 'ViewHelpers/S3b0/GetLocalizedCategoryTitleViewHelper.php'
];