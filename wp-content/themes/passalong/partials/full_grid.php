<?php
$heading = get_sub_field('heading');
$headingOne = get_sub_field('heading_one');
$contentOne = get_sub_field('content_one');
$videoOne = get_sub_field('video_one');
$imageTwo = get_sub_field('image_two');
$headingTwo = get_sub_field('heading_two');
$contentTwo = get_sub_field('content_two');
$imageThree = get_sub_field('image_three');
$headingThree = get_sub_field('heading_three');
$contentThree = get_sub_field('content_three');
$linkThree = get_sub_field('link_three');


?>

<section class="FullGrid">
    <div class="Container Container--heading">
        <div class="grid">
            <div class="grid__col grid__col--2-of-2">
                <span class="h1"><?php echo $heading ?></span>
            </div>
        </div>
    </div>
    <div class="grid grid--no-gutter grid--rtl">
    <div class="grid__col grid__col--1-of-2">
            <div class="FullGrid-match FullGrid-video" id="FullGrid-video">
                <iframe id="gridVideo" src="<?php echo $videoOne; ?>?api=1"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
        <div class="grid__col grid__col--1-of-2">
            <div class="FullGrid-match FullGrid-content">
                <div class="FullGrid-wrap">
                    <h2><?php echo $headingOne; ?></h2>
                    <?php echo $contentOne; ?>
                    <a id="play-button" class="Link"><span class="LinkText">Watch Now</span><span class="LinkArrow"><i class="fas fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="grid grid--no-gutter">
        <div class="grid__col grid__col--1-of-2">
            <div class="FullGrid-match FullGrid-image" style="background-image:url(<?php echo $imageTwo; ?>);">
                
            </div>
        </div>
    
        <div class="grid__col grid__col--1-of-2">
            <div class="FullGrid-match FullGrid-content">
                <div class="FullGrid-wrap">
                <h2><?php echo $headingTwo; ?></h2>
                    <?php echo $contentTwo; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid--no-gutter grid--rtl">
    <div class="grid__col grid__col--1-of-2">
        <div class="FullGrid-match FullGrid-image" style="background-image:url(<?php echo $imageThree; ?>);">
            
        </div>
    </div>

    <div class="grid__col grid__col--1-of-2">
        <div class="FullGrid-match FullGrid-content">
            <div class="FullGrid-wrap">
            <h2><?php echo $headingThree; ?></h2>
                <?php echo $contentThree; ?><br>
                <?php if ($linkThree) : ?>
                <a target="<?php echo $linkThree['target'] ?>" class="Link" href="<?php echo $linkThree['url'] ?>"><span class="LinkText"><?php echo $linkThree['title'] ?></span><span class="LinkArrow"><i class="fas fa-arrow-right"></i></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</section>