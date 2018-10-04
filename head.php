<?php 
include_once ('script/connect.php');
$text=$_GET['text'];
$url='/';
if (isset($part)){
	$result1=mysql_query("SELECT * FROM `$table` where `part`='$part' and `id`='$id'");
	while($data1=mysql_fetch_array($result1)) {
		$title=$data1['title'];
		$description=$data1['description'];
		$keywords=$data1['keywords'];
		$master=$data1['master'];
		$h1=$data1['h1'];
		$content=$data1['content'];
		$content2=$data1['content2'];
		$obuch_r=$data1['obuch'];
		$cl_ohr=$data1['client_ohr'];
		$cl_obuch=$data1['client_obuch'];
		$vopr_test=$data1['vopros_test'];
		$zayvka=$data1['zayvka'];
		$script=$data1['script'];
		$news_date=date('dmY', strtotime($data1['date']));
		$date=date('d.m.Y', strtotime($data1['date']));
		$last_modified_time=strtotime($data1['date']);
		if ($part=='галерея' and isset($id) or $master=='galery' and $part!='новости'){
			$qpath2=$data1['qpath'];
			$qtitle=$data1['qtitle'];
			$java='
			<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
			<!-- подключение CSS файла Fancybox -->
			<link rel="stylesheet" href="/css/jquery.fancybox.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>';
			$script='foto.php';
		}
		if ($part=='новости'){
			$java='';
		}
	}
}
//Главная
if (empty($part)){
	$title='Кираса группа компаний, охрана и обучение в Пензе';
	$keywords='кираса, пенза, чоо, охрана, безопасность, чоп, чопы Пензы, услуги охраны';
	$description='Группа охранных организаций Кираса более 18 лет оказывает услуги охраны в Пензе. В составе группы три охранных организации и Центр образования «Кираса-МКТА».';
	$script='';
}
//Главная конец

//Онлайн-заявка
if ($zayvka=='1' or $cl_ohr=='1' or $cl_obuch=='1') {
	$java='
	<script  src="/js/jquery.js"></script>
	<script src="/js/contactform.js" type="text/javascript"></script>';
}
//Онлайн-заявка

if (!empty($part) and $part!='центр-обучения' and $part!='услуги' and empty($id) or $part=='центр-обучения' and $id=='статьи'){
	$numrow=mysql_num_rows(mysql_query("Select `h1` FROM `$table` where `master`='public' and `part`='$part' ORDER BY `date` DESC"));
	if ($numrow>0){
		$theme=explode('-', $part);
		if ($theme[0]=='public') {$theme[0]='ЧОП в Санкт-Петербурге';}
		if ($theme[0]=='ohrana') {$theme[0]='ЧОП в Москве';}
		$title='Статьи на тему '.$theme[0].' '.$theme[1].'';
		$keywords='кираса, пенза, '.$theme[0].' '.$theme[1].'';
		$description='Статьи на тему '.$theme[0].' '.$theme[1].'';
	}
	$page=mysql_num_rows(mysql_query("Select * From `$table` where `part`='$part' and `id`=''"));
	if ($page==0 and $part!='вакансии' or $id=='статьи') {
		if ($part=='травматические-пистолеты'){
			$part1='травматическое-оружие';
			$result2=mysql_query("SELECT * FROM `$table` where `master`='public' and `part`='$part' or `master`='public' and `part`='$part1' ORDER BY `date` DESC");} else {
		$result2=mysql_query("SELECT * FROM `$table` where `master`='public' and `part`='$part' ORDER BY `date` DESC");}
		if (mysql_num_rows($result2)>0){
			if ($theme=='травматические-пистолеты'){$theme='травматическое-оружие';}
			$theme=explode('-', $part);
			
			if ($theme[0]=='public') {$theme[0]='ЧОП в Санкт-Петербурге';}
			if ($theme[0]=='ohrana') {$theme[0]='ЧОП в Москве';}
			$h1="СТАТЬИ на тему: ".$theme[0]." ".$theme[1];
			while ($row1 = mysql_fetch_array($result2)) {
				$content.="<p><a href='/".$row1['part'].'/'.$row1['id']."'><strong>".$row1['h1']."</strong></a></p>
				<ul><li>".$row1['anons']."</li></ul><br />";
			}
		}
	}
}

//галерея
if ($part=='галерея' and empty($id)){
	$title='Галерея | Фотоотчеты мероприятий';
	$keywords='фото, галерея, кираса, мкта, стрельба, турнир';
	$description='Фотоотчеты с мероприятий проводимых группой компаний Кираса';
	$h1=$title;
}
//галерея

