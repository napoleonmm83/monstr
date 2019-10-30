<?php
require_once ("config.php");



$heute = date("d.m.Y");


$dates1 = date("d.m.Y", strtotime('monday this week'));
$form_dates1 = date("Y-m-d", strtotime('monday this week'));
$dates2 = date("d.m.Y", strtotime('tuesday this week'));
$form_dates2 = date("Y-m-d", strtotime('tuesday this week'));
$dates3 = date("d.m.Y", strtotime('wednesday this week'));
$form_dates3 = date("Y-m-d", strtotime('wednesday this week'));
$dates4 = date("d.m.Y", strtotime('thursday this week'));
$form_dates4 = date("Y-m-d", strtotime('thursday this week'));
$dates5 = date("d.m.Y", strtotime('friday this week'));
$form_dates5 = date("Y-m-d", strtotime('friday this week'));


$query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
$query->execute(array('date' => $form_dates1));
$event = $query->fetchAll();

if ($event == NULL)
{
$class_boring_monster1 = "boring-monster";
} else {
$class_boring_monster1 = "";
}

$query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
$query->execute(array('date' => $form_dates2));
$event = $query->fetchAll();

if ($event == NULL)
{
$class_boring_monster2 = "boring-monster";
} else {
$class_boring_monster2 = "";
}

$query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
$query->execute(array('date' => $form_dates3));
$event = $query->fetchAll();

if ($event == NULL)
{
$class_boring_monster3 = "boring-monster";
} else {
$class_boring_monster3 = "";
}

$query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
$query->execute(array('date' => $form_dates4));
$event = $query->fetchAll();

if ($event == NULL)
{
$class_boring_monster4 = "boring-monster";
} else {
$class_boring_monster4 = "";
}

$query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
$query->execute(array('date' => $form_dates5));
$event = $query->fetchAll();

if ($event == NULL)
{
$class_boring_monster5 = "boring-monster";
} else {
$class_boring_monster5 = "";
}











 ?>
<!doctype html>
<html lang="en">
<meta http-equiv="refresh" content="300" />
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
  }
  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }
  </script>



  <style>
  .boring-monster {
  background-image: url('monster_boring.png');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;

  }

  .border-3 {
    border-width:3px !important;
    border-color: #4fc3f7 !important;
}

  .bg-card{
    background-color: #ff8a65 !important;

  }

  .bg-card-active{
    background-color: #ff8a65 !important;
    background-image: url('monster_happy.png');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: right;
  }


  .headerdate{
    background-color: #ffe082 !important;
  }
  .button-time {
    margin-top:5px;

  background-color: #cddc39 !important;
  color: #c62828 !important;
  font-size: 20px !important;;
}

.divider {

color: #fff !important;
font-size: 26px !important;
margin-left: 10px;
margin-right: 10px;
margin-top: 5px;
}

p,h1,h2,h3,h4,h5,h6{
  font-family: "Comic Sans MS", "Comic Sans", cursive;
}


  </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body onload="startTime()">

    <div class="container-fluid overflow-hidden ">
      <div class="row" style="height:10vh;padding-bottom:5px;"  >
    <div class="col-sm border headerdate">
      <h1 class="text-center" >Montag</h1>
      <h5 class="text-center" ><?php echo $dates1;  ?></h5>
    </div>
    <div class="col-sm border headerdate">
    <h1 class="text-center" > Dienstag</h1>
    <h5 class="text-center" ><?php echo $dates2;  ?></h5>
    </div>
    <div class="col-sm border headerdate">
      <h1 class="text-center" >Mittwoch</h1>
      <h5 class="text-center" ><?php echo $dates3;  ?></h5>
    </div>
    <div class="col-sm border headerdate">
    <h1 class="text-center" >  Donnerstag</h1>
    <h5 class="text-center" ><?php echo $dates4;  ?></h5>
    </div>
    <div class="col-sm border headerdate">
    <h1 class="text-center" >  Freitag</h1>
    <h5 class="text-center" ><?php echo $dates5;  ?></h5>
    </div>
  </div>


  <div style="height:78vh;"class="row">
<div   class="col-sm border <?php echo $class_boring_monster1;  ?>">
<?php
$query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
$query->execute(array('date' => $form_dates1));
$event = $query->fetchAll();
foreach( $event as $row ) {

$timenow = date("H");
$timeevent =  date("H", strtotime($row['start_time']));
if ($timenow == $timeevent && $dates1 == $heute){
  $monstrhappy = "bg-card-active";
} else {
  $monstrhappy = "";
}
echo   "<div class='card shadow text-white bg-card  border-3 mb-2  ".$monstrhappy."  '>\n";
echo   "<div class='card-body'>\n";
echo   "<a class='card-text'>".$row['title']."</a>\n";
echo   "<a class='card-text'>-</a>\n";
echo   "<a class='card-text'>".$row['name']."</a>\n";
echo   "<div class='row'>\n";
echo   "<a href='#' class='btn button-time'>".$row['start_time']."</a>\n";
echo   "<h5 class='divider'>-</h5>\n";
echo   "<a href='#' class='btn button-time'>".$row['end_time']."</a>\n";
echo   "</div>\n";
echo   "</div>\n";
echo   "</div>\n";
}
?>
</div>
<div class="col-sm border  <?php echo $class_boring_monster2;  ?>">
  <?php
  $query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
  $query->execute(array('date' => $form_dates2));
  $event = $query->fetchAll();
  foreach( $event as $row ) {
    $timenow = date("H");
    $timeevent =  date("H", strtotime($row['start_time']));
    if ($timenow == $timeevent && $dates2 == $heute ){
      $monstrhappy = "bg-card-active";
    } else {
      $monstrhappy = "";
    }
    echo   "<div class='card shadow text-white bg-card  border-3 mb-2  ".$monstrhappy."  '>\n";
    echo   "<div class='card-body'>\n";
    echo   "<a class='card-text'>".$row['title']."</a>\n";
    echo   "<a class='card-text'>-</a>\n";
    echo   "<a class='card-text'>".$row['name']."</a>\n";
    echo   "<div class='row'>\n";
    echo   "<a href='#' class='btn button-time'>".$row['start_time']."</a>\n";
    echo   "<h5 class='divider'>-</h5>\n";
    echo   "<a href='#' class='btn button-time'>".$row['end_time']."</a>\n";
    echo   "</div>\n";
    echo   "</div>\n";
    echo   "</div>\n";
    }
  ?>
