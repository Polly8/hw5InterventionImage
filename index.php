<?php

require 'vendor/autoload.php';



// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;


// create an image manager instance with favored driver
$manager = new ImageManager(array('driver' => 'gd'));

// to finally create image instances
$image = $manager->make('jokes.png')->resize(200, null, function ($constraint) {

	$constraint->aspectRatio();
});


$image->text('MyWaterText', $image->getWidth() / 2, $image->getHeight(), function($font){

	$font->file(__DIR__.'./LondrinaSolid-Regular.ttf');
	$font->size(22);
	$font->color(array(255, 255, 255, 0.5));
	$font->align('center');

});

echo $image->response('png');


