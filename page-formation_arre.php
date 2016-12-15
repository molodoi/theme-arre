/* fichier app.scss */

@import 'variables';
@import '../../bower_components/bootstrap-sass/assets/stylesheets/_bootstrap';
@import '../../bower_components/bootstrap-sass/assets/stylesheets/bootstrap/_variables';
@import '../../bower_components/font-awesome-sass/assets/stylesheets/_font-awesome';
@import '../../bower_components/swiper/dist/css/swiper.min.css';
//@import '../../bower_components/ekko-lightbox/dist/ekko-lightbox.min.css';
$label-color: #2d2e2e !default;
body {
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    font-size: 16px;
    text-align: justify;
    line-height: 1.8em;
    color: #888888;
    background-color: #fafafa;
}

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
    font-family: "Roboto Slab", "Times New Roman", Times, serif;
    font-weight: 700;
    line-height: 1.5em;
    color: #2d2e2e;
}

.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    color: #2d2e2e;
    border-radius: .25em;
}

a {
    color: #4ab8b5;
    text-decoration: none;
    transition: color 250ms ease;
}

a:hover {
    color: #42a7a4;
    text-decoration: none;
}

.btn {
    transition: all 250ms ease;
}

.img-full-width {
    width: 100%;
}

blockquote {
    font-size: 1em;
    background: #f9f9f9;
    border-left: 3px solid #ccc;
    padding: 0.5em 10px;
    quotes: "\201C""\201D""\2018""\2019";
}

blockquote:before {
    color: #ccc;
    content: open-quote;
    font-size: 4em;
    line-height: 0.1em;
    margin-right: 0.25em;
    vertical-align: -0.4em;
}

blockquote p {
    display: inline;
}

a.more-link {
    text-align: center;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 12px;
    font-size: 16px;
    line-height: 1.42857;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: #333;
    background-color: #fff;
    border-color: #ccc;
    margin-bottom: 5px;
    display: inline-block;
    transition: all 250ms ease;
}

a.more-link.active,
a.more-link:active,
a.more-link:hover {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}

main {
    min-height: 920px;
}

.map {
    height: 450px;
    width: auto;
}


/* -------------------------------------------------- 
:: SWIPER - HOME SLIDER
-----------------------------------------------------*/

.swiper-container {
    width: 100%;
    min-height: 500px;
    height: 100%;
    background: #f2f2f2;
}

.swiper-slide {
    font-size: 18px;
    color: #2d2e2e;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 40px 60px;
}

.parallax-bg {
    position: absolute;
    left: 0;
    top: 0;
    width: 130%;
    height: 100%;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center;
}

.swiper-slide .title {
    font-family: 'Roboto slab';
    font-size: 41px;
    font-weight: 700;
}

.swiper-slide .subtitle {
    font-size: 21px;
}

.swiper-slide .text {
    font-size: 16px;
    max-width: 450px;
    line-height: 1.6em;
}


/* -------------------------------------------------- 
:: SCROLLUP
-----------------------------------------------------*/

.scrollup {
    width: 40px;
    height: 40px;
    position: fixed;
    bottom: 5px;
    right: 5px;
    display: inline;
    line-height: 3em;
    font-size: 12px;
    font-weight: bold;
    background-color: #c6c6c6;
    color: #F2F2F2;
    text-align: center;
    z-index: 54;
    border-radius: 200px 200px 200px 200px;
    -moz-border-radius: 200px 200px 200px 200px;
    -webkit-border-radius: 200px 200px 200px 200px;
    border: 0px solid #000000;
}

.scrollup:hover,
.scrollup:focus,
.scrollup:visited {
    color: #fff;
    background: #fec20b;
}

.scrollup.active {
    -webkit-transform: translateY(0);
    transform: translateY(0);
}


/* -------------------------------------------------- 
:: NAVBAR
-----------------------------------------------------*/

@media (min-width: 767px) {
    .navbar-nav .dropdown-menu .caret {
        transform: rotate(-90deg);
    }
}

.site-title {
    font-size: 28px;
    line-height: 1.7em;
    margin-top: 0px;
    margin-bottom: 0px;
    text-transform: uppercase;
}

