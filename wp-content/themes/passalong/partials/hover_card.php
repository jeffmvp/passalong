<?php

$date = get_sub_field('date');
$sectionTitle = get_sub_field('section_title');
$heading = get_sub_field('heading');
$bgColor = get_sub_field('background_color');
$subheading = get_sub_field('subheading');
$content = get_sub_field('content');
$link = get_sub_field('link');
$backgroundImage = get_sub_field('background_image');
$backgroundImageMobile = get_sub_field('background_image_mobile');

$imageLocation = get_sub_field('image_location');

if ($imageLocation == true) {
    $imageClass = "HoverCard-image--left";
}
else  {
    $imageClass = "HoverCard-image--right";
}
?>
<section class="HoverCard <?php echo $imageClass; ?> <?php echo $bgColor; ?>">
    <div class="Container Container--large">
        <div class="grid grid--no-gutter">
            <div class="grid__column grid__column--2-of-2 u-aC">
                
                <?php if($date) : ?><span class="HoverCard-date"><?php the_sub_field('date'); ?></span><?php endif;?>
                <?php if($sectionTitle) : ?><h3 class="HoverCard-title"><?php echo $sectionTitle; ?></h3><?php endif;?>

            </div>
            <div class="grid__column grid__column--2-of-2">
                <div class="HoverCard-image">
                    <img class="HoverCard-desktop" src="<?php echo $backgroundImage; ?>">
                    <img class="HoverCard-phone" src="<?php echo $backgroundImageMobile; ?>">
                </div>
                <div class="HoverCard-card">
                    <?php if ($heading) : ?>
                        <h2><?php echo $heading ?></h2>
                    <?php endif; ?>
                    <?php if ($subheading) : ?>
                        <h5><?php echo $subheading ?></h5>
                    <?php endif; ?>
                    <?php if ($content) : ?>
                        <?php echo $content ?>
                    <?php endif; ?>
                    <?php if ($link) : ?>
                    <a target="<?php echo $link['target'] ?>" class="Link" href="<?php echo $link['url'] ?>"><span class="LinkText"><?php echo $link['title'] ?></span><span class="LinkArrow"><i class="fas fa-arrow-right"></i></span></a>
                    <?php endif; ?>       
                </div>
                <!-- <div class="HoverCard-navigator">
                <span class="fa-layers fa-fw fa-lg">
                    <i class="far fa-circle"></i>
                    <i class="fas fa-chevron-down" data-fa-transform="shrink-6"></i>
                </span>
                </div> -->
            </div>
        </div>
    </div>
</section>