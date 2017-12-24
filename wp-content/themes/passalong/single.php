<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$sidebar = get_field('blog_sidebar', 'options');
$blogImage = get_field('blog_hero_single', 'options');
$singleImage = get_field('background_image');

if ($singleImage != '') {
    $blogImage = $singleImage;
}
 
get_header(); ?>
    <?php
    while ( have_posts() ) : the_post();
    $related = get_field('related_team_members');
    
    ?>
    <section class="Hero Hero--single" style="background-image:url('<?= $blogImage ?>')">
        <div class="Hero-content">
            <div class="Container">
                <div class="grid">
                    <div class="grid__col grid__col--2-of-3">
                        <a class="Button Button--inverted" href="/news"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to All News</a>
                        <h4 class="h4"><?php the_date('F Y') ?></h4>
                        <h1><?php the_title() ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Single">
        <div class="Container">
            <div class="grid">
                <div class="grid__col grid__col--3-of-4 Single-main">
                    <?php the_content(); ?>
                    <a class="Button u-desktop" href="/news"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back to All News</a>
                </div>
                <div class="grid__col grid__col--1-of-4 Single-side">
                    <?= $sidebar ?>
                    <div class="Single-team">
                    <?php if ($related != null) : ?>
                    <?php foreach($related as $member) {
                        $title = get_the_title($member->ID);
                        $position = get_field('title', $member->ID);
                        $phone = get_field('phone_number', $member->ID);
                        $phoneConverted = preg_replace('/\s+/', '', $phone);
                        $email = get_field('email', $member->ID);
                        
                        echo '<div class="Single-member">';
                            echo '<h4>' . $title . '</h4>';
                            echo '<h4>' . $position . '</h4>';
                            echo '<a href="tel:'.$phoneConverted .'">' . $phone . '</a>';
                            echo '<a href="mailto:'.$email .'">' . $email . '</a>';
                        echo '</div>';

                    }
                    ?>
                    <?php else : ?>
                    <?php 
                    $globalPhone = get_field('phone', 'options');
                    echo '<div class="Single-member">';
                    echo '<h4>passalong</h4>';
                    echo '<a href="tel:'.$globalPhone .'">' . $globalPhone . '</a>';
                    echo '</div>';
                    endif;
                    ?>
                    </div>
                    <a class="Button" href="/news"><i class="fa fa-chevron-left" aria-hidden="true"></i> All News</a>
                    
                </div>
                
            </div>
        </div>
    </section>
    <section class="Content Content--color Content--postnav">
        <div class="Container">
            <div class="grid grid--no-gutter PostNav">
                <div class="grid__col grid__col--1-of-3">
                    
                    <?php 
                    $prev = get_previous_post();
                    $link = get_permalink($prev->ID);

                    if ($prev->post_title != '') :
                    ?>
                    <h2>Previous Article</h2>
                    <a class="u-arrowLink PostNav-related" href="<?= $link ?>">
                        <span class="h4"><?= get_the_date('F Y', $prev->ID) ?></span>
                        <?= $prev->post_title ?> <i class="Arrow"></i>
                    </a>
                    
                    <?php endif; ?>
                </div>
                <div class="grid__col grid__col--1-of-3">
                    
                </div>
                <div class="grid__col grid__col--1-of-3">
                    
                    <?php 
                    $next = get_next_post();
                    $link = get_permalink($next->ID);
                    if ($next->post_title != '') :
                    ?>      
                    <h2>Next Article</h2>
                    <a class="u-arrowLink PostNav-related" href="<?= $link ?>">
                    <span class="h4"><?= get_the_date('F Y', $prev->ID) ?></span>
                        <?= $prev->post_title ?> <i class="Arrow"></i>
                    </a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    
    
    <?php
    // End the loop.
    endwhile;
    ?>
<?php get_footer(); ?>