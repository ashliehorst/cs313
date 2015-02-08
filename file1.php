<?php
function databaseConnection(){
        $server = '127.4.54.130';
        $username = 'ashliehorst';
        $passwd = 'Soccermom1';
        $database = 'hobbyfun';
        $dsn = "mysql:host=$server; dbname=$database";
        try{
            $dataConn = new PDO($dsn, $username, $passwd); //creates a PDO Object
        } catch (PDOException $exc) {
                echo "<p>An error occurred while connecting to the database</p>";
        }
        
        if(is_object($dataConn)){
            return $dataConn;
        }
        else{
            return FALSE;
        }
}
function getActivities(){
$conn = databaseConnection();
    
    try{
        $sql = 'SELECT * FROM activity';
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
            
    } catch (PDOException $ex) {
        echo 'getScriptures error';
    }
        if(is_array($data)){
            return $data;
        }
        else{
            return FALSE;
        }
}
function getSpecificActivity($searchVariable){
$conn = databaseConnection();
    
    try{

        $sql = 'SELECT * FROM activity WHERE hobbies LIKE :hobbies';
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', '%' . $searchVariable . '%', PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
            
    } catch (PDOException $ex) {
        echo 'Error';
    }
        if(is_array($data)){
            return $data;
        }
        else{
            return FALSE;
        }
}
?>
