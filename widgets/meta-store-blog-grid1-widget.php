<?php
    /**
     * Magazine Post Carousel Widget.
     */
    class My_Store_Blog_Grid1_Widget extends \Elementor\Widget_Base {

        /** Widget Name */
        public function get_name() {
            return 'ms-blog-grid11-widget';
        }

        /** Widget Title */
        public function get_title() {
            return __( 'Blog Grid 1', 'meta-store-elements' );
        }

        /** Icon */
        public function get_icon() {
            return 'eicon-posts-grid';
        }

        /** Category */
        public function get_categories() {
            return [ 'meta-store-elements' ];
        }

        /** Controls */
        protected function _register_controls() {
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Content', 'meta-store-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

                $this->add_control(
                    'no_of_posts',
                    [
                        'label' => __( 'No. of Posts', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'no' ],
                        'range' => [
                            'no' => [
                                'min' => 1,
                                'max' => 20,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'no',
                            'size' => 4,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .box' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'posts',
                    [
                        'label' => __( 'Posts', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT2,
                        'multiple' => true,
                        'options' => My_Store_elements_post_lists( $multiple = true ),
                        'default' => [ 'all' ],
                    ]
                );

                $this->add_control(
                    'orderby',
                    [
                        'label' => __( 'Order By', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'date',
                        'options' => My_Store_elements_orderby_list(),
                    ]
                );

                $this->add_control(
                    'order',
                    [
                        'label' => __( 'Order', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'ASC',
                        'options' => My_Store_elements_order_list(),
                    ]
                );

                $this->add_control(
                    'show_category',
                    [
                        'label' => __( 'Show Category', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'meta-store-elements' ),
                        'label_off' => __( 'Hide', 'meta-store-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]
                );

                $this->add_control(
                    'show_author',
                    [
                        'label' => __( 'Show Author', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'meta-store-elements' ),
                        'label_off' => __( 'Hide', 'meta-store-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'extra_section',
                [
                    'label' => __( 'Additional Settings', 'meta-store-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

                $this->add_control(
                    'image_height',
                    [
                        'label' => __( 'Height', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 200,
                                'max' => 1000,
                                'step' => 5,
                            ]
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 360,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid1 .post-image' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'image_size',
                    [
                        'label' => __( 'Image Size', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'medium',
                        'options' => My_Store_elements_imagesizes_list(),
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
                            '{{WRAPPER}} .ms-blog-grid1 .categories a:hover' => 'background-color: {{VALUE}}',
                            '{{WRAPPER}} .ms-blog-grid1 .post-title a:hover' => 'color: {{VALUE}}'
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'category_style',
                [
                    'label' => __( 'Category Text', 'meta-store-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'category_bgcolor',
                    [
                        'label' => __( 'Background Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid1 .categories a' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_control(
                    'category_color',
                    [
                        'label' => __( 'Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid1 .categories a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'category_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-blog-grid1 .categories a',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'title_style',
                [
                    'label' => __( 'Title Text', 'meta-store-elements' ),
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
                            '{{WRAPPER}} .ms-blog-grid1 .post-title a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-blog-grid1 .post-title a',
                    ]
                );

                $this->add_control(
                    'title_margin',
                    [
                        'label' => __( 'Margin', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'allowed_dimensions' => 'vertical',
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid1 .post-title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'author_style',
                [
                    'label' => __( 'Author Text', 'meta-store-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'author_color',
                    [
                        'label' => __( 'Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid1 .author' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'author_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-blog-grid1 .author',
                    ]
                );

            $this->end_controls_section();
        }

        /** Render Layout */
        protected function render() {
            $settings = $this->get_settings_for_display();

            $heading = isset( $settings['heading'] ) ? $settings['heading'] : '';
            $no_of_posts = isset( $settings['no_of_posts']['size'] ) ? $settings['no_of_posts']['size'] : 10;
            $orderby = isset( $settings['orderby'] ) ? $settings['orderby'] : 'date';
            $order = isset( $settings['order'] ) ? $settings['order'] : 'ASC';
            $posts = isset( $settings['posts'] ) ? $settings['posts'] : array( 'all' );
            $image_size = isset( $settings['image_size'] ) ? $settings['image_size'] : 'medium';
            $show_category = ( $settings['show_category'] == 'yes' ) ? true : false;
            $show_author = ( $settings['show_author'] == 'yes' ) ? true : false;

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $no_of_posts,
                'order_by' => $orderby,
                'order' => $order
            );

            if(!in_array( 'all', $posts )) {
                $args['post_name__in'] = $posts;
            }

            $post_query = new WP_Query( $args );
            ?>
                <?php if( $post_query->have_posts() ) : ?>
                    <ul class="ms-blog-grid1" id="ms-blog-grid1-<?php echo esc_attr( $this->get_id() ) ?>">
                        <?php while( $post_query->have_posts() ) : $post_query->the_post(); ?>
                            <?php if( has_post_thumbnail() ) : ?>
                                <li>
                                    <?php
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), $image_size);
                                    ?>
                                    <div class="post-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( My_Store_elements_get_altofimage( absint(get_post_thumbnail_id()) ) ) ?>" />
                                        </a>
                                        <?php if( $show_category ) : ?>
                                            <div class="categories">
                                                <?php echo $this->get_post_categories(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <?php if( $show_author ) : ?>
                                            <div class="author">
                                                <span><?php echo esc_html($this->get_author_name()); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                <?php wp_reset_postdata(); endif; ?>
            <?php
        }

        /** Post Categories */
        protected function get_post_categories() {
            $categories = get_the_category();
            $categories_html = '';

            if( !empty( $categories ) ) {
                foreach( $categories as $category ) {
                    $categories_html .= "<a href='" . esc_url( get_category_link( $category->term_id ) ) . "'>" . esc_html( $category->name ) . "</a>";
                }
            }

            return $categories_html;
        }

        /** Post Author */
        protected function get_author_name() {
            return esc_html__( 'By ', 'meta-store-elements' ) . get_the_author_meta('nickname');
        }
    }
