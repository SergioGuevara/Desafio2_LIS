<?php
include_once "vendor/autoload.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start(); //ob_start da la pauta desde donde se capturar la información que se almacenara en el pdf

$productos=[ //datos de entrada
    ['codigo'=>'PROD00001',
    'nombre'=>'Sudadera',
    'descripcion'=>'Una prenda de ropa',
    'categoria'=>'Textil',
    'imagen'=>'PROD00001.jpg',
    'precio'=>20
    ],
    ['codigo'=>'PROD00002',
    'nombre'=>'Blusa Tipo Polo',
    'descripcion'=>'Una prenda de ropa',
    'categoria'=>'Promocional',
    'imagen'=>'PROD00002.png',
    'precio'=>10
    ]
];

include "plantilla.php";

$html = ob_get_clean(); //ob_get_clean captura toda la información y lo amacenamos en una variable
$dompdf->loadHtml($html); //loadHtml carga la información contenida en la variable $html
$rutaGuardado = "pdfs/"; //se define una ruta en donde se gurdara el pdf
$nombreArchivo="documento.pdf"; // el nombre del archivo 
$dompdf->render(); // renderiza el archivo
header("Content-type: application/pdf"); // define el tipo
header("Content-Disposition: inline; filename=".$nombreArchivo."");// define el nombre y la disposicion en la que se vera el documento en el navegador
echo $dompdf->output(); //crea el archivo
$outPut=$dompdf->output();
file_put_contents($rutaGuardado.$nombreArchivo,$outPut); // funcion que mueve el archivo a la ruta definida 


//Enviar correo
//Llamando a los archivos necesarios para PhpMailer
require '../correo/Phpmailer/Exception.php';
require '../correo/Phpmailer/PHPMailer.php';
require '../correo/Phpmailer/SMTP.php';

//Usando clases de los archivos Phpmailer y Exception
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$archivo = $rutaGuardado.$nombreArchivo;
$nombre='La cotización ha sido recibida';
try {   
    $mail = new PHPMailer(true);
    $mail->IsSMTP(); // Using SMTP.
    $mail->CharSet = 'utf-8';
    $mail->SMTPDebug = 0; // Enables SMTP debug information - SHOULD NOT be active on production servers!
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = 'true'; // Enables SMTP authentication.
    $mail->Host = "smtp.gmail.com"; // SMTP server host.
    $mail->Port = 587; // Setting the SMTP port for the GMAIL server.

    //Usuario con contraseña autorizada por gmail
    $mail->Username = "pepeshoes01lis@gmail.com"; // SMTP account username (GMail email address).
    $mail->Password = 'ztxxaurpsyvgxrco'; // Contraseña creada a partir de google, para permisos de aplicacion
    
    //Envio de mensaje
    $mail->SetFrom('pepeshoes01lis@gmail.com', 'me'); // De quien - match the GMail email.
    $mail->AddAddress('andersonmelendez73@gmail.com', 'Someone Else'); // Para email / name.

    //Mensaje
    $mail->Subject = 'ESTO SI FUNCIONA';
    $mail->Body = 'Nombre' .$nombre;
    //mensaje con archivo, direccion del archivo
    $mail->addAttachment($archivo); 
    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
    
    //Para enviar
    $mail->send();
echo 'Si funciona';
} catch (Exception $e) {
    echo "La cotización no ha sido enviada: {$mail->ErrorInfo}";
}
