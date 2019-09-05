<?php
    $viewdata['data'] = array(
        array('ID' => '1', 'Name' => 'n1'),
        array('ID' => '2', 'Name' => 'n2'),
        array('ID' => '3', 'Name' => 'n3'),
    );
    
    header("Content-type: application/json");
    echo (json_encode($viewdata));
?>