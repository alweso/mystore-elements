<?php

/**
 * Magazine Post Carousel Widget.
 */
class Storezz_Category_Grid_Widget extends \Elementor\Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'storezz-product-category-grid-widget';
    }

    /** Widget Title */
    public function get_title() {
        return __('Product Category Grid', 'storezz-elements');
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
            'product_categories', [
            'label' => __('Category 1', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
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
                '{{WRAPPER}} .storezz-product-category-block1 .cat-btn:hover' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'cat_btn_style', [
            'label' => __('Category Button', 'storezz-elements'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'cat_btn_bgcolor', [
            'label' => __('Background', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .storezz-product-category-block1 .cat-btn:hover' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'cat_btn_color', [
            'label' => __('Text Color', 'storezz-elements'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .storezz-product-category-block1 .cat-btn' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'cat_btn_typography',
            'label' => __('Typography', 'storezz-elements'),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .storezz-product-category-block1 .cat-btn',
                ]
        );

        $this->end_controls_section();
    }

    /** Render Layout */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $categories = $settings['product_categories'];
        ?>
        <div class="storezz-product-category-grid"  style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr">
          <?php foreach( $categories as $category ) {?>
            <div>
              <?php
              $idcat = $category;
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



}
