<?php

?>
<style>
*,
*:after,
*::before {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.nav-wrapper { position: fixed; }

html,
body,
.ws-container,
.ws-pusher,
.ws-content {
    height: 100%;
}

.ws-content {
    overflow-y: scroll;
    background: none;
}

.ws-content,
.ws-content-inner {
    position: relative;
}

.ws-container {
    position: relative;
    overflow: hidden;
}

.ws-pusher {
    position: relative;
    left: 0;
    z-index: 99;
    height: 100%;
    -webkit-transition: -webkit-transform 1.1s ease-in-out;
    transition: transform 1.1s ease-in-out;
}

.ws-pusher::after {
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    background: rgba(0,0,0,0.2);
    content: '';
    opacity: 0;
    -webkit-transition: opacity 0.5s, width 0.1s 0.5s, height 0.1s 0.5s;
    transition: opacity 0.5s, width 0.1s 0.5s, height 0.1s 0.5s;
}

.st-menu-open .ws-pusher::after {
    width: 100%;
    height: 100%;
    opacity: 1;
    -webkit-transition: opacity 0.5s;
    transition: opacity 0.5s;
}

.st-menu {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
    visibility: hidden;
    width: 300px;
    height: 100%;
    background: none;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
}

.st-menu::after {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.2);
    content: '';
    opacity: 1;
    -webkit-transition: opacity 0.5s;
    transition: opacity 0.5s;
}

.st-menu-open .st-menu::after {
    width: 0;
    height: 0;
    opacity: 0;
    -webkit-transition: opacity 0.5s, width 0.1s 0.5s, height 0.1s 0.5s;
    transition: opacity 0.5s, width 0.1s 0.5s, height 0.1s 0.5s;
}
.mp-level {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    -webkit-transform: translate3d(-100%, 0, 0);
    -moz-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
}
.mp-level::after {
    z-index: -1;
}
.mp-level.mp-level-overlay::after {
    width: 100%;
    height: 100%;
    opacity: 1;
    -webkit-transition: opacity 0.3s;
    -moz-transition: opacity 0.3s;
    transition: opacity 0.3s;
}

.mp-level.mp-level-overlay.mp-level::before {
    width: 100%;
    height: 100%;
    background: transparent;
    opacity: 1;
}

.mp-level {
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    transition: all 0.5s;
}
/* overlap */
.mp-overlap .mp-level.mp-level-open {
    box-shadow: 1px 0 2px rgba(0,0,0,0.2);
	-webkit-box-shadow: 1px 0 2px rgba(0,0,0,0.2);
	-moz-box-shadow: 1px 0 2px rgba(0,0,0,0.2);
    -webkit-transform: translate3d(-40px, 0, 0);
    -moz-transform: translate3d(-40px, 0, 0);
    transform: translate3d(-40px, 0, 0);
}
/* First level */
.st-menu > .mp-level,
.st-menu > .mp-level.mp-level-open,
.st-menu.mp-overlap > .mp-level,
.st-menu.mp-overlap > .mp-level.mp-level-open {
    box-shadow: none;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}
li.nobox,
li.nobox:hover,
.no-morph-box {
    box-shadow: none !important;
    background: none !important;
    transition: none;
    -o-transition: none;
    -webkit-transition: none;
    -moz-transition: none;
    border-bottom: 1px solid transparent !important;
    margin:0;
}
a.nobox2, a.nobox2:hover {
    text-align: left !important;
    padding: 0 !important;
}

/* cover */
.mp-cover .mp-level.mp-level-open {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}

.mp-cover .mp-level.mp-level-open > ul > li > .mp-level:not(.mp-level-open) {
    -webkit-transform: translate3d(-100%, 0, 0);
    -moz-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
}

.st-menu ul li > a {
    text-decoration: none;
}

.st-menu h2 {
    margin: 0;
    padding: 1em;
    font-weight: 800;
    font-size: 2em;
    -webkit-transition: text-shadow 0.4s;
    -moz-transition: text-shadow 0.4s;
    -o-transition: text-shadow 0.4s;
    transition: text-shadow 0.4s;
}
.st-menu h2:hover {
    font-weight: 800;
}

