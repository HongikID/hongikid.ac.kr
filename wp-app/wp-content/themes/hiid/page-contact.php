<?php
get_header();
the_post();
$data = json_decode(get_the_content(), true);
?>
<div class="contact">
    <div class="container">
        <div class="contact__office">
            <h1 class="contact__office__title">Office Info</h1>
            <dl class="contact__office__list">
                <div class="contact__office__list__item row">
                    <dt class="col-sm-3">Address</dt>
                    <dd class="col-sm-9">서울시 마포구 와우산로 94 홍익대학교 조형관 904호</dd>
                </div>
                <div class="contact__office__list__item row">
                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9"><a href="mailto:hiid@hongik.ac.kr">hiid@hongik.ac.kr</a></dd>
                </div>
                <div class="contact__office__list__item row">
                    <dt class="col-sm-3">Tel</dt>
                    <dd class="col-sm-9"><a href="tel:+8223201215">02 320 1215</a></dd>
                </div>
                <div class="contact__office__list__item row">
                    <dt class="col-sm-3">Fax</dt>
                    <dd class="col-sm-9"><a href="fax:+8223244265">02 324 4265</a></dd>
                </div>
                <div class="contact__office__list__item row">
                    <dt class="col-sm-3">Opening Hour</dt>
                    <dd class="col-sm-9">월-금 9:00 ~ 17:00</dd>
                </div>
            </dl>
        </div>
        <div class="contact__admission">
            <h1 class="contact__admission__title">Admission</h1>
            <h2 class="contact__admission__subject">홍익대학교 입학 관리 본부</h2>
            <dl class="contact__admission__list">
                <div class="contact__admission__list__item row">
                    <dt class="col-sm-3">Address</dt>
                    <dd class="col-sm-9">홍익대학교 서울캠퍼스 와우관 1층</dd>
                </div>
                <div class="contact__admission__list__item row">
                    <dt class="col-sm-3">Tel</dt>
                    <dd class="col-sm-9"><a href="tel:+8223201056">02 320 1056~8</a></dd>
                </div>
            </dl>
            <a class="contact__admission__link" href="https://ibsi.hongik.ac.kr/gate.html#" target="_blank">입시 요강 바로가기</a>
        </div>
    </div>
</div>
<?php
get_footer();
?>
