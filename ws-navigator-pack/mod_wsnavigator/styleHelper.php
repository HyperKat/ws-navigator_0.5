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
require_once __DIR__ . '/helper.php';
 
class ModMenuStyleHelper
{
	private static function hex2rgb($hex) 
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
	
	private static function rgb2hex($rgb) 
	{
	    $hex = "#";
	    $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
	    $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
	    $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

	    return $hex; // returns the hex value including the number sign (#)
	}
	
	public static function getColorArray($params, $type)
	{
		$colors = array();
		if(strpos($type, 'trigger') > -1 || strpos($type, 'mpback') > -1)
		{
			$font 	= self::convertColor($params, $type . '_fontcolor', 'rgba(255, 252, 250');
			$bg 	= (strlen(htmlspecialchars($params->get($type . '_bgcolor'))) < 1 || strtolower(htmlspecialchars($params->get($type . '_bgcolor'))) == '#rrggbb')? 
						((strpos($type, 'trigger') > -1)? 'transparent' : 'rgba(205, 205, 205') : self::convertColor($params, $type . '_bgcolor');
			$filter = $params->get($type . '_colorfilter');
			$colors['font'] = $font . ',0.7)';
			$colors['bg'] = $bg . (($bg == 'transparent')? '' : ',0.7)');
			if($filter > 1)
			{
				$colors['fonthover'] 	= $font . ',1)';
				$colors['bghover'] 		= $bg . (($bg == 'transparent')? '' : ',1)');
			}
			else
			{
				$colors['fonthover'] 	= $font . ',0.4)';
				$colors['bghover'] 		= $bg . (($bg == 'transparent')? '' : ',0.4)');
			}
		}
		elseif(strpos($type, 'mplevel') > -1)
		{
			$font 					= self::convertColor($params, $type . '_fontcolor', 'rgba(205,205,205'); 
			$filter					= $params->get($type . '_colorfilter');
			$colors['font'] 		= $font . ',0.7)';
			$colors['shadow'] 		= $font . ',0.2)';
			$colors['activeBorder']	= self::convertColor($params, $type . '_activeLine', '251, 255, 225') . ',0.95)';
			
			if($filter > 1)
			{
				$colors['fonthover'] 	= $font . ',1)';
				$colors['shadowhover']	= $font . ',1)';
			}
			else
			{
				$colors['fonthover'] 	= $font . ',0.4)';
				$colors['shadowhover'] 	= $font . ',0.4)';
			}
		}
		return $colors;
	}
	
	public static function convertColor($params, $type, $default = 'transparent')
	{
		$t = htmlspecialchars($params->get($type));
		if( strlen($t) > 0 && strpos($t,'#') == 0 )
		{
			return 'rgba(' . implode(',',self::hex2rgb($t));
		}
		return $default;
	}
	
