<?php
//error_reporting(0);
$bgColor = $s0['background'];
$primaryColor = $s0['primaryColor'];
$gprimaryColor = $s0['gprimaryColor'];
$textColor = $s0['text_color'];
$primaryDark = $s0['primaryDark'];
$primaryAccent = $s0['primaryAccent'];
$primaryLight = $s0['primaryLight'];
$secondaryColor = $s0['secondaryColor'];
$gsecondaryColor = $s0['gsecondaryColor'];
$modeGreyDark = $s0['modeGreyDark'];
$modeGreyLight = $s0['modeGreyLight'];
?>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;0,6..12,1000;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800;1,6..12,900;1,6..12,1000&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap');
@font-face {
  font-family: "TheLedDisplaySt";
  src: url('<?php echo $urlweb; ?>/assets/fonts/The Led Display St.ttf');
}
@font-face {
  font-family: "DigitalSansEf";
  src: url('<?php echo $urlweb; ?>/assets/fonts/Digital_Sans_EF_Medium.ttf');
}
@font-face {
  font-family: "advanced_dot_digital7";
  src: url('<?php echo $urlweb; ?>/assets/fonts/advanced_dot_digital-7.ttf');
}

:root {
  --body-color : <?php echo $bgColor; ?>!important;
  --primary-color: <?php echo $primaryColor; ?>!important;
  --g-primary-color: <?php echo $gprimaryColor; ?>!important;
  --primary-dark: <?php echo $primaryDark; ?>!important;
  --primary-accent: <?php echo $primaryAccent; ?>!important;
  --primary-light: <?php echo $primaryLight; ?>!important;
  --secondary-color: <?php echo $secondaryColor; ?>!important;
  --g-secondary-color: <?php echo $gsecondaryColor; ?>!important;
  --mode-greydark: <?php echo $modeGreyDark; ?>!important;
  --mode-greylight: <?php echo $modeGreyLight; ?>!important;
  --text-color: <?php echo $textColor; ?>!important;
}

* {
  margin: 0;
  padding: 0;
}

* {
    transition: background .3s ease-in-out,box-shadow .5s ease-in-out;
}

html, body {
  background: var(--body-color);
  margin: 0;
  padding: 0;
  font-size: 14px;
  font-family: 'DigitalSansEf', sans-serif;
  color: #fff!important;
}

/* Component */

a {
 outline:none;
 color:#fbeb8f;
}
a:focus,
a:hover {
 color:#b88416;
 text-decoration:none
}

.container-fluid {
  margin: 0!important;
  padding: 0!important;
}

.container::before, .container::after {
  display: table;
  content: " ";
}

