<?php 
/* Template Name: Landing */

get_header('landing'); 
?>

<!-- section -->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<?php
					get_template_part('flex','section');
?>

			<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>
<?php get_footer('landing'); ?>