.st-menu.mp-overlap h2::before {
    position: absolute;
    top: 0;
    right: 0;
    margin-right: 8px;
    font-size: 75%;
    line-height: 1.8;
    opacity: 0;
    -webkit-transition: opacity 0.3s, -webkit-transform 0.1s 0.3s;
    -moz-transition: opacity 0.3s, -moz-transform 0.1s 0.3s;
    transition: opacity 0.3s, transform 0.1s 0.3s;
    -webkit-transform: translateX(-100%);
    -moz-transform: translateX(-100%);
    transform: translateX(-100%);
}

.mp-overlap .mp-level.mp-level-overlay > h2::before {
    opacity: 1;
    -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
    -moz-transition: -moz-transform 0.3s, opacity 0.3s;
    transition: transform 0.3s, opacity 0.3s;
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    transform: translateX(0);
}
.st-menu ul li {
    -webkit-transition: background 0.7s ease-in-out;
    transition: background 0.7s ease-in-out;
    border-bottom: 2px solid rgba(186, 186, 186, 0.2);
    margin:0 20px 0;
}
.st-menu ul li.current.active, .st-menu ul li.deeper.active { border-bottom-color:<?php echo $levelFontColors['activeBorder']; ?>; }

.st-menu ul li::before {
    position: absolute;
    left: 10px;
    z-index: -1;
    color: rgba(0,0,0,0.2);
    line-height: 3.5em;
}
 a#morph-starter:hover {
    color: rgba(205,0,54,0.85);
}

/* Fallback example for browsers that don't support 3D transforms (and no JS fallback) */
/* We'll show the first level only */
.no-csstransforms3d .mp-pusher,
.no-js .mp-pusher {
    padding-left: 300px;
}

.no-csstransforms3d .st-menu .mp-level,
.no-js .st-menu .mp-level {
    display: none;
}

.no-csstransforms3d .st-menu > .mp-level,
.no-js .st-menu > .mp-level {
    display: block;
}
/* content style */

.st-menu ul {
    margin: 30px 0 0 0;
    padding: 0;
    list-style: none;
}
.nobox > span.icon-pop { display:none !important; }

#morph-starter { cursor: pointer; }

/* Fallback example for browsers that don't support 3D transforms (and no JS fallback) */
.no-csstransforms3d .ws-pusher,
.no-js .ws-pusher {
    padding-left: 300px;
}

/* Morph Button: Default Styles */

/* Icons */

.icon-close {
    z-index: 100;
    display: block;
    overflow: hidden;
    width: 3em;
    height: 3em;
    text-align: center;
    line-height: 3;
    cursor: pointer;
}

