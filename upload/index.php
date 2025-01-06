<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avatar Upload Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: 20px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-4">Profile Information</h3>

            <!-- Form for Name and Avatar Upload -->
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <!-- Name input -->
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <!-- Avatar upload -->
                <div class="mb-3">
                    <label for="avatar" class="form-label">Upload Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="file" accept="image/*">
                </div>

                <!-- Avatar preview (this will not be shown in this version) -->
                <div class="mb-3 text-center">
                    <!-- Optionally you can show the uploaded image after the form submission -->
                    <!-- <img src="path-to-uploaded-image" class="avatar-preview" alt="Avatar Preview"> -->
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
