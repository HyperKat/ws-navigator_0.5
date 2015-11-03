/**
 * svgicons.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */

(function (window) {

    'use strict';

    /* ************************** ********************************** ************************* */
    /* *************************** GLOBAL HELPER FOR OBJECTS Begin ************************** */
    /* **************************** ***************************** ************************** */

    function extend(a, b) {
        var key;
        for (key in b) {
            if (b.hasOwnProperty(key)) {
                a[key] = b[key];
            }
        }
        return a;
    }

    function hasParentClass(e, classname) {
        if (e === document) return false;
        if (classie.has(e, classname)) {
            return true;
        }
        return e.parentNode && hasParentClass(e.parentNode, classname);
    }
        // taken from https://github.com/inuyaksa/jquery.nicescroll/blob/master/jquery.nicescroll.js
    function hasParent(e, id) {
        if (!e) return false;
        var el = e.target || e.srcElement || e || false;
        while (el && el.id != id) {
            el = el.parentNode || false;
        }
        return (el !== false);
    }
        // returns the depth of the element "e" relative to element with id=id
        // for this calculation only parents with classname = waypoint are considered
    function getLevelDepth(e, id, waypoint, cnt) {
        cnt = cnt || 0;
        if (e.id.indexOf(id) >= 0) return cnt;
        if (classie.has(e, waypoint)) {
            ++cnt;
        }
        return e.parentNode && getLevelDepth(e.parentNode, id, waypoint, cnt);
    }

    // returns the closest element to 'e' that has class "classname"
    function closest(e, classname) {
        if (classie.has(e, classname)) {
            return e;
        }
        return e.parentNode && closest(e.parentNode, classname);
    }

    /*
     - Behavior: For IE8+, we detect the documentMode value provided by Microsoft.
     - Behavior: For <IE8, we inject conditional comments until we detect a match.
     - Results: In IE, the version is returned. In other browsers, false is returned.
     - Tip: To check for a range of IE versions, use if (!IE || IE < MAX_VERSION)...
    */

    var IE = (function () {
        if (document.documentMode) {
            return document.documentMode;
        } else {
            for (var i = 7; i > 0; i--) {
                var div = document.createElement("div");

                div.innerHTML = "<!--[if IE " + i + "]><span></span><![endif]-->";

                if (div.getElementsByTagName("span").length) {
                    return i;
                }
            }
        }

        return undefined;
    })();
    // from http://stackoverflow.com/a/11381730/989439
    function mobilecheck() {
        var check = false;
        (function (a) {
            if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }

    // http://snipplr.com/view.php?codeview&id=5259
    function isMouseLeaveOrEnter(e, handler) {
        if (e.type != 'mouseout' && e.type != 'mouseover') return false;
        var reltg = e.relatedTarget ? e.relatedTarget :
            e.type == 'mouseout' ? e.toElement : e.fromElement;
        while (reltg && reltg != handler) reltg = reltg.parentNode;
        return (reltg != handler);
    }

    var transEndEventNames = {
            'WebkitTransition': 'webkitTransitionEnd',
            'MozTransition': 'transitionend',
            'OTransition': 'oTransitionEnd',
            'msTransition': 'MSTransitionEnd',
            'transition': 'transitionend'
        },
        transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
        support = {
            transitions: Modernizr.csstransitions
        };

    /* ***************************** **************************** ******************************* */
    /* **************************** GLOBAL HELPER FOR OBJECTS ENDS ***************************** */
    /* *************************** ******************************** *************************** */
    /* ************************** ********************************** ************************* */
    /* *************************** SV ICON + SVG + Animation Begin ************************** */
    /* **************************** ***************************** ************************** */

    function svgIcon(el, config, options) {
        this.el = el;
        this.options = extend({}, this.options);
        extend(this.options, options);
        this.svg = Snap(this.options.size.w, this.options.size.h);
        this.svg.attr('viewBox', '0 0 64 64');
        this.el.appendChild(this.svg.node);
        // state
        this.toggled = false;
        // click event (if mobile use touchstart)
        this.clickevent = mobilecheck() ? 'touchstart' : 'click';
        // icons configuration
        this.config = config[this.el.getAttribute('data-icon-name')];
        // reverse?
        if (classie.hasClass(this.el, 'si-icon-reverse')) {
            this.reverse = true;
        }
        if (!this.config) return;
        var self = this;
        // load external svg
        Snap.load(this.config.url, function (f) {
            var g = f.select('g');
            self.svg.append(g);
            self.options.onLoad();
            //self._initEvents();
            if (self.reverse) {
                self.toggle();
            }
        });
    }

    svgIcon.prototype.options = {
        speed: 200,
        easing: 'linear',
        evtoggle: 'click', // click || mouseover
        size: {
            w: 64,
            h: 44
        },
        onLoad: function () {
            return false;
        },
        onToggle: function () {
            return false;
        },
        animStat: false
    };

    svgIcon.prototype._initEvents = function () {
        var self = this,
            toggleFn = function (ev) {
                if (((ev.type.toLowerCase() === 'mouseover' || ev.type.toLowerCase() === 'mouseout') && isMouseLeaveOrEnter(ev, this)) || ev.type.toLowerCase() === self.clickevent) {
                    self.toggle(true);
                    self.options.onToggle();
                }
            };

        if (this.options.evtoggle === 'mouseover') {
            this.el.addEventListener('mouseover', toggleFn);
            this.el.addEventListener('mouseout', toggleFn);
        } else {
            this.el.parentElement.addEventListener(this.clickevent, toggleFn);
        }
    };

    svgIcon.prototype.toggle = function (motion) {
        // hack until i find the bubbling problem, sometimes the button close effect don't work!
        if(!this.options.animStat)return;
        var self = this;
        for (var i = 0, len = this.config.animation.length; i < len; ++i) {
            var a = this.config.animation[i],
                el = this.svg.select(a.el),
                animProp = this.toggled ? a.animProperties.from : a.animProperties.to,
                val = animProp.val,
                timeout = motion && animProp.delayFactor ? animProp.delayFactor : 0;

            if (animProp.before) {
                el.attr(JSON.parse(animProp.before));
            }

            if (motion) {
                setTimeout(function (el, val, animProp) {
                    return function () {
                        el.animate(JSON.parse(val), self.options.speed, self.options.easing, function () {
                            if (animProp.after) {
                                this.attr(JSON.parse(animProp.after));
                            }
                            if (animProp.animAfter) {
                                this.animate(JSON.parse(animProp.animAfter), self.options.speed, self.options.easing);
                            }
                        });
                    };
                }(el, val, animProp), timeout * self.options.speed);
            } else {
                el.attr(JSON.parse(val));
            }

        }
        this.toggled = !this.toggled;
    };


    /* ***************************** **************************** ******************************* */
    /* **************************** SV ICON + SVG + Animation ENDS ***************************** */
    /* *************************** ******************************** *************************** */
    /* ************************** ********************************** ************************* */
    /* *************************** ST PUSH-MENU 3D Animation Begin ************************** */
    /* **************************** ***************************** ************************** */

    function mlPushMenu(el, trigger, mBtn, svIco, options) {
        this.el = el;
        this.trigger = trigger;
        this.morphObject = mBtn;
        this.svgIcon = svIco;
        this.effect = trigger.getAttribute('data-effect') || 'st-effect-11';
        this.options = extend(this.defaults, options);
        // support 3d transforms
        this.support = Modernizr.csstransforms3d;
        //its not supported in Maxthon!!!
        //if (this.support) {
            this._init();
        //}
    }

    mlPushMenu.prototype = {
            defaults: {
                // overlap: there will be a gap between open levels
                // cover: the open levels will be on top of any previous open level
                type: 'overlap', // overlap || cover
                // space between each overlaped level
                levelSpacing: 40,
                // classname for the element (if any) that when clicked closes the current level
                backClass: 'mp-back',

                levelBg: {}

            },
            _init: function () {
                // if menu is open or not
                this.open = false;
                // level depth
                this.level = 0;
                // the moving wrapper
                this.wrapper = document.getElementById('st-container');
                // the mp-level elements
                this.levels = Array.prototype.slice.call(this.el.querySelectorAll('div.mp-level'));
                // save the depth of each of these mp-level elements
                var self = this;
                this.levels.forEach(function (el, i) {
                    var depth = getLevelDepth(el, self.el.id, 'mp-level');
                    el.style.backgroundColor = 'rgba('+self.defaults.levelBg[depth]+')';
                    el.setAttribute('data-level', depth);
                });

                // the menu items
                this.menuItems = Array.prototype.slice.call(this.el.querySelectorAll('li'));
                // if type == "cover" these will serve as hooks to move back to the previous level
                this.levelBack = Array.prototype.slice.call(this.el.querySelectorAll('.' + this.options.backClass));
                // event type (if mobile use touch events)
                this.eventtype = mobilecheck() ? 'touchstart' : 'click';
                // add the class mp-overlap or mp-cover to the main element depending on options.type

                classie.add(this.el, 'mp-' + this.options.type);
                this.trigOffOpen = this.el.offsetWidth-110;
                this.trigOffClose = this.el.offsetWidth;
                // initialize / bind the necessary events
                this._initEvents();
            },
            _initEvents: function () {
                var self = this;

                // the menu should close if clicking somewhere on the body
                var bodyClickFn = function (el) {
                    self._resetMenu();
                    el.removeEventListener(self.eventtype, bodyClickFn);
                };

                // open (or close) the menu
                this.trigger.addEventListener(this.eventtype, function (ev) {
                    ev.stopPropagation();
                    ev.preventDefault();
                    if (self.open) {
                        self._resetMenu();
                    } else {
                        if (self.open)
                            self._openMenu();
                        else
                            self._openActiveItemLevel();
                        // the menu should close if clicking somewhere on the body (excluding clicks on the menu)
                        /*document.addEventListener( self.eventtype, function( ev ) {
                            if( self.open && !hasParent( ev.target, self.el.id ) ) {
                                bodyClickFn( this );
                            }
                        } );*/
                    }
                });

                // opening a sub level menu
                this.menuItems.forEach(function (el, i) {
                    // check if it has a sub level
                    var subLevel = el.querySelector('div.mp-level');
                    if (subLevel) {
                        el.querySelector('a').addEventListener(self.eventtype, function (ev) {
                            ev.preventDefault();
                            var level = closest(el, 'mp-level').getAttribute('data-level');
                            if (self.level <= level) {
                                ev.stopPropagation();
                                classie.add(closest(el, 'mp-level'), 'mp-level-overlay');
                                self._openMenu(subLevel);
                            }
                        });
                    }
                });

                // closing the sub levels :
                // by clicking on the visible part of the level element
                this.levels.forEach(function (el, i) {
                    el.addEventListener(self.eventtype, function (ev) {
                        ev.stopPropagation();
                        var level = el.getAttribute('data-level');
                        if (self.level > level) {
                            self.level = level;
                            self._closeMenu();
                        }
                    });
                });

                // by clicking on a specific element
                this.levelBack.forEach(function (el, i) {
                    el.addEventListener(self.eventtype, function (ev) {
                        ev.preventDefault();
                        var level = closest(el, 'mp-level').getAttribute('data-level');
                        if (self.level <= level) {
                            ev.stopPropagation();
                            self.level = closest(el, 'mp-level').getAttribute('data-level') - 1;
                            self.level === 0 ? self._resetMenu() : self._closeMenu();
                        }
                    });
                });
            },
            _openMenu: function (subLevel) {
                // increment level depth
                ++this.level;

                if (this.level > 1) {
                    // move the main wrapper
                    var levelFactor = (this.level - 1) * this.options.levelSpacing,
                        translateVal = this.options.type === 'overlap' ? this.el.offsetWidth + levelFactor : this.el.offsetWidth;
                    this._hideMorphButton();
                    //this._setTransform( 'translate3d(' + translateVal + 'px,0,0)' );

                    if (subLevel) {
                        // reset transform for sublevel
                        this._setTransform('', subLevel);
                        // need to reset the translate value for the level menus that have the same level depth and are not open
                        for (var i = 0, len = this.levels.length; i < len; ++i) {
                            var levelEl = this.levels[i];
                            if (levelEl != subLevel && !classie.has(levelEl, 'mp-level-open')) {
                                this._setTransform('translate3d(-100%,0,0) translate3d(' + -i * levelFactor + 'px,0,0)', levelEl);
                            } else if (levelEl != subLevel) {
                                this._toggleOverlayItems(levelEl);
                            }
                        }
                        this._setTransform('', this.levels[0]);
                        this._setTriggerPos(this.trigOffOpen + ((this.level - 1) * 40));
                        this._setTransform('translate3d(' + ((this.level - 1) * 40) + 'px,0,0)', this.levels[0]);

                    }
                }
                // add class st-menu-open to main wrapper if opening the first time
                else if (this.level === 1) {
                    var elem = document.getElementsByClassName('st-content')[0];
                    elem.style.zIndex ='-1';
                    classie.add(this.wrapper, this.effect);
                    this._setTriggerPos(this.trigOffOpen);
                    var wrapper = this.wrapper;
                    setTimeout(function () {
                        classie.add(wrapper, 'st-menu-open');
                    }, 25);
                    this.open = true;
                }
                // add class mp-level-open to the opening level element
                classie.add(subLevel || this.levels[0], 'mp-level-open');
                this._closeMorpher();
            },
            _toggleOverlayItems: function(elem, show) {
                if(!elem)
                    return false;
                var listItems = elem.querySelector('ul').children;
                if(listItems.length == 0)
                    return false;

                for(var i=0;i<listItems.length;i++)
                {
                    var li = listItems[i];
                    if(!show) {
                        classie.addClass(li, 'nobox');
                        classie.addClass(li.firstChild, 'nobox2');
                    } else {
                        classie.removeClass(li, 'nobox');
                        classie.removeClass(li.firstChild, 'nobox2');
                    }
                }
            },
            // close the menu
            _resetMenu: function () {
                this._setTriggerPos(3);
                this._setTransform('', this.levels[0]);
                this.level = 0;
                var elem = document.getElementsByClassName('st-content')[0];
                elem.style.zIndex ='';
                // remove class mp-pushed from main wrapper
                classie.remove(this.wrapper, 'st-menu-open');
                this._toggleLevels();
                this.open = false;
                if( this.svgIcon && this.svgIcon.toggled && (this.level) < 2)
                    this.svgIcon.toggle(true);
            },
            _openActiveItemLevel: function () {
                var elem = closest(this.el.querySelector('li.current.active'), 'mp-level');
                var level = elem.getAttribute('data-level');
                var elems = new Array(parseInt(level));
                elems[elems.length - 1] = elem;
                for (var i = 0; i < level - 1; i++) {
                    elems[i] = closest(elem.parentNode, 'mp-level');
                }

                for (var i = 0; i < elems.length; i++) {
                    if (i === 0) {
                        this._openMenu();
                        continue;
                    }
                    if (this.level <= i) {

                        classie.add(elems[i - 1], 'mp-level-overlay');
                        this._openMenu(elems[i]);

                    }
                }
            },
            // close sub menus
            _closeMenu: function () {
                var translateVal = this.options.type === 'overlap' ? (this.el.offsetWidth-110) + (this.level - 1) * this.options.levelSpacing : this.el.offsetWidth + 3;
                //this._setTransform( 'translate3d(0,0,0)' );
                this._toggleLevels();
                var l = this.level - 1;
                if (this.level === 1) {
                    this._setTransform('translate3d(0,0,0)', this.levels[0]);
                } else
                    this._setTransform('translate3d(' + (l * 40) + 'px,0,0)', this.levels[0]);
                this._setTriggerPos(translateVal);
            },
            // translate the el
            _setTransform: function (val, el) {
                el = el || this.wrapper;
                el.style.WebkitTransform = val;
                el.style.MozTransform = val;
                el.style.transform = val;
            },
            _setTriggerPos: function (translateVal) {
                if(!ownTrigger) {
                    this._setTransform('translate3d(' + translateVal + 'px,0,0)', this.trigger);
                    this.trigger.style.zIndex = (translateVal == 3)? 999: 99;
                    this.trigger.style.background = (translateVal != 3)? 'rgba('+this.defaults.levelBg["1"]+')': '';
                }
            },
            _closeMorpher: function () {
                if (!this.morphObject) return;
                if (this.morphObject.expanded) {
                    this.morphObject.toggle();
                }
            },
            _hideMorphButton: function () {
                if (!this.morphObject) return;
                if (this.morphObject.el.style.display == 'block' || this.morphObject.button.style.display == '') {
                    this.morphObject.el.style.display = 'none';
                }
            },
            _showMorphButton: function () {
                if (!this.morphObject) return;
                if (this.morphObject.el.style.display == 'none') {
                    this.morphObject.el.style.display = 'block';
                }
            },
            _changeRgbaTranspare: function (rgbaCode, newOpacity) {
                if(!rgbaCode && !parseFloat(newOpacity))
                    return false;

                var rgba = rgbaCode.split(',');
                rgba[rgba.length-1] = newOpacity;
                return rgba.join(',');
            },
            // removes classes mp-level-open from closing levels
            _toggleLevels: function () {

                for (var i = 0, len = this.levels.length; i < len; ++i) {
                    var levelEl = this.levels[i];

                    if (levelEl.getAttribute('data-level') >= this.level + 1) {
                        classie.remove(levelEl, 'mp-level-open');
                        classie.remove(levelEl, 'mp-level-overlay');
                        this._toggleOverlayItems(levelEl,true);

                    } else if (Number(levelEl.getAttribute('data-level')) == this.level) {
                        classie.remove(levelEl, 'mp-level-overlay');
                        this._toggleOverlayItems(levelEl,true);

                    }
                }

                if (this.level < 2) {
                    this._showMorphButton();
                }

            }
        }
        /* ***************************** **************************** ******************************* */
        /* **************************** ST PUSH-MENU 3D Animation ENDS ***************************** */
        /* *************************** ******************************** *************************** */
        /* ************************** ********************************** ************************* */
        /* *************************** MORPHING BUTTON Animation Begin ************************** */
        /* **************************** ***************************** ************************** */

    function UIMorphingButton(el, options) {
        this.el = el;
        this.options = extend({}, this.options);
        extend(this.options, options);
        this._init();
    }

    UIMorphingButton.prototype.options = {
        closeEl: '',
        onBeforeOpen: function () {
            return false;
        },
        onAfterOpen: function () {
            return false;
        },
        onBeforeClose: function () {
            return false;
        },
        onAfterClose: function () {
            return false;
        },
        contentPos: {
            left: '',
            top: '',
            expLeft: '',
            expTop: ''

        }
    }

    UIMorphingButton.prototype._init = function () {
        // save element height
        this.elH = this.el.offsetHeight;
        // the button
        this.button = document.getElementById('morph-starter');
        // state
        this.expanded = false;
        // Set standart Content Pos if is empty!!!
        if (!this.options.contentPos.top)
            this.options.contentPos.top = (!IE) ? (this.el.parentElement.offsetTop + (this.button.offsetHeight / 2)) + 'px' : (this.button.offsetHeight / 2) + 'px';
        if (!this.options.contentPos.expTop)
            this.options.contentPos.expTop = this.options.contentPos.top;
        if (!this.options.contentPos.left)
            this.options.contentPos.left = (!IE) ? this.el.parentElement.offsetLeft + 'px' : (this.button.offsetWidth / 2) + 'px';
        if (!this.options.contentPos.expLeft)
            this.options.contentPos.expLeft = this.options.contentPos.left;
        // content el
        this.contentEl = this.el.querySelector('.morph-content');
        // load the standart-position top
        this.contentEl.style.top = this.options.contentPos.top;
        this.contentEl.style.left = this.options.contentPos.left;
        // init events
        this._initEvents();
    }

    UIMorphingButton.prototype._initEvents = function () {
        var self = this;
        // open
        this.button.addEventListener('click', function () {
            self.toggle();
        });
        // close
        if (this.options.closeEl !== '') {
            var closeEl = this.el.querySelector(this.options.closeEl);
            if (closeEl) {
                closeEl.addEventListener('click', function () {
                    self.toggle();
                });
            }
        }
    }

    UIMorphingButton.prototype.toggle = function () {
            if (this.isAnimating) return false;

            // callback
            if (this.expanded) {
                this.options.onBeforeClose();
            } else {
                // add class active (solves z-index problem when more than one button is in the page)
                classie.addClass(this.el, 'active');
                this.options.onBeforeOpen();
            }

            this.isAnimating = true;

            var self = this,
                onEndTransitionFn = function (ev) {
                    if (!closest(ev.target, this.getAttribute('id'))) return false;

                    if (support.transitions) {
                        this.removeEventListener(transEndEventName, onEndTransitionFn);
                    }
                    self.isAnimating = false;

                    // callback
                    if (self.expanded) {
                        // remove class active (after closing)
                        classie.removeClass(self.el, 'active');
                        self.options.onAfterClose();
                    } else {
                        self.options.onAfterOpen();
                    }

                    self.expanded = !self.expanded;
                };

            if (support.transitions) {
                this.el.addEventListener(transEndEventName, onEndTransitionFn);
            } else {
                onEndTransitionFn();
            }

            // add/remove class "open" to the button wraper
            this.el.style.height = this.expanded ? this.elH + 'px' : this.contentEl.offsetHeight + 'px';

            if (this.expanded) {
                this.contentEl.style.top = this.options.contentPos.top;
                this.contentEl.style.left = this.options.contentPos.left;
                classie.removeClass(this.el, 'open');
            } else {
                this.contentEl.style.left = this.options.contentPos.expLeft;
                this.contentEl.style.top = this.options.contentPos.expTop;
                classie.addClass(this.el, 'open');
            }
        }
        /* ***************************** **************************** ******************************* */
        /* **************************** MORPHING BUTTON Animation ENDS ***************************** */
        /* *************************** ******************************** *************************** */
        /* ************************** ********************************** ************************* */
        /* *************************** INITIALIZING + PROCESS + BEGINS ************************** */
        /* **************************** ***************************** ************************** */
    window.UIMorphingButton = UIMorphingButton;
    // add to global namespace
    window.mlPushMenu = mlPushMenu;
    // add to global namespace
    window.svgIcon = svgIcon;
    /* ***************************** *************************** ******************************* */
    /* **************************** INITIALIZING + PROCESS + ENDS ***************************** */
    /* *************************** ******************************** *************************** */

})(window);
