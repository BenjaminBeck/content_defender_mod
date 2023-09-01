<?php
declare(strict_types=1);
namespace BDM\ContentDefenderMod\Hooks;

use IchHabRecht\ContentDefender\BackendLayout\ColumnConfigurationManipulationInterface;
use TYPO3\CMS\Backend\Utility\BackendUtility;

class ContentDefenderColumnConfigurationManipulationHook implements ColumnConfigurationManipulationInterface
{
    public function manipulateConfiguration(array $configuration, int $colPos, $recordUid): array
    {
        $requestIsFromWizard = false;
        $requestIsFromCtypeDropdown = false;

        if(isset($_REQUEST['id'])){
            $currentPageId = $_REQUEST['id'];
            $requestIsFromWizard = true;
        }
        if(isset($_GET['id'])){
            $currentPageId = $_GET['id'];
            $requestIsFromCtypeDropdown = true;
        }

        if((int) $currentPageId){
            $pageTsConfig = BackendUtility::getPagesTSconfig($currentPageId);
            $requestIsFromWizard = true;
        }
        if (
            isset($pageTsConfig["mod."])
            && isset($pageTsConfig["mod."]["web_layout."])
            && isset($pageTsConfig["mod."]["web_layout."]["BackendLayoutsDefault_for_content_defender_mod."])
            && isset($pageTsConfig["mod."]["web_layout."]["BackendLayoutsDefault_for_content_defender_mod."]["allowed."])
        ) {
            $defaultConfig = $pageTsConfig["mod."]["web_layout."]["BackendLayoutsDefault_for_content_defender_mod."];
            if(!isset($configuration['allowed.']) && !isset($configuration['disallowed.'])){
                // no config - use default:
                foreach($defaultConfig as $key => $value){
                    $configuration[$key] = $value;
                }
            }
        }
        return $configuration;
    }
}
