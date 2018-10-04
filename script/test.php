<form id="save" name="save">
    <input type="hidden" name="next" id="next" form="save"/>
    <input type="hidden" name="otvet" id="otvet" form="save"/>
    <input type="hidden" form="save" name="answ"/>
    <div id="ekz" class="col-md-10 well">
   <p class="lead text-center"><?php echo $h1;?></p>
		<div class="row text-center">
		<h4 class="lead text-center">Выберете один из вариантов тестирования:</h4>
		<button type="button" class="btn btn-default" onClick="show();"><?php echo $numquest;?> вопросов в случайном порядке</button>
		
		<button type="button" class="btn btn-default" onClick="show_all();">Все вопросы по порядку</button>
		</div>
   <noscript><p>В вашем браузере отключены javascript!</p></noscript>
    </div>
    
</form>

<div class="col-md-10"><blockquote><?php echo $opisan; ?></blockquote></div>

<p>
  <script  src="/js/jquery.js"></script>
  <?php if (!empty($valer)){?><!--Валерин Тест-->
  <script>
	function show(){
		$.ajax({
			url:"/script/testvalera.php?valer=<?php echo $valer;?>",
			cache:false,
			async:true,
			beforeSend: function(){		
				$("#ekz").html('<div id="load" align="center" ><?php echo $h1;?> <br /><img src="/images/ajax-loader1.gif" /></div>');
			},
			success: function(html){
				next=0;
				window.setTimeout(function() { // New content replaces the loading image
            		$("#ekz").html(html);
        		}, 3000);
			}
		});
	}
function post() {
	$.ajax({
	  url: "/script/testvalera.php?valer=<?php echo $valer;?>",
	  cache: false,
	  type: "POST",
	  data: $('#save').serialize(),
	  beforeSend: function(){
        $("#ekz").html('<div id="load" align="center" ><img src="/images/ajax-loader1.gif" /><br />ЗАГРУЗКА...</div>');
		$('body,html').animate({
                    scrollTop:200
                }, 800);
      }, 
	  success: function(html){  
	  //		window.setTimeout(function() {
//           // New content replaces the loading image
//            
//        }, 1000);
			//$('.fleft').removeClass();
			$("#ekz").html(html);
		},
	  error: function(response) {
		//обработка ошибок при отправке
	 }
	});
}
</script>
  <script>
	 $(document).ready(function(){  
	show();
	/*setTimeout("$('#rek1').show()", 10000);*/
        });
</script>
</p>

  <?php } else {?><!-- Все Тест-->
  <script>
	 function show_all()  
        {  
            $.ajax({  
                url: "/script/test-all.php?razr=<?php echo $razr;?>",  
                cache: false, 
				 async: true,
				beforeSend: function(){
        $("#ekz").html('<div id="load" align="center" ><?php echo $h1;?> <br /><img src="/images/ajax-loader1.gif" /></div>');
      }, 
                success: function(html){  
                   window.setTimeout(function() {
           // New content replaces the loading image
            $("#ekz").html(html);
        }, 3000);
				 }  
            });  
        } 		
function post_all() {
	$.ajax({
	  url: "/script/test-all.php?razr=<?php echo $razr;?>",
	  cache: false,
	  type: "POST",
	  data: $('#save').serialize(),
	  beforeSend: function(){
        $("#ekz").html('<div id="load" align="center" ><img src="/images/ajax-loader1.gif" /><br />ЗАГРУЗКА...</div>');
		$('body,html').animate({
                    scrollTop:200
                }, 800);
      }, 
	  success: function(html){  
	  //		window.setTimeout(function() {
//           // New content replaces the loading image
//            
//        }, 1000);
			//$('.fleft').removeClass();
			$("#ekz").html(html);
		},
	  error: function(response) {
		//обработка ошибок при отправке
	 }
	});
}
	 function show()  
        {  
            $.ajax({  
                url: "/script/test_udal.php?razr=<?php echo $razr;?>",  
                cache: false, 
				 async: true,
				beforeSend: function(){
        $("#ekz").html('<div id="load" align="center" ><?php echo $h1;?> <br /><img src="/images/ajax-loader1.gif" /></div>');
      }, 
                success: function(html){  
                   window.setTimeout(function() {
           // New content replaces the loading image
            $("#ekz").html(html);
        }, 3000);
				 }  
            });  
        } 		
function post() {
	$.ajax({
	  url: "/script/test_udal.php?razr=<?php echo $razr;?>",
	  cache: false,
	  type: "POST",
	  data: $('#save').serialize(),
	  beforeSend: function(){
        $("#ekz").html('<div id="load" align="center" ><img src="/images/ajax-loader1.gif" /><br />ЗАГРУЗКА...</div>');
		$('body,html').animate({
                    scrollTop:200
                }, 800);
      }, 
	  success: function(html){  
	  //		window.setTimeout(function() {
//           // New content replaces the loading image
//            
//        }, 1000);
			//$('.fleft').removeClass();
			$("#ekz").html(html);
		},
	  error: function(response) {
		//обработка ошибок при отправке
	 }
	});
}
</script>
  <?php }?>

<div class="col-md-8">
  <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber,whatsapp" data-counter=""></div>

<br /><br />
<div id="vk_like"></div>
<script type="text/javascript">
	VK.Widgets.Like("vk_like", {type: "button"});
</script>
<br /><br />

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Адапитвный -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6643031805770840"
     data-ad-slot="5630130092"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		
	<div class="col-md-4">

<h3>Онлайн-тесты:</h3>
            <ul>
                    <li><a href="/квалификационный-экзамен/онлайн-тест-на-4-разряд">4 разряд охранника</a></li>
                    <li><a href="/квалификационный-экзамен/онлайн-тест-на-5-разряд">5 разряд охранника</a></li>
                    <li><a href="/квалификационный-экзамен/онлайн-тест-на-6-разряд">6 разряд охранника</a></li>
                    <li><a href="/периодическая-проверка/сбербанк-росинкас-гцсс">Для работников Сбербанка, Росинкаса</a></li>
                    <li><a href="/периодическая-проверка/граждане-владеющие-оружием">Для получения (продления) лицензии на оружие</a></li>
                   <li><a href="/периодическая-проверка/ведомственная-охрана">Для работников ведомственной охраны (с оружием)</a></li>
                </ul>
                <a href="/квалификационный-экзамен/" class="btn btn-link">Подробнее</a>
         </div>
         
         <?php include('../right.php')?>
         