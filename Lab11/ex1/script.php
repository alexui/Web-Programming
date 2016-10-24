<?php

if (isset($_POST['color'])
        && in_array($_POST['color'], array('red', 'green', 'blue'))) {
    echo 'color = ' . $_POST['color'];
} else {
    echo 'Invalid color';
}
?>