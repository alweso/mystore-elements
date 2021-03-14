<?php

/**
 * Magazine Post Carousel Widget.
 */
class Storezz_Product_Category_Block2_Widget extends \Elementor\Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'storezz-product-category-block2-widget';
    }

    /** Widget Title */
    public function get_title() {
        return __('Product Category Block 2', 'storezz-elements');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-inner-section';
    }

    /** Category */
    public function get_categories() {
        return ['storezz-elements'];
    }

    /** Controls */
    protected function _register_controls() {
        $this->start_controls_section(
                'content_section', [
            'label' => __('Content', 'storezz-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'product_category1', [
            'label' => __('Category 1', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 0,
            'options' => Storezz_elements_get_woo_categories_list(),
                ]
        );

        $this->add_control(
                'product_category2', [
            'label' => __('Category 2', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 0,
            'options' => Storezz_elements_get_woo_categories_list(),
                ]
        );

        $this->add_control(
                'product_category3', [
            'label' => __('Category 3', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 0,
            'options' => Storezz_elements_get_woo_categories_list(),
                ]
        );

        $this->add_control(
                'product_category4', [
            'label' => __('Category 4', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 0,
            'options' => Storezz_elements_get_woo_categories_list(),
                ]
        );

        $this->add_control(
                'product_category5', [
            'label' => __('Category 5', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 0,
            'options' => Storezz_elements_get_woo_categories_list(),
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'additional_settings', [
            'label' => __('Additional Settings', 'storezz-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'image_size_label', [
            'label' => __('Image Size', 'storezz-elements'),
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
            'label' => __('Color Scheme', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .storezz-product-category-block2 .cat-btn:hover' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'cat_text_style', [
            'label' => __('Category Text', 'storezz-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'cat_text_color', [
            'label' => __('Text Color', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .storezz-product-category-block2 .cat-btn .ct-name' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'cat_text_typography',
            'label' => __('Typography', 'storezz-elements'),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .storezz-product-category-block2 .cat-btn .ct-name',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'product_count_style', [
            'label' => __('Product Count', 'storezz-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'product_count_color', [
            'label' => __('Color', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .storezz-product-category-block2 .cat-btn .ct-pcount' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'product_count_typography',
            'label' => __('Typography', 'storezz-elements'),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .storezz-product-category-block2 .cat-btn .ct-pcount',
                ]
        );

        $this->add_control(
                'product_count_margin', [
            'label' => __('Margin', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'allowed_dimensions' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} .storezz-product-category-block2 .cat-btn .ct-pcount' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
            ],
                ]
        );

        $this->end_controls_section();
    }

    /** Render Layout */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $category1 = $settings['product_category1'] ? get_term($settings['product_category1']) : 0;
        $category2 = $settings['product_category2'] ? get_term($settings['product_category2']) : 0;
        $category3 = $settings['product_category3'] ? get_term($settings['product_category3']) : 0;
        $category4 = $settings['product_category4'] ? get_term($settings['product_category4']) : 0;
        $category5 = $settings['product_category5'] ? get_term($settings['product_category5']) : 0;
        ?>
        <div class="storezz-product-category-block2" id="storezz-product-category-block2-<?php echo esc_attr($this->get_id()); ?>" >
            <?php if ($category1) : ?>
                <div class="product-cat product-cat1">
                    <?php $this->get_product_category_content($category1); ?>
                </div>
            <?php endif; ?>


            <?php if ($category2) : ?>
                <div class="product-cat product-cat2">
                    <?php $this->get_product_category_content($category2); ?>
                </div>
            <?php endif; ?>

            <?php if ($category3) : ?>
                <div class="product-cat product-cat3">
                    <?php $this->get_product_category_content($category3); ?>
                </div>
            <?php endif; ?>

            <?php if ($category4) : ?>
                <div class="product-cat product-cat4">
                    <?php $this->get_product_category_content($category4); ?>
                </div>
            <?php endif; ?>

            <?php if ($category5) : ?>
                <div class="product-cat product-cat5">
                    <?php $this->get_product_category_content($category5); ?>
                </div>
            <?php endif; ?>

        </div>
        <?php
    }

    /** Procut Category Content */
    protected function get_product_category_content($category) {
        $settings = $this->get_settings_for_display();
        $image_size = $settings['image_size_size'] ? $settings['image_size_size'] : 'large';
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_image_src($thumbnail_id, $image_size);
        ?>
        <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(Storezz_elements_get_altofimage(absint($thumbnail_id))); ?>" />
        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="cat-btn">
            <span class="ct-name" ><?php echo esc_html($category->name); ?></span>
            <span class="ct-pcount"><?php echo esc_html($category->count); ?> <?php echo esc_html__('Products Inside', 'storezz-elements'); ?></span>
        </a>
        <?php
    }

}
