<?php

ini_set('max_execution_time', 900); //300 seconds 

if (isset($_POST)) {
    $host = $_POST["host"];
    $dbuser = $_POST["dbuser"];
    $dbpassword = $_POST["dbpassword"];
    $dbname = $_POST["dbname"];

    /*$first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];*/
    $email = $_POST["email"];
    $login_password = $_POST["password"] ? $_POST["password"] : "";


    //check required fields
    if (!($host && $dbuser && $dbname && $email && $login_password)) {
        echo json_encode(array("success" => false, "message" => "Please input all fields."));
        exit();
    }


    //check for valid email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo json_encode(array("success" => false, "message" => "Please input a valid email."));
        exit();
    }


    //check for valid database connection
    $mysqli = @new mysqli($host, $dbuser, $dbpassword, $dbname);

    if (mysqli_connect_errno()) {
        echo json_encode(array("success" => false, "message" => $mysqli->connect_error));
        exit();
    }


    //all input seems to be ok. check required fiels
    if (!is_file('database.sql')) {
        echo json_encode(array("success" => false, "message" => "The database.sql file could not found in install folder!"));
        exit();
    }





    /*
     * check the db config file
     * if db already configured, we'll assume that the installation has completed
     */


    $db_file_path = "../application/config/database.php";
    $db_file = file_get_contents($db_file_path);
    $is_installed = strpos($db_file, "HOSTNAME");
    if (!$is_installed) {
        echo json_encode(array("success" => false, "message" => "Seems this app is already installed! You can't reinstall it again."));
        exit();
    }


    //start installation

    $sql = file_get_contents("database.sql");


    //set admin information to database
    $now = date("Y-m-d H:i:s");

    /*$sql = str_replace('admin_fname', $first_name, $sql);
    $sql = str_replace('admin_lname', $last_name, $sql);*/
    $sql = str_replace('admin_email', $email, $sql);
    $sql = str_replace('admin_password', password_hash($login_password, PASSWORD_DEFAULT), $sql);
    //$sql = str_replace('admin_create_date', $now, $sql);

    //create tables in datbase 

    $mysqli->multi_query($sql);
    do {
        
    } while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli));


    $mysqli->close();
    // database created
    // set the database config file

    $db_file = str_replace('{HOSTNAME}', $host, $db_file);
    $db_file = str_replace('{USERNAME}', $dbuser, $db_file);
    $db_file = str_replace('{PASSWORD}', $dbpassword, $db_file);
    $db_file = str_replace('{DATABASE}', $dbname, $db_file);

    file_put_contents($db_file_path, $db_file);


    // set random enter_encryption_key

    $config_file_path = "../application/config/config.php";
    $encryption_key = substr(md5(rand()), 0, 15);
    $config_file = file_get_contents($config_file_path);
    $config_file = str_replace('enter_encryption_key', $encryption_key, $config_file);

    file_put_contents($config_file_path, $config_file);


    // set the environment = production

    $index_file_path = "../index.php";

    $index_file = file_get_contents($index_file_path);
    $index_file = preg_replace('/pre_installation/', 'production', $index_file, 1); //replace the first occurence of 'pre_installation'

    file_put_contents($index_file_path, $index_file);


    echo json_encode(array("success" => true, "message" => "Installation successfull."));
    exit();
}

/*function verify_rise_purchase_code($code) {
    return 'verified';
    
}*/