<?php

require_once('PHPMailerAutoload.php');

if (!preg_match( '/^[a-zA-Z0-9\/]+/', $_SERVER['REQUEST_URI'], $matches)) {
	throw new Exception( 'Invalid URL' );
}
$params = explode( '/', $matches[0] );
array_shift($params); // 一番最初は絶対、空文字列なのでズラす
foreach( $params as $key => $t ) {
	if( $t === '' ) { $params[$key] = ''; continue; }
	if( !preg_match( '/^[a-zA-Z0-9]+$/', $t ) ) throw new Exception( 'Invalid URL' ); // 有効でない文字の混入
}

$params = array_merge($params); // 連番崩れの修正
if (count($params) > 1) {
	header('Location: /');exit;
}

switch ($params[0]) {
	case 'event':
		return RenderEventPage();

	case 'qanda':
		return RenderQandAPage();

	case 'contact':
		return RenderContactPage();

	case 'mail':
		return SendMail();

	default:
		return RenderFrontPage();
}

function RenderFrontPage(){ ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TECKTECK新歓ウェブページ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKの新歓サイトです。" />
	<meta name="keywords" content="TECKTECK, てくてく, 新歓, 東京大学, お茶の水女子大学, 東京女子大学, 日本女子大学, 公認, サークル, 登山, アウトドア, インカレ" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content="TECKTECK新歓ウェブページ"/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content="http://teckteckweb.tk"/>
	<meta property="og:site_name" content="TECKTECK新歓ウェブページ"/>
	<meta property="og:description" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKの新歓サイトです。"/>
	<meta name="twitter:title" content="TECKTECK新歓ウェブページ" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="http://teckteckweb.tk" />
	<meta name="twitter:card" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKの新歓サイトです。" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="/favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">

	<!-- Magnific Popup -->
	<!-- <link rel="stylesheet" href="css/magnific-popup.css"> -->
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-wrap">
		<header id="fh5co-header">
			<div class="container">
				<nav class="fh5co-main-nav">
					<ul>
						<li class="fh5co-active"><a href="/"><span>ホーム</span></a></li>
						<li><a href="event"><span>私たちの活動</span></a></li>
						<li><a href="qanda"><span>Q&amp;A</span></a></li>
						<li><a href="contact"><span>お問い合わせ</span></a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div style="background-image: url(images/welcome.jpg);" data-stellar-background-ratio="0.5" class="fh5co-hero" >
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">ようこそTECKTECKへ</h1>
							<p>公認登山&amp;アウトドアサークルTECKTECKの新歓サイトです。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<h2>TECKTECKとは？</h2>
						<p>TECKTECK（テクテク）は、東京大学・お茶の水女子大学・東京女子大学・日本女子大学（目白キャンパス）の4大学から構成される登山&amp;アウトドアサークルです。<br/>主な活動は、毎週末に行われる山行とレクです。みんなでわいわい山に登ったり、レク企画のイベントを楽しんだりしています。<br/>週末企画の他、夏合宿や山手線一周レク、クリスマスパーティー、スキー合宿など楽しい行事が盛りだくさんなとても楽しいサークルです。</p>
					</div>
					<div class="col-md-7">
						<img src="images/logo.jpg"  class="img-responsive">
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-parallax" style="background-image: url(images/top_our.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">私たちの活動</h1>
							<p>年間を通じて盛りだくさんのイベント。<a href="event">詳しくはこちら</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">

				<div class="row">
					<div class="col-md-6">
						<div class="fh5co-feature ">
							<div class="fh5co-icon">
								<i class="icon-circle-compass"></i>
							</div>
							<div class="fh5co-text">
								<h3>週末山行</h3>
								<p>TECKTECKの活動の主軸。関東周辺の山に登ります。山頂で自炊したり、下山のあと温泉に入ったりしつつ、仲間と山を楽しみつくします。</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-feature " >
							<div class="fh5co-icon">
								<i class="icon-basket"></i>
							</div>
							<div class="fh5co-text">
								<h3>週末レク</h3>
								<p>登山以外にも週末はレクを行います。立案者が好きなように企画を立てることができる、自由なイベントです。新歓レクは何になるのかお楽しみに。</p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="fh5co-feature " >
							<div class="fh5co-icon">
								<i class="icon-gift2"></i>
							</div>
							<div class="fh5co-text">
								<h3>クリスマスパーティー</h3>
								<p>店を貸し切って、男子はスーツ、女子はドレスを身にまとい、普段と一風変わった雰囲気の中、ゲームなどをするとても楽しいイベントです。</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-feature " >
							<div class="fh5co-icon">
								<i class="icon-briefcase2"></i>
							</div>
							<div class="fh5co-text">
								<h3>スキー合宿</h3>
								<p>泊まりがけでスキーやスノボを存分に楽しむイベントです。経験者はもちろん、初心者でも先輩たちが優しく教えてくれるので十分に楽しめます。</p>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>


		<div class="fh5co-parallax" style="background-image: url(images/shinkan.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">新歓情報2018</h1>
							<p>ぜひ一度はTECKTECKの雰囲気を感じにいらしてください。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">

					<p class="icon-envelope"> 参加希望の方は<a href='contact'>お問い合わせ</a>からご連絡下さい</p>

					<ul class="clearfix">
						<li class="wow fadeInDown" style="visibility: visible;">
							<div class="media">
								<div class="date">
									<span class="day">9</span>
									<span class="month">Apr</span>
								</div>
								<a href="#">
									<img src="images/meetup1.jpg" alt=""/>
								</a>
							</div>
							<a href="#">
								<h1>第1回 新歓お食事会(新宿)</h1>
							</a>
						</li>

						<li class="wow fadeInDown" data-wow-delay=".1s" style="visibility: visible;">
							<div class="media">
								<div class="date">
									<span class="day">13</span>
									<span class="month">Apr</span>
								</div>
								<a href="#">
									<img src="images/meetup2.jpg" alt=""/>
								</a>
							</div>
							<a href="#">
								<h1>第2回 新歓お食事会(新宿)</h1>
							</a>
						</li>

						<li class="wow fadeInDown" data-wow-delay=".2s" style="visibility: visible;">
							<div class="media">
								<div class="date">
									<span class="day">15</span>
									<span class="month">Apr</span>
								</div>
								<a href="#">
									<img src="images/zinba.jpg" alt=""/>
								</a>
							</div>
							<a href="#">
								<h1>新歓山行 ―陣馬山―</h1>
							</a>
						</li>

						<li class="wow fadeInDown" data-wow-delay=".3s" style="visibility: visible;">
							<div class="media">
								<div class="date">
									<span class="day">21</span>
									<span class="month">Apr</span>
								</div>
								<a href="#">
									<img src="images/maruyama.jpg" alt=""/>
								</a>
							</div>
							<a href="#">
								<h1>新歓山行 ―丸山―</h1>
							</a>
						</li>

						<li class="wow fadeInDown" data-wow-delay=".4s" style="visibility: visible;">
							<div class="media">
								<div class="date">
									<span class="day">22</span>
									<span class="month">Apr</span>
								</div>
								<a href="#">
									<img src="images/strawberry.jpg" alt=""/>
								</a>
							</div>
							<a href="#">
								<h1>新歓レク ―いちご狩り―</h1>
							</a>
						</li>

						<li class="wow fadeInDown" data-wow-delay=".5s" style="visibility: visible;">
							<div class="media">
								<div class="date">
									<span class="day">29</span>
									<span class="month">Apr</span>
								</div>
								<a href="#">
									<img src="images/takao_sub.jpg" alt=""/>
								</a>
							</div>
							<a href="#">
								<h1>新歓山行 ―大野山―</h1>
							</a>
						</li>

						<li class="wow fadeInDown" data-wow-delay=".6s" style="visibility: visible; animation-delay: 1.2s; animation-name: fadeInDown;">
							<div class="media">
								<div class="date">
									<span class="day">3</span>
									<span class="month">May</span>
								</div>
								<a href="#">
									<img src="images/takamatsu.jpg" alt=""/>
								</a>
							</div>
							<a href="#">
								<h1>新歓山行 ―陣馬山(予備日)― </h1>
							</a>
						</li>

						<li class="wow fadeInDown" data-wow-delay=".7s" style="visibility: visible;">
							<div class="media">
								<div class="date">
									<span class="day">5,6</span>
									<span class="month">May</span>
								</div>
								<a href="#">
									<img src="images/camp.jpg" alt=""/>
								</a>
							</div>
							<a href="#">
								<h1>新歓キャンプ ―奥多摩―</h1>
							</a>
						</li>
					</ul>

			</div>
		</div>

	</div> <!-- END fh5co-wrap -->


	<footer id="fh5co-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h3>TECKTECK新歓ウェブページ</h3>
					<p>東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認インカレアウトドアサークルTECKTECKの2018年度新歓用ウェブページ</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h3>リンク</h3>
					<ul>
						<li><a href="event">私たちの活動</a></li>
						<li><a href="qanda">Q&amp;A</a></li>
						<li><a href="contact">お問い合わせ</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h3>SNS・連絡先</h3>
					<ul class="fh5co-social">
						<li><a href="https://twitter.com/TECKTECK2018"><i class="icon-twitter"></i> <span>Twitter</span></a></li>
						<li><a href="#"><i class="icon-envelope"></i> <span>teck44th@gmail.com</span></a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 fh5co-copyright text-center">
					<p><small>&copy; 2018 TECKTECK. All Rights Reserved. </small></p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	<!-- WOW.js -->
	<script src="js/wow.min.js"></script>
	<script>
	  new WOW({
	    mobile: false
	  }).init();
	</script>

	</body>
</html>
<?php }
function RenderEventPage(){ ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>私たちの活動｜TECKTECK新歓ウェブページ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKの活動を紹介するページです。" />
	<meta name="keywords" content="TECKTECK, てくてく, 新歓, 東京大学, お茶の水女子大学, 東京女子大学, 日本女子大学, 公認, サークル, 登山, アウトドア, インカレ" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content="私たちの活動｜TECKTECK新歓ウェブページ"/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content="http://teckteckweb.tk/event"/>
	<meta property="og:site_name" content="TECKTECK新歓ウェブページ"/>
	<meta property="og:description" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKの活動を紹介するページです。"/>
	<meta name="twitter:title" content="私たちの活動｜TECKTECK新歓ウェブページ" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="http://teckteckweb.tk/event" />
	<meta name="twitter:card" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKの活動を紹介するページです。" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">

	<!-- Magnific Popup -->
	<!-- <link rel="stylesheet" href="css/magnific-popup.css"> -->
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-wrap">
		<header id="fh5co-header">
			<div class="container">
				<nav class="fh5co-main-nav">
					<ul>
						<li><a href="/"><span>ホーム</span></a></li>
						<li class="fh5co-active"><a href="event"><span>私たちの活動</span></a></li>
						<li><a href="qanda"><span>Q&amp;A</span></a></li>
						<li><a href="contact"><span>お問い合わせ</span></a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="fh5co-hero" style="background-image: url(images/our.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">私たちの活動</h1>
							<p>イベント盛りだくさんなTECKTECKの1年間をご紹介します</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="fh5co-section">
			<div class="container">
				<ul class="clearfix">
					<li class="wow fadeInDown" style="visibility: visible;">
						<div class="media">
							<a href="#1">
								<img src="images/sanko0.jpg" alt=""/>
							</a>
						</div>
						<a href="#1">
							<h1>週末山行</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".1s" style="visibility: visible;">
						<div class="media">
							<a href="#2">
								<img src="images/recu0.jpg" alt=""/>
							</a>
						</div>
						<a href="#2">
							<h1>週末レク</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".2s" style="visibility: visible;">
						<div class="media">
							<a href="#3">
								<img src="images/shinkangasshuku0.jpg" alt=""/>
							</a>
						</div>
						<a href="#3">
							<h1>新歓合宿</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".3s" style="visibility: visible;">
						<div class="media">
							<a href="#4">
								<img src="images/natsugasshuku0.jpg" alt=""/>
							</a>
						</div>
						<a href="#4">
							<h1>夏合宿</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".4s" style="visibility: visible; ">
						<div class="media">
							<a href="#5">
								<img src="images/natsuyama0.jpg" alt=""/>
							</a>
						</div>
						<a href="#5">
							<h1>夏山</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".5s" style="visibility: visible;">
						<div class="media">
							<a href="#6">
								<img src="images/natsurecu0.jpg" alt=""/>
							</a>
						</div>
						<a href="#6">
							<h1>夏レク</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".6s" style="visibility: visible;">
						<div class="media">
							<a href="#7">
								<img src="images/yousei0.jpg" alt=""/>
							</a>
						</div>
						<a href="#7">
							<h1>養成合宿</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".7s" style="visibility: visible;">
						<div class="media">
							<a href="#8">
								<img src="images/yamanote0.jpg" alt=""/>
							</a>
						</div>
						<a href="#8">
							<h1>山手レク</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".8s" style="visibility: visible;">
						<div class="media">
							<a href="#9">
								<img src="images/christmas0.jpg" alt=""/>
							</a>
						</div>
						<a href="#9">
							<h1>クリスマスパーティー</h1>
						</a>
					</li>

					<li class="wow fadeInDown" data-wow-delay=".9s" style="visibility: visible;">
						<div class="media">
							<img src="images/ski0.jpg" alt=""/>
							<a href="#10">
							</a>
						</div>
						<a href="#10">
							<h1>スキー合宿</h1>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="1" class="fh5co-parallax" style="background-image: url(images/sanko1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">週末山行</h1>
							<p>TECKTECKの活動の中心。東京近郊の山に登ります。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<p>TECKTECKの活動の中心となるのが週末山行です。丹沢や秩父、奥多摩など関東周辺の山に登ります。レベルも低・中・高と分かれており、いろいろな山に登ることができます。<br/>山頂からは、周囲の山々やふもとの街を一望できます。さらに、天気が良いとスカイツリーや富士山まで見えるような景色の良い山にもたくさん登るのでお楽しみに。<br/>また景色を楽しむだけでなく、山頂で自炊して皆で食べたり、下山後には温泉に入ったりご飯を食べに行ったりすることも。体力も回復し、仲間との絆もより一層深まります。</p>
					</div>
					<div class="col-md-7">
						<img src="images/sanko2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="2" class="fh5co-parallax" style="background-image: url(images/recu1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">週末レク</h1>
							<p>登山ばかりではない、そんなTECKTECKの一面です。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-7">
						<p>TECKTECKは山に登るだけでなく、週末にレク企画を行うこともあります。レクは企画を担当する人が何でも好きなことを計画できる、とっても自由な企画です。<br/>昨年は、横浜レクではカップヌードルミュージアムに行きオリジナルのカップヌードルを作ったり、ウォークラリーをして横浜の名所を巡りました。川越レクではガラス工芸を体験したり、古風な街並みで和菓子などの食べ歩きをしました。<br/>今年はどんなレクがあるでしょうか？楽しみにしておいてくださいね。</p>
					</div>
					<div class="col-md-7 col-md-pull-5">
						<img src="images/recu2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="3" class="fh5co-parallax" style="background-image: url(images/shinkangasshuku1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">新歓合宿</h1>
							<p>一番はじめの大きなイベントは、楽しみがたくさん。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<p>6/10(土)と11(日)の2日間、戦場ヶ原に合宿をしに行きます。<br/>皆さんが参加する新歓期には泊まり企画が2つあって、1つ目は新歓キャンプ、2つ目がこの新歓合宿です。<br/>この合宿の前までには大学毎に装備買い出しがあり、初めてザックを背負い、山靴をはいて、山ボーイ・山ガールとして参加する泊まり企画になります。</p>
					</div>
					<div class="col-md-7">
						<img src="images/shinkangasshuku2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="4" class="fh5co-parallax" style="background-image: url(images/natsugasshuku1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">夏合宿</h1>
							<p>楽しみてんこ盛りな、夏の一大イベント。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-7">
						<p>夏休み中に4泊5日で行われる合宿で、基本的に1年生と2年生のメンバー全員が参加します。<br/>昼はレベル別の山行orレク（選択制）、夜は花火やバーベキュー、肝試し、コンパなど企画が充実しています。<br/>同期や先輩との仲も深まる、とにかく楽しい企画です。</p>
					</div>
					<div class="col-md-7 col-md-pull-5">
						<img src="images/natsugasshuku2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="5" class="fh5co-parallax" style="background-image: url(images/natsuyama1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">夏山</h1>
							<p>非日常な絶景に身も心も洗われます。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<p>夏休み中に行われる夏山企画では、普段の週末山行では行けないような、レベルの高い山に泊まりがけで登ります。<br/>このような山では、普段登る山では見られないような絶景を見ることができ、とっても感動します。ぜひ参加してみてください。</p>
					</div>
					<div class="col-md-7">
						<img src="images/natsuyama2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="6" class="fh5co-parallax" style="background-image: url(images/natsurecu1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">夏レク</h1>
							<p>夏を味わい尽くす一大イベント</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-7">
						<p>この企画は、週末に行っていたレクの特大版で、夏休みに泊まりがけでお出掛けします。<br/>昨年は熱海、真鶴に行って、美味しい海鮮丼を食べたり、海に行きました。<br/>箱根ユネッサンにも行きました。今年の夏レクもお楽しみに。</p>
					</div>
					<div class="col-md-7 col-md-pull-5">
						<img src="images/natsurecu2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="7" class="fh5co-parallax" style="background-image: url(images/yousei1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">養成合宿</h1>
							<p>晩夏の山で心身ともに磨かれる合宿。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<p>男子養成は男子だけで、女子養成は女子だけで、泊まりがけで山に登ります。<br/>原則として、1年生と2年生のメンバー全員が参加します。<br/>養成というだけあって、体力や技術を先輩に教わりながら結構レベルの高い山に登ります。<br/>ここで男子力・女子力を養成しましょう。</p>
					</div>
					<div class="col-md-7">
						<img src="images/yousei2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="8" class="fh5co-parallax" style="background-image: url(images/yamanote1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">山手レク</h1>
							<p>東京のシンボル、山手線をテクテク一周。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-7">
						<p>山手線を皆で歩いて一周する、TECKTECKの秋の名物行事です。<br/>ちなみに山手線一周は約40kmです。これを二日間かけて歩きます。途中で観光名所にも寄るので飽きることはありません。<br/>TECKTECKの仲間と一緒に完歩して、この上ない達成感を味わいましょう。</p>
					</div>
					<div class="col-md-7 col-md-pull-5">
						<img src="images/yamanote2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="9" class="fh5co-parallax" style="background-image: url(images/christmas1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">クリスマスパーティー</h1>
							<p>フォーマルな衣装に身を包み、過ごす夜。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<p>お店を貸し切って12月中旬にクリスマスパーティーをします。<br/>男子はスーツ姿、女子はセミフォーマルで、普段とはまた違ったメンバーの姿を見ることができます。<br/>2次会以降はOBやOGも参加して大人数でわちゃわちゃするので、とっても楽しいです。</p>
					</div>
					<div class="col-md-7">
						<img src="images/christmas2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>


		<div id="10" class="fh5co-parallax" style="background-image: url(images/ski1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">スキー合宿</h1>
							<p>真冬の山で、ウィンタースポーツを。</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-7">
						<p>TECKTECKは安全面への配慮から冬山には登りませんが、スキー合宿はします。泊まりがけでスキーやスノボを楽しみます。<br/>先輩方もたくさんいらっしゃって楽しいです。初心者で不安だというあなた、安心してください。スキーやスノボの講習会もありますよ。</p>
					</div>
					<div class="col-md-7 col-md-pull-5">
						<img src="images/ski2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
					</div>
				</div>
			</div>
		</div>

	</div> <!-- END fh5co-wrap -->


	<footer id="fh5co-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h3>TECKTECK新歓ウェブページ</h3>
					<p>東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認インカレアウトドアサークルTECKTECKの2018年度新歓用ウェブページ</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h3>リンク</h3>
					<ul>
						<li><a href="event">私たちの活動</a></li>
						<li><a href="qanda">Q&amp;A</a></li>
						<li><a href="contact">お問い合わせ</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h3>SNS・連絡先</h3>
					<ul class="fh5co-social">
						<li><a href="https://twitter.com/TECKTECK2018"><i class="icon-twitter"></i> <span>Twitter</span></a></li>
						<li><a href="#"><i class="icon-envelope"></i> <span>teck44th@gmail.com</span></a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 fh5co-copyright text-center">
					<p><small>&copy; 2018 TECKTECK. All Rights Reserved. </small></p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	<!-- WOW.js -->
	<script src="js/wow.min.js"></script>
	<script>
	  new WOW({
	    mobile: false
	  }).init();
	</script>

	</body>
</html>
<?php }
function RenderQandAPage(){ ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Q&amp;A｜TECKTECK新歓ウェブページ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKのQ&Aページです。" />
	<meta name="keywords" content="TECKTECK, てくてく, 新歓, 東京大学, お茶の水女子大学, 東京女子大学, 日本女子大学, 公認, サークル, 登山, アウトドア, インカレ" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content="Q&A｜TECKTECK新歓ウェブページ"/>
	<meta property="og:image" content="images/logo.jpg"/>
	<meta property="og:url" content="http://teckteckweb.tk/qanda"/>
	<meta property="og:site_name" content="TECKTECK新歓ウェブページ"/>
	<meta property="og:description" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKのQ&Aページです。"/>
	<meta name="twitter:title" content="Q$A｜TECKTECK新歓ウェブページ" />
	<meta name="twitter:image" content="images/logo.jpg" />
	<meta name="twitter:url" content="http://teckteckweb.tk/qanda" />
	<meta name="twitter:card" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKのQ&Aページです。" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="images/favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">

	<!-- Magnific Popup -->
	<!-- <link rel="stylesheet" href="css/magnific-popup.css"> -->
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-wrap">
		<header id="fh5co-header">
			<div class="container">
				<nav class="fh5co-main-nav">
					<ul>
						<li><a href="/"><span>ホーム</span></a></li>
						<li><a href="event"><span>私たちの活動</span></a></li>
						<li class="fh5co-active"><a href="qanda"><span>Q&amp;A</span></a></li>
						<li><a href="contact"><span>お問い合わせ</span></a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="fh5co-hero" style="background-image: url(images/qanda.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">Q&amp;A</h1>
							<p>気になる質問、お答えします</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<dl>
						<dt>Q掛け持ちはできる？</dt><dd>A活動日が週末以外のサークルなら可能です。</dd>
						<dt>Qかかるお金はどれくらい？</dt><dd>A山靴やセパレなど、山に必要な装備に数万円かかります。また入会費は2,000円、年会費は6,000円となっています。</dd>
						<dt>Q山のレベルは？</dt><dd>A週末山行は初心者でも大丈夫です！また夏山は3000m級の山を登りますが、その頃には週末山行で十分に経験を積んでいます。ペースも一年生に合わせるのでご心配なく。</dd>
						<dt>Q本当に安全？？</dt><dd>A冬山や沢登りはしません。また、すべての企画は先輩方と安全性をじっくり審議したうえで実施しています。</dd>
						<dt>Q何人くらいのサークル？</dt><dd>A1学年25～35人くらいです。</dd>
						<dt>Q2年生からも入れる？</dt><dd>A入れます。ただし44期（一年生と同じ扱い）になります。</dd>
						<dt>Qセレクションはある？</dt><dd>A入会希望者が想定を超えた際、抽選を行うことがあります。多すぎると山での安全が確保できなくなる可能性があるためです。</dd>
					</dl>
				</div>
			</div>
		</div>

	</div> <!-- END fh5co-wrap -->


	<footer id="fh5co-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h3>TECKTECK新歓ウェブページ</h3>
					<p>東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認インカレアウトドアサークルTECKTECKの2018年度新歓用ウェブページ</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h3>リンク</h3>
					<ul>
						<li><a href="event">私たちの活動</a></li>
						<li><a href="qanda">Q&amp;A</a></li>
						<li><a href="contact">お問い合わせ</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h3>SNS・連絡先</h3>
					<ul class="fh5co-social">
						<li><a href="https://twitter.com/TECKTECK2018"><i class="icon-twitter"></i> <span>Twitter</span></a></li>
						<li><a href="#"><i class="icon-envelope"></i> <span>teck44th@gmail.com</span></a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 fh5co-copyright text-center">
					<p><small>&copy; 2018 TECKTECK. All Rights Reserved. </small></p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>
<?php }
function RenderContactPage(){ ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>お問い合わせ｜TECKTECK新歓ウェブページ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKのお問い合わせページです。" />
	<meta name="keywords" content="TECKTECK, てくてく, 新歓, 東京大学, お茶の水女子大学, 東京女子大学, 日本女子大学, 公認, サークル, 登山, アウトドア, インカレ" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content="お問い合わせ｜TECKTECK新歓ウェブページ"/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content="http://teckteckweb.tk/contact"/>
	<meta property="og:site_name" content="TECKTECK新歓ウェブページ"/>
	<meta property="og:description" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKのお問い合わせページです。"/>
	<meta name="twitter:title" content="お問い合わせ｜TECKTECK新歓ウェブページ" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="http://teckteckweb.tk/contact" />
	<meta name="twitter:card" content="東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKのお問い合わせページです。" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">

	<!-- Magnific Popup -->
	<!-- <link rel="stylesheet" href="css/magnific-popup.css"> -->
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div id="fh5co-wrap">
		<header id="fh5co-header">
			<div class="container">
				<nav class="fh5co-main-nav">
					<ul>
						<li><a href="/"><span>ホーム</span></a></li>
						<li><a href="event"><span>私たちの活動</span></a></li>
						<li><a href="qanda"><span>Q&amp;A</span></a></li>
						<li class="fh5co-active"><a href="contact"><span>お問い合わせ</span></a></li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="fh5co-hero" style="background-image: url(images/contact.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell">
							<h1 class="text-center">お問い合わせ</h1>
							<p>気になることを、実際のサークルの人に聞いてみる。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="fh5co-section">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<h2>お問い合わせ</h2>
						<p>何か聞きたいことがありましたら、掲載されている連絡先のメールアドレスに直接連絡していただくか、こちらのフォームからご連絡くださるようお願いします。担当者がお答えします。</p>

						<p>東京大学インカレアウトドアサークルTECKTECK<br/>2018年度新歓委員</p>
						<p>teck44th@gmail.com</p>
					</div>
					<div class="col-md-6 col-md-push-1">
						<form action="mail" method="POST">
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="お名前">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="メールアドレス">
							</div>
							<div class="form-group">
								<textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="問い合わせ内容"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" value="問い合わせる" class="btn btn-primary btn-md">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div> <!-- END fh5co-wrap -->


	<footer id="fh5co-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h3>TECKTECK新歓ウェブページ</h3>
					<p>東京大学・お茶の水女子大学・東京女子大学・日本女子大学からなる公認登山&amp;アウトドアサークルTECKTECKの2018年度新歓用ウェブページ</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h3>リンク</h3>
					<ul>
						<li><a href="event">私たちの活動</a></li>
						<li><a href="qanda">Q&amp;A</a></li>
						<li><a href="contact">お問い合わせ</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h3>SNS・連絡先</h3>
					<ul class="fh5co-social">
						<li><a href="https://twitter.com/TECKTECK2018"><i class="icon-twitter"></i> <span>Twitter</span></a></li>
						<li><a href="#"><i class="icon-envelope"></i> <span>teck44th@gmail.com</span></a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 fh5co-copyright text-center">
					<p><small>&copy; 2018 TECKTECK. All Rights Reserved. </small></p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>
<?php }

function SendMail(){
	$subject = $_POST['name'] . '(' . $_POST['email'] . ')より｜新歓サイトからの問い合わせ';
	$body = $_POST['content'];
	$to = 'teck44th@gmail.com';
  $from = 'teckteck.web@gmail.com';
  $pass = 'efwjW3HnjhJDJGpd';
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->CharSet = 'utf-8';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = $from;
  $mail->Password = $pass;
  $mail->setFrom($from);
  $mail->addReplyTo($from);
  $mail->addAddress($to);
  $mail->Subject = $subject;
  $mail->Body = $body;
  $mail->send();
  header('Location: /',true,303);exit;
}
