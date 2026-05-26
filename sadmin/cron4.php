<?php
    date_default_timezone_set('America/Los_Angeles');
    
    define('HOST','localhost');
    define('DB_USER','softdb_4a');
    define('DB_PASS','softdb_4a');
    define('DB_NAME','softdb_4a');
    define('CURRENCY', '$');
    define('AP',1);
    
    $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
    $mysqli -> set_charset("utf8mb4");
    
    require 'vendor/autoload.php';
    use Pixie\Connection;
    use Pixie\QueryBuilder\QueryBuilderHandler;
    $config = [
        'driver'    => 'mysql', // Db driver
        'host'      => 'localhost',
        'database'  => 'softdb_4a',
        'username'  => 'softdb_4a',
        'password'  => 'softdb_4a',
        'charset'   => 'utf8', // Optional
        'collation' => 'utf8_unicode_ci', // Optional
        'prefix'    => '', // Table prefix, optional
    ];
    
    require_once('function.php');
    
    // new Connection('mysql', $config);
    new \Pixie\Connection('mysql', $config, 'QB');
    $queryBuilder = new QueryBuilderHandler();
    

                    $time = time();
                    $amount = 0.90;
                    $note = 's1';
                    $club = 1;
                    
                   $sql = "SELECT * FROM `member` WHERE `point` >= 1";
                    //$sql = "SELECT * FROM `deposite` where `id`=198";
                    
                    $result = $mysqli->query($sql);
                    
                    while($row=$result->fetch_assoc()){
                        
                    echo '<hr/>';
                        
                    echo $row['id'];
                        
                    $amount1 = $row['point5'];
                    
                    $amount = $amount1/100*10;
                    
                    $data = array(
                        'time' => $time,
                        'user_id' => $row['id'],
                        'cradit' => $amount,
                        'note' => $note,
                        'type' => 33,
                        'his' => 65
                    );
                    
                   
                    $insert = $queryBuilder->table('user_transection')->insert($data);
                    
                
                    if($insert){
                       // $mysqli->query("UPDATE `deposite` SET `day` = `day` + '1' WHERE `id` = '{$row['id']}';");
                        
                       $mysqli->query("UPDATE `member` SET `profit4` = `profit4` + '$amount' WHERE `member`.`id` = '{$row['id']}';");
                        
                      
                       
                        //echo '<p class="alert alert-success">Balance Add OK;</p>';
                    }
                    
                   
                    //}
                   }
 ?>