<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


/**
 * Helper for mod_wsnavigator
 *
 * @package     Joomla.Site
 * @subpackage  mod_wsnavigator
 * @since       3.1
 */
class ModMenuHelper
{
	public static function hex2rgb($hex) 
	{
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) 
	   {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } 
	   else 
	   {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		return $rgb; // returns an array with the rgb values
	}
	public static function rgb2hex($rgb) 
	{
	    $hex = "#";
	    $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
	    $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
	    $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

	    return $hex; // returns the hex value including the number sign (#)
	}
	
	public static function convertColor($color, $default)
	{
		$t = $color;
		if( strlen($t) > 0 && strpos($t,'#') == 0 )
		{
			return 'rgba(' . implode(',',self::hex2rgb($t));
		}
		return $default;
	}
    /**
     * Get a list of the menu items.
     *
     * @param   \Joomla\Registry\Registry  &$params  The module options.
     *
     * @return  array
     *
     * @since   1.5
     */
    public static function getReturnURL($params, $type)
    {
        $app	= JFactory::getApplication();
        $item   = $app->getMenu()->getItem($params->get($type));

        if ($item)
        {
            $vars = $item->query;
        }
        else
        {
            // Stay on the same page
            $vars = $app::getRouter()->getVars();
        }

        return base64_encode('index.php?' . JUri::buildQuery($vars));
    }
    public static function getBevelColors($ps)
    {
        $len = self::countBevels();

        if(!is_array(explode(';',$ps)) && ( strlen($ps) < 1 || is_null($ps) ) )
        {
            $rgba = 22;
            $mpColorTbl = array();

            for($i = 0; $i < $subMenLen; $i++)
            {
				$mpColorTbl[$i] = 'rgba(' . $rgba . ',' . $rgba . ',' . $rgba . ',1)';
				$rgba += $i+5;
            }
            return $mpColorTbl;
        }
        if(is_array(explode(';',$ps)))
        {
            $bevelcolors = explode(';',$ps);
        }
        else
        {
            $me = $bevelcolors;
            $bevelcolors = array();
            $bevelcolors[1] = $me;
        }
		foreach ($bevelcolors as $i => $col)
		{
			if(strpos(trim($col),'rgba') < 0)
				$col = 'rgba(' . implode(',',self::hex2rgb($col)) . ')';
		}
        $fl = count($bevelcolors);
        $t = $len - $fl;
        $i = 0;
        while( $t > 0 )
        {
            
            $bevelcolors[count($bevelcolors)] = $bevelcolors[$i];
            $t--;
            $i++;
        }
        return $bevelcolors;
    }
    public static function countBevels()
    {
        return count(JFactory::getUser()->getAuthorisedViewLevels());
    }

    public static function walk($val, $key, $delim, &$new_array) {
        $nums = explode($delim,$val);
        $new_array[$nums[0]] = $nums[1];
    }
    /**
     * Returns the current users type
     *
     * @return string
     */
    public static function getType()
    {
        $user = JFactory::getUser();

        return (!$user->get('guest')) ? 'logout' : 'login';
    }

    /**
     * Get list of available two factor methods
     *
     * @return array
     */
    public static function getTwoFactorMethods()
    {
        require_once JPATH_ADMINISTRATOR . '/components/com_users/helpers/users.php';

        return UsersHelper::getTwoFactorMethods();
    }

