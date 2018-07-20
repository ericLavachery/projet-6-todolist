<div>
    <form class="content" action="index.php" method="post">
        <h3>Trucs à faire</h3>
        <?php
        foreach ($oldData as $key => $value) {
            if ($value['done'] != 'yes') {
                $newLine = '<input type="checkbox" name="' . $key . '" value="yes">';
                $newLine = $newLine . '<span class="tasklist">' . $value['task'] . '</span><br>';
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

        <h3>Trucs déjà faits</h3>
        <?php
        foreach ($oldData as $key => $value) {
            if ($value['done'] == 'yes') {
                $newLine = '<input type="checkbox" name="' . $key . '" value="no">';
                $newLine = $newLine . '<span class="tasklist"><del>' . $value['task'] . '</del></span><br>';
                echo $newLine;
            }
        }
        ?>
    </form>
</div>
