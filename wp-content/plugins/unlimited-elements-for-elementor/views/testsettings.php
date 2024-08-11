<?php
/**
 * @package Unlimited Elements
 * @author unlimited-elements.com
 * @copyright (C) 2021 Unlimited Elements, All Rights Reserved. 
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * */
defined('UNLIMITED_ELEMENTS_INC') or die('Restricted access');



function ueCheckCatalog(){
	
	$webAPI = new UniteCreatorWebAPI();

	$response = $webAPI->checkUpdateCatalog();

	$lastAPIData = $webAPI->getLastAPICallData();
	
	$arrAddons = $webAPI->getCatalogAddonsByTags(UniteCreatorWebAPI::TAG_ANIMATION);
	
	dmp("addons that support animation");
	
	dmp($arrAddons);
	exit();
	
	
}

function checkSomeFunc(){

	
	$data = array(
		"id"=>100
	);
	
	
	$addons = new UniteCreatorAddons();
	
	$html = $addons->getAddonSettingsHTMLFromData($data);
	
	
	
	dmp(htmlspecialchars($html));
	exit();
	
	/*
	
	$operations = new ProviderOperationsUC();
	
	$data = array(
		"post_ids"=>array(125)
	);
	
	dmp($data);
	
	$arrData = $operations->getSelect2TermsTitles($data);
	
	dmp("check");
	dmp($arrData);	
	
	*/
}


checkSomeFunc();


exit();

