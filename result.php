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

    $db = new mysqli("", "root", "1234", "books");
    if(mysqli_connect_errno()){
        echo "Error : could not connect to database";
        exit;
    }else{
        echo "mysql connect success";
    }

    $querySQL = "select * from books where ".$searchtype. " like '%".$searchterm."%' ";
    echo "<br/>";var_dump($querySQL);
    $reselt = $db->query($querySQL);
    echo "<br/>";var_dump($reselt);
    $num_result = $reselt->num_rows;

    echo $num_result;

    echo "Number of books found: ".$num_result;

    for($i = 0; $i < $num_result; $i++){
        $row = $reselt->fetch_assoc();
        echo "Title".$i;
        echo htmlspecialchars(stripslashes($row['title'])).'<br/>';
        echo "Author:".stripslashes($row['author']).'<br/>';
        echo "ISBN:".stripslashes($row['isbn']).'<br />';
        echo "Prices:".stripslashes($row['price']).'<br />';
    }

    $reselt->free();
    $db->close();
