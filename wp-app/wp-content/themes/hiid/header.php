<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdn.rawgit.com/theeluwin/NotoSansKR-Hestia/master/stylesheets/NotoSansKR-Hestia.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
</head>
<body <?php body_class(); ?> onscroll="onPageScrolled();">

<header>
    <div class="header__title container">
        <a href="javascript:void(0);" id="header__nav__toggle-btn" onclick="onNavToggleButtonClicked();">메뉴 여닫기</a>
        <h1 id="header__title__logo">Hongik Industrial Design</h1>
    </div>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'header',
            'menu_id' => 'header__nav__list',
            'menu_class' => 'container',
            'container' => 'nav',
            'container_id' => 'header__nav'
        )
    );
    ?>
</header>

<main id="container" class="container">
