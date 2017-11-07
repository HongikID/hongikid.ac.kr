<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff" />

    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>

    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php bloginfo('name'); ?><?php wp_title('|'); ?>"/>
    <meta property="og:url" content="<?php echo (is_category() ? get_category_link(get_the_category()[0]->term_id)  : get_the_permalink());?>">

    <?php
        $ogImage = "http://hongikid.ac.kr/wp-content/uploads/og.png";
        $ogDescription = get_bloginfo('description');

        if (is_category()) {
            $data = explode("?=?", get_the_category()[0]->description);
            $ogImage = $data[1];
            $ogDescription = $data[2];
        } elseif (is_single()) {
            the_post();
            $data = json_decode(get_the_content(), true);
            $ogImage = $data['main_image'];
            $ogDescription = $data['description_ko'];
        } elseif (is_page('about')) {
            $ogDescription = '산업디자인 전공은 현대사회가 지향하는 새로운 가치와 환경자원, 생활문화 창출을 위한 인공환경의 제 문제를 다각적으로 해석하고 종합, 창조할 수 있는 폭넓은 학제적 접근을 통해 합리적 디자인 사고능력과 독창적 조형능력을 함양하여, 21세기 시대정신을 이끌고 미래 디자인의 주역이 될 수 있는 디자이너를 양성하는 데 교육의 목표를 두고 있다. 또한 전통에서 지혜를, 자연에서 미래를 도출하는 체계적인 조형훈련과 창의적인 사고의 발상을 위한 기초교육으로 형태와 기능, 평면과 입체표현, 조형심리학, 인간공학 등의 기초과정 및 제품.운송기기디자인 영역과 공간디자인 영역의 세부전공별 교과를 마련하고, 디자인 세미나, 산학협동연구 등 현장수업과 현대디자인론, 디자인 매니지먼트, 디자인 서사학 등의 이론 중심 교과로 보다 전문성 있는 창의력 개발과 기업과의 산학협동을 병행, 사회에 기여할 수 있는 전문 디자이너 교육을 지향하고 있다.';
        }
    ?>
    <meta property="og:image" content="<?php echo $ogImage ?>" />
    <meta property="description" content="<?php echo $ogDescription ?>"/>
    <meta property="og:description" content="<?php echo $ogDescription ?>"/>

    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdn.rawgit.com/theeluwin/NotoSansKR-Hestia/master/stylesheets/NotoSansKR-Hestia.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body <?php body_class(); ?>>

<header>
    <nav class="header__nav navbar fixed-top navbar-expand-md navbar-light">
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="/"><span class="navbar-brand"></span></a>
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'header',
                'container'       => 'div',
                'container_id'    => 'bs4navbar',
                'container_class' => 'collapse navbar-collapse',
                'menu_id'         => 'header__nav__menu',
                'menu_class'      => 'navbar-nav mr-auto',
                'depth'           => 2,
                'fallback_cb'     => 'bs4navwalker::fallback',
                'walker'          => new bs4navwalker()
            )
        );
        ?>
    </nav>
    <div class="header__nav--fake"></div>
</header>

<main>
