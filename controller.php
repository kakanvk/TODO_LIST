<?php

include("./db/connect.php");

$action = $_GET["action"];
$todo_id = $_GET["id"];
$new_task = $_GET["newTask"];

$sql = "";

switch ($action) {
    case "create":
        if ($new_task) {
            $sql = "INSERT INTO todos (task, completed) VALUES ('" . $new_task . "', '0')";
        }
        break;

    case "complete":
        if ($todo_id) {
            // Lấy trạng thái complete từ CSDL
            $sql_get_todo = "SELECT * FROM todos WHERE id=" . $todo_id;
            $result = $conn->query($sql_get_todo);

            $completed = 0;

            while ($row = $result->fetch_assoc()) {
                $completed = $row['completed'];
            }

            $sql = "UPDATE todos SET completed=" . 1 - $completed . " WHERE id=" . $todo_id;
        }

        break;

    case "delete":
        if ($todo_id) {
            $sql = "DELETE FROM todos WHERE id=" . $todo_id;
        }
        break;
}

$status = $conn->query($sql);

$conn->close();
