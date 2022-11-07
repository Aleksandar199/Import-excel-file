<?php
session_start();
session_name('budget_tracker');
error_reporting(0);

include '../vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=budget_db", "root", "");

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();


      foreach($data as $row){
        $check_data = array(
         ':vendor'  => $row[0],
         ':description'  => $row[1],
         ':comment'  => $row[2],
         ':po'  => $row[3],
         ':gr'  => $row[4],
         ':rsd'  => $row[5],
         ':eur'  => $row[6],
         ':po_date'  => $row[7],
         ':plant'  => $row[8],
         ':budget_month'  => $row[9],
         ':budget'  => $row[10]
        );


        if($check_data[':vendor'] == ""){
            $check_data[':vendor'] = " ";
         }
         if($check_data[':description'] == ""){
            $check_data[':description'] = " ";
         }
         if($check_data[':comment'] == ""){
            $check_data[':comment'] = " ";
         }
         if($check_data[':po'] == ""){
            $check_data[':po'] = " ";
         }
         if($check_data[':gr'] == ""){
            $check_data[':gr'] = " ";
         }
         if($check_data[':rsd'] == ""){
            $check_data[':rsd'] = " ";
         }
         if($check_data[':eur'] == ""){
            $check_data[':eur'] = " ";
         }
         if($check_data[':po_date'] == ""){
            $check_data[':po_date'] = " ";
         }
         if($check_data[':plant'] == ""){
            $check_data[':plant'] = " ";
         }
         if($check_data[':budget_month'] == ""){
            $check_data[':budget_month'] = " ";
         }
         if($check_data[':budget'] == ""){
            $check_data[':budget'] = " ";
         }


         

  $query = "INSERT INTO budget_db.sp
            (vendor, description, comment, po, gr, rsd, eur, po_date, plant, budget_month, budget) 
    VALUES (:vendor, :description, :comment, :po, :gr, :rsd, :eur, :po_date, :plant, :budget_month, :budget)";



  $statement = $connect->prepare($query);
  $statement->execute($check_data);

  }
  $message = '<div class="alert alert-success text-center">Podaci su uspešno importovani u databazu.</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger text-center">Samo fajlovi sa ekstenzijama <b>.xls</b> ili <b>.xlsx</b> su dozvoljeni!</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger text-center">Molimo Vas da prvo odaberete fajl za import.</div>';
}

echo $message;



?>
