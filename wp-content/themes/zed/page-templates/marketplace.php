<?php

/**
 * Template Name: marketplace
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

?>
<!DOCTYPE html>
<html>

<head>
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
  <title>Marketplace | Zed</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #f1f1f1;
  }

  #regForm {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: "Hind Vadodara", sans-serif;
    padding: 40px;
    width: 70%;
    min-width: 300px;
    background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
  }

  h1 {
    text-align: center;
    font-weight: 500;
  }

  input {
    padding: 10px;
    width: 100%;
    font-size: 15px;
    font-family: "Hind Vadodara", sans-serif;
    margin-bottom: 15px;
    padding-left: 20px;
    height: 50px;
    border-radius: 10px;
    border: none;
    background: #fff;
    box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
  }

  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
  }

  button {
    background-color: #3D3D8A;
    color: #ffffff;
    border: none;
    padding: 10px 60px;
    font-size: 17px;
    font-family: "Hind Vadodara", sans-serif;
    cursor: pointer;
    margin-top: 20px;
    border-radius: 10px;
  }

  button:hover {
    opacity: 0.8;
  }

  #prevBtn {
    background-color: #bbbbbb;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }

  .drp {
    padding: 10px;
    width: 100%;
    font-size: 15px;
    font-family: "Hind Vadodara", sans-serif;
    margin-bottom: 15px;
    padding-left: 20px;
    height: 50px;
    border-radius: 10px;
    border: none;
    background: #fff;
    box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
  }

  .drp1 {
    padding: 10px;
    width: 15%;
    font-size: 15px;
    font-family: "Hind Vadodara", sans-serif;
    margin-bottom: 15px;
    margin-right: 12px;
    padding-left: 20px;
    height: 50px;
    border-radius: 10px;
    border: none;
    background: #fff;
    box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
  }

  .ck.ck-editor {
    position: relative;
    border-radius: 10px !important;
    margin: 50px 0px 50px 0px;
  }

  .step.active {
    opacity: 1;
  }

  .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
    border-color: var(--ck-color-base-border);
    height: 200px;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #04AA6D;
  }
</style>

<body>

  <form id="regForm" action="/action_page.php">
    <h1>Tell us about your Campaign</h1>
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
      <div class="col-lg-12 col-md-12 col-12">
        <select name="cars" id="cars" class="phonedropdown drp">
          <option value="volvo">Purpose of raising funds</option>
          <option value="saab">Material Donation</option>
          <option value="mercedes">Fundraiser</option>
          <option value="audi">Marketplace for Charity Products</option>
        </select>
      </div>
      <p>
        <input placeholder="Campaign’s Target (How many lives will get the benefits of the campaign)" oninput="this.className = ''" name="lname"></p>
      <p>
        <input placeholder="Enter Address" oninput="this.className = ''" name="lname"></p>
      <div class="contact-map">
        <iframe style="width: 100%;  height: 300px;border-radius:10px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen></iframe>
      </div>
    </div>
    <div class="tab">

      <div>

        <input type="text" id="name" name="name" placeholder="Product Name">
      </div>
      <div>

        <input type="text" id="name" name="name" placeholder="1">
      </div>
      <div style="display:inline-flex;width: 100%;">
        <select name="cars" id="cars" class="phonedropdown drp1">
          <option value="volvo">INR</option>
          <option value="saab">USD</option>
          <option value="mercedes">EURO</option>
          <option value="audi">POUND</option>
        </select>
        <input type="text" id="name" name="name" placeholder="Product Price
">
      </div>
      <p><input placeholder="Location of the need" oninput="this.className = ''" name="email"></p>

    </div>
    <div class="tab">
      <div class="col-lg-12 col-md-12 col-12">
        <select name="cars" id="cars" class="phonedropdown drp">
          <option value="volvo">Image</option>
          <option value="saab">Video</option>
        </select>
      </div>
      <input type="file" id="myFile" name="filename">
    </div>
    <div class="tab">
      <textarea name="content" id="editor">
        &lt;p&gt;This is some sample content.&lt;/p&gt;
    </textarea>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor'))
          .catch(error => {
            console.error(error);
          });
      </script>
    </div>
    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>

  </form>

  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
  </script>

</body>

</html>