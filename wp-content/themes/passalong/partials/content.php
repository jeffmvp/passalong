 <?php
$content = get_sub_field('content');
$contentCol = get_sub_field('two_columns');
$contentTwo = get_sub_field('content_two');

if ($contentCol != true) {
    $contentClass = 'Container--small';
}
else {
    $contentClass = '';
}

?>
<section class="Content">
<div class="Container <?php echo $contentClass; ?>">
    <div class="grid">
    <?php if ($contentCol == false) : ?>
        <div class="grid__col grid__col--2-of-2">
            <?php echo $content; ?>
        </div>
    <?php else : ?>
        <div class="grid__col grid__col--2-of-3">
            <?php echo $content; ?>
        </div>
        <div class="grid__col grid__col--1-of-3">
            <?php echo $contentTwo; ?>
        </div>
    <?php endif; ?>
    </div>
</div>
</section>