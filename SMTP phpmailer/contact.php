<?php  
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <body>
    <title> php Mailer</title>
    <div class="container mt-5">
        <div class="card">
            <h3 class="text-center">Send Mail Through PHP Mailer</h3>
        <div class="card-body">
            <form method="POST" action="sendmail.php">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control">
                <label for="Email">Email</label>
                <input type="text" name="email" class="form-control">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control">
                <label for="Meassage">Email</label>
                <textarea name="message" class="form-control" id=""></textarea>
                <button  type="submit" name="submit" class="btn mt-5 btn-primary">Submit Form</button>
            </form>
        </div>
        </div>
    </div>
  </head>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var message_text = "<?=$_SESSION['status'] ?? ""?>";
        if(message_text != ""){
            Swal.fire({
      title: "Thank You",
      text: message_text,
      icon: "success"
    });
    <?php unset($_SESSION['status']) ?>
    }

    </script>

  </body>
</html>






