.icon:before {
    position: relative;
    display: block;
    width: 100%;
    height: 100%;
    text-transform: none;
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    font-family: 'icomoon';
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.icon-pop::before{
    content: "\e008";
}
.icon-mpback::before {
    content: "\e00a";
}
.icon-home:before {
    content: "\e257";
}
.icon-camera:before {
    content: "\e017";
}

.icon-server:before {
    content: "\e022";
}

.icon-heart:before {
    content: "\e625";
}

.icon-zoom-in:before {
    content: "\e037";
}

.icon-microphone:before {
    content: "\e048";
}

.icon-cloud:before {
    content: "\e066";
}

.icon-briefcase:before {
    content: "\e075";
}

.icon-globe:before {
    content: "\e078";
}

.icon-cog::before {
    content: "\e600";
}

.icon-close::before {
    content: "\e257";
}

.icon-play::before {
    content: "\e602";
}

.icon-pause::before {
    content: "\e603";
}

.icon-close {
    position: absolute;
    top: 20px;
    right: 20px;
}

.icon-close:hover {
    color: #a50a05;
}

/* Styles for dummy content */

/* Style for overlay */

.content-style-overlay {
    padding: 100px 50px;
    text-align: center;
}

.content-style-overlay h2 {
    margin: 0 0 1em 0;
    padding: 0;
    font-weight: 300;
    font-size: 3em;
}

.content-style-overlay p {
    margin: 0 auto;
    padding: 10px 0;
    max-width: 700px;
    text-align: justify;
    font-weight: 300;
    font-size: 1.5em;
}

.content-style-overlay .icon-close {
    border: 2px solid #f9e1c9;
    border-radius: 50%;
    line-height: 2.8;
}

.content-style-overlay .icon-close:hover {
    border-color: #a50a05;
}

/* Style for text modal */
.content-style-text {
    padding: 60px;
    text-align: left;
}

.content-style-text h2 {
    margin: 0 0 0.5em 0;
    font-weight: 300;
    font-size: 1.85em;
}

.content-style-text p {
    color: rgba(255,255,255,0.5);
    font-weight: 300;
    font-size: 1.15em;
    line-height: 1.4;
}

.content-style-text label {
    padding: 10px;
    color: #f9e1c9;
    font-weight: bold;
}

.content-style-text .icon-close {
    top: 0;
    right: 0;
    color: rgba(0,0,0,0.2);
}

.content-style-text .icon-close:hover {
    color: #f9e1c9;
}

/* Style for form modal */
.content-style-form {
    position: relative;
    text-align: left;
    margin: 70px 0;
    padding: 0 0  0 10px;
}

.content-style-form h2 {
    margin: 0;
    padding: 0.4em 0 0.3em;
    text-align: center;
    font-weight: 300;
    font-size: 3.5em;
}

.content-style-form form {
    padding: 10px 30px;
}

.content-style-form form p {
    margin: 0 0 5px 0;
    font-size: 0.7em;
}
.login-greeting {
    font-size: 24px;
    color: rgba(255,255,255,0.5);
    letter-spacing: 4px;
    text-transform: uppercase;
    font-size: 1.250em;
    font-weight: 800;
    transform: translate(7px, 60px) skew(30deg) rotateZ(5deg) rotateX(25deg) rotateY(3deg);
    -moz-transform: translate(7px, 60px) skew(30deg) rotateZ(5deg) rotateX(25deg) rotateY(3deg);
    -webkit-transform: translate(7px, 60px) skew(30deg) rotateZ(5deg) rotateX(25deg) rotateY(3deg);
    -o-transform: translate(7px, 60px) skew(30deg) rotateZ(5deg) rotateX(25deg) rotateY(3deg);
}
.content-style-form label {
    display: inline-block;
    padding: 20px 0 0;
    color: #d5bba4;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-weight: bold;
}

.content-style-form input[type="text"],
.content-style-form input[type="password"] {
    padding: 4px;
    width: 100%;
    height:30px;
    border: 2px solid #ebd3bd;
    background: rgba(255,250,252,0.65);
    color: #333;
    font-weight: 400;
    font-size: 16px;
}

.content-style-form input[type="text"]:focus,
.content-style-form input[type="password"]:focus {
    border-color: #e75854;
    color: #e75854;
}

.content-style-form input:focus {
    outline: 0;
}

.content-style-form button, .content-style-form content-style-form-1 .logout-button button.btn, input.btn[type="submit"] {
    display: block;
    margin-top: 2.5em;
    padding: 1.5em;
    width: 100%;
    border: none;
    background-color: #006624;
    color: #f9f6e5;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 800;
    font-size: 1.25em;
    transition: color 0.5s linear 0.6s,background-color 0.7s ease-in-out 0.3s,background-position .1s linear;
    -webkit-transition: color 0.5s linear 0.3s,background-color 0.7s ease-in-out 0.3s,background-position .1s linear;
    -o-transition: color 0.5s linear 0.3s,background-color 0.7s ease-in-out 0.3s,background-position .1s linear;
    -moz-transition: color 0.5s linear 0.3s,background-color 0.7s ease-in-out 0.3s,background-position .1s linear;
}
.content-style-form button:hover, .content-style-form content-style-form-1 .logout-button button.btn:hover, input.btn[type="submit"]:hover {
    background-color: #019335;
    color: #f8ea9d;
}

.content-style-form .icon-close {
    top: -70px;
    right: -5px;
    color: rgba(231,88,84,1);
    font-size: 230%;
    transition: color 0.5s linear 0.6s;
    -webkit-transition: color 0.5s linear 0.3s;
    -o-transition: color 0.5s linear 0.3s;
    -moz-transition: color 0.5s linear 0.3s;
}

.content-style-form .icon-close:hover {
    color: rgba(231,26,20,1);
}

.js .content-style-form-1 h2,
.js .content-style-form-1 p,
.js .content-style-form-1 .icon-close {
    opacity: 0;
    -webkit-transition: opacity 0.2s 0.35s, -webkit-transform 0.2s 0.35s;
    transition: opacity 0.2s 0.35s, transform 0.2s 0.35s;
    -webkit-transform: scale(0.85);
    transform: scale(0.85);
}

.content-style-form-1 p:first-child {
    -webkit-transition-delay: 0.4s;
    transition-delay: 0.4s;
}

.content-style-form-1 p:nth-child(2) {
    -webkit-transition-delay: 0.45s;
    transition-delay: 0.45s;
}

.content-style-form-1 p:nth-child(3) {
    -webkit-transition-delay: 0.5s;
    transition-delay: 0.5s;
}

.morph-button.open .content-style-form-1 h2,
.morph-button.open .content-style-form-1 p,
.morph-button.open .content-style-form-1 .icon-close {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}

.js .content-style-form-2 h2,
.js .content-style-form-2 p,
.js .content-style-form-2 .icon-close {
    opacity: 0;
    -webkit-transition: opacity 0.2s 0.3s, -webkit-transform 0.2s 0.3s;
    transition: opacity 0.2s 0.3s, transform 0.2s 0.3s;
    -webkit-transform: translateY(50px);
    transform: translateY(50px);
}

.content-style-form-2 p:first-child {
    -webkit-transition-delay: 0.35s;
    transition-delay: 0.35s;
}

.content-style-form-2 p:nth-child(2) {
    -webkit-transition-delay: 0.4s;
    transition-delay: 0.4s;
}

.content-style-form-2 p:nth-child(3) {
    -webkit-transition-delay: 0.45s;
    transition-delay: 0.45s;
}

.content-style-form-2 p:nth-child(4) {
    -webkit-transition-delay: 0.5s;
    transition-delay: 0.5s;
}

.morph-button.open .content-style-form-2 h2,
.morph-button.open .content-style-form-2 p,
.morph-button.open .content-style-form-2 .icon-close {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
}

.content-style-form-4 form {
    padding: 30px;
    background: #fff;
    color: #ccb096;
    font-size: 1.5em;
    -webkit-perspective: 1000px;
    perspective: 1000px;
}

.content-style-form-4 input[type="text"] {
    border: none;
    background-color: #f0f0f0;
}

.content-style-form-4 form button {
    background: #ba997b;
}

.content-style-form-4 form button:focus,
.content-style-form-4 form button:hover {
    background: #a9896d;
}

.js .content-style-form-4 p {
    opacity: 0;
    -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
    transition: opacity 0.3s, transform 0.3s;
    -webkit-transform: rotateX(-45deg);
    transform: rotateX(-45deg);
    -webkit-transform-origin: center top;
    transform-origin: center top;
}

.morph-button.open .content-style-form-4 p {
    opacity: 1;
    -webkit-transition: opacity 0.4s 0.2s, -webkit-transform 0.4s 0.2s;
    transition: opacity 0.4s 0.2s, transform 0.4s 0.2s;
    -webkit-transform: rotateY(0deg);
    transform: rotateY(0deg);
}

.morph-button.open .content-style-form-4 p:nth-child(2) {
    -webkit-transition-delay: 0.35s;
    transition-delay: 0.35s;
}

.content-style-social {
    padding: 30px;
    text-align: left;
}

.morph-button-inflow-2 > button svg {
    display: inline-block;
    padding-right: 10px;
    width: 20px;
    height: 20px;
    vertical-align: -5%;
}

.morph-button-inflow-2 > button svg path {
    fill: #e75854;
}

.content-style-social a {
    display: block;
    padding: 0.5em 0;
    color: #67c2d4;
    vertical-align: middle;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
    font-size: 0.8em;
    line-height: 32px;
}

.js .content-style-social a {
    -webkit-transition: -webkit-transform 0.3s;
    transition: transform 0.3s;
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
}

.content-style-social a:hover {
    color: #e75854;
}

.content-style-social a:hover svg path {
    fill: #e75854;
}

.content-style-social a svg {
    display: inline-block;
    padding-right: 10px;
    vertical-align: middle;
    -webkit-backface-visibility: hidden;
}

.morph-button-inflow.open .content-style-social a {
    -webkit-transform: translateX(0);
    transform: translateX(0);
}

.morph-button-inflow.open .content-style-social a:nth-child(2) {
    -webkit-transition-delay: 0.05s;
    transition-delay: 0.05s;
}

.morph-button-inflow.open .content-style-social a:nth-child(3) {
    -webkit-transition-delay: 0.1s;
    transition-delay: 0.1s;
}

.content-style-video {
    text-align: left;
}

.video-mockup {
    width: 640px;
    height: 360px;
    max-width: 100%;
    background: url(../img/rated.png) no-repeat center center;
    background-size: 100%;
}

.content-style-video .icon-close,
.content-style-video .icon-pause {
    color: #286f81;
}

.content-style-video .icon-close {
    top: 0;
    right: 0;
}

.content-style-video .icon-close:hover {
    color: rgba(0,0,0,0.4);
}

.controls {
    bottom: 0px;
    left: 0px;
    width: 100%;
}

.js .controls {
    position: absolute;
}

.controls span {
    display: inline-block;
}

.content-style-video .icon-pause {
    overflow: hidden;
    width: 2.5em;
    height: 2.5em;
    text-align: center;
    line-height: 2.5;
    cursor: pointer;
    vertical-align: bottom;
}

.content-style-video span.time {
    color: #286f81;
    letter-spacing: 1px;
    font-weight: 700;
    line-height: 40px;
}

.content-style-sidebar h2 {
    font-weight: 300;
    font-size: 2em;
    padding: 0.75em 0 0.75em 1em;
    margin: 0;
    color: #bb4445;
}

.content-style-sidebar .icon-close {
    top: 0;
    right: 0;
    font-size: 0.85em;
}

.content-style-sidebar ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.content-style-sidebar ul li a {
    display: block;
    padding: 12px 20px;
    color: #faf1e0;
    font-weight: 400;
    font-size: 1.05em;
    box-shadow: inset 0 1px rgba(0,0,0,0.1);
	-webkit-box-shadow: inset 0 1px rgba(0,0,0,0.1);
	-moz-box-shadow: inset 0 1px rgba(0,0,0,0.1);
}

.content-style-sidebar ul li:last-child a {
    box-shadow: inset 0 1px rgba(0,0,0,0.1), inset 0 -1px rgba(0,0,0,0.1);
	-webkit-box-shadow: inset 0 1px rgba(0,0,0,0.1), inset 0 -1px rgba(0,0,0,0.1);
	-moz-box-shadow: inset 0 1px rgba(0,0,0,0.1), inset 0 -1px rgba(0,0,0,0.1);
}

.content-style-sidebar ul li a:hover {
    background: rgba(0,0,0,0.1);
    box-shadow: none;
}

.content-style-sidebar ul .icon::before {
    display: inline-block;
    width: auto;
    margin-right: 20px;
    font-size: 1.5em;
    vertical-align: -10%;
    color: rgba(0,0,0,0.2);
}

@media screen and (max-width: 770px) {
    .content-style-overlay {
        font-size: 75%;
    }

    .content-style-overlay .icon-close {
        top: 5px;
        right: 5px;
    }
}

.morph-button {
    position: relative;
    display: block;
    margin: 0 auto;
}

.morph-button.open > a {
    pointer-events: none;
}

.morph-content {
    pointer-events: none;
}

.morph-button.open .morph-content {
    pointer-events: auto;
}

/* Common styles for overlay and modal type (fixed morph) */
.morph-button-fixed,
.morph-button-fixed .morph-content {
    width: auto;
    height: 0;
}

.morph-button-fixed > a {
    z-index: 1000;
    -webkit-transition: opacity 0.1s 0.5s;
    transition: opacity 0.1s 0.5s;
    text-decoration: none;
}

.morph-button-fixed.open > a {
    opacity: 0;
    -webkit-transition: opacity 0.1s;
    transition: opacity 0.1s;
}

.morph-button-fixed .morph-content {
    position: fixed;
    z-index: 900;
    opacity: 0;
    -webkit-transition: opacity 0.3s 0.5s, width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
    transition: opacity 0.3s 0.5s, width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
}

.morph-button-fixed.open .morph-content {
    opacity: 1;
}

.morph-button-fixed .morph-content > div {
    visibility: hidden;
    height: 0;
    opacity: 0;
    -webkit-transition: opacity 0.1s, visibility 0s 0.1s, height 0s 0.1s;
    transition: opacity 0.1s, visibility 0s 0.1s, height 0s 0.1s;
}

.morph-button-fixed.open .morph-content > div {
    visibility: visible;
    height: auto;
    opacity: 1;
    -webkit-transition: opacity 0.3s 0.5s;
    transition: opacity 0.3s 0.5s;
}

.morph-button-fixed.active > a {
    z-index: 2000;
}

.morph-button-fixed.active .morph-content {
    z-index: 1900;
}

/* Transitions for overlay button and sidebar button */
.morph-button-overlay .morph-content,
.morph-button-sidebar .morph-content {
    -webkit-transition: opacity 0.3s 0.5s, width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s;
    transition: opacity 0.3s 0.5s, width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s;
}

.morph-button-overlay.open .morph-content,
.morph-button-sidebar.open .morph-content {
    -webkit-transition: width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s;
    transition: width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s;
}

/* Morph Button Style: Overlay */
.morph-button.morph-button-overlay {
    margin: 50px auto;
}

.morph-button-overlay .morph-content {
    overflow: hidden;
    background: #e85657;
}

.morph-button-overlay.open .morph-content {
    top: 0 !important;
    left: 0 !important;
    width: 100%;
    height: 100%;
}

/* Morph Button Style: Modal */
.morph-button-modal::before {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 800;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    content: '';
    opacity: 0;
    -webkit-transition: opacity 0.5s;
    transition: opacity 0.5s;
    pointer-events: none;
}

.morph-button-modal.open::before {
    opacity: 1;
    pointer-events: auto;
}

.morph-button-modal.active::before {
    z-index: 1800;
}

.morph-button-modal .morph-content {
    overflow: hidden;
    -webkit-transition: opacity 0.3s 0.5s, width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
    transition: opacity 0.3s 0.5s, width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
}

.morph-button-modal.open .morph-content {
    top: 50%;
    left: 50%;
    margin: -210px 0 0 -300px;
    width: 320px;
    height: 290px;
    -webkit-transition: width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
    transition: width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s, margin 0.4s 0.1s;
}

/* Colors and sizes for individual modals */
.morph-button.morph-button-modal-1 {
    float: left;
}

.morph-button.morph-button-modal-2,
.morph-button.morph-button-modal-3 {
    width:100%;
    margin: 0;
    height: 28px;
}

.morph-button-modal-1 > button,
.morph-button-modal-1 .morph-content {
    background-color: #553445;
}

.morph-button-modal-2 > button,
.morph-button-modal-2 .morph-content,
.morph-button-modal-3 > button,
.morph-button-modal-3 .morph-content {
    background-color: rgba(158, 166, 167, 0.73);
    color: #e75854;
    top:36%;
    left:43%;
    width: 50px;
}

.morph-button-modal-4 {
    display: inline-block;
}

.morph-button-modal-4 > button,
.morph-button-modal-4 .morph-content {
    background-color: #faf1e0;
    color: #553445;
}

.morph-button-modal-4 > button span,
.morph-button-modal-4 .morph-clone {
    padding-left: 10px;
    color: #286f81;
}

.morph-button-modal-4 .morph-clone {
    position: absolute;
    right: 34px;
    bottom: 30px;
    z-index: 100;
    letter-spacing: 1px;
    font-weight: 700;
    -webkit-transition: bottom 0.4s 0.1s, right 0.4s 0.1s;
    transition: bottom 0.4s 0.1s, right 0.4s 0.1s;
}

.morph-button-modal-4.open .morph-clone,
.no-js .morph-button-modal-4 .morph-clone {
    right: 10px;
    bottom: 10px;
}
#login-form ul li {
    transition: none;
    box-shadow: none;
    padding: 0;
    font-size: 0.8em;
}
.morph-button-modal-1::before {
    background: rgba(240,221,204,0.7);
}
.input-prepend { display: inline-flex !important; width: 100%; }
.morph-button-modal-2.open .morph-content {
    margin: -251px 0 0 -170px;
    width: 320px;
    height: 420px;
    -webkit-box-shadow: inset 5px 10px 70px 5px rgba(0, 0, 0, 0.61);
    -moz-box-shadow: inset 5px 10px 70px 5px rgba(0, 0, 0, 0.61);
    -o-box-shadow: inset 5px 10px 70px 5px rgba(0, 0, 0, 0.61);
    box-shadow: inset 5px 10px 70px 5px rgba(0, 0, 0, 0.61);
}

