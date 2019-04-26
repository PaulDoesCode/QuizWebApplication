<!DOCTYPE html>

<html lang="en">

<!-- This is the page admin users use to remove questions from the system -->
<!-- Head section -->
<head>
    <meta charset="UTF-8">
    <!-- Title -->
    <title>FDM Quizzes</title>
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Stylesheets and scripts used -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="DeleteQuestion.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
<!-- Navbar with logo -->
<nav class="navbar navbar-dark bg-dark navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- FDM logo with PHP to ensure the GIF plays whenever the page is reloaded -->
            <a class="navbar-brand">
                <img alt="FDM Logo" id="fdmlogo" src="fdmlogo.gif?<?php echo time();?>">
            </a>
        </div>
    </div>
</nav>

<div class="jumbotron jumbotron-fluid">
    <div class="usersection">
            <span id="usersectionheading">
                <h2>
                    Delete Question
                </h2>
            </span>
        <span id="usersectionicon">
                <i class="fas fa-user-cog"></i>
            </span>
        <form action="thing2.php" method = "post">
            <label for="Qustion" autocomplete="off"><b>Question</b></label>

            <?php


            $host = "localhost" ;
            $username = "root" ;
            $pass = "" ;
            $database = "ip2";
            $dsn = "mysql:$host; dbname=$database" ;


            $conn = new PDO($dsn, $username, $pass);





            $query = "select * from ip2.question";



            try{
                $data = $conn->prepare($query);    // Prepare query for execution
                $data->execute();// Execute (run) the query

                $qs = $data->fetchAll();


            } catch(Exception  $ex) {echo $ex ; }
            ?>
            <select name = "question">
                <?php

                foreach($qs as $q) : ?>

                    <option><?php echo $q["question"];?></option>

                <?php endforeach ?>



            </select>

            <br>
            <br>
            <button type="submit" name = "submit">Delete Question</button>
        </form>
    </div>
    <form action="Qman.php" method="post">
        <input class="previousbutton" type="submit" value="Previous Page" />
    </form>
    <form action="CategoriesLanding.php" method="post">
        <input class="returnbutton" type="submit" value="Return to Home Page" />
    </form>
</div>

</body>

</html>



