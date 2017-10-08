</main>

<?php wp_footer(); ?>

<script>
    var container = document.getElementById("container");
    var nav = document.getElementById("header__nav");
    var navList = document.getElementById("header__nav__list");
    var navToggleBtn = document.getElementById("header__nav__toggle-btn");

    var sticky = nav.offsetTop;

    function onPageScrolled() {
        if (window.pageYOffset >= sticky) {
            nav.classList.add("sticky");
            container.classList.add("top-padded");
        } else {
            nav.classList.remove("sticky");
            container.classList.remove("top-padded");
        }
    }
    
    function onNavToggleButtonClicked() {
        if (navList.classList.contains("toggled")) {
            navList.classList.remove("toggled");
            navToggleBtn.classList.remove("toggled");
        } else {
            navList.classList.add("toggled");
            navToggleBtn.classList.add("toggled");
        }
    }
</script>

</body>
</html>
