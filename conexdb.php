<?php
define("API_SECRET_KEY","36347");
$app = new \Slim\App();

function getConnection($tipoConexion="mysql"){
    //$tipoConexion="mssql";
    //$tipoConexion="mysql";
    $produccion=false;
    if($tipoConexion=="mysql"){
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="";
        $dbname="webapp";
        if($produccion){
            $dbname="ixvenezu_pharmashop";
            $dbuser="ixvenezu_root";
            $dbpass="enclave.21978";
        }
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
        return $dbh;
    }else{
        $dbhost="VAIO";
        $dbuser="sa";
        $dbpass="123456";
        $dbname="K_MLF_2";
        $dbh = new PDO("odbc:Driver={SQL Server Native Client 11.0};Server=$dbhost;Database=$dbname; Uid=$dbuser;Pwd=$dbpass;");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }
}



try {
    $db = getConnection();
} catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
