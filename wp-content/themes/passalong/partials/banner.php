<?php
$banner = get_sub_field('banner');
?>
<section class="Banner">
    <a href="<?php echo $banner['url'];?>" target="<?php echo $banner['target'];?>" class="Container Container--large">
        <div class="grid">
            <div class="grid__col grid__col--2-of-2">
                <h3><?php echo $banner['title'];?></h3>
            </div>
        </div>
    </a>
</section>