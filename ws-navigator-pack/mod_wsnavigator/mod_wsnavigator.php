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

$list		= ModMenuHelper::getList($params);
$base		= ModMenuHelper::getBase($params);
$active		= ModMenuHelper::getActive($params);
$active_id 	= $active->id;
$path		= $base->tree;
$logged     = ModMenuHelper::getType();
$config     = JFactory::getConfig();
$client     = JFactory::getApplication()->client;
$titel      = $config->get('sitename');
$showAll	= $params->get('showAllChildren');
$class_sfx	= htmlspecialchars($params->get('class_sfx'));
$doc        = JFactory::getDocument();
$app        = JFactory::getApplication();

$levelColors     = ModMenuHelper::getBevelColors(htmlspecialchars($params->get('mplevel_color')));
$levelFontColor  = ModMenuHelper::convertColor(htmlspecialchars($params->get('menu_fontcolor')), 'rgba(205,205,205');
$levelFontFilter = $params->get('mplevel_colorfilter');
$backColor       = ModMenuHelper::convertColor(htmlspecialchars($params->get('mpback_color')), 'rgba(205, 205, 205, 0.4)');
$backFontColor   = ModMenuHelper::convertColor(htmlspecialchars($params->get('mpback_fontcolor')), 'rgba(236, 235, 167');
$backFontFilter  = $params->get('mpback_colorfilter');

$navEffect  = $params->get('useanimation');
$scToTmpl   = $params->get('addscriptstotemplate');
$stToTmpl   = $params->get('addstylestotemplate');
$triggerTxt = htmlspecialchars($params->get('triggertext'));
$loginOn    = $params->get('useloginextension');
$tagRoot 	= '/modules/mod_wsnavigator';

$doc->addScript($tagRoot . '/js/modernizr.custom.js');
$doc->addScript($tagRoot . '/js/modernizr.custom.js');
$doc->addScript($tagRoot . '/js/ws-navigator.js');
$doc->addScript($tagRoot . '/js/navigation.js');
// Add Stylesheets
$doc->addStyleSheet($tagRoot . '/css/navigation.css');
if($client->browser == JApplicationWebClient::IE)
{
    $doc->addStyleSheet($styleRoot . '/css/ie.css');
}

if (count($list))
{
    require JModuleHelper::getLayoutPath('mod_wsnavigator', $params->get('layout', 'default'));
}
