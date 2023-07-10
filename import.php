<?php 
session_name("budget_tracker");
session_start();
error_reporting(0);
include 'scripts/connect.php';


$title = "Importovanje Excel fajla";
include "inc/header.php"; ?>

<meta name="viewport" content="width=device-width, initial-scale=1"><script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<div class="container"><br><br>
   <h3 class="text-center text-white"><?php echo $title; ?></h3>
   <br>
    <div class="signup-form">
     <form method="post" id="import_excel_form" enctype="multipart/form-data">
             <div class="panel panel-default bg-light text-dark">
             <h2>Import excel</h2>
             <h5><p class="hint-text">Importovanje Excel fajla, <b class="text-info">redosled kolona MORA biti: Vendor, Description, Comment, PO, GR, RSD, EUR, PO date, Plant, Budget month, Budget</b></p></h5>
             <h5 class="text-danger text-center">Import podataka se vrši BEZ gornje kolone sa nazivima!</h5>
               <div class="table-responsive">
               <label>Import excel file:</label><br>
                <span id="message"></span>
              <tr>
                <td width="50%"><input type="file" name="import_excel" /></td> <br><br>
                <td width="25%"><button type="submit" name="import" id="import" class="btn btn-primary">Import Excel File</button></td>
              </tr>
     </form>
    </div>
</div>



<?php include "inc/footer.php"; ?>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <script src="JS/importXLS.js"></script>
