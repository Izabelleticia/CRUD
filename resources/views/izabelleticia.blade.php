<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Afazeres</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de afazeres</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css')}}">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3774/3774896.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
     crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 
     integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
</head>

<body class="bg-img body-class">
    <div class="container">
        <div class="center-screen">
            <div class="row">
        <form>
            <div class"form-group">
                <div class="center-element">
                    <img src=""
                    class="" alt="" srcset="">
                </div>
                <label for="taskInput" class"h5">Adicionar Tarefa</label>
            <input type="text" class="form-control" id="taskInput" arial-describedy="emailhelp" placeholder="Enter task">
            <small id="emailHelp" class="form-text text-muted">And do it</small>
        </form>
        <button class="btn btn-primary" onclick="saveTasks()">Save</button>
    </div>

    <div class="col-7 offset-1">
        <div>
            <h1 class="h1">Lista de Tarefas</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="editionModel" tabindex="1" role="dialog" aria-labelledy="editionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-header">
                <h5 class="modal-tittle" id="editionModalLabel">Task edition</h5>
            </div>
            <div class="modal-body">
                <form>
                 <div class="form-group">
                    <input type="hidden" id="task-id">
                    <label for="task-description" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" id="task-description">
                 </div>
            </div>
        </form>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="edit()">Save</button>
            </div>
     </div>

            </div>
        </div>
    </div>
    <script>
    //READ - GET
    function getTasks() {
        $.ajax(
            {
                type: "GET",
                url: "/web2022",
                success: function (data){
                    console.log(data);
                    const table = document.getElementsByTagName("tbody")[0];
                    table.innerHTML = "";
                    if(data.length === 0) { 
                        const row = table.insertRow(0);
                        const cell = row.insertRow(0);
                        cell.innerHTML = "No tasks yet";
                    } else { 
                        for (let index = 0; index < data.length; index++) {
                            const row = table.insertRow(index);
                            const cell1 = row.insertCell(0);
                            const cell2 = row.insertCell(1);
                            const cell3 = row.insertCell(2);
 const cell4 = row.insertCell(3);
cell1.innerHTML = data[index].id;
cell2.innerHTML = data[index].name;
cell3.innerHTML = '<button class="btn btn-primary" onClick="openModal(${data[index].id})">Edit</button>';
cell4.innerHTML = '<button class="btn btn-danger" onClick="deleteTask(${data[index].id})">Delete</button>';
                        }
                    }
                },
            }
        );
    }
    function saveTask() {
        const todo = document.getElementById("taskInput").value;
        if (todo.trim().length === 0) {
            return alert("Please, enter a task");
        }
        $.ajax({
            type: "POST",
            url: "/izabelleticia",
            data: {
                name: function () {
                    
                },
                success: function () {
                    getTask();
                },
                error: function (data) {
                    alert('Error ${JSON.stringify(data)}');
                }
            }
        })
    }

    function deleteTas (id) {
         $.ajax({
            type: "DELETE",
            url: '/izabelleticia/${id}',
            sucess: function () {
                getTask();
            },
            error: function (data) {
                alert('Error ${JSON.stringfy(data)}');
            }
         }
         )
    }

    function openModal(id, name){
        $('#editionModal').modal ('show');
        $('#task-id').val(id);
        $('#task-description').val(name);
    }

    function editTask() {
        const idTask = $("#task-id").val();
        const nameTask = $("#task-description").val();
        if (nameTask.trim().length === 0) {
            return alert("Please, enter a task");
        }
    
    $.ajax({
        type : "PUT",
        url: '/web2022/${idTask}',
        data: {
            name: name
        },
        success: function () {
            getTasks();
        },
        error: function (data) {
            alert('Error ${JSON.stringify(data)}');
        }
    })
 }
 </script>
<body>
</head>

</body>
</html>