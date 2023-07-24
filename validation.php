<?php
 if($_SERVER["REQUEST_METHOD"]="POST"){
    foreach($_POST as $key=>$value){
       $form_data[$key]=val($value);
    }
 }
 function val($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
 }
 
 
 $error=array();
 if(empty($form_data['fname'])){
    $error["errorfname"]="field should contain a value";
    $form_data['fname']="";
 }
 else if(!preg_match("/^[a-zA-Z-' ]*$/",$form_data['fname'])){
    $error["errorfname"]="letter and space are only allowed";
    $form_data['fname']="";
 }
 if(empty($form_data['lname'])){
    $error["errorlname"]="field should contain a value";
    $form_data['lname']="";
 }
 else if(!preg_match("/^[a-zA-Z-' ]*$/",$form_data['lname'])){
   $error["errorlname"]="letter and space are only allowed";
    $form_data['lname']="";
 }
 if(empty($form_data['email'])){
   $error["erroremail"]="field should contain a value";
    $form_data['email']="";
 }
 else if (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)){
   $error["erroremail"]="invalid email entered";
    $form_data['email']="";
 }


 if(empty($form_data['number'])){
   $error["errornumber"]="field should contain a value";
    $form_data['number']="";
 }
 else if(!preg_match("/[0-9]/",$form_data['number'])){
   $error["errornumber"]="number only allowed";
    $form_data['number']="";

 }
 
 session_start();
 $_SESSION['form_data']=$form_data;
 $_SESSION['form_error']=$error;
 



  if(empty($error)){
     $myfile=fopen("contact.csv","a");
     $csvdata=array($fname,$lname,$email,$number,$message);
     $csvheader=array("Fisrt Name","Last Name","Email","Number","Message");
     if(filesize("contact.csv")==0){
        fputcsv($myfile,$csvheader);
     }
     flock($myfile,LOCK_EX);
     fputcsv($myfile,$csvdata);
     flock($myfile,LOCK_UN);
     fclose($myfile);
     header("location:success.php");
  }
  else{
  
   //   header("location:contact.php?errorfname=".$errorfname."&errorlname=".$errorlname."&erroremail=".$erroremail."&errornumber=".$errornumber."&fname=".$fname."&email=".$email."&number=".$number."&message=".$message);
    header("Location:contact.php");
    
   
  }
?>