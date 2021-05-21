<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?php ligerbots_relative_to_theme("/assets/images/liger.ico")?>"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Serif:700" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script  type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="header-ghost" ></div>

<div class="container-fluid no-side-padding">
	<div class="col-xs-12 no-side-padding">
		<?php get_template_part( 'template-parts/heading' ); ?>
		<?php get_template_part( 'template-parts/navbar' ); ?>

		<div class="row page-body home-page-body">
			<div class="col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">

				<div class="row top-spacer"> </div>
