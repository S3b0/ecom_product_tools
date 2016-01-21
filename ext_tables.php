<?php
defined('TYPO3_MODE') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ecom_product_tools',
	'MarkUp',
	'Product Mark-Up'
);

$TCA['tt_content']['types']['list']['subtypes_addlist']['ecomproducttools_markup'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('ecomproducttools_markup', 'FILE:EXT:ecom_product_tools/Configuration/FlexForms/flexform_markup.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ecom_product_tools',
	'Certifications',
	'Product Certifications'
);

$TCA['tt_content']['types']['list']['subtypes_addlist']['ecomproducttools_compatibleproducts'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('ecomproducttools_compatibleproducts', 'FILE:EXT:ecom_product_tools/Configuration/FlexForms/flexform_compatible_products.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ecom_product_tools',
	'CompatibleProducts',
	'Compatible Products'
);

$TCA['tt_content']['types']['list']['subtypes_addlist']['ecomproducttools_certifications'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('ecomproducttools_certifications', 'FILE:EXT:ecom_product_tools/Configuration/FlexForms/flexform_certifications.xml');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ecom_product_tools',
	'DownloadCenter',
	'Download-Center'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('ecom_product_tools', 'Resources/Private/TypoScript', 'ecom Product Tools');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_approval', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_approval.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_certification', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_certification.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_file', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_file.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_language', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_language.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_product', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_product.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_productdivision', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_productdivision.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ecomproducttools_domain_model_productcategory', 'EXT:ecom_product_tools/Resources/Private/Language/locallang_csh_tx_ecomproducttools_domain_model_productcategory.xlf');

// Add Sprite Icons for different record types (visual distinction)
$resourcePath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ecom_product_tools') . 'Resources/Public/';
/** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
		'ecom-approval',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Icons/tx_ecomproducttools_domain_model_approval.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Abkhazia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Abkhazia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Abkhazia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Abkhazia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Afghanistan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Afghanistan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Aland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Aland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Albania',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Albania.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Algeria',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Algeria.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-American-Samoa',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/American-Samoa.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Andorra',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Andorra.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Angola',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Angola.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Anguilla',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Anguilla.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Antarctica',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Antarctica.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Antigua-and-Barbuda',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Antigua-and-Barbuda.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Argentina',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Argentina.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Armenia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Armenia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Aruba',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Aruba.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Australia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Australia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Austria',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Austria.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Azerbaijan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Azerbaijan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Bahamas',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Bahamas.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Bahrain',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Bahrain.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Bangladesh',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Bangladesh.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Barbados',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Barbados.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Basque-Country',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Basque-Country.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Belarus',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Belarus.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Belgium',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Belgium.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Belize',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Belize.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Benin',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Benin.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Bermuda',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Bermuda.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Bhutan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Bhutan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Bolivia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Bolivia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Bosnia-and-Herzegovina',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Bosnia-and-Herzegovina.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Botswana',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Botswana.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Brazil',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Brazil.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-British-Antarctic-Territory',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/British-Antarctic-Territory.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-British-Virgin-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/British-Virgin-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Brunei',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Brunei.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Bulgaria',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Bulgaria.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Burkina-Faso',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Burkina-Faso.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Burundi',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Burundi.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cambodia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cambodia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cameroon',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cameroon.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Canada',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Canada.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Canary-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Canary-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cape-Verde',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cape-Verde.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cayman-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cayman-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Central-African-Republic',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Central-African-Republic.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Chad',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Chad.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Chile',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Chile.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-China',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/China.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Christmas-Island',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Christmas-Island.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cocos-Keeling-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cocos-Keeling-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Colombia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Colombia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Commonwealth',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Commonwealth.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Comoros',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Comoros.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cook-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cook-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Costa-Rica',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Costa-Rica.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cote-dIvoire',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cote-dIvoire.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Croatia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Croatia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cuba',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cuba.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Curacao',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Curacao.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Cyprus',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Cyprus.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Czech-Republic',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Czech-Republic.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Democratic-Republic-of-the-Congo',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Democratic-Republic-of-the-Congo.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Denmark',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Denmark.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Djibouti',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Djibouti.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Dominica',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Dominica.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Dominican-Republic',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Dominican-Republic.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-East-Timor',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/East-Timor.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Ecuador',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Ecuador.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Egypt',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Egypt.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-El-Salvador',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/El-Salvador.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-England',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/England.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Equatorial-Guinea',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Equatorial-Guinea.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Eritrea',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Eritrea.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Estonia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Estonia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Ethiopia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Ethiopia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-European-Union',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/European-Union.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Falkland-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Falkland-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Faroes',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Faroes.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Fiji',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Fiji.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Finland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Finland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-France',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/France.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-French-Polynesia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/French-Polynesia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-French-Southern-Territories',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/French-Southern-Territories.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Gabon',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Gabon.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Gambia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Gambia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Georgia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Georgia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Germany',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Germany.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Ghana',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Ghana.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Gibraltar',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Gibraltar.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-GoSquared',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/GoSquared.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Greece',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Greece.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Greenland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Greenland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Grenada',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Grenada.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Guam',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Guam.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Guatemala',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Guatemala.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Guernsey',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Guernsey.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Guinea-Bissau',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Guinea-Bissau.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Guinea',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Guinea.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Guyana',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Guyana.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Haiti',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Haiti.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Honduras',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Honduras.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Hong-Kong',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Hong-Kong.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Hungary',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Hungary.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Iceland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Iceland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-India',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/India.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Indonesia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Indonesia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Iran',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Iran.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Iraq',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Iraq.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Ireland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Ireland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Isle-of-Man',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Isle-of-Man.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Israel',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Israel.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Italy',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Italy.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Jamaica',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Jamaica.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Japan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Japan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Jersey',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Jersey.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Jordan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Jordan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Kazakhstan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Kazakhstan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Kenya',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Kenya.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Kiribati',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Kiribati.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Kosovo',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Kosovo.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Kuwait',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Kuwait.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Kyrgyzstan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Kyrgyzstan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Laos',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Laos.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Latvia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Latvia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Lebanon',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Lebanon.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Lesotho',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Lesotho.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Liberia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Liberia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Libya',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Libya.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Liechtenstein',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Liechtenstein.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Lithuania',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Lithuania.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Luxembourg',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Luxembourg.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Macau',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Macau.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Macedonia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Macedonia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Madagascar',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Madagascar.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Malawi',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Malawi.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Malaysia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Malaysia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Maldives',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Maldives.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Mali',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Mali.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Malta',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Malta.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Mars',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Mars.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Marshall-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Marshall-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Martinique',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Martinique.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Mauritania',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Mauritania.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Mauritius',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Mauritius.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Mayotte',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Mayotte.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Mexico',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Mexico.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Micronesia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Micronesia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Moldova',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Moldova.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Monaco',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Monaco.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Mongolia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Mongolia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Montenegro',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Montenegro.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Montserrat',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Montserrat.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Morocco',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Morocco.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Mozambique',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Mozambique.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Myanmar',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Myanmar.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-NATO',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/NATO.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Nagorno-Karabakh',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Nagorno-Karabakh.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Namibia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Namibia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Nauru',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Nauru.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Nepal',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Nepal.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Netherlands-Antilles',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Netherlands-Antilles.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Netherlands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Netherlands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-New-Caledonia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/New-Caledonia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-New-Zealand',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/New-Zealand.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Nicaragua',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Nicaragua.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Niger',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Niger.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Nigeria',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Nigeria.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Niue',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Niue.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Norfolk-Island',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Norfolk-Island.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-North-Korea',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/North-Korea.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Northern-Cyprus',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Northern-Cyprus.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Northern-Mariana-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Northern-Mariana-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Norway',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Norway.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Olympics',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Olympics.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Oman',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Oman.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Pakistan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Pakistan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Palau',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Palau.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Palestine',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Palestine.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Panama',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Panama.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Papua-New-Guinea',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Papua-New-Guinea.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Paraguay',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Paraguay.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Peru',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Peru.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Philippines',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Philippines.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Pitcairn-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Pitcairn-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Poland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Poland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Portugal',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Portugal.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Puerto-Rico',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Puerto-Rico.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Qatar',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Qatar.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Red-Cross',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Red-Cross.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Republic-of-the-Congo',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Republic-of-the-Congo.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Romania',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Romania.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Russia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Russia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Rwanda',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Rwanda.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Saint-Barthelemy',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Saint-Barthelemy.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Saint-Helena',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Saint-Helena.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Saint-Kitts-and-Nevis',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Saint-Kitts-and-Nevis.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Saint-Lucia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Saint-Lucia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Saint-Martin',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Saint-Martin.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Saint-Vincent-and-the-Grenadines',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Saint-Vincent-and-the-Grenadines.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Samoa',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Samoa.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-San-Marino',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/San-Marino.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Sao-Tome-and-Principe',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Sao-Tome-and-Principe.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Saudi-Arabia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Saudi-Arabia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Scotland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Scotland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Senegal',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Senegal.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Serbia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Serbia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Seychelles',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Seychelles.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Sierra-Leone',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Sierra-Leone.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Singapore',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Singapore.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Slovakia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Slovakia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Slovenia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Slovenia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Solomon-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Solomon-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Somalia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Somalia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Somaliland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Somaliland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-South-Africa',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/South-Africa.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-South-Georgia-and-the-South-Sandwich-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/South-Georgia-and-the-South-Sandwich-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-South-Korea',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/South-Korea.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-South-Ossetia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/South-Ossetia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-South-Sudan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/South-Sudan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Spain',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Spain.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Sri-Lanka',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Sri-Lanka.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Sudan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Sudan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Suriname',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Suriname.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Swaziland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Swaziland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Sweden',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Sweden.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Switzerland',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Switzerland.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Syria',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Syria.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Taiwan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Taiwan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Tajikistan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Tajikistan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Tanzania',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Tanzania.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Thailand',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Thailand.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Togo',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Togo.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Tokelau',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Tokelau.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Tonga',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Tonga.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Trinidad-and-Tobago',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Trinidad-and-Tobago.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Tunisia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Tunisia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Turkey',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Turkey.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Turkmenistan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Turkmenistan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Turks-and-Caicos-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Turks-and-Caicos-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Tuvalu',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Tuvalu.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-US-Virgin-Islands',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/US-Virgin-Islands.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Uganda',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Uganda.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Ukraine',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Ukraine.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-United-Arab-Emirates',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/United-Arab-Emirates.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-United-Kingdom',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/United-Kingdom.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-United-Nations',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/United-Nations.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-United-States',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/United-States.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Unknown',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Unknown.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Uruguay',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Uruguay.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Uzbekistan',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Uzbekistan.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Vanuatu',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Vanuatu.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Vatican-City',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Vatican-City.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Venezuela',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Venezuela.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Vietnam',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Vietnam.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Wales',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Wales.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Wallis-And-Futuna',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Wallis-And-Futuna.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Western-Sahara',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Western-Sahara.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Worldwide',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Worldwide.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Yemen',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Yemen.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Zambia',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Zambia.png" ]
);
$iconRegistry->registerIcon(
		'ecom-approval-Zimbabwe',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Images/Flags/BE/Zimbabwe.png" ]
);
$iconRegistry->registerIcon(
		'ecom-certification-0',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Icons/tx_ecomproducttools_domain_model_certification_certification.png" ]
);
$iconRegistry->registerIcon(
		'ecom-certification-1',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Icons/tx_ecomproducttools_domain_model_certification_attestation.png" ]
);
$iconRegistry->registerIcon(
		'ecom-product-0',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Icons/tx_ecomproducttools_domain_model_product.png" ]
);
$iconRegistry->registerIcon(
		'ecom-product-1',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Icons/tx_ecomproducttools_domain_model_product_discontinued.png" ]
);
$iconRegistry->registerIcon(
		'ecom-file-external-url',
		\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
		[ 'source' => "{$resourcePath}Icons/tx_ecomproducttools_domain_model_file_external_url.png" ]
);