<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('organic_farm_slider_arrows') == '1'){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $organic_farm_mod =  get_theme_mod( 'organic_farm_post_setting' . $i );
            if ( 'page-none-selected' != $organic_farm_mod ) {
              $organic_farm_slide_post[] = $organic_farm_mod;
            }
          }
           if( !empty($organic_farm_slide_post) ) :
          $organic_farm_args = array(
            'post_type' =>array('post','page'),
            'post__in' => $organic_farm_slide_post
          );
          $organic_farm_query = new WP_Query( $organic_farm_args );
          if ( $organic_farm_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $organic_farm_query->have_posts() ) : $organic_farm_query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <?php }else { ?><div class="bg-color"></div> <?php } ?>
            <div class="carousel-caption slider-inner">
              <h2 class="slid-head"><?php the_title();?></h2>
              <div class="home-btn my-4">
                <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html('Read More','organic-farm'); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon p-3" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon p-3" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php if( get_option('organic_farm_services_show_hide') == '1'){ ?>
  <section id="middle-sec">
    <div class="container">
      <div class="row">
        <?php
          for ( $organic_farm_s = 1; $organic_farm_s <= 3; $organic_farm_s++ ) {
            $organic_farm_mod =  get_theme_mod( 'organic_farm_middle_sec_settigs' . $organic_farm_s );
            if ( 'page-none-selected' != $organic_farm_mod ) {
              $organic_farm_post[] = $organic_farm_mod;
            }
          }
           if( !empty($organic_farm_post) ) :
          $organic_farm_args = array(
            'post_type' =>array('post','page'),
            'post__in' => $organic_farm_post
          );
          $organic_farm_query = new WP_Query( $organic_farm_args );
          if ( $organic_farm_query->have_posts() ) :
            $organic_farm_s = 1;
        ?>
        <?php  while ( $organic_farm_query->have_posts() ) : $organic_farm_query->the_post(); ?>
          <div class="col-lg-4 col-md-4">
            <div class="inner-box p-3 text-center text-md-left text-lg-left">
              <div class="row">
                <div class="col-lg-4 col-md-12 align-self-center">
                  <img src="<?php esc_attr(the_post_thumbnail_url('full')); ?>"/>
                </div>
                <div class="col-lg-8 col-md-12 pl-lg-0 align-self-center">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                  <p class="mb-0"><?php echo wp_trim_words( get_the_content(), 8 );?></p>
                </div>
              </div>
            </div>
          </div>
        <?php $organic_farm_s++; endwhile;
        wp_reset_postdata();?>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
      </div>
    </div>
  </section>
  <?php }?>

 <?php if( get_option('organic_farm_services_product_hide') == '1'){ ?> 
  <section id="product-box" class="my-5">
    <div class="container">
      <?php
        $organic_farm_mod =  get_theme_mod( 'organic_farm_product_box_page' );
        if ( 'page-none-selected' != $organic_farm_mod ) {
          $organic_farm_product_page[] = $organic_farm_mod;
        }
        if( !empty($organic_farm_product_page) ) :
        $organic_farm_args = array(
          'post_type' =>array('page'),
          'post__in' => $organic_farm_product_page
        );
        $organic_farm_query = new WP_Query( $organic_farm_args );
        if ( $organic_farm_query->have_posts() ) :
      ?>
      <?php  while ( $organic_farm_query->have_posts() ) : $organic_farm_query->the_post(); ?>
        <h3 class="text-center mb-3"><?php the_title(); ?></h3>
        <div class="ico-border my-4 mx-auto"><i class="fab fa-envira text-center"></i></div>
        <?php the_content(); ?>
      <?php $s++; endwhile;
      wp_reset_postdata();?>
      <?php else : ?>
      <div class="no-postfound"></div>
        <?php endif;
      endif;?>
    </div>
  </section>
<?php }?>
</main>

<?php get_footer(); ?>
