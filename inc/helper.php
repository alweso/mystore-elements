<?php
/**
* Helper Functions
*/

/** Get Post Lists */
if( !function_exists( 'storezz_elements_post_lists' ) ) {
  function storezz_elements_post_lists($multiple) {
    $posts = get_posts(array('posts_per_page' => 100));

    if( $multiple ) {
      $post_list = array('all' => __('All', 'storezz--elements'));
    } else {
      $post_list = array('none' => __('None', 'storezz--elements'));
    }

    if(!empty($posts)) {
      foreach( $posts as $post ) {
        $post_list[$post->post_name] = $post->post_title;
      }
    }

    return $post_list;
  }
}

/** Get Tag Lists */
if( !function_exists( 'storezz_elements_tag_lists' ) ) {
  function storezz_elements_tag_lists() {
    return array(
      'h1' => __('H1', 'storezz--elements'),
      'h2' => __('H2', 'storezz--elements'),
      'h3' => __('H3', 'storezz--elements'),
      'h4' => __('H4', 'storezz--elements'),
      'h5' => __('H5', 'storezz--elements'),
      'h6' => __('H6', 'storezz--elements'),
      'span' => __('Span', 'storezz--elements'),
      'div' => __('Div', 'storezz--elements'),
    );
  }
}

/** Orderby List */
if( !function_exists( 'storezz_elements_orderby_list' ) ) {
  function storezz_elements_orderby_list() {
    return array(
      'none' => __( 'None', 'storezz--elements' ),
      'date' => __( 'Date', 'storezz--elements' ),
      'title' => __( 'Title', 'storezz--elements' ),
      'name' => __( 'Name', 'storezz--elements' ),
      'ID' => __( 'ID', 'storezz--elements' ),
    );
  }
}

/** Order List */
if( !function_exists( 'storezz_elements_order_list' ) ) {
  function storezz_elements_order_list() {
    return array(
      'ASC' => __( 'Ascending', 'storezz--elements' ),
      'DESC' => __( 'Descending', 'storezz--elements' ),
    );
  }
}

/** Image Sizes List */
if( !function_exists( 'storezz_elements_imagesizes_list' ) ) {
  function storezz_elements_imagesizes_list() {
    global $_wp_additional_image_sizes;

    $default_image_sizes = get_intermediate_image_sizes();
    $image_size_list = array();

    foreach ( $default_image_sizes as $size ) {
      $image_sizes[ $size ][ 'width' ] = intval( get_option( "{$size}_size_w" ) );
      $image_sizes[ $size ][ 'height' ] = intval( get_option( "{$size}_size_h" ) );
      $image_sizes[ $size ][ 'crop' ] = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
    }

    if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
      $image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
    }
    foreach( $image_sizes as $key => $value ) {
      $image_size_list[$key] = ucfirst($key);
    }
    return $image_size_list;
  }
}

/** Get Attachment Alt Tag */
if( !function_exists( 'storezz_elements_get_altofimage' ) ) {
  function storezz_elements_get_altofimage( $attachment ) {
    $attachment_id = '';
    if( $attachment ) {
      if( is_string( $attachment ) ) {
        $attachment_id = attachment_url_to_postid( $attachment );
      } elseif( is_int( $attachment ) ) {
        $attachment_id = $attachment;
      }
      return get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
    }
  }
}

/** Get All Authors */
if ( !function_exists( 'storezz_elements_get_auhtors' ) ) {

  function storezz_elements_get_auhtors() {

    $options = array();

    $users = get_users();

    foreach ( $users as $user ) {
      $options[ $user->ID ] = $user->display_name;
    }

    return $options;
  }

}

/** Get All Posts */
if ( !function_exists( 'storezz_elements_get_posts' ) ) {

  function storezz_elements_get_posts() {

    $post_list = get_posts( array(
      'post_type' => 'post',
      'orderby' => 'date',
      'order' => 'DESC',
      'posts_per_page' => -1,
    ) );

    $posts = array();

    if ( !empty( $post_list ) && !is_wp_error( $post_list ) ) {
      foreach ( $post_list as $post ) {
        $posts[ $post->ID ] = $post->post_title;
      }
    }

    return $posts;
  }

}

/** Get Woocommerce Categories */
if( !function_exists( 'storezz_elements_get_woo_categories_list' ) ) {
  function storezz_elements_get_woo_categories_list() {
    $term_list = array('0' => __('Select Category', 'storezz--elements'));

    $terms = get_terms( array(
      'taxonomy' => 'product_cat',
      'hide_empty' => false,
    ) );

    foreach( $terms as $term ) {
      $term_list[$term->term_id] = $term->name;
    }

    return $term_list;
  }
}
if( !function_exists( 'getCategorySlugsFromIds' ) ) {
  function getCategorySlugsFromIds($ids) {
    $categorySlugs = [];
    foreach( $ids as $id ) {
      $categorySlug = woocommerceCategorySlug( $id );
      array_push($categorySlugs, $categorySlug);
    }
    $imploded = implode(", ", $categorySlugs);
    return $imploded;
  }
}

if( !function_exists( 'woocommerceCategorySlug' ) ) {
  function woocommerceCategorySlug( $id )
  {
    $term = get_term( $id, 'product_cat' );

    if( is_wp_error( $term ) || !is_object( $term ) || !property_exists( $term, 'slug' ) )
    return null;

    return $term->slug;
  }
}

/** Get Sales Product List */
if( !function_exists( 'storezz_elements_get_sales_products' ) ) {
  function storezz_elements_get_sales_products() {
    $product_list = array( '0' => __( 'Select Product', 'storezz-elements' ) );

    $args = array(
      'post_type' => 'product',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation' => 'OR',
        array( // Simple products type
          'key'           => '_sale_price',
          'value'         => 0,
          'compare'       => '>',
          'type'          => 'numeric'
        ),
        array( // Variable products type
          'key'           => '_min_variation_sale_price',
          'value'         => 0,
          'compare'       => '>',
          'type'          => 'numeric'
        )
      )
    );

    $products = get_posts( $args );

    if( !empty( $products ) ) {
      foreach( $products as $product ) {
        $product_list[$product->ID] = $product->post_title;
      }
    }

    return $product_list;
  }
}

/** Menu List */
if( !function_exists( 'storezz_elements_menulist' ) ) {
  function storezz_elements_menulist() {
    $menus = wp_get_nav_menus();

    $menu_list['none'] = esc_html__(' -- Select Menu -- ', 'storezz');
    foreach ($menus as $menu) {
      $menu_list[$menu->slug] = $menu->name;
    }

    return $menu_list;

  }
}