.morph-button-modal-3.open .morph-content {
    margin: -255px 0 0 -210px;
    width: 320px;
    height: 510px;
}

.morph-button-modal-3.open .morph-content > div {
    height: 420px;
}

.morph-button-modal-2.open .morph-content > div,
.morph-button-modal-3.open .morph-content > div {
     -webkit-transition: opacity 0.3s 0.3s;
    transition: opacity 0.3s 0.3s;
}

.morph-button-modal-4.open .morph-content {
    margin: -200px 0 0 -320px;
    width: 640px;
    height: 400px;
}

/* Morph Button Style: Sidebar */
.morph-button-sidebar,
.morph-button-sidebar .morph-content {
    width: 60px;
    height: 60px;
}

.morph-button-sidebar {
    position: fixed;
    bottom: 50px;
    left: 50px;
}

.morph-button-sidebar > a {
    line-height: 60px;
    font-size: 1.6em;
    padding: 0;
}

.morph-button-sidebar .morph-content {
    background: #e85657;
}

.morph-button-sidebar.open .morph-content {
    top: 0 !important;
    left: 0 !important;
    width: 300px;
    height: 100%;
    overflow: hidden;
    -webkit-backface-visibility: hidden;
}

/* Let's add some nice easing for all cases */
.morph-button .morph-content,
.morph-button.open .morph-content,
.morph-button-modal-4 .morph-clone {
    -webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
    transition-timing-function: cubic-bezier(0.7,0,0.3,1);
}

