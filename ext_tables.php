<?php
defined('TYPO3') || die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['content_defender']['ColumnConfigurationManipulationHook']['content_defender_mod']  =
    \BDM\ContentDefenderMod\Hooks\ContentDefenderColumnConfigurationManipulationHook::class;
