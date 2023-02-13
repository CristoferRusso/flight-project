
<?php

session_start();
require 'header.php';


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
                  <form>
                    <?php

                    if (!empty($_SESSION['errors'])) {  ?>
                      <div class="alert alert-danger" style=" width: 100%; padding:30px; "> <?= $_SESSION['errors'] ?></div>
                    <?php
                      $_SESSION['errors'] = '';
                    }  ?>
                    <?php
                    if (isUserLoggedIn()) { ?>
                
                        <h5 >Your account</h5>
                        <div class="card-body">
                          <h5 class="card-title"><?php print_r($users->get_name()) ?><br><?php print_r($users->get_surname()) ?></h5>
                          <p><?php print_r($users->get_email()) ?></p>
                          <button class="btn btn-primary" type="submit" id="btndelete">Delete</button>
                          <a class="btn btn-primary" type="submit" href="newEmail.php">Change your profile</a>
                        </div>
                      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</section>

<?php }  require 'footer.php'; ?>





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

</main>