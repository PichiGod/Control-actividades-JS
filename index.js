

const activityList = document.getElementById("activity-list");

function showact(){
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'php/show.php', true);

    xhr.onload = function(){
        if (this.status == 200){
            var activity = JSON.parse(this.responseText);

            activityList.innerHTML = '';

            for(var i in activity){
                
                const activityItem = document.createElement('div');
                activityItem.innerHTML = `
                <p><strong>Descripción:</strong>`+ activity[i].descripcion +`</p>
                <p><strong>Cantidad de Días:</strong>`+activity[i].cant_dias +`</p>
                <p><strong>Fecha de Inicio:</strong>`+ activity[i].finicio +`</p>
                <p><strong>Fecha de Fin:</strong>`+ activity[i].ffin +`</p>
                <p><strong>Responsable:</strong>`+ activity[i].responsable +`</p>
                <input type="hidden" name="id" id="id" value=`+ activity[i].id +`>
                <button id='delete${activity[i].id}' name='delete' onclick='return deleteact(${activity[i].id})' value=`+ activity[i].id +`>Eliminar</button>
                <a type="button" href="editar.php?id=`+ activity[i].id +`">Editar </a>
                `;
                activityList.appendChild(activityItem);
                //document.getElementById(`delete${activity[i].id}`).addEventListener('click', deleteact);
            }
            

            //document.getElementById('activity-list').innerHTML = activityItem;
        }else if(this.status == 404){
            console.log("No existe la peticion");
        
        }else{
            activityList.innerHTML = '';
            const activityItem = document.createElement('div');
            activityItem.innerHTML = "Error en la recoleccion de datos";

            activityList.appendChild(activityItem);
            
            console.log('Error en la petición AJAX');
        }
    };

    xhr.send();

}

showact();

function postact(e){
    e.preventDefault();

    var description = document.getElementById('description').value;
    var days = document.getElementById('days').value;
    var start_date = document.getElementById('start-date').value;
    var end_date = document.getElementById('end-date').value;
    var responsible = document.getElementById('responsible').value;

    let params = `description=${description}&days=${days}&start_date=${start_date}&end_date=${end_date}&responsible=${responsible}`;

    // let params = {
    //     description: description,
    //     days: days,
    //     start_date: start_date,
    //     end_date: end_date, 
    //     responsible: responsible
    // };

    console.log(params);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/add.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        
        console.log(this.responseText);
        showact();
        window.location.reload();
    }

    xhr.send(params);
}

function modact(e){
    e.preventDefault();
    const resp = document.getElementById('resp');

    var id = document.getElementById('id').value;
    var description = document.getElementById('description').value;
    var days = document.getElementById('cantDias').value;
    var start_date = document.getElementById('finicio').value;
    var end_date = document.getElementById('ffinal').value;
    var responsible = document.getElementById('responsable').value;

    let params = `id=${id}&description=${description}&days=${days}&start_date=${start_date}&end_date=${end_date}&responsible=${responsible}`;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/edit.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
        console.log(this.responseText);
        resp.innerHTML = this.responseText;
    }

    xhr.send(params);
}

function del(e){
        e.preventDefault();
    }

function deleteact(fid){

    var id = document.getElementById('id').value;
    console.log(fid);

    if(confirm("Seguro que quieres eliminar esta tarea?") == true){
        del;
        let params = `id=${id}`;

        var xhr = new XMLHttpRequest();
        xhr.open("DELETE",`php/delete.php?id=${fid}`,true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload= function(){
            if (this.status == 200){
                console.log(this.responseText);
                showact();
                //window.location.reload();
            }else {
                console.log('ERROR: EN LA BORRO DE DATOS')
            }
            
        }

        xhr.send(params);

    }else{
        alert('Cancelado.');
    }

}
