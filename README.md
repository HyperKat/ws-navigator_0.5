# ws-navigator_0.5
joomla 3 - modul - pushmenu with login/out first version

This is my first version of a push/pull menu as modul for joomla 3...
for 3d content flip effect you need to wrapp your content, see example index.php of the protostar template.

see an example of the menu in action on : http://newsite.kl-marketing.de

Don't rename the wrapper classes...

Next steps 
  1. add responsive design to the menu css
  2. add language to empty labels/fields
  3. building a complete template for the modules
  
Installation:
  1. backup template / joomla
  2. unzip folder
  3. zip the mod_wsnavigator folder and install it as joomla extension
  4. You can choose in settings of the modul after installation: No -> handle  all scripts and styles in the modul (standart)! Yes -> handle the scripts/styles in template root (move the files from modul path to template path)!
  5. add external styles fonts and images to your template root...
  6. build in wrapper in your template (see index.php in example folder)
  
BLINK:

  It's not necessary to add script and style tags to template head, it includes all automatic, even wehn you choose option handle in template root !!!!! ! ! !!!!!
  when you need a login/out menu item, add a menu item named login or my login,
  the name should contains login!!!
  
  it's necessary to activate the mod_login modul!!!
