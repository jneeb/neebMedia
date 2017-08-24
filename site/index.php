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

        <section id="portfolioHero">
            <h1>CONTACT</h1>
        </section>

        <section id="contact">
            <h2>INTERESTED IN WORKING WITH US?</h2>
            <p>Call us today at <b>(647) 550 4905</b> for a free quote, or email us below.</p>
            <p class="error">Please correct the following:</p><br />
            <?php echo $myError; ?>
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
	$subject = "neebMedia - Websites";
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
        <title>Toronto Web Design | NeebMedia</title>
        <link rel="stylesheet" href="/css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="/img/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,600" rel="stylesheet">
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

        <section id="hero">
            <h1>
                <span>
                    <p>WEB DESIGN, E-COMMERCE AND SEARCH ENGINE OPTIMIZATION.</p>
                    <a href="#contact"><button type="button" name="button">GET A FREE QUOTE</button></a>
                </span>
            </h1>
        </section>

        <section id="services">
            <h2>SERVICES</h2>
            <p></p>
            <div class="rowWrap">
                <div class="row">
                    <a href="/portfolio"><img src="/img/atreo.jpg" alt=""></a>
                    <a href="/portfolio"><h3>Websites</h3></a>
                    <a href="/portfolio"><p>Custom built websites to match the look and feel of your business.</p></a>
                </div>
                <div class="row">
                    <a href="/seo"><img src="/img/seo.jpg" alt=""></a>
                    <a href="/seo"><h3>Search Engine Optimization</h3></a>
                    <a href="/seo"><p>Bring your website to the top of search engines and allow your customers to find you.</p></a>
                </div>
                <div class="row">
                    <a href="/ecommerce"><img src="/img/ecom.jpg" alt=""></a>
                    <a href="/ecommerce"><h3>eCommerce Websites</h3></a>
                    <a href="/ecommerce"><p>Easy and great looking eCommerce solution that maximizes conversion and minimizes headache.</p></a>
                </div>
            </div>
        </section>

        <section id="contact">
            <h2>INTERESTED IN WORKING WITH US?</h2>
            <p>Call us today at <b>(647) 550 4905</b> for a free quote, or email us below.</p>
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