    public static function getList(&$params)
    {
        $app = JFactory::getApplication();
        $menu = $app->getMenu();

        // Get active menu item
        $base = self::getBase($params);
        $user = JFactory::getUser();
        $levels = $user->getAuthorisedViewLevels();
        asort($levels);
        $key = 'menu_items' . $params . implode(',', $levels) . '.' . $base->id;
        $cache = JFactory::getCache('mod_menu', '');

        if (!($items = $cache->get($key)))
        {
            $path    = $base->tree;
            $start   = (int) $params->get('startLevel');
            $end     = (int) $params->get('endLevel');
            $showAll = $params->get('showAllChildren');
            $items   = $menu->getItems('menutype', $params->get('menutype'));

            $lastitem = 0;

            if ($items)
            {
                foreach ($items as $i => $item)
                {
                    if (($start && $start > $item->level)
                        || ($end && $item->level > $end)
                        || (!$showAll && $item->level > 1 && !in_array($item->parent_id, $path))
                        || ($start > 1 && !in_array($item->tree[$start - 2], $path)))
                    {
                        unset($items[$i]);
                        continue;
                    }

                    $item->deeper     = false;
                    $item->shallower  = false;
                    $item->level_diff = 0;

                    if (isset($items[$lastitem]))
                    {
                        $items[$lastitem]->deeper     = ($item->level > $items[$lastitem]->level);
                        $items[$lastitem]->shallower  = ($item->level < $items[$lastitem]->level);
                        $items[$lastitem]->level_diff = ($items[$lastitem]->level - $item->level);
                    }

                    $item->parent = (boolean) $menu->getItems('parent_id', (int) $item->id, true);

                    $lastitem     = $i;
                    $item->active = false;
                    $item->flink  = $item->link;

                    // Reverted back for CMS version 2.5.6
                    switch ($item->type)
                    {
                        case 'separator':
                        case 'heading':
                            // No further action needed.
                            continue;

                        case 'url':
                            if ((strpos($item->link, 'index.php?') === 0) && (strpos($item->link, 'Itemid=') === false))
                            {
                                // If this is an internal Joomla link, ensure the Itemid is set.
                                $item->flink = $item->link . '&Itemid=' . $item->id;
                            }
                            break;

                        case 'alias':
                            $item->flink = 'index.php?Itemid=' . $item->params->get('aliasoptions');
                            break;

                        default:
                            $item->flink = 'index.php?Itemid=' . $item->id;
                            break;
                    }

                    if (strcasecmp(substr($item->flink, 0, 4), 'http') && (strpos($item->flink, 'index.php?') !== false))
                    {
                        $item->flink = JRoute::_($item->flink, true, $item->params->get('secure'));
                    }
                    else
                    {
                        $item->flink = JRoute::_($item->flink);
                    }

                    // We prevent the double encoding because for some reason the $item is shared for menu modules and we get double encoding
                    // when the cause of that is found the argument should be removed
                    $item->title        = htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8', false);
                    $item->anchor_css   = htmlspecialchars($item->params->get('menu-anchor_css', ''), ENT_COMPAT, 'UTF-8', false);
                    $item->anchor_title = htmlspecialchars($item->params->get('menu-anchor_title', ''), ENT_COMPAT, 'UTF-8', false);
                    $item->menu_image   = $item->params->get('menu_image', '') ?
                        htmlspecialchars($item->params->get('menu_image', ''), ENT_COMPAT, 'UTF-8', false) : '';
                }

                if (isset($items[$lastitem]))
                {
                    $items[$lastitem]->deeper     = (($start?$start:1) > $items[$lastitem]->level);
                    $items[$lastitem]->shallower  = (($start?$start:1) < $items[$lastitem]->level);
                    $items[$lastitem]->level_diff = ($items[$lastitem]->level - ($start?$start:1));
                }
            }

            $cache->store($items, $key);
        }

        return $items;
    }

    /**
     * Get base menu item.
     *
     * @param   \Joomla\Registry\Registry  &$params  The module options.
     *
     * @return  object
     *
     * @since	3.0.2
     */
    public static function getBase(&$params)
    {
        // Get base menu item from parameters
        if ($params->get('base'))
        {
            $base = JFactory::getApplication()->getMenu()->getItem($params->get('base'));
        }
        else
        {
            $base = false;
        }

        // Use active menu item if no base found
        if (!$base)
        {
            $base = self::getActive($params);
        }

        return $base;
    }

    /**
     * Get active menu item.
     *
     * @param   \Joomla\Registry\Registry  &$params  The module options.
     *
     * @return  object
     *
     * @since	3.0.2
     */
    public static function getActive(&$params)
    {
        $menu = JFactory::getApplication()->getMenu();
        $lang = JFactory::getLanguage();

        // Look for the home menu
        if (JLanguageMultilang::isEnabled())
        {
            $home = $menu->getDefault($lang->getTag());
        }
        else
        {
            $home  = $menu->getDefault();
        }

        return $menu->getActive() ? $menu->getActive() : $home;
    }
}