/* Helper classes */
.noscroll {
    overflow: hidden;
}

.morph-button-overlay.scroll .morph-content {
    overflow-y: scroll;
}

.morph-button-sidebar.scroll .morph-content {
    overflow: auto;
}

/* No JS fallback: let's hide the button and show the content */
.no-js .morph-button > button {
    display: none;
}

.no-js .morph-button {
    margin: 10px 0;
    float: none;
}

.no-js .morph-button,
.no-js .morph-button .morph-content,
.no-js .morph-button .morph-content > div {
    position: relative;
    width: auto;
    height: auto;
    opacity: 1;
    visibility: visible;
    top: auto;
    left: auto;
    -webkit-transform: none;
    transform: none;
    pointer-events: auto;
}

.no-js .morph-button .morph-content .icon-close {
    display: none;
}

.no-js .morph-button-sidebar {
    width: 300px;
    position: fixed;
    top: 0;
    left: 0;
    margin: 0;
    height: 100%;
    background: #e85657;
    overflow: auto;
}

.no-transition {
    -webkit-transition: none !important;
    transition: none !important;
}

/* Media Queries */

@media screen and (max-width: 600px) {
    .morph-button-modal.open .morph-content {
        top: 0% !important;
        left: 0% !important;
        margin: 0;
        width: 100%;
        height: 100%;
        overflow-y: scroll;
        -webkit-transition: width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s;
        transition: width 0.4s 0.1s, height 0.4s 0.1s, top 0.4s 0.1s, left 0.4s 0.1s;
    }
}

