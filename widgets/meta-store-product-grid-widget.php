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
          'on_sale'      =>esc_html__( 'On Sale', 'menheer-plugin' ),
          'top_rated'    =>esc_html__( 'Top Rated', 'menheer-plugin' ),
          'post'    =>esc_html__( 'Post id', 'menheer-plugin' ),
          'author'    =>esc_html__( 'Author', 'menheer-plugin' ),
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
    // Setup your custom query
    // Setup your custom query
   //  $args = array(
   //  'post_type' => 'product',
   //  // 'meta_key' => 'on_sale',
   //  // 'orderby' => 'meta_value_num',
   //  'posts_per_page' => 12,
   //  'meta_query'     => array(
   //     array(
   //         'key'           => '_sale_price',
   //         'value'         => 0,
   //         'compare'       => '>',
   //         'type'          => 'numeric'
   //     )
   // )
   //  );

    $args = array(
    'post_type'   =>  'product',
    // 'stock'       =>  1,
    // 'showposts'   =>  6,
        'posts_per_page' => 12,
    'orderby'     =>  'date',
    'order'       =>  'DESC',
    'meta_query'  =>   array(
        'key'   => '_featured',
        'value' => 'yes'
    ),
);
    $product_query = new WP_Query( $args );?>
    <div class="">

        <?php if( $product_query->have_posts() ) : ?>
            <ul class="" style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr">
                <?php while( $product_query->have_posts() ) : $product_query->the_post(); ?>
                  <!-- <?php echo '<pre>';   var_dump($product_query); echo '</pre>';?> -->
                    <li class="">
                        <div class="">
                         <?php $product_query->add_star_rating(); ?>
                            <?php if( has_post_thumbnail() ) : ?>
                                <?php
                                    $img = wp_get_attachment_image_src( get_post_thumbnail_id(), $image_size );
                                ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php echo esc_attr( My_Store_elements_get_altofimage( absint( get_post_thumbnail_id() ) ) ); ?>">
                                </a>
                        </div>
                        <div class="">

                                <?php woocommerce_template_loop_rating(); ?>

                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <?php woocommerce_template_loop_price(); ?>

                            <?php endif; ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php wp_reset_postdata(); endif; ?>
        </div>
<h1>end of widget</h1>


<?php


  }



}
