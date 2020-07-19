<?php
// SET HEADER
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

//INCLUYENDO LA BASE DE DATOS Y CREACION DE OBJETO DE CONEXION
require 'config.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

//Verificando para obtener el id por parametro
if(isset($_GET['id']))
{
//Si se tiene el id por parametro
    $post_id = filter_var($_GET['id'], FILTER_VALIDATE_INT,[
        'options' => [
        'default' => 'all_posts',
        'min_range' => 1
        ]
    ]);    
}
else{
    $post_id = 'all_posts';
}
    
//HACER CONSULTA SQL
//SI OBTENGO EL ID DE ESTUDIANTE MUESTRO TODA LA INFORMACION
$sql =  is_numeric($post_id) ? "SELECT * FROM `estudiante` WHERE id='$post_id'" : "SELECT * FROM `estudiante`";
$stmt = $conn->prepare($sql);
$stmt->execute();

//VERIFICA SI HAY INFORMACION EN LA BASE DE DATOS
if($stmt->rowCount() >0){
    //CREACION ARREGLO ESTUDIANTE
    $estudiante_array = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $post_data = [
            'id' => $row['id'],
            'identificacion' => $row['identificacion'],
            'nombre' => $row['nombre'],
            'curso' => $row['curso'],
            'nota1' => $row['nota1'],
            'nota2' => $row['nota2'],
            'nota3' => $row['nota3'], 
        ];
        //ASIGNO LOS VALORES EN EL ARREGLO
        array_push($estudiante_array, $post_data);
    }
    //MUESTRO LA INFORMACION EN FORMATO JSON
    echo json_encode($estudiante_array);
}
else{
    // SI NO HAU INFORMACION EN LA BASE DE DATOS
    echo json_encode(['message'=>'Estudiante no encontrado']);
}
?>