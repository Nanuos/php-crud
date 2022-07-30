<?php include("db.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de PHP</title>


    <!-- SCRIPTS -->
<!-- BOOTSTRAP 5 -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
crossorigin="anonymous"></script>

<!-- FONT AWESOME -->
<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
 crossorigin="anonymous" 
 referrerpolicy="no-referrer" />




<!-- NAVIGATION -->

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">PHP MYSQL CRUD</a>
    </div>
</nav>

<!-- BODY -->
</head>
<body>

<div class="container p-4">

<?php if (isset($_SESSION['message'])) { ?>

<div class="alert alert-success w-auto alert-dismissible fade show" role="alert">
    <?= $_SESSION['message'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php session_unset(); } ?>


    <div class="row">
        <div class="col-md-4">
            
        <div class="card card-body">
            <form action="save_task.php" method="POST">
                <div class="form-group">
                    <input type="text" name="title" class="form-control my-3" placeholder="Task Title" autofocus>
                </div>
                <div class="form-grou">
                    <textarea name="description" id="" rows="2" class="form-control my-3" placeholder="Task Description"></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
            </form>
        </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)){ ?>
                    <tr>
                        <td><?php echo $row['title']?></td>
                        <td><?php echo $row['description']?></td>
                        <td><?php echo $row['created_at']?></td>
                        <td><?php echo $row['id']?></td>
                        <td>
                        <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fa-solid fa-pen-to-square"></i>

                                </a>

                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                        </a>
                        </td>
                    </tr>

                    <?php  }?>
                </tbody>

            </table>

        </div>

    </div>
</div>


</body>
</html>