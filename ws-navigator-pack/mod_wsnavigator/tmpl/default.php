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
<?php // The menu class is deprecated. Use nav instead. 
require_once ($dir . '/js/js_ws-navigator.php');
require_once ($dir . '/css/styles_ws-navigator.php');
if($client->browser == JApplicationWebClient::IE)
{
    require_once ($dir . '/css/styles_ie-hacks.php');
}
?>
<?php if ($useGoogleFont) : ?>
<link href='//fonts.googleapis.com/css?family=<?php echo $params->get('googleFontType'); ?>' rel='stylesheet' type='text/css' />
<?php endif; ?>

<?php if($levelPreview > 0) : ?><div id="Level-Preview-Wrapper" class="not-opac"></div><?php endif; ?>
<div id="Nav-Wrapper" class="nav-wrapper" level-preview="<?php echo ($levelPreview > 0)? 'ON' : 'OFF'; ?>" login-button="<?php echo $loginOn; ?>"><?php echo ''; ?>
<nav id="st-menu" class="st-menu <?php echo $navEffect; ?>" role="navigation">
<div class="mp-level" style="background-color: <?php echo $levelColors[0]; ?>;">
<h2 class="icon ws-header"><?php echo $titel; ?></h2><a class="mp-back" href="#"><?php echo $backTitel; ?><span class="icon-mpback"></span></a>
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
        $deepItem = '<span class="' . (($levelPreview > 0)? 'mp-level-preview ' : '') . 'icon icon-pop"></span>';
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

        echo '<div class="mp-level" data-level="' . $item->level . '" style="background-color: ' . $levelColors[$item->level] . '"><h2 class="icon item-' . $item->id . '">' . $item->title . '</h2><a class="mp-back tip" data-original-title="Tooltip" href="#">' .$backTitel . '<span class="icon-mpback"></span></a><ul class="nav-child unstyled">';

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
    <div <?php echo ( strlen($trigClass_sfx) > 0 )? 'class="' . $trigClass_sfx . '"' : ''; ?>>
		<a href="#" id="trigger" data-effect="<?php echo $navEffect; ?>" class="nav-toggler toggle-slide-left menu-trigger monoton <?php echo $class_sfx . $trigClass_sfx; ?>"><?php echo $triggerContent; ?></a>
	</div>
</div>