@media screen and (max-width: 400px) {
    .morph-button-fixed,
    .morph-button-fixed .morph-content {
        width: 200px;
        height: 80px;
    }

    .morph-button-fixed > button {
        font-size: 75%;
    }

    .morph-button-sidebar > button {
        font-size: 1.6em;
    }

    .morph-button-inflow .morph-content .morph-clone {
        font-size: 0.9em;
    }

    .morph-button-modal-4,
    .morph-button-modal-4 .morph-content {
        width: 220px;
        height: 120px;
    }

    .morph-button-modal-4 > button {
        font-size: 100%;
        line-height: 50px;
    }

    .morph-button-modal-4 > button span {
        display: block;
    }

    .morph-button-modal-4 .morph-clone {
        right: 83px;
        bottom: 26px;
    }

    .morph-button-sidebar,
    .morph-button-sidebar .morph-content {
        width: 100% !important;
        height: 60px !important;
    }

    .morph-button-sidebar {
        bottom: 0px;
        left: 0px;
    }

    .morph-button-sidebar.open .morph-content {
        height: 100% !important;
    }
}
/* Morph Button: END Styles */

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
	text-transform: <?php echo $txtTransform; ?>;
} 
.st-menu ul li:hover > a.menu-item,
.mp-level > ul > li:first-child:hover > a.menu-item,
.st-menu ul li:hover > span.icon-pop,
.mp-level > ul > li:first-child:hover > span.icon-pop {
    color:<?php echo $levelFontColors['fonthover'];?>;
    text-shadow: 0 0 8px <?php echo $levelFontColors['shadowhover'];?>;
}
.st-menu h2:hover {
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
	-webkit-box-shadow: inset 0 1px rgba(0,0,0,0.1);
	-moz-box-shadow: inset 0 1px rgba(0,0,0,0.1);
    -webkit-transition: color 0.6s,background 0.3s;
    -moz-transition: color 0.6s,background 0.3s;
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
	background: transparent;
    position: relative;  
    margin: 35px; 
    float: left; 
	z-index: 999; 
	transition: transform 0.4s ease 0.5s;
    -moz-transition: -moz-transform 0.4s ease 0.5s;
    -webkit-transition: -webkit-transform 0.4s ease 0.5s;
    -o-transition: -o-transform 0.4s ease 0.5s;
    
}
#trigger div {
	<?php echo $trigBorder; ?>
	background-image: <?php echo ($trigUseImg == 2)?'url("../' . $trigImg . '")' : 'none'; ?>;
	background-position: center center;
	background-repeat: no-repeat; 
	background-size: cover;
	background-color: <?php echo $triggerColors['bg'];?>;
	padding: 20px; 
	text-align: center;
	transition: background 0.4s ease 0s;
    -moz-transition: background 0.4s ease 0s;
    -webkit-transition: background 0.4s ease 0s;
    -o-transition: background 0.4s ease 0s;
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
    transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out 0s, color 0.6s ease-in-out 0s;
    -moz-transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out 0s, color 0.6s ease-in-out 0s;
    -webkit-transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out 0s, color 0.6s ease-in-out 0s;
    -o-transition: font-weight 0.6s linear 0.1s,text-shadow 0.6s ease-in-out 0s, color 0.6s ease-in-out 0s;
    text-shadow: 1px 1px 3px <?php echo $triggerColors['font'];?>;
}

