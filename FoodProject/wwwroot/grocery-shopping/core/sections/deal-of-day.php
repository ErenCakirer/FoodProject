<?php if ( get_theme_mod('grocery_shopping_deal_of_day_section_enable',false) ) : ?>
	<div id="deal-of-day" class="py-5">
		<div class="container">
			<div class="row mb-3 text-center text-md-start">
				<div class="col-lg-8 col-md-7 col-sm-7">
					<?php if ( get_theme_mod('grocery_shopping_deal_of_day_heading') ) : ?>
		          		<h2><?php echo esc_html(get_theme_mod('grocery_shopping_deal_of_day_heading'));?></h2>
		          	<?php endif; ?>
		          	<?php if ( get_theme_mod('grocery_shopping_deal_of_day_heading_text') ) : ?>
		          		<p class="head_text"><?php echo esc_html(get_theme_mod('grocery_shopping_deal_of_day_heading_text'));?></p>
		          	<?php endif; ?>
				</div>
				<div class="col-lg-4 col-md-5 col-sm-5 text-md-end">
					<div class="countdowntimer">
						<?php if( get_theme_mod('grocery_shopping_clock_timer_end',true) != ''){ ?>
							<p id="timer" class="countdown mb-0 text-md-start">
						    	<?php $dateday = get_theme_mod('grocery_shopping_clock_timer_end',''); ?>
						    	<input type="hidden" class="date" value="<?php echo esc_attr($dateday); ?>">
						  	</p>
					  	<?php }?>
            		</div>
				</div>
			</div>
	        <div class="owl-carousel">
	            <?php
	            $grocery_shopping_catData = get_theme_mod('grocery_shopping_deal_of_day_category','');
	            if ( class_exists( 'WooCommerce' ) ) {
	              $args = array(
	                'post_type' => 'product',
	                'posts_per_page' => 100,
	                'product_cat' => $grocery_shopping_catData,
	                'order' => 'ASC'
	              );
	              $loop = new WP_Query( $args );
	              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
	                <div class="tab-product">
	                    <div class="product-image box wow zoomIn">
	                    	<figure class="mb-0">
	                        	<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
	                        </figure>
	                        <div class="box-content intro-button">
			                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
			                </div>
	                    </div>
	                    <div class="product-details p-3">
	                    	<div class="row">
	                    		<div class="col-lg-10 col-md-10 col-sm-10 align-self-center">
	                    			<?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
		                  			<h5 class="product-text my-2 "><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
	                    		</div>
	                    		<div class="col-lg-2 col-md-2 col-sm-2 align-self-center">
	                    			<h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-0"><?php echo $product->get_price_html(); ?></h6>
	                    		</div>
	                    	</div>
		                </div>
	                </div>
	              <?php endwhile; wp_reset_query(); ?>
	            <?php } ?>
	        </div>
		</div>
	</div>
<?php endif; ?>
