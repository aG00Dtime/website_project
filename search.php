<?php
include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Search</title>
		<link rel="stylesheet" href="styles/styles.css" />
	</head>

<body>

    <div class="website-content-container">

        <div class="navigation-bar">

            <a href="index.html">Home</a>
            <a class="active" href="search.php">Search</a>
            <a href="contact-us.html">Contact Us</a>
            <a href="about-us.html">About Us</a>

            <div class="brand-logo">
					<img src="logo/logo.png" alt="" />
				</div>

        </div>

        <div class="page-content">

            <div class="search-page">


                <form action="search.php" method="POST">

                    <h1>Search</h1>
                    
                    <input type="text" name="search" placeholder="Search for something">
                    <input type="submit" name="submit">

                </form>



                    <div class="php-container">


                    <?php

                    if (empty($_POST['search'])) {
                    /*echo "Search for something.";*/
                    } else  if (isset($_POST['submit'])) {

                    $search = mysqli_real_escape_string($conn, $_POST['search']);
                    $sql = "SELECT * FROM items WHERE name LIKE'%$search%' OR description LIKE '%$search%' OR keywords LIKE '%$search%' OR keywords2 LIKE'%$search%' ";

                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                        
                   /* if ($resultCheck == 0) asdasd*/
                    echo "there are " . $resultCheck . " results!";

                    //an array with the results 

                    if ($resultCheck > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {



                    echo "<div class='search-results'>

                    <h4>Name</h4>

                    <p>" . $row['name'] . "</p>

                    <h4>Description</h4>

                    <p>" . $row['description'] . "</p>

                    <h4>Keywords</h4>

                    <p>" . $row['keywords'] . " </p>

                    <p>" . $row['keywords2'] . " </p>

                    <h4>Shelf Location</h4>

                    <p>" . $row['shelf_location'] . " </p>


                    </div>";
                    }
                    } 
                    }
                    ?>

                </div>

            </div>

        </div>

    </div>
</body>

</html>