</div>
<div class="col-sm border  <?php echo $class_boring_monster3;  ?> ">
  <?php
  $query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
  $query->execute(array('date' => $form_dates3));
  $event = $query->fetchAll();
  foreach( $event as $row ) {
    $timenow = date("H");
    $timeevent =  date("H", strtotime($row['start_time']));
    if ($timenow == $timeevent && $dates3 == $heute ){
      $monstrhappy = "bg-card-active";
    } else {
      $monstrhappy = "";
    }
    echo   "<div class='card shadow text-white bg-card  border-3 mb-2  ".$monstrhappy."  '>\n";
    echo   "<div class='card-body'>\n";
    echo   "<a class='card-text'>".$row['title']."</a>\n";
    echo   "<a class='card-text'>-</a>\n";
    echo   "<a class='card-text'>".$row['name']."</a>\n";
    echo   "<div class='row'>\n";
    echo   "<a href='#' class='btn button-time'>".$row['start_time']."</a>\n";
    echo   "<h5 class='divider'>-</h5>\n";
    echo   "<a href='#' class='btn button-time'>".$row['end_time']."</a>\n";
    echo   "</div>\n";
    echo   "</div>\n";
    echo   "</div>\n";
    }
  ?>
</div>
<div class="col-sm border  <?php echo $class_boring_monster4;  ?> ">
  <?php
  $query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
  $query->execute(array('date' => $form_dates4));
  $event = $query->fetchAll();
  foreach( $event as $row ) {
    $timenow = date("H");
    $timeevent =  date("H", strtotime($row['start_time']));
    if ($timenow == $timeevent && $dates4 == $heute ){
      $monstrhappy = "bg-card-active";
    } else {
      $monstrhappy = "";
    }
    echo   "<div class='card shadow text-white bg-card  border-3 mb-2  ".$monstrhappy."  '>\n";
    echo   "<div class='card-body'>\n";
    echo   "<a class='card-text'>".$row['title']."</a>\n";
    echo   "<a class='card-text'>-</a>\n";
    echo   "<a class='card-text'>".$row['name']."</a>\n";
    echo   "<div class='row'>\n";
    echo   "<a href='#' class='btn button-time'>".$row['start_time']."</a>\n";
    echo   "<h5 class='divider'>-</h5>\n";
    echo   "<a href='#' class='btn button-time'>".$row['end_time']."</a>\n";
    echo   "</div>\n";
    echo   "</div>\n";
    echo   "</div>\n";
    }
  ?>
</div>
<div class="col-sm border  <?php echo $class_boring_monster5;  ?>">
  <?php
  $query = $pdo->prepare("SELECT * FROM event WHERE date = :date");
  $query->execute(array('date' => $form_dates5));
  $event = $query->fetchAll();
  foreach( $event as $row ) {
    $timenow = date("H");
    $timeevent =  date("H", strtotime($row['start_time']));
    if ($timenow == $timeevent && $dates5 == $heute ){
      $monstrhappy = "bg-card-active";
    } else {
      $monstrhappy = "";
    }
    echo   "<div class='card shadow text-white bg-card  border-3 mb-2  ".$monstrhappy."  '>\n";
    echo   "<div class='card-body'>\n";
    echo   "<a class='card-text'>".$row['title']."</a>\n";
    echo   "<a class='card-text'>-</a>\n";
    echo   "<a class='card-text'>".$row['name']."</a>\n";
    echo   "<div class='row'>\n";
    echo   "<a href='#' class='btn button-time'>".$row['start_time']."</a>\n";
    echo   "<h5 class='divider'>-</h5>\n";
    echo   "<a href='#' class='btn button-time'>".$row['end_time']."</a>\n";
    echo   "</div>\n";
    echo   "</div>\n";
    echo   "</div>\n";
    }
  ?>
</div>
</div>
    </div>



    <footer id="sticky-footer" style="height:12vh;" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
          <div class="row">

             <div class="col-auto mr-auto">
              <h5>Copyright &copy; www.martini.digital</h5>
             </div>
             <div class="col-auto mr-auto">
              <img src="logo.png" alt="Smiley face" height="85" width="112">
             </div>
             <div class="col-auto">
            <h3 style="color:#b2ff59;">  <?php echo $heute;  ?></h3>
            <h3 style="color:#1e88e5;" id="txt"></h3>
             </div>
             <div class="col-auto">

             </div>
           </div>

        </div>
      </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
