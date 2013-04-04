<script>
    function validateForm() {
        $("small").remove();
        var isFormValid = true;
        $(".required input").each(function() {
            if ($.trim($(this).val()).length == 0) {
                $(this).parent().addClass("error");
                $(this).parent().append('<small>Invalid entry</small>');
                isFormValid = false;
            } else {
                $(this).parent().removeClass("error");
                $(this).parent().remove("small");
            }
        });
        $(".required select").each(function() {
            if(!$(this).val()) {
                $(this).parent().addClass("error");
                $(this).parent().append('<small>Invalid entry</small>');
                isFormValid = false;
            } else {
                $(this).parent().removeClass("error");
                $(this).parent().remove("small");
            }
        });
        return isFormValid;
    }
</script>
<div class="large-6 columns">
    <form class="survey" name="survey" action="" method="post" onsubmit="return validateForm()">
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

        <div class="row required">
            <div class="large-4 columns">
                <label for="customDropdown">Gender<span>*</span></label>
                <select id="customDropdown" name="gender" required>
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
        </div>

        <div class="row required">
            <div class="large-4 columns">
                <label for="customDropdown">Ethnicity<span>*</span></label>
                <select id="customDropdown" name="ethnicity" required>
                    <option></option>
                    <option>American Indian or Alaska Native</option>
                    <option>Asian</option>
                    <option>Black or African American</option>
                    <option>Hispanic or Latino</option>
                    <option>Native Hawaiian or Pacific Islander</option>
                    <option>White</option>
                    <option>Other</option>
                    <option>Prefer not to say</option>
                </select>
            </div>
        </div>

        <div class="row required">
            <div class="large-4 columns">
                <label for="customDropdown">Age<span>*</span></label>
                <select id="customDropdown" name="age" required>
                    <option></option>
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
            <div class="large-4 columns text-right">
                <p>* Required fields</p>
            </div>
        </div>

      </fieldset>
    </form>
</div>
<div class="large-6 columns">
    <h3>Player Survey</h3>
    <p>To help us get a better understanding of the data we collect from people playing the game, we have a simple survey to fill out once.  All information collected from the survey will 
        remain private and will not be distributed to any third parties.</p>
    <h4 class="subheader">Thank you for your time, we love you!</h4>
</div>

<?php

if (isset($_POST['Submit'])) { 

    setcookie('survey_complete', true, 5184000 + time());
    setcookie('survey_name', $_POST['name'], 5184000 + time());
    setcookie('survey_email', $_POST['email'], 5184000 + time());
    setcookie('survey_gender', $_POST['gender'], 5184000 + time());
    setcookie('survey_age', $_POST['age'], 5184000 + time());
    setcookie('survey_ethnicity', $_POST['ethnicity'], 5184000 + time());

    header('Location: '.$_SERVER['REQUEST_URI']);
} 

?> 