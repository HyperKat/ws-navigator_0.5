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

$navEffect  = $params->get('useanimation');
$colors     = ModMenuHelper::getBevelColors($params);
$scToTmpl   = $params->get('addscriptstotemplate');
$stToTmpl   = $params->get('addstylestotemplate');
$triggerTxt = htmlspecialchars($params->get('triggertext'));
$loginOn    = $params->get('useloginextension');
$scriptRoot = ($scToTmpl != null && $scToTmpl > 0)? '/templates/' . $app->getTemplate(): '/modules/mod_wsnavigator';
$styleRoot  = ($stToTmpl != null && $stToTmpl > 0)? '/templates/' . $app->getTemplate(): '/modules/mod_wsnavigator';

$doc->addScript($scriptRoot . '/js/modernizr.custom.js');
$doc->addScript($scriptRoot . '/js/modernizr.custom.js');
$doc->addScript($scriptRoot . '/js/snap.svg-min.js');
$doc->addScript($scriptRoot . '/js/ws-navigator.js');
$doc->addScript($scriptRoot . '/js/navigation.js');
// Add Stylesheets
$doc->addStyleSheet($styleRoot . '/css/navigation.css');
if($client->browser == JApplicationWebClient::IE)
{
    $doc->addStyleSheet($styleRoot . '/css/ie.css');
}

if (count($list))
{
    require JModuleHelper::getLayoutPath('mod_wsnavigator', $params->get('layout', 'default'));
}
