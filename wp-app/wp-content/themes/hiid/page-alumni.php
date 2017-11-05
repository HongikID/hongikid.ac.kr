<?php
get_header();
the_post();
$data = json_decode(get_the_content(), true);
?>
<div class="alumni">
    <section class="alumni__header">
        <div class="container">
            <h1 class="alumni__header__title">HID Community</h1>
            <h2 class="alumni__header__slogan">HID<br>In All Field<br>In All World</h2>
            <div class="row">
                <div class="col-sm-12 col-md-6 alumni__header__section">
                    <h3 class="alumni__community__title">Online Community</h3>
                    <ul class="alumni__community__list">
                        <?php
                            foreach ($data['community'] as $community) {
                        ?>
                        <li class="alumni__community__list__item">
                            <a class="alumni__community__list__item__link" href="<?php echo $community['url'] ?>" target="_blank"><?php echo $community['title'] ?></a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 alumni__header__section">
                    <h3 class="alumni__update__title">Update Your Info</h3>
                    <a href="<?php echo $data['update_form_url'] ?>" class="alumni__update__link">산디과 동문회 연락처 입력</a>
                </div>
            </div>
        </div>
    </section>
    <section class="alumni__members">
        <div class="container">
            <h1 class="alumni__members__title">Alumni</h1>
            <h2 class="alumni__members__slogan">HID Throughout<br>The World Help You,<br>And Share Information.</h2>
            <ul id="alumni__members__list" class="alumni__members__list" role="tablist">
                <?php
                    $length = count($data['alumni']);
                    for ($idx = 0; $idx < $length; $idx ++) {
                        $member = $data['alumni'][$idx];
                ?>
                <li class="alumni__member">
                    <a data-toggle="collapse" class="alumni__member__header__toggle" href="#alumni__member__body-<?php echo $idx ?>">
                        <div id="alumni__member__header-<?php echo $idx ?>" class="alumni__member__header row" role="tab">
                            <div class="col-3 col-md-2">
                                <span class="alumni__member__name"><?php echo $member['name'] ?></span>
                            </div>
                            <div class="col-7 col-md-9 alumni__member__summary__wrapper">
                                <span class="alumni__member__summary"><?php echo $member['summary'] ?>, <?php echo $member['nation'] ?></span>
                            </div>
                            <div class="col-2 col-md-1">
                                <span class="alumni__member__toggle"></span>
                            </div>
                        </div>
                    </a>
                    <div id="alumni__member__body-<?php echo $idx ?>" class="collapse" role="tabpanel" data-parent="#alumni__members__list">
                        <ul class="alumni__member__positions">
                            <?php
                                foreach ($member['positions'] as $position) {
                            ?>
                            <li class="alumni__member__position row">
                                <div class="col-12 offset-sm-2 col-sm-2">
                                    <span class="alumni__member__position__label"><?php echo $position['range'] ?></span>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <span class="alumni__member__position__description"><?php echo $position['position'] ?></span>
                                </div>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </section>
</div>
<?php
get_footer();
?>
