<?php
$heading = get_sub_field('heading');
$headingImage = get_sub_field('heading_image');
$subheading = get_sub_field('subheading');
$backgroundImage = get_sub_field('background_image');
?>
<section class="Hero" id='Hero' style="background-image:url(<?php echo $backgroundImage; ?>)">
    <div class="Container Container--small">
        <div class="grid">
            <div class="grid__col grid__col--2-of-2 u-aC">
                <?php if($headingImage) : ?>
                <img class="Hero-image" src="<?php echo $headingImage; ?>">
                <?php endif; ?>
                <?php if ($heading) : ?>
                <h1><?php echo $heading; ?></h1>
                <?php endif; ?>
                <?php if ($subheading) : ?>
                <h3><?php echo $subheading; ?></h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>