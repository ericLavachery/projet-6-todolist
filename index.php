<?php
if(file_exists('todo.json'))
{
    $oldDataJSON = file_get_contents('todo.json');
    $oldData = json_decode($oldDataJSON, true);
    // AJOUTER TACHE
    if (isset($_POST['task']) && $_POST['task'] != "") {
        $firstTask['task'] = $_POST['task'];
        $firstTask['done'] = $_POST["done"];
        $extraData[0] = $firstTask;
        $updatedData = array_merge($oldData,$extraData);
        $updatedDataJSON = json_encode($updatedData);
        if(file_put_contents('todo.json', $updatedDataJSON)){
            $addMessage = '<span class="taskMessage">Tâche rajoutée!</span>';
        }
        $oldData = $updatedData;
    }
    // COCHER/DECOCHER TACHE
    if (isset($_POST['coche']) && $_POST['coche'] == 'yes') {
        $changes = 'no';
        $i = 0;
        while ($i < count($oldData)) {
            if (isset($_POST[$i])) {
                if ($_POST[$i] == 'yes' || $_POST[$i] == 'no') {
                    $oldData[$i]['done'] = $_POST[$i];
                    $changes = 'yes';
                }
            }
            $i++;
        }
        if ($changes == 'yes') {
            $updatedDataJSON = json_encode($oldData);
            if(file_put_contents('todo.json', $updatedDataJSON)){
                $changeMessage = '<span class="changeMessage">Changements éffectués!</span>';
            }
        }
    }
}
else
{
    $firstTask['task'] = 'Aquaponey';
    $firstTask['done'] = 'yes';
    $baseTask[0] = $firstTask;
    file_put_contents('todo.json', json_encode($baseTask));
}
?>



<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>ToDoList : Gestionnaire</title>
    <link href="https://fonts.googleapis.com/css?family=Englebert|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="wrap">
        <h1>To Do List</h1>
        <?php include 'content.php' ?>
        <br>
        <?php include 'form.php' ?>
    </div>

</body>
</html>