.my-navbar {
    font-family: 'Roboto Slab';
    font-size: 16px;
    font-weight: bold;
    background-color: #fff;
    border-color: transparent;
}

.my-navbar .navbar-nav>li>a,
.my-navbar .navbar-nav>li>a:hover,
.my-navbar .navbar-text {
    color: #2d2e2e;
}

.my-navbar .navbar-nav>.active>a,
.my-navbar .navbar-nav>.active>a:focus,
.my-navbar .navbar-nav>.active>a:hover {
    color: #d15a94;
    background-color: transparent;
}


/* -------------------------------------------------- 
:: NAVBAR


.navbar-collapse {
    position: relative;
    padding-top: 30px !important;
    max-height: 270px;
}

.navbar-collapse form[role="search"] {
    position: absolute;
    top: 0px;
    right: 0px;
    width: 100%;
    padding: 0px;
    margin: 0px;
    z-index: 0;
}

.navbar-collapse form[role="search"] button,
.navbar-collapse form[role="search"] input {
    padding: 8px 12px;
    border-radius: 0px;
    border-width: 0px;
    color: rgb(119, 119, 119);
    background-color: rgb(248, 248, 248);
    border-color: rgb(231, 231, 231);
    box-shadow: none;
    outline: none;
}

.navbar-collapse form[role="search"] input {
    padding: 16px 12px;
    font-size: 14pt;
    font-style: italic;
    color: rgb(160, 160, 160);
    box-shadow: none;
}

@media (min-width: 768px) {
    .navbar-collapse {
        padding-top: 0px !important;
        padding-right: 38px !important;
    }
    .navbar-collapse form[role="search"] {
        width: 38px;
    }
    .navbar-collapse form[role="search"] button,
    .navbar-collapse form[role="search"] input {
        padding: 15px 12px;
    }
    .navbar-collapse form[role="search"] input {
        padding: 25px 12px;
        font-size: 18pt;
        opacity: 0;
        display: none;
    }
    .navbar-collapse form[role="search"].active {
        width: 100%;
    }
    .navbar-collapse form[role="search"].active button,
    .navbar-collapse form[role="search"].active input {
        display: table-cell;
        opacity: 1;
    }
    .navbar-collapse form[role="search"].active input {
        width: 100%;
        text-align: right;
    }
    .navbar-collapse form[role="search"].active button[type="submit"] {
        background-color: rgb(231, 231, 231);
    }
}
-----------------------------------------------------*/

.header-top {
    display: block;
}

.site-title {
    font-size: 28px;
    line-height: 1.7em;
    margin-top: 0px;
    margin-bottom: 0px;
    text-transform: uppercase;
}

.my-navbar {
    font-family: 'Roboto Slab';
    font-size: 16px;
    font-weight: bold;
    background-color: #fff;
    border-color: transparent;
}

.my-navbar .navbar-nav>li>a,
.my-navbar .navbar-nav>li>a:hover,
.my-navbar .navbar-text {
    color: #2d2e2e;
}

.my-navbar .navbar-nav>.active>a,
.my-navbar .navbar-nav>.active>a:focus,
.my-navbar .navbar-nav>.active>a:hover {
    color: #d15a94;
    background-color: transparent;
}


/* -------------------------------------------------- 
:: PAGE DEFAULT WP TEMPLATE
-----------------------------------------------------*/

header.header-page {
    background: #4ab8b5;
    text-align: center;
    color: #fff;
    margin-bottom: 10px;
}

header.header-page h2 {
    font-size: 36px;
    color: #fff;
    padding: 45px 5px 12px 5px;
    width: 60%;
    margin: 0 auto;
    text-transform: capitalize;
}

header.header-page p {
    font-size: 20px;
    color: #fff;
    padding: 5px;
    width: 60%;
    margin: 0 auto;
}

header.header-page ul.breadcrumb {
    background: #4ab8b5;
    color: #fff;
}

header.header-page ul.breadcrumb li a {
    color: #fff;
}

header.header-page ul.breadcrumb li a:hover {
    text-decoration: underline;
}


/* -------------------------------------------------- 
:: COORDONATES SECTION
-----------------------------------------------------*/

section.coordonates {
    background: #fff;
    padding-top: 40px;
    padding-bottom: 40px;
}

