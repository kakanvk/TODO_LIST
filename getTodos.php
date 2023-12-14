<?php
include("./db/connect.php");

$sql = "SELECT * FROM todos";
$result = mysqli_query($conn, $sql);

$todos = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $todo = [];
        $todo['id'] = $row['id'];
        $todo['task'] = $row['task'];
        $todo['completed'] = $row['completed'];

        $todos[] = $todo;
    }
}

mysqli_close($conn);

echo json_encode($todos);
