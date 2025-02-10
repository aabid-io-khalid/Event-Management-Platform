<header id="header" class="header header-transparent">
        <div class="container">
           <nav class="navbar navbar-expand-lg navbar-light">
              <!-- logo-->
              <a class="navbar-brand" href="home">
                 <img src="images/logos/logo.png" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                 aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                 <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item active">
                       <a href="home" class="" data-toggle="dropdown">Home</a>
                   
                    </li>
                    <li class="dropdown nav-item">
                       <a href="about" class="" data-toggle="dropdown">About </i></a>
                       
                    </li>
                    
                    <li class="nav-item">
                       <a href="blog ">Events</a>
                    </li>
                    <li class="nav-item">
                       <a href="contact ">Contact</a>
                    </li>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                           <a href="login">Login</a>
                        </li>
                        <li class="nav-item">
                           <a href="register">Register</a>
                        </li>
                     <?php else :?>
                        <li class="nav-item">
                           <a href="login">Logout</a>
                        </li>
                        
                        <li class="header-ticket nav-item">
                        <a href="organisateur/home?action=changeRoleToOrganisateur" class="ticket-btn btn">To Organisateur</a>
                        </li>
                        <?php endif ;?>
                 </ul>
              </div>
           </nav>
        </div><!-- container end-->
     </header>