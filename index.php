<?php
	/* 	Copyright by Chromed - http://github.com/Chromed/
		All rights reserved. */

	$img = imagecreate(500, 20);
	$full = $_GET['total'];
	$stat = $_GET['status'];
	
	if(!is_numeric($full) || !is_numeric($stat)) { $full = 100; $stat = 0; }
	if($full < 1) { $full = 1; $stat = 0; }
	if($stat < 0) { $stat = 0; }
	
	// define colors || Farben definieren
	$bgcol = imagecolorallocatealpha($img, 200, 200, 200, 127);
	$color = imagecolorallocate($img, 5, 55, 74);
	$fontcolor = imagecolorallocate($img, 100, 9, 9);
	
	// select font || Schriftart auswählen
	$bodoni = "font_bodoni.ttf";
	
	imagefill($img, 0, 0, $bgcol);
	
	$p = round(($stat * 100) / $full, 2);
	$w = (500 * $p) / 100;
	
	imagefilledrectangle($img, 0, 0, $w, 20, $color);
	
	imagettftext($img, 10, 0, 240, 15, $fontcolor, $bodoni, $p."%");
	
	header("Content-Type: image/png");
	imagepng($img);
	imagedestroy($img);
?>