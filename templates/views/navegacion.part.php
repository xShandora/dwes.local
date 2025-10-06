<!-- Navigation Bar -->
<?php 
  require_once __DIR__ . '/../../src/Utils/Utils.class.php'
?> 

   <nav class="navbar navbar-fixed-top navbar-default">
     <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a  class="navbar-brand page-scroll" href="#page-top">
              <span>[PHOTO]</span>
            </a>
         </div>
         <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">
              <?php 
                if (Utils::esOpcionMenuActiva('/index.php')==true || Utils::esOpcionMenuActiva('/')==true) 
                  echo '<li class="active lien">';
                else 
                  echo '<li class="lien">';
              ?> 
              <a href="index.php">Home</a></li>

              <?php 
                if (Utils::esOpcionMenuActiva('/about.php')==true) 
                  echo '<li class="active lien">';
                else 
                  echo '<li class="lien">';
              ?>
              <a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a></li>


              <?php 
                if (Utils::esOpcionMenuActiva('/blog.php')==true) 
                  echo '<li class="active lien">';
                else 
                  echo '<li class="lien">';
              ?>
              <a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>


              <?php 
                if (Utils::esOpcionMenuActiva('/contact.php')==true) 
                  echo '<li class="active lien">';
                else 
                  echo '<li class="lien">';
              ?> 
              <a href="contact.php"><i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
            </ul>
         </div>
     </div>
   </nav>
<!-- End of Navigation Bar -->