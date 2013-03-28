<script>
    function validateForm() {
        var x = document.forms["survey"]["email"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos< 1 || dotpos< atpos + 2 || dotpos + 2 > = x.length)
            {
                var x = document.getElementById("myHeader");
                alert("Not a valid email address");
                return false;
            }
    }
</script>
<div class="large-6 columns large-centered">
    <form name="survey" action="" method="post" onsubmit="return validateForm()">
      <fieldset>
        <legend>Player Survey</legend>

        <div class="row">
            <div class="large-6 columns">
                <label>Name</label>
                <input type="text" name="name" maxlength="70" autocomplete="off" autofocus>
            </div>
        </div>

        <div class="row">
            <div class="large-6 columns">
                <label>Email</label>
                <input type="email" name="email" maxlength="50">
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                <label for="customDropdown">Age</label>
                <select id="customDropdown" name="age">
                    <option>Under 11</option>
                    <option>12-17</option>
                    <option>18-24</option>
                    <option>25-34</option>
                    <option>35-44</option>
                    <option>45-54</option>
                    <option>55-64</option>
                    <option>65-74</option>
                    <option>75 years or older</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns submit-button">
                <input class="nice blue radius button" type="submit" name="Submit" value="Submit">
            </div>
        </div>

      </fieldset>
    </form>
</div>

<?php

require_once("session_start.php");

if (isset($_POST['Submit'])) { 
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['age'] = $_POST['age'];

    setcookie('survey_complete', true, 5184000 + time());
    setcookie('survey_name', $_POST['name'], 5184000 + time());
    setcookie('survey_email', $_POST['email'], 5184000 + time());
    setcookie('survey_age', $_POST['age'], 5184000 + time());

    header('Location: '.$_SERVER['REQUEST_URI']);
} 

?> 