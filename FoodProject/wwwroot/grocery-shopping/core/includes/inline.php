<?php

$grocery_shopping_custom_css = '';


$grocery_shopping_is_dark_mode_enabled = get_theme_mod( 'grocery_shopping_is_dark_mode_enabled', false );

if ( $grocery_shopping_is_dark_mode_enabled ) {

    $grocery_shopping_custom_css .= 'body,.fixed-header,tr:nth-child(2n+2) {';
    $grocery_shopping_custom_css .= 'background: #000;';
    $grocery_shopping_custom_css .= '}';

    $grocery_shopping_custom_css .= '.some {';
    $grocery_shopping_custom_css .= 'background: #000 !important;';
    $grocery_shopping_custom_css .= '}';

	$grocery_shopping_custom_css .= '.topheader a:hover,.sticky .post-content{';
    $grocery_shopping_custom_css .= 'color: #000';
    $grocery_shopping_custom_css .= '}';

	$grocery_shopping_custom_css .= 'h5.product-text a,#featured-product p.price,.card-header a,.comment-content.card-block p,.post-box.sticky a{';
    $grocery_shopping_custom_css .= 'color: #000 !important';
    $grocery_shopping_custom_css .= '}';

    $grocery_shopping_custom_css .= '.some{';
    $grocery_shopping_custom_css .= 'background: #fff;';
    $grocery_shopping_custom_css .= '}';

    $grocery_shopping_custom_css .= '.some {';
    $grocery_shopping_custom_css .= 'background: #fff !important;';
    $grocery_shopping_custom_css .= '}';
	

    $grocery_shopping_custom_css .= 'body,h1,h2,h3,h4,h5,p,#main-menu ul li a,.woocommerce .woocommerce-ordering select, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea,a,#deal-of-day h2,li.menu-item-has-children:after{';
    $grocery_shopping_custom_css .= 'color: #fff;';
    $grocery_shopping_custom_css .= '}';

    $grocery_shopping_custom_css .= 'a.wc-block-components-product-name, .wc-block-components-product-name,.wc-block-components-totals-footer-item .wc-block-components-totals-item__value,
.wc-block-components-totals-footer-item .wc-block-components-totals-item__label,
.wc-block-components-totals-item__label,.wc-block-components-totals-item__value,
.wc-block-components-product-metadata .wc-block-components-product-metadata__description>p,
.is-medium table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__total .wc-block-components-formatted-money-amount,
.wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,
.wc-block-components-quantity-selector .wc-block-components-quantity-selector__button,
.wc-block-components-quantity-selector,table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,.wc-block-components-product-price__value.is-discounted,del.wc-block-components-product-price__regular,.logo a,.logo span,#deal-of-day ins span.woocommerce-Price-amount.amount,#deal-of-day h5 a,#deal-of-day .timercolr{';
    $grocery_shopping_custom_css .= 'color: #fff !important;';
    $grocery_shopping_custom_css .= '}';

	$grocery_shopping_custom_css .= '.post-box{';
    $grocery_shopping_custom_css .= '    border: 1px solid rgb(229 229 229 / 48%)';
    $grocery_shopping_custom_css .= '}';
}

	/*---------------------------text-transform-------------------*/

	$grocery_shopping_text_transform = get_theme_mod( 'menu_text_transform_grocery_shopping','CAPITALISE');
	
    if($grocery_shopping_text_transform == 'CAPITALISE'){

		$grocery_shopping_custom_css .='#main-menu ul li a{';

			$grocery_shopping_custom_css .='text-transform: capitalize ; font-size: 14px;';

		$grocery_shopping_custom_css .='}';

	}else if($grocery_shopping_text_transform == 'UPPERCASE'){

		$grocery_shopping_custom_css .='#main-menu ul li a{';

			$grocery_shopping_custom_css .='text-transform: uppercase ; font-size: 14px;';

		$grocery_shopping_custom_css .='}';

	}else if($grocery_shopping_text_transform == 'LOWERCASE'){

		$grocery_shopping_custom_css .='#main-menu ul li a{';

			$grocery_shopping_custom_css .='text-transform: lowercase ; font-size: 14px;';

		$grocery_shopping_custom_css .='}';
	}

			/*---------------------------menu-zoom-------------------*/

			$grocery_shopping_menu_zoom = get_theme_mod( 'grocery_shopping_menu_zoom','None');

		if($grocery_shopping_menu_zoom == 'None'){

			$grocery_shopping_custom_css .='#main-menu ul li a{';

				$grocery_shopping_custom_css .='';

			$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_menu_zoom == 'Zoominn'){

			$grocery_shopping_custom_css .='#main-menu ul li a:hover{';

				$grocery_shopping_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: var(--first-color);';

			$grocery_shopping_custom_css .='}';
		}

		/*---------------------------Container Width-------------------*/

	$grocery_shopping_container_width = get_theme_mod('grocery_shopping_container_width');

			$grocery_shopping_custom_css .='body{';

				$grocery_shopping_custom_css .='width: '.esc_attr($grocery_shopping_container_width).'%; margin: auto;';

			$grocery_shopping_custom_css .='}';

	/*---------------------------Slider-content-alignment-------------------*/

	$grocery_shopping_slider_content_alignment = get_theme_mod( 'grocery_shopping_slider_content_alignment','LEFT-ALIGN');

	if($grocery_shopping_slider_content_alignment == 'LEFT-ALIGN'){

		$grocery_shopping_custom_css .='.blog_box{';

			$grocery_shopping_custom_css .='text-align:left;';

		$grocery_shopping_custom_css .='}';


	}else if($grocery_shopping_slider_content_alignment == 'CENTER-ALIGN'){

		$grocery_shopping_custom_css .='.blog_box{';

			$grocery_shopping_custom_css .='text-align:center; right:20%; left:50%;';

		$grocery_shopping_custom_css .='}';


	}else if($grocery_shopping_slider_content_alignment == 'RIGHT-ALIGN'){

		$grocery_shopping_custom_css .='.blog_box{';

			$grocery_shopping_custom_css .='text-align:right; right:20%; left:50%;';

		$grocery_shopping_custom_css .='}';

	}

	/*---------------------------Copyright Text alignment-------------------*/

	$grocery_shopping_copyright_text_alignment = get_theme_mod( 'grocery_shopping_copyright_text_alignment','LEFT-ALIGN');

	 if($grocery_shopping_copyright_text_alignment == 'LEFT-ALIGN'){

			$grocery_shopping_custom_css .='.copy-text p{';

				$grocery_shopping_custom_css .='text-align:left;';

			$grocery_shopping_custom_css .='}';


		}else if($grocery_shopping_copyright_text_alignment == 'CENTER-ALIGN'){

			$grocery_shopping_custom_css .='.copy-text p{';

				$grocery_shopping_custom_css .='text-align:center;';

			$grocery_shopping_custom_css .='}';


		}else if($grocery_shopping_copyright_text_alignment == 'RIGHT-ALIGN'){

			$grocery_shopping_custom_css .='.copy-text p{';

				$grocery_shopping_custom_css .='text-align:right;';

			$grocery_shopping_custom_css .='}';

		}

		/*---------------------------related Product Settings-------------------*/


