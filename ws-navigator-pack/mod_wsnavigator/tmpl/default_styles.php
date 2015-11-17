<?php
// Note. It is important to remove spaces between elements.
?>
<style>
.st-menu ul li > a, #morph-starter {
    display: inline-block;
    outline: none;
    text-transform: <?php echo $txtTransform; ?>;
    letter-spacing: 1px;
    font-weight: 800;
    text-align: center;
    font-size: 0.9em;
    padding: 0.4em;
}
.st-menu ul li > a, #morph-starter {
	-webkit-transition: color 0.6s linear 0.6s,text-shadow 0.6s ease-in-out,opacity 0.6s ease-in-out 0.1s;
    -moz-transition: color 0.6s linear 0.6s,text-shadow 0.6s ease-in-out,opacity 0.6s ease-in-out 0.1s;
    -ms-transition: color 0.6s linear 0.6s,text-shadow 0.6s ease-in-out,opacity 0.6s ease-in-out 0.1s;
    -o-transition: color 0.6s linear 0.6s,text-shadow 0.6s ease-in-out,opacity 0.6s ease-in-out 0.1s;
    transition: color 0.6s linear 0.6s,text-shadow 0.6s ease-in-out,opacity 0.6s ease-in-out 0.1s;
}
.st-menu.mp-cover h2 {
    text-transform: <?php echo $txtTransform; ?>;
    font-weight: 700;
    letter-spacing: 1px;
    font-size: 1em;
}
#morph-starter, .mp-level h2, .mp-level ul li a.menu-item , .st-menu h2 { 
	color:<?php echo $levelFontColors['font'];?>; 
    text-shadow: 0 0 1px <?php echo $levelFontColors['shadow'];?>;
} 
.st-menu ul li:hover > a.menu-item,
.mp-level > ul > li:first-child:hover > a.menu-item,
.st-menu ul li:hover > span.icon-pop,
.mp-level > ul > li:first-child:hover > span.icon-pop,
.st-menu h2:hover {
    color:<?php echo $levelFontColors['fonthover'];?>;
    text-shadow: 0 0 8px <?php echo $levelFontColors['shadowhover'];?>;
}
span.icon-pop { cursor: help; float: right; margin: 7px 0; font-size: 10px; color: <?php echo $levelFontColors['font']; ?>; text-shadow: 0 0 1px <?php echo $levelFontColors['shadow'];?>; }
.st-menu ul li.current.active > a.menu-item, .st-menu ul li.deeper.active > a.menu-item,
.st-menu ul li.current.active > span.icon-pop, .st-menu ul li.deeper.active > span.icon-pop {
    color:<?php echo $levelFontColors['fonthover'];?>;
    text-shadow: 0 0 10px <?php echo $levelFontColors['shadowhover'];?>;
}
.mp-back .icon-mpback:hover, .mp-back:hover .icon-mpback { 
	border-color: <?php echo $mpBackColors['fonthover']; ?>; 
	color:<?php echo $mpBackColors['fonthover']; ?>;
	text-shadow: 1px 1px 8px <?php echo $mpBackColors['fonthover']; ?>;
}
.st-menu .mp-level.mp-level-overlay > .mp-back,
.st-menu .mp-level.mp-level-overlay > .mp-back::after {
    background: rgba(205, 205, 205, 0.3);
    box-shadow: none;
    color: transparent;
}
.mp-back .icon-mpback {
    border-width: 0px;
    border-style: solid;
    border-radius: 2px;
	border-color: rgba(0,0,0,0);
    position: absolute;
    padding: 0 0 0 4px;
    height: 20px;
    width: 20px;
    line-height: 18px;
    right: 8px;
    top: 12px;
    font-size: 10px;
    color: <?php echo $mpBackColors['font']; ?>;
    text-shadow: 1px 1px 4px <?php echo $mpBackColors['font']; ?>;
    -webkit-transition: color 0.6s,text-shadow 0.6s;
    -moz-transition: color 0.6s,text-shadow 0.6s;
    -ms-transition: color 0.6s,text-shadow 0.6s;
    -o-transition: color 0.6s,text-shadow 0.6s;
    transition: color 0.6s,text-shadow 0.6s;
}
.mp-back {
    background: <?php echo $mpBackColors['bg']; ?>;
    outline: none;
    color: <?php echo $mpBackColors['font']; ?>;
    text-transform: <?php echo $txtTransform; ?>;
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
    background: <?php echo $mpBackColors['bghover']; ?> !important;
    color:<?php echo $mpBackColors['fonthover']; ?>;
    text-decoration: none;
}
.mp-back::after {
    position: absolute;
    right: 10px;
    font-size: 1.3em;
    color: rgba(0,0,0,0.3);
}
#trigger { 
	<?php echo $trigBorder; ?>
	background: <?php echo $triggerColors['bg'];?>;
    position: relative;  
    margin: 35px; 
    float: left; 
	z-index: 999; 
    transition: transform 0.4s ease 0.7s, background 0.4s ease 0.7s;
    -moz-transition: -moz-transform 0.4s ease 0.7s, background 0.4s ease 0.7s;
    -webkit-transition: -webkit-transform 0.4s ease 0.7s, background 0.4s ease 0.7s;
    -o-transition: -o-transform 0.4s ease 0.8s, background 0.4s ease 0.7s;
    -ms-transition: -ms-transform 0.4s ease 0.7s, background 0.4s ease 0.7s;
}
#trigger > div > h2 {
    border: none;
    color: <?php echo $triggerColors['font'];?>;
    letter-spacing: 1px;
    text-transform: <?php echo $txtTransform; ?>;
    cursor: pointer;
    display: inline-block;
    font-size: 3.9em;
    font-weight: 200;
    border-radius: 0 2px 2px 0;
    position: relative;
    margin: 6px 0;
    text-decoration: none;
    transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out,color 0.6s ease-in-out 0.1s,background 0.6s ease-in-out 0.4s;
    -moz-transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out,color 0.6s ease-in-out 0.1s,background 0.6s ease-in-out 0.4s;
    -webkit-transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out,color 0.6s ease-in-out 0.1s,background 0.6s ease-in-out 0.4s;
    -o-transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out,color 0.6s ease-in-out 0.1s,background 0.6s ease-in-out 0.4s;
    -ms-transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out,color 0.6s ease-in-out 0.1s,background 0.6s ease-in-out 0.4s;
    text-shadow: 1px 1px 3px rgba(3, 1, 0, 0.65);
}

#trigger > div > h2:hover {
	color: <?php echo $triggerColors['fonthover'];?>;
    text-shadow: 1px 1px 3px rgba(3, 1, 0, 0.80);
}
#trigger:hover {
	background: <?php echo $triggerColors['bghover'];?>;;
}
<?php echo $navEffectStyle; ?>
</style>
