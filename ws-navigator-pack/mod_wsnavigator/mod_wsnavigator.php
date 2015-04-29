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

$doc->addScript('/modules/mod_wsnavigator/js/snap.svg-min.js');
$doc->addScript('/modules/mod_wsnavigator/js/ws-navigator.js');
$doc->addScript('/templates/' . $app->getTemplate() . '/js/navigation.js');

// Add Stylesheets
$doc->addStyleSheet('/modules/mod_wsnavigator/css/navigation.css');
if (count($list))
{
    require JModuleHelper::getLayoutPath('mod_wsnavigator', $params->get('layout', 'default'));
}
