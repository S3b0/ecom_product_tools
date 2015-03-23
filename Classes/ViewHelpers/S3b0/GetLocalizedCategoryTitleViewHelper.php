<?php
namespace TYPO3\CMS\Fluid\ViewHelpers\S3b0;

/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        */


class GetLocalizedCategoryTitleViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Render
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
	 * @param int                                      $language
	 *
	 * @return mixed|string
	 */
	public function render(\TYPO3\CMS\Extbase\Domain\Model\Category $category, $language = 0) {
		if ( $language ) {
			/** @var \TYPO3\CMS\Core\Database\DatabaseConnection $db */
			$db = $GLOBALS['TYPO3_DB'];
			$row = $db->exec_SELECTgetSingleRow('title', 'sys_category', 'l10n_parent=' . $category->getUid() . ' AND sys_language_uid=' . $language . \TYPO3\CMS\Backend\Utility\BackendUtility::BEenableFields('sys_category'));
			return $row['title'] ?: $category->getTitle();
		} else {
			return $category->getTitle();
		}
	}

}