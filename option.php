<?php

session_start();
require 'header.php';



?>

<div style="background-color:blueviolet; width: 100%;  height:1000px ">

  <main class="m-auto">

  <section class="ftco-section">
            <div class="row justify-content-center">
              <div class="col-md-16">
                <div class="row no-gutters">
                  <div class="col-md-16">
                    <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">
                      <div style="height:200px; margin-top:50px; margin-bottom: 400px">
                  <form>
                    <?php

                    if (!empty($_SESSION['errors'])) {  ?>
                      <div class="alert alert-danger" style=" width: 100%; padding:30px; "> <?= $_SESSION['errors'] ?></div>
                    <?php
                      $_SESSION['errors'] = '';
                    }  ?>
                    <?php
                    if (isUserLoggedIn()) { ?>
                      <img src="images/paper-plane.png" alt="" width="50px" height="50px" style="float: right;">
                      <h5 id="title">YOUR ACCOUNT</h5>
                      <div class="card-body">
                        <h5 class="card-title"><?php print_r($users->get_name()) ?><br><?php print_r($users->get_surname()) ?></h5>
                        <p><?php print_r($users->get_email()) ?></p>
                        <button class="btn btn-primary" type="submit" id="btndelete">Delete</button>
                        <a class="btn btn-primary" type="submit" href="newEmail.php">Change your profile</a>
                      </div>
                  </form>
                  <h5 id="title">YOUR TICKETS</h5>
                  <?php for ($i = 0; $i <= (sizeof($_SESSION['res']) - 1); $i++) {   ?>
                          <div class="card" style="width: 30%; float:left; margin:1%; box-shadow: 0 0 16px black">
                            <div class="card-body">
                              <p class="card-text">
                                <?php
                                print_r($_SESSION['res'][$i]['origin'] . '-' . $_SESSION['res'][$i]['destination'] . '<br>'.'Duration: '. $_SESSION['res'][$i]['duration'] . '<br>' . 'Departure: ' . $_SESSION['res'][$i]['departure'] . '<br>' . 'Arrival: ' . $_SESSION['res'][$i]['arrival']);
                                ?>
                                <button class="btn btn-lg btn-primary">DELETE</button>
                              </form>
                              </p>
                            </div>
                          </div>
                      <?php } ?>

                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



   
      


</div>

<?php   require 'footer.php'; ?>


</main>


<script>
  $("#btndelete").click(function() {
    $.ajax({
      url: "delete.php",
      method: "POST",
      success: function(data) {
        document.location.href = 'index.php';
      }
    })

  })
</script>

