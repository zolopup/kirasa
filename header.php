<?php 
if ($test=="1"){
	session_start();
}
header("Cache-Control: public, no-transform");
header("Expires: " .date("r", time()+(1*60*60)));
if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $last_modified_time){
	header('HTTP/1.1 304 Not Modified');
	die;
}
header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_modified_time).' GMT');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $description?>">
    <meta name="author" content="Группа охранных организаций Кираса">
    <meta name="keywords" content="<?php echo $keywords?>">
    <title><?php echo $title?></title> 
    <? if (!isset($part)){ ?>
	<meta name='yandex-verification' content='49f2dac42159c765'>
	<meta name='yandex-verification' content='7906dce85f4d176c'>
    <meta name="yandex-verification" content="dfab243c88065311" />
	<meta name="verify-reformal" content="37070f4b2011f71ef55b2105">
    <? }?>    
    <link rel="icon" href="https://kirasa58.ru/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="https://kirasa58.ru/favicon.ico" type="image/x-icon">
    
    <!-- core CSS -->
     <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
     <div style=' clear: both; text-align:center; position: relative;'>
      <a href="https://www.google.com/intl/ru/chrome/browser/">Загрузите Google Chrome</a>
      </div>
<![endif]-->       
<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="https://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="https://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
      <div style=' clear: both; text-align:center; position: relative;'>
      <a href="https://www.google.com/intl/ru/chrome/browser/">Или загрузите Google Chrome</a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="/js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="/css/ie.css">
<![endif]-->
<?php echo $java;?>
</head>
<body>
<?php include_once("analyticstracking.php") ?>
<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "1616662", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "topmailru-code");
</script><noscript><div style="position:absolute;left:-10000px;">
<img src="//top-fwz1.mail.ru/counter?id=1616662;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
</div></noscript>
<!-- //Rating@Mail.ru counter -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter5087065 = new Ya.Metrika({
                    id:5087065,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/5087065" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!--==============================header=================================-->
    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="top-number"><i class="fa fa-phone-square"></i><?php if ($part=='центр-обучения' or $part=='квалификационный-экзамен' or $part=='периодическая-проверка') {echo ' (8412) 42-88-00';} else { echo ' <span class="text-nowrap">обучение: (8412) 42-88-00</span> <span class="text-nowrap">охрана: (8412) 20-88-28</span> ';}?>
						</div>
                    </div>
                    <div class="col-sm-6 hidden-xs">
                       <div class="social top-number">
                           <!-- <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>-->
                            Кираса - нам доверяют самое дорогое
<!--                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Поиск">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>-->
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Навигация</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand col-lg-8 col-md-10 col-sm-10 col-xs-8" href="/">
                    	<?php if ($part=='центр-обучения' or $part=='квалификационный-экзамен' or $part=='периодическая-проверка' or $part=='обучение'){ ?> 
                         <img src="/images/logocentr.png" alt="logo" class="col-lg-12 col-md-10 col-sm-8 col-xs-7">
                        <?php } else {?>
                       <img src="/images/newlogo.png" alt="logo" class="col-lg-12 col-md-10 col-sm-8 col-xs-7">
                        <?php }?>
                    </a>
                    <h1 class="text-hide col-xs-4"><?php echo $title;?></h1>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                      <li <?php if (empty($part)) echo'class="active"';?>><a href="<?php echo $url;?>">Главная</a></li>
                      <li class="dropdown <?php if ($part=='услуги') echo'active';?>">  
                            <a href="/услуги/" class="dropdown-toggle" data-toggle="dropdown">Услуги <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li<?php if ($id=='пультовая-охрана') echo' class="active"';?>><a href="/услуги/пультовая-охрана">Пультовая охрана</a></li>
                                <li<?php if ($id=='физическая-охрана') echo' class="active"';?>><a href="/услуги/физическая-охрана">Физическая охрана</a></li>
                                <li<?php if ($id=='личная-охрана') echo' class="active"';?>><a href="/услуги/личная-охрана">Личная охрана</a></li>
                                <li<?php if ($id=='пожарная-сигнализация') echo' class="active"';?>><a href="/услуги/пожарная-сигнализация">Пожарная сигнализация</a></li>
                            </ul>
                      </li>
                      <li class="dropdown <?php if ($part=='центр-обучения') echo'active';?>">
                      	<a href="/центр-обучения/">Центр Обучения </a><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                                <li<?php if ($id=='обучение-частных-охранников') echo' class="active"';?>><a href="/центр-обучения/обучение-частных-охранников">Охранник</a></li>
                                <li<?php if ($id=='обучение-гражданское-оружие') echo' class="active"';?>><a href="/центр-обучения/обучение-гражданское-оружие">Гражданское оружие</a></li>
                                <li<?php if ($id=='обучение-на-промышленного-альпиниста') echo' class="active"';?>><a href="/центр-обучения/обучение-на-промышленного-альпиниста">Промальп</a></li>
                                <!--<li<?php if ($id=='пожарная-сигнализация') echo' class="active"';?>><a href="/центр-обучения/">Сведения</a></li>-->
                            </ul></li>
                     <!-- <li <?php if ($part=='вакансии') echo'class="active"';?>><a href="<?php echo $url;?>вакансии/">Вакансии</a></li>-->
                     <li class="dropdown <?php if ($part=='квалификационный-экзамен' or $part=='периодическая-проверка') echo'active';?>">  
                            <a href="/квалификационный-экзамен/" class="dropdown-toggle" data-toggle="dropdown">Тестирование <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li<?php if ($id=='онлайн-тест-на-4-разряд') echo' class="active"';?>><a href="/квалификационный-экзамен/онлайн-тест-на-4-разряд" title="Онлайн-тест на 4 разряд охранника в редакции 2016 года">Охранник 4 разряд</a></li>
                                <li<?php if ($id=='онлайн-тест-на-5-разряд') echo' class="active"';?>><a href="/квалификационный-экзамен/онлайн-тест-на-5-разряд" title="Онлайн-тест на 5 разряд охранника в редакции 2016 года">Охранник 5 разряд</a></li>
                                <li<?php if ($id=='онлайн-тест-на-6-разряд') echo' class="active"';?>><a href="/квалификационный-экзамен/онлайн-тест-на-6-разряд" title="Онлайн-тест на 6 разряд охранника в редакции 2016 года">Охранник 6 разряд</a></li>
                                <li<?php if ($id=='сбербанк-росинкас-гцсс') echo' class="active"';?>><a href="/периодическая-проверка/сбербанк-росинкас-гцсс">Сбербанк ГЦСС Росинкас</a></li>
                                <li<?php if ($id=='граждане-владеющие-оружием') echo' class="active"';?>><a href="/периодическая-проверка/граждане-владеющие-оружием" title="Онлайн-тест для подготовки к проверке теоретических знаний правил обращения с оружием у граждан владеющих гражданским, охотничьим или травматическим оружием">Гражданское оружие</a></li>
                                <li<?php if ($id=='ведомственная-охрана') echo' class="active"';?>><a href="/периодическая-проверка/ведомственная-охрана" title="Онлайн-тест для работников ведомственной охраны (с оружием)">ВО с оружием</a></li>
                                <li<?php if ($id=='ведомственная-охрана-без-оружия') echo' class="active"';?>><a href="/периодическая-проверка/ведомственная-охрана-без-оружия" title="Онлайн-тест для работников ведомственной охраны (без оружия)">ВО без оружия</a></li>
                            </ul>
                      </li>
                      <li <?php if ($part=='контакты') echo'class="active"';?>><a href="<?php echo $url;?>контакты/">Контакты</a></li>                    
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
	</header><!--/header-->