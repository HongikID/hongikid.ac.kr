<?php
get_header();
$rawData = category_description();
$data = explode("?=?", $rawData);

$title = str_replace("<p>", "", $data[0]);
$title = str_replace("</p>", "", $title);
?>
<div class="exhibition container">
    <?php
        $currentCategoryId = get_the_category()[0]->term_id;

        $categories = get_categories();
        sort($categories);

        $currentCategoryIdx = null;
        for ($idx = 0; $idx < count($categories); $idx ++) {
            $cat = $categories[$idx];
            if($cat->term_id == $currentCategoryId) {
                $currentCategoryIdx = $idx;
                break;
            }
        }

        $prevClass = "disabled";
        $prevLink = "";

        $nextClass = "disabled";
        $nextLink = "";

        if ($currentCategoryIdx + 1 < count($categories)) {
            $prev = $categories[$currentCategoryIdx + 1];
            $prevClass = "";
            $prevSlug = $prev->slug;
            $prevLink = "/exhibitions/${prevSlug}";
        }

        if ($currentCategoryIdx - 1 >= 0) {
            $next = $categories[$currentCategoryIdx - 1];
            $nextClass = "";
            $nextSlug = $next->slug;
            $nextLink = "/exhibitions/${nextSlug}";
        }
    ?>

    <div class="exhibition__years">
        <a role="button" class="exhibition__years__btn exhibition__years__btn--prev <?php echo $prevClass ?>" href="<?php echo $prevLink ?>"></a>
        <h2 class="exhibition__years__current-year"><?php single_cat_title(); ?></h2>
        <a role="button" class="exhibition__years__btn exhibition__years__btn--next <?php echo $nextClass ?>" href="<?php echo $nextLink ?>"></a>
    </div>

    <h3 class="exhibition__title"><?php echo $title; ?></h3>

    <div class="exhibition__poster">
        <img class="exhibition__poster__image" src="<?php echo $data[1]; ?>" alt="<?php echo $title; ?>" width="326px" height="326px">
    </div>

    <p class="exhibition__summary"><?php echo $data[2]; ?></p>

    <button type="button" class="exhibition__description-btn btn btn-link" data-toggle="modal" data-target="#exhibition-description">전체 보기</button>

    <div id="exhibition-description" class="exhibition__description modal fade" tabindex="-1" role="dialog" aria-labelledby="exhibition-description-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="exhibition__description__content modal-content">
                <div class="modal-header exhibition__description__header">
                    <h4 id="exhibition-description-title" class="exhibition__description__title"><?php echo $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="exhibition__description__body modal-body">
                    <p class="exhibition__description__body__paragraph"><?php echo $data[3]; ?></p>
                </div>

                <div class="exhibition__description__footer modal-footer">
                    <p class="exhibition__description__footer__paragraph"><?php echo "解題 : ${data[4]}"; ?></p>
                </div>
            </div>
        </div>

    </div>

    <ul class="exhibition__filter d-none d-xs-none d-sm-none d-md-none d-lg-flex">
        <li class="exhibition__filter__item"><a id="exhibition__filter__all" class="exhibition__filter__item-link active" tabindex="0" onclick="onAllFilterClicked()">All</a></li>
        <li class="exhibition__filter__item"><a id="exhibition__filter__product" class="exhibition__filter__item-link" tabindex="1" onclick="onProductFilterClicked()">Product</a></li>
        <li class="exhibition__filter__item"><a id="exhibition__filter__space" class="exhibition__filter__item-link" tabindex="2" onclick="onSpaceFilterClicked()">Space</a></li>
        <li class="exhibition__filter__item"><a id="exhibition__filter__transport" class="exhibition__filter__item-link" tabindex="3" onclick="onTransportFilterClicked()">Transport</a></li>
    </ul>

    <div class="exhibition__filter--mobile d-md-block d-lg-none d-xl-none">
        <div class="exhibition__filter__dropdown dropdown">
            <button class="exhibition__filter__dropdown__btn btn btn-secondary dropdown-toggle" type="button" id="exhibition__filter__dropdown__btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                All
            </button>
            <div class="dropdown-menu" aria-labelledby="exhibition__filter__dropdown__btn">
                <a class="dropdown-item" tabindex="0" onclick="onAllFilterClicked()">All</a>
                <a class="dropdown-item" tabindex="1" onclick="onProductFilterClicked()">Product</a>
                <a class="dropdown-item" tabindex="2" onclick="onSpaceFilterClicked()">Space</a>
                <a class="dropdown-item" tabindex="3" onclick="onTransportFilterClicked()">Transport</a>
            </div>
        </div>
    </div>

    <div class="exhibition__contents">
        <section id="exhibition__section-product" class="exhibition__section">
            <h4 class="exhibition__section__title">Product</h4>
            <div id="exhibition__section-product-works" class="exhibition__section__works row">
            </div>
        </section>

        <section id="exhibition__section-space" class="exhibition__section">
            <h4 class="exhibition__section__title">Space</h4>
            <div id="exhibition__section-space-works" class="exhibition__section__works row">
            </div>
        </section>

        <section id="exhibition__section-transport" class="exhibition__section">
            <h4 class="exhibition__section__title">Transport</h4>
            <div id="exhibition__section-transport-works" class="exhibition__section__works row">
            </div>
        </section>
    </div>
