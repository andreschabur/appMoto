<?PHP
  // Adapted for The Art of Web: www.the-art-of-web.com
  // Please acknowledge use of this code by including this header.

  // initialise image with dimensions of 160 x 45 pixels
  $image = @imagecreatetruecolor(160, 45) or die("Cannot Initialize new GD image stream");

  // set background and allocate drawing colours
  $background = imagecolorallocate($image, 0x66, 0xCC, 0xFF);
  imagefill($image, 0, 0, $background);
  $linecolor = imagecolorallocate($image, 0x33, 0x99, 0xCC);
  $textcolor1 = imagecolorallocate($image, 0x00, 0x00, 0x00);
  $textcolor2 = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);

  // draw random lines on canvas
  for($i=0; $i < 8; $i++) {
    imagesetthickness($image, rand(1,3));
    imageline($image, rand(0,160), 0, rand(0,160), 45, $linecolor);
  }

 // using a mixture of system and GDF fonts
  $fonts = array(3,4,5);
$fontdir = '/usr/share/fonts/truetype';
//  $fonts[] = imageloadfont("$fontdir/bmcorrode.gdf");
  //$fonts[] = imageloadfont("$fontdir/freefont/FreeSerifBoldItalic.ttf");
// $fonts[] = imageloadfont("$fontdir/msttcorefonts/Arial.ttf"); 
// $fonts[] = imageloadfont("$fontdir/dejavu/DejaVuSans.ttf");  
  //$fonts[] = imageloadfont("$fontdir/bmreceipt.gdf");
//  $fonts[] = imageloadfont("$fontdir/checkbook.gdf");
  //shuffle($fonts);

  session_start();

  // using a mixture of TTF fonts
  /*$fonts = array();
  $fonts[] = "ttf-dejavu/DejaVuSerif-Bold.ttf";
  $fonts[] = "ttf-dejavu/DejaVuSans-Bold.ttf";
  $fonts[] = "ttf-dejavu/DejaVuSansMono-Bold.ttf";*/

  // add random digits to canvas using random black/white colour
  $digit = '';
  for($x = 1; $x <= 13; $x += 3) {
    $textcolor = (rand() % 2) ? $textcolor1 : $textcolor2;
    $digit .= ($num = rand(0, 9));
//    imagettftext($image, 20, rand(-30,30), $x, rand(20, 42), $textcolor, $fonts[array_rand($fonts)], $num);
	$posicionX = $x * 10;
	$posicionY = rand(2, 25);
//	imagechar($image, array_pop($fonts), $posicionX, $posicionY, $num, $textcolor);
	imagechar($image, rand(3,5), $posicionX, $posicionY, $num, $textcolor);
  }

  // record digits in session variable
  $_SESSION['digit'] = $digit;

  // display image and clean up
  header('Content-type: image/png');
  imagepng($image);
  imagedestroy($image);
?>