#trigger > div > h2:hover {
	color: <?php echo $triggerColors['fonthover'];?>;
    text-shadow: 1px 1px 3px <?php echo $triggerColors['fonthover'];?>;
}
#trigger div:hover {
	background-color: <?php echo $triggerColors['bghover'];?>;
}
<?php echo $navEffectStyle; ?>

#Level-Preview-Wrapper {
	position: fixed;
	padding: 10px;
	transition: opacity 0.6s ease-in-out 0s;
    -moz-transition: opacity 0.6s ease-in-out 0s;
    -webkit-transition: opacity 0.6s ease-in-out 0s;
    -o-transition: opacity 0.6s ease-in-out 0s;
}
.not-opac { opacity: 0 !important; }
.level-preview-inner {
	text-transform: <?php echo $txtTransform; ?>;
	background-color: rgba(0, 0, 0, 0.99);
	border: 1px solid rgb(255,255,255);
	-webkit-box-shadow: 0px 0px 23px -1px rgba(235,226,235,1), inset 0px 0px 23px -1px rgba(235,226,235,1);
	-moz-box-shadow: 0px 0px 23px -1px rgba(235,226,235,1), inset 0px 0px 23px -1px rgba(235,226,235,1);
	box-shadow: 0px 0px 23px -1px rgba(235,226,235,1), inset 0px 0px 23px -1px rgba(235,226,235,1);
    border-radius: 5px;
    padding: 30px;
}
.level-preview-inner h2 { text-shadow: 1px 1px 3px rgba(255,252,254, 1); color: rgba(0,0,0,0.9); } 
.level-preview-inner h3,
.level-preview-inner { text-align: center; }
.level-preview-inner > div > p {
	font-size: 18px;
	color: rgba(0,0,0,0.9);
	text-shadow: 1px 1px 2px rgba(255,252,254, 1);
}
.mp-level-preview-event {
	opacity: 1;
}
<?php if ($useGoogleFont) : ?>
.nav-wrapper * {
	font-family: '<?php echo str_replace('|', ',', str_replace('+', ' ', $params->get('googleFontType'))); ?>', sans-serif;
}

@supports (-ms-accelerator:true) {
  .nav-wrapper { z-index: 99999;} 
}
<?php endif; ?>
</style>

