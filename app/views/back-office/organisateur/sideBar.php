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
      <a  href=" home "><i class="fas fa-home"></i><span>home</span></a>


      <a  href=" myEvents "><i class="fas fa-graduation-cap"></i><span>My Events</span></a>
      <!-- <a  href="ticketDetailles"><i class="fas fa-chalkboard-user"></i><span> Tecket</span></a> -->
      <a  href="participent "><i class="fas fa-chalkboard-user"></i><span>Participant</span></a>

   </nav>

</div>