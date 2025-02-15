
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.themewinter.com/html/exhibz/speakers-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2024 15:01:31 GMT -->
<head>
   <!-- Basic Page Needs ================================================== -->
   <meta charset="utf-8">
   <!-- Mobile Specific Metas ================================================== -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <!-- Site Title -->
   <title>Exhibit - Conference &amp; Event HTML Template</title>
   <!-- CSS
         ================================================== -->
   <!-- Bootstrap -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- FontAwesome -->
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <!-- Animation -->
   <link rel="stylesheet" href="css/animate.css">
   <!-- magnific -->
   <link rel="stylesheet" href="css/magnific-popup.css">
   <!-- carousel -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <!-- isotop -->
   <link rel="stylesheet" href="css/isotop.css">
   <!-- ico fonts -->
   <link rel="stylesheet" href="css/xsIcon.css">
   <!-- Template styles-->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive styles-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Google Sign-In Script -->
   <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
      
        .register-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 450px;
        }
        .register-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2em;
        }
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }
        .input-row {
            display: flex;
            gap: 20px;
        }
        .input-row .input-group {
            flex: 1;
        }
        .input-group input {
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            background: #f5f5f5;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .input-group input:focus {
            background: #fff;
            box-shadow: 0 0 0 2px #4a00e0;
        }
        .input-group label {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .input-group input:focus + label,
        .input-group input:valid + label {
            top: -10px;
            left: 10px;
            font-size: 14px;
            color: #4a00e0;
            background: white;
            padding: 0 5px;
        }
        .terms {
            margin: 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .terms input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #4a00e0;
        }
        .terms label {
            color: #666;
            font-size: 14px;
        }
        .terms a {
            color: #4a00e0;
            text-decoration: none;
        }
        .terms a:hover {
            text-decoration: underline;
        }
        .btn-register {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #8e2de2, #4a00e0);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background: linear-gradient(45deg, #7728bd, #3d00b3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 0, 224, 0.4);
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        .login-link a {
            color: #4a00e0;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .password-requirements {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            margin-left: 15px;
        }
    </style>
</head>
<body>
   <div class="body-inner">
      <!-- Header start -->
      <?php require_once "header.php" ?>
      <!--/ Header end -->
      <div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
         <!-- Subpage title start -->
         <div class="page-banner-title">
            <div class="text-center">
               <h2>REGISTER ..</h2>
               <!-- <ol class="breadcrumb">
                  <li>
                     <a href="#">Exibit /</a>
                  </li>
                  <li>
                     Speakers II
                  </li>
               </ol> -->
            </div>
         </div><!-- Subpage title end -->
      </div><!-- Page Banner end -->
<!-- regester login form -->
<div class="register-container" style="margin: auto; margin-top: 100px; margin-bottom: 100px;">
  <h2>Create Account</h2>
  <form action="register" method="POST"> <!-- Change action to the registration endpoint -->
    <div class="input-row">
        <div class="input-group">
            <input type="text" name="username" required>
            <label>Full Name</label>
        </div>
    </div>
    <div class="input-group">
        <input type="email" name="email" required>
        <label>Email Address</label>
    </div>
    <div class="input-group">
        <input type="tel" name="phone" required> <!-- Add name attribute for phone -->
        <label>Phone Number</label>
    </div>
    <div class="input-group">
        <input type="password" name="password" required>
        <label>Password</label>
    </div>
    <div class="input-group">
        <input type="password" name="confirm_password" required> <!-- Add name attribute for confirm password -->
        <label>Confirm Password</label>
    </div>
    <div class="terms">
        <input type="checkbox" id="terms" required>
        <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
    </div>
    <button type="submit" class="btn-register">Create Account</button>
    <div class="login-link">
        Already have an account? <a href="login">Login</a>
    </div>
</form>

    <!-- Google Login Button -->
    <div id="g_id_onload"
         data-client_id="563946768657-opa9qus8bidk013cdl42cm7ue33cndp8.apps.googleusercontent.com"
         data-context="signin"
         data-ux_mode="popup"
         data-callback="handleCredentialResponse">
    </div>
    <div class="g_id_signin" data-type="standard"></div>
</div>

<!-- JavaScript to handle Google OAuth -->
<script>
    function handleCredentialResponse(response) {
        console.log("Encoded JWT ID token: " + response.credential);

        // Send the token to your backend for verification and user authentication
        fetch('/auth/google', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ token: response.credential })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to the user dashboard or profile
                window.location.href = '/';
            } else {
                console.log('Error with Google authentication');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
</div>
<!-- end regester form -->
      <!-- ts footer area start-->
  <?php require_once "footer.php" ?>
      <!-- ts footer area end-->
    
      <!-- Javascript Files
            ================================================== -->
      <!-- initialize jQuery Library -->
      <script src="js/jquery.js"></script>
      <script src="js/popper.min.js"></script>
      <!-- Bootstrap jQuery -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Counter -->
      <script src="js/jquery.appear.min.js"></script>
      <!-- Countdown -->
      <script src="js/jquery.jCounter.js"></script>
      <!-- magnific-popup -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- carousel -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Waypoints -->
      <script src="js/wow.min.js"></script>
      <!-- isotop -->
      <script src="js/isotope.pkgd.min.js"></script>
      <!-- Template custom -->
      <script src="js/main.js"></script>
   </div>
   <!-- Body inner end -->
</body>
<!-- Mirrored from demo.themewinter.com/html/exhibz/speakers-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2024 15:01:31 GMT -->
</html>