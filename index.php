<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Basics</title>
</head>
<body>
    <?php

        //declare variables
        $x=5; //gloabal var
        echo "Gloabal var X: $x";

        $y=10;
        $z=15.5;


        /*basic function with for loop demonstrating the usage of static 
        local variables.*/
        function test(){

            static $y=10;
            $z=15.5;

            echo("<br> run for loop Y=$y");
            echo("<br> local var z=$z");
            for ($i = 0; $i < 2; $i++){
                echo "<br>multiplied 2".$y*2.;
            }
        }
        test(); //calls function
        test();

        //Objects can be declared like so:
        class myObject {
            //list of variables of the class
            public $property1;
            public $property2;
            public $property3;
    
            //constructor to build the class
            public function __construct($property1, $property2, $property3){
                $this->property1 = $property1;
                $this->property2 = $property2;
                $this->property3 = $property3;
            }
    
            //class function: this will return the properties of my class
            public function returnProperties_String(){
                return $this->property1 ." | ".$this->property2;
            }
        }
        
        //initialize an instance of myObject
        $A = "val1";
        $B = "val2";
        $C = "val3";

        $object2Array = [$A, $B, $C];
        $newClass = new myObject($object2Array[0], $object2Array[1], $object2Array[2]);
        echo "<br><br> newClass contains: ".$newClass ->returnProperties_String();

        define("A", 10.0);
        define("B", 2.0);
        define("C", 3.0);
        
        echo"<br><br> these numbers are constants and will not chnage:".A." ,".B.", ".C."<br><br>";

        //Operators within PHP are defined as +, -, * /, %(remainder), and **(power of):
        function math() {
            global $x, $y, $z;
          
            // Arithmetic operations with variables
            $sum_v = $x + $y + $z;
            $diff_v = $x - $y - $z;
            $prod_v = $x * $y * $z;
            $quot_v = $x / $y / $z;
          
            // Arithmetic operations with constants
            $sum_c = A + B + C;
            $diff_c = A - B - C;
            $prod_c = A * B * C;
            $quot_c = A / B / C;
          
            // Comparison of results
            $comp_sum = $sum_v <=> $sum_c;
            $comp_diff = $diff_v <=> $diff_c;
            $comp_prod = $prod_v <=> $prod_c;
            $comp_quot = $quot_v <=> $quot_c;
          
            // Display results
            echo "Arithmetic operations with variables:<br>";
            echo "Sum: $sum_v | ";
            echo "Difference: $diff_v | ";
            echo "Product: $prod_v | ";
            echo "Quotient: $quot_v |<br><br>";
          
            echo "Arithmetic operations with constants: <br>";
            echo "Sum: $sum_c | ";
            echo "Difference: $diff_c | ";
            echo "Product: $prod_c | ";
            echo "Quotient: $quot_c |<br><br>";
          
            echo "Comparison of results:<br>";
            echo "Sum: $comp_sum | ";
            echo "Difference: $comp_diff | ";
            echo "Product: $comp_prod | ";
            echo "Quotient: $comp_quot | ";
        }
        math();


        function conditionalOperation($x, $y, $z) {            
            $result = 0.0;

            $float_a = floatval(A);
            $float_b = floatval(B);
            $float_c = floatval(C);
          
            switch (true) {
              case ($x > $float_a && $y > $float_b && $z > C):
                $result = $x ** $y ** $z;
                break;
              case ($x <= $float_a || $y <= $float_b || $z <= $float_c):
                $result = intVal($x) % intVal($y) % intVal($z);
                break;
              default:
                // Do nothing
            }
            echo "Conditional Operation Result: " . $result . "<br><br>";
        }
          
    // Call the function with the variables as arguments
    conditionalOperation($x, $y, $z);

    // Function to display the alphabet
    $alphabet_numbers = array();
    $letter = 'A';
    for ($i = 1; $i <= 26; $i++) {
      $alphabet_numbers[$i] = $letter;
      ++$letter;
    }

    function displayArray($reverse, $array) {
        if ($reverse === false){
            asort($array);
        } else {
            arsort($array);
        }
        // Loop through the array and get the index and value
        foreach ($array as $key => $value) {
            echo "$value, ";
        }
    }
    displayArray(false, $alphabet_numbers);
    echo "<br><br>";
    displayArray(true, $alphabet_numbers);
    ?>

    <!-- FROM PHP STUFF -->
    <?php
    $miss_name = "";
    $name = "";
    $email = "";
    $miss_email = "";
    $email = "";
    $miss_email = "";
    $website = "";
    $miss_website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //name field varify
        if (empty($_POST["name"])) {
            $miss_name = "Name is required";
        } else {
            $name = verify_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $miss_name = "Only letters and white space allowed";
            }
        }
        // email field verify
        if (empty($_POST["email"])) {
            $miss_email = "Email is required";
        } else {
            $email = verify_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $miss_email = "Invalid email format";
            }
        }
        // website field verify
        if (empty($_POST["website"])){
            $miss_website = "Website required";
        } else {
            $website = verify_input($_POST["website"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $miss_website = "Invalid URL";
            }
        }

    }

    function verify_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <!-- HTML stuff -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input placeholder="name" type="text" name="name">
        <span class="error">* <?php echo $miss_name;?></span>
        <br>
        <input placeholder="email" type="text" name="email">
        <span class="error">* <?php echo $miss_email;?></span>
        <br>
        <input placeholder="website" type="text" name="website">
        <span class="error">* <?php echo $miss_website;?></span>    

    <br>
    <button type="submit">Submit</button>
    </form>
    
</body>
</html>