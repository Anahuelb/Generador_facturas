<?php
function conecta() {
    $user='root';
    $pass='';
    $host='localhost';
    $dbname='solemne2_bryanperalta';
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return($db);
}