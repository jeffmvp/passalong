<?php
$heading = get_sub_field('heading');
$headingImage = get_sub_field('heading_image');
$subheading = get_sub_field('subheading');
$content = get_sub_field('content');
$backgroundImage = get_sub_field('background_image');
?>
<section class="Hero" id='Hero' style="background-image:url(<?php echo $backgroundImage; ?>)">
    <div class="Hero-video" id="HeroVideo">
        
    </div>
    <div class="Container Container--small">
        <div class="grid">
            <div class="grid__col grid__col--2-of-2">
                <h1 style="display:none;"><?php echo $heading; ?></h1>
                <img class="Hero-image" src="<?php echo $headingImage; ?>">
                <h3><?php echo $subheading; ?></h3>
                <?php echo $content; ?>
                <a href="#section-1" class="Hero-push">
                    <span class="Hero-push-text">See All That’s Part of the Winter Success Plan!</span><br>
                    <span class="Hero-push-arrow"><img src="/wp-content/themes/passalong/assets/images/arrowThinBlack.svg"></span>             
                </a>
            </div>
        </div>
    </div>
</section>