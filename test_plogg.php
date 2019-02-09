<?php require_once('Date.php'); ?>
<?php require_once('InterfaceForExercise.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="test_plogg.css">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-dg40NlQ5h8dcgfP8X7gQ0ZT5Xay9rgtJY6itRjTyGzR3zAHzvY/FzcbdKL2lJjgT" crossorigin="anonymous">
    <title>Test of PHP</title>
  </head>
  <body class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Sample</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Hi ! <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">How</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">are</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">you ?</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <header id="header" class="jumbotron">
      <h1 id="title">PHP Exercise</h1>
      <span class="badge badge-pill badge-info">by Tsunehito HIGA</span>
    </header>
    <div id="first" class="row">
      <div id="img-frogs" class="col">
        <img src="img/frogs.jpg" alt="flogs">
      </div>
      <div id="example1" class="col table-responsive-md">
        <span class="badge badge-info">Example 1</span>
        <?php InterfaceForExercise::creatTable('2016-12-19','2016-12-23', 100, 20, 'info'); ?>
      </div>
    </div>
    <div id="second" class="row">
      <div id="example2" class="col order-sm-last table-responsive-md">
        <span class="badge badge-success">Example 2</span>
        <?php InterfaceForExercise::creatTable('2016-12-21','2016-12-27', 100, 100, 'success'); ?>
      </div>
      <div id="img-bamboo" class="col order-lg-last">
        <img src="img/bamboo.jpg" alt="bamboo">
      </div>
    </div>
    <div id="third" class="row">
      <div id="img-tokyo" class="col">
        <img src="img/tokyo.jpg" alt="tokyo">
      </div>
      <div id="example3" class="col table-responsive-md">
        <span class="badge badge-warning">Example 3</span>
        <?php InterfaceForExercise::creatTable('2016-12-19','2016-12-24', 500, 50, 'warning'); ?>
      </div>
    </div>
    <div class="alert alert-dismissible alert-danger">
      <h4 class="alert-heading">Hello!</h4>
      <p class="mb-0">Thank you for contacting me !</p>
    </div>
  </body>
</html>
