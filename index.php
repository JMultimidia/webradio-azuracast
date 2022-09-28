<?php
	
	$server = $_SERVER['SERVER_NAME'];
	$script = $_SERVER['SCRIPT_NAME'];
	$endereco = $_SERVER ['REQUEST_URI'];
	
	$tipo_requisicao = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http");
	
	$url = $tipo_requisicao."://".substr($server.$script, 0, (strlen($server.$script) - 9));
	$link_meta = $tipo_requisicao."://".substr($server.$script, 0, (strlen($server.$script) - 9))."images/logo_social.jpg";

    $titulo_projeto = "Webrádio Azuracast";
    $conteudo_projeto = "Este é o espaço para você colocar informações sobre sua webrádio. Coloque seu slogan aqui também, ficará muito bom!";
    $icone_projeto = "images/favicon.svg";
    $type_projeto = "Canal, SmartTV, TV, Azuracast, Radio, Online, On-line, Podcast, Webradio, Webrádio, Link";
	$facebook_app_id = "ID_APLICATIVO_FACEBOOK";
	$autor = "Seu Nome";
	$slogan = "Coloque aqui seu slogan!";
	
	ob_start();
	session_start();
	
	$bitrate = ($_SESSION['bitrate_wrh'] == "" ? "64" : ((in_array($_SESSION['bitrate_wrh'], array("64", "128"))) ? $_SESSION['bitrate_wrh'] : "64"));
	
	$ponto_montagem_64 = "mobile.mp3";
	$ponto_montagem_128 = "radio.mp3";
	
	$link_radio = "\"https://demo.azuracast.com/listen/azuratest_radio/".($bitrate == "128" ? $ponto_montagem_128 : $ponto_montagem_64)."\"";
	
	$link_historico = "https://demo.azuracast.com/public/azuratest_radio/history?theme=light";
	$link_grade = "https://demo.azuracast.com/public/azuratest_radio/schedule/embed?theme=light";
	$link_pedidos = "https://demo.azuracast.com/public/azuratest_radio/embed-requests?theme=light";
	$link_podcasts = "https://demo.azuracast.com/public/azuratest_radio/podcasts";
	
	$link_contato = "https://minhapaginadecontato.com.br";
	
	$link_facebook = "https://www.facebook.com/SeuNickName";
	$link_youtube = "https://www.youtube.com/SeuNickName";
	$link_instagram = "https://www.instagram.com/SeuNickName";

?>

<html lang="pt-BR" class=" js csstransforms">
<head>

	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Expires" content="0">
	<meta name="revisit-after" content="1">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#0D0C2E">
	<meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	<meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
	
	<!-- Add to homescreen for Chrome on Android -->
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="Webrádio Azuracast">
	<link rel="icon" sizes="192x192" href="ico.png">
	
	<!-- Add to homescreen for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="apple-mobile-web-app-title" content="Webrádio Azuracast">
	<link rel="apple-touch-icon" href="ico.png">
	
	<!-- Tile for Win8 -->
	<meta name="msapplication-TileColor" content="#0D0C2E">
	<meta name="msapplication-TileImage" content="ico.png">

    <meta name="description" <?php echo "content=\"".$type_projeto."\""; ?> />
    <meta name="author" <?php echo "content=\"".$autor."\""; ?> />
	<meta name="keywords" <?php echo "content=\"".$type_projeto."\""; ?> />
	<meta property="fb:app_id" <?php echo "content=\"".$facebook_app_id."\""; ?> />
	<meta property="og:title" <?php echo "content=\"".$titulo_projeto."\""; ?> />
	<meta property="og:type" <?php echo "content=\"".$type_projeto."\""; ?> />
	<meta property="og:image" <?php echo "content=\"".$link_meta."\""; ?> />
	<meta property="og:image:alt" <?php echo "content=\"".$titulo_projeto."\""; ?> />
	<meta property="og:site_name" <?php echo "content=\"".$titulo_projeto."\""; ?> />
	<meta property="og:description" <?php echo "content=\"".$conteudo_projeto."\""; ?> />
	<meta property="og:url" <?php echo "content=\"".$url."\""; ?> />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" <?php echo "content=\"".$link_meta."\""; ?> />
	<meta name="twitter:title" <?php echo "content=\"".$titulo_projeto."\""; ?> />
	<meta name="twitter:description" <?php echo "content=\"".$conteudo_projeto."\""; ?> />
	<meta name="twitter:image" <?php echo "content=\"".$link_meta."\""; ?> />
	<meta name="twitter:image:alt" <?php echo "content=\"".$slogan."\""; ?> />
	<meta name="facebook-domain-verification" content="quc043nhx6krvlis5xrwr1f1a8l0sa" />
	
    <title><?php echo $titulo_projeto; ?></title>
	
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/styles.css" rel="stylesheet" />
	<link href="css/colorbox.css" rel="stylesheet" />
	<link href="lib/circle-player/skin/circle.player.css" rel="stylesheet" />
	
	<link rel="manifest" href="manifest.json" />
	
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
	<script type="text/javascript" src="dist/jplayer/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="lib/circle-player/js/mod.csstransforms.min.js"></script>
	<script type="text/javascript" src="lib/circle-player/js/circle.player.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="js/jquery.gallery.js"></script>
	<script type="text/javascript" src="js/metadados.js"></script>
	
	<script type="module">
	   import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
	   const el = document.createElement('pwa-update');
	   document.body.appendChild(el);
	</script>
	
	<link rel="icon" href="ico.png">
	
