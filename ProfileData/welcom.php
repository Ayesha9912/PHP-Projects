<?php
include_once('connect.php');
session_start();  
$stmt = $conn->prepare('SELECT * FROM `admins` WHERE name= ?');
$stmt->bind_param("s", $_SESSION['name']);
$stmt->execute();
$result = $stmt->get_result();
echo'<prev>';
// print_r($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Template</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
    }
    .sidebar {
      background-color: #343a40;
      height: 100vh;
    }
    .sidebar .nav-link {
      color: white;
    }
    .sidebar .nav-link:hover {
      color: #ffab00;
    }
    .dashboard-header {
      background-color: #ffffff;
      border-bottom: 1px solid #dee2e6;
      padding: 20px;
    }
    .profile-placeholder {
      width: 100px;
      height: 100px;
      background-color: #ddd;
      border-radius: 50%;
      margin: 0 auto;
      display: block;
    }
    .profile-name {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      color: #333;
    }
    .content-area {
      padding: 30px;
    }
    .card {
      border-radius: 10px;
    }
    .card-header {
      background-color: #007bff;
      color: white;
    }
    .card-body {
      background-color: #ffffff;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
      <h3 class="text-white text-center mb-4">Dashboard</h3>
      <div class="text-center mb-4">
        <!-- Profile Image Placeholder -->
        <div class="profile-placeholder mb-2">
            <?php
            if($row = $result->fetch_assoc()){
                $image = $row['image'];
                // echo $image;
                echo '<img src="'.$image.'" alt="" class="img-fluid"/>';
            }else{
                echo 'no data found';
            }
             ?>
        </div>
        <div class="profile-name text-light"><?php echo $_SESSION['name']; ?></div>
      </div>
      <nav class="nav flex-column">
        <a class="nav-link active" href="#">Home</a>
        <a class="nav-link" href="#">Profile</a>
        <a class="nav-link" href="#">Settings</a>
        <a class="nav-link" href="#">Messages</a>
        <a class="nav-link" href="#">Logout</a>
      </nav>
    </div>

    <!-- Main Content Area -->
    <div class="content-area w-100">
      <div class="dashboard-header">
        <h4>Welcome to your Dashboard</h4>
      </div>

      <div class="container-fluid">
        <!-- Dashboard Cards Section -->
        <div class="row">
          <!-- Card 1 -->
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-header">Card 1</div>
              <div class="card-body">
                <p>Some content for card 1.</p>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-header">Card 2</div>
              <div class="card-body">
                <p>Some content for card 2.</p>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-header">Card 3</div>
              <div class="card-body">
                <p>Some content for card 3.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
