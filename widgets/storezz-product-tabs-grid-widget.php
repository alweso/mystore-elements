<?php
    class Storezz_Product_Tabs_Grid_Widget extends \Elementor\Widget_Base {
        /** Widget Name **/
        public function get_name() {
            return 'storezz-product-tabs-grid';
        }

        /** Widget Title **/
        public function get_title() {
            return esc_html__( 'Product Tabs Grid', 'storezz-elements' );
        }

        /** Widget Icon **/
        public function get_icon() {
            return 'eicon-tabs';
        }

        /** Categories **/
        public function get_categories() {
            return [ 'storezz-elements' ];
        }

        /** Widget Controls **/
        protected function _register_controls() {

            $this->start_controls_section(
                'product_query', [
                    'label' => esc_html__('Content', 'storezz-elements'),
                ]
            );

                $this->add_group_control(
                    Group_Control_Produt_Query::get_type(), [
                    'name' => 'products',
                        'label' => esc_html__('Products', 'storezz-elements'),
                    ]
                );

                $this->add_control(
                    'align_tabs',
                    [
                        'label' => __( 'Tabs Alignment', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'left' => [
                                'title' => __( 'Left', 'storezz-elements' ),
                                'icon' => 'fa fa-align-left',
                            ],
                            'center' => [
                                'title' => __( 'Center', 'storezz-elements' ),
                                'icon' => 'fa fa-align-center',
                            ],
                            'right' => [
                                'title' => __( 'Right', 'storezz-elements' ),
                                'icon' => 'fa fa-align-right',
                            ],
                        ],
                        'default' => 'center',
                        'toggle' => true,
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'tabs_text_style', [
                    'label' => esc_html__('Tabs', 'storezz-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'tabs_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-product-tabs-grid .tabs li' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .storezz-product-tabs-grid .tabs li:after' => 'background-color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_control(
                    'tabs_hover_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-product-tabs-grid .tabs li:hover, {{WRAPPER}} .storezz-product-tabs-grid .tabs li.active' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .storezz-product-tabs-grid .tabs li:hover:after, {{WRAPPER}} .storezz-product-tabs-grid .tabs li.active:after' => 'background-color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'tab_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-product-tabs-grid .tabs li',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'title_style', [
                    'label' => esc_html__('Product Title', 'storezz-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'title_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .products li.product .woocommerce-loop-product__title a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_control(
                    'title_hover_color',
                    [
                        'label' => __( 'Hover Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .products li.product .woocommerce-loop-product__title a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .products li.product .woocommerce-loop-product__title a',
                    ]
                );

                $this->add_control(
                    'title_margin',
                    [
                        'label' => __( 'Margin', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'allowed_dimensions' => 'vertical',
                        'selectors' => [
                            '{{WRAPPER}} .products li.product .woocommerce-loop-product__title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'price_style', [
                    'label' => esc_html__('Price', 'storezz-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'price_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} ul.products li.product .storezz-woocommerce-product-info .price' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'price_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} ul.products li.product .storezz-woocommerce-product-info .price',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'onsale_style', [
                    'label' => esc_html__('On Sale', 'storezz-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'onsale_bgcolor',
                    [
                        'label' => __( 'Background Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .onsale' => 'background-color: {{VALUE}}',
                            '{{WRAPPER}} .onsale:after' => 'border-left: 13px solid {{VALUE}}; border-right: 13px solid {{VALUE}}; border-bottom: 13px solid transparent',
                        ],
                    ]
                );

                $this->add_control(
                    'onsale_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .onsale span' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'onsale_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .onsale',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'cart_style', [
                    'label' => esc_html__('Add to cart', 'storezz-elements'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'cart_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} ul.products li.product .button' => 'border-color: {{VALUE}} !important',
                            '{{WRAPPER}} ul.products li.product .button' => 'color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_control(
                    'cart_hover_color',
                    [
                        'label' => __( 'Hover Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} ul.products li.product .button:hover' => 'border-color: {{VALUE}} !important',
                            '{{WRAPPER}} ul.products li.product .button:hover' => 'color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'cart_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} ul.products li.product .button',
                    ]
                );

            $this->end_controls_section();

        }

        /** Render Layout **/
        protected function render() {
            $settings = $this->get_settings_for_display();
            $column_layout = ( $settings['products_column_layout'] ) ? $settings['products_column_layout'] : 'columns-4';
            $align_tabs = $settings['align_tabs'] ? $settings['align_tabs'] : 'center';
            ?>
                <div class="storezz-product-tabs-grid <?php echo esc_attr($align_tabs); ?>" id="storezz-product-tabs-grid-<?php echo esc_attr( $this->get_id() ); ?>">
                    <div class="header">
                        <?php if( !empty( $settings['products_tabs'] ) ) : ?>
                            <ul class="tabs">
                                <?php $li_counter = 1; ?>
                                <?php foreach( $settings['products_tabs'] as $id ) : ?>
                                    <?php $active_class = ( $li_counter == 1 ) ? 'active' : ''; ?>
                                    <li data-id="storezz-<?php echo esc_attr( $id ) . '-' . esc_attr( $this->get_id() ); ?>" class="<?php echo esc_attr($active_class); ?>" ><?php echo esc_html( $id ); ?></li>
                                    <?php $li_counter++; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="products-wrap">
                        <?php $tab_counter = 1; ?>
                        <?php foreach( $settings['products_tabs'] as $product_type ) : ?>
                            <?php $tactive_class = ( $tab_counter == 1 ) ? 'active' : ''; ?>
                            <ul class="product-type-wrap products <?php echo esc_attr( $column_layout ); ?> <?php echo esc_attr($tactive_class); ?>" id="storezz-<?php echo esc_attr( $product_type ) . '-' . esc_attr( $this->get_id() ); ?>">
                                <?php
                                    $args = $this->get_query_args( $product_type );
                                    $product_query = new WP_Query( $args );

                                    if( $product_query->have_posts() ) {
                                        while( $product_query->have_posts() ) {
                                            $product_query->the_post();

                                            wc_get_template_part( 'content', 'product' );

                                        }
                                        wp_reset_postdata();
                                    }
                                ?>
                            </ul>
                            <?php $tab_counter++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php
            // $this->render_scripts();
        }

        /** Query Arguments */
        protected function get_query_args( $product_type ) {
            $settings = $this->get_settings_for_display();
            $no_of_products = ( $settings['products_no_of_products']['size'] ) ? $settings['products_no_of_products']['size'] : 4;
            $orderby = ( $settings['products_orderby'] ) ? $settings['products_orderby'] : 'none';
            $order = ( $settings['products_order'] ) ? $settings['products_order'] : 'DESC';

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

        /** Render Scripts */
        protected function render_scripts() {
            $unique_id = $this->get_id();
            $id = '#storezz-product-tabs-grid-' . $unique_id;
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    $('<?php echo esc_attr( $id ) ?> .tabs li').removeClass('active');
                    $('<?php echo esc_attr( $id ) ?> .tabs li:first-child').addClass('active');

                    $('<?php echo esc_attr( $id ) ?> .products-wrap .product-type-wrap').removeClass('active');
                    $('<?php echo esc_attr( $id ) ?> .products-wrap .product-type-wrap:first-child').addClass('active');

                    $('<?php echo esc_attr( $id ) ?> .tabs li').on('click', function(e){
                        e.preventDefault();

                        $(this).parents('<?php echo esc_attr( $id ) ?>').find('.tabs li').removeClass('active');
                        $(this).addClass('active');

                        var uid = $(this).data('id');

                        $(this).parents('<?php echo esc_attr( $id ) ?>').find('.products-wrap .product-type-wrap').removeClass('active');
                        $('#' + uid).addClass('active');
                    });
                });
            </script>
            <?php
        }
    }