//новости
if ($part=='новости' and empty($id)){
	$title='НОВОСТИ | Группа компаний Кираса';
	$keywords='новости, мероприятия пензы, охрана, кираса, стрельба, турнир, соревнования, рукопашный бой';
	$description='Новости группы компаний Кираса';
	$h1='Новости';
	
}
if ($part=='новости' and !empty($id)){
	$title.='. '.$date;
	$h1=$date.'. '.$h1;
	$keywords.='новости, мероприятия пензы, охрана, кираса, стрельба, турнир, соревнования, рукопашный бой';
	$description.='Новости группы компаний Кираса';
	$java='
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>

';
	
}
//новости

//поиск
if ($part=='поиск'){
	$keywords="поиск, сайт кираса";
	$description="";
	$title="Результаты поиска на сайте kirasа58.ru";
}
//поиск

//подключение теста

if ($part=='квалификационный-экзамен' and $id=='могу-ли-я-работать-охранником') {
	$test=1;
	$valer=101;
	$script='test.php';
	$java='
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6643031805770840",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="https://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript"> VK.init({apiId: 2761340, onlyWidgets: true}); </script>
	<script type="text/javascript">
				function openbox(id){
					display = document.getElementById(id).style.display;
					if(display=="none"){
						document.getElementById(id).style.display="block";
					}else{
						document.getElementById(id).style.display="none";
					}
				}
				</script>
	';
	$keywords='тест, шутка, несерьезный тест, профориентация';
	$opisan='Пройдите наш несерьёзный тест и узнайте по зубам ли вам профессия охранник.';
}
if ($part=='квалификационный-экзамен' and $id=='онлайн-тест-на-4-разряд') {
	$test=1;
	$razr=101;
	$numquest=7;
	$script='test.php';
	$last_modified_time=strtotime('2018-03-24 00:00:00');
	$java='
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6643031805770840",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="https://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript"> VK.init({apiId: 2761340, onlyWidgets: true}); </script>
	<script type="text/javascript">
				function openbox(id){
					display = document.getElementById(id).style.display;
					if(display=="none"){
						document.getElementById(id).style.display="block";
					}else{
						document.getElementById(id).style.display="none";
					}
				}
				</script>
	';
	$title='Онлайн-тест для частного охранника 4 разряда. В новой редакции 2017 года';
	$keywords='Экзамен онлайн, тестирование, онлайн экзамен, квалификационный экзамен, экзамен охранника, 4 разряд, частный охранник, вопросы для охранника';
	$description='Экзамен онлайн, квалификационный экзамен для частного охранника 4 разряда. Экзаменационные билеты представлены в новой редакции 2017 года для охранника 4-го разряда. В экзамене даны все вопросы и ответы.';
	$h1='Онлайн-тест на 4 разряд охранника в редакции 2017 года';
	$opisan='Экзамен онлайн, квалификационный экзамен для частного охранника 4 разряда. Экзаменационные билеты представлены в новой редакции 2017 года для охранника 4-го разряда. В экзамене даны все вопросы и ответы. Вопросы появляются в случайном порядке.';
}
if ($part=='квалификационный-экзамен' and $id=='онлайн-тест-на-5-разряд') {
	$test=1;
	$razr=102;
	$numquest=9; 
	$script='test.php';
	$last_modified_time=strtotime('2018-03-24 00:00:00');
	$java='
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6643031805770840",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="https://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript"> VK.init({apiId: 2761340, onlyWidgets: true}); </script>
	<script type="text/javascript">
				function openbox(id){
					display = document.getElementById(id).style.display;
					if(display=="none"){
						document.getElementById(id).style.display="block";
					}else{
						document.getElementById(id).style.display="none";
					}
				}
				</script>';
	$title='Экзамен онлайн для частного охранника 5 разряда. В новой редакции 2017 года';
	$keywords='Экзамен онлайн, тестирование, онлайн экзамен, квалификационный экзамен, экзамен охранника, 5 разряд, частный охранник, вопросы для охранника';
	$description='Экзамен онлайн, квалификационный экзамен для частного охранника 5 разряда. Экзаменационные билеты представлены в новой редакции 2017 года для охранника 5-го разряда. В экзамене даны все вопросы и ответы. В целях лучшего запоминания после каждого не правильного ответа онлайн тест начинается заново.';
	$opisan='Экзамен онлайн, квалификационный экзамен для частного охранника 5 разряда. Экзаменационные билеты представлены в новой редакции 2017 года для охранника 5-го разряда. В экзамене даны все вопросы и ответы. ';
	$h1='Экзамен онлайн на 5 разряд охранника в редакции 2017 года';
}
if ($part=='квалификационный-экзамен' and $id=='онлайн-тест-на-6-разряд') {
	$test=1;
	$razr=103;
	$numquest=10; 
	$script='test.php';
	$last_modified_time=strtotime('2018-03-24 00:00:00');
	$java='
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6643031805770840",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="https://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript"> VK.init({apiId: 2761340, onlyWidgets: true}); </script>
	<script type="text/javascript">
				function openbox(id){
					display = document.getElementById(id).style.display;
					if(display=="none"){
						document.getElementById(id).style.display="block";
					}else{
						document.getElementById(id).style.display="none";
					}
				}
				</script>';
	$title='Экзамен онлайн для частного охранника 6 разряда. В новой редакции 2017 года';
	$keywords='Экзамен онлайн, тестирование, онлайн экзамен, квалификационный экзамен, экзамен охранника, 6 разряд, частный охранник, вопросы для охранника';
	$description='Экзамен онлайн, квалификационный экзамен для частного охранника 6 разряда. Экзаменационные билеты представлены в новой редакции 2017 года для охранника 6-го разряда. В экзамене даны все вопросы и ответы. В целях наилучшего запоминания после каждого неправильного ответа Экзамен онлайн начинается заново.';
	$opisan='Квалификационный экзамен для частного охранника 6 разряда. Экзаменационные билеты представлены в новой редакции 2017 года для охранника 6-го разряда в виде онлайн-теста. В экзамене даны все вопросы и ответы. Вопросы появляются в случаном порядке.';
	$h1='Экзамен онлайн на 6 разряд охранника в редакции 2017 года';
}
if ($part=='периодическая-проверка' and $id=='граждане-владеющие-оружием'){
	$test=1;
	$razr=1;
	$numquest=10; 
	$script='test.php';
	$last_modified_time=strtotime('2018-03-24 00:00:00');
	$java='
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6643031805770840",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="https://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript"> VK.init({apiId: 2761340, onlyWidgets: true}); </script>
	<script type="text/javascript">
				function openbox(id){
					display = document.getElementById(id).style.display;
					if(display=="none"){
						document.getElementById(id).style.display="block";
					}else{
						document.getElementById(id).style.display="none";
					}
				}
				</script>';
	$title='Гражданское оружие. Экзамен онлайн.';
	$keywords='Экзамен онлайн, онлайн экзамен, граждане, охотники, проверка навыков, обращение с оружием, проверка теоритических знаний, травматика, получить лицензию на травматику, проверка навыков обращения с оружием, экзамен на травматическое оружие, вопросы на получение оружия';
	$description='Пройдите тест онлайн для граждан на проверку знаний правил обращения с гражданским оружием, вопросы для получения лицензии на травматическое и охотничье оружие. Вопросы и ответы в новой редакции 2016 года. В экзамене даны все вопросы и ответы. В целях наилучшего запоминания после каждого неправильного ответа Экзамен онлайн начинается заново.';
	$opisan='Пройдите онлайн подготовку к экзамену на получение гражданского оружия. В онлайн тесте представлены вопросы одобренные комиссией по приему экзамена по Пензенской области. Обратите внимание, что некоторые вопросы и формулировки могут отличаться в различных регионах.';
	$h1='Экзамен онлайн. Экзамен для получения (продления) лицензии на владение оружием';
}
if ($part=='периодическая-проверка' and $id=='сбербанк-росинкас-гцсс'){
	$test=1;
	$razr=14;
	$numquest=10; 
	$script='test.php';
	$last_modified_time=strtotime('2016-12-22 10:49:00');
	$java='
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6643031805770840",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="https://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript"> VK.init({apiId: 2761340, onlyWidgets: true}); </script>
	<script type="text/javascript">
				function openbox(id){
					display = document.getElementById(id).style.display;
					if(display=="none"){
						document.getElementById(id).style.display="block";
					}else{
						document.getElementById(id).style.display="none";
					}
				}
				</script>';
	$title='Экзамен онлайн для работников ГЦСС, Сбербанка, Росинкас. Новые вопросы 2013 года';
	$keywords='Экзамен онлайн, периодическая проврека, сбербанк, онлайн экзамен, гцсс, спецсвязь, сбербанк, инкассатор, росинкас, вопросы, ответы, 2013';
	$description='Пройдите Экзамен онлайн для работников Главного центра специальной связи, Сбербанка, Росинкас. Вопросы и ответы в новой редакции 2016 года. В экзамене онлайн даны все вопросы и ответы. В целях наилучшего запоминания после каждого неправильного ответа Экзамен онлайн начинается заново.';
	$h1='Экзамен онлайн для работников ГЦСС, Сбербанка, Росинкас';
}
if ($part=='периодическая-проверка' and $id=='ведомственная-охрана'){
	$test=1;
	$razr=7;
	$numquest=10; 
	$script='test.php';
	$last_modified_time=strtotime('2018-03-24 00:00:00');
	$java='
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6643031805770840",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="https://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript"> VK.init({apiId: 2761340, onlyWidgets: true}); </script>
	<script type="text/javascript">
				function openbox(id){
					display = document.getElementById(id).style.display;
					if(display=="none"){
						document.getElementById(id).style.display="block";
					}else{
						document.getElementById(id).style.display="none";
					}
				}
				</script>';
    $title='Экзамен онлайн для работников ведомственной охраны (с оружием). Новые 129 вопросов 2016 года';
	$keywords='Экзамен онлайн, периодическая проврека, ведомственная охрана, вопросы, ответы, 2016';
	$description='Пройдите Экзамен онлайн для работников ведомственной охраны (с оружием). Новые 129 вопросов 2016 года. В экзамене даны все вопросы и ответы. В целях наилучшего запоминания после каждого неправильного ответа Экзамен онлайн начинается заново. ';
	$h1='Экзамен онлайн для работников ведомственной охраны (с оружием)';
}
if ($part=='периодическая-проверка' and $id=='ведомственная-охрана-без-оружия'){
	$test=1;
	$razr=8;
	$numquest=10; 
	$script='test.php';
	$last_modified_time=strtotime('2018-03-24 00:00:00');
	$java='
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6643031805770840",
    enable_page_level_ads: true
  });
