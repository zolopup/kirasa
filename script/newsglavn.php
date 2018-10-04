
<h2>Новости</h2>
	<div class="row">
	<?php

if (empty($part)){$limit=' LIMIT 3';} else {$limit=' LIMIT 5';}
$news=mysql_query("SELECT * FROM `$table` WHERE `part`='новости' and not `id`='$id' order by `index` DESC $limit");
while ($datanews=mysql_fetch_array($news)){
	$date_d=date('dmY', strtotime($datanews['date']));
	$date_cont=date('d.m.Y', strtotime($datanews['date']));
	$connews=$datanews['anons'];
	if (file_exists('news/'.$date_d.'/1-1.jpg')){$jpg='/news/'.$date_d.'/1-1.jpg';}else {$jpg='/news/'.$date_d.'/1.jpg';}
	echo '<div class="col-lg-12 clearfix bottom">
	<a href="/новости/'.$datanews['id'].'">
	<img class="news img-rounded" src="'.$jpg.'" alt="'.$datanews['h1'].'" title="'.$datanews['h1'].'"></a>
	<strong><a href="/новости/'.$datanews['id'].'">'.$date_cont.' '.$datanews['h1'].'</a></strong><br />
	'.$connews.' <a href="/новости/'.$datanews['id'].'" class="btn btn-default btn-sm" >Подробнее...</a>	
	</div>';
}
   
?>  
  </div>