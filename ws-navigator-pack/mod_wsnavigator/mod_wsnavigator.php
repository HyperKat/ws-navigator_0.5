<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_ws-navigator
 *
 * @copyright   Copyright (C) 2015 Wolfgang Spies.
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';
require_once __DIR__ . '/styleHelper.php';

$dir 				= __DIR__;
$list				= ModMenuHelper::getList($params);
$base				= ModMenuHelper::getBase($params);
$active				= ModMenuHelper::getActive($params);
$active_id 			= $active->id;
$path				= $base->tree;
$logged     		= ModMenuHelper::getType();
$config     		= JFactory::getConfig();
$client     		= JFactory::getApplication()->client;
$titel      		= $config->get('sitename');
$showAll			= $params->get('showAllChildren');
$class_sfx			= htmlspecialchars($params->get('class_sfx'));
$doc        		= JFactory::getDocument();
$app        		= JFactory::getApplication();
$lang	 			= JFactory::getLanguage()->getTag();

$loginOn    		= $params->get('useloginextension');
$navEffect  		= $params->get('useanimation');
$useGoogleFont 		= $params->get('useGoogleFont');
$txtTransform		= $params->get('texttransform');
$levelPreview		= (int)$params->get('mplevelPreview');
$navEffectStyle 	= ModMenuStyleHelper::getNavEffectStyle($navEffect);


$levelColors     	= ModMenuStyleHelper::getBevelColors(htmlspecialchars($params->get('mplevel_color')));
$levelFontColors  	= ModMenuStyleHelper::getColorArray($params, 'mplevel');
$levelFontSize  	= $params->get('mplevel_fontSize');

$mpBackColors      	= ModMenuStyleHelper::getColorArray($params, 'mpback');
$backTitel 			= ($lang == 'de-DE')? 'zurück' : 'back';

$triggerContent		= ModMenuStyleHelper::getTriggerContentStyle($params);
$trigClass_sfx		= htmlspecialchars($params->get('triggerclass_sfx'));
$trigBorder			= ModMenuStyleHelper::getTriggerBorderStyle($params); 
$triggerColors		= ModMenuStyleHelper::getColorArray($params, 'trigger');
$trigUseImg			= (int)$params->get('trigger_usetext');
$trigImg			= $params->get('trigger_image');

$prevHeader			= ($lang == 'de-DE')? 'Vorschau' : 'Preview';

$doc->addScript('/modules/mod_wsnavigator/js/classie.js');
$doc->addScript('/modules/mod_wsnavigator/js/modernizr.custom.js');
$doc->addScript('/modules/mod_wsnavigator/js/navigation.js');

if (count($list))
{
    require JModuleHelper::getLayoutPath('mod_wsnavigator', $params->get('layout', 'default'));
}