</div>



<script>
    function printDesigner(designers) {
        var output = [];
        for (var idx in designers) {
            var d = designers[idx];
            if (d['profile_url'] !== null && d['profile_url'] !== undefined) {
                var profile_url = d['profile_url'];
                if (profile_url.includes("@")) {
                    profile_url = "mailto:" + profile_url;
                }
                output.push("<a href=\"" + profile_url + "\">" + d['name'] + "</a>");
            } else {
                output.push(d['name']);
            }
        }
        return output.join(', ');
    }

    $(document).ready(function () {
        var data = [
            <?php

            $query = new WP_Query( array( 'cat' => $currentCategoryId, 'posts_per_page' => -1) );

            while ($query -> have_posts()): $query -> the_post();

                $content = get_the_content();
                $link = get_permalink();

                print("{\"url\": \"${link}\", \"work\": ${content}},");
            endwhile;
            ?>
        ];

        var productSection = $('#exhibition__section-product-works');
        var spaceSection = $('#exhibition__section-space-works');
        var transportSection = $('#exhibition__section-transport-works');

        for (var idx in data) {
            var url = data[idx].url;
            var work = data[idx].work;

            var section = null;
            switch (work.category) {
                case 'space':
                    section = spaceSection;
                    break;
                case 'transport':
                    section = transportSection;
                    break;
                default:
                    section = productSection;
            }

            section.append('<div class="exhibition__section__work card col-sm-4 col-xs-12">\n' +
                '<a href="'+ url +'"><img class="exhibition__section__work__image card-img-top" src="' + work.main_image + '" alt="' + work.title + '"></a>\n' +
                '<div class="exhibition__section__work__body card-body">\n' +
                '<h5 class="card-title"><a class="exhibition__section__work__title" href="' + url + '">' + work.title + '</a></h5>\n' +
                '<p class="exhibition__section__work__designers card-text">' + printDesigner(work.designers) + '</p>\n' +
                '</div>\n' +
                '</div>'
            );
        }
    });

    function deactivate() {
        $(".exhibition__filter__item-link").removeClass('active');
    }

    function onAllFilterClicked() {
        deactivate();
        $('#exhibition__filter__dropdown__btn').text('All');
        $("#exhibition__filter__all").addClass('active');
        $(".exhibition__section").removeClass('exhibition__section--hidden');
        $(window).trigger('resize');
    }
    
    function onProductFilterClicked() {
        deactivate();
        $('#exhibition__filter__dropdown__btn').text('Product');
        $("#exhibition__filter__product").addClass('active');
        $("#exhibition__section-product").removeClass('exhibition__section--hidden');
        $("#exhibition__section-space").addClass('exhibition__section--hidden');
        $("#exhibition__section-transport").addClass('exhibition__section--hidden');
        $(window).trigger('resize');
    }

    function onSpaceFilterClicked() {
        deactivate();
        $('#exhibition__filter__dropdown__btn').text('Space');
        $("#exhibition__filter__space").addClass('active');
        $("#exhibition__section-product").addClass('exhibition__section--hidden');
        $("#exhibition__section-space").removeClass('exhibition__section--hidden');
        $("#exhibition__section-transport").addClass('exhibition__section--hidden');
        $(window).trigger('resize');
    }

    function onTransportFilterClicked() {
        deactivate();
        $('#exhibition__filter__dropdown__btn').text('Transport');
        $("#exhibition__filter__transport").addClass('active');
        $("#exhibition__section-product").addClass('exhibition__section--hidden');
        $("#exhibition__section-space").addClass('exhibition__section--hidden');
        $("#exhibition__section-transport").removeClass('exhibition__section--hidden');
        $(window).trigger('resize');
    }
</script>
<?php
get_footer();
?>
