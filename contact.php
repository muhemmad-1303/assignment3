<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <?php
      session_start();
      $form_data=$_SESSION['form_data'] ?? [];
      $error=$_SESSION["form_error"] ?? [];
      unset($_SESSION['form_data']);
      unset($_SESSION['error']);

    ?>
    
    <div class="main">
    <div class="formbody">
    <h1>CONTACT ME</h1>
    <form action="validation.php" method="post">
    <div class="forminput">
    <div class="inputbox">   
    <label>First Name :</label>
    <input type="text" name="fname" value="<?=$form_data['fname']??''?> ">
    <span><?php
    if (isset($error['errorfname'])){
        echo $error['errorfname'];
    }
    ?></span>
    </div>
    <div class="inputbox">
    <label>Last Name :</label>    
    <input type="text" name="lname" value="<?=$form_data['lname']??''?> "> 
    <span><?php
    if (isset($error['errorlname'])){
        echo $error['errorlname'];
    }
    ?></span>
    </div>
    <div class="inputbox">
    <label>Email:</label>
    <input type="text" name="email" value="<?=$form_data['email']??''?> ">
    <span><?php
    if (isset($error['erroremail'])){
        echo $error['erroremail'];
    }
    ?></span>
    </div>
    <div class="inputbox">
    <label>Number :</label>
    <input type="text" name="number" value="<?=$form_data['number']??''?> ">
    <span><?php
    if (isset($error['errornumber'])){
        echo $error['errornumber'];
    }
    ?></span>
    </div>
    <div class="inputbox">
    <p>Message:</p>
    <textarea name="message" id="" cols="30" rows="4"><?=$form_data['message']?? " "?></textarea>
    </div>
    <input type="submit" value=submit>
    </div>
    </form>
</div>
</div>
</body>
</html>