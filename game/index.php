<?php

ob_start();

if(isset($_COOKIE['name'])){
    $name = $_COOKIE['survey_name'];
    $email = $_COOKIE['survey_email'];
    $gender = $_COOKIE['survey_gender'];
    $age = $_COOKIE['survey_age'];
}

?>
<!DOCTYPE HTML>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--
     ______                            ______
    /\__  _\                          /\__  _\
    \/_/\ \/    __     __      ___ ___\/_/\ \/ __  __  _ __   ___
       \ \ \  /'__`\ /'__`\  /' __` __`\ \ \ \/\ \/\ \/\`'__\/ __`\
        \ \ \/\  __//\ \L\.\_/\ \/\ \/\ \ \ \ \ \ \_\ \ \ \//\ \L\ \
         \ \_\ \____\ \__/.\_\ \_\ \_\ \_\ \ \_\/`____ \ \_\\ \____/
          \/_/\/____/\/__/\/_/\/_/\/_/\/_/  \/_/`/___/> \/_/ \/___/
                                                   /\___/
                                                   \/__/
    Web Developer: Jack Ketcham
    -->

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />

    <title>Play - Team Tyro</title>

    <link rel="stylesheet" href="/ext/css/foundation.min.css?v=1.2" />
    <link rel="stylesheet" href="/ext/css/normalize.css" />
    <link rel="stylesheet" href="/ext/css/app.css?v=1.2" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/ext/js/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="/ext/js/custom.modernizr.js"></script>

    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div class="wrapper sticky">
    <div class="large-12 columns contain-to-grid sticky">
        <nav class="top-bar">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="/">Team Tyro</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
            <section class="top-bar-section">
                <ul class="left">
                    <li>
                        <a href="#">The Team</a>
                    </li>
                    <li>
                        <span data-tooltip class="has-tip tip-top" title="Coming soon, watch the AI play the game!"><a href="#">Neural Network</a></span>
                    </li>
                    <li>
                        <span data-tooltip class="has-tip tip-top" title="Coming soon, watch the AI play the game!"><a href="#">Genetic Algorithm</a></span>
                    </li>
                </ul>
                <ul class="right">
                    <li><a href="#">Contact</a></li>
                    <li><a href="mailto:kcajketcham@gmail.com?subject=Team Tyro Feedback">Feedback</a></li>
                </ul>
            </section>
        </nav>
    </div>
</div>
<div class="row content_load">
<?php

if(isset($_COOKIE['survey_complete'])){
    include("colorgame.php");
} else {
    include("survey.php");
}

?>
</div>
<footer class="sticky-bottom">
    <div class="row">
        <div class="large-10 columns">
            <p>Built by <a href="http://jackketcham.com">Jack Ketcham</a></p>
            <p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
            <ul class="inline-list">
                <li><a href="http://github.com/teamtyro/teamtyro.com/issues?state=open">Submit issues</a></li>
                <li><a href="http://github.com/teamtyro/teamtyro.com">Code</a></li>
            </ul>
        </div>
        <div class="large-2 columns">
            <a href="">Back to top</a>
        </div>
    </div>
</footer>

    <script src="/ext/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>
</html>