</script>
<script type="text/javascript" src="https://userapi.com/js/api/openapi.js?47"></script>
	<script type="text/javascript"> VK.init({apiId: 2761340, onlyWidgets: true}); </script>
	<script type="text/javascript">
				function openbox(id){
					display = document.getElementById(id).style.display;
					if(display=="none"){
						document.getElementById(id).style.display="block";
					}else{
						document.getElementById(id).style.display="none";
					}
				}
				</script>';
    $title='Тест онлайн для работников ведомственной охраны (без оружия). Новые 94 вопроса 2016 года';
	$keywords='Тест, онлайн, экзамен, периодическая проврека, ведомственная охрана, вопросы, ответы, 2016';
	$description='Пройдите тест онлайн для работников ведомственной охраны (без оружия). Новые 94 вопроса 2016 года. В экзамене даны все вопросы и ответы. В целях лучшего запоминания после каждого неправильного ответа онлайн тест начинается заново.';
	$h1='Тест онлайн для работников ведомственной охраны (без оружия)';
}
// конец подключения теста

//вакансии
if ($part=='вакансии' and empty($id)){
	$master="vacancy";
	$h1="Портал вакансий. Работа охранником в Пензе и Москве";
    $keywords="Вакансии, портал вакансий, работа в Москве, вахта, работа охранником, Пенза, работа в тц, Метро, Metro, высокоя зарплата, стабильный график, посуточно, для студентов, работа в Пензе, охрана работа, разместить вакансию, подать вакансию";
	$description="Портал вакансий Кираса, работа по все Россиии, работа в сфере безопасности и охраны, работа в Пензе, Работа в Москве охранником, требуются охранники";
    $title="Портал вакансий в сфере безопасности, найти работу охранником в Пензе | Разместить вакансию";
	$script='spisok.php';
}
if ($part=='вакансии' and $id=='отклик'){
	$title='Отклик на вакансию '.$_GET['vacan'].'';
	$h1='Отклик на вакансию '.$_GET['vacan'].'';
}
if ($part=='вакансии' and $id=='регистрация-работодателя'){
	$title='Регистрация компании работодателя';
	$h1='Регистрация компании работодателя';
	$java='<!-- TinyMCE -->
<script type="text/javascript" src="../script/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        mode:"textareas",
        language : "ru",
        plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        theme : "advanced",
        theme_advanced_buttons1 : "bullist,|,bold,italic,underline",
        theme_advanced_buttons2 : "pasteword,pastetext,|,code,fullscreen",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_align : "left",
        relative_urls : false
});
</script>
<!-- /TinyMCE -->
';
}
if ($part=='вакансии' and $id=='подать-вакансию'){
	$username = $_SESSION['login'];
	if (isset($username)) {
		$title='Подать вакансию';
		$h1='Подать вакансию';
		$script='addvacan.php';
		$java.='<!-- TinyMCE -->
		<script type="text/javascript" src="../script/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
			mode:"textareas",
			language : "ru",
			plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			theme : "advanced",
			theme_advanced_buttons1 : "bullist,|,bold,italic,underline",
			theme_advanced_buttons2 : "pasteword,pastetext,|,code,fullscreen",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_align : "left",
			relative_urls : false
		});
		</script>
		<!-- /TinyMCE -->';
		}
		else {
			$title='Вход';
			$script='vhod.php';
		}
}
$updatevac=$_GET['update'];
if ($part=='вакансии' and $id=='обновить' ){
	$username = $_SESSION['login'];
	if (isset($username)) {
		$title='Обновление вакансии';
		$h1='Изменить вакансию';
		$script='update_vacan.php';
		$java.='<!-- TinyMCE -->
		<script type="text/javascript" src="../script/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
			mode:"textareas",
			language : "ru",
			plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			theme : "advanced",
			theme_advanced_buttons1 : "bullist,|,bold,italic,underline",
			theme_advanced_buttons2 : "pasteword,pastetext,|,code,fullscreen",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_align : "left",
			relative_urls : false
		});
		</script>
		<!-- /TinyMCE -->';
		}
		else {
			$title='Вход';
			$script='vhod.php';
		}
}
if ($part=='вакансии' and $id=='войти'){
	$title='Вход';
	$script='vhod.php';
}
if ($part=='вакансии' and $id=='кабинет'){
	$username = $_SESSION['login'];
	if (isset($username)) {
		$title='Кабинет работодателя';
		$h1='Кабинет работодателя';
		$script='kabinet.php';
	}
	else {
		$title='Вход';
		$script='vhod.php';
	}
}
if ($part=='вакансии' and $id=='выход'){
	$title='Выход';
	session_unset ();
	session_destroy ();
	echo '
	<script type="text/javascript">
	window.location = "/вакансии/"
	</script>
	';
}
/*if ($part=='вакансии' and $master!='public'){
	$java.="
	<script>
		  $(document).ready(function(){
				$('#login-trigger').click(function(){
					$(this).next('#login-content').slideToggle();
					$(this).toggleClass('active');					
					
					if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
						else $(this).find('span').html('&#x25BC;')
					})
		  });
	</script>";
}*/
if ($part=='вакансии' and isset($id) and $master!='public' and $id!='войти' and $id!='регистрация-работодателя' and $id!='обновить' and $id!='подать-вакансию' and $id!='кабинет') {
	include ($papka.'script/connectvacan.php');
	$script='spisok.php';
	$master="vacancy";
	$p=$_GET["id"];
	$result1=mysql_query("SELECT * FROM `$table` where `id`=$p");
	while($data1=mysql_fetch_array($result1)){
		$querycomp=mysql_query("Select * From $company Where `login`= '".$data1[22]."' LIMIT 1");
		$datacomp=mysql_fetch_array($querycomp);
		$title=''.$data1[3].' в '.$data1[16].', вакансия от '.$datacomp[4].'';
		$keywords='Найти работу охранника, вакансии охрана, вакансии в Пензе, охранник в Пензе, работа в охране, работа в Москве, работа охранник, работа в Пензе, '.$data1[3].' в '.$data1[16].'';
		$description='Работа охранником в Пензе и Москве. Актуальная вакансия с достойной зарплатой. '.$data1[3].' в '.$data1[16].', вакансия от '.$datacomp[4].'';
		$h1=''.$data1[3].'';
	}//конец while
}
//вакансии конец
if (empty($title) or $title==''){
	header("HTTP/1.1 404 Not Found");
	include('errors/404.php');
	exit;
}
if (empty($last_modified_time) or !isset($last_modified_time)){
	if (isset($part) and $part!='статьи'){
		$last1=mysql_query("SELECT * FROM `$table` Where `part`='$part' Order by `index` DESC LIMIT 1");
	} else {
		$last1=mysql_query("SELECT * FROM `$table` Order by `date` DESC LIMIT 1");
	}
	$last=mysql_fetch_array($last1);
	$last_modified_time=strtotime($last['date']);
}
?>