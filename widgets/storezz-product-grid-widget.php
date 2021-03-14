<?php

/**
* Magazine Post Carousel Widget.
*/
class Storezz_Product_Grid_Widget extends \Elementor\Widget_Base {

  /** Widget Name */
  public function get_name() {
    return 'storezz-product-grid-widget';
  }

  /** Widget Title */
  public function get_title() {
    return __('Product Grid', 'storezz-elements');
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
      'choose_categories', [
        'label' => __('Choose Categories', 'storezz-elements'),
        'type' => \Elementor\Controls_Manager::SELECT2,
        'default' => '',
        'multiple' => true,
        'options'   => storezz_elements_get_woo_categories_list(),
      ]
    );

    // featured product - // todDo

    $this->add_control(
      'featured',
      [
        'label' => esc_html__('Show featured only', 'digiqole'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'featured' => esc_html__('featured', 'digiqole'),
        'visible' => esc_html__('visible', 'digiqole'),
        'default' => 'visible',
      ]
    );

    $this->add_control(
      'is_on_sale',
      [
        'label' => esc_html__('Show on sale products only', 'digiqole'),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'featured' => esc_html__('featured', 'digiqole'),
        'visible' => esc_html__('visible', 'digiqole'),
        'default' => 'visible',
      ]
    );

    $this->add_control(
      'order_by', [
        'label' => __('Order Products By', 'storezz-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'title',
        'options'   => [
          ''      =>esc_html__( '', 'menheer-plugin' ),
          'date'      =>esc_html__( 'Date', 'menheer-plugin' ),
          'id'      =>esc_html__( 'ID', 'menheer-plugin' ),
          'menu_order'      =>esc_html__( 'Menu Order', 'menheer-plugin' ),
          'popularity'      =>esc_html__( 'Best selling', 'menheer-plugin' ),
          'rating'      =>esc_html__( 'Rating', 'menheer-plugin' ),
          'title'      =>esc_html__( 'Name', 'menheer-plugin' ),
          'rand'      =>esc_html__( 'Random', 'menheer-plugin' ),
        ],
      ]
    );

    $this->add_control(
      'order', [
        'label' => __('Order (ASC/DESC)', 'storezz-elements'),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '',
        'options'   => [
          'ASC'      =>esc_html__( 'Ascending', 'menheer-plugin' ),
          'DESC'      =>esc_html__( 'Descending', 'menheer-plugin' ),
        ],
        'condition' => [ 'order_by' => ['date', 'id', 'menu_order', 'title', 'rand', ''] ]
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
        'default' => '4',
        'options'   => [
          '1'      =>esc_html__( '1', 'menheer-plugin' ),
          '2'      =>esc_html__( '2', 'menheer-plugin' ),
          '3'      =>esc_html__( '3', 'menheer-plugin' ),
          '4'      =>esc_html__( '4', 'menheer-plugin' ),
          '5'      =>esc_html__( '5', 'menheer-plugin' ),
          '6'      =>esc_html__( '6', 'menheer-plugin' ),
        ],
      ]
    );


    $this->add_control(
      'column_gap',
      [
        'label' => __( 'Column Gap', 'storezz-elements' ),
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
    
    $chooseCategories = $settings['choose_categories'];
    $orderBy = $settings['order_by'];
    $order = $settings['order'];
    $featured = $settings['featured'];
    $is_on_sale = $settings['is_on_sale'];
    $numberOfProducts = $settings['number_of_products'];
    $numberOfColumns = $settings['number_of_columns'];
    $columnGap = $settings['column_gap'];

    if (!empty($chooseCategories)) {
      $categorySlugs = getCategorySlugsFromIds( $chooseCategories );
    } else {
      $categorySlugs = '';
    };

    $visibility = "visible";
    if ($featured == "yes") {
          $visibility = "featured";
    };

    $onsale = false;
    if ($is_on_sale == "yes") {
          $onsale = true;
    };

    echo do_shortcode('[products limit="'.$numberOfProducts.'" on_sale="'.$onsale.'" visibility="'.$visibility.'" columns="'.$numberOfColumns.'" category="'.$categorySlugs.'" cat_operator="IN" orderby="'.$orderBy.'" order="'.$order.'"]');?>

<?php  }
}?>
