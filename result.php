<?php
/**
 * Created by PhpStorm.
 * User: tangdi
 * Date: 8/24/17
 * Time: 5:38 PM
 */

    $searchtype = $_POST['searchtype'];
    $searchterm = trim($_POST['searchterm']);

    if(!$searchterm || !$searchtype){
        echo "please write type or term";
        exit;
    }

    if(!get_magic_quotes_gpc()){
        $searchtype = addslashes($searchtype);
        $searchterm = addslashes($searchterm);
    }

    $db = new mysqli('localhost', "root", "1234", "books");
