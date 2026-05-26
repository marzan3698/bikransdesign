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
                    
                    $sql = "SELECT * FROM `deposite` WHERE `package` = 3";
                    //$sql = "SELECT * FROM `deposite` where `id`=198";
                    
                    $result = $mysqli->query($sql);
                    
                    while($row=$result->fetch_assoc()){
                        
                    /*  $day30 = 30 * 24 * 60 * 60;
                    echo '<br/>';    
                    $startTime = $row['time'];
                    echo '<br/>';
                    echo 'First : ' . date('Y-m-d',$startTime);
                    echo '<br/>';
                    $total_month = $row['day']*$day30;
                    echo '<br/>';
                    echo 'Day 30 : ' . date('Y-m-d',($startTime+$total_month));
                    $time=time();
                    $startTime = $startTime+$total_month;
                    echo '<hr/>';
                    echo date('Y-m-d',$time);
                    
                    if($time>=$startTime){
                        */
                        
                        echo '<hr/>';
                        
                        echo $row['user_id'];
                        
                    
                    $amount = $row['amount']/100*0.381;
                    
                    $data = array(
                        'time' => $time,
                        'user_id' => $row['user_id'],
                        'cradit' => $amount,
                        'note' => $note,
                        'type' => 9,
                        'his' => 967
                    );
                    
                   
                    $insert = $queryBuilder->table('user_transection')->insert($data);
                    
                    $amount = $row['amount']/100*0.381;
                    
                    $data2 = array(
                        'time' => $time,
                        'user_id' => $row['user_id'],
                        'cradit' => $amount,
                        'note' => $note,
                        'type' => 8,
                        'his' => 959
                    );
                    
                   
                    $insert2 = $queryBuilder->table('user_transection')->insert($data2);
                    
                    if($insert){
                        $mysqli->query("UPDATE `deposite` SET `day` = `day` + '1' WHERE `id` = '{$row['id']}';");
                        
                    $mysqli->query("UPDATE `member` SET `profit3` = `profit3` + '$amount' WHERE `member`.`id` = '{$row['user_id']}';");
                        
                        //give_generation_rhr($row['user_id'], $amount);
                        //echo '<p class="alert alert-success">Balance Add OK;</p>';
                    }
                    
                   
                    //}
                   }
 ?>