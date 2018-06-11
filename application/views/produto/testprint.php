<?php
//Função para tratar o retorno
function getPrinterProperty($key){
    $str = shell_exec('wmic printer get '.$key.' /value');

    $keyname = "$key=";
    $validValues = [];
    $fragments = explode(PHP_EOL,$str);
    foreach($fragments as $fragment){
        if($fragment == ""){
            continue;
        }
        if (preg_match('/('.$keyname.')/i', $fragment)) {
            array_push($validValues,str_replace($keyname,"",$fragment));
        }
    }
    return $validValues;
}
//Esplanação dos commandos:
// wmic /node:SERVER1 printer list status // Lista status das impressoras de um servidor remoto
// wmic printer list status // Lista status das impressoras  do servidor local
// wmic printer get // Obtem todas as propriedades da impressoa
// wmic printer get <propriedade> /value //Lista uma propriedade no formato chave=valor do servidor remoto
// wmic printer get <propriedade> /value //Lista uma propriedade no formato chave=valor do servidor local

//Obtém algumas propriedades, nesse caso vou pegar só algumas
$Name = getPrinterProperty("Name");
$Description =  getPrinterProperty("Description");
$Network = getPrinterProperty("Network");
$Local = getPrinterProperty("Local");
$PortName = getPrinterProperty("PortName");
$Default = getPrinterProperty("Default");
$Comment = getPrinterProperty("Comment");

$Printers = [];?>

<select name="impressoras" class="form-control m-bot15">
  <option value="">Selecione uma impressora</option>
<?php foreach($Name as $i => $n){
  //  $Printers[$i] = (object)[
  echo '<option value="'.$n.'">'.$n.'</option>';
        //"name" => $n,
      //  "description" => $Description[$i],
      //  "Portname" => $PortName[$i],
    //    "isDefault" =>($Default[$i] == "TRUE")? true : false,
    //    "isNetwork" => ($Network[$i] == "TRUE")? true : false,
  //      "isLocal" =>($Local[$i] == "TRUE")? true : false,
    //    "Comment" => $Comment[$i],
  //  ];
}

//var_dump($Printers);
