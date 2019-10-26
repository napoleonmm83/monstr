<?php
require_once ("config.php");

$start_date = date("Y-m-d");
$end_date =  date('Y-m-d', strtotime($start_date. ' + 30 days'));

$start_date_form = date("d.m.Y", strtotime($start_date));
$end_date_form  = date("d.m.Y", strtotime($end_date));


if(isset($_GET['save'])) {
  $save = $_GET['save'];
  if($save == 'event') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $start_date_form = date("d.m.Y", strtotime($start_date));
    $end_date_form  = date("d.m.Y", strtotime($end_date));
  }
}

if(isset($_GET['delet'])) {
  $delet = $_GET['delet'];
  if($delet == 'event') {
    $id = $_POST['id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $start_date_form = date("d.m.Y", strtotime($start_date));
    $end_date_form  = date("d.m.Y", strtotime($end_date));

    $statement = $pdo->prepare("DELETE FROM event WHERE id = :id ");
			$result = $statement->execute(array('id' =>  $id ));
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

.button-time {
  margin-top:5px;

background-color: #cddc39 !important;
color: #c62828 !important;
font-size: 20px !important;
}

.divider {

color: #fff !important;
font-size: 26px !important;
margin-left: 10px;
margin-right: 10px;
margin-top: 5px;
}

.button-delet {
  background-color: #c62828 !important;
  color: #cddc39 !important;
  font-size: 20px !important;
}



</style>
    <title>Monstr Organizer</title>
  </head>
  <body class="d-flex flex-column">
    <nav style="background-color:#ffe082 ;"  class="navbar navbar-expand-sm ">

  <!-- Links -->
  <ul  class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="admin.php">Event Editor</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">Eventübersicht</a>
    </li>

  </ul>

</nav>







      <body class="d-flex flex-column">
  <div id="page-content">
    <div class="container-fluid text-center">
        <h1 style="color:#03a9f4;" class="font-weight-light mt-4 m-md-3  ">Monstr Organizer</h1>
        <h4 style="color:#03a9f4;" class="font-weight-light mt-4 m-md-3  ">Events vom <?php echo $start_date_form. " bis " .$end_date_form  ?></h4>
      <div class="row justify-content-start">
        <div class="col-lg-2">
          <form action="dashboard.php?save=event&start=<?php echo $start_date;?>&end=<?php echo $end_date;?>" method="post">
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">Start Datum</label>
              <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="form-group">
              <label class="label" for="exampleInputEmail1">End Datum</label>
              <input type="date" class="form-control" id="end_date" name="end_date"  >
            </div>

            <button type="submit" class="btn btn-primary m-3">Filtern</button>
          </form>
</div>
<div class="col-lg-10">
    <div class="row justify-content-start">
          <?php
          $query = $pdo->prepare("SELECT * FROM event WHERE date > :start AND date < :end  ");
          $query->execute(array('start' => $start_date, 'end' => $end_date));
          $event = $query->fetchAll();
          foreach( $event as $row ) {

            $dates = $row['date'];
            $form_dates = date("d.m.Y", strtotime($dates));

          echo   "<div  class='col-lg-2'>\n";
          echo   "<div style='background-color:#dce775 ;' class='card shadow text-white bg-card  border-3 mb-2    '>\n";
          echo   "<div class='card-body'>\n";
          echo   "<h5 class='card-title'>".$form_dates."</h5>\n";
          echo   "<a class='card-text'>".$row['title']."</a>\n";
          echo   "<a class='card-text'>-</a>\n";
          echo   "<a class='card-text'>".$row['name']."</a>\n";
          echo   "<div class='row justify-content-center'>\n";
          echo   "<a href='#' class='btn button-time'>".$row['start_time']."</a>\n";
          echo   "<h5 class='divider'>-</h5>\n";
          echo   "<a href='#' class='btn button-time'>".$row['end_time']."</a>\n";
          echo   "</div>\n";
          echo   "<form action='dashboard.php?delet=event' method='post'>\n";
          echo   "<div class='row justify-content-center m-3'>\n";
          echo    "<input type='hidden'  name='id' id='id' value='".$row['id']."'>\n";
          echo    "<input type='hidden'  name='start_date'  value='". $start_date."'>\n";
          echo    "<input type='hidden'  name='end_date'  value='".$end_date."'>\n";

          echo   "<button type='submit' class='btn button-delet'>löschen</button>\n";
          echo   "</div>\n";
          echo   "</form>\n";
          echo   "</div>\n";
          echo   "</div>\n";
          echo   "</div>\n";
          }
          ?>
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
       <img src="logo.png" alt="Smiley face" height="85" width="112">
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
