<?php

// Fetch users
$users_url = "https://jsonplaceholder.typicode.com/users";
$users_data = file_get_contents($users_url);
$users = json_decode($users_data, true);

// Fetch posts
$posts_url = "https://jsonplaceholder.typicode.com/posts";
$posts_data = file_get_contents($posts_url);
$posts = json_decode($posts_data, true);

// Fetch todos
$todos_url = "https://jsonplaceholder.typicode.com/todos";
$todos_data = file_get_contents($todos_url);
$todos = json_decode($todos_data, true);

// Combine the arrays


$finalArray = [];

foreach ($users as $user) {
    $userData = [
        "name" => $user["name"],
        "username" => $user["username"],
        "city" => $user["address"]["city"],
        "email" => $user["email"],
        "company" => $user["company"]["name"]
    ];

    $postData = []; 
    foreach ($posts as $post) {
        if ($post["userId"] == $user["id"]) {
            $postData[] = [
                "title" => $post["title"],
                "body" => $post["body"]
            ];
        }
    }

    $todoData = [];
    foreach ($todos as $todo) {
        if ($todo["userId"] == $user["id"]) {
            $todoData[] = [
                "title" => $todo["title"],
                "completed" => $todo["completed"]
            ];
        }
    }
    $finalArray[] = [
        "info" => $userData,
        "posts" => $postData,
        "todos" => $todoData
    ];

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/0e37b883f4.js" crossorigin="anonymous"></script>
</head>

<body>


<?php foreach ($finalArray as $data) { ?>

<div class="container-fluid m-0 px-3 py-5">
    <div class="row">
        <div class="col-3 border border-dark py-3">
          <h2><?php echo $data["info"]["name"]; ?></h2>
                    <h5>@<?php echo $data["info"]["username"]; ?></h5>
            <ul class="list-unstyled">
                <li>Email: <?php echo $data["info"]["email"]; ?></li>
                <li>City: <?php echo $data["info"]["city"]; ?></li>
                <li>Company: <?php echo $data["info"]["company"]; ?></li>
            </ul>
        </div>
        <div class="col-6 border border-dark py-3">
                    <h3>Posts</h3>
                    <?php foreach ($data["posts"] as $post) { ?>
                        <div class="box border-bottom">
                            <ul class="list-unstyled">
                                <li>Title: <?php echo $post["title"]; ?></li>
                                <li>Body: <?php echo $post["body"]; ?></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-3 text-right border border-dark py-3">
                    <h3>Todos</h3>
                    <ul class="list-unstyled">
                        <?php foreach ($data["todos"] as $todo) { ?>
                            <li class="border-bottom py-2 text-<?php echo $todo["completed"] ? 'success' : 'danger'; ?>"><?php echo $todo["title"]; ?></li>
                        <?php } ?>
                    </ul>
                </div>
    </div>
</div>

<?php } ?>


    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>