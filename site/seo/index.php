<?php
session_start();
function generateFormToken($form) {
	$token = md5(uniqid(microtime(), true));
	$_SESSION[$form.'_token'] = $token;
	return $token;
}
function verifyFormToken($form) {
	if (!isset($_SESSION[$form.'_token'])) {
		return false;
	}
	if (!isset($_POST['token'])) {
		return false;
	}
	if ($_SESSION[$form.'_token'] !== $_POST['token']) {
		return false;
	}
	return true;
}
function check_input($data, $problem='')
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	if ($problem && strlen($data) == 0)
	{
		show_error($problem);
	}
	return $data;
}
function show_error($myError)
{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Toronto Web Design | NeebMedia</title>
        <link rel="stylesheet" href="/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="/img/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,600" rel="stylesheet">
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-94009407-2', 'auto');
		  ga('send', 'pageview');

		</script>
    </head>
    <body>
        <section id="header">
            <div class="mobileNav">
                <div class="mobileLogo">
                    <a href="/"><img src="/img/neebMediaLogoWeb_noBack_black.png" alt="neebMedia"></a>
                </div>

                <div id="burger">
                    <span></span>
                </div>

                <div id="mobileSlider">
                    <ul>
                        <li><a href="/portfolio">PORTFOLIO</a></li>
                        <li><a href="#contact">CONTACT US</a></li>
                    </ul>
                </div>
            </div>

            <div class="desktopNav">
                <div class="desktopLogo"><a href="/"><img src="/img/neebMediaLogoWeb_noBack_black.png" alt="neebMedia"></a></div>
                <ul>
                    <li><a href="/portfolio">PORTFOLIO</a></li>
                    <li><a class="highlight" href="#contact">CONTACT US</a></li>
                </ul>
            </div>
        </section>

        <section class="completeMessage">
			<h1>ERROR! <br /> <p class="error">Please correct the following:</p><br />
        	<?php echo $myError; ?></h1>
			<a href="/contact"><button type="button" name="button">Contact</button></a>
		</section>

        <section id="footer">
            <div class="webMap">
                <ul>
                    <li><a href="/">HOME</a></li>
                    <li><a href="/portfolio" class="subPage">PORTFOLIO</a></li>
                    <li><a href="/ecommerce" class="subPage">E-COMMERCE</a></li>
                    <li><a href="/seo" class="subPage">SEAR CH ENGINE OPTIMIZATION</a></li>
                </ul>
            </div>
            <div class="socialLinks">
                <!-- <i class="fa fa-facebook" aria-hidden="true"></i> -->
                <a href="https://twitter.com/neebMedia"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/neebmedia/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <!-- <i class="fa fa-snapchat-ghost" aria-hidden="true"></i> -->
                <!-- <i class="fa fa-linkedin" aria-hidden="true"></i> -->
                <!-- <i class="fa fa-youtube-play" aria-hidden="true"></i> -->
            </div>
        </section>

    </body>
</html>
<?php
exit();
}
if (verifyFormToken('form1')) {
	$myemail = 'mail@justinneeb.com';
	$name = check_input($_POST['name'], "Enter your name.");
	$email = check_input($_POST['email']);
	$comments = check_input($_POST['comments'], "Please include a message.");
	$subject = "neebMedia - SEO";
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
	{
	    show_error("E-mail address not valid");
	}
	$message = "Name: $name
	Email: $email
	Message: $comments";
	mail($myemail, $subject, $message);
	header('Location: formComplete.html');
	exit();
} else {
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Toronto SEO | NeebMedia</title>
        <link rel="stylesheet" href="/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="/img/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,600" rel="stylesheet">
		<meta name="description" content="Toronto professional experts in affordable website design, eCommerce development, SEO (Search Engine Optimization) and custom WordPress design.">
		<meta name="keywords" content="Toronto affordable web design, custom wordpress, toronto eCommerce, toronto search engine optimization, expert toronto design">
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-94009407-2', 'auto');
		  ga('send', 'pageview');

		</script>
    </head>
    <?php
	$newToken = generateFormToken('form1');
	?>
    <body>
		<section id="header">
            <div class="mobileNav">
                <div class="mobileLogo">
                    <a href="/"><img src="/img/neebMediaLogoWeb_noBack_black.png" alt="neebMedia"></a>
                </div>

                <div id="burger">
                    <span></span>
                </div>

                <div id="mobileSlider">
                    <ul>
                        <li><a href="/portfolio">PORTFOLIO</a></li>
                        <li><a href="#contact">CONTACT US</a></li>
                    </ul>
                </div>
            </div>

            <div class="desktopNav">
                <div class="desktopLogo"><a href="/"><img src="/img/neebMediaLogoWeb_noBack_black.png" alt="neebMedia"></a></div>
                <ul>
                    <li><a href="/portfolio">PORTFOLIO</a></li>
                    <li><a class="highlight" href="#contact">CONTACT US</a></li>
                </ul>
            </div>
        </section>

        <section id="portfolioHero" class="seoHero">
            <h1>SEARCH ENGINE OPTIMIZATION</h1>
        </section>

        <section id="portfolioAbout">
            <p>It isn't enough to have a good looking functional website, search engine optimization is jusxt as important when it comes to building your online presence. With our SEO package, we will research market tendencies to allow your website to be a top result on all search engines.</p>
            <p>SEO doesn't stop at the search results. We will also collect anyaltics on your visitors to track and improve on sales conversions.</p>
            <p>Call us today at <b>(647) 550 4905</b> for a free quote, or email us below.</p>
        </section>

        <section id="contact">
            <h2>INTERESTED IN WORKING WITH US?</h2>
            <section id="contactForm">
                <form action="index.php" id="form" method="post">
    						<input type="hidden" name="token" value="<?php echo $newToken; ?>">
    						<input type="text" name="name" placeholder="Name:">
    						<input type="text" name="email" placeholder="Email:">
    						<textarea name="comments" placeholder="Tell us about the project:" id="" cols="30" rows="10"></textarea>
    						<button type="submit" name="submit">Send</button>
    					</form>
            </section>
        </section>

        <section id="footer">
            <div class="webMap">
                <ul>
                    <li><a href="/">HOME</a></li>
                    <li><a href="/portfolio" class="subPage">PORTFOLIO</a></li>
                    <li><a href="/ecommerce" class="subPage">E-COMMERCE</a></li>
                    <li><a href="/seo" class="subPage">SEARCH ENGINE OPTIMIZATION</a></li>
                </ul>
            </div>
            <div class="socialLinks">
                <!-- <i class="fa fa-facebook" aria-hidden="true"></i> -->
                <a href="https://twitter.com/neebMedia"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/neebmedia/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <!-- <i class="fa fa-snapchat-ghost" aria-hidden="true"></i> -->
                <!-- <i class="fa fa-linkedin" aria-hidden="true"></i> -->
                <!-- <i class="fa fa-youtube-play" aria-hidden="true"></i> -->
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
    <script type="text/javascript" src="/functions/burger.js"></script>
    <script type="text/javascript" src="/functions/smoothScroll.js"></script>
</html>
