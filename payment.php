<?php
session_start();
require 'header.php';
$int =(int)$_GET['price'];
?>
<div style="background-color:blueviolet; width: 100%;  height:1000px " >

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-16">
        <div class="row no-gutters">
          <div class="col-md-16">
            <div class="contact-wrap w-100 p-lg-5 p-4" style="box-shadow: 0 0 16px black">
              <div id="smart-button-container">
              <img src="images/paper-plane.png" alt="" width="50px" height="50px" style="float: right;">
                <div style="text-align: center"><label for="description"> </label><input type="text" hidden name="descriptionInput" id="description" maxlength="127" value="<?= $_GET['origin'] . "-" . $_GET['destination'] ?>"><h4><?= $_GET['origin'] . "-" . $_GET['destination'] ?></h4></div>
                <h4 style="text-align: center"><?= "Passengers :" . $_GET['passengers'] ?></h4>
                <div style="text-align: center"><label for="amount"> </label><input name="amountInput" hidden type="number" id="amount" value='<?= $int?>'><h4><?= $_GET['price'] ?></h4></div>
                <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value=""></div>
                <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>



</section>

              <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
              <script>
                function initPayPalButton() {
                  var description = document.querySelector('#smart-button-container #description');
                  var amount = document.querySelector('#smart-button-container #amount');
                  var descriptionError = document.querySelector('#smart-button-container #descriptionError');
                  var priceError = document.querySelector('#smart-button-container #priceLabelError');
                  var invoiceid = document.querySelector('#smart-button-container #invoiceid');
                  var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
                  var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

                  var elArr = [description, amount];
  
                  if (invoiceidDiv.firstChild.innerHTML.length > 1) {
                    invoiceidDiv.style.display = "block";
                  }

                  var purchase_units = [];
                  purchase_units[0] = {};
                  purchase_units[0].amount = {};

                  function validate(event) {
                    return event.value.length > 0;
                  }

                  paypal.Buttons({
                    style: {
                      color: 'gold',
                      shape: 'rect',
                      label: 'paypal',
                      layout: 'vertical',

                    },

                    onInit: function(data, actions) {
                      actions.disable();

                      if (invoiceidDiv.style.display === "block") {
                        elArr.push(invoiceid);
                      }

                      elArr.forEach(function(item) {
                   
                          var result = elArr.every(validate);
                          
                            actions.enable();
                         
                        });
                      
                      },

                    onClick: function() {
                      if (description.value.length < 1) {
                        descriptionError.style.visibility = "visible";
                      } else {
                        descriptionError.style.visibility = "hidden";
                      }

                      if (amount.value.length < 1) {
                        priceError.style.visibility = "visible";
                      } else {
                        priceError.style.visibility = "hidden";
                      }

                      if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
                        invoiceidError.style.visibility = "visible";
                      } else {
                        invoiceidError.style.visibility = "hidden";
                      }

                      purchase_units[0].description = description.value;
                      purchase_units[0].amount.value = amount.value;

                      if (invoiceid.value !== '') {
                        purchase_units[0].invoice_id = invoiceid.value;
                      }
                    },

                    createOrder: function(data, actions) {
                      return actions.order.create({
                        purchase_units: purchase_units,
                      });
                    },

                    onApprove: function(data, actions) {
                      return actions.order.capture().then(function(orderData) {

                        // Full available details
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                        // Show a success message within this page, e.g.
                        const element = document.getElementById('paypal-button-container');
                        element.innerHTML = '';
                        element.innerHTML = '<h3>Thank you for your payment!</h3>';

                        // Or go to another URL:  actions.redirect('thank_you.html');

                      });
                    },

                    onError: function(err) {
                      console.log(err);
                    }
                  }).render('#paypal-button-container');
                }
                initPayPalButton();
              </script>

              <?php
              require 'footer.php';
              ?>