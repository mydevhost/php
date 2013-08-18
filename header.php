<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
  <title><?php echo $page_title; ?></title>
  <meta http-equiv="Content-Type"
content="text/html;charset=utf-8" />
  <?php foreach ( $css_files as $css ): ?>
    <link rel="stylesheet" type="text/css" media="screen,projection"
    href="css/<?php echo $css; ?>" />
  <?php endforeach; ?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
</script>
  <script type="text/javascript"
src="init.js">
</script>
  <style type="text/css">
  </style>
 </head>
 <body>
