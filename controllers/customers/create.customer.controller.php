
<?php
require "../../database/database.php";
require "../../models/customer.model.php";

if ($_SERVER['REQUEST_METHOD']==="POST"){
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['phone'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phone'];

    // Connect to the database
     $insertCustomer= createCustomer($firstName, $lastName, $phoneNumber);
     if($insertCustomer){
        header('location: /customers');
     }
    
}

}

