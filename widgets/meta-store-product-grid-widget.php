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
        return __('Product Product Grid', 'meta-store-elements');
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
                'product_categories', [
            'label' => __('Category 1', 'meta-store-elements'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'default' => 0,
            'multiple' => true,
            'options' => My_Store_elements_get_woo_categories_list(),
                ]
        );


        // $this->add_control(
        //         'product_category1', [
        //     'label' => __('Category 1', 'meta-store-elements'),
        //     'type' => \Elementor\Controls_Manager::SELECT2,
        //     'default' => 0,
        //     'multiple' => true,
        //     'options' => My_Store_elements_get_woo_categories_list(),
        //         ]
        // );

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
      $args = array(
        'post_type' => 'product',
        'posts_per_page' => 4
      );
      $loop = new WP_Query( $args );
      $product = get_product($loop->post); ?>
      <div style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr">
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div>
          <!-- <?php echo '<pre>' . var_export($product, true) . '</pre>'; ?> -->
          <?php echo woocommerce_get_product_thumbnail('woocommerce_full_size'); ?>
          <a href="<?php echo get_permalink( $loop->post->ID ) ?>">
              <?php the_title(); ?>
              <?php echo $product->get_price_html(); ?>
          </a>
        </div>
      <?php endwhile;?>
    </div>
      <?php wp_reset_query(); // Remember to reset

    }



}
