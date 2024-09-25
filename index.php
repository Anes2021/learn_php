<?php
    // //print
    // echo "Hi ,my name is Anes";

    // //Variables
    // $name = "Anes";
    // $age = 19; 

    // echo "hi my name is $name";
    // echo "i'm $age years old";

    // echo "hi my name is" . $age;

    // //if(){}else{}
    // if($age = 20){
    //     echo "Anes now is" . $age . "years old !";
    // }elseif($age = 19) {
    //     echo "Anes is now" . $age ."years old !";
    // }

    // //for Loop

    // for($i = 2005; $i <= 2024; $i ++){
    //     echo $i;
    // }

    // // Functions

    // function printFunction($name){
    //     echo "Hi my name is" . $name;
    // }
    // printFunction("anes");
    // printFunction("bob");

    // //! we can't use Globals variables in functions unless we use $GLOBALS["varName"]  and vice versa
    
    // function printFunction2(){
    //     echo "i'm" . $GLOBALS["age"] . "years old";
    // }
    

    // //arrays
    // //TODO 'this is INDEXD array means ARRAY in Dart'
    // $listOfArrays = array ("Anes", "younes", "rahma", 50, 90);
    // echo $listOfArrays[0];

    // $listOfArrays[0] = "AnesZine";
    // $listOfArrays[4] = "Pharmacie";
    
    // //TODO 'this is ASSOC array means MAP in Dart'

    // $listOfArrays2 = array("name" => "Anes", "age" => 18);

    // foreach ($listOfArrays2 as $key => $value) {
    //     echo $key . "=>" . $value;
    // } 
    // // GET and POST Request
    // $name = $_GET["name"];
    // $age = $_GET["age"];
    // $status = $_GET["status"];

    // $name = $_POST["name"];
    // print_r($_POST);

    include 'connect.php';

    $stml = $con->prepare("SELECT * FROM items where itemName = 'laptop'");
    $stml->execute();
    $item = $stml -> fetch(PDO :: FETCH_ASSOC);

    echo "<pre>";   
    print_r($item);
    echo "</pre>";
?>