</head>

<body>

    <!-- Header -->
    <header id="header" class="header">
		<div id="myImage"></div>
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
							<br>
							<br>
							<center>
							<div align="center" style="background: url('images/logo.svg') no-repeat center; background-size: 270px 96px; height: 96px;"></div>
							</center>
							<p class="frase_play">Aperte o Play e aproveite!</p>
							<p class="frase_bitrate"><span class="botao_bitrate" onClick="muda_bitrate();">Tocando em <?php echo $bitrate; ?>Kbps. Mude aqui para <?php echo ($bitrate == "64" ? "128" : "64"); ?>Kbps.</span></p>
							
							<!-- ABRE Player -->
							<center>
								<script type="text/javascript">//<![CDATA[
$(document).ready(function(){var myCirclePlayer=new CirclePlayer("#jquery_jplayer_1",{m4a:<?php echo $link_radio; ?>,oga:<?php echo $link_radio; ?>},{cssSelectorAncestor:"#cp_container_1",swfPath:"dist/jplayer",wmode:"window",keyEnabled:true});});
//]]></script>

			<!-- The jPlayer div must not be hidden. Keep it at the root of the body element to avoid any such problems. -->
								<div id="jquery_jplayer_1" class="cp-jplayer" style="width: 0px; height: 0px;"><img id="jp_poster_0" style="width: 0px; height: 0px; display: none;"><audio id="jp_audio_0" preload="metadata" src=<?php echo $link_radio; ?>></audio></div>

								<!-- The container for the interface can go where you want to display it. Show and hide it as you need. -->

								<div id="cp_container_1" class="cp-container jp-state-playing">
									<div class="cp-circle-control"></div>
									<div class="cp-circle-back"></div>
									<ul class="cp-controls">
										<li><a class="cp-play" id="play_button" tabindex="1" style="display: none;">play</a></li>
										<li><a class="cp-pause" id="pause_button" style="" tabindex="1">pause</a></li> <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
									</ul>
								</div>
<!-- Fecha Player -->
							</center>
							<p class="frase_musica" style="margin-bottom: 30px; margin-top: 20px; font-size: 12px;">
								<center>
									<div>
										<font style="font-size: 12px; font-weight: bold;"><span id="musica_atual" style="font-size: 13px;">CARREGANDO</span></font>
									</div>
									<div id="tamanho_progresso" style="width: 340px;">
										<div style="width: 60px; height: 5px; padding-top: 3px; align-items: right; justify-content: right; display: flex; flex-direction: row; flex-wrap: wrap; float: left;">
											<span id="relogio_atual" style="font-size: 10px; font-weight: bold;">00:00</span>
										</div>
										<div style="width: 200px; height: 5px; align-items: left; justify-content: left; display: flex; flex-direction: row; flex-wrap: wrap; margin: 10px 10px 10px 10px; background-color: #888888; border-radius: 7px; float: left;">
											<div id="progresso" style="width: 0px; height: 5px; background-color: #ffffff; border-radius: 7px;">
											</div>
										</div>
										<div style="width: 60px; height: 5px; padding-top: 3px; align-items: left; justify-content: left; display: flex; flex-direction: row; flex-wrap: wrap;">
											<span id="relogio_total" style="font-size: 10px; font-weight: bold;">00:00</span>
										</div>
									</div>
									<br />
									<div style="margin-bottom: 30px;">
										<font style="font-size: 12px;">Próxima: <span id="proxima_musica">CARREGANDO</span></font>
									</div>
									<input type="hidden" id="duracao_total" value="0" />
									<input type="hidden" id="tempo_atual" value="0" />
									<input type="hidden" id="bitrate" value="<?php echo ($bitrate == "64" ? "128" : "64"); ?>" />
								</center>
							</p>
							<p class="botoes" style="margin-bottom: 25px; font-size: 14px;">
								<span class='inline_tocadas' href="#tocadas" title="Música tocadas">Tocadas</span>
								<span style="margin: 0px 3px 0px 3px;"></span>
								<span class='inline_grade' href="#grade" title="Grade de programação">Grade</span>
								<span style="margin: 0px 3px 0px 3px;"></span>
								<span class='inline_pedidos' href="#pedidos" title="Peça sua música">Pedidos</span>
							</p>
							<p class="botoes" style="margin-bottom: 40px;">
								<a href="<?php echo $link_podcasts; ?>" target="_blank">
									<span class='inline_podcasts' href="#podcasts" title="Podcasts"><strong>Nossos Podcasts</strong></span>
								<a>
								 ● <span class='inline_redes' href="#redes" title="Redes Sociais"><strong>Redes Sociais</strong></span>
								 ● 
								<a href="<?php echo $link_contato; ?>" target="_blank">
									<span class='inline_contato' href="#contato" title="Contato"><strong>Contato</strong></span>
								<a>
							</p>
							<div style='display:none; color: #000; margin: 0px;'>
								<div id='tocadas' style='padding:10px; background-color:#fff; margin: 0px;'>
									<iframe src="<?php echo $link_historico; ?>" frameborder="0" allowtransparency="true" style="width: 100%; height: calc(100% - 20px); border: 0;"></iframe>
								</div>
								<div id='grade' style='padding:10px; background-color:#fff; margin: 0px;'>
									<iframe src="<?php echo $link_grade; ?>" frameborder="0" allowtransparency="true" style="width: 100%; height: calc(100% - 20px); border: 0;"></iframe>
								</div>
								<div id='redes' style='padding:10px; background-color:#fff; margin: 0px;'>
									<div style="width: 100%; height: calc(100% - 20px); background-color: #ffffff; color: #000000;" align="center"> 
										<div>
											<a href="<?php echo $link_facebook; ?>" target="_blank">
												<img src="images/facebook.jpg" style="width: 280px; border-radius: 10px;" />
											</a>
										</div>
										<div style="margin-top:10px;">
											<a href="<?php echo $link_youtube; ?>" target="_blank">
												<img src="images/youtube.jpg" style="width: 280px; border-radius: 10px;" />
											</a>
										</div>
										<div style="margin-top:10px;">
											<a href="<?php echo $link_instagram; ?>" target="_blank">
												<img src="images/instagram.jpg" style="width: 280px; border-radius: 10px;" />
											</a>
										</div>
									</div>
								</div>
								<div id='pedidos' style='padding:10px; background-color:#fff; margin: 0px;'>
									<iframe src="<?php echo $link_pedidos; ?>" frameborder="0" allowtransparency="true" style="width: 100%; height: calc(100% - 20px); border: 0;"></iframe>
								</div>	
							</div>
						</div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <script>var mensagem="";function clickIE(){if(document.all){(mensagem);return false;}}function clickNS(e){if(document.layers||(document.getElementById&&!document.all)){if(e.which==2||e.which==3){(mensagem);return false;}}}if(document.layers){document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}document.oncontextmenu=new Function("return false")
var podcastAudio=document.getElementById("podcast-audio");var playBtn=document.getElementById("podcast-play");var pauseBtn=document.getElementById("podcast-pause");var playShow=function(){podcastAudio.play();playBtn.style.display="none";pauseBtn.style.display="inline-block";};var pauseShow=function(){podcastAudio.pause();playBtn.style.display="inline-block";pauseBtn.style.display="none";};</script>

	<script async="" src="https://www.googletagmanager.com/gtag/js?id=G-Q6E2QLL0GQ"></script>
	<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-Q6E2QLL0GQ');</script>
	
</body>
</html>