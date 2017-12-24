<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage MVP
 */


$logoInverted = get_field('logo_inverted', 'options');

?>
</div>
<section class="Footer">
    <div class="Container Container--footer">
        <div class="grid">
            <div class="grid__col grid__col--1-of-4">
                <img class="Footer-logo" src="<?php echo $logoInverted ?>">
            </div>
            <div class="grid__col grid__col--1-of-4">
                Legal Menu
            </div>
            <div class="grid__col grid__col--1-of-4">
                Social Menu
            </div>
            <div class="grid__col grid__col--1-of-4">
                Newsletter
            </div>
        </div>
    </div>
    <div class="Container Container--sub">
        <div class="grid">
            <div class="grid__col grid__col--1-of-4">
                <span>Copyright &copy; <?php echo date("Y"); ?> PassAlongGifts<br/>All rights reserved</span>
            </div>
            <div class="grid__col grid__col--1-of-4">
                
            </div>
            <div class="grid__col grid__col--1-of-4">
                
            </div>
            <div class="grid__col grid__col--1-of-4">
                <span>Website by JL</a></span>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

</body>
</html>
