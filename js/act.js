function mostrarTabla() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          document.getElementById("tabla").innerHTML = xhr.responseText;
        } else {
          console.log("Hubo un problema al realizar la petición AJAX.");
        }
      }
    };
    xhr.open("GET", "mostrar.php", true);
    xhr.send();
  }
  
  mostrarTabla();
  
  fetch('crear.php')

  .then(response => response.json())
  .then(data => {
    // Construir la tabla
    const table = document.createElement('table');
    const header = table.createTHead();
    const row = header.insertRow();
    row.insertCell().textContent = 'ID';
    row.insertCell().textContent = 'Nombre de la actividad';
    row.insertCell().textContent = 'Descripción';
    row.insertCell().textContent = 'Fecha';
    row.insertCell().textContent = 'Hora';
    row.insertCell().textContent = 'Precio';

    const body = table.createTBody();
    data.forEach(activity => {
      const row = body.insertRow();
      row.insertCell().textContent = activity.id;
      row.insertCell().textContent = activity.nomact;
      row.insertCell().textContent = activity.descripcio;
      row.insertCell().textContent = activity.date;
      row.insertCell().textContent = activity.hour;
      row.insertCell().textContent = activity.price;
    });

    // Agregar la tabla al HTML
    const container = document.getElementById('container');
    container.innerHTML = '';
    container.appendChild(table);
  })
  .catch(error => console.error(error));

$(document).ready(function(){
  // Rellenar la lista de comunidades autónomas al cargar la página
  $.ajax({
    url: "comunidades.php",
    success: function(data){
      $(data).find("comunidad_autonoma").each(function(){
        var codigo = $(this).find("codigo").text();
        var nombre = $(this).find("nombre").text();
        $("#comunidad").append('<option value="'+codigo+'">'+nombre+'</option>');
      });
    }
  });

  // Actualizar la lista de provincias al cambiar la comunidad autónoma seleccionada
  $("#comunidad").change(function(){
    var codigoComunidad = $(this).val();
    $.ajax({
      url: "provincias.php",
      type: "POST",
      data: {comunidad: codigoComunidad},
      success: function(data){
        $("#provincia").empty();
        $("#municipio").empty();
        $(data).find("provincia").each(function(){
          var codigo = $(this).find("codigo").text();
          var nombre = $(this).find("nombre").text();
          $("#provincia").append('<option value="'+codigo+'">'+nombre+'</option>');
        });
      }
    });
  });

  // Actualizar la lista de municipios al cambiar la provincia seleccionada
  $("#provincia").change(function(){
    var codigoProvincia = $(this).val();
    $.ajax({
      url: "municipis.php",
      type: "POST",
      data: {provincia: codigoProvincia},
      success: function(data){
        $("#municipio").empty();
        $(data).find("municipio").each(function(){
          var codigo = $(this).find("codigo").text();
          var nombre = $(this).find("nombre").text();
          $("#municipio").append('<option value="'+codigo+'">'+nombre+'</option>');
        });
      }
    });
  });
  

  // Al hacer clic en el botón de guardar, mostrar la información seleccionada
  $("#guardar").click(function(){
    var comunidad = $("#comunidad option:selected").text();
    var provincia = $("#provincia option:selected").text();
    var municipio = $("#municipio option:selected").text();

    alert("Comunidad: " + comunidad + "\nProvincia: " + provincia + "\nMunicipio: " + municipio);
  });
});