.btn-main {
  background:var(--mode-greylight);
  background:linear-gradient(to bottom, var(--mode-greylight) 0%,#464646 100%);
  color:#fff;
  border-radius: 15px!important;
  display: block;
  padding: 3px 10px;
  text-transform: uppercase;
  color: inherit;
  line-height: 22px;
  border: none;
  width: 90px;
  text-align: center;
  text-decoration: none;
  outline: none;
}

.btn-main:hover {
  background:#464646;
  background:linear-gradient(to bottom, #464646 0%, var(--mode-greylight) 100%);
  color:#fff;
  border-radius: 15px!important;
  display: block;
  padding: 3px 10px;
  text-transform: uppercase;
  color: inherit;
  line-height: 22px;
  border: none;
  width: 90px;
  text-align: center;
  text-decoration: none;
  outline: none;
}

.btn-secondaries {
  background:var(--primary-color);
  background:linear-gradient(to bottom, var(--g-primary-color) 0%, var(--primary-color) 100%);  
  color:#fff;
  border-radius: 15px!important;
  display: block;
  padding: 3px 10px;
  text-transform: uppercase;
  color: inherit;
  line-height: 22px;
  border: none;
  width: 90px;
  text-align: center;
  text-decoration: none;
  outline: none;
}

.btn-secondaries:hover {
  background:var(--g-primary-color);
  background:linear-gradient(to bottom, var(--primary-color) 0%,var(--g-primary-color) 100%);
  color:#fff;
  border-radius: 15px!important;
  display: block;
  padding: 3px 10px;
  text-transform: uppercase;
  color: inherit;
  line-height: 22px;
  border: none;
  width: 90px;
  text-align: center;
  text-decoration: none;
  outline: none;
}

.btn-transaksi {
  background-color: var(--mode-greylight);
  text-transform: normal;
}

.btn-transaksi:hover,
.btn-transaksi:focus,
.btn-transaksi.active {
  background-color: var(--mode-greydark);
  color: var(--text-color);
  text-transform: normal;
  border-bottom: 3px solid var(--primary-color);
}


/* Component */

/* Header */

.topbar-container {
  padding: 8px 0;
}

.topMenu .input-group {
  background-color: var(--body-color);
  border: 1px solid rgb(255,255,255,0.2);
  border-radius: 3px;
}

.topMenu input.form-control {
  border: 0;
  background-color: var(--body-color);
  color: #fff !important;
  height: 30px;
  border-radius: 3px;
}

.topMenu input.form-control:focus{
  background-color: var(--body-color);
  color: #fff !important;
  height: 30px;
  border-radius: 3px;
}

.topMenu ::placeholder {
  color: #fff !important;
  font-size: 14px;
  opacity: .5 !important;
}

.topMenu .topNav {
  background: #151515;
  border-color: #151515;
  height: 99px!important;
  border-bottom: 4px solid #e2c360;
}

.topMenu ul.top-menu {
  margin: 0;
  padding: 0;
  list-style: none;
  display: flex;
  flex-wrap: nowrap;
}

.topMenu ul.top-menu li.nav-item {
  flex: 1;
}

.topMenu ul.top-menu li.nav-item a.nav-link {
  color: #e2c360!important;
  text-decoration: none;
  display: block;
  padding: 20px 0;
  width: 100%;
  text-align: center;
  color: inherit;
  text-transform: uppercase;
}

.topMenu ul.top-menu li.nav-item a.nav-link:hover {
  color: #e2c360!important;
  text-decoration: none;
  display: block;
  padding: 20px 0;
  width: 100%;
  text-align: center;
  color: inherit;
  text-transform: uppercase;
}

.top-menu [data-icon] {
  display: block;
  margin: 0 auto 5px;
  height: 30px;
  width: 30px;
  background-repeat: no-repeat;
  background-position: top center;
    background-position-y: top;
  background-image: var(--image-src);
}

.top-menu [data-icon="hot-games"] {
  background-position-y: -760px;
}

.top-menu [data-icon="slots"] {
  background-position-y: -290px;
}

.top-menu [data-icon="casino"] {
  background-position-y: -138px;
}

.top-menu [data-icon="others"] {
  background-position-y: -680px;
}

.top-menu [data-icon="sports"] {
  background-position-y: -70px;
}

.top-menu [data-icon="crash-game"] {
  background-position-y: -992px;
}

.top-menu [data-icon="arcade"] {
  background-position-y: -212px;
}

.top-menu [data-icon="poker"] {
  background-position-y: -367px;
}

.top-menu [data-icon="e-sports"] {
  background-position-y: -921px;
}

.top-menu [data-icon="promotion"] {
  background-position-y: -520px;
}

@media (max-width: 480px) {
  
}

/* Header */

/* Content */

.form-tab-heading {
  display: flex;
  margin-top: 20px;
  margin-bottom: 15px;
}

.form-heading-subtab.active:before {
  content: "";
  position: absolute;
  left: 35%;
  right: 35%;
  bottom: 0;
  height: 2px;
  background-color: var(--primary-color);
}

.form-heading-subtab.active {
  opacity: 1;
}

.form-heading-subtab {
  width: 100%;
  padding-bottom: 7px;
  color: var(--mode-dark);
  opacity: .6;
  font-weight: 700;
  position: relative;
}

.information {
  background-color: #2b2b2b;
  color: #f4df80;
  border-radius: 5px;
  margin: 15px 0;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
}

.information > [data-section="title"], .information > [data-section="date"] {
  display: flex;
  align-items: center;
}

.information > [data-section="announcements"] {
  background: #2b2b2b;
}

.information > [data-section="announcements"] {
  width: 60%;
  background: var(--body-color);
  overflow: hidden;
}

section .gameList {
  display: grid;
  grid-gap: .5rem;
  grid-auto-flow: dense;
  grid-template-columns: repeat(6,minmax(0,1fr));
}

section .gameListColoumn {
  width: 100%;
  height: auto;
  margin-bottom: 5px;
}

section .gameListColoumn .gameList_box {
  width: 100%;
  height: 175px;
}

.download-apk-container {
  background: var(--image-src);
  background-size: cover;
  overflow: hidden;
}

.download-apk {
  display: flex;
  align-items: center;
  font-family: Arial;
  color: #fff;
}

.download-apk > div:nth-child(1) {
  transform: translateX(-100%);
}

.download-apk > div {
  flex-basis: 50%;
  opacity: 0;
  transition: all 1s ease;
}

.download-apk .h2 {
  font-family: Arial;
  text-transform: uppercase;
  font-weight: 100;
  font-size: 35px;
  margin: 0;
}

.download-apk-info {
  display: flex;
  justify-content: space-between;
  margin: 10px 0;
}

.download-apk-info .download-apk-section {
  flex-basis: 50%;
}
.download-apk-section {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  font-weight: 600;
  text-align: center;
  font-size: 16px;
}

.download-apk-section > * {
  flex-basis: 50%;
  margin: 5px 0;
}

.download-apk-qr-code img {
  max-width: 94px;
}

.download-apk-detail {
  text-align: left;
  font-size: 18px;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  text-align: center;
}

.download-apk .btn {
  color: #000;
  background: #f8e689;
  background: linear-gradient(to bottom,#f8e689 0%,#bf8e20 100%);
  border: none;
}

.download-apk .btn {
  color: #fff;
  font-weight: 600;
  display: block;
  padding: 3px;
  border-radius: 20px;
  text-align: center;
  background: #f69c00;
  background: linear-gradient(to bottom,#f69c00 0%,#d17601 100%);
  border: none;
}

section .gameListCasino {
  display: grid;
  grid-gap: .5rem;
  grid-auto-flow: dense;
  grid-template-columns: repeat(3,minmax(0,1fr));
  margin-top: 50px;
}

section .gameListCasinoColoumn {
  width: 100%;
  height: auto;
  margin-bottom: 5px;
}

section .gameListCasinoColoumn .casinoListBox {
  width: 100%;
  height: 425px !important;
}

section .promoList {
  display: grid;
  grid-gap: .5rem;
  grid-auto-flow: dense;
  grid-template-columns: repeat(1,minmax(0,1fr));
}

section .promoListColoumn {
  width: 100%;
  height: auto;
  margin-bottom: 5px;
}

.box_promo {
  width: 100%;
  height: 275px;
  overflow: hidden;
  border-radius: 5px;
}

.box_promo img {
  display: block;
  margin: 0 auto;
  width: 100%;
  height: 100%;
}

.box_promo .box_detail {
  display: none;
}

.box_promo:hover .box_detail {
  display: block;
}

.box_promo .box_detail {
  position: absolute;
  bottom: 0;
  left: 0;
  background: rgb(0,0,0,0.5);
  width: 100%;
  padding: 8px;
}

.box_promo .box_detail h5{
  font-size: 16px;
  font-weight: 700;
}

.zoom {
  transition: transform .5s; /* Animation */
}

.zoom:hover {
  transform: scale(1.1);
}



@media (max-width: 480px) {
  *, ::before, ::after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  .login-links-container {
    display: flex;
  }

  .login-links-container a {
    flex-basis: 50%;
    color: #fff;
    padding: 14px 20px;
    text-align: center;
    line-height: 1;
    text-decoration: none;
    font-size: 18px;
  }

  .login-links-container a.btn_register {
    background: #fae58c;
    background: linear-gradient(to bottom,#fae58c 0%,#ba8a1c 100%);
  }

  .login-links-container a.btn_login {
    background: #696969;
    background: linear-gradient(to bottom,#696969 0%,#383838 100%);
  }

  .main-menu-outer-container > main {
    background-color: #131313;
    margin: 0;
    flex-grow: 1;
    display: flex;
    overflow: auto;
  }

  .main-menu-outer-container > main > a:first-child {
    margin-left: auto;
  }

  .main-menu-outer-container > main > a {
    display: block;
    white-space: nowrap;
    padding: 10px;
    min-width: 80px;
    font-size: 12px;
    text-align: center;
    text-transform: uppercase;
    color: #fff;
  }

  .main-menu-outer-container > main > a > img {
    display: block;
    height: 25px;
    width: 25px;
    margin: 10px auto;
  }

  section .gameList {
    display: grid;
    grid-gap: .5rem;
    grid-auto-flow: dense;
    grid-template-columns: repeat(3,minmax(0,1fr));
  }

  section .gameListColoumn {
    width: 100%;
    height: auto;
    margin-bottom: 5px;
  }

  section .gameListColoumn .gameList_box {
    width: 100%;
    height: 125px;
  }

  section .gameListCasino {
    display: grid;
    grid-gap: .5rem;
    grid-auto-flow: dense;
    grid-template-columns: repeat(2,minmax(0,1fr));
    margin-top: 10px;
  }

  section .gameListCasinoColoumn {
    width: 100%;
    height: auto;
    margin-bottom: 5px;
  }

  section .gameListCasinoColoumn .casinoListBox {
    width: 100%;
    height: 250px!important;
  }

  .box_promo {
    width: 100%;
    height: 150px;
    overflow: hidden;
    border-radius: 5px;
  }

  .box_promo img {
    display: block;
    margin: 0 auto;
    width: 100%;
    height: 100%;
  }

  .box_promo .box_detail {
    display: block;
    position: absolute;
    bottom: 0;
    left: 0;
    background: rgb(0,0,0,0.5);
    width: 100%;
    padding: 8px;
  }

  .box_promo .box_detail h5{
    font-size: 16px;
    font-weight: 700;
  }

  .zoom {
    transition: transform .5s; /* Animation */
  }

  .zoom:hover {
    transform: scale(1.1);
  }
}

/* Content */

/* Footer */

footer {
  border-top-color: #101010;
  background: #0d0d0d;
  background-image: none;
  background-image: none;
  padding: 20px 0;
}

.footer-links, .copyright {
  margin-bottom: 15px;
}

.footer-links {
  margin: 0;
  margin-bottom: 0px;
  padding: 0;
  list-style: none;
}

.footer-links > li {
  display: inline-block;
}

.footer-links > li > a {
  cursor: pointer;
  display: block;
  color: #737373;
  padding-right: 10px;
  line-height: 20px;
  text-decoration: none;
}

.footer-links > li > a:hover {
  cursor: pointer;
  display: block;
  color: #fbeb8f;
  padding-right: 10px;
  line-height: 20px;
  text-decoration: none;
}

.copyright {
  color: #737373;
  text-align: right;
}

.footer-separator {
  border-top-color: #3d3b3e;
}

.footer-separator {
  padding: 15px 0 0;
  margin: 15px 0 0;
  border-top: 1px dotted #3d3b3e;
}

.site-description {
  color: #3d3b3e;
  overflow: hidden;
}

.footMenu {
  display: grid;
  grid-gap: .5rem;
  grid-auto-flow: dense;
  grid-template-columns: repeat(5,minmax(0,1fr));
}

.footMenuColomn {
  width: 100%;
  height: auto;
  text-align: center;
}

.footMenuColomn .foot_image {
  background-color: #303030;
  background-image: linear-gradient(to bottom,#303030 0%,#282828 100%);
  width: 50px;
  height: 50px;
  line-height: 30px;
  display: block;
  margin: 0 auto;
  margin-top: -22px;
  padding-top: 12px;
  border-radius: 50%;
}

.foot_icon {
  width: 64px;
  height: 64px;
  margin-bottom: 25px;
}

.foot_icon a img {
  display: block;
  width: 64px;
  height: 64px;
  margin: 0 auto;
}

@media (max-width: 480px) {
  footer {
    padding-top: 15px;
    background-color: #00051a;
    color: #3b4b71;
    line-height: 20px;
  }

  footer .contact-list {
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    overflow-x: auto;
  }

  footer ul.contact-list > li {
    flex-basis: 50%;
    padding: 5px 10px;
  }

  footer .contact-list > li a {
    display: flex;
    align-items: center;
    text-decoration: none;
    background-color: #040a2a;
    border-radius: 30px;
    background-color: #0a0a0a;
    color: #fff;
  }

  footer .contact-list > li a i {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    margin-right: 10px;
    border-radius: 50%;
    background: #b9a353;
  }

  footer h2 {
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    font-size: 18px;
    margin-top: 25px;
  }

  footer .bank-list {
    margin: 0;
    padding: 10px 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    list-style: none;
  }

  footer .bank-list > li {
    margin: 5px 5px;
    text-align: center;
    padding-left: 5px;
  }

  footer .bank-list [data-online="true"]::before {
    background-color: #0f0;
  }

  footer .bank-list [data-online="false"]::before {
    background-color: #e00;
  }

  footer .bank-list [data-online="true"]::before, footer .bank-list [data-online="false"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: -10px;
    bottom: 0;
    width: 5px;
    border-radius: 2px;
  }

  footer .bank-list [data-online] {
    position: relative;
    display: inline-block;
    width: 80px;
    min-height: 40px;
  }

  footer .bank-list [data-online] img {
    width: 80px;
    height: 40px;
  }

  footer .footer-links {
    background-color: #1d1d1d;
    color: #b9a353;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  footer .footer-links > li {
    flex-basis: 25%;
    text-align: center;
    margin: 5px 0;
  }

  footer .footer-links a {
    color: inherit;
    display: block;
    padding: 5px;
    font-size: 12px;
  }

  footer .site-description {
    text-align: center;
    background-color: #080808;
    padding: 10px 0 20px;
    overflow: hidden;
    font-size: 12px;
    color: #737373;
  }
}

/* Footer */

/* Sidebar */

.sticky-left {
    position: fixed;
    top: 0;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 9900;
  top: 0;
  right: 0;
  background-color: var(--body-color);
  transition: 0.5s;
}

.sidenavTop {
  width: 100%;
}

.sidenav .sidebarMenuLeft {
  background-color: #303030;
  background-image: linear-gradient(to bottom,#303030 0%,#282828 100%);
  padding: 20px;
  font-size: 12px;
}

.sidebarMenuLeft .input-group {
  background-color: var(--body-color);
  border: 1px solid rgb(255,255,255,0.2);
  border-radius: 3px;
}

.sidebarMenuLeft input.form-control {
  border: 0;
  background-color: var(--body-color);
  color: #fff !important;
  height: 30px;
  border-radius: 3px;
}

.sidebarMenuLeft input.form-control:focus{
  background-color: var(--body-color);
  color: #fff !important;
  height: 30px;
  border-radius: 3px;
}

.sidebarMenuLeft ::placeholder {
  color: #fff !important;
  font-size: 14px;
  opacity: .5 !important;
}

.sidenav .sidebarMenuLeft .user-menu {
  background-color: #2a2a2a;
  background-image: linear-gradient(to bottom,#2a2a2a 0%,#373737 100%);
  display: flex;
  justify-content: space-around;
  font-size: 10px;
  overflow: hidden;
}

.sidenav .sidebarMenuLeft .user-menu .user-menu-item {
  flex-basis: initial;
  flex: 1;
}

.sidenav .sidebarMenuLeft .user-menu .user-menu-item {
  margin: 10px 0;
  padding: 0 10px;
  flex-basis: calc(100%/3);
}

.sidenav .sidebarMenuLeft .user-menu-item + .user-menu-item {
  border-left: 1px groove #fff;
}

.sidenav .sidebarMenuLeft .user-menu .user-menu-item > a {
  flex-direction: column;
}

.sidenav .sidebarMenuLeft .user-menu .user-menu-item > a {
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  height: 100%;
  white-space: nowrap;
}

.sidenav .sidebarMenuLeft .user-menu-item > a > img {
  width: 20px;
  height: 20px;
  margin-bottom: 5px;
}

.sidenavBottom {
  background-color: var(--body-color);
  width: 100%;
  height: 100%;
}

.sidenav .side_navigation ul.nav.flex-column li.nav-item a.nav-link {
  background : none;
  color: #fbeb8f;
  font-size: 12px;
  font-weight: 700;
  -webkit-transition: line-height 0.3s ease-in-out;
  transition: line-height 0.3s ease-in-out;
  border-bottom: 1px solid #343a40;
  padding: 1rem;
}

.sidenav .side_navigation ul.nav.flex-column li.nav-item a.nav-link:hover {
  background: rgb(253,208,23,0.3);
  color: #FFB302!important;
}


/* Sidebar */

/* Jackpot */

.home-jackpot-container {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.home-jackpot-container [data-section="jackpot"] {
  flex-basis: calc((100% - 15px)*.8);
}

.home-jackpot-container [data-section] {
  height: 140px;
}

.home-jackpot-container [data-section="jackpot"] .progressive-jackpot {
  height: 100%;
}

.progressive-jackpot {
  background: center no-repeat;
    background-image: none;
    background-size: auto;
  background-size: contain;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

.progressive-jackpot .jackpot-play {
  width: min(220px,15vw);
  height: auto;
}

.progressive-jackpot .jackpot-currency, .progressive-jackpot .jackpot-container {
  color: #baad6b;
}

.progressive-jackpot .jackpot-container {
  font-family: 'advanced_dot_digital7';
  color: #fff;
  font-size: min(1.25vw,24px);
  width: 73%;
  text-align: center;
  letter-spacing: 5px;
  padding: 0 50px;
}

@media (max-width: 480px) {
  .progressive-jackpot {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-bottom: 20px;
    position: relative;
    padding-top: 10px;
  }

  .progressive-jackpot .jackpot-play {
    max-width: 70%;
    margin: 0 auto;
  }

  .progressive-jackpot .jackpot-container {
    font-family: 'advanced_dot_digital7';
    color: #fff;
    font-size: min(17px,4.5vw);
    text-align: center;
    background: center no-repeat;
      background-color: rgba(0, 0, 0, 0);
      background-image: none;
      background-size: auto;
    background-size: 100% auto;
    background-color: #000;
    aspect-ratio: 305/62;
    letter-spacing: 3px;
    width: calc(100% - 20px);
    max-width: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
}
</style>