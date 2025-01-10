<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Form</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 600px;
      padding-top: 50px;
    }
    .form-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-container h2 {
      text-align: center;
      color: #495057;
      margin-bottom: 30px;
    }
    .form-control,
    .btn {
      border-radius: 8px;
    }
    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      width: 100%;
      padding: 12px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .file-label {
      display: block;
      font-weight: 600;
    }
    .file-input {
      display: block;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ced4da;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>Upload Your File</h2>
      <form method="POST" action="data.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="file" class="file-label">Upload File</label>
          <input accept="image/*" class="form-control file-input" name="file" type="file" id="file" required>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