section.coordonates a {
    color: inherit;
}

section.coordonates a:hover {
    color: #42a7a4;
}

section.coordonates div.col-lg-4 {
    padding: 60px 0px;
}

section.coordonates div.col-lg-4:first-child {
    border-right: 1px solid #eee;
}

section.coordonates div.col-lg-4:last-child {
    border-left: 1px solid #eee;
}

section.coordonates p.text-center {
    text-align: center;
}

section.coordonates .glyphicon {
    font-size: 36px;
    line-height: 36px;
    color: #42a7a4;
    clear: both;
}

section.coordonates .glyphicon.glyphicon-earphone {}

section.coordonates .glyphicon.glyphicon-map-marker {}

section.coordonates .glyphicon.glyphicon-envelope {}


/* -------------------------------------------------- 
:: INDEX.PHP 
-----------------------------------------------------*/

article.article-index {
    background: #fff;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
}

article.article-index h2,
article.article-index p,
article.article-index a.btn,
article.article-index .categories {
    margin: 5px 5px;
}

article.article-index h2 {
    text-align: left;
    white-space: normal;
}

article.article-index p br {
    width: 100%;
    display: block;
    margin: 10px 0;
    line-height: 22px;
    content: " ";
}


/* -------------------------------------------------- 
:: WIDGET
-----------------------------------------------------*/

.widget ul {
    -webkit-padding-start: 0px;
}

.widget ul li {
    list-style: none;
}

.sidebar .widget_text div.textwidget {
    border: 1px solid #ddd;
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
    padding: 15px;
}

.sidebar .widget_text h2 {
    font-size: 2em;
    font-weight: 400;
    text-align: left;
}

.sidebar-produitstype .widget_simpleimage .has-caption-overlay h2 {
    font-size: 1em;
}

.sidebar .widget widget_huge_it_google_maps_widget div#huge_it_google_map1 {
    margin-bottom: 10px!important;
}

.sidebar .widget_simpleimage .has-caption-overlay p {
    font-size: 0.8em;
}

.sidebar .violet_navbar>a,
.sidebar .violet_navbar>a:hover,
.sidebar .violet_navbar>a:focus,
.sidebar .violet3_navbar>a,
.sidebar .violet3_navbar>a:hover,
.sidebar .violet3_navbar>a:focus,
.sidebar .violet2_navbar>a,
.sidebar .violet2_navbar>a:hover,
.sidebar .violet2_navbar>a:focus {
    background-color: transparent!important;
    color: inherit!important;
    font-family: inherit;
    font-size: inherit;
    font-size: inherit;
    font-weight: inherit;
}

.sidebar .violet_navbar>a:hover,
.sidebar .violet_navbar>a:focus,
.sidebar .violet3_navbar>a:hover,
.sidebar .violet3_navbar>a:focus,
.sidebar .violet2_navbar>a:hover,
.sidebar .violet2_navbar>a:focus {
    color: #650f3a!important;
}

h2.chip-title,
.newsletter h2.chip-title,
.widget_mc4wp_widget h2.chip-title {
    margin-left: -6px;
    font-family: 'Bitter', serif;
    font-size: 2em;
    font-weight: 400;
    text-align: left;
}

.newsletter h2,
.widget_mc4wp_widget h2 {
    font-size: 0.9em;
    text-align: center;
}

.newsletter button[type="submit"],
.widget_mc4wp_widget button[type="submit"],
.widget_mc4wp_widget input[type="submit"],
.widget_mc4wp_widget input[type="submit"] {
    width: 100%;
    text-shadow: 0px;
    color: #fff;
    background: #650f3a;
    background-repeat: repeat-x;
    border-color: #650f3a;
}


/* -------------------------------------------------- 
:: FOOTER
-----------------------------------------------------*/

section.home-footer {
    //background: #fafafa;
}

section.home-footer div.col-lg-4:first-child {
    //padding: 60px 0px;
}

.footer-menu-breadcrumb {
    background: transparent!important;
    padding: 0 15px;
    margin-bottom: 0px;
}

footer {
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    text-align: left;
}

footer.rose {
    background: #d15a94;
    color: #fafafa;
}


