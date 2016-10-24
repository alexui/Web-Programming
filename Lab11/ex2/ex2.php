<?php
	$values[0]='red';
	$values[1]='blue';
        
        if (isset($_POST['color'])){
            if (in_array($_POST['color'], $values)){
                echo 'valid color: ' . $_POST['color'];
            } else {
                echo 'invalid color';
            }
        }
?>
 <form action="ex2.php" method="POST">
	<select name="color">
		<?php
			foreach($values as $value)
				echo "<option value=\"".$value."\">".$value."</option>";
		?>        
	</select>
	<input type="submit" />
</form>