# ws-navigator_0.5
joomla 3 - modul - pushmenu with login/out 0.5beta

!!!!!!!!! - ATTENTION ONLY TESTED IN JOOMLA 3.X - !!!!!!!!!

This is my first version of a push/pull menu as modul for joomla 3...
for 3d content flip effect you need to wrapp your content, see example index.php of the protostar template.

see an example of the menu in action on : http://newsite.kl-marketing.de

Don't rename the wrapper classes...

add style settings for the mp-levels to modul settings (example own background-colors for each mp-level) -> Done
add language to empty labels/fields -> Done

Next steps
  1. add responsive design to the menu css
  2. building a complete template for the modules
  3. fix all bugs that we'll find
  4. convert js to $

Installation:
  1. backup template / joomla ( this you should do always, with/without the menu backup for hackup )
  2. unzip folder
  3. zip the mod_wsnavigator folder and install it as joomla extension
  4. After installation, choose root of scripts and styles option in modul-settings:

         No -> handle  all scripts and styles in the modul (standart)!
         Yes -> handle the scripts/styles in template root
                (move the files from modul path to template path)!
                It's helpful when you want to build in your own menu trigger or something else.

  5. add external styles fonts and images to your template root...
  6. build in wrapper in your template (see index.php in example folder)
  7. Setup Modul in administration portal
  8. Optional -> Need a Login/out Menuitem?

        Activate the option use login/out trigger!!!
        Add a menu item, name should contains login!!!
        examplenames(Hello login / my login / my_login / xyz.login?zyx)

        Notice, it's necessary to activate the mod_login modul, it don't need a position,
        the ws-navigator load the mod_login modul by it self!!!

  9. Have fun and tell me bugs and features for future


BLINK:

  It's not necessary to add script and style tags to template head. Also it includes all automatic,
  on activated option -> handle in template root, too.
  You only need to copy the scripts in tempate root!!!!! ! ! !!!!!

