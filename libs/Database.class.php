<?php 
class Database{
    static $DB =  NULL;
    static $server = "localhost";
    static $username = "root";
    static $pass = "dharani";
    public static function GetConnecton(){
        //Take data base info vie a using env.jsonfile
        $conf =  file_get_contents("../env.json");
        //decode the json content
        $conf = json_decode($conf,true);
        //get a data base connecton 
        if(Database::$DB == NULL){
            print_r($conf);
                $conn = mysqli_connect(Database::$server,Database::$username,Database::$pass);
                if($conn->connect_error){
                    die("Connection has been failed :".$conn->connect_error);
                    Database::$DB = NULL;
                }
                else{
                    // if connection is success then $conn assigin to $DB
                    echo "Connection has been Success";
                    Database::$DB = $conn;
                }
        
    
        }
        return Database::$DB;
       }
    
}



//take the connection (database)
$database = new Database;
$database->GetConnecton();