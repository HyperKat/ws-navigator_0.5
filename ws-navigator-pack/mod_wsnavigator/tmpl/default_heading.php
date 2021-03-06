<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_ws-navigator
 *
 * @copyright   Copyright (C) 2015 Wolfgang Spies.
 */

defined('_JEXEC') or die;

$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';

if ($item->menu_image)
{
    $item->params->get('menu_text', 1) ?
    $linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
    $linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
}
else
{
    $linktype = $item->title;
}
?>
<span class="nav-header <?php echo $item->anchor_css; ?> menu-item" <?php echo $title; ?>><?php echo $linktype; ?></span>
