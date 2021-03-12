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
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 0,
        'options'   => [
          'latest'      =>esc_html__( 'Latest', 'menheer-plugin' ),
          'bestsellers'      =>esc_html__( 'Bestsellers', 'menheer-plugin' ),
          'toprated'      =>esc_html__( 'Top Rated', 'menheer-plugin' ),
          'onsale'      =>esc_html__( 'On Sale', 'menheer-plugin' ),
          'featured'      =>esc_html__( 'Featured', 'menheer-plugin' ),
        ],
      ]
    );

    $this->add_control(
      'number_of_products',
      [
        'label' => __( 'Number of products', 'menheer-plugin' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => __( 4, 'menheer-plugin' ),
        'min' => 1,
        'step' => 1,
      ]
    );

    $this->add_control(
      'number_of_columns',
      [
        'label' => __( 'Number of columns', 'menheer-plugin' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '1fr 1fr 1fr 1fr',
        'options'   => [
          '1fr'      =>esc_html__( '1', 'menheer-plugin' ),
          '1fr 1fr'      =>esc_html__( '2', 'menheer-plugin' ),
          '1fr 1fr 1fr'      =>esc_html__( '3', 'menheer-plugin' ),
          '1fr 1fr 1fr 1fr'      =>esc_html__( '4', 'menheer-plugin' ),
          '1fr 1fr 1fr 1fr 1fr'      =>esc_html__( '5', 'menheer-plugin' ),
        ],
      ]
    );


    $this->add_control(
      'column_gap',
      [
        'label' => __( 'Column Gap', 'meta-store-elements' ),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => __( 4, 'menheer-plugin' ),
        'min' => 0,
        'max' => 40,
        'step' => 1,
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
    $settings = $this->get_settings_for_display();
    $pickProductBy = $settings['pick_by'];
    $numberOfProducts = $settings['number_of_products'];
    $numberOfColumns = $settings['number_of_columns'];
    $columnGap = $settings['column_gap'];

    switch ($pickProductBy) {
      case 'latest':
      $args = array(
        'post_type' => 'product',
        // 'orderby' => 'rating',
        'order' => 'DESC',
        'posts_per_page' => $numberOfProducts,
      );
      break;

      case 'toprated':
      $args = array(
        'post_type' => 'product',
        // 'meta_key' => 'total_sales',
        // 'orderby' => 'ratings',
        'orderby'   => 'meta_value_num',
        'meta_key'  => '_wc_average_rating',
        'order' => 'DESC',
        'posts_per_page' => $numberOfProducts,
      );
      break;

      case 'featured':
      $args = array(
        'post_type' => 'product',
        // 'orderby' => 'rating',
        'order' => 'DESC',
        'post__in' => wc_get_featured_product_ids(),
        'posts_per_page' => $numberOfProducts,
      );
      break;

      case 'onsale':
      $args = array(
        'post_type' => 'product',
        // 'orderby' => 'rating',
        'post__in' => wc_get_product_ids_on_sale(),
        'order' => 'DESC',
        'posts_per_page' => $numberOfProducts,
      );
      break;

      case 'bestsellers':
      $args = array(
        'post_type' => 'product',
        'meta_key' => 'total_sales',
        'orderby' => 'meta_value_num',
        'posts_per_page' => $numberOfProducts,
      );
      break;

    }



    echo do_shortcode('[products limit="4" columns="4" orderby="popularity" class="quick-sale" on_sale="true" ]');

    $loop = new WP_Query( $args );?>

    <div style="display:grid;grid-template-columns:<?php echo $numberOfColumns ?>;grid-column-gap:<?php echo $columnGap ?>px;grid-row-gap:<?php echo $columnGap ?>;">
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php $product = get_product($loop->post); ?>
        <?php $rating = $product->get_average_rating(); ?>
        <?php $ratingPercentage = ($rating/5)*100 ?>
        <?php echo wc_get_product($product->ID); ?>
        <div style="position:relative;">
          <?php
          if ($product->is_on_sale()) {?>
            <span class="onsale">Sale!</span>
            <?php
          } ?>
          <!-- <?php echo '<pre>' . var_export($product, true) . '</pre>'; ?> -->
          <?php echo woocommerce_get_product_thumbnail('woocommerce_thumbnail'); ?>
          <a href="<?php echo get_permalink( $product->ID ) ?>">
            <?php the_title(); ?>
          </a>
          <?php if($rating > 0) { ?>
              <div class="stars"><div class="stars-inner" style="--w:  <?php echo $ratingPercentage ?>%;"></div></div>
          <?php } ?>
          <p>regular price<?php echo $product->get_regular_price(); ?></p>
          <p>sale price<?php echo $product->get_sale_price(); ?></p>
          <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>"> Add to Cart </a>
        </div>
      <?php endwhile;?>
    </div>
    <h1>End of widget</h1>
    <?php wp_reset_query(); // Remember to reset






  }



}?>
<style>

</style>
