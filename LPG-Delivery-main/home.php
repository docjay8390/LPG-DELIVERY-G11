<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">

    <link rel="stylesheet" href="style/styles.css">
    <title>Home</title>
</head>
<body>
    <div class="nav" style="background-color: #212529; padding: 1rem 2rem;">
        <div class="logo">
            <p><a href="home.php" style="color: red; font-style: italic; font-weight: 700;
            font-size: 3rem;"><span style="color: blue;">LPG</span> Gasul</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM accounts WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $Fullname = $result['Fullname'];
                $Username = $result['Username'];
                $Email = $result['Email'];
                $Destination = $result['Destination'];
                $Contact = $result['Contact'];
                $id = $result['Id'];
            }
            
            echo "<a style='color: white;' href='edit.php?Id=$id'>Change Profile</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Sign Out</button> </a>
        </div>
    </div>

    <div class="about12" style="background-color: #212529; height: 90vh;
            display: flex; align-items: center; justify-content: center;
            padding: 0 2rem;">
        <div>
            <h1 style="font-size: 6rem; color: blue; font-style: italic; text-shadow: 0 0 2px white;">
                LPG <span style="color: red;">TANK</span> DELIVERY
            </h1>
            <p style="font-size: 2.5rem; color: white;">
            ONLINE LPG TANK DELIVERY. NOW YOU CAN BUY 
            LPG TANKS THROUGH ONLINE FOR AS LOW AS ₱899.
            </p>
            <br>
            <a href="orders.php">
                <button class="btn" style="background-color: red; font-size: 2rem; height: 60px; padding: 0 4rem;
                    border: solid 2px blue;">
                    CHECK OUT
                </button>
            </a>
            
        </div>

        <div>
            <img style="transform: rotate(20deg);
            height: 800px; filter: drop-shadow(0 0 50px rgba(255, 255, 255, 0.349)); " src="./img/LPG.png" alt="">
        </div>
    </div>
    
</body>
</html>
