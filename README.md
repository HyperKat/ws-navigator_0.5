# ws-navigator_0.9
joomla 3 - modul - pushmenu with login/out 0.9beta

!!!!!!!!! - Menu for JOOMLA 3.X - !!!!!!!!!

This is my first version of a push/pull menu as modul for joomla 3...
for 3d content flip effect you need to wrapp your content, see example index.php of the protostar template.

see an example of the menu in action on : http://ws-navigator.kl-marketing.de

Don't rename the wrapper classes...

add style settings for the mp-levels to modul settings (example own background-colors for each mp-level) -> Done

add language to empty labels/fields -> Done

add menu-effect option to modul-administration -> Done

add font-color field to modul-administration -> Done

add level preview -> Done

Next steps
  1. add responsive design to the menu css -> in progress
  2. building a complete template for the modules
  3. fix all bugs that we'll find
  4. convert js to $

Installation:
  1. backup template / joomla ( this you should do always, with/without the menu backup for hackup )
  2. unzip folder
  3. zip the mod_wsnavigator folder and install it as joomla extension
  4. build in wrapper in your template (see index.php in example folder)
  5. Setup Modul in administration portal
  6. Optional -> Need a Login/out Menuitem?

        Activate the option use login/out trigger!!!
        Add a menu item, name should contains login!!!
        examplenames(Hello login / my login / my_login / xyz.login?zyx)

        Notice, it's necessary to activate the mod_login modul, it don't need a position,
        the ws-navigator load the mod_login modul by it self!!!

  7. Have fun and tell me bugs and features for future

