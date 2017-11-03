<?php 
try{
    $pdo = new PDO("mysql:host=localhost;dbname=projectbig", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt search query execution
try{
    if(isset($_REQUEST['term'])){
        $string=$_REQUEST['term'];
        // create prepared statement

        $sql = "SELECT DISTINCT UserName ,Title   FROM post WHERE UserName LIKE '%$string%' or Title Like '%$string%' limit 0,5" ;
        $stmt = $pdo->query($sql);
       
      
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                $cout=strpos($row['UserName'],$string);
                if($cout==0){
                   
                    echo "<span class='hoverSpanSmartSearch'>"  .$row['Title'] . "</span>";
                }
                else{
                  
                echo "<span class='hoverSpanSmartSearch'>"  .$row['UserName'] . "</span>";
                }
            }
        } else{
   
            echo "<span class='hoverSpanSmartSearch'>No matches found</span>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo); ?>