$grocery_shopping_related_product_setting = get_theme_mod('grocery_shopping_related_product_setting',true);

	if($grocery_shopping_related_product_setting == false){

		$grocery_shopping_custom_css .='.related.products, .related h2{';

			$grocery_shopping_custom_css .='display: none;';

		$grocery_shopping_custom_css .='}';
	}

		/*---------------------------Scroll to Top Alignment Settings-------------------*/

	$grocery_shopping_scroll_top_position = get_theme_mod( 'grocery_shopping_scroll_top_position','Right');

	if($grocery_shopping_scroll_top_position == 'Right'){

		$grocery_shopping_custom_css .='.scroll-up{';

			$grocery_shopping_custom_css .='right: 20px;';

		$grocery_shopping_custom_css .='}';

	}else if($grocery_shopping_scroll_top_position == 'Left'){

		$grocery_shopping_custom_css .='.scroll-up{';

			$grocery_shopping_custom_css .='left: 20px;';

		$grocery_shopping_custom_css .='}';

	}else if($grocery_shopping_scroll_top_position == 'Center'){

		$grocery_shopping_custom_css .='.scroll-up{';

			$grocery_shopping_custom_css .='right: 50%;left: 50%;';

		$grocery_shopping_custom_css .='}';
	}


		/*---------------------------Pagination Settings-------------------*/


$grocery_shopping_pagination_setting = get_theme_mod('grocery_shopping_pagination_setting',true);

	if($grocery_shopping_pagination_setting == false){

		$grocery_shopping_custom_css .='.nav-links{';

			$grocery_shopping_custom_css .='display: none;';

		$grocery_shopping_custom_css .='}';
	}

		/*--------------------------- Slider Opacity -------------------*/

	$grocery_shopping_slider_opacity_color = get_theme_mod( 'grocery_shopping_slider_opacity_color','0.6');

	if($grocery_shopping_slider_opacity_color == '0'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.1'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.1';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.2'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.2';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.3'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.3';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.4'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.4';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.5'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.5';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.6'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.6';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.7'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.7';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.8'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.8';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == '0.9'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:0.9';

		$grocery_shopping_custom_css .='}';

		}else if($grocery_shopping_slider_opacity_color == 'unset'){

		$grocery_shopping_custom_css .='.blog_inner_box img{';

			$grocery_shopping_custom_css .='opacity:unset';

		$grocery_shopping_custom_css .='}';

		}

		/*---------------------------Woocommerce Pagination Alignment Settings-------------------*/

	$grocery_shopping_woocommerce_pagination_position = get_theme_mod( 'grocery_shopping_woocommerce_pagination_position','Center');

	if($grocery_shopping_woocommerce_pagination_position == 'Left'){

		$grocery_shopping_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$grocery_shopping_custom_css .='text-align: left;';

		$grocery_shopping_custom_css .='}';

	}else if($grocery_shopping_woocommerce_pagination_position == 'Center'){

		$grocery_shopping_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$grocery_shopping_custom_css .='text-align: center;';

		$grocery_shopping_custom_css .='}';

	}else if($grocery_shopping_woocommerce_pagination_position == 'Right'){

		$grocery_shopping_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$grocery_shopping_custom_css .='text-align: right;';

		$grocery_shopping_custom_css .='}';
	}

/*---------------------------Global Color-------------------*/

$grocery_shopping_first_color = get_theme_mod('grocery_shopping_first_color');

/*--- First Global Color ---*/

if ($grocery_shopping_first_color) {
  $grocery_shopping_custom_css .= ':root {';
  $grocery_shopping_custom_css .= '--first-color: ' . esc_attr($grocery_shopping_first_color) . ' !important;';
  $grocery_shopping_custom_css .= '} ';
}