/* -------------------------------------------------- 
:: FOOTER - ICONS SOCIAL
-----------------------------------------------------*/


/* footer social icons */

section.home-footer ul.social-network {
    list-style: none;
    display: inline;
    margin-left: 0 !important;
    padding: 0;
}

section.home-footer ul.social-network li {
    display: inline;
    margin: 0 5px;
}

section.home-footer .asso-subtitle {
    font-size: 22px;
}


/* footer social icons */

section.home-footer .social-network a.icoRss:hover {
    background-color: #F56505;
}

section.home-footer .social-network a.icoFacebook:hover {
    background-color: #3B5998;
}

section.home-footer .social-network a.icoTwitter:hover {
    background-color: #33ccff;
}

section.home-footer .social-network a.icoGoogle:hover {
    background-color: #BD3518;
}

section.home-footer .social-network a.icoViadeo:hover {
    background-color: #ffa500;
}

section.home-footer .social-network a.icoLinkedin:hover {
    background-color: #0077b5;
}

section.home-footer .social-network a.icoYoutube:hover {
    background-color: #BD3518;
}

section.home-footer .social-network a.icoPinterest:hover {
    background-color: #BD081c;
}

section.home-footer .social-network a.icoInstagram:hover {
    background-color: #16a085;
}

.social-network a.icoInstagram:hover i,
.social-network a.icoPinterest:hover i,
.social-network a.icoViadeo:hover i,
.social-network a.icoLinkedin:hover i,
.social-network a.icoYoutube:hover i,
.social-network a.icoRss:hover i,
.social-network a.icoFacebook:hover i,
.social-network a.icoTwitter:hover i,
.social-network a.icoGoogle:hover i,
.social-network a.icoVimeo:hover i,
.social-network a.icoLinkedin:hover i {
    color: #fff;
}

section.home-footer a.socialIcon:hover,
.socialHoverClass {
    color: #44BCDD;
}

section.home-footer .social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 0 auto;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    text-align: center;
    width: 50px;
    height: 50px;
    font-size: 20px;
}

.social-circle li i {
    margin: 0;
    line-height: 50px;
    text-align: center;
}

.social-circle li a:hover i,
.triggeredHover {
    -webkit-transition: all 0.2s;
    -moz-transition: all 0.2s;
    -o-transition: all 0.2s;
    -ms-transition: all 0.2s;
    transition: all 0.2s;
}

.social-circle i {
    -webkit-transition: all 0.8s;
    -moz-transition: all 0.8s;
    -o-transition: all 0.8s;
    -ms-transition: all 0.8s;
    transition: all 0.8s;
}

footer {
    background: #fafafa;
}


/* -------------------------------------------------- 
:: FORM CONECT
-----------------------------------------------------*/

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

input[type="text"]:focus,
input[type="password"]:focus,
input[type="date"]:focus,
input[type="datetime"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="time"]:focus,
input[type="url"]:focus,
textarea:focus {
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
}

#wp-members input[type="submit"] {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    border: 1px solid #adadad;
    white-space: nowrap;
    padding: 10px 12px!important;
    font-size: 16px;
    line-height: 1.42857;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-transform: capitalize;
    width: 100%;
    margin: 12px 4px 0 0!important;
}

#wp-members input[type="submit"]:hover {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}


/*  Bootstrap Clearfix */


/*  Tablet  */

@media (min-width:767px) {
    .list-product-price-infos {
        white-space: normal;
    }
    /* Column clear fix */
    .col-lg-1:nth-child(12n+1),
    .col-lg-2:nth-child(6n+1),
    .col-lg-3:nth-child(4n+1),
    .col-lg-4:nth-child(3n+1),
    .col-lg-6:nth-child(2n+1),
    .col-md-1:nth-child(12n+1),
    .col-md-2:nth-child(6n+1),
    .col-md-3:nth-child(4n+1),
    .col-md-4:nth-child(3n+1),
    .col-md-6:nth-child(2n+1) {
        clear: none;
    }
    .col-sm-1:nth-child(12n+1),
    .col-sm-2:nth-child(6n+1),
    .col-sm-3:nth-child(4n+1),
    .col-sm-4:nth-child(3n+1),
    .col-sm-6:nth-child(2n+1) {
        clear: left;
    }
}


