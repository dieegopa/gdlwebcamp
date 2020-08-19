<?php 
include_once 'includes/templates/header.php';
require 'includes/paypal.php';
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;


?>

<section class='seccion contenedor'>
    <h2>Resumen Registro</h2>
    <?php
    $id_pago = (int) $_GET['id_pago'];
    if($_GET['paymentId'] != ''){
     
    $paymentId = $_GET["paymentId"];   
    
    
    
    //peticion a rest api
    
    $pago = Payment::get($paymentId, $apiContext);
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);
    
    //resultado tiene la informacion de la transaccion
    $resultado = $pago->execute($execution, $apiContext);
    
    $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;
        
    }
    
                
    if($respuesta == 'completed'){
        echo '<div class="resultado correcto">';
        echo "El pago se realizo correctamente";
        echo "<br>";
        echo "el ID es {$paymentId}";
        echo "</div>";
        
        require_once('includes/funciones/bd_conexion.php');
        $stmt = $conexion->prepare("UPDATE registrados SET pagado = ? WHERE ID_Registrado = ?");
        $pagado = 1;
        $stmt->bind_param("ii", $pagado, $id_pago);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
        
        
    } else {
        echo '<div class="resultado error">';
        echo "El pago no se realizo";
        echo "</div>";
    }
          
        ?>

</section>

<?php include_once 'includes/templates/footer.php'?>
