<?php
echo 'coucou';
foreach ($conn->query($req) as $row) {
    foreach($row as $key2 => $row2){
        echo $row2 . '<br />';
    }
}