<?php
/**
 * The main template file
 *
 * @subpackage Organic Farm
 * @since 1.0
 */

get_header(); ?>

<main id="content">
	<?php if ( is_home() && ! is_front_page() ) : ?>
			<header class="page-header">
				<div class="internal-div">
				<?php //breadcrumb
					if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
						if( get_option('organic_farm_enable_breadcrumb',false) != 'off'){ ?>
							<div class="bread_crumb align-self-center text-center">
								<?php organic_farm_breadcrumb();  ?>
							</div>
						<?php }
					}?>
				<h1 class="page-title mt-4 text-center"><span><?php single_post_title(); ?></span></h1>
				</div>
			</header>
		<?php else : ?>
			<header class="page-header">
				<div class="internal-div">
				<?php //breadcrumb
				if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
					if( get_option('organic_farm_enable_breadcrumb',false) != 'off'){ ?>
						<div class="bread_crumb align-self-center text-center">
							<?php organic_farm_breadcrumb();  ?>
						</div>
					<?php }
				}?>
				<h2 class="page-title mt-4 text-center"><span><?php esc_html_e( 'Posts', 'organic-farm' ); ?></span></h2>
				</div>
			</header>
	<?php endif; ?>
	<div class="container">
		<div class="content-area my-5">
			<div id="main" class="site-main" role="main">
		    	<div class="row m-0">
				<?php
					get_template_part( 'template-parts/post/post-layout' );
				?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer();