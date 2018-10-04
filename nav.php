      <div class="bs-component container pull-right">
          <ul class="breadcrumb" style="margin-bottom: 5px;">
<?php
include ($papka.'script/connect.php');
if ($part=='травматические-пистолеты'){$part='травматическое-оружие';}
if ($part=='периодическая-проверка') {$part='квалификационный-экзамен';}
echo '<li><a href="/">главная</a></li>
';
$parth1=explode("-", $part);
if (empty($id)){
	$a=' class="active"';
	$n2='<li'.$a.'>'.$parth1[0].' '.$parth1[1].'</li>';
} else {
	$n2='<li'.$a.'><a href="/'.$part.'/">'.$parth1[0].' '.$parth1[1].'</a></li>';
}
echo $n2;
if (!empty($id)){
	echo '<li class="active">'.$h1/*$idh1[0].' '.$idh1[1].' '.$idh1[2].' '.$idh1[3].' '.$idh1[4]*/.'</li>';
}               
?>
          </ul>
        </div>