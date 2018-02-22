<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- include head.html -->
  <title><?php echo TitleSEO('metaTitle');  ?></title>
  <meta name="description" content="<?php echo TitleSEO('metaDescription');  ?>">
  <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
  <!-- favicon -->
  <link href="<?php bloginfo( 'stylesheet_directory' ) ?>/dist/images/favicon.ico" type="image/x-icon" rel="icon">
  <!-- meta social -->
  <meta name="twitter:card" content="<?php echo TitleSEO('metaCard');?>"/>
  <meta name="twitter:site" content="<?php echo TitleSEO('metaSite');?>"/>
  <meta name="twitter:creator" content="<?php echo TitleSEO('metaCreator');?>"/>
  <meta property="og:description" content="<?php echo TitleSEO('metaDescription');?>"/>
  <meta property="og:image" content="<?php echo TitleSEO('metaImage');?>"/>

  <meta property="og:image:width" content="<?php echo TitleSEO('metaImageWidth');?>">
  <meta property="og:image:height" content="<?php echo TitleSEO('metaImageHeight');?>">
  <meta property="og:locale" content="en_us" />
  <meta name="twitter:url" content="<?php echo TitleSEO('metaUrl');?>"/>
  <meta name="twitter:title" content="<?php echo TitleSEO('metaTitle');?>"/>
  <meta name="twitter:description" content="<?php echo TitleSEO('metaDescription');?>"/>
  <meta name="twitter:image" content="<?php echo TitleSEO('metaImage');?>"/>

  <meta property="og:site_name" content="<?php echo TitleSEO('metaSiteName');?>">
  <meta property="og:title" content="<?php echo TitleSEO('metaTitle');?>"/>
  <meta property="og:type" content="<?php echo TitleSEO('metaType');?>">
  <meta property="og:url" content="<?php echo TitleSEO('metaUrl');?>"/>
  <meta name="keywords" content="<?php echo TitleSEO('metaKeyword');?>"/>
@php(wp_head())
</head>
