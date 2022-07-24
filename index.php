<!-- CODIGO INDEX -->
<?php include("db.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP crud</title>

    <!-- BOOTSTRAP 4 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">PHP crud</a>
    </div>
</nav>





<!-- BODY -->
<body>
    <h1> "Hello World" </h1>

    <div class="container p-4">

        <div class="row flex-column">

            <?php if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-success w-auto alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php session_unset(); } ?>

            <div class="col-md-4">
                

                <div class="card card-body">

                    <form action="save_task.php" method="POST">

                        <div class="form-group">

                            <input type="text" name="title" class="form-control my-3" placeholder="Title" autofocus>

                        </div>

                        <div class="form-group">
                            <textask name="description" rows="2" class="form-control my-3" placeholder="Task Description"></textask>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save task">

                    </form>

                </div>

            </div>

            <div class="col-md-8">
                <table class="table table-bordered">

                    <thread>

                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>

                    </thread>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tasks)) { ?>

                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>

                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fa-solid fa-pen-to-square"></i>

                                </a>

                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>



                        <?php } ?>

                    </tbody>



                </table>
            </div>

        </div>

    </div>


    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>