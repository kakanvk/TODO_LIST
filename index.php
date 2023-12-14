<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5c4aca786f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Todolist</title>
</head>

<body onload="getTodos();">
    <div class="container">
        <h1>Todo list</h1>
        <div class="add_new_task">
            <input type="text" id="newTask" placeholder="Enter new task" />
            <button onclick="handleAddTask();">Add</button>
        </div>
        <div class="todos" id="todos">

        </div>
    </div>

    <script>
        
        function renderTodos(todos) {
            var todosContainer = document.getElementById("todos");
            todosContainer.innerHTML = "";

            todos.forEach(function(todo) {
                var todoDiv = document.createElement("div");
                todoDiv.className = "todo";

                var span = document.createElement("span");
                span.className = todo.completed == "1" ? "completed" : "";
                span.textContent = todo.task;

                var actionsDiv = document.createElement("div");
                var completeIcon = document.createElement("i");
                completeIcon.className = "fa-solid fa-circle-check";
                completeIcon.onclick = function() {
                    handleTask("complete", id = todo.id);
                };

                var deleteIcon = document.createElement("i");
                deleteIcon.className = "fa-solid fa-circle-xmark";
                deleteIcon.onclick = function() {
                    handleTask("delete", id = todo.id);
                };

                actionsDiv.appendChild(completeIcon);
                actionsDiv.appendChild(deleteIcon);

                todoDiv.appendChild(span);
                todoDiv.appendChild(actionsDiv);

                todosContainer.appendChild(todoDiv);
            });
        }

        function getTodos() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var todos = JSON.parse(this.responseText);
                    renderTodos(todos);
                }
            };
            xmlhttp.open("GET", "getTodos.php", true);
            xmlhttp.send();
        }

        function handleAddTask() {
            const newTask = document.getElementById("newTask");
            handleTask("create", 0, newTask.value);
            newTask.value = "";
        }

        function handleTask(action, id, newTask) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    getTodos();
                }
            };
            xmlhttp.open("GET", "controller.php?id=" + id + "&action=" + action + "&newTask=" + newTask, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>