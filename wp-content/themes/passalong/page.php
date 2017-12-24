<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage MVP
 */
 
get_header(); ?>
 
 
 
 <main class="main site-content" role="main">
 <?php // open the WordPress loop
 if (have_posts()) : while (have_posts()) : the_post();
 
	 // are there any rows within within our flexible content?
	 if( have_rows('flexible') ):
		$index == 0;
		settype($index, INT);
		 // loop through all the rows of flexible content
		 while ( have_rows('flexible') ) : the_row();
			
			echo '<div class="SectionID" id="section-'.$index.'"></div>';
 
			get_template_part( 'partials/' . get_row_layout() );

			$index++;
 
 
		 endwhile; // close the loop of flexible content
	 endif; // close flexible content conditional
 
 endwhile; endif; // close the WordPress loop ?>
 </main>
 
 
 <?php get_footer(); ?>

