<?php
print_r($this->data);
?>
<form action="?type=Table&action=add" method="post">
    <?php
    foreach ($this->data as $key => $datum) {

        echo "<input name='$key' placeholder='$datum'>";
    }
    ?>
    <input type="submit" value="ok">
</form>