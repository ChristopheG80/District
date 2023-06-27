<?php
echo 'coucou';
foreach ($conn->query($req) as $row) {
    // foreach($row as $key2 => $row2){
        echo $row[0] . '<br />';
    // }
}
?>
<div class="col-12">Sauvegarder la base</div>
<div class="col-12"><input type="submit" name="sauvegarderBase" value="Sauvegarder" /></div>


<div class="col-12">Restaurer la base</div>
<div class="col-12"><input type="submit" name="restaurerBase" value="Restaurer" /></div>
