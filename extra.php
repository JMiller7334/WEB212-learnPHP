<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Intro to PHP</h1>
    <P> <?php
    // NOTE: PHP is executed on the server and result is returned to the client side
        $txt = "coding";
        echo "Echo1: I love  $txt. "; //one type of echo that is used
        $txt = "From the server";
        echo "Echo2: This is another echo. ".$txt."!";
    ?> </p>

    <!-- working with variable scopes within PHP -->
    <?php 
        $VAR1 = 3; //declared outside of func: making it global
        $VAR2 = 2;

        function testFunc1() {
            global$VAR1; //import the variable into the func
            echo "<p> func echo: GLOBAL_VAR: $VAR1</p>";

            $var = "Y"; //declared in func indicates local var
            echo "<p?> func ech: LOCAL_VAR: $var</p>";


            //Global variables are stored within an array can be gotten like:
            $GLOBALS["VAR1"] = $GLOBALS["VAR1"] + $GLOBALS["VAR2"];

            //static variables, declared like: -- these will retain the same value but only within the func
            static $alwaysFive = 5;
            
            //print statement is interchangable w/echo statement
            print("constant: $alwaysFive");

        }
        testFunc1();
        echo "<br> globalVar2: $VAR2";


        //DEFINE: declars a variable as constant which will not change: args: para1: valName para2: defined value.
        define("val", "myValue");

        //arrays can declared as so: var_dump(array) statment can be used to return each element, key.
        $myArray = array("index1", "index2", "index3");
        

        //Objects can be declared like so:
        class myObject {

            //list of variables of the class
            public $property1;
            public $property2;

            //constructor to build the class
            public function __construct($property1, $property2){
                $this->property1 = $property1;
                $this->property2 = $property2;
            }

            //class function: this will return the properties of my class
            public function returnProperties_String(){
                return $this->property1 ." | ".$this->property2;
            }
        }

        //initialize an instance of myObject
        $object2Array = ["val1", "val2"];
        $newClass = new myObject($object2Array[0], $object2Array[1]);

        //calling of class function
        echo "<br> newClass contains: ".$newClass ->returnProperties_String();

        //Operators within PHP are defined as +, -, * /, %(remainder), and **(power of):
        $additoon = 5+5;
        echo "<br>addition 5+5= $addition";

        $multiply = 5 * 2;
        echo "multiply 5X2= $multiply";

        $subtract = 5-2;
        echo "subtract5-2=: $subtract";

        $divide = 10/2;
        echo "divide 10/2=$divde";

        $power = 5**2;
        echo "raised to the power: 5^2=$power";


        $conditional = true;

        function checkConditional() {
            GLOBAL $conditional;
            if ($conditional === true){
                print("condition: true");
            } else {
                print("condition: false");
            }
        }

        //switch case statements can be declared as such:
        function checkSwitchCase(){
            $tempVar = 3;
            echo("<br>case statement:");
            switch($tempVar){
                case 1:
                    echo("case1");
                    break;
                case 2:
                    echo("case2");
                    break;
                case 3:
                    echo("case3");
                    break;
                default:
                    echo("case:default");

            }
        }
        checkSwitchCase();


        //basic conditional while loop
        function conditionalWhile(){
            $iteration = 3;
            echo("<br> iterate:");
            while ($iteration > 0 ){
                $iteration = $iteration - 1;
                echo("$iteration,");
            }

            //alternative while loop set up.
            $bool = false;
            do {
                echo("This bool is false");
                $bool = false; //this would run forever so I'm putting this here so it won't.
            } while ($bool === false); //the conditional statement.
        }
        conditionalWhile();

        //for loop (my favorite)
        $poeple = array("Ani", "Emily", "Kana", "Cheyenne");
        for ($i = 0; $i < count($poeple); $i++){
            echo("<br>".$people[$i]."");
        }

        //array built in functions
        sort($people); //alphabetical order also works with numbers
        rsort($people); //samething but in reverse

        //kind of like a dictionary
        $someKeys = array("key1"=>"1", "key2"=>"2", "key2"=>"3");

        //asort will order this by the key value -- arsort does this in reverse
        echo "<br>".asort($someKeys);

        //ksort will order this by the key value -- krsort does this in reverse
        echo "<br>".ksort($someKeys);





        //SUPER GLOBALS: these are always available from anywhere and can be easily accessed

        echo "<br>obtained from global array:".$GLOBALS["people"];//gobal people array is accessed

        echo "<br>otained from server global:".$_SERVER["PHP_SELF"];
    ?>


    <!-- The following code gathers information from the HTML field with the name parameter of
        field_id and assigns it to a variable. GET appends data to URL, POST does not.--> 
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="field_id">
    <br>
    <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['field_id']; //ensure the request received is from the field 'field id'
        
        if (empty($name)) { //if the name defined variable is empty (field_id) is empty
            echo "Name is empty";
        } else { // otherwise
            echo "Hello, " . $name . "!"; 
        }
    }
    ?>



    
</body>
</html>