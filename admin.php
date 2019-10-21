<?php
require_once ("config.php");

if(isset($_GET['save'])) {
  $save = $_GET['save'];
  if($save == 'event') {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $title = $_POST['title'];
    $name = $_POST['name'];


  $statement = $pdo->prepare("INSERT INTO event (	date, time, title, name) VALUES (:date, :time, :title, :name)");
  $result = $statement->execute(array('date' => $date,'time' => $time,'title' => $title,'name' => $name	));
  }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-light">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Event Editor</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Eventübersicht</a>
    </li>

  </ul>

</nav>


    <div class="container">

        <div class="row justify-content-center">
      <div class="col-8">
          <h1>Event eintragen</h1>
        <form action="admin.php?save=event" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Datum</label>
            <input type="date" class="form-control" id="date" name="date"  >
          </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Zeit</label>
    <input type="time" class="form-control" id="time" name="time"  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Titel</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Titel">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
  </div>

  <button type="submit" class="btn btn-primary">Senden</button>
</form>
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
