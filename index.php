<?php

$heute = date("d.m.Y");

function GetCurrentWeekDates()
{
    if (date('D') != 'Mon') {
        $startdate = date('d.m.Y', strtotime('last Monday'));
    } else {
        $startdate = date('d.m.Y');
    }

//always next saturday
    if (date('D') != 'Sat') {
        $enddate = date('d.m.Y', strtotime('next Saturday'));
    } else {
        $enddate = date('d.m.Y');
    }

    $DateArray = array();
    $timestamp = strtotime($startdate);
    while ($startdate <= $enddate) {
        $startdate = date('d.m.Y', $timestamp);
        $DateArray[] = $startdate;
        $timestamp = strtotime('+1 days', strtotime($startdate));
    }
    return $DateArray;
}


$dates = GetCurrentWeekDates();
$dates1 = array_shift($dates);
$dates2 = array_shift($dates);
$dates3 = array_shift($dates);
$dates4 = array_shift($dates);
$dates5 = array_shift($dates);

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>



      </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container-fluid ">
      <div class="row" style="height:12vh;"  >
    <div class="col-sm border">
      <h1 class="text-center" >Montag</h1>
      <h5 class="text-center" ><?php echo $dates1;  ?></h5>
    </div>
    <div class="col-sm border">
    <h1 class="text-center" > Dienstag</h1>
    <h5 class="text-center" ><?php echo $dates2;  ?></h5>
    </div>
    <div class="col-sm border">
      <h1 class="text-center" >Mittwoch</h1>
      <h5 class="text-center" ><?php echo $dates3;  ?></h5>
    </div>
    <div class="col-sm border">
    <h1 class="text-center" >  Donnerstag</h1>
    <h5 class="text-center" ><?php echo $dates4;  ?></h5>
    </div>
    <div class="col-sm border">
    <h1 class="text-center" >  Freitag</h1>
    <h5 class="text-center" ><?php echo $dates5;  ?></h5>
    </div>
  </div>


  <div style="height:80vh;"class="row">
<div  class="col-sm border ">
<p>montag</p>
</div>
<div class="col-sm border ">
  Dienstag
</div>
<div class="col-sm border  ">
  Mittwoch
</div>
<div class="col-sm border  ">
  Donnerstag
</div>
<div class="col-sm border ">
  Freitag
</div>
</div>
    </div>

    <footer id="sticky-footer" style="height:8vh;" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
          <small>Copyright &copy; Your Website</small>
        </div>
      </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
