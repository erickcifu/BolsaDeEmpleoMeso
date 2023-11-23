

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('agenda');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:"es",
        
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
          },
          events: 
          baseURL+"/evento/mostrar",
        
          eventColor: '#378006',
         

          
        
          
          

        
          

        });
        calendar.render();
        document.getElementById("btnGuardar").addEventListener("click",function(){
          const datos=new FormData(formulario);
          console.log(datos);
          console.log(formulario.title.value);
          axios.post(baseURL+"/evento/agregar",datos).
          then(
              (respuesta)=>{
                  $("#entrevista").modal("hide");
              }
              )
   
        });
        
      });
      function enviarDatos(url){
        const nuevaURL=baseURL+url;
    }
      
