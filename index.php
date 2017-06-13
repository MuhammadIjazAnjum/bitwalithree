<?php 
	/* index.php */

 ?>
			<?php get_header(); ?>
				<div class="col-9 content" style="background-color: lightgreen">
					<?php if (is_home() && ! is_front_page())  :?>
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					<?php// else:?>

						<h2 class="page-title"><?php// _e( 'Posts', 'bitwalitwo' ); ?></h2>
					<?php endif; ?>

					 
					<?php
					if (have_posts()) :
						while ( have_posts() ) : the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;
					endif;//end of if (have_posts()) :

					?>
					jhakfjhkashdkjahskjfhd
					
				</div>
				<div class="col-3" style="background-color: pink">
					<?php get_sidebar();?>
				</div>
				
			


			<?php get_footer();?>
