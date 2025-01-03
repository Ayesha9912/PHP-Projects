<?php
session_start();
?>

<!-- //How to send MAil through PHP Mailer which is the lid in composer., -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>PHP MAiler!</title>
  </head>
  <body>

  <div class="container mt-5">
   <div class="card-header">
    <h4>How to Send MAil through PHP MAiler</h4>
   </div>
   <div class="card-body">
    <form action="sendmail.php" method="POST">
        <div class="mb-3">
            <label for="fullname">Full Name</label>
            <input type="text" name="full_name" id="fullname" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="email_address">Email Address</label>
            <input type="text" name="email" id="email_address" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="Subject">Subject</label>
            <input type="text" name="subject" id="subject" required class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="message">message</label>
            <textarea class="form-control" name="message" required id="message"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" name="submitContact" class="btn btn-primary">Send Mail</button>
        </div>
    </form>
   </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    var messageText = "<?=$_SESSION['status'] ?? ""?>";
    if(messageText != ""){
    Swal.fire({
  title: "Thank you",
  text: messageText,
  icon: "Success"
});
<?php unset($_SESSION['status'])?>
}
  </script>
  </body>
</html>



</script>
