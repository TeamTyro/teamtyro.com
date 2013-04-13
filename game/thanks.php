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
    <link rel="shortcut icon" href="http://teamtyro.com/favicon.ico" />

    <meta name="description" content="We're a group of high school students that are studying the way different types of artificial intelligence (AI) algorithms learn, when compared to humans.">
    <meta name="keywords" content="Project, AI, High School, Project Lead the Way, Java">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Team Tyro, studying AI and humans with a game">
    <meta name="twitter:url" content="http://teamtyro.com/">
    <meta name="twitter:description" content="We're a group of high school students that are studying the way different types of artificial intelligence (AI) algorithms learn, when compared to humans.">
    <meta name="twitter:image" content="http://teamtyro.com/ext/img/website-capture.png">
    <meta property="og:locale" content="en_US" />
    <meta property="og:title" content="Team Tyro, studying AI and humans with a game"/>
    <meta property="og:description" content="We're a group of high school students that are studying the way different types of artificial intelligence (AI) algorithms learn, when compared to humans."/>
    <meta property="og:url" content="http://teamtyro.com/"/>
    <meta property="og:image" content="http://teamtyro.com/ext/img/website-capture.png" />
    <meta property="og:site_name" content="Team Tyro"/>

    <title>Thanks! - Team Tyro</title>

    <link rel="stylesheet" href="/ext/css/foundation.v1.min.css" />
    <link rel="stylesheet" href="/ext/css/normalize.css" />
    <link rel="stylesheet" href="/ext/css/app_v1.01.css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/ext/js/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="/ext/js/custom.modernizr.js"></script>
    <script src="/ext/js/deployJava.js"></script>

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
                        <a href="/game">The Game</a>
                    </li>
                    <li>
                        <span data-tooltip class="has-tip tip-top" title="Coming soon, watch the AI play the game!"><a href="#">Neural Network</a></span>
                    </li>
                    <li>
                        <span data-tooltip class="has-tip tip-top" title="Coming soon, watch the AI play the game!"><a href="#">Genetic Algorithm</a></span>
                    </li>
                </ul>
                <ul class="right">
                    <li><a href="/team">The Team</a></li>
                    <li><a href="mailto:contact@teamtyro.com">Contact</a></li>
                    <li><a href="mailto:feedback@teamtyro.com?subject=Team Tyro Feedback - ">Feedback</a></li>
                </ul>
            </section>
        </nav>
    </div>
</div>
<div class="row content_load thanks">
    <div>
        <h3>Thank you for playing our game!</h3>
    </div>
    <div class="large-12 columns text-center panel">
        <?php 
            if(isset($_GET['time'])) {
                parseString($_GET['time']);
            } else {
                $pretty_time = null;
            }

            function parseString($time) {
                global $pretty_time, $timeData;
                $timeData[0] = substr($time, 0, 2);
                $timeData[1] = substr($time, 3, -7);
                $timeData[2] = substr($time, 6, -4);
                $timeData[3] = substr($time, 9);

                if($timeData[0] !== "00") {
                    if($timeData[0] == "01"){
                        $pretty_time = $timeData[0] . " hour, ";
                    } else {
                        $pretty_time = $timeData[0] . " hours, ";
                    }
                    if($timeData[1] !== "00"){
                        if($timeData[1] == "01"){
                            $pretty_time .= $timeData[1] . " minute and " . $timeData[2] . "." . $timeData[3] . " seconds!";
                        } else {
                            $pretty_time .= $timeData[1] . " minutes and " . $timeData[2] . "." . $timeData[3] . " seconds!";
                        }
                    } else {
                        $pretty_time .= " and " . $timeData[2] . "." . $timeData[3] . " seconds!";
                    }
                } elseif($timeData[1] !== "00") {
                    if($timeData[1] == "01"){
                        $pretty_time .= $timeData[1] . " minute and " . $timeData[2] . "." . $timeData[3] . " seconds!";
                    } else {
                        $pretty_time .= $timeData[1] . " minutes and " . $timeData[2] . "." . $timeData[3] . " seconds!";
                    }
                } else {
                    $pretty_time .= $timeData[2] . "." . $timeData[3] . " seconds!";
                }
            }
        ?>
        <h5>
            <?php 
            echo "You've successfully completed the game";
            if(isset($pretty_time)){ 
                echo ", and in only <span class=\"time\">" . $pretty_time . "</span>";
            } else { 
                echo "!";
            } ?>
        </h5>
        <div class="social">
            <a href="https://twitter.com/share" class="twitter-share-button" title="Share your time on Twitter" data-url="http://teamtyro.com/" data-text="I just completed Team Tyro's game with a time of <?php echo $_GET['time'] ?>! Can you beat that and help their study?" data-size="large" data-count="none">Tweet</a>
            
        </div>
    </div>
    <div class="play_again large-6 columns">
        <p>Feeling lucky? Try and get a better time</p>
        <a href="/game" class="button success">Play again</a>
    </div>
    <div class="large-6 columns">
        <h6>You've just helped us further our study comparing how humans and AI learn, thanks!</h6>
        <p>Please consider spreading the word</p>
        <div class="columns large-centered">
            <ul class="social-list inline-list">
                <li>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://teamtyro.com/" data-size="small" data-text="Team Tyro, help a study on AI and humans by playing a quick game">Tweet</a>
                </li>
                <li>
                    <div class="g-plusone" data-size="medium" data-href="http://teamtyro.com/"></div>
                </li>
                <li>
                    <div class="fb-like" data-href="http://teamtyro.com/" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>
                </li>
            <script type="text/javascript">
              (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </ul>
        </div>
    </div>
</div>
<footer class="sticky-bottom">
    <div class="row">
        <div class="large-10 columns">
            <p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
            <ul class="inline-list">
                <li><a href="http://github.com/teamtyro/teamtyro.com/issues?state=open">Submit issues</a></li>
                <li><a href="http://github.com/teamtyro/teamtyro.com">Code</a></li>
            </ul>
        </div>
        <div class="large-2 columns">
            <a href="" class="scrollup">Back to top</a>
        </div>
    </div>
</footer>

    <script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script src="/ext/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>
</html>