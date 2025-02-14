<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="../images/pic-1.jpg" class="image" alt="">
      <h3 class="name"><?php echo $_SESSION['username']?></h3>
      <p class="role"><?php echo $_SESSION['role']?></p>
      <a  href=" profile " class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a  href="home"><i class="fas fa-home"></i><span>home</span></a>

      <a  href=" category "><i class="fas fa-question"></i><span>Category</span></a>
      <a  href=" tag "><i class="fas fa-question"></i><span>tag</span></a>
      <a  href=" Events "><i class="fas fa-graduation-cap"></i><span>Events</span></a>
      <!-- <a  href=" teachers "><i class="fas fa-chalkboard-user"></i><span>Users</span></a> -->
      <a  href=" organisateur "><i class="fas fa-chalkboard-user"></i><span>users</span></a>

   </nav>

</div>