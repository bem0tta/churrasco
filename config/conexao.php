<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
    try{
        $con = new mysqli("localhost", "root", "", "catalogo_series");
        $con -> set_charset("utf8mb4");
        return $con;
    } catch(mysqli_sql_exception $e){
            die("Erro: ".$e->getMessage());
    }