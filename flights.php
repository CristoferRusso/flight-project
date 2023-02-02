<?php
session_start();
require 'header.php';

?>





<div style="background-color:blueviolet; width: 100%;  height:1000px " >

<main class="m-auto" style="background-color:blueviolet; width: 100%;  height:100% " >


<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-16">
        <div class="row no-gutters">
          <div class="col-md-16">
            <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">

              <h1>Check your flight</h1>
              <div class="card-body">
                <form style="width: 300px;">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Origin</label>
                    <select class="form-select" id="inputGroupSelect01">
                      <option selected>Choose orgin airport</option>
                      <?php
                      for ($i = 0; $i <= (sizeof($_SESSION['result']) - 1); $i++) { ?>
                        <option value="1"><?php print_r($_SESSION['result'][$i]['name']) ?></option>

                      <?php
                      } ?>

                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Destination</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Departure Date</label>
                    <input type="date" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Passengers</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" style="width: 100px;">
                  </div>
                  <button type="submit" class="btn btn-primary">Check</button>
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

require 'footer.php'
?>
