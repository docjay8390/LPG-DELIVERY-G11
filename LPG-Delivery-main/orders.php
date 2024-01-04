<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container" style="background-color: skyblue;">
        <div class="box form-box" style="background-color: skyblue;">


            

        <?php 

         include("php/config.php");
         if(isset($_POST['submit'])){
            $Fullname = $_POST['Fullname'];
            $Addresss = $_POST['Addresss'];
            $Contact = $_POST['Contact'];
            $Quantity = $_POST['Quantity'];

         //verifying the unique email
         $verify_query = mysqli_query($con,"SELECT Contact FROM orders WHERE Contact='$Contact'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This Number is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
        
         else{

            mysqli_query($con,"INSERT INTO orders (Fullname,Addresss,Contact,Quantity) 
            VALUES('$Fullname','$Addresss','$Contact', '$Quantity')") or die("Error Occured");
            
            echo "<div class='message'>
                      <p>Transaction Complete!</p>

                      
                  </div> <br>";
            echo "<a href='home.php'><button class='btn'>Home</button>";
            
            
         }

         }else{
         
        ?>
            
            
            <!-- <script>
                // Get the quantity value from the form
                var Quantity = document.getElementById("Quantity").value;

                // Make an AJAX request to the server to get the amount for the quantity
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Parse the response from the server as JSON
                    var response = JSON.parse(this.responseText);

                    // Calculate the total amount and display it on the page
                    var amount = response.amount;
                    var total = quantity * amount;
                    document.getElementById("total").innerHTML = total;
                }
                };
                xhr.open("POST", "get_amount.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("quantity=" + quantity);
            </script> -->


            <header>Fill the form for your order/s</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="Fullname">Fullname</label>
                    <input type="text" name="Fullname" id="Username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Addresss">Address</label>
                    <input type="text" name="Addresss" id="email"  required>
                </div>

                <div class="field input">
                    <label for="Contact">Contact</label>
                    <input type="number" name="Contact" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Quantity">Quantity</label>
                    <input type="number" name="Quantity" id="age" autocomplete="off" required>
                </div>
                <br>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Place Order" required>
                </div>

                
                <div class="field">
                    <a style="text-align: center;" href="home.php">Cancel</a>
                </div>

            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>