<?php

session_start();

if (!isset($_SESSION['task'])) {
    $_SESSION['task'] = array();
}

if (isset($_GET['task_name'])) {
    array_push($_SESSION['task'], $_GET['task_name']);
    unset($_GET['task_name']);
}

if (isset($_GET['clear'])) {
    unset($_SESSION['task']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Gerenciador de tarefas</title>
</head>

<body>
    <div class="container">

        <header>
            <h1>Gerenciador De Tarefas</h1>
        </header>

        <div class="form">
            <form method="get" action="">
                <label for="task_name">Tarefa:</label>
                <input type="text" name="task_name" placeholder="Nome da Tarefa">
                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <div class="separador"></div>

        <div class="list_task">
            <?php
            if (isset($_SESSION['task'])) {
                echo "<ul>";

                foreach ($_SESSION['task'] as $key => $task) {
                    echo "<li>$task</li>";
                }
            }
            ?>

            <form method="get" action="">
                <input type="hidden" name="clear" value="clear">
                <button type="submit" class="btn-clear">Limpar</button>
            </form>

        </div>

        <footer>
            <p>Desenvolvido por: Cársio Manoel de Menezes Junior</p>
        </footer>

    </div>
</body>

</html>