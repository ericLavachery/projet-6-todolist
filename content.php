<div>
    <form class="" action="index.php" method="post">
        <h3>A faire</h3>
        <?php
        foreach ($oldData as $key => $value) {
            if ($value['done'] != 'yes') {
                $newLine = '<input type="checkbox" name="' . $key . '" value="yes">';
                $newLine = $newLine . $value['task'] . '<br>';
                echo $newLine;
            }
        }
        ?>

        <br>
        <input type="hidden" name="coche" value="yes">
        <button type="submit" name="fait">Enregistrer</button>
        <?php
        if (isset($changeMessage)) {
            echo $changeMessage;
        }
        ?>

        <h3>Déjà fait</h3>
        <?php
        foreach ($oldData as $key => $value) {
            if ($value['done'] == 'yes') {
                $newLine = '<input type="checkbox" name="' . $key . '" value="no">';
                $newLine = $newLine . '<del>' . $value['task'] . '</del><br>';
                echo $newLine;
            }
        }
        ?>
    </form>
</div>
