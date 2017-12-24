<?php
$content = get_sub_field('content');
$videoTitle = get_sub_field('video_title');
$videoUrl = get_sub_field('video_url');

?>
<section class="Content" style="background-image:url(<?php echo $backgroundImage; ?>)">
<div class="Container Container--content">
    <div class="grid">
        <div class="grid__col grid__col--2-of-2">
            <?php echo $content; ?>
            <div class="Content-video">
                <div class="Content-video-title"><?php echo $videoTitle ?></div>
                <div id="play-buttonTwo" class="Content-video-button"><img src="/wp-content/themes/passalong/assets/images/play.svg"></div>
                <div class="Content-video-video">
                    <iframe id="heroVideo" src="<?php echo $videoUrl; ?>?api=1"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
</section>