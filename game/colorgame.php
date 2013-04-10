<div class="large-7 columns game">
        <script>
          var attributes = {
            code:'org.lwjgl.util.applet.AppletLoader',
            archive:'lwjgl_util_applet.jar',
            codebase:'/game',
            width:600,
            height:600
          };
          var parameters = {
            al_version:1.4,
            al_title:'TeamTyro Game',
            al_main:'MazeGame',
            al_jars:'mazegame_1.4.jar, lwjgl.jar, jinput.jar, lwjgl_util.jar',
            al_windows:'windows_natives.jar',
            al_linux:'linux_natives.jar',
            al_mac:'macosx_natives.jar'
          };
          var version = '1.6' ;
          deployJava.runApplet(attributes, parameters, version);
        </script>
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