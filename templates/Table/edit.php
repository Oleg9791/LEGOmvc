<form action="?type=Table&action=upd&id=<?= $_GET['id'] ?>" method="post">
    <?php
    foreach ($this->data['row'] as $key => $datum) {

        echo "<input name='$key' value='$datum'>";
    }
    ?>
    <input type="submit" value="ok">

</form>