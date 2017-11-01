<?php
get_header();

the_post();
$data = json_decode(get_the_content(), true);
?>

<h1><?php echo $data['title']?></h1>

<?php
get_footer();
?>
