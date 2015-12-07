<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Vendor.' . $_EXTKEY,
	'Pi1',
	array(
		'Plz' => 'form, ajaxjson',
		
	),
	// non-cacheable actions
	array(
		'Plz' => 'form, ajaxjson',
		
	),
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
