<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Organic Farm
 * @since 1.0
 */
?>


<?php $organic_farm_post_option = get_theme_mod( 'organic_farm_grid_column','3_column');
    if($organic_farm_post_option == '1_column'){ ?>
    <div class="col-lg-12 col-md-12">
<?php }else if($organic_farm_post_option == '2_column'){ ?>
    <div class="col-lg-6 col-md-6">
<?php }else if($organic_farm_post_option == '3_column'){ ?>
    <div class="col-lg-4 col-md-4">
<?php }else if($organic_farm_post_option == '4_column'){ ?>
    <div class="col-lg-3 col-md-3">
<?php }else if($organic_farm_post_option == '5_column'){ ?>
    <div class="col-lg-2 col-md-2">
<?php }?>
	<div id="Category-section" class="entry-content w-100">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="postbox smallpostimage p-2 mb-3">
				<h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
				<div class="box-content text-center">
				<?php
					// Get the post content
					$post_content = apply_filters('the_content', get_the_content());

					// Create a DOMDocument to parse the HTML content
					$dom = new DOMDocument();
					@$dom->loadHTML($post_content);

					// Find and display the first image in the post content
					$images = $dom->getElementsByTagName('img');

					if ($images->length > 0) {
					    $first_image = $images->item(0);
					    $image_url = $first_image->getAttribute('src');
					    
					    if (!empty($image_url)) {
					        echo '<img src="' . esc_url($image_url) . '">';
					    }
					}
				?>		
	        	</div>
	        	<div class="overlay pt-2 text-center">
	        		<div class="date-box my-2">
	        			<?php if( get_option('organic_farm_date',false) != 'off'){ ?>
	        				<span class="mr-2"><i class="far fa-calendar-alt mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
	        			<?php } ?>
	        			<?php if( get_option('organic_farm_admin',false) != 'off'){ ?>
	        				<span class="entry-author mr-2"><i class="far fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
	        			<?php }?>
	        			<?php if( get_option('organic_farm_comment',false) != 'off'){ ?>
	      					<span class="entry-comments"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comments','organic-farm'), __('0 Comments','organic-farm'), __('% Comments','organic-farm')); ?></span>
	      				<?php }?>
	    			</div>
	        		
	        	</div>
		      	<div class="clearfix"></div>
		  	</div>
		</div>
	</div>
</div>