<?php

/**
* Magazine Post Carousel Widget.
*/
class My_Store_Product_Grid_Widget extends \Elementor\Widget_Base {

  /** Widget Name */
  public function get_name() {
    return 'ms-product-product-grid-widget';
  }

  /** Widget Title */
  public function get_title() {
    return __('Product Grid', 'meta-store-elements');
  }

  /** Icon */
  public function get_icon() {
    return 'eicon-inner-section';
  }

  /** Category */
  public function get_categories() {
    return ['meta-store-elements'];
  }

  /** Controls */
  protected function _register_controls() {
    $this->start_controls_section(
      'content_section', [
        'label' => __('Content', 'meta-store-elements'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'pick_by', [
        'label' => __('Pick Products By', 'meta-store-elements'),
        'type' => \Elementor\Controls_Manager::SELECT2,
        'default' => 0,
        'multiple' => true,
        'options'   => [
          'all'      =>esc_html__( 'All', 'menheer-plugin' ),
          'total_sales'      =>esc_html__( 'Bestsellers', 'menheer-plugin' ),
          ''      =>esc_html__( 'Top Rated', 'menheer-plugin' ),
          ''      =>esc_html__( 'On Sale', 'menheer-plugin' ),
        ],
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'additional_settings', [
        'label' => __('Additional Settings', 'meta-store-elements'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'image_size_label', [
        'label' => __('Image Size', 'meta-store-elements'),
        'type' => \Elementor\Controls_Manager::HEADING,
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Image_Size::get_type(), [
        'name' => 'image_size',
        'exclude' => ['custom'],
        'include' => [],
        'default' => 'large',
      ]
    );

    $this->add_control(
      'color_scheme', [
        'label' => __('Color Scheme', 'meta-store-elements'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .ms-product-category-block1 .cat-btn:hover' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'cat_btn_style', [
        'label' => __('Category Button', 'meta-store-elements'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'cat_btn_bgcolor', [
        'label' => __('Background', 'meta-store-elements'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .ms-product-category-block1 .cat-btn:hover' => 'background-color: {{VALUE}}',
        ],
      ]
    );

    $this->add_control(
      'cat_btn_color', [
        'label' => __('Text Color', 'meta-store-elements'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
          '{{WRAPPER}} .ms-product-category-block1 .cat-btn' => 'color: {{VALUE}}',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(), [
        'name' => 'cat_btn_typography',
        'label' => __('Typography', 'meta-store-elements'),
        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
        'selector' => '{{WRAPPER}} .ms-product-category-block1 .cat-btn',
      ]
    );

    $this->end_controls_section();
  }

  /** Render Layout */
  protected function render() {
    // $args = array(
    // 'post_type' => 'product',
    // // 'meta_key' => '_featured',
    // // 'meta_value' => 'yes',
    // 'orderby' => 'meta_value_num',
    // 'posts_per_page' => 12,
    // // 'meta_query' => array(
    // //     array(
    // //         'key'     => 'age',
    // //         'value'   => array( 3, 4 ),
    // //         'compare' => 'IN',
    // //     ),
    // // ),
    // );

    // Bestsellers
    // $args = array(
    //     'post_type' => 'product',
    //     'meta_key' => 'total_sales',
    //     'orderby' => 'meta_value_num',
    //     'posts_per_page' => 12,
    // );

//     // on sale - show all sale products, even those after or before sale periods - to do
//
        // $args = array(
        //         'post_type' => 'product',
        //         // 'meta_key' => '_sale_price',
        //         // 'orderby' => 'rating',
        //          'post__in' => wc_get_product_ids_on_sale(),
        //         'order' => 'DESC',
        //         // 'meta_query' => array(
        //         //   array(
        //         //             'key' => '_sale_price',
        //         //             'value' => '',
        //         //             'compare' => '!='
        //         //         ),
        //         //         ),
        //         );

                // featured working!
              //
                    $args = array(
                            'post_type' => 'product',
                            // 'meta_key' => '_featured',
                            'orderby' => 'rating',
                            'order' => 'DESC',
                            'post__in' => wc_get_featured_product_ids(),
                            // 'tax_query' => array(
                            //     'taxonomy' => 'product_visibility',
                            //     'field'    => 'name',
                            //     'terms'    => 'featured',
                            //     'operator' => 'IN', // or 'NOT IN' to exclude feature products
                            // ),
                            );

    $loop = new WP_Query( $args );?>
    <div style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr">
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                  <?php  $product = get_product($loop->post); ?>
        <div>
          <!-- <?php echo '<pre>' . var_export($product, true) . '</pre>'; ?> -->
          <?php
$date = new DateTime();
echo $date->format('Y-m-d H:i:sP');
?>
          <hr></hr>
          <!-- <h1><?php echo $product->date_on_sale_to ?></h1> -->
          <!-- <h1><?php echo   $product->get_featured(); ?></h1> -->

          <?php echo woocommerce_get_product_thumbnail('woocommerce_full_size'); ?>
          <a href="<?php echo get_permalink( $product->ID ) ?>">
            <?php the_title(); ?>
            <p>average rating<?php echo $product->get_average_rating();?></p>
            <p>regular price<?php echo $product->get_regular_price(); ?></p>
            <p>sale price<?php echo $product->get_sale_price(); ?></p>
          </a>
        </div>
      <?php endwhile;?>
    </div>
    <h1>End of widget</h1>
    <?php wp_reset_query(); // Remember to reset






  }



}
