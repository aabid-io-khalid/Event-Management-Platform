<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.themewinter.com/html/exhibz/blog  by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2024 15:01:31 GMT -->
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
               <h2>Events</h2>
              
            </div>
         </div><!-- Subpage title end -->
      </div><!-- Page Banner end -->

      <section id="main-container" class="main-container">
         <div class="container">
            <div class="row">

               <div class="col-lg-8 col-md-8 col-sm-12 mx-auto">
               <?php foreach ($events as $event): ?>
                        <div class="post">
                           <div class="post-media post-image">
                                 <a href="#">
                                    <img src="<?= !empty($event['image_url']) ? htmlspecialchars($event['image_url']) : 'images/blog/blog1.jpg'; ?>" 
                                          class="img-fluid" 
                                          alt="<?= htmlspecialchars($event['titre']) ?>">
                                 </a>
                           </div>
                           <div class="post-body">
                                 <div class="post-meta">
                                    <span class="post-author">
                                       <a href=""> <?= htmlspecialchars($event['auteur']) ?></a>
                                    </span>

                                    <div class="post-meta-date">
                                       <?php 
                                             $eventDate = date_create($event['date']);
                                       ?>
                                       <span class="day"><?= date_format($eventDate, 'd'); ?></span>
                                       <span class="month"><?= date_format($eventDate, 'F'); ?></span>
                                       <span class="year"><?= date_format($eventDate, 'Y'); ?></span>
                                    </div>
                                 </div>

                                 <div class="entry-header">
                                    <h2 class="entry-title">
                                       <a href="#"><?= htmlspecialchars($event['titre']) ?></a>
                                    </h2>
                                 </div><!-- header end -->

                                 <div class="entry-content">
                                    <p><?= htmlspecialchars(substr($event['description'], 0, 150)) . '...'; ?></p>
                                 </div>

                                 <div class="post-footer mb-5">
                                    <a href="news-single?id=<?= $event['id'] ?>" class="btn-link">Read More <i class="icon icon-arrow-right"></i></a>
                                 </div>
                           </div><!-- post-body end -->
                        </div>
                     <?php endforeach; ?>
                  <div class="pages mt-60">
                     <nav aria-label="Page navigation ">
                        <ul class="pagination mx-auto">
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                        </ul>
                     </nav>
                  </div>

               </div><!-- Content Col end -->

            </div><!-- Main row end -->

         </div><!-- Container end -->
		</section><!-- Main container end -->
		
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
   </div>
   <!-- Body inner end -->
</body>


<!-- Mirrored from demo.themewinter.com/html/exhibz/blog  by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2024 15:01:31 GMT -->
</html>