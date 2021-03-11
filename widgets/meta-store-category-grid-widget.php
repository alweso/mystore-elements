<?php

/**
 * Magazine Post Carousel Widget.
 */
class My_Store_Category_Grid_Widget extends \Elementor\Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'ms-product-category-grid-widget';
    }

    /** Widget Title */
    public function get_title() {
        return __('Product Category Grid', 'meta-store-elements');
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
                'product_category1', [
            'label' => __('Category 1', 'meta-store-elements'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'default' => 0,
            'multiple' => true,
            'options' => My_Store_elements_get_woo_categories_list(),
                ]
        );

        // $this->add_control(
        //         'product_category2', [
        //     'label' => __('Category 2', 'meta-store-elements'),
        //     'type' => \Elementor\Controls_Manager::SELECT,
        //     'default' => 0,
        //     'options' => My_Store_elements_get_woo_categories_list(),
        //         ]
        // );
        //
        // $this->add_control(
        //         'product_category3', [
        //     'label' => __('Category 2', 'meta-store-elements'),
        //     'type' => \Elementor\Controls_Manager::SELECT,
        //     'default' => 0,
        //     'options' => My_Store_elements_get_woo_categories_list(),
        //         ]
        // );
        //
        // $this->add_control(
        //         'product_category4', [
        //     'label' => __('Category 4', 'meta-store-elements'),
        //     'type' => \Elementor\Controls_Manager::SELECT,
        //     'default' => 0,
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
        $settings = $this->get_settings_for_display();
        $category1 = $settings['product_category1'];
        $ccategories = $settings['product_category1'] ? get_term($settings['product_category1']) : 0;
        // $category2 = $settings['product_category2'] ? get_term($settings['product_category2']) : 0;
        // $category3 = $settings['product_category3'] ? get_term($settings['product_category3']) : 0;
        // $category4 = $settings['product_category4'] ? get_term($settings['product_category4']) : 0;
        ?>
        <div class="ms-product-category-grid"  style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr">
          <?php

          $product_categories = get_categories( array(
              'taxonomy'     => 'product_cat',
              'orderby'      => 'name',
              'pad_counts'   => false,
              'hierarchical' => 1,
              'hide_empty'   => false
          ) ); ?>

          <?php foreach( $category1 as $ccategory ) {?>
            <div>
              <?php
              $idcat = $ccategory;
              $thumbnail_id = get_woocommerce_term_meta( $idcat, 'thumbnail_id', true );
              $image = wp_get_attachment_url( $thumbnail_id );
              echo '<img src="'.$image.'" alt="" width="762" height="365" />'; ?>
              <h1> <?php echo get_term($idcat )->name ?></h1>
               <?php echo get_category_link($idcat); ?>
            </div>
           <?php } ?>

        </div>
        <?php
    }

    protected function get_cat_ID( $cat_name ) { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
        $cat = get_term_by( 'name', $cat_name, 'category' );

        if ( $cat ) {
            return $cat->term_id;
        }

        return 0;
    }

    /** Procut Category Content */
    protected function get_product_category_content($category) {
        $settings = $this->get_settings_for_display();
        $image_size = $settings['image_size'] ? $settings['image_size'] : 'large';
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_image_src($thumbnail_id, $image_size);
        ?>
        <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(My_Store_elements_get_altofimage(absint($thumbnail_id))); ?>" />
        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="cat-btn"><?php echo esc_html($category->name); ?></a>
        <?php
    }

}