	public static function getBevelColors($ps)
    {
        $len = ModMenuHelper::countBevels();

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
	
	public static function getTriggerContentStyle($p)
	{
		$useContent = $p->get('trigger_usetext');
		$trigContent = htmlspecialchars($p->get('triggertext'));
		switch ( $useContent )
		{
			case 0:
				return '<div><img  class="si-icon-text triggerImg" src="../' . $p->get('trigger_image') . '></div>';
			case 2:
				$pos = $p->get('trigger_imgpos');
				switch ( $pos )
				{
					case 1:
						return '<div><h2  class="si-icon-text triggerTxt">' . $trigContent . '</h2><br /><img  class="si-icon-text triggerImg" src="../' . $trigImg . '"/></div>';
					case 2:
						return '<div><img  class="si-icon-text triggerImg" src="../' . $trigImg . '"><h2  class="si-icon-text triggerTxt">' . $trigContent . '</h2></div>';
					case 3:
						return '<div><h2 class="si-icon-text triggerTxt">' . $trigContent . '</h2><img  class="si-icon-text triggerImg" src="../' . $trigImg . '"/></div>';
					case 0:
						return '<div><img class="si-icon-text triggerImg" src="../' . $trigImg . '"><br /><h2  class="si-icon-text triggerTxt">' . $trigContent . '</h2></div>';
				}
			case 1:
			default:
				return '<div><h2  class="si-icon-text triggerTxt">' . $trigContent . '</h2></div>';
		}
	}
	
	public static function getTriggerBorderStyle($p)
	{
		$brc = htmlspecialchars($p->get('trigger_brcolor'));
		if($p->get('trigger_border') < 1 )
			return '';
		return 'border: ' . $p->get('trigger_brwidth') . 'px solid ' . ((strlen($brc) > 0 && strtolower($brc) != '#rrggbb')? $brc : 'none') . '; border-radius: ' . $p->get('trigger_brradius') . 'px;';
	}
	
	public static function getNavEffectStyle($effect)
	{
		switch ($effect) 
		{
			case 'st-effect-1':
				return '/* Effect 1: Slide in on top */
						.st-effect-1.st-menu { visibility: visible; -webkit-transform: translate3d(-100%, 0, 0); transform: translate3d(-100%, 0, 0); }
						.st-effect-1.st-menu-open .st-effect-1.st-menu { visibility: visible; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); }
						.st-effect-1.st-menu::after { display: none; }';
			case 'st-effect-2':
				return '/* Effect 2: Reveal */
						.st-effect-2.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-2.st-menu { z-index: 1; }
						.st-effect-2.st-menu-open .st-effect-2.st-menu { visibility: visible; -webkit-transition: -webkit-transform 0.5s; transition: transform 0.5s; }
						.st-effect-2.st-menu::after { display: none; }';
			case 'st-effect-3':
				return '/* Effect 3: Push*/
						.st-effect-3.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-3.st-menu { -webkit-transform: translate3d(-100%, 0, 0); transform: translate3d(-100%, 0, 0); }
						.st-effect-3.st-menu-open .st-effect-3.st-menu { visibility: visible; -webkit-transition: -webkit-transform 0.5s; transition: transform 0.5s; }
						.st-effect-3.st-menu::after { display: none; }';
			case 'st-effect-4':
				return '/* Effect 4: Slide along */
						.st-effect-4.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-4.st-menu { z-index: 1; -webkit-transform: translate3d(-50%, 0, 0); transform: translate3d(-50%, 0, 0); }
						.st-effect-4.st-menu-open .st-effect-4.st-menu {
							visibility: visible;
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(0, 0, 0);
							transform: translate3d(0, 0, 0);
						}
						.st-effect-4.st-menu::after { display: none; }';
			case 'st-effect-5':
				return '/* Effect 5: Reverse slide out */
						.st-effect-5.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-5.st-menu { z-index: 1; -webkit-transform: translate3d(50%, 0, 0); transform: translate3d(50%, 0, 0); }
						.st-effect-5.st-menu-open .st-effect-5.st-menu {
							visibility: visible;
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(0, 0, 0);
							transform: translate3d(0, 0, 0);
						}';
			case 'st-effect-6':
				return '/* Effect 6: Rotate pusher */
						.st-effect-6.st-container { -webkit-perspective: 1500px; perspective: 1500px; }
						.st-effect-6 .st-pusher { -webkit-transform-origin: 0% 50%; transform-origin: 0% 50%; -webkit-transform-style: preserve-3d; transform-style: preserve-3d; }
						.st-effect-6.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0) rotateY(-15deg); transform: translate3d(300px, 0, 0) rotateY(-15deg); }
						.st-effect-6.st-menu {
							-webkit-transform: translate3d(-100%, 0, 0);
							transform: translate3d(-100%, 0, 0);
							-webkit-transform-origin: 100% 50%;
							transform-origin: 100% 50%;
							-webkit-transform-style: preserve-3d;
							transform-style: preserve-3d;
						}
						.st-effect-6.st-menu-open .st-effect-6.st-menu {
							visibility: visible;
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(-100%, 0, 0) rotateY(15deg);
							transform: translate3d(-100%, 0, 0) rotateY(15deg);
						}
						.st-effect-6.st-menu::after { display: none; }';
			case 'st-effect-7':
				return '/* Effect 7: 3D rotate in */
						.st-effect-7.st-container { -webkit-perspective: 1500px; perspective: 1500px; -webkit-perspective-origin: 0% 50%; perspective-origin: 0% 50%; }
						.st-effect-7 .st-pusher { -webkit-transform-style: preserve-3d; transform-style: preserve-3d; }
						.st-effect-7.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-7.st-menu {
							-webkit-transform: translate3d(-100%, 0, 0) rotateY(-90deg);
							transform: translate3d(-100%, 0, 0) rotateY(-90deg);
							-webkit-transform-origin: 100% 50%;
							transform-origin: 100% 50%;
							-webkit-transform-style: preserve-3d;
							transform-style: preserve-3d;
						}
						.st-effect-7.st-menu-open .st-effect-7.st-menu {
							visibility: visible;
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(-100%, 0, 0) rotateY(0deg);
							transform: translate3d(-100%, 0, 0) rotateY(0deg);
						}';
			case 'st-effect-8':
				return '/* Effect 8: 3D rotate out */
						.st-effect-8.st-container { -webkit-perspective: 1500px; perspective: 1500px; -webkit-perspective-origin: 0% 50%; perspective-origin: 0% 50%; }
						.st-effect-8 .st-pusher { -webkit-transform-style: preserve-3d; transform-style: preserve-3d; }
						.st-effect-8.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-8.st-menu {
							-webkit-transform: translate3d(-100%, 0, 0) rotateY(90deg);
							transform: translate3d(-100%, 0, 0) rotateY(90deg);
							-webkit-transform-origin: 100% 50%;
							transform-origin: 100% 50%;
							-webkit-transform-style: preserve-3d;
							transform-style: preserve-3d;
						}
						.st-effect-8.st-menu-open .st-effect-8.st-menu {
							visibility: visible;
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(-100%, 0, 0) rotateY(0deg);
							transform: translate3d(-100%, 0, 0) rotateY(0deg);
						}
						.st-effect-8.st-menu::after { display: none; }';
			case 'st-effect-9':
				return '/* Effect 9: Scale down pusher */
						.st-effect-9.st-container { -webkit-perspective: 1500px; perspective: 1500px; }
						.st-effect-9 .st-pusher { -webkit-transform-style: preserve-3d; transform-style: preserve-3d; }
						.st-effect-9.st-menu-open .st-pusher { -webkit-transform: translate3d(0, 0, -300px); transform: translate3d(0, 0, -300px); }
						.st-effect-9.st-menu { opacity: 1; -webkit-transform: translate3d(-100%, 0, 0); transform: translate3d(-100%, 0, 0); }
						.st-effect-9.st-menu-open .st-effect-9.st-menu {
							visibility: visible;
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(0, 0, 0);
							transform: translate3d(0, 0, 0);
						}
						.st-effect-9.st-menu::after { display: none; }';
			case 'st-effect-10':
				return '/* Effect 10: Scale up */
						.st-effect-10.st-container { -webkit-perspective: 1500px; perspective: 1500px; -webkit-perspective-origin: 0% 50%; perspective-origin: 0% 50%; }
						.st-effect-10.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-10.st-menu { z-index: 1; opacity: 1; -webkit-transform: translate3d(0, 0, -300px); transform: translate3d(0, 0, -300px); }
						.st-effect-10.st-menu-open .st-effect-10.st-menu {
							visibility: visible;
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(0, 0, 0);
							transform: translate3d(0, 0, 0);
						}';
			case 'st-effect-12':
				return '/* Effect 12: Open door */
						.st-effect-12.st-container { -webkit-perspective: 1500px; perspective: 1500px; }
						.st-effect-12 .st-pusher {
							-webkit-transform-origin: 100% 50%;
							transform-origin: 100% 50%;
							-webkit-transform-style: preserve-3d;
							transform-style: preserve-3d;
						}
						.st-effect-12.st-menu-open .st-pusher { -webkit-transform: rotateY(-10deg); transform: rotateY(-10deg); }
						.st-effect-12.st-menu { opacity: 1; -webkit-transform: translate3d(-100%, 0, 0); transform: translate3d(-100%, 0, 0); }
						.st-effect-12.st-menu-open .st-effect-12.st-menu {
							visibility: visible;
							-webkit-transition: -webkit-transform 0.5s;
							transition: transform 0.5s;
							-webkit-transform: translate3d(0, 0, 0);
							transform: translate3d(0, 0, 0);
						}
						.st-effect-12.st-menu::after { display: none; }';
			case 'st-effect-13':
				return '/* Effect 13: Fall down */
						.st-effect-13.st-container { -webkit-perspective: 1500px; perspective: 1500px; -webkit-perspective-origin: 0% 50%; perspective-origin: 0% 50%; }
						.st-effect-13.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-13.st-menu { z-index: 1; opacity: 1; -webkit-transform: translate3d(0, -100%, 0); transform: translate3d(0, -100%, 0); }
						.st-effect-13.st-menu-open .st-effect-13.st-menu {
							visibility: visible;
							-webkit-transition-timing-function: ease-in-out;
							transition-timing-function: ease-in-out;
							-webkit-transition-property: -webkit-transform;
							transition-property: transform;
							-webkit-transform: translate3d(0, 0, 0);
							transform: translate3d(0, 0, 0);
							-webkit-transition-speed: 0.2s;
							transition-speed: 0.2s;
						}';
			case 'st-effect-14':
				return '/* Effect 14: Delayed 3D rotate */
						.st-effect-14.st-container { -webkit-perspective: 1500px; perspective: 1500px; -webkit-perspective-origin: 0% 50%; perspective-origin: 0% 50%; }
						.st-effect-14 .st-pusher { -webkit-transform-style: preserve-3d; transform-style: preserve-3d; }
						.st-effect-14.st-menu-open .st-pusher { -webkit-transform: translate3d(300px, 0, 0); transform: translate3d(300px, 0, 0); }
						.st-effect-14.st-menu {
							-webkit-transform: translate3d(-100%, 0, 0) rotateY(90deg);
							transform: translate3d(-100%, 0, 0) rotateY(90deg);
							-webkit-transform-origin: 0% 50%;
							transform-origin: 0% 50%;
							-webkit-transform-style: preserve-3d;
							transform-style: preserve-3d;
						}
						.st-effect-14.st-menu-open .st-effect-14.st-menu {
							visibility: visible;
							-webkit-transition-delay: 0.1s;
							transition-delay: 0.1s;
							-webkit-transition-timing-function: ease-in-out;
							transition-timing-function: ease-in-out;
							-webkit-transition-property: -webkit-transform;
							transition-property: transform;
							-webkit-transform: translate3d(-100%, 0, 0) rotateY(0deg);
							transform: translate3d(-100%, 0, 0) rotateY(0deg);
						}';
			case 'st-effect-11':
			default:
			   return '/* Effect 11: Scale and rotate pusher */
					.st-effect-11.st-container { -webkit-perspective: 1500px; perspective: 1500px; }
					.st-effect-11 .st-pusher { -webkit-transform-style: preserve-3d; transform-style: preserve-3d; }
					.st-effect-11.st-menu-open .st-pusher { -webkit-transform: translate3d(100px, 0px, -400px) rotateY(-20deg) skewX(180deg); transform: translate3d(100px, 0px, -400px) rotateY(-20deg) skewX(180deg); }
					.st-effect-11.st-menu { opacity: 1; -webkit-transform: translate3d(-100%, 0, 0); transform: translate3d(-100%, 0, 0); }
					.st-effect-11.st-menu-open .st-effect-11.st-menu { visibility: visible; -webkit-transition: -webkit-transform 0.5s; transition: transform 0.5s; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); }
					.st-effect-11.st-menu::after { display: none; }';
		}
	}
}