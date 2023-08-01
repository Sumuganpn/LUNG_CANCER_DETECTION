<?php include 'server.php';?>
<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container padding">
        <form id="contact-form" method="post" action="index.php" role="form">

            <div class="messages"></div>

            <div class="controls">

                <div class="row padding">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead text-dang" style="margin: 12px; color:#73AD21;font:bolder;">
                                Please fill the form below.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row padding">
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="form_name">Firstname</label>
                            <input id="form_name" name="name" type="text"  class="form-control" placeholder="Please enter your firstname"
				
                                required="required" data-error="Firstname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Lastname</label>
                            <input id="form_lastname" name="secondname" type="text"  class="form-control" 
					
				placeholder="Please enter your lastname"
                                required="required" data-error="Lastname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row padding">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_email">Email</label>
                            <input id="form_email" type="email" name="email" class="form-control" 
			placeholder="Please enter your email"
                                required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                </div>
                <div class="row padding">
                    <div class="col-md-12">

                        <form>
                            <p>Gender</p>
                            <input type="radio" name="gender" value="Male">Male
                            <input type="radio" name="gender" value="Female">Female
			    <input type="radio" name="gender" value="Prefer not to say">Prefer not to say
                        </form>
                    </div>
                </div>
                <br>
                <div class="row padding">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <label for="form_name">Enter description : </label>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row padding">
                    <div class="col-md-12" >
                        <div class="form-group">
                            <input id="textbox" type="text" name="description" class="form-control" placeholder="Please enter the Description"
                                required="required" data-error="Description is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row padding">
                    <div class="col-md-6">
                        <input type="submit" class="btn  btn-danger btn-send" onclick="myFunction()" value="Clear Info">
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-success btn-send" id="send" value="Send Info" name="submit">
                    </div>
                    
                </div>
            </div>

             <div class="containers padding text-center">
                        <div class="col-md-12">
                            <a href="fetch.php" class="btn btn-info btn-send">View Data</a>
                        </div>
                </div>
        

        </form>
    </div>
   
    </div>
<script>
function myFunction() {
  document.getElementById("contact-form").reset();
}
</script>

</body>

</html> -->

<style>
                * { box-sizing: border-box; }

            html,
            body {
                font-family: 'Roboto', sans-serif;
                height: 100%;
            }

            body {
                background: linear-gradient(rgba(26, 26, 26, 0.2), rgba(26, 26, 26, 0.4)), url('index_bg_2.png') no-repeat;
                background-position: center center;
                background-size: cover;
                font-size: 16px;
                margin: 0;
            }

            a {
                color: #939398;
            }

            p {
                margin: 0;
            }

            .mb-0 {
                margin-bottom: 0 !important;
            }

            .mb-1 {
                margin-bottom: 0.25rem !important;
            }

            .mb-2 {
                margin-bottom: 2rem !important;
            }

            .text-left {
                text-align: left;
            }

            .text-center {
                text-align: center;
            }

            .w-100 {
                width: 100%;
            }

            /* Check Icon */
            span.check-icon {
                border: solid #48a64c;
                border-top: 0;
                border-left: 0;
                display: none;
                height: 15px;
                width: 7.5px;
                transform: rotate(45deg);
            }


            span.check-icon {
                position: absolute;
                bottom: 11px;
                right: 17px;
            }

            input.valid ~ span.check-icon {
                display: inline-block;
            }

            /* Menu */
            a.menu-toggle {
                cursor: pointer;
                position: absolute;
                top: 66px;
                right: 45px;
            }

            span.bar {
                background-color: #767676;
                display: block;
                height: 2px;
                margin-bottom: 2px;
                width: 15px;
            }

            span.bar:last-child {
                margin-bottom: 0;
            }


            .wrapper {
                display: flex;
                height: 100%;
                padding: 45px 25px;
                position: relative;
                margin: 0 auto;
                max-width: 1200px;

            }

            /* Quote Wrapper */
            .quote-wrapper {
                background: linear-gradient(rgba(26, 26, 26, 0.2), rgba(26, 26, 26, 0.2)), url('bg_image.png') no-repeat center center;
                background-size: cover;
                border-radius: 10px 0 0 10px;
                flex-basis: 50%;
                height: 100%;
            }

            .quote-wrapper blockquote {
                display: flex;
                flex-direction: column;
                justify-content: center;
                height: 100%;
            }

            .quote-wrapper blockquote p {
                color: #fff;
                font-size: 1.9rem;
                font-weight: 400;
                text-align: center;
            }

            .quote-wrapper blockquote p.author {
                font-size: 1rem;
                font-weight: 100;
                margin-top: 20px;
                text-align: right;
                width: 80%;
            }

            h1.form-title {
                color: #222;
                font-size: 1.9rem;
                margin-bottom: 50px;
            }

            /* Form */

            .form-wrapper {
                background: #fff;
                border-radius: 0 10px 10px 0;
                display: flex;
                flex-direction: column;
                flex-basis: 50%;
                height: 100%;
                justify-content: center;
                text-align: center;
            }

            .form-wrapper form .form-group {
                margin: 0 auto;
                margin-bottom: 45px;
                position: relative;
                width: 300px;
            }

            .form-group input {
                background-color: #efeff4;
                border: none;
                border-radius: 5px;
                font-size: 1rem;
                padding: 7px 0 5px 7px;
            }

            .form-group input:focus,
            .form-group input:active {
                outline: none;
            }

            .form-group label.terms {
                color: #939398;
                font-size: 0.8rem;
            }

            .form-group input[type="submit"] {
                background-color: #007AFF;
                border: none;
                color: #fff;
                transition: all 0.2s;
            }

            .form-group input[type="submit"]:hover {
                background-color: #0047ab;
                cursor: pointer;
            }

            .form-group label:not(.terms) {
                color: #939398;
                font-size: 0.8rem;
                position: absolute;
                top: -25px;
            }


            .form-wrapper small {
                color: #939398;
                margin-top: 4px;
            }


            /* Media Queries */

            @media screen and (max-width: 687px) {
                .wrapper {
                    max-width: 500px;
                }

                /* hide quote-wrapper */
                .quote-wrapper {
                    display: none;
                }

                /* Form Wrapper */
                .form-wrapper {
                    background: rgba(255, 255, 255, 0.7);
                    border-radius: 10px;
                    flex-basis: 500px;
                    margin: 0 auto;
                }

                .form-wrapper h1.form-title {
                    margin-top: 0;
                }

                .form-group input {
                    background-color: #fff;
                }
            }


            @media screen and (max-width: 372px) {
                a.menu-toggle {
                    right: 25px;
                }

                .wrapper {
                    padding-left: 0;
                    padding-right: 0;
                }

                .form-wrapper {
                    border-radius: 0;
                    flex-basis: 1;
                }
            }


            @media screen and (max-height: 500px) {
                a.menu-toggle {
                    top: 15px;
                }

                .wrapper {
                    padding-bottom: 0;
                    padding-top: 0;
                }

                h1.form-title {
                    margin-bottom: 30px;
                    margin-top: 7px;
                }
            }

