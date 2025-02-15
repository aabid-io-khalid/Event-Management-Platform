<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.themewinter.com/html/exhibz/pricing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2024 15:00:45 GMT -->
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

   <script src="https://js.stripe.com/v3/"></script>
   <!--  jsPDF Library -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

</head>

<body>
   <div class="body-inner">
      <!-- Header start -->
      <?php require_once 'header.php' ?>
      <!--/ Header end -->

      <div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
         <!-- Subpage title start -->
         <div class="page-banner-title">
            <div class="text-center">
               <h2>Pricing</h2>
               
            </div>
         </div><!-- Subpage title end -->
      </div><!-- Page Banner end -->



      <section class="ts-pricing gradient" style="background-image: url(images/pricing/pricing_img.jpg)">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <h2 class="section-title white">
                     <span>Pricing Plans</span>
                     Get your Ticket
                  </h2>
               </div><!-- section title end-->
            </div><!-- col end-->
            <!-- row end-->
            <div class="row justify-content-center text-center">
             
               <div class="col-lg-4">
                  <div class="pricing-item">
                     <img class="pricing-dot " src="images/pricing/dot.png" alt="">
                     <div class="ts-pricing-box">
                        <span class="big-dot"></span>
                        <div class="ts-pricing-header">
                           <h2 class="ts-pricing-name">Regular</h2>
                           <h3 class="ts-pricing-price">
                              <?php echo $event["prix"]?> <span class="currency">$</span>
                           </h3>
                        </div>
                        <div class="ts-pricing-progress">
                           <p class="amount-progres-text">Available tickets for this price</p>
                           <div class="ts-progress">
                              <div class="ts-progress-inner" style="width: 75%"></div>
                           </div>
                           <p class="ts-pricing-value">50/<?php echo $event["capacite"]?></p>
                        </div>
                        <div class="promotional-code">
                           <p class="promo-code-text">Enter Promotional Code</p>
                           <!-- Button to open the modal -->
<button id="buy-ticket-btn" class="btn pricing-btn">Buy Ticket</button>
<!-- PDF Download Button -->
<div class="general-btn text-center">
    <button id="download-pdf-btn" class="btn">Download PDF</button>
</div>
<script>
   document.getElementById('download-pdf-btn').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    doc.setFont('helvetica', 'normal');
    doc.setFontSize(12);
    
    doc.text("Pricing Plans", 10, 10);
    doc.text("Regular: 399$", 10, 20);
    doc.text("Available Tickets: 350/500", 10, 30);
    doc.text("All prices exclude 25% VAT", 10, 40);

    // Add additional content as needed, such as details, images, etc.

    // Save the generated PDF
    doc.save('pricing-details.pdf');
});
</script>

<!-- Modal -->
<div id="stripe-modal">
    <div class="modal-content">
        <span id="close-modal-btn">&times;</span> <!-- Close button -->
        <h2>Enter Payment Details</h2>
        <form id="payment-form">
            <div id="card-element"></div> <!-- Stripe input field -->
            <button type="submit">Pay Now</button>
        </form>
    </div>
</div>


<style>
/* Fullscreen Modal */
#stripe-modal {
    display: none; /* Hidden by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6); /* Dark overlay */
    justify-content: center;
    align-items: center;
}

/* Modal Content */
.modal-content {
    background: wheat;
    padding: 20px;
    width: 90%;
    max-width: 400px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
    position: relative;
}

/* Close Button */
#close-modal-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    cursor: pointer;
    font-size: 20px;
}

/* Stripe Input Styling */
#card-element {
    background: #f8f8f8;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 100%;
}
</style>

                           <p class="vate-text">All prices exclude 25% VAT</p>
                        </div>
                     </div><!-- ts pricing box-->
                     <img class="pricing-dot1 " src="images/pricing/dot.png" alt="">
                  </div>
               </div><!-- col end-->
               <!-- col end-->
            </div>
         </div><!-- container end-->
         <div class="speaker-shap">
            <img class="shap2" src="images/shap/pricing_memphis1.png" alt="">
         </div>
      </section>

      <!-- ts footer area start-->
      <?php require_once 'footer.php' ?>
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
      <!-- front-officejs -->
      <script src="js/forntOffice.js"></script>
   </div>
   <!-- Body inner end -->

   <script>
var stripe = Stripe('pk_test_51QrJsC05jdlpBFaMqTlsSQ7otN9X2fQMwsq70bxH29lkfEJVNY1YCbeMuni6Rr6SumfLX6pXN69jKEmYLAFAN4Pu003sreh0ij');
var elements = stripe.elements();
var card = elements.create('card');
card.mount('#card-element');

// Open modal
document.getElementById('buy-ticket-btn').addEventListener('click', function () {
    document.getElementById('stripe-modal').style.display = 'flex';
});

// Close modal when clicking "X"
document.getElementById('close-modal-btn').addEventListener('click', function () {
    document.getElementById('stripe-modal').style.display = 'none';
});

// Close modal when clicking outside the box
document.getElementById('stripe-modal').addEventListener('click', function (event) {
    if (event.target === this) { 
        this.style.display = 'none';
    }
});

// Handle Payment Submission
document.getElementById('payment-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    const { token, error } = await stripe.createToken(card);

    if (error) {
        alert(' Payment Error: ' + error.message);
    } else {
        fetch('/handle-payment', {
            method: 'POST',
            body: JSON.stringify({ token: token.id }),
            headers: { 'Content-Type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(' Payment Successful!');
                document.getElementById('stripe-modal').style.display = 'none';
            } else {
                alert(' Payment Failed: ' + data.error);
            }
        })
        .catch(() => alert(' Error processing payment'));
    }
});

   </script>
</body>



<!-- Mirrored from demo.themewinter.com/html/exhibz/pricing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2024 15:00:59 GMT -->
</html>