<?php
/**
 * The header for our theme
 *
 * @subpackage Organic Farm
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'organic-farm' ); ?></a>
	<?php if( get_option('organic_farm_theme_loader',false) != 'off'){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div id="header" class="pt-3">
			<div class="container">
				<div class="wrap_figure">
					<div class="top_header py-3">
						<div class="row">
							<div class="col-lg-4 col-md-12 box-center">
								<div class="logo mb-lg-0 mb-md-3 mb-3 text-center text-lg-left">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $organic_farm_blog_info = get_bloginfo( 'name' ); ?>
							                <?php if ( ! empty( $organic_farm_blog_info ) ) : ?>
							                  	<?php if ( is_front_page() && is_home() ) : ?>
							                  	<?php if( get_option('organic_farm_logo_title','') != 'off' ){ ?>
							                    		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>	<?php }?>
							                  	<?php else : ?>	<?php if( get_option('organic_farm_logo_title','') != 'off' ){ ?>
						                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>	<?php }?>
						                  		<?php endif; ?>
							                <?php endif; ?>

						                <?php
					                  		$organic_farm_description = get_bloginfo( 'description', 'display' );
						                  	if ( $organic_farm_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('organic_farm_logo_text','') != 'off' ){ ?>
						                  	<p class="site-description">
						                    	<?php echo esc_html($organic_farm_description); ?>
						                  	</p>
						                <?php }?>
					              	<?php endif; ?>
							    </div>
							</div>
							
							<div class="col-lg-3 col-md-5 box-center col-6">								
								<?php if( get_theme_mod('organic_farm_email_text') != '' || get_theme_mod('organic_farm_email') != ''){ ?>
									<div class="info-box mb-lg-0 mb-md-0 mb-3 text-lg-left text-center text-md-left">
										<div class="row">
											<div class="col-lg-3 col-md-4">
												<i class="<?php echo esc_attr(get_theme_mod('organic_farm_email_icon','fas fa-envelope')); ?> p-3 text-center"></i>
											</div>
											<div class="col-lg-9 col-md-8">
												<strong><?php echo esc_html(get_theme_mod('organic_farm_email_text','')); ?></strong>
												<p class="mb-0"><?php echo esc_html(get_theme_mod('organic_farm_email','')); ?></p>
											</div>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="col-lg-3 col-md-4 box-center col-6">
								<?php if( get_theme_mod('organic_farm_call_text') != '' || get_theme_mod('organic_farm_call') != ''){ ?>
									<div class="info-box mb-lg-0 mb-md-0 mb-3 text-center text-lg-left text-md-left">
										<div class="row">
											<div class="col-lg-3 col-md-4">
												<i class="<?php echo esc_attr(get_theme_mod('organic_farm_call_icon','fas fa-phone')); ?> p-3 text-center"></i>
											</div>
											<div class="col-lg-9 col-md-8">
												<strong><?php echo esc_html(get_theme_mod('organic_farm_call_text','')); ?></strong>
												<p class="mb-0"><?php echo esc_html(get_theme_mod('organic_farm_call','')); ?></p>
											</div>
										</div>
									</div>
								<?php }?>
							</div>							
							<div class="col-lg-2 col-md-3 box-center">
								<?php if( get_option('header_social_icon_enable',false) != 'off'){ ?>
							  		<?php
							            $organic_farm_header_twt_target = esc_attr(get_option('organic_farm_header_twt_target','true'));
							            $organic_farm_header_fb_target = esc_attr(get_option('organic_farm_header_fb_target','true'));
							            $organic_farm_header_youtube_target = esc_attr(get_option('organic_farm_header_youtube_target','true'));
							            $organic_farm_header_instagram_target = esc_attr(get_option('organic_farm_header_instagram_target','true'));
						         	 ?>  							
									<div class="links my-2 text-center text-lg-left text-md-left">
										<?php if( get_theme_mod('organic_farm_twitter') != ''){ ?>
							            <a target="<?php echo $organic_farm_header_twt_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('organic_farm_twitter','')); ?>">
							              <i class="<?php echo esc_attr(get_theme_mod('organic_farm_twitter_icon','fab fa-twitter')); ?>"></i>
							            </a>
							          <?php }?>
							          <?php if( get_theme_mod('organic_farm_fb') != ''){ ?>
							            <a target="<?php echo $organic_farm_header_fb_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('organic_farm_fb','')); ?>">
							              <i class="<?php echo esc_attr(get_theme_mod('organic_farm_fb_icon','fab fa-facebook-f')); ?>"></i>
							            </a>
							          <?php }?>
							          <?php if( get_theme_mod('organic_farm_youtube') != ''){ ?>
							            <a target="<?php echo $organic_farm_header_youtube_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('organic_farm_youtube','')); ?>">
							              <i class="<?php echo esc_attr(get_theme_mod('organic_farm_youtube_icon','fab fa-youtube')); ?>"></i>
							            </a>
							          <?php }?>
							          <?php if( get_theme_mod('organic_farm_instagram') != ''){ ?>
							            <a target="<?php echo $organic_farm_header_instagram_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('organic_farm_instagram','')); ?>">
							              <i class="<?php echo esc_attr(get_theme_mod('organic_farm_instagram_icon','fab fa-instagram')); ?>"></i>
							            </a>
							          <?php }?>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="menu_header">
						<div class="row">
							<div class="col-lg-10 col-md-9 col-4">
									<div class="toggle-menu gb_menu ">
										<button onclick="organic_farm_gb_Menu_open()" class="gb_toggle mb-2 mb-md-0"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','organic-farm'); ?></p></button>
									</div>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
							<div class="col-lg-2 col-md-3 col-8">
								<div class="quote-btn text-center">
									<?php if( get_theme_mod('organic_farm_quote_btn_link') != '' || get_theme_mod('organic_farm_quote_btn') != ''){ ?>
										<a href="<?php echo esc_url(get_theme_mod('organic_farm_quote_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('organic_farm_quote_btn','')); ?></a>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