</style>    

  <div class="wrapper">
  <a href="#" class="menu-toggle">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
  </a>
  
  <div class="quote-wrapper">
    <blockquote>
      <p  style= " margin-top: 450px" >
      'Cancer is a part of our life,  <br>
       but it’s not our whole life.'
      </p>
      <p class="author">- Nick Prochak</p>
    </blockquote>
  </div> <!-- end quote-wrapper -->

  <div class="form-wrapper">
    <h1 class="form-title">Enter Your Details</h1>

    <form id="contact-form" method="post" role="form">

      <div class="form-group">
        <label for="username">Patient_ID</label>
        <!-- <input type="text" id="form_name" name="name" class="w-100" autofocus value="chino" title="Must be longer than 4 characters"> -->
        <input id="form_name" name="id" type="text"  class="w-100" placeholder="Please enter Patient_ID">

        <span class="check-icon"></span>
      </div>

      <div class="form-group">
        <label for="username">FirstName</label>
        <!-- <input type="text" id="form_name" name="name" class="w-100" autofocus value="chino" title="Must be longer than 4 characters"> -->
        <input id="form_name" name="name" type="text"  class="w-100" placeholder="Please enter your firstname">

        <span class="check-icon"></span>
      </div>

      <div class="form-group">
        <label for="email">LastName</label>
        <!-- <input type="text" name="email" id="email" class="w-100" value="ram"> -->
        <input id="form_lastname" name="secondname" type="text"  class="w-100" placeholder="Please enter your Lastname" >

        <span class="check-icon"></span>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <!-- <input type="email" name="email" id="email" class="w-100" value="info@chino.com"> -->
        <input id="form_email" type="email" name="email" class="w-100" placeholder="Please enter your email" required="required" data-error="Valid email is required.">
        <span class="check-icon"></span>
      </div>

      <div class="form-group mb-1">
        <label for="password">Gender</label>
        <!-- <input type="text" name="password" id="password" class="w-100" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="WeloveChino2"> -->
        <input type="text" name="gender" placeholder="Enter Your Gender" class="w-100">

        <span class="check-icon"></span>
      </div>
      
      <br>


      <div class="form-group mb-0">
        <!-- <input type="submit" class="w-100" id="send" value="Send Info"> -->
        <input type="submit" class="w-100"   id="send" value="Register" name="submit">
      </div>
    </form>
    <div class="containers padding text-center">
        <div class="col-md-12">
            <a href="fetch.php" class="btn btn-info btn-send">View Data</a>
        </div>
    </div>  

  </div> <!-- end form-wrapper -->
</div> <!-- end wrapper -->

