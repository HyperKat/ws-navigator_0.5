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

$doc->addScript(JURI::base() . '/templates/' . $app->getTemplate() . '/js/snap.svg-min.js');
$doc->addScript(JURI::base() . '/templates/' . $app->getTemplate() . '/js/ws-navigator.js');
$doc->addScript(JURI::base() . '/templates/' . $app->getTemplate() . '/js/navigation.js');

// Add Stylesheets
$doc->addStyleSheet(JURI::base() . '/templates/' . $app->getTemplate() . '/css/navigation.css');
if (count($list))
{
    require JModuleHelper::getLayoutPath('mod_wsnavigator', $params->get('layout', 'default'));
}
