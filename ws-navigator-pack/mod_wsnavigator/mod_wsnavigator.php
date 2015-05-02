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
$titel      = $config->get('sitename');
$showAll	= $params->get('showAllChildren');
$class_sfx	= htmlspecialchars($params->get('class_sfx'));
$doc        = JFactory::getDocument();
$app        = JFactory::getApplication();
$scToTmpl = $params->get('addscriptstotemplate');
$scriptRoot = ($scToTmpl != null && $scToTmpl > 0)? '/templates/' . $app->getTemplate(): '/modules/mod_wsnavigator';

$doc->addScript($scriptRoot . '/js/snap.svg-min.js');
$doc->addScript($scriptRoot . '/js/ws-navigator.js');
// Add Stylesheets
$doc->addStyleSheet($scriptRoot . '/css/navigation.css');

//always in template
$doc->addScript('/templates/' . $app->getTemplate() . '/js/navigation.js');


if (count($list))
{
    require JModuleHelper::getLayoutPath('mod_wsnavigator', $params->get('layout', 'default'));
}
