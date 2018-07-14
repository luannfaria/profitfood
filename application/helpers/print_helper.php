<?php
/* Change to the correct path if you copy this example! */


require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;



/* Most printers are open on port 9100, so you just need to know the IP
 * address of your receipt printer, and then fsockopen() it on that port.
 */

 function imprimiitemtable($id){

   $CI = get_instance();

   $CI->load->model('Vendas_model');
   $impressao = $CI->Vendas_model->imprimiproduto($id);



try {
  $connector = new CupsPrintConnector("PDF");


      /* Print a "Hello world" receipt" */
      $printer = new Printer($connector);


date_default_timezone_set('America/Sao_Paulo');


$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

      $printer -> setEmphasis(true);

//$printer -> text($teste."\n");
//$printer->text($pedido['data']);
$printer -> setEmphasis(false);

$printer -> feed(4);
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer->text("PRODUTOS\n");
$printer->text("__________________");
$printer -> feed(2);
      $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
      $printer -> setJustification(Printer::JUSTIFY_LEFT);

$impriss=NULL;
   foreach ($impressao as $impress) {
        $impriss[] = [
         'nome_produto' => $impress['nome_produto'],
            'qttdproduto' => $impress['qtdd']

        ];



        }

        foreach($impriss as $its){
          $item = $its['nome_produto'];
          $qtdd = $its['qtddproduto'];
            $printer -> text($item);
            $printer -> text($qtdd);

        }




              //  $printer -> setJustification(Printer::JUSTIFY_LEFT);
    //  $printer -> text($p->."\n");
   //  $venda = element('venda',$imprimiritens);


$printer -> feed(2);
      $printer -> cut();

      /* Close printer */
      $printer -> close();
  } catch (Exception $e) {
      echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
  }



 }

 function teste($id){

   $CI = get_instance();
   $CI->load->model('Vendas_model');
   $CI->load->model('Configuracoes_model');
     $empresa = $CI->Configuracoes_model->get_empresa();
$pedido = $CI->Vendas_model->getpedidoimprimir($id);
  //   $pedido = $CI->Vendas_model->getpedido($id);
 		$itenspedido = $CI->Vendas_model->getitenspedido($id);
    $mesa =  $CI->Vendas_model->getmesa($id);
$nome = $empresa['nomefantasia'];
$impressora = $empresa['impcaixa'];
$nmesa =$mesa;


$imprimirpedido=NULL;
 foreach($pedido as $p){
   $imprimirpedido[] = [
     'mesa'=> $p['numeromesa'],
     'data' => $p['data']
   ];
 }
try {

  $connector = null;
    $connector = new WindowsPrintConnector($impressora);

    /* Print a "Hello world" receipt" */
//echo $nome;

    /*CABELHAÇO CONTA*/
    $printer = new Printer($connector);


    foreach($imprimirpedido as $ipd){


      $printer -> setJustification(Printer::JUSTIFY_LEFT);
      $printer -> text("Data: ".$ipd['data']);
          $printer -> feed(2);
          $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
      $printer -> setJustification(Printer::JUSTIFY_CENTER);
      $printer -> text("*** Mesa:".$ipd['mesa']." ***");
      //$printer -> feed(1);
    //   echo $iten['nome_produto'];
    }

$printer -> cut();
$printer -> pulse();
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
 }

 function conta($id){

        $CI = get_instance();

        $CI->load->model('Vendas_model');
        $imprimir = $CI->Vendas_model->getitensimprimir($id);
        $pedido = $CI->Vendas_model->getpedidoimprimir($id);

         $CI->load->model('Configuracoes_model');
            $ipimpressora = $CI->Configuracoes_model->getimprede();

      // $membres = $CI->unite_model->email_membre_model();
//load->model('Vendas_model');
  //$data['pedido']=$CI->Vendas_model->getpedido($idpedido);


   try {
          $connector = new CupsPrintConnector("PDF");


           /* Print a "Hello world" receipt" */
           $printer = new Printer($connector);


 date_default_timezone_set('America/Sao_Paulo');
 //$data = date("d/m/Y\nH:i");
$imprimirpedido=NULL;
 foreach($pedido as $p){
   $imprimirpedido[] = [
     'mesa'=> $p['numeromesa'],
     'data' => $p['data']
   ];
   //$printer -> setJustification(Printer::JUSTIFY_LEFT);
  // $printer -> text("Mesa: ".$p->numeromesa);
  // $printer -> setJustification(Printer::JUSTIFY_RIGHT);
  // $printer -> text("Data: ".$p['data']);
 }

 foreach($imprimirpedido as $ipd){


   $printer -> setJustification(Printer::JUSTIFY_LEFT);
   $printer -> text("Data: ".$ipd['data']);
       $printer -> feed(2);
       $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
   $printer -> setJustification(Printer::JUSTIFY_CENTER);
   $printer -> text("*** Mesa:".$ipd['mesa']." ***");
   //$printer -> feed(1);
//   echo $iten['nome_produto'];
 }


 /* Name of shop */
 $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

           $printer -> setEmphasis(true);

 //$printer -> text($teste."\n");
 //$printer->text($pedido['data']);
 $printer -> setEmphasis(false);

 $printer -> feed(4);
 $printer -> setJustification(Printer::JUSTIFY_CENTER);
 $printer->text("PRODUTOS\n");
 $printer->text("__________________");
 $printer -> feed(2);
           $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
           $printer -> setJustification(Printer::JUSTIFY_LEFT);

$imprimiritens=NULL;
        foreach ($imprimir as $it) {
             $imprimiritens[] = [
              'nome_produto' => $it['nome_produto'],
                 'venda' => $it['nome_produto']

             ];
             }

              foreach($imprimiritens as $iten){
                $printer -> text($iten['nome_produto']);
                $printer -> feed(1);
                echo $iten['nome_produto'];
              }
                   //  $printer -> setJustification(Printer::JUSTIFY_LEFT);
         //  $printer -> text($p->."\n");
        //  $venda = element('venda',$imprimiritens);


 $printer -> feed(2);
           $printer -> cut();

           /* Close printer */
           $printer -> close();
       } catch (Exception $e) {
           echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
       }


 }
function printitem($imprimir,$mesa){
  try {
    $connector = new CupsPrintConnector("PDF");


          /* Print a "Hello world" receipt" */
          $printer = new Printer($connector);

          $printer -> setJustification(Printer::JUSTIFY_CENTER);
date_default_timezone_set('America/Sao_Paulo');
$data = date("d/m/Y\nH:i");


/* Name of shop */
$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

          $printer -> setEmphasis(true);
$printer -> text($mesa."\n");
$printer->text($data);
$printer -> setEmphasis(false);

$printer -> feed(4);
$printer->text("PRODUTOS\n");
$printer->text("__________________");
$printer -> feed(2);
          $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
          $printer -> setJustification(Printer::JUSTIFY_LEFT);
            foreach ($imprimir as $p) {
              // code...


                  //  $printer -> setJustification(Printer::JUSTIFY_LEFT);
        //  $printer -> text($p->."\n");

            $printer -> text($p."\n");
}
$printer -> feed(2);
          $printer -> cut();

          /* Close printer */
          $printer -> close();
      } catch (Exception $e) {
          echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
      }


}
