
<?php
session_start();
require 'header.php';
require 'getFlight.php';

if (empty($_SESSION['iata_code_destination'])) {
$_SESSION['iata_code_destination'] = $_POST['iata_code_destination'];
}

if(empty($_SESSION['selected_destination'] )) {
$_SESSION['selected_destination'] = $_POST['selected_destination'];
}
?>





<div style="background-color:blueviolet; width: 100%;  height:1000px ">

  <main class="m-auto" style="background-color:blueviolet; width: 100%;  height:100% ">


    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-16">
            <div class="row no-gutters">
              <div class="col-md-16">
                <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">
                  <h1 class='colortitle'>Check your flight</h1>
                  <h3 > Departure from <?php  print_r($_SESSION['selected_origin'])."<br>"?>
                  <h3 > Destination <?php  print_r($_SESSION['selected_destination'])."<br>"?>
                  <div class="card-body">
                    <form style="width: 300px;" action="flights.php">
                      <div class="mb-3">
                        <label for="exampleInputPassword1" >Departure Date</label>
                        <input type="date" class="form-control" name='departureDate' id="exampleInputPassword1">
                      </div>
                      <input hidden name='destination' value=<?= $_SESSION['iata_code_destination'] ?>>
                      <input hidden name='origin' value=<?= $_SESSION['iata_code_origin']?> >
                      <div class="mb-3">
                        <label for="exampleInputPassword1" >Passengers</label>
                        <input type="number" name='passengers' class="form-control" id="exampleInputPassword1">
                      </div>
                      <button class="btn btn-primary">Check</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>



</section>


<?php
if (!empty($_SESSION['resultFlight'])) {
  ?>
  <section class="ftco-section">
    <div class="row justify-content-center">
      <div class="col-md-16">
        <div class="row no-gutters">
          <div class="col-md-16">
            <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">
              <h1 class="text-center">Flights</h1>
              <div style="height:500px; margin-top:50px; margin-bottom: 400px">
                <?php
                    for ($i = 0; $i <= (sizeof($_SESSION['resultFlight']['itineraries']['buckets']) -1); $i++) {
                      
                  ?>       
                  <div class="card" style="width: 30%; float:left; margin:1%; box-shadow: 0 0 16px black">
                    <div class="card-body">
                    <h5 class="card-title"><?php print_r($_SESSION['resultFlight']['itineraries']['buckets'][$i]['name']) ?></h5>
                      <h5 class="card-title">Price : <?php print_r($_SESSION['resultFlight']['itineraries']['buckets'][$i]['items'][0]['price']['formatted']) ?></h5>
                      <h5 class="card-title">Origin : <?php print_r($_SESSION['resultFlight']['itineraries']['buckets'][$i]['items'][0]['legs'][0]['origin']['name']) ?></h5>
                      <h5 class="card-title">Destination : <?php print_r($_SESSION['resultFlight']['itineraries']['buckets'][$i]['items'][0]['legs'][0]['destination']['name']) ?></h5>
                      <h5 class="card-title">Duration : <?php print_r($_SESSION['resultFlight']['itineraries']['buckets'][$i]['items'][0]['legs'][0]['durationInMinutes']) ?></h5>
                      <h5 class="card-title">Departure : <?php print_r($_SESSION['resultFlight']['itineraries']['buckets'][$i]['items'][0]['legs'][0]['departure']) ?></h5>
                      <h5 class="card-title">Arrival : <?php print_r($_SESSION['resultFlight']['itineraries']['buckets'][$i]['items'][0]['legs'][0]['arrival']) ?></h5>
                    
                      <?php if (isUserLoggedIn()) { ?>
                        <a href="flights.php" class="card-link">Flight</a>
                      <?php
                      } else { ?>
                        <a href="register.php" class="card-link">Flight</a>
                      <?php } ?>
                    </div>
                  </div>
              <?php
                    }
                  
                  
                }

              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>











  <?php

  require 'footer.php'
  ?>
