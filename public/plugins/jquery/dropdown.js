$("#Nivel").change(function(event)
{
  $.get("/admin/alumnos/create/"+event.target.value+"", function(response, nivel){
    console.log(response);
    $("#grado_id").empty();
    for(i=0;i<response.length;i++){

    $("#grado_id").append("<option value="+response[i].id+">"+response[i].nombre+"</option>");}
  });
});
