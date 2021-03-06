<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.aguilotto
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport( 'joomla.application.component.controller' );
// Check if ws-navigator is installed
$navOn			 = JComponentHelper::isEnabled( 'com_NAME', true)
$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
    $fullWidth = 1;
}
else
{
    $fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/jquery.tinycircleslider.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/tinycircleslider.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/iehacks.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/wstip.css');


// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('ontent-helper') && $this->countModules('content-left-sidebar'))
{
    $span = "span6";
}
elseif (($this->countModules('ontent-helper') && !$this->countModules('content-left-sidebar')) || (!$this->countModules('ontent-helper') && $this->countModules('content-left-sidebar')))
{
    $span = "span9";
}
else
{
    $span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
    $logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
    $logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
    $logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"
      data-useragent='Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C)'
data-platform='Win32'>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <jdoc:include type="head" />
        <?php // Use of Google Font ?>
        <?php if ($this->params->get('googleFont')) : ?>
            <link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
            <style type="text/css">
                h1,h2,h3,h4,h5,h6,.site-title{
                    font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
                }
            </style>
        <?php endif; ?>
        <?php // Template color ?>
        <?php if ($this->params->get('templateColor')) : ?>
        <style type="text/css">
            body.site
            {
                <?php echo ($this->params->get('usebordertop'))? 'border-top: 3px solid ' . $this->params->get('templateColor') : ''; ?>;
                background-color: <?php echo $this->params->get('templateBackgroundColor'); ?>
            }
            a
            {
                color: <?php echo $this->params->get('templateColor'); ?>;
            }
            .navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
            .btn-primary
            {
                background: <?php echo $this->params->get('templateColor'); ?>;
            }
            .navbar-inner
            {
                -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
                -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
                box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
            }
        </style>
        <?php endif; ?>
        <!--[if lt IE 9]>
            <script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
        <![endif]-->
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="<?php echo JUri::root(true) . '/templates/' . $this->template; ?>/css/iehacks.css" />
        <![endif]-->
    </head>

    <body class="site <?php echo $option
        . ' view-' . $view
        . ($layout ? ' layout-' . $layout : ' no-layout')
        . ($task ? ' task-' . $task : ' no-task')
        . ($itemid ? ' itemid-' . $itemid : '')
        . ($params->get('fluidContainer') ? ' fluid' : '');
    ?>">
        <div class="response-bg"></div>
    <!-- Body -->
        <?php if ($navOn) : ?><div id="WS-Container" class="ws-container"><?php endif; ?>
            <!-- WS-NAVIGATOR -->
            <?php if ($this->countModules('menu')) : ?>
                <jdoc:include type="modules" name="position-1" style="none" />
            
            <?php endif; ?>
			
			<?php if ($navOn) : ?>
            <!-- content push wrapper -->
            <div class="ws-pusher">

                <div class="ws-content"><!-- this is the wrapper for the content -->
                    <div class="ws-content-inner"><!-- extra div for emulating position:fixed of the menu -->
			<?php endif; ?> 
                        <!-- JOOMLA WRAPPER -->
                        <div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
                        <!-- JOOMLA HEADER -->
                        <header class="header" role="banner">
                            <div class="header-top clearfix">
                                <a class="brand pull-right" href="<?php echo $this->baseurl; ?>/">
                                    <?php echo $logo; ?>
                                    <?php if ($this->params->get('sitedescription')) : ?>
                                        <?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>'; ?>
                                    <?php endif; ?>
                                </a>
                                <div class="header-search pull-right">
                                    <jdoc:include type="modules" name="position-0" style="none" />
                                </div>
							</div>
							<div class="header-bottom clearfix">
								<jdoc:include type="modules" name="header-bottom-pos-1" style="none" />
								<jdoc:include type="modules" name="header-bottom-pos-2" style="none" />
								<jdoc:include type="modules" name="header-bottom-pos-3" style="none" />
                            </div>
                        </header> <!-- JOOMLA HEADER END -->
                        <!-- JOOMLA BANNER -->
                        <jdoc:include type="modules" name="banner" style="xhtml" />
                        <!-- JOOMLA BANNER END -->
                        <div class="row-fluid">
                            <?php if ($this->countModules('content-left-sidebar')) : ?>
                                <!-- Begin Sidebar -->
                                <div id="sidebar" class="span3">
                                    <div class="sidebar-nav">
                                        <jdoc:include type="modules" name="content-left-sidebar" style="xhtml" />
                                    </div>
                                </div> <!-- End Sidebar -->
                            <?php endif; ?>
                            <main id="content" role="main" class="<?php echo $span; ?>">
                                <!-- Begin Content -->
                                <jdoc:include type="modules" name="position-3" style="xhtml" />
                                <jdoc:include type="message" />
                                <jdoc:include type="component" />
                                <jdoc:include type="modules" name="position-2" style="none" />
								<p class="pull-right">
									<a href="#top" id="back-top">
										<?php echo JText::_('TPL_PROTOSTAR_BACKTOTOP'); ?>
									</a>
								</p>
                                <!-- End Content -->
                            </main>
							<div id="Content-Helper" class="content-helper">
								<jdoc:include type="modules" name="content-helper" style="none" />
							</div>
                        </div>
                    </div> <!-- JOOMLA WRAPPER END -->
                    <!-- JOOMLA FOOTER -->
                    <footer class="footer" role="contentinfo">
                        <div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
                            <hr />
                            <jdoc:include type="modules" name="footer" style="none" />
                            
                            <p>
                                &copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
                            </p>
                        </div>
                    </footer> <!-- JOOMLA FOOTER END -->
<?php if ($navOn) : ?>
				</div> <!-- /ws-content-inner -->
			 </div><!-- /ws-content -->
		</div> <!-- /ws-pusher -->
	</div> <!-- /ws-container --> 
<?php endif; ?> 
        <jdoc:include type="modules" name="debug" style="none" />
    </body>
</html>
