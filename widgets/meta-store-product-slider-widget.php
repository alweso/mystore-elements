<?php
    class My_Store_Product_Slider_Widget extends \Elementor\Widget_Base {
        /** Widget Name **/
        public function get_name() {
            return 'ms-product-slider';
        }

        /** Widget Title **/
        public function get_title() {
            return esc_html__( 'Product Slider Widget', 'meta-store-elements' );
        }

        /** Widget Icon **/
        public function get_icon() {
            return 'eicon-post-list';
        }

        /** Categories **/
        public function get_categories() {
            return [ 'meta-store-elements' ];
        }

        /** Dependencies */
        public function get_script_depends() {
            return [ 'owl-carousel' ];
        }

        /** Widget Controls **/
        protected function _register_controls() {

            $this->start_controls_section(
                'header', [
                    'label' => esc_html__('Header', 'meta-store-elements'),
                ]
            );

                $this->add_group_control(
                    Group_Control_Header::get_type(), [
                    'name' => 'header',
                    'label' => esc_html__('Header', 'meta-store-elements'),
                        ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'product_query', [
                    'label' => esc_html__('Content', 'meta-store-elements'),
                ]
            );

            $this->add_control(
                'dot_nav_show',
                    [
                    'label' => esc_html__( 'Dot Nav', 'menheer-plugin' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'menheer-plugin' ),
                    'label_off' => esc_html__( 'No', 'menheer-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes'
                    ]
            );

                $this->add_control(
                    'product_type',
                    [
                        'label' => __( 'Product Type', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'latest',
                        'options' => [
                            'latest'  => __( 'Latest', 'meta-store-elements' ),
                            'featured'  => __( 'Featured', 'meta-store-elements' ),
                            'best-selling' => __( 'Best Selling', 'meta-store-elements' ),
                            'sale' => __( 'Sale', 'meta-store-elements' ),
                            'top-rated' => __( 'Top Rated', 'meta-store-elements' ),
                        ],
                    ]
                );

                $this->add_control(
                    'no_of_products',
                    [
                        'label' => __( 'No. of products', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'no' ],
                        'range' => [
                            'no' => [
                                'min' => 1,
                                'max' => 10,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'no',
                            'size' => 3,
                        ],
                    ]
                );

                $this->add_control(
                    'orderby',
                    [
                        'label' => __( 'Order By', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'none',
                        'options' => [
                            'none' => __( 'None', 'meta-store-elements' ),
                            'ID' => __( 'ID', 'meta-store-elements' ),
                            'date' => __( 'Date', 'meta-store-elements' ),
                            'name' => __( 'Name', 'meta-store-elements' ),
                            'title' => __( 'Title', 'meta-store-elements' ),
                            'rand' => __( 'Random', 'meta-store-elements' ),
                            'comment_count' => __( 'Comment Count', 'meta-store-elements' ),
                        ],
                    ]
                );

                $this->add_control(
                    'order',
                    [
                        'label' => __( 'Order By', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'DESC',
                        'options' => [
                            'ASC' => __( 'Ascending', 'meta-store-elements' ),
                            'DESC' => __( 'Descending', 'meta-store-elements' ),
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'additional_settings', [
                    'label' => esc_html__('Additional Settings', 'meta-store-elements'),
                ]
            );

                $this->add_group_control(
                    \Elementor\Group_Control_Image_Size::get_type(),
                    [
                        'name' => 'image_size',
                        'exclude' => [ 'custom' ],
                        'include' => [],
                        'default' => 'large',
                    ]
                );

                $this->add_control(
                    'image_height',
                    [
                        'label' => __( 'Image Height', 'plugin-domain' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 50,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 120,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .product-list li .product-image' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'color_scheme',
                    [
                        'label' => __( 'Color Scheme', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .ms-header a:hover,{{WRAPPER}} .ms-product-list .product-list .content h3 a:hover,{{WRAPPER}} .ms-product-list .star-rating span:before,{{WRAPPER}} .ms-product-list .product-list .content h3 a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'header_style', [
                    'label' => esc_html__('Header', 'meta-store-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'header_color',
                    [
                        'label' => __( 'Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .ms-header,{{WRAPPER}} .ms-product-list .ms-header a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_control(
                    'header_padding',
                    [
                        'label' => __( 'Padding', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'allowed_dimensions' => 'vertical',
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .ms-header' => 'padding: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'header_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-product-list .ms-header',
                    ]
                );

                $this->add_control(
                    'separator_color',
                    [
                        'label' => __( 'Separator Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .ms-header' => 'border-bottom-color: {{VALUE}}',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'rating_style', [
                    'label' => esc_html__('Rating', 'meta-store-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'rating_color',
                    [
                        'label' => __( 'Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .star-rating' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_control(
                    'rating_margin',
                    [
                        'label' => __( 'Margin', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'allowed_dimensions' => 'vertical',
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .star-rating' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'title_style', [
                    'label' => esc_html__('Product Title', 'meta-store-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'title_color',
                    [
                        'label' => __( 'Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .product-list .content h3 a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-product-list .product-list .content h3',
                    ]
                );

                $this->add_control(
                    'title_margin',
                    [
                        'label' => __( 'Margin', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'allowed_dimensions' => 'vertical',
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .product-list .content h3' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'price_style', [
                    'label' => esc_html__('Price', 'meta-store-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'price_color',
                    [
                        'label' => __( 'Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .product-list .price' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'price_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-product-list .product-list .price',
                    ]
                );

                $this->add_control(
                    'price_margin',
                    [
                        'label' => __( 'Margin', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'allowed_dimensions' => 'vertical',
                        'selectors' => [
                            '{{WRAPPER}} .ms-product-list .product-list .price' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();
        }

        /** Render Layout **/
        protected function render() {
            $settings = $this->get_settings_for_display();
            // echo "<pre>";
            // print_r($settings);
            // echo "</pre>";
            $product_type = isset( $settings['product_type'] ) ? $settings['product_type'] : 'latest';

            $args = $this->get_query_args( $product_type );
            $image_size = $settings['image_size_size'] ? $settings['image_size_size'] : 'large';
            $product_query = new WP_Query( $args );
            $slide_controls    = [
               'dot_nav_show' => $settings['dot_nav_show'],
             ];
            $slide_controls = \json_encode($slide_controls);
            ?>
                <div class="">

                    <?php if( $product_query->have_posts() ) : ?>
                        <ul data-controls="<?php echo esc_attr($slide_controls); ?>" class="ms-product-slider owl-carousel">
                            <?php while( $product_query->have_posts() ) : $product_query->the_post(); ?>
                                <li class="producteeg">
                                    <div class="product-image">
                                        <?php if( has_post_thumbnail() ) : ?>
                                            <?php
                                                $img = wp_get_attachment_image_src( get_post_thumbnail_id(), $image_size );
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php echo esc_attr( My_Store_elements_get_altofimage( absint( get_post_thumbnail_id() ) ) ); ?>">
                                            </a>
                                    </div>
                                    <div class="content">

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
            <?php
        }

        /** Query Arguments */
        protected function get_query_args( $product_type ) {
            $settings = $this->get_settings_for_display();
            $no_of_products = ( $settings['no_of_products']['size'] ) ? $settings['no_of_products']['size'] : 4;
            $orderby = ( $settings['orderby'] ) ? $settings['orderby'] : 'none';
            $order = ( $settings['order'] ) ? $settings['order'] : 'DESC';

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => $no_of_products,
                'orderby' => $orderby,
                'order' => $order,
            );

            switch( $product_type ) {
                case 'latest':
                    $args['orderby'] = 'date';
                    $args['order'] = 'DESC';
                break;

                case 'featured':
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                            'operator' => 'IN',
                        )
                    );
                break;

                case 'best-selling':
                    $args['meta_key'] = 'total_sales';
                    $args['orderby'] = 'meta_value_num';
                break;

                case 'sale':
                    $args['meta_query'] = array(
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
                    );
                break;

                case 'top-rated':
                    $args['meta_key'] = '_wc_average_rating';
                    $args['orderby'] = 'meta_value_num';
                    $args['order'] = 'DESC';
                break;
            }
            return $args;
        }

        /** Render Header */
        protected function render_header() {
            $settings = $this->get_settings();
            $this->add_render_attribute('header_attr', 'class', [
                'ms-header',
                ]
            );

            $link_open = $link_close = "";
            $target = $settings['header_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $settings['header_link']['nofollow'] ? ' rel="nofollow"' : '';
            $header_tag = $settings['header_tag'] ? $settings['header_tag'] : 'h2';

            if ($settings['header_link']['url']) {
                $link_open = '<a href="' . $settings['header_link']['url'] . '"' . $target . $nofollow . '>';
                $link_close = '</a>';
            }

            if ($settings['header_title']) {
                ?>
                <?php echo '<' . esc_attr($header_tag) . ' ' . $this->get_render_attribute_string('header_attr') . '>' ?>
                    <?php
                        echo wp_kses( $link_open, array(
                            'a' => array(
                                'target' => array(),
                                'rel' => array(),
                                'href' => array()
                            )
                        ) );
                        echo esc_html($settings['header_title']);
                        echo wp_kses( $link_close, array(
                            'a' => array()
                        ) );
                    ?>
                <?php echo '</' . esc_attr($header_tag) . '>'; ?>
                <?php
            }
        }
    }