/*  Medium Desktop  */

@media (min-width:992px) {
    /* Column clear fix */
    .col-lg-1:nth-child(12n+1),
    .col-lg-2:nth-child(6n+1),
    .col-lg-3:nth-child(4n+1),
    .col-lg-4:nth-child(3n+1),
    .col-lg-6:nth-child(2n+1),
    .col-sm-1:nth-child(12n+1),
    .col-sm-2:nth-child(6n+1),
    .col-sm-3:nth-child(4n+1),
    .col-sm-4:nth-child(3n+1),
    .col-sm-6:nth-child(2n+1) {
        clear: none;
    }
    .col-md-1:nth-child(12n+1),
    .col-md-2:nth-child(6n+1),
    .col-md-3:nth-child(4n+1),
    .col-md-4:nth-child(3n+1),
    .col-md-6:nth-child(2n+1) {
        clear: left;
    }
}


/*  Large Desktop  */

@media (min-width:1200px) {
    /* Column clear fix */
    .col-md-1:nth-child(12n+1),
    .col-md-2:nth-child(6n+1),
    .col-md-3:nth-child(4n+1),
    .col-md-4:nth-child(3n+1),
    .col-md-6:nth-child(2n+1),
    .col-sm-1:nth-child(12n+1),
    .col-sm-2:nth-child(6n+1),
    .col-sm-3:nth-child(4n+1),
    .col-sm-4:nth-child(3n+1),
    .col-sm-6:nth-child(2n+1) {
        clear: none;
    }
    .col-lg-1:nth-child(12n+1),
    .col-lg-2:nth-child(6n+1),
    .col-lg-3:nth-child(3n+1),
    .col-lg-4:nth-child(3n+1),
    .col-lg-6:nth-child(2n+1) {
        clear: left;
    }
    .col-lg-3:nth-child(3n+1) {
        clear: none;
    }
}


/* -------------------------------------------------- 
:: GALLERY
-----------------------------------------------------*/

ul.gallery {
    margin: 0;
    padding: 0;
    -webkit-padding-start: 0px;
    display: inline-block;
}

ul.gallery li {
    float: left;
    list-style: none;
    margin: 5px 10px 10px 0px;
}


/*==========  Non-Mobile First Method  ==========*/


/* Large Devices, Wide Screens */

@media only screen and (min-resolution: res;
-width: 1200px) {
    main {
        min-height: 920px;
    }
    .blur {
        -webkit-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.11);
        -moz-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.11);
        box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.11);
    }
}

@media only screen and (max-width: 1200px) {
    main {
        min-height: 920px;
    }
    .blur {
        -webkit-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.11);
        -moz-box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.11);
        box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.11);
    }
}


/* Medium Devices, Desktops */

@media only screen and (max-width: 992px) {
    main {
        min-height: 920px;
    }
}


/* Small Devices, Tablets */

@media only screen and (max-width: 768px) {
    body {
        font-size: 2em;
        line-height: 2em;
    }
    header.header-page h2 {
        font-size: 1.5em;
        width: 90%;
        margin: 0 auto;
    }
    header.header-page p {
        font-size: 0.8em;
        width: 90%;
        margin: 0 auto;
    }
    .img-responsive {
        width: 100%;
    }
}


/* Extra Small Devices, Phones */

@media only screen and (max-width: 480px) {
    body {
        font-size: 0.8em;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-weight: 700;
        line-height: 1em;
    }
    .img-responsive {
        width: 100%;
    }
    header.header-page h2 {
        font-size: 1.5em;
        width: 90%;
        margin: 0 auto;
    }
    header.header-page p {
        width: 90%;
        margin: 0 auto;
    }
}


/* Custom, iPhone Retina */

@media only screen and (max-width: 320px) {
    body {
        font-size: 1.3em;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-weight: 700;
        font-size: 1.5em;
        line-height: 1.5em;
    }
    .img-responsive {
        width: 100%;
    }
    header.header-page h2 {
        font-size: 1.5em;
        width: 90%;
        margin: 0 auto;
    }
    header.header-page p {
        width: 90%;
        margin: 0 auto;
    }
}