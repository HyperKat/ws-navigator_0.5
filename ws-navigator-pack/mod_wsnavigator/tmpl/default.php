<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_ws-navigator
 *
 * @Copyright (C) 2015 Wolfgang Spies.
 */

defined('_JEXEC') or die;
$trig = ($triggerOn == null || $triggerOn < 1)? 'false': 'true';
$login = ($loginOn == 1)? 'true': 'false';
echo '<script >
        var ownTrigger='. $trig . ';
        var useLogin='. $login . ';
    </script>';
// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<div class="nav-wrapper">
<nav id="st-menu" class="st-menu st-effect-11" role="navigation">
<div class="mp-level">
    <h2 class="icon"><?php echo $titel; ?></h2><a class="mp-back" href="#">back <span class="icon-mpback"></span></a>
<ul class="nav menu<?php echo $class_sfx;?>"<?php
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
                    <a id="morph-starter">' . str_replace($r, $logged, $item->title) . '</a>
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

                require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                echo $deepItem;
                break;

            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        endswitch;
    }
    // The next item is deeper.
    if ($item->deeper)
    {
        echo '<div class="mp-level"><h2 class="icon item-' . $item->id . '">' . $item->title . '</h2><a class="mp-back tip" data-original-title="Tooltip" href="#">back <span class="icon-mpback"></span></a><ul class="nav-child unstyled">';
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
        $trigger = '<a href="#" id="trigger" data-effect="st-effect-11" class="si-icons si-icons-easing nav-toggler toggle-slide-left menu-trigger monoton">
            <h2  class="si-icon-text">Men&uuml;</h2>
            <span class="si-icon si-icon-hamburger-cross" data-icon-name="hamburgerCross"></span>
            </a>';
            echo ($triggerOn == null || $triggerOn < 1)? $trigger: '';
    ?>
</div>

