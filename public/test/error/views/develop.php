<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/default.css" rel="stylesheet">
  </head>
  <body>
  <h2>Error</h2>
  <p><b>Code error: </b><?php echo $errno; ?></p>
  <p><b>Text error: </b><?php echo $errstr; ?></p>
  <p><b>File: </b><?php echo $errfile; ?></p>
  <p><b>Line: </b><?php echo $errline; ?></p>


  <!-- <script src="bootstrap/js/bootstrap.min.js" ></script> -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>