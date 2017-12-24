<?php
    $image      = get_sub_field('image');
    $heading    = get_sub_field('heading');
    $subheading = get_sub_field('subheading');
    $cards      = get_sub_field('cards');
?>

<section class="ContactCta">
    <div class="Container">
        <div class="grid">
            <div class="grid__col grid__col--2-of-2 u-aC">
                <img class="ContactCta-hero" src="<?php echo $image ?>">
                <h2><?php echo $heading ?></h2>
                <h5><?php echo $subheading ?></h5>
            </div>
        </div>
        <div class="grid grid--carousel">
            <?php foreach($cards as $card) {
                ?>
                <a href="<?php echo $card['link']['url'] ?>" target="<?php echo $card['link']['target'] ?>" class="grid__col grid__col--1-of-3">
                    <div class="ContactCta-card">
                        <div class="ContactCta-icon"><div class="ContactCta-icon-wrap"><img src="<?php echo $card['icon'] ?>"></div></div>
                        <h5><?php echo $card['link']['title'] ?></h5>
                    </div>
                </a>
                <?php
            }?>
        </div>

    </div>
</section>