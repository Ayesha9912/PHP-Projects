<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crud</title>
</head>
<body>
    <div class="container mt-5">
        <button class="btn btn-primary mb-5"><a class="text-light" href="user.php">Add User</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr no.</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM `cruds`";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            echo '   <tr>
                             <th scope="row">'.$id.'</th>
                             <td>'.$name.'</td>
                              <td>'.$email.'</td>
                               <td>
                    <Button class="btn btn-primary"><a class="text-light" href="update.php?id='.$id.'">Update</a></Button>
                    <Button class="btn btn-danger"><a  class="text-light" href="delete.php?id='.$id.'">Delete</a></Button></td>
                              </tr>';
                            }
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
</html>