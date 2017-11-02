<?php
get_header();

the_post();
$data = json_decode(get_the_content(), true);
?>
<div class="work container">
    <div class="work__header">
        <?php
            $exhibitionSlug = get_the_category()[0]->slug;
            $exhibitionUrl = "/exhibitions/${exhibitionSlug}";
        ?>
        <a href="<?php echo $exhibitionUrl ?>" class="work__header__link"><?php echo $data['category']?></a>
    </div>
    <article class="work__body row">
        <div class="col-md-6">
            <h1 class="work__title"><?php echo $data['title']?></h1>
            <h2 class="work__subject"><?php echo $data['subject']?></h2>
            <p class="work__description"><?php echo $data['description']?></p>
            <ul class="work__designers">
                <?php
                    foreach ($data['designers'] as $designer) {
                ?>
                <li class="work__designers__item"><?php echo $designer ?></li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <div class="work__gallery col-md-6 container-fluid">
            <img class="work__gallery__image work__gallery__image--main" src="<?php echo $data['main_image'] ?>" alt="<?php echo "${data['title']} 대표 이미지" ?>">
            <div class="work__gallery__images row">
                <?php
                    $length = count($data['additional_images']);
                    $col = 12 / $length;
                    for ($idx = 0; $idx < $length; $idx ++) {
                        $image = $data['additional_images'][$idx];
                        $alt_idx = $idx + 1
                ?>
                    <div class="work__gallery__image__wrapper col-sm-12 col-md-<?php echo $col ?>">
                        <img class="work__gallery__image work__gallery__image--additional" src="<?php echo $image ?>" alt="<?php echo "${data['title']} 추가 이미지 ${alt_idx}" ?>">
                    </div>
                <?php
                    }

                ?>
            </div>
        </div>
    </article>
    <div class="work__footer row">
        <div class="work__footer__wrapper work__footer__wrapper--prev col-sm-6">
        <?php
        $prev_post = get_previous_post(true);
        if (!empty($prev_post)) {
            $prev_content = $prev_post->post_content;
            $prev_data = json_decode($prev_content, true);
            $prev_main_image = $prev_data['main_image'];
        ?>
            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"
               class="work__footer__link work__footer__link--prev">
                Previous
                <img src="<?php echo $prev_main_image ?>" alt="<?php echo $prev_data['title'] ?>" height="260px">
            </a>
        <?php
        } else { ?>
            <a class="work__footer__link work__footer__link--prev disable invisible">Previous</a>
        <?php
        } ?>
        </div>

        <div class="work__footer__wrapper work__footer__wrapper--next col-sm-6">
        <?php
        $next_post = get_next_post(true);
        if (!empty($next_post)) {
            $next_content = $next_post->post_content;
            $next_data = json_decode($next_content, true);
            $next_main_image = $next_data['main_image'];
        ?>
            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"
               class="work__footer__link work__footer__link--next">
                <img src="<?php echo $next_main_image ?>" alt="<?php echo $next_data['title'] ?>" height="260px">
                Next
            </a>
            <?php
        } else { ?>
            <a class="work__footer__link work__footer__link--next disable invisible">Next</a>
            <?php
        } ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
