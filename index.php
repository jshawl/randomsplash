<?php
  error_reporting(1);
  $data = file_get_contents('http://api.tumblr.com/v2/blog/unsplash.tumblr.com/posts/photo/?api_key=YOUR_API_KEY_HERE');
  $data = json_decode($data);
  // count the images
  $count = count($data->response->posts);
  // pick a random one
  $index =  rand(0,$count-1);
  $image = $data->response->posts[$index];
  $original_size = $image->photos[0]->original_size->url;
  // serve it as an image
  $im = imagecreatefromjpeg($original_size);
  header('Content-Type: image/jpeg');
  imagejpeg($im);
  imagedestroy($im);
?>
