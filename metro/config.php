<?PHP
/* CONFIG SETTINGS - change for your needs */
$siteTitle = 'Gymkhana IITB'; /* will be displayed above the url-bar */
$siteName = 'Gymkhana IITB'; /* The biggest title on your homepage */
$siteTitleHome = 'Welcome to our new Site'; // will be displayed above the url-bar when the home-page is open
$siteFooter = '©My Name';
$siteDescription = 'your description about your site'; // fill in a description of your site, max 150 chars
$siteKeywords = 'site, blabla, blablabla'; //keywords of your site,max 10 keywords, seperated by commas

/*Must be the same as the pageLink array in js/config.js ! For SEO optimization (tip: first create the array in config.js, then copy it here and place a $-sign in front of every line */
$pageLink = array();
$pageLink['A new page'] = 'mypage.php';
$pageLink['Testing slides'] = 'testslides.html';
$pageLink['Other content to test'] = 'othercontent.php';


/*BACKGROUND OPTIONS*/
$enableBackgroundImg = false; // set false for only backgroundColor, note that a background image can cause that the slideanimations are not smooth!! recommend to NOT use a background image!
$backgroundImg = 'img/bg/green.png'; // your background image path
$backgroundColor =  '#310C31';//'#260930'; // you MUST fill in background-color that has about the same color as your background image, to prevent flickering!

/*YOUR LOGIN FOR ADMIN SECTION, access it on http:/yoursite.com/admin/ */
$adminLogin = 'yourusername';
$adminPassword = 'yourpassword';

/*COMPRESSING */
$enableCompressionCss = false; // compress and combine CSS files? See the admin section and tutorial on http://metro-webdesign.info before enabling this!
$enableCompressionJs = false; // compress and combine Javascript files? See the admin section and tutorial on http://metro-webdesign.info before enabling this!
?>
