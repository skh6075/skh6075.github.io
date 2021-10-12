<?php

/*
Template Name: assignment-slide
 */

//put function.php file

if(!function_exists('onStartSlideShow')){
	function onStartSlideShow($atts) : string{
		$atts = shortcode_atts(array(
			'do' => false,
			'slides' => 0
		), $atts, 'call-show');
		return json_encode($atts);
	}
	add_shortcode('call-show', 'onStartSlideShow');
}

/////////////////////////////////////////////////////////////

$get = do_shortcode('[call-show do="true" slides="10"]');
$atts = json_decode($get, true);

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<?php
		if($atts['do'] === false || $atts['slides'] <= 0){
			echo '<script> alert("작동될 슬라이드가 없습니다."); </script>';
		}
		?>
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel=“stylesheet” href=“https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css”>
		<script src="https://code.jquery.com/jquery-3.6.0.js"
				integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<style>/* 임시 삽입: 확인용 */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .slick-sample {
                position: relative;
                width: 80%;
                height: 400px;
                margin: 0 auto;
            }

            .slick-sample div {
                height: 100%;
                width: 100%;
                font-size: 24px;
                color: #000000;
            }

            .slick-arrow {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                z-index: 10;
                border: none;
                background: transparent;
                cursor: pointer;
                font-size: 48px;
            }

            .slick-prev {
                left: -5%;
            }

            .slick-next {
                right: -5%;
            }

            .slick-dots {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            .slick-dots li {
                display: inline-block;
                margin: 0 7px;
            }

            .slick-dots li button {
                width: 12px;
                height: 12px;
                background: #000000;
                border-radius: 50%;
                cursor: pointer;
            }

		</style>
		<?php
		echo '<style>';
		for($i = 1; $i <= $atts["slides"]; $i++){
			[$r, $g, $b] = [random_int(0, 255), random_int(0, 255), random_int(0, 255)];
			echo '.slick-sample .slick' . $i . '{ background: rgb(' . $r . ', ' . $g . ', ' . $b . '); }';
		}
		echo '</style>';
		?>
	</head>
	<body>
		<?php
		echo '<div class="slick-sample">';
		for($i = 1; $i <= $atts['slides']; $i++){
			$className = "slick" . $i;
			echo '<div class="' . $className . '">Slide' . $i . '</div>';
		}
		echo '</div>';
		?>
		<script>
			jQuery(document).ready(function () {
				jQuery('.slick-sample').slick({
					infinite: true,
					arrows: true,
					dots: true,
					autoplay: true,
					speed: 300,
					autoplay_speed: 10000,
					prevArrow: "<button type='button' class='slick-prev'>&lt;</button>",
					nextArrow: "<button type='button' class='slick-next'>&gt;</button>",
					slidesToShow: 1,
					slidesToScroll: 1
				});
				jQuery('.slick-dots li button').text('');
			});

		</script>
</html>
