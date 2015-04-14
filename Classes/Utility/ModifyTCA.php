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
	 * labelUserFuncEPTDomainModelApproval function.
	 *
	 * @param array                              $PA
	 * @param \TYPO3\CMS\Backend\Form\FormEngine $pObj
	 *
	 * @return void
	 */
	public function labelUserFuncEPTDomainModelApproval(array &$PA, \TYPO3\CMS\Backend\Form\FormEngine $pObj = NULL) {
		$row = $PA['row'];
		$PA['title'] = $row['title'];
		$raw = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($PA['table'], $row['uid']) ?: array();
		$this->getApprovalLabelAddition($PA, $raw, $PA['title']);
	}

	/**
	 * labelUserFuncEPTDomainModelCertification function.
	 *
	 * @param array                              $PA
	 * @param \TYPO3\CMS\Backend\Form\FormEngine $pObj
	 *
	 * @return void
	 */
	public function labelUserFuncEPTDomainModelCertification(array &$PA, \TYPO3\CMS\Backend\Form\FormEngine $pObj = NULL) {
		$row = $PA['row'];
		$PA['title'] = $row['title'];
		$raw = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($PA['table'], $row['uid']);
		$approval = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ecomproducttools_domain_model_approval', $raw['approval']);
		$approvalAtList = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ecomproducttools_domain_model_approval', $raw['approval_at_list']);

		if ( is_array($approval) ) {
			$PA['title'] .= ', ' . ($approval['markup_label'] ?: $approval['title']);
			$this->getApprovalLabelAddition($PA, $approval);
		}

		if ( $approvalAtList && !preg_match('/' . preg_quote($approvalAtList['markup_label'], '/') . '/i', $PA['title']) ) {
			$PA['title'] .= ' | ' . ($approvalAtList['markup_label'] ?: $approvalAtList['title']);
		}
	}

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

		$PA['title'] .= ' ' . ($raw['append_to_title'] ?: '') . ' | ' . ucfirst($language['title']);
		if ( \TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($raw['language']) && $raw['language'] > 0 ) {
			$language = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord('tx_ecomproducttools_domain_model_language', $raw['language'], 'title', \TYPO3\CMS\Backend\Utility\BackendUtility::BEenableFields('tx_ecomproducttools_domain_model_language'));
			$PA['title'] .= ucfirst($language['title']);
		} else {
			$PA['title'] .= ucfirst(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:ecom_product_tools/Resources/Private/Language/locallang_db.xlf:tx_ecomproducttools_domain_model_file.language.I.0', 'ecomProductTools'));
		}
	}

	/**
	 * getApprovalLabelAddition function.
	 *
	 * @param array  $PA
	 * @param array  $approval
	 * @param string $title
	 *
	 * @return void
	 */
	private function getApprovalLabelAddition(array &$PA, array $approval = array(), $title = '') {
		$checkForDuplicates = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordsByField('tx_ecomproducttools_domain_model_approval', 'title', $title ?: $approval['title']);

		if ( count((array)$checkForDuplicates) > 1 ) {
			$markups = array();
			$icons = array();
			foreach ( $checkForDuplicates as $record ) {
				$markups[] = $record['markup_label'];
				$icons[] = $record['icon'];
			}

			if ( count(array_unique($markups)) > 1 ) {
				$PA['title'] .= ' [markup:' . $approval['markup_label'] . ']';
			} else {
				$PA['title'] .= ' [icon:' . $approval['icon'] . ']';
			}
		}
	}

}
