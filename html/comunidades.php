<?php
header("Content-Type: application/xml");

$comunidades["00"] = "Seleccionar";
$comunidades["01"] = "Andalucía";
$comunidades["02"] = "Aragón";
$comunidades["03"] = "Asturias";
$comunidades["04"] = "Baleares";
$comunidades["05"] = "Canarias";
$comunidades["06"] = "Cantabria";
$comunidades["07"] = "Castilla-La Mancha";
$comunidades["08"] = "Castilla y León";
$comunidades["09"] = "Cataluña";
$comunidades["19"] = "Comunidad Valenciana";
$comunidades["10"] = "Extremadura";
$comunidades["11"] = "Galicia";
$comunidades["12"] = "Madrid";
$comunidades["13"] = "Murcia";
$comunidades["14"] = "Navarra";
$comunidades["15"] = "País Vasco";
$comunidades["16"] = "La Rioja";
$comunidades["17"] = "Ceuta";
$comunidades["18"] = "Melilla";


foreach($comunidades as $codigo => $nombre) {
  $elementos_xml[] = "<comunidad_autonoma>\n<codigo>$codigo</codigo>\n<nombre>".$nombre."</nombre>\n</comunidad_autonoma>";
}

echo "<comunidades_autonomas>\n".implode("\n", $elementos_xml)."\n</comunidades_autonomas>";
?>
