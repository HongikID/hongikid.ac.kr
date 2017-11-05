<?php
get_header();
the_post();
$data = json_decode(get_the_content(), true);
?>
<div class="about">
    <div class="about__welcome">
<!--        <div id="about__welcome__canvas" class="about__welcome__canvas accent-bg"></div>-->
        <div id="about__welcome__canvas" class="about__welcome__canvas accent-bg" style="top: 0;"></div>

        <div id="about__welcome__logo--dark" class="about__welcome__logo about__welcome__logo--dark"></div>
<!--        <div id="about__welcome__logo--light" class="about__welcome__logo about__welcome__logo--light"></div>-->
    </div>

    <section class="about__about">
        <h2 class="about__section-title about__about__title">About</h2>
        <div class="container">
            <div class="row about__about__wrapper">
                <div class="col-sm-12 col-md-6">
                    <div>
                        <h3 class="about__about__slogan accent">Aesthetic</h3>
                    </div>
                    <div>
                        <h3 class="about__about__slogan accent">Trans Humanism</h3>
                    </div>
                    <div>
                        <h3 class="about__about__slogan accent">Designnovation</h3>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="about__about__description-container">
                        <p class="about__about__description">산업디자인 전공은 현대사회가 지향하는 새로운 가치와 환경자원, 생활문화 창출을 위한 인공환경의 제 문제를 다각적으로 해석하고 종합, 창조할 수 있는 폭넓은 학제적 접근을 통해 합리적 디자인 사고능력과 독창적 조형능력을 함양하여, 21세기 시대정신을 이끌고 미래 디자인의 주역이 될 수 있는 디자이너를 양성하는 데 교육의 목표를 두고 있다.</p>
                        <p class="about__about__description">또한 전통에서 지혜를, 자연에서 미래를 도출하는 체계적인 조형훈련과 창의적인 사고의 발상을 위한 기초교육으로 형태와 기능, 평면과 입체표현, 조형심리학, 인간공학 등의 기초과정 및 제품.운송기기디자인 영역과 공간디자인 영역의 세부전공별 교과를 마련하고, 디자인 세미나, 산학협동연구 등 현장수업과 현대디자인론, 디자인 매니지먼트, 디자인 서사학 등의 이론 중심 교과로 보다 전문성 있는 창의력 개발과 기업과의 산학협동을 병행, 사회에 기여할 수 있는 전문 디자이너 교육을 지향하고 있다.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about__faculty">
        <h2 class="about__section-title about__faculty__title">Faculty</h2>
        <div class="about__faculty__wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 about__faculty__philosophy">
                        <div class="about__faculty__philosophy__wrapper container">
                            <h3 class="about__faculty__philosophy__title">Faculty</h3>

                            <h4 class="about__faculty__philosophy__thesis">줄탁동시</h4>
                            <p class="about__faculty__philosophy__thesis__description">
                                - ‘줄’과 '탁'이 동시에 이루어진다.
                                병아리가 알에서 나오기 위해서는 새끼와 어미 닭이 안팎에 서로쪼아야 한다.
                                <br><br>
                                - 기회와 인연이 서로 투합한다.
                                독일 문학가, 헤르만 헤세는 '알에서 깨어나려면 한 세계를 파괴하지 않으면 안된다'고 했으며 이는 곧 '창조적 파괴'를 은유하는 바, 스승과 제자가 함께 구습타파하여 새로운 세계를 창조한다.
                            </p>

                            <h4 class="about__faculty__philosophy__thesis">교학상장</h4>
                            <p class="about__faculty__philosophy__thesis__description">
                                스승과 제자간에 상호 배움을 통해 성장한다.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 about__faculty__professors container">
                        <?php
                            $facultySections = $data["faculties"];
                            foreach ($facultySections as $facultySection) {
                            ?>
                            <div class="about__faculty__professors__section">
                                <h4 class="about__faculty__professors__title"><?php echo $facultySection['name'] ?></h4>
                                <div class="about__faculty__professors__professor__list">
                                    <div class="row">
                                    <?php
                                    foreach ($facultySection["professors"] as $professor) {
                                    ?>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 about__faculty__professors__professor">
                                            <img class="about__faculty__professors__professor__image" src="<?php echo $professor['image_url'] ?>" alt="<?php echo $professor['name'] ?> 교수 프로필 사진">
                                            <h5 class="about__faculty__professors__professor__name"><?php echo $professor['name'] ?></h5>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about__curriculum">
        <h2 class="about__section-title about__curriculum__title">Curriculum</h2>
        <div class="about__curriculum__main container">
            <div class="row">
                <h3 class="col-12 about__curriculum__main__title accent">Class for<br>Designers</h3>
            </div>

            <ul class="about__curriculum__main__nav nav nav-pills container" role="tablist">
                <li class="about__curriculum__main__nav-item nav-item">
                    <a class="about__curriculum__main__nav-link nav-link active" id="curriculum-tab-year-1" data-toggle="pill" href="#curriculum-year-1" role="tab" aria-controls="curriculum-year-1" aria-selected="true">Freshman</a>
                </li>
                <li class="about__curriculum__main__nav-item nav-item">
                    <a class="about__curriculum__main__nav-link nav-link" id="curriculum-tab-year-2" data-toggle="pill" href="#curriculum-year-2" role="tab" aria-controls="curriculum-year-2" aria-selected="false">Sophomore</a>
                </li>
                <li class="about__curriculum__main__nav-item nav-item">
                    <a class="about__curriculum__main__nav-link nav-link" id="curriculum-tab-year-3" data-toggle="pill" href="#curriculum-year-3" role="tab" aria-controls="curriculum-year-3" aria-selected="false">Junior</a>
                </li>
                <li class="about__curriculum__main__nav-item nav-item">
                    <a class="about__curriculum__main__nav-link nav-link" id="curriculum-tab-year-4" data-toggle="pill" href="#curriculum-year-4" role="tab" aria-controls="curriculum-year-4" aria-selected="false">Senior</a>
                </li>
            </ul>

            <div class="about__curriculum__main__classes tab-content">
                <?php
                    $classes = $data['curriculum'];
                    for ($year = 1; $year <= 4; $year ++) {
                        if ($year == 1) {
                            $className = "tab-pane container show active";
                        } else {
                            $className = "tab-pane container";
                        }
                    ?>
                    <div class="<?php echo $className?>" id="curriculum-year-<?php echo $year?>" role="tabpanel" aria-labelledby="curriculum-tab-year-<?php echo $year?>">
                        <div class="row">
                            <?php
                            for ($sem = 1; $sem <= 2; $sem ++) {

                            ?>
                            <div class="col-sm-6">
                                <h5 class="about__curriculum__main__classes__semester"><?php echo "${sem}학기"?></h5>
                                <div class="about__curriculum__main__classes__accordion" id="<?php echo "about__curriculum__main__classes__accordion-${year}-${sem}"?>" data-children=".item">
                                        <?php
                                            for ($idx = 0; $idx < count($classes); $idx ++) {
                                                $class = $classes[$idx];
                                                if ($class['year'] == $year && $class['semester'] == $sem) {
                                                    ?>
                                                    <div class="item about__curriculum__main__classes__class">
                                                        <a data-toggle="collapse"
                                                           class="about__curriculum__main__classes__class__name collapsed"
                                                           data-parent="#<?php echo "about__curriculum__main__classes__accordion-${year}-${sem}"?>"
                                                           href="#<?php echo "about__curriculum__main__classes__accordion-${idx}"?>" aria-expanded="true"
                                                           aria-controls="<?php echo "about__curriculum__main__classes__accordion-${idx}"?>">
                                                            <?php echo $class['name'] ?>
                                                        </a>
                                                        <div id="<?php echo "about__curriculum__main__classes__accordion-${idx}"?>"
                                                             class="about__curriculum__main__classes__class__description collapse"
                                                             role="tabpanel">
                                                            <p>
                                                                <?php echo $class['description'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <div class="container">
        <a href="/exhibitions/2017" class="about__cta__link">
            <div class="about__cta">
                <h4>Learn More</h4>
                <span>2017 Graduate Show &rsaquo;</span>
            </div>
        </a>
    </div>
</div>
<?php
get_footer();
?>
