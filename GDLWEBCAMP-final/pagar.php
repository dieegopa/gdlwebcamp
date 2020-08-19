<?php

if ( !isset( $_POST['submit'] )) {
    exit( 'Hubo un error' );
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'includes/paypal.php';

?>

<?php
if ( isset( $_POST['submit'] ) ) {
    date_default_timezone_set('America/Bogota');
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date( 'Y-m-d H:i:s' );
    //pedido
    $boletos = $_POST['boletos'];
    $numeroBoletos = $boletos;
    
    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $precioCamisas = $_POST['pedido_extra']['camisas']['precio'];
    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
    $precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];
    
    $pedidoExtra = $_POST['pedido_extra'];
    include_once 'includes/funciones/funciones.php';
    
    $pedido = productos_json( $boletos, $camisas, $etiquetas );
    //eventos
    $eventos = $_POST['registro'];
    $registro = eventos_json( $eventos );

    try {
        require_once( 'includes/funciones/bd_conexion.php' );
        $stmt = $conexion->prepare( 'INSERT INTO `registrados` (nombre_registrado,apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados , regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)' );
        $stmt->bind_param( 'ssssssis', $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total );
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        
        $stmt->close();
        $conexion->close();
        //header('Location: pagar.php?exitoso=1');
    } catch ( Exception $e ) {
        echo $e->getMessage();
    }
}

?>

<?php
$compra = new Payer();
$compra->setPaymentMethod( 'paypal' );
    
$i=0;
$arreglo_pedido = array();
foreach($numeroBoletos as $key => $value){
    if((int)$value['cantidad'] > 0){
        
        ${"articulo$i"} = new Item();
        ${"articulo$i"}->setName( 'Pase: ' . $key )
        ->setCurrency( 'USD' )
        ->setQuantity( (int) $value['cantidad'] )
        ->setPrice( (int) $value['precio'] );
        
        $arreglo_pedido[] = ${"articulo$i"};
        $i++;
    }
}

foreach($pedidoExtra as $key => $value){
    if((int)$value['cantidad'] > 0){
        
        if($key == 'camisas'){
            $precio = (double) $value['precio']*.93;
        } else {
            $precio = (int) $value['precio'];
        }
        
        ${"articulo$i"} = new Item();
        ${"articulo$i"}->setName( 'Extras: ' . $key )
        ->setCurrency( 'USD' )
        ->setQuantity( (int) $value['cantidad'] )
        ->setPrice( $precio);
        
        $arreglo_pedido[] = ${"articulo$i"};
        $i++;
    }
}


$listaArticulos = new ItemList();
$listaArticulos->setItems( $arreglo_pedido );


$cantidad = new Amount();
$cantidad->setCurrency( 'USD' )
->setTotal( $total );

$transaccion = new Transaction();
$transaccion->setAmount( $cantidad )
->setItemList( $listaArticulos )
->setDescription( 'Pago GDLWEBCAMP' )
->setInvoiceNumber( $id_registro );



$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl( "https://gdlwebcampdiegopadilla.herokuapp.com/pago_finalizado.php?id_pago={$id_registro}" )
->setCancelUrl( "https://gdlwebcampdiegopadilla.herokuapp.com/pago_finalizado.php?id_pago={$id_registro}" );


$pago = new Payment();
$pago->setIntent( 'sale' )
->setPayer( $compra )
->setRedirectUrls( $redireccionar )
->setTransactions( array( $transaccion ) );

try {
    $pago->create($apiContext);
    $aprobado = $pago->getApprovalLink();

} catch( PayPal\Exception\PayPalConnectionException $pce ) {
    echo '<pre>';
    print_r( json_decode( $pce->getData() ) );
    echo '</pre>';
}


header("Location: {$aprobado}");



?>
