<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>courses</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href=" ../css/style2.css">

</head>
<body>

  <!-- start header  -->
  <?php require_once "header.php" ?>
  <!-- end header  -->

<!-- side bar start  -->
 <?php require_once "sideBar.php" ?>
<!-- side bar end  -->

<section class="courses">

   <h1 class="heading"> Events</h1>

   <div class="box-container ">
   <?php
        foreach ($events as $event): ?>
      <div class="box" style="min-height: 500px;">
           <div class="tutor">
              <img src="<?php echo htmlspecialchars($event['image_url']); ?>" alt="">
              <div class="info">
                 <h3><?php echo htmlspecialchars($event['titre']); ?></h3>
                 <span><?php echo htmlspecialchars($event['date']); ?></span>
              </div>
           </div>
           <div class="thumb">
              <img src="<?php echo htmlspecialchars($event['image_url']); ?>" alt="">
           </div>
           <h3 class="title"><?php echo htmlspecialchars($event['description']); ?></h3>
           <p><strong>Location:</strong> <?php echo htmlspecialchars($event['lieu']); ?></p>
           <p><strong>Price:</strong> €<?php echo htmlspecialchars($event['prix']); ?></p>
           <p><strong>Capacity:</strong> <?php echo htmlspecialchars($event['capacite']); ?> attendees</p>
           <p><strong>Status:</strong> <?php echo htmlspecialchars($event['statut']); ?></p>
           <p><strong>Category:</strong> <?php echo htmlspecialchars($event['categorie_nom']); ?></p>
           <p><strong>Tags:</strong> <?php echo htmlspecialchars($event['tags']); ?></p>
           <?php
           if($event['sponsors']){
           echo "<p><strong>Sponsors:</strong> ". $event['sponsors']." </p>";
           }?>
        </div>
      <?php endforeach; ?>

      
   </div>

</section>













<!-- start footer -->
<?php require_once "footer.php" ?>
<!-- end footer -->

<!-- custom js file link  -->
<script src="../js/script.js"></script>

   
</body>
</html>