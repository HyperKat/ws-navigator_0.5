<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_ws-navigator
 *
 * @Copyright (C) 2015 Wolfgang Spies.
 */

defined('_JEXEC') or die;
// Note. It is important to remove spaces between elements.

?>
<?php // The menu class is deprecated. Use nav instead. ?>
<style>
#morph-starter, .mp-level h2, .mp-level ul li a.menu-item { 
	color:<?php echo $levelFontColor;?>,0.6); 
    text-shadow: 0 0 1px <?php echo $levelFontColor;?>,0.1);
} 
.st-menu ul li > a.menu-item:hover,
.mp-level > ul > li:first-child > a.menu-item:hover {
    color:<?php echo $levelFontColor . ',' . (($levelFontFilter == 1)? '1' : '0.75');?>);
    text-shadow: 0 0 8px <?php echo $levelFontColor;?>,0.9);
}
.st-menu ul li.current.active > a.menu-item, .st-menu ul li.deeper.active > a.menu-item {
    color:<?php echo $levelFontColor . ',' . (($levelFontFilter > 1)? '1' : '0.75');?>);
    text-shadow: 0 0 10px <?php echo $levelFontColor;?>,0.6);
}
.st-menu h2 {
    text-shadow: 1px 1px 4px <?php echo $levelFontColor;?>,0.45);
}
.st-menu h2:hover {
    text-shadow: 1px 1px 8px <?php echo $levelFontColor;?>,0.79);
}
.mp-back .icon-mpback:hover { 
	border-style: solid; 
	color:<?php echo $backFontColor . ',' . (($backFontFilter > 1)? '1' : '0.5');?>);
	text-shadow: 1px 1px 8px <?php echo $backFontColor . ',' . (($backFontFilter > 1)? '1' : '0.79');?>);
}
.st-menu .mp-level.mp-level-overlay > .mp-back,
.st-menu .mp-level.mp-level-overlay > .mp-back::after {
    background: rgba(205, 205, 205, 0.3);
    box-shadow: none;
    color: transparent;
}
.mp-back .icon-mpback {
    border-width: 1px;
    border-style: none;
    border-radius: 2px;
    position: absolute;
    padding: 0 0 0 4px;
    height: 20px;
    width: 20px;
    line-height: 18px;
    right: 8px;
    top: 12px;
    font-size: 0.563em;
    color: <?php echo $backFontColor; ?>,1);
    text-shadow: 1px 1px 4px <?php echo $backFontColor . ',' . (($backFontFilter > 1)? '1' : '0.45');?>);
    -webkit-transition: color 0.6s,text-shadow 0.6s;
    -moz-transition: color 0.6s,text-shadow 0.6s;
    -ms-transition: color 0.6s,text-shadow 0.6s;
    -o-transition: color 0.6s,text-shadow 0.6s;
    transition: color 0.6s,text-shadow 0.6s;
}
.mp-back {
    background: <?php echo $backColor;?>,0.5);
    outline: none;
    color: <?php echo $backFontColor . ',' . (($backFontFilter == 1)? '1' : '0.5');?>);
    text-transform: uppercase;
    letter-spacing: 3px;
    font-weight: 800;
    display: block;
    padding: 1em 1.8em 1em;
    position: relative;
    box-shadow: inset 0 1px rgba(0,0,0,0.1);
    -webkit-transition: color 0.6s,background 0.3s;
    -moz-transition: color 0.6s,background 0.3s;
    -ms-transition: color 0.6s,background 0.3s;
    -o-transition: color 0.6s,background 0.3s;
    transition: color 0.6s,background 0.3s;
    font-size: 1em;
}
.mp-back:hover, .mp-back:focus {
    background: <?php echo $backColor . ',' . (($backFontFilter > 1)? '0.25' : '0.75');?>) !important;
    color:<?php echo $backFontColor . ',' . (($backFontFilter > 1)? '1' : '0.5');?>);
    text-decoration: none;
}
.mp-back::after {
    position: absolute;
    right: 10px;
    font-size: 1.3em;
    color: rgba(0,0,0,0.3);
}
</style>

<div id="Nav-Wrapper" class="nav-wrapper" login-button="<?php echo $loginOn; ?>">
<nav id="st-menu" class="st-menu <?php echo $navEffect; ?>" role="navigation">
<div class="mp-level" style="background-color: <?php echo $levelColors[0]; ?>;">
<h2 class="icon ws-header"><?php echo $titel; ?></h2><a class="mp-back" href="#">back <span class="icon-mpback"></span></a>
<ul class="ws-nav nav menu<?php echo $class_sfx . '"';
    $tag = '';

    if ($params->get('tag_id') != null)
    {
        $tag = $params->get('tag_id') . '';
        echo ' id="' . $tag . '"';
    }
?>>

<?php
foreach ($list as $i => &$item)
{
    $class = 'item-' . $item->id;
    $deepItem = '';

    if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id))
    {
        $class .= ' current';
    }

    if (in_array($item->id, $path))
    {
        $class .= ' active';
    }
    elseif ($item->type == 'alias')
    {
        $aliasToId = $item->params->get('aliasoptions');

        if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
        {
            $class .= ' active';
        }
        elseif (in_array($aliasToId, $path))
        {
            $class .= ' alias-parent-active';
        }
    }

    if ($item->type == 'separator')
    {
        $class .= ' divider';
    }

    if ($item->deeper)
    {
        $class .= ' deeper';
        $deepItem = '<span class="dropdown icon icon-pop"></span>';
    }

    if ($item->parent)
    {
        $class .= ' parent';
    }

    if (!empty($class))
    {
        $class = ' class="' . trim($class) . '"';
    }



    if(stripos($item->title,'login') !== false || stripos($item->title,'logout') !== false)
    {
        if($loginOn == 1)
        {
            echo '<li' . $class . '>';
            $direc = explode("/",__DIR__);
            $direc[count($direc) -2] = "mod_login";
            $direc[count($direc) -1] = "mod_login.php";
            $newDirec = implode("/",$direc);
            $r = (stripos($item->title,'login') !== false)? array('LOGIN', 'login', 'Login','LogIn', 'logIn'):array('LOGOUT', 'logout', 'Logout','LogOut', 'logOut');

            echo '<div id="morph-button" class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
                    <a id="morph-starter" >' . str_replace($r, $logged, $item->title) . '</a>
                    <div class="morph-content">
                        <div>
                            <div class="content-style-form content-style-form-1">
                                <span class="icon icon-close">Close the dialog</span>';
            require_once $newDirec;
            echo '</div>
                        </div>
                    </div>
                </div><!-- morph-button -->';
        }
    }
    else
    {
        echo '<li' . $class . '>';
        // Render the menu item.
        switch ($item->type) :
            case 'separator':
            case 'url':
            case 'component':
            case 'heading':

                require JModuleHelper::getLayoutPath('mod_wsnavigator', 'default_' . $item->type);
                echo $deepItem;
                break;

            default:
                require JModuleHelper::getLayoutPath('mod_wsnavigator', 'default_url');
                break;
        endswitch;
    }
    // The next item is deeper.
    if ($item->deeper)
    {

        echo '<div class="mp-level" data-level="' . $item->level . '" style="background-color: ' . $levelColors[$item->level] . '"><h2 class="icon item-' . $item->id . '">' . $item->title . '</h2><a class="mp-back tip" data-original-title="Tooltip" href="#">back <span class="icon-mpback"></span></a><ul class="nav-child unstyled">';

    }
    elseif ($item->shallower)
    {

        // The next item is shallower.
        echo '</li>';
        echo str_repeat('</ul></div></li>', $item->level_diff);

    }
    else
    {

        // The next item is on the same level.
        echo (stripos($item->title,'login') !== false || stripos($item->title,'logout') !== false)? (($loginOn == 1)? '</li>':''): '</li>';
    }
}
    ?></div></ul>
    </nav>
    <?php
        echo '<div><a href="#" id="trigger" data-effect="' . $navEffect . '" class="si-icons si-icons-easing nav-toggler toggle-slide-left menu-trigger monoton">
            <h2  class="si-icon-text">' . $triggerTxt . '</h2>
            <span class="si-icon si-icon-hamburger-cross" data-icon-name="hamburgerCross"></span>
            </a></div>';
    ?>
</div>

