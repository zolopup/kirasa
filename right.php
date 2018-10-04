<?php
$partex=explode("-", $part);
$right=mysql_query("SELECT * FROM `$table` WHERE `id`='$id' and not `part`='$part' or `part`='$part' and not `id`='$id' or `part` like '%$partex[0]%' and not `id`='$id' order by `index` DESC LIMIT 12");
if (mysql_num_rows($right)>0){
	echo '<div class="col-md-4">
	<h2>Похожие статьи:</h2>
	<ul>';
	while ($datar=mysql_fetch_array($right)){
		echo '<li><a href="/'.$datar['part'].'/'.$datar['id'].'">'.$datar['h1'].'</a></li>';
	}
	echo '</ul></div>';
}
                
?>