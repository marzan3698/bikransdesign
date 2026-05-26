<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);   
    
    session_start();
    define('timeout_duration', 20);
    //echo time();
    date_default_timezone_set('Asia/Dhaka');
    
    define('HOST','localhost');
    define('DB_USER','bikrans_main');
    define('DB_PASS','bikrans_main');
    define('DB_NAME','bikrans_main');
    define('CURRENCY', 'Tk');
    define('AP',1);
    
    $mysqli = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
    $mysqli -> set_charset("utf8mb4");
    
    require 'vendor/autoload.php';
    use Pixie\Connection;
    use Pixie\QueryBuilder\QueryBuilderHandler;
    $config = [
        'driver'    => 'mysql', // Db driver
        'host'      => 'localhost',
        'database'  => 'bikrans_main',
        'username'  => 'bikrans_main',
        'password'  => 'bikrans_main',
        'charset'   => 'utf8', // Optional
        'collation' => 'utf8_unicode_ci', // Optional
        'prefix'    => '', // Table prefix, optional
    ];
    
    // new Connection('mysql', $config);
    new \Pixie\Connection('mysql', $config, 'QB');
    $queryBuilder = new QueryBuilderHandler();

    
    $sql="SELECT * FROM `company_info` WHERE `id` = 1";
    $query=$mysqli->query($sql);
    while($row=$query->fetch_array()){
        define('TITLE',$row['cname']);
        define('EMAIL',$row['cmail']);
        define('PHONE',$row['cphone']);
        define('NOTICE',$row['cnotice']);
    }
    
    define('FAV_ICON','https://soft.monpuron.com/m-logo.png');
    define('LOGO','https://monpuron.com/upload/setting/logo/1763131190Custom01.png');   
    
    $gen = $queryBuilder->table('genaration')->where('id', '1')->first();
     
    define('GEN1',$gen->gen1);
    define('GEN2',$gen->gen2);
    define('GEN3',$gen->gen3);
    define('GEN4',$gen->gen4);
    define('GEN5',$gen->gen5);
    define('GEN6',$gen->gen6);
    define('GEN7',$gen->gen7);
    define('GEN8',$gen->gen8);
    define('GEN9',$gen->gen9);
    define('GEN10',$gen->gen10);
    define('GEN11',$gen->gen11);
    define('GEN12',$gen->gen12);
    define('GEN13',$gen->gen13);
    define('GEN14',$gen->gen14);
    //define('GEN15',$gen->gen115);


    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $current_url = "https://";   
    }
    else {
        $current_url = "http://";   
    }  
    $current_url.= $_SERVER['HTTP_HOST'];
    $current_url.= $_SERVER['REQUEST_URI'];
    $doaminName = 'https://' . $_SERVER['HTTP_HOST'];
    
    // require '../constant.php'; 
    
 ?>
