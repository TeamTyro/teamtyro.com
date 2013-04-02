<div class="large-7 columns game">
        <applet class="large-centered"code="org.lwjgl.util.applet.AppletLoader" archive="lwjgl_util_applet.jar" codebase="/game" width="600" height="600">

            <?php
            if(isset($_COOKIE['survey_name'])){
                echo '<param name="name" value="' , $name , '">';
                if(isset($_COOKIE['survey_email'])){
                    echo '<param name="email" value="' , $email , '">';
                }
                echo '<param name="gender" value="' , $gender , '">';
                echo '<param name="ethnicity" value="' , $ethnicity , '">';
                echo '<param name="age" value="' , $age , '">';
            }
            ?>

            <!-- The following tags are mandatory -->

            <!-- Name of Applet, will be used as name of directory it is saved in, and will uniquely identify it in cache -->
            <param name="al_title" value="testgame">

            <!-- The main class of the applet -->
            <param name="al_main" value="MazeGame">

            <!-- The jars to be included in the Java Classpath -->
            <param name="al_jars" value="color-maze-game.jar, lwjgl.jar, jinput.jar, lwjgl_util.jar" codebase="/game">

            <!-- Specifies the natives for each platform -->
            <param name="al_windows" value="windows_natives.jar">
            <param name="al_linux" value="linux_natives.jar">
            <param name="al_mac" value="macosx_natives.jar">

        </applet>
        <div class="text-center">
            <p>This game requires <a href="http://www.java.com/en/download/index.jsp">Java</a> to play. <br/>
            <em>Not available on mobile devices, mouse and keyboard are required to play.</em></p>
        </div>
    </div>
    <div class="large-5 columns">
        <h3>About the game</h3>
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