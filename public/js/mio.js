/*$(".custom-control-input1").change(function(){
	alert("Seleccionado");
});*/

$(document).ready(function(){  

  	/*custom-control-input1*/

    $(".custom-control-input1").click(function() {  
        if($(".custom-control-input1").is(':checked')) {  
           	/*var datos = new FormData();*/

			localStorage.setItem("valor1", 1);

			//alert("Esta activado");
        } 
        else {  
            //alert("No está activado");
            localStorage.setItem("valor1", 0); 
        }

        /*datos.append("valor1", localStorage.getItem("valor1")); */
        var formData = {
            task: localStorage.getItem("valor1"),
        }

        
    });  

    /*custom-control-input2*/

    $(".custom-control-input2").click(function() {   
        if($(".custom-control-input2").is(':checked')) {  
           	/*var datos = new FormData();*/

			localStorage.setItem("valor2", 1);

			//alert("Esta activado");
        } 
        else {  
            //alert("No está activado");
            localStorage.setItem("valor2", 0); 
        }

        /*datos.append("valor2", localStorage.getItem("valor2")); */
        var formData = {
            task: localStorage.getItem("valor2"),
        }
    }); 

	/*custom-control-input3*/

    $(".custom-control-input3").click(function() {  
        if($(".custom-control-input3").is(':checked')) {  
           	/*var datos = new FormData();*/

			localStorage.setItem("valor3", 1);

			//alert("Esta activado");
        } 
        else {  
            //alert("No está activado");
            localStorage.setItem("valor3", 0); 
        }

        /*datos.append("valor3", localStorage.getItem("valor3"));*/

        var formData = {
            task: localStorage.getItem("valor3"),
        }
    });  

    var type = "POST"; //for creating new resource
    /*var url = "/ajax-crud/public/tasks";*/
    //url:"http://www.artstyloweb.com/real-state/ajax/ajax.property.php",
    var my_url = "/weblibrarylaravel1/public";

        /*$.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var task = 'hola';

                if (state == "add"){ //if user added a new record
                    $('.prueba').append(task);
                }else{ //if user updated an existing record

                    $(".prueba").replaceWith( task );
                }

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });*/
  
});  

/****************************************************/

/*$(document).ready(function(){

    var url = "/ajax-crud/public/tasks";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var task_id = $(this).val();

        $.get(url + '/' + task_id, function (data) {
            //success data
            console.log(data);
            $('#task_id').val(data.id);
            $('#task').val(data.task);
            $('#description').val(data.description);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmTasks').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete task and remove it from list
    $('.delete-task').click(function(){
        var task_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + task_id,
            success: function (data) {
                console.log(data);

                $("#task" + task_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            task: $('#task').val(),
            description: $('#description').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var task_id = $('#task_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + task_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#tasks-list').append(task);
                }else{ //if user updated an existing record

                    $("#task" + task_id).replaceWith( task );
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});*/