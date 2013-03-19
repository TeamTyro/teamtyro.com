<?php
$revisit = false;
if(isset($_COOKIE['div'])){
$revisit = true;
} else {
setcookie('div', true, 5184000 + time()); //hold fo 2 months
$revisit = false;
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

    <link rel="stylesheet" href="/ext/css/foundation.min.css" />
    <link rel="stylesheet" href="/ext/css/normalize.css" />
    <link rel="stylesheet" href="/ext/css/app.css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/ext/js/jquery-1.9.0.min.js"><\/script>')</script>
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
<div class="row game">
    <div class="large-7 columns">
        <applet class="large-centered"code="org.lwjgl.util.applet.AppletLoader" archive="lwjgl_util_applet.jar" codebase="." width="600" height="600">

            <!-- The following tags are mandatory -->

            <!-- Name of Applet, will be used as name of directory it is saved in, and will uniquely identify it in cache -->
            <param name="al_title" value="testgame">

            <!-- The main class of the applet -->
            <param name="al_main" value="MazeGame">

            <!-- The jars to be included in the Java Classpath -->
            <param name="al_jars" value="colormazegame.jar, lwjgl.jar, jinput.jar, lwjgl_util.jar">

            <!-- Specifies the natives for each platform -->
            <param name="al_windows" value="windows_natives.jar">
            <param name="al_linux" value="linux_natives.jar">
            <param name="al_mac" value="macosx_natives.jar">

        </applet>
        <div class="row">
            <div class="large-7 columns text-center">
                <p>This game requires <a href="http://www.java.com/en/download/index.jsp">Java</a> to play. <br/>
                <em>Not available on mobile devices, mouse and keyboard are required to play.</em></p>
            </div>
            <?php
            if($revisit){
            echo "<div>You've been here</div>";
            } else {
            echo "<div>Its your first time!</div>";
            }
            ?>
        </div>
    </div>
    <div class="large-5 columns">
        <h3>Color Maze Game</h3>
        <div class="social">
            <iframe src="http://ghbtns.com/github-btn.html?user=teamtyro&repo=color-maze-game&type=watch&count=true"
  allowtransparency="true" frameborder="0" scrolling="0" width="90" height="20"></iframe>
            <iframe src="http://ghbtns.com/github-btn.html?user=teamtyro&repo=color-maze-game&type=fork&count=true"
  allowtransparency="true" frameborder="0" scrolling="0" width="95" height="20"></iframe>
        </div>
        <h4 class="subheader">How to play:</h4>
        <p>
            To collect the best data on how the human brain learns, we must simulate an environment in which the player has <em>no pre-recognitions</em> on how to solve the presented game.  This way, the player has to learn in a similar way to the artificial intelligence: with no prior knowledge of how to complete the game.  So go ahead, it's up to you to learn how to play the game!
        </p>
        <h4 class="subheader">Controls:</h4>
        <p>
            Click on the game window to play, then use arrow keys to move <kbd>up</kbd>, <kbd>down</kbd>, <kbd>left</kbd> and <kbd>right</kbd>.
        </p>
    </div>
</div>
<footer>
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