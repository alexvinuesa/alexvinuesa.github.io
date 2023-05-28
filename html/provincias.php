<?php
header("Content-Type: application/xml");

$comunidad = trim($_POST["comunidad"]);

$provincias = array();

// Lógica para obtener las provincias de la comunidad seleccionada
if ($comunidad == "01") {
    $provincias["00"] = "Seleccionar";
    $provincias["01"] = "Almería";
    $provincias["02"] = "Cádiz";
    $provincias["03"] = "Córdoba";
    $provincias["04"] = "Granada";
    $provincias["05"] = "Huelva";
    $provincias["06"] = "Jaén";
    $provincias["07"] = "Málaga";
    $provincias["08"] = "Sevilla";
} elseif ($comunidad == "02") {
    $provincias["00"] = "Seleccionar";
    $provincias["09"] = "Huesca";
    $provincias["10"] = "Teruel";
    $provincias["11"] = "Zaragoza";
} elseif ($comunidad == "03") {
    $provincias["00"] = "Seleccionar";
    $provincias["12"] = "Asturias";
} elseif ($comunidad == "04") {
    $provincias["00"] = "Seleccionar";
    $provincias["13"] = "Balears (Islas)";
} elseif ($comunidad == "05") {
    $provincias["00"] = "Seleccionar";
    $provincias["14"] = "Las Palmas";
    $provincias["15"] = "Santa Cruz de Tenerife";
} elseif ($comunidad == "06") {
    $provincias["00"] = "Seleccionar";
    $provincias["16"] = "Cantabria";
} elseif ($comunidad == "07") {
    $provincias["00"] = "Seleccionar";
    $provincias["17"] = "Albacete";
    $provincias["18"] = "Ciudad Real";
    $provincias["19"] = "Cuenca";
    $provincias["20"] = "Guadalajara";
    $provincias["21"] = "Toledo";
} elseif ($comunidad == "08") {
    $provincias["00"] = "Seleccionar";
    $provincias["22"] = "Ávila";
    $provincias["23"] = "Burgos";
    $provincias["24"] = "León";
    $provincias["25"] = "Palencia";
    $provincias["26"] = "Salamanca";
    $provincias["27"] = "Segovia";
    $provincias["28"] = "Soria";
    $provincias["29"] = "Valladolid";
    $provincias["30"] = "Zamora";
} elseif ($comunidad == "09") {
    $provincias["00"] = "Seleccionar";
    $provincias["31"] = "Barcelona";
    $provincias["32"] = "Girona";
    $provincias["33"] = "Lleida";
    $provincias["34"] = "Tarragona";
} elseif ($comunidad == "10") {
    $provincias["00"] = "Seleccionar";
    $provincias["35"] = "Cáceres";
    $provincias["36"] = "Badajoz";
    $provincias["37"] = "Leganés";
} elseif ($comunidad == "11") {
    $provincias["00"] = "Seleccionar";
    $provincias["38"] = "Coruña";
    $provincias["39"] = "Lugo";
    $provincias["40"] = "Ourense";
    $provincias["41"] = "Pontevedra";
} elseif ($comunidad == "12") {
    $provincias["00"] = "Seleccionar";
    $provincias["42"] = "Madrid";
} elseif ($comunidad == "13") {
    $provincias["00"] = "Seleccionar";
    $provincias["43"] = "Murcia";
} elseif ($comunidad == "14") {
    $provincias["00"] = "Seleccionar";
    $provincias["44"] = "Navarra";
} elseif ($comunidad == "15") {
    $provincias["00"] = "Seleccionar";
    $provincias["45"] = "Guipúzcoa/Gipuzkoa";
    $provincias["46"] = "Vizcaya/Bizkaia";
    $provincias["47"] = "Victoria-Gassteiz/Alava";
} elseif ($comunidad == "16") {
    $provincias["00"] = "Seleccionar";
    $provincias["48"] = "Rioja (La)";
} elseif ($comunidad == "17") {
    $provincias["00"] = "Seleccionar";
    $provincias["49"] = "Ceuta";
} elseif ($comunidad == "18") {
    $provincias["00"] = "Seleccionar";
    $provincias["50"] = "Melilla";
}elseif ($comunidad == "19") {
    $provincias["00"] = "Seleccionar";  
    $provincias["51"] = "Alicante";
    $provincias["52"] = "Castellón";
    $provincias["53"] = "Valencia";
}

$elementos_xml = array();
foreach ($provincias as $codigo => $nombre) {
  $elementos_xml[] = "<provincia>\n<codigo>$codigo</codigo>\n<nombre>".$nombre."</nombre>\n</provincia>";
}

echo "<provincias>\n".implode("\n", $elementos_xml)."\n</provincias>";
?>