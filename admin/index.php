<?php
require_once ("../config.php");

if(isset($_GET['save'])) {
  $save = $_GET['save'];
  if($save == 'event') {
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $title = $_POST['title'];
    $name = $_POST['name'];


  $statement = $pdo->prepare("INSERT INTO event (	date, start_time, end_time, title, name) VALUES (:date, :start_time, :end_time, :title, :name)");
  $result = $statement->execute(array('date' => $date,'start_time' => $start_time,'end_time' => $end_time ,'title' => $title,'name' => $name	));
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
    <style>
    html,
  body {
    height: 100%;
    background-color:#ffcc80 ;
  }

  #page-content {
    flex: 1 0 auto;
  }

  #sticky-footer {
    flex-shrink: none;
  }

  .button-send {
    margin-top:5px;

  background-color: #90caf9 !important;
  color: #ef5350 !important;
  font-size: 20px !important;
   border: 2px solid #ef5350 ;
   border-radius: 0px;
}

.label {

  color:#ef5350;
}
</style>
    <title>Monstr Organizer</title>
  </head>
  <body class="d-flex flex-column">
    <nav style="background-color:#ffe082 ;"  class="navbar navbar-expand-sm ">

  <!-- Links -->
  <ul  class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Event Editor</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">Eventübersicht</a>
    </li>

  </ul>

</nav>







      <body class="d-flex flex-column">
  <div id="page-content">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 style="color:#03a9f4;" class="font-weight-light mt-4 m-md-3  ">Monstr Organizer</h1>

              <div style="background-color:#dce775 ;" class="card shadow">
                <div class="card-body">
                <h3 class="label" class="card-title">Event eintragen</h3>
              <div class="row justify-content-center">

            <div class="col-lg-4  col-sm-4">

              <form action="index.php?save=event" method="post">
                <div class="form-group">
                  <label class="label" for="exampleInputEmail1">Datum</label>
                  <input type="date" class="form-control" id="date" name="date"  >
                </div>
                </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-3  col-sm-2 ">
        <div class="form-group">
          <label class="label"  for="exampleInputEmail1">Start Zeit</label>
          <input type="time" class="form-control" id="start_time" name="start_time"  >
        </div>
      </div>
        <div class="col-lg-3  col-sm-2">
        <div class="form-group">
          <label class="label" for="exampleInputEmail1">End Zeit</label>
          <input type="time" class="form-control" id="end_time" name="end_time"  >
        </div>
        </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-6  col-sm-2">
        <div class="form-group">
          <label class="label" for="exampleInputPassword1">Titel</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Titel">
        </div>
        <div class="form-group">
          <label class="label" for="exampleInputPassword1">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>

        <button  type="submit" class="btn button-send">Senden</button>
      </form>
            </div>
      </div>
    </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
      <div class="col-auto mr-auto">
       <h5>Copyright &copy; www.martini.digital</h5>
      </div>
      <div class="col-auto mr-auto">
       <img src="../logo.png" alt="Smiley face" height="85" width="112">
      </div>
    </div>
  </footer>
</body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
