<?php
get_header();

the_post();
$currentPostId = get_the_ID();
$data = json_decode(get_the_content(), true);
?>
<div class="work container">
    <div class="work__header">
        <?php
            $currentCat = get_the_category()[0];
            $exhibitionSlug = $currentCat->slug;
            $exhibitionUrl = "/exhibitions/${exhibitionSlug}";
        ?>
        <a href="<?php echo $exhibitionUrl ?>" class="work__header__link"><?php echo $data['category']?></a>
    </div>
    <article class="work__body row">
        <div class="col-12 col-sm-12 col-md-6">
            <h1 class="work__title"><?php echo $data['title']?></h1>
            <h2 class="work__subject"><?php echo $data['subject']?></h2>
            <p class="work__description work__description--ko"><?php echo $data['description_ko']?></p>
            <p class="work__description work__description--en"><?php echo $data['description_en']?></p>
            <ul class="work__designers">
                <?php
                    foreach ($data['designers'] as $designer) {
                ?>
                <li class="work__designers__item">
                    <?php
                        if ($designer['profile_url']) {
                            $designerUrl = $designer['profile_url'];
                            if (strpos($designerUrl, '@') !== false) {
                                $designerUrl = 'mailto:' . $designerUrl;
                            }
                    ?>
                        <a href="<?php echo $designerUrl ?>">
                    <?php
                        }
                    ?>

                    <?php echo $designer['name'] ?>

                    <?php
                    if ($designer['profile_url']) {
                    ?>
                        </a>
                    <?php
                    }
                    ?>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <div class="work__gallery col-12 col-sm-12 col-md-6">
            <img class="work__gallery__image work__gallery__image--main" src="<?php echo $data['main_image'] ?>" alt="<?php echo "${data['title']} 대표 이미지" ?>">
            <div class="work__gallery__images">
                <div class="row">
                    <?php
                        $length = count($data['additional_images']);
                        $col = 12 / $length;
                        for ($idx = 0; $idx < $length; $idx ++) {
                            $image = $data['additional_images'][$idx];
                            $alt_idx = $idx + 1
                    ?>
                        <div class="work__gallery__image__wrapper col-12 col-sm-12 col-md-<?php echo $col ?>">
                            <img class="work__gallery__image work__gallery__image--additional" src="<?php echo $image ?>" alt="<?php echo "${data['title']} 추가 이미지 ${alt_idx}" ?>">
                        </div>
                    <?php
                        }

                    ?>
                </div>
            </div>
        </div>
    </article>
    <?php
        $query = new WP_Query( array( 'cat' => $currentCat->term_id, 'posts_per_page' => -1) );

        function getId($p) {
            return $p->ID;
        }

        $posts = $query->posts;
        $postIds = array_map("getId", $posts);

        $currentIndex = array_search($currentPostId, $postIds);

        if ($currentIndex - 1 >= 0) {
            $prev_post = $posts[$currentIndex - 1];
        } else {
            $prev_post = null;
        }

        if ($currentIndex + 1 < count($posts)) {
            $next_post = $posts[$currentIndex + 1];
        } else {
            $next_post = null;
        }
    ?>
    <div class="work__footer row">
        <div class="work__footer__wrapper work__footer__wrapper--prev col-6">
        <?php
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

        <div class="work__footer__wrapper work__footer__wrapper--next col-6">
        <?php
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
