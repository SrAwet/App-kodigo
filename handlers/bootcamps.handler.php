<?php

require_once('./connection.php');

    function getAllBootcamps(){
        $conn = connectDatabase();
    

    $sql = "SELECT * FROM bootcamps";

    $result = mysqli_query($conn, $sql);

    $bootcamps = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    //NO OLVIDE CERRAR LA CONEXION A LA BASE DE DATOS
    mysqli_close($conn);

    return $bootcamps;
}

function addBootcamp($data){
    $conn = connectDatabase();

    $title = $data['title'];
    $description = $data['description'];
    $start_bootcamp = $data['start_bootcamp'];
    $end_bootcamp = $data['end_bootcamp'];
    $modules = $data['modules'];

    $sql = "INSERT INTO bootcamps
    (title, description, start_bootcamp, end_bootcamp, modules)
    VALUES ('$title','$description','$start_bootcamp','$end_bootcamp','$modules')";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("Error to create bootcamp: ". mysqli_error($conn));
    }

    mysqli_close($conn);

    return $result;
}
?>