<?php
    /**
     * Magazine Post Carousel Widget.
     */
    class My_Store_Blog_Grid2_Widget extends \Elementor\Widget_Base {

        /** Widget Name */
        public function get_name() {
            return 'ms-blog-grid2-widget';
        }

        /** Widget Title */
        public function get_title() {
            return __( 'Blog Grid 2', 'meta-store-elements' );
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

                $this->add_control(
                    'show_date',
                    [
                        'label' => __( 'Show Date', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'meta-store-elements' ),
                        'label_off' => __( 'Hide', 'meta-store-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]
                );

                $this->add_control(
                    'excerpt_length',
                    [
                        'label' => __( 'Excerpt Length', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'chars' ],
                        'range' => [
                            'no' => [
                                'min' => 50,
                                'max' => 200,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'no',
                            'size' => 50,
                        ],
                    ]
                );

                $this->add_control(
                    'readmore_text',
                    [
                        'label' => __( 'Readmore Text', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'Read More', 'meta-store-elements' ),
                        'placeholder' => __( 'Type your title here', 'meta-store-elements' ),
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
                                'min' => 0,
                                'max' => 1000,
                                'step' => 5,
                            ]
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 360,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid2 li .post-image' => 'height: {{SIZE}}{{UNIT}};',
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
                            '{{WRAPPER}} .ms-blog-grid2 .post-content .post-title a:hover, {{WRAPPER}} .ms-blog-grid2 .post-content .readmore-btn:hover' => 'color: {{VALUE}}'
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
                            '{{WRAPPER}} .ms-blog-grid2 .categories a' => 'background-color: {{VALUE}}',
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
                            '{{WRAPPER}} .ms-blog-grid2 .categories a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'category_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-blog-grid2 .categories a',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'author_style',
                [
                    'label' => __( 'Author & Date', 'meta-store-elements' ),
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
                            '{{WRAPPER}} .ms-blog-grid2 .post-content .post-metas' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'author_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-blog-grid2 .post-content .post-metas',
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
                            '{{WRAPPER}} .ms-blog-grid2 .post-content .post-title a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-blog-grid2 .post-content .post-title',
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
                            '{{WRAPPER}} .ms-blog-grid2 .post-content .post-title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'excerpt_style',
                [
                    'label' => __( 'Excerpt', 'meta-store-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'excerpt_color',
                    [
                        'label' => __( 'Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid2 .post-content .excerpt' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'excerpt_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-blog-grid2 .post-content .excerpt',
                    ]
                );

                $this->add_control(
                    'excerpt_margin',
                    [
                        'label' => __( 'Margin', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'allowed_dimensions' => 'vertical',
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid2 .post-content .excerpt' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'readmore_style',
                [
                    'label' => __( 'Readmore', 'meta-store-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'readmore_color',
                    [
                        'label' => __( 'Color', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid2 .post-content .readmore-btn' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'readmore_typography',
                        'label' => __( 'Typography', 'meta-store-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ms-blog-grid2 .post-content .readmore-btn',
                    ]
                );

                $this->add_control(
                    'readmore_margin',
                    [
                        'label' => __( 'Margin', 'meta-store-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'allowed_dimensions' => 'vertical',
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .ms-blog-grid2 .post-content .readmore-btn' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
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
            $readmore_text = isset( $settings['readmore_text'] ) ? $settings['readmore_text'] : esc_html('Read More', 'meta-store-elements');
            $image_size = isset( $settings['image_size'] ) ? $settings['image_size'] : 'medium';
            $show_category = ( $settings['show_category'] == 'yes' ) ? true : false;
            $show_date = ( $settings['show_date'] == 'yes' ) ? true : false;
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
                    <ul class="ms-blog-grid2" id="ms-blog-grid2-<?php echo esc_attr( $this->get_id() ) ?>">
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
                                    </div>
                                    <div class="post-content">
                                        <?php if( $show_category ) : ?>
                                            <div class="categories">
                                                <?php echo $this->get_post_categories(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if( $show_author || $show_date ) : ?>
                                            <div class="post-metas">
                                                <?php if( $show_author ) : ?>
                                                    <span><?php echo esc_html( get_the_author_meta('nickname') ); ?></span>
                                                <?php endif; ?>
                                                <?php if( $show_date ) : ?>
                                                    <span><?php the_date(); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <p class="excerpt">
                                            <?php echo esc_html( $this->get_excerpt() ); ?>
                                        </p>

                                        <?php if( $readmore_text ) : ?>
                                            <a href="<?php the_permalink(); ?>" class="readmore-btn"><?php echo esc_html( $readmore_text ); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                <?php wp_reset_postdata(); endif; ?>
            <?php
        }

        /** Post Excerpt */
        protected function get_excerpt() {
            $settings = $this->get_settings_for_display();

            $excerpt_length = isset( $settings['excerpt_length']['cars'] ) ? $settings['excerpt_length']['cars'] : 50;

            return substr( strip_tags( strip_shortcodes( get_the_content() ) ), 0, $excerpt_length );
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
    }
