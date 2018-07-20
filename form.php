<div>
    <form class="" action="index.php" method="post">
        <input type="text" name="task" value="" placeholder="Tâche">
        <input type="hidden" name="done" value="no">
        <button type="submit" name="edit" value="yes">Ajouter</button><br>
        <?php
        if (isset($addMessage)) {
            echo $addMessage;
        }
        ?>
    </form>
</div>
