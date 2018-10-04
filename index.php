<?php
$part=$_GET['p'];
$id=$_GET['id'];
include('head.php');
/*if ($part=='галерея'){
	include('header1.php');
} else {
include('header.php');}*/
include('header.php');
if (!empty($h1)) {
	if (!empty($part)){
		include('nav.php');
	}
	echo '  <section>
	<div class="container">
	<h2 class="text-center hidden-sm hidden-xs">'.$h1.'</h2>';
}

if ($part=='новости'){
	if (empty($id)){
		echo '<div class="col-md-8">';
		include('script/newsglavn.php');
		echo '</div>';
	}
} 
if ($master=='public'){
	$content=explode('</p>', $content);
	$count=count($content);
	echo '<div class="col-md-8">';
			echo '<p><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-format="fluid"
     data-ad-layout="in-article"
     data-ad-client="ca-pub-6643031805770840"
     data-ad-slot="5538949871"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></p>';
	for ($i=0; $i<=$count; $i++) {
		
		echo ''.$content[$i].'';
	} echo'</div>';
	
} else if($content!=''){
	$col='8';
	if ($part=='контакты'){$col='12';}
	echo '<div class="col-md-'.$col.'">'.$content.'</div>';
} 
if($content2!=''){
echo '<div class="col-md-4">'.$content2.'</div>';}
if($obuch_r=='1'){
	include ('script/center_right.php');}
if($cl_ohr=='1'){
	include ('script/client_ohr.php');}
if($cl_obuch=='1'){
	include ('script/client_obuch.php');}
if($vopr_test=='1'){
	include ('script/vopr_test.php');}
if($zayvka=='1'){
	include ('script/zayvka.php');}
//загрузка главной страницы
if (empty($part)){
		include ($papka.'glavnnew.php');
}
 //конец главной
//Поиск
if ($part=='поиск'){
	echo '
	<div id="ya-site-results" onclick="return {\'tld\': \'ru\',\'language\': \'ru\',\'encoding\': \'\',\'htmlcss\': \'1.x\',\'updatehash\': true}"></div><script type="text/javascript">(function(w,d,c){var s=d.createElement(\'script\'),h=d.getElementsByTagName(\'script\')[0];s.type=\'text/javascript\';s.async=true;s.charset=\'utf-8\';s.src=(d.location.protocol===\'https:\'?\'https:\':\'http:\')+\'//site.yandex.net/v2.0/js/all.js\';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Results.init();})})(window,document,\'yandex_site_callbacks\');</script>

	';
}
//Поиск
 //галерея
if ($part=='галерея' and empty($id)){
	$result3=mysql_query("SELECT * FROM `$table` where `part`='$part' ORDER BY `date` DESC");
	echo "
	<div class=\"portfolio-items\">
	";
	$i=0;
	while ($row1=mysql_fetch_array($result3)) {
		$qpath='../'.$row1["qpath"].'/';
		echo '<div class="portfolio-item col-md-3 col-sm-4 col-xs-6">';
		echo'<div class="text-center thumbnail">
             <a href="/галерея/'.$row1["id"].'"><img src="'.$qpath.'prev1.jpg" alt="'.$row1["title"].'"></a>
             <div class="caption"><a href="/галерея/'.$row1["id"].'"><h3>'.$row1["title"].'</h3></a>
                        '.$row1["description"].'
                 </div><!--caption-->    </div><!--thumbnail-->
            </div>';	
	}	echo '</div> <!--potrfolio items-->';
}

//Галерея конец

//новости
if ($part=='новости' or $master=='public'){
	if (!empty($id)) {
		if ($part=='новости') {include('right.php');}
	if ($master=='public') {include('right.php');}
	echo '<div class="portfolio-items">  ';	
		for($n;$n<=22;$n++){
			if (file_exists('news/'.$news_date.'/'.$n.'.jpg')){
				echo '
				<div class="portfolio-item col-md-3 col-sm-4 col-xs-6">
				<a href="/news/'.$news_date.'/'.$n.'.jpg"  data-fancybox="gallery" title="'.$title.'">
				<img src="/news/'.$news_date.'/'.$n.'.jpg"  class="img-thumbnail" title="'.$title.'" alt="'.$title.'"/></a>
				</div>';
		
		}//if
	}//for 
	echo '<script type="text/javascript">
	var maxheight = 150;
	$("a.fancyimage").each(function() {
		if($(this).height() < maxheight) { maxheight = $(this).height(); }
	});
	$("a.fancyimage").height(maxheight);
</script>';
	echo '</div>';
}//if	
		echo '
<div id="hypercomments_widget"></div>
';
}
//конец новестей
if (($part=='центр-обучения' or $part=='услуги' or $master=='public') and !empty($id)) {
	echo "<input type='hidden' form='ajax-contact-form' name='part' value='".$_GET['p']."' /> 
<input type='hidden' form='ajax-contact-form' name='id' value='".$_GET['id']."' />";
}
if (isset($script)) {
	include ('script/'.$script);

}
if ($part=='галерея' and !empty($id)){
	include('right.php');
}
if (!empty($h1)){
	echo'</div>
	</section>';
}
/*if ($part=='галерея'){
	include('footer1.php');
} else {
include ("footer.php");}*/
include ("footer.php");
?>