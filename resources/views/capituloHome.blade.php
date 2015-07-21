<!DOCTYPE html >
<html lang="en" class=" js csstransitions">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Capitulos</title>
        {{--<meta name="description" content="Thumbnail Grid with Expanding Preview" />
        <meta name="keywords" content="thumbnails, grid, preview, google image search, jquery, image grid, expanding, preview, portfolio" />--}}
		<meta name="author" content="Codrops" />
		<link rel="stylesheet" type="text/css" href="ContentExpander/css/default.css" />
		<link rel="stylesheet" type="text/css" href="ContentExpander/css/component.css" />
		<script src="ContentExpander/js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">	
			<!-- Codrops top bar -->
			<div class="codrops-top clearfix">
				<a href="http://tympanus.net/Tutorials/HexaFlip/"><strong>&laquo; Previous Demo: </strong>HexaFlip</a>
				<span class="right">
					<a href="http://cargocollective.com/jaimemartinez">Illustrations by Jaime Martinez</a>
					<a href="http://tympanus.net/codrops/?p=14530"><strong>Back to the Codrops Article</strong></a>
				</span>
			</div><!--/ Codrops top bar -->
			<header class="clearfix">
				<h1>Thumbnail Grid <span>with Expanding Preview</span></h1>	
			</header>
			<div class="main">
				<ul id="og-grid" class="og-grid">
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="ContentExpander/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="ContentExpander/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="ContentExpander/images/2.jpg" data-title="Veggies sunt bona vobis" data-description="Komatsuna prairie turnip wattle seed artichoke mustard horseradish taro rutabaga ricebean carrot black-eyed pea turnip greens beetroot yarrow watercress kombu.">
							<img src="ContentExpander/images/thumbs/2.jpg" alt="img02"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="ContentExpander/images/3.jpg" data-title="Dandelion horseradish" data-description="Cabbage bamboo shoot broccoli rabe chickpea chard sea lettuce lettuce ricebean artichoke earthnut pea aubergine okra brussels sprout avocado tomato.">
							<img src="ContentExpander/images/thumbs/3.jpg" alt="img03"/>
						</a>
					</li>
					<li>
						<a href="http://cargocollective.com/jaimemartinez/" data-largesrc="ContentExpander/images/1.jpg" data-title="trigonometria" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
							<img src="ContentExpander/images/thumbs/1.jpg" alt="img01"/>
						</a>
					</li>

				</ul>
				<p>Filler text by <a href="http://veggieipsum.com/">Veggie Ipsum</a></p>
				<a id="og-additems" href="#">add more</a>
			</div>
		</div><!-- /container -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="ContentExpander/js/grid.js"></script>
		<script>
			$(function() {
				Grid.init();
			});
		</script>
	</body>
</html>