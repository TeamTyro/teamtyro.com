<?php

<div class="large-6 columns large-centered">
    <form>
      <fieldset>
        <legend>Player Survey</legend>

        <div class="row">
          <div class="large-12 columns">
            <label>Name</label>
            <input type="text" placeholder="">
          </div>
        </div>

        <div class="row">
          <div class="large-4 columns">
            <label>Ethinicity</label>
            <label for="radio1">
                <input name="radio1" type="radio" id="radio1"><span class="custom radio"></span> Asian
            </label>
            <label for="radio1">
                <input name="radio1" type="radio" id="radio1"><span class="custom radio"></span> African American
            </label>
            <label for="radio1">
                <input name="radio1" type="radio" id="radio1"><span class="custom radio"></span> Caucasion
            </label>
          </div>
          <div class="large-4 columns">
            <label>Input Label</label>
            <input type="text" placeholder="large-4.columns">
          </div>
          <div class="large-4 columns">
            <div class="row collapse">
              <label>Input Label</label>
              <div class="small-9 columns">
                <input type="text" placeholder="small-9.columns">
              </div>
              <div class="small-3 columns">
                <span class="postfix">.com</span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="large-12 columns">
            <label>Textarea Label</label>
            <textarea placeholder="small-12.columns"></textarea>
          </div>
        </div>

      </fieldset>
    </form>
</div>

?>