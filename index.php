
<?php
session_start();
require 'header.php';
//require 'getAirport.php';
error_reporting(E_ERROR | E_PARSE);
if (isUserLoggedIn()) {
  if (empty($_SESSION['iata_code_origin'])) {
    $_SESSION['iata_code_origin'] = $_POST['iata_code_origin'];
  }

  if (empty($_SESSION['selected_origin'])) {
    $_SESSION['selected_origin'] = $_POST['selected_origin'];
  }
}
?>


<main>


  <?php if (isUserLoggedIn()) { ?>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-16">
            <div class="row no-gutters">
              <div class="col-md-16">
                <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">
                <h2 class="fw-normal">Heading</h2>
                  <form class="d-flex" role="search" action="index.php">
                    <title>Placeholder</title>
                    <input class="form-control me-2" type="search" placeholder="Destination" aria-label="Search" name="destination">
                    <input class="form-control me-2" type="search" placeholder="Origin" aria-label="Search" name="city">
                    <button class="btn btn-lg btn-primary" type="submit">Search</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>




  <?php } else { ?>
    <div id="carouselExampleFade" class="carousel slide">
      <div class="carousel-inner">
        <div class="col-md-16">
          <div class="carousel-item active">
            <img src="images/alexey-starki-91ykdj2WQeg-unsplash (1).jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <a class="w-100 btn btn-lg btn-primary" type="submit" href='register.php' style="margin-top: 10px;">Signup to take your flights</a>
            </div>
          </div>
        </div>
      </div>




      <?php
    }
    if (isUserLoggedIn()) {
      if (empty($_SESSION['iata_code_origin'])) {
        if (!empty($_SESSION['result'])) {

      ?>
          <section class="ftco-section">
            <div class="row justify-content-center">
              <div class="col-md-16">
                <div class="row no-gutters">
                  <div class="col-md-16">
                    <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">

                      <div style="height:500px; margin-top:50px; margin-bottom: 400px">
                        <h1 style="font-family:Arial, Helvetica, sans-serif;   background: -webkit-linear-gradient(rgb(255, 99, 255), blue);   -webkit-background-clip: text;   -webkit-text-fill-color: transparent;">AIRPORTS AVAILABLE ORIGIN</h1>
                        <?php
                        for ($i = 0; $i <= (sizeof($_SESSION['result']) - 1); $i++) {
                        ?>
                          <div class="card" style="width: 30%; float:left; margin:1%; box-shadow: 0 0 16px black">
                            <div class="card-body">
                              <h5 class="card-title"><?php print_r($_SESSION['result'][$i]['name'])  ?> </h5>
                              <p class="card-text">
                                <?php
                                print_r('Iata Code: ' . $_SESSION['result'][$i]['iata_code'] . '<br>' . 'Name: ' . $_SESSION['result'][$i]['name'] . '<br>' . 'City: ' . $_SESSION['result'][$i]['city'] . '<br>' . 'Country: ' . $_SESSION['result'][$i]['country'] . '<br>' . '<br>');
                                ?>
                              <form method="POST" action="index.php">
                                <input hidden value=" <?= $_SESSION['result'][$i]['iata_code'] ?> " name="iata_code_origin" id="iata_code_origin">
                                <input hidden value=" <?= $_SESSION['result'][$i]['name'] ?> " name="selected_origin" id="selected_origin">
                                <button class="btn btn-lg btn-primary">Flight</button>
                              </form>
                              </p>
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
      } else {
        if (!empty($_SESSION['destination'])) {
    ?>
      <section class="ftco-section ">
        <div class="row justify-content-center">
          <div class="col-md-16">
            <div class="row no-gutters">
              <div class="col-md-16">
                <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">
                  <div style="height:500px; margin-top:50px; margin-bottom: 400px">
                    <h1 style="font-family:Arial, Helvetica, sans-serif;   background: -webkit-linear-gradient(rgb(255, 99, 255), blue);   -webkit-background-clip: text;   -webkit-text-fill-color: transparent;">AIRPORTS AVAILABLE DESTINATION</h1>
                    <?php
                    for ($i = 0; $i <= (sizeof($_SESSION['destination']) - 1); $i++) {
                    ?>
                      <div class="card" style="width: 30%; float:left; margin:1%; box-shadow: 0 0 16px black">
                        <div class="card-body">
                          <h5 class="card-title"><?php print_r($_SESSION['destination'][$i]['name'])  ?> </h5>
                          <p class="card-text">
                            <?php
                            print_r('Iata Code: ' . $_SESSION['destination'][$i]['iata_code'] . '<br>' . 'Name: ' . $_SESSION['destination'][$i]['name'] . '<br>' . 'City: ' . $_SESSION['destination'][$i]['city'] . '<br>' . 'Country: ' . $_SESSION['destination'][$i]['country'] . '<br>' . '<br>');
                            ?>
                          <form method="POST" action="flights.php">
                            <input hidden value=" <?= $_SESSION['destination'][$i]['iata_code'] ?> " name="iata_code_destination">
                            <input hidden value=" <?= $_SESSION['destination'][$i]['name'] ?> " name="selected_destination">
                            <button class="btn btn-lg btn-primary">Flight</button>
                          </form>
                          </p>
                        </div>
                      </div>
              <?php
                    }
                  }
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

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img id='img1' class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://images.unsplash.com/photo-1587019158091-1a103c5dd17f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            </img>
            <h2 class="fw-normal">Heading</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img id='img2' class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://images.unsplash.com/photo-1606768666853-403c90a981ad?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            </img>
            <h2 class="fw-normal">Heading</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img id='img3' class="bd-placeholder-img rounded-circle" width="140" height="140" src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1474&q=80" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            </img>
            <h2 class="fw-normal">Heading</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider ">

        <div class="row featurette ">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
            <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
          </div>
          <div class="col-md-5">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="https://images.unsplash.com/photo-1604601815764-6d01fc6bebde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1365&q=80" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            </img>
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="images/gif.gif" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            </svg>

          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
          </div>
          <div class="col-md-5">
            <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="images/gif2.gif" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            </svg>

          </div>
        </div>


        <hr class="featurette-divider">

      </div>

      <!--Sezione contatti-->

      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
          </div>
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="wrapper">
                <div class="row no-gutters">
                  <div class="col-md-6">
                    <div class="contact-wrap w-100 p-lg-5 p-4">
                      <h3 class="mb-4">Send us a message</h3>
                      <div id="form-message-warning" class="mb-4"></div>
                      <div id="form-message-success" class="mb-4">
                        Your message was sent, thank you!
                      </div>
                      <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="email_logic/email_logic.php">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="name_contact" id="name_contact" placeholder="Name">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="email" class="form-control" name="email_contact" id="email_contact" placeholder="Email">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject_contact" id="subject_contact" placeholder="Subject">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <textarea name="message_contact" class="form-control" id="message" cols="30" rows="6" placeholder="Message"></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="submit" value="Send Message" class="btn btn-primary">
                              <div class="submitting"></div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-wrap w-100 p-lg-5 p-4 img">
                      <h3>Contact us</h3>
                      <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                      <div class="dbox w-100 d-flex align-items-start">
                        <div class="icon d-flex align-items-center justify-content-center">
                          <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text pl-3">
                          <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                      </div>
                      <div class="dbox w-100 d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                          <span class="fa fa-phone"></span>
                        </div>
                        <div class="text pl-3">
                          <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                        </div>
                      </div>
                      <div class="dbox w-100 d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                          <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text pl-3">
                          <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                        </div>
                      </div>
                      <div class="dbox w-100 d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                          <span class="fa fa-globe"></span>
                        </div>
                        <div class="text pl-3">
                          <p><span>Website</span> <a href="#">yoursite.com</a></p>
                        </div>
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


      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!--<script src="js/jquery.validate.min.js"></script>-->
      <script src="js/main.js"></script>



</main>


<script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>


<script>
  document.getElementById('img1').addEventListener('mouseover', function() {
    document.getElementById('img1').src = 'images/paper-plane.png'
  })
  document.getElementById('img1').addEventListener('mouseout', function() {
    document.getElementById('img1').src = 'images/alexey-starki-91ykdj2WQeg-unsplash (1).jpg'
  })

  document.getElementById('img2').addEventListener('mouseover', function() {
    document.getElementById('img2').src = 'images/paper-plane.png'
  })
  document.getElementById('img2').addEventListener('mouseout', function() {
    document.getElementById('img2').src = 'https://images.unsplash.com/photo-1606768666853-403c90a981ad?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1471&q=80'
  })

  document.getElementById('img3').addEventListener('mouseover', function() {
    document.getElementById('img3').src = 'images/paper-plane.png'
  })
  document.getElementById('img3').addEventListener('mouseout', function() {
    document.getElementById('img3').src = 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1474&q=80'
  })

  document.getElementById('selected_origin').addEventListener('click', function() {
    evt.preventDefault();
    const ele = $(evt.target.value);
    alert()
  })
</script>
</html>

