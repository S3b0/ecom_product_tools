<?php
/**
 * Created by PhpStorm.
 * User: sebo
 * Date: 06.03.15
 * Time: 07:37
 */

namespace S3b0\EcomProductTools\Utility;

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

/**
 * Class ModifyTCA
 */
class ModifyTCA {

	/**
	 * labelUserFuncTxEcompcDomainModelOption function.
	 *
	 * @param array                              $PA
	 * @param \TYPO3\CMS\Backend\Form\FormEngine $pObj
	 *
	 * @return void
	 */
	public function labelUserFuncEPTDomainModelFile(array &$PA, \TYPO3\CMS\Backend\Form\FormEngine $pObj = NULL) {
		$row = $PA['row'];
		$PA['title'] = $row['title'];
		$raw = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($PA['table'], $row['uid']);

		if ( !$row['title'] ) {
			$mapping = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordRaw('sys_category_record_mm', 'uid_foreign=' . $raw['uid'] . ' AND tablenames=\'' . $PA['table'] . '\'');
			$category = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('sys_category', $mapping['uid_local'], '*', \TYPO3\CMS\Backend\Utility\BackendUtility::BEenableFields('sys_category'));
			$PA['title'] = $category['title'];
		}

		$language = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ecomproducttools_domain_model_language', $raw['language'], 'title', \TYPO3\CMS\Backend\Utility\BackendUtility::BEenableFields('tx_ecomproducttools_domain_model_language'));
		$PA['title'] .= ' ' . ($raw['append_to_title'] ?: '') . ' | ' . ucfirst($language['title']);
	}

}
