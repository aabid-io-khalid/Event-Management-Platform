<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile</title>

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

<section class="user-profile">

   <h1 class="heading">your profile</h1>

   <div class="info">

      <div class="user">
         <img src="../images/pic-1.jpg" alt="">
         <h3><?php echo $_SESSION['username']?></h3>
         <p><?php echo $_SESSION['role']?></p>
         <a href="update" class="inline-btn">update profile</a>
      </div>
   
     
   </div>

</section>


<!-- start footer -->
 <div>
<?php require_once "footer.php" ?>
<!-- end footer -->
</div>
<!-- custom js file link  -->
<script src="../js/script.js"></script>

   
</body>
</html>