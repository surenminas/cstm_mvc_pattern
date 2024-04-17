

<?php //session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
      use \fw\core\base\View;
      View::getMeta();
    ?>
    <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="/cstm_mvc_pattern/css/default.css" rel="stylesheet">
  </head>
  <body>

  <div class="container">
    <?php if(!empty($menu)): ?>
    <nav class="navbar navbar-expand-md bg-light">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
                <?php if (!empty($menu)): ?>
                  <?php foreach($menu as $cat): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $cat['name']; ?>"><?php echo $cat['name']; ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link" href="user/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user/signup">Signup</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user/logout">Logout</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php endif; ?>
  </div>
  <h1>Layout default</h1>
                  
  <div>
      <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
          <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>  
      <?php endif; ?>
  </div>

  <div>
      <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
          <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>  
      <?php endif; ?>
  </div>

  
  <!-- Content page -->
  <?php echo $content; ?>
  
  <!-- End content page -->


  <!-- <script src="bootstrap/js/bootstrap.min.js" ></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <?php
    foreach($scripts as $script) {
      echo $script;
    }
  ?>
</body>
</html>