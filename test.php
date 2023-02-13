<?php

session_start();
require 'header.php';

?>

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <button id='btndelete'class="btn btn-primary">Go somewhere</button>
  </div>
</div>

<script src="js/jquery-3.6.0.js"></script>
<script src="jquery-ui/jquery-ui.js"></script>
<link href="jquery-ui/jquery-ui.css" rel="stylesheet">

<script>
 $("#btndelete").click(function(){
   $.ajax({
    url: "delete.php",
    method: "POST",
    success: function(data) {
    document.location.href='index.php';
  }
   })
   
 })

