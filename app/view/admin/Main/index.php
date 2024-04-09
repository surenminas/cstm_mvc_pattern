<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
      use fw\core\base\View;
      View::getMeta();
    ?>
    <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="mvc_2/css/default.css" rel="stylesheet">
  </head>
  <body>
  <div class="container">
    <?php if(!empty($category)): ?>
    <nav class="navbar navbar-expand-md bg-light">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="page/contact">Contact</a>
              </li>
                <?php if (!empty($category)): ?>
                  <?php foreach($category as $cat): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $cat['name']; ?>"><?php echo $cat['name']; ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <?php endif; ?>
  </div>
  <h1>ADMIN</h1>
<code><?php echo __FILE__; ?></code>
  <!-- Content page -->

  
  <!-- End content page -->


  <!-- <script src="mvc_2/bootstrap/js/bootstrap.min.js" ></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>