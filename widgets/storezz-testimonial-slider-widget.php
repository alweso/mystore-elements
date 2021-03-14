<?php
    class Storezz_Testimonial_Slider_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'storezz-testimonial-slider';
        }

        public function get_title() {
            return esc_html__( 'Testimonial Slider', 'storezz-elements' );
        }

        public function get_icon() {
            return 'eicon-post-slider';
        }

        public function get_categories() {
            return [ 'storezz-elements' ];
        }

        public function get_script_depends() {
            return [ 'owl-carousel' ];
        }

        protected function _register_controls() {

            $this->start_controls_section(
                'testimonial_section',
                [
                    'label' => __( 'Testimonial', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

                $repeater = new \Elementor\Repeater();

                $repeater->add_control(
                    'image',
                    [
                        'label' => __( 'Choose Image', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]
                );

                $repeater->add_control(
                    'name', [
                        'label' => __( 'Client Name', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'John Doe' , 'storezz-elements' ),
                        'label_block' => true,
                    ]
                );

                $repeater->add_control(
                    'designation', [
                        'label' => __( 'Designation', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'Managing Director' , 'storezz-elements' ),
                        'label_block' => true,
                    ]
                );

                $repeater->add_control(
                    'testimony', [
                        'label' => __( 'Testimony', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __( 'John Doe has to say something about the co.' , 'storezz-elements' ),
                        'show_label' => false,
                    ]
                );

                $repeater->add_control(
                    'star_ratings',
                    [
                        'label' => __( 'Ratings', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => '0',
                        'options' => [
                            '0'  => __( '0 Star', 'storezz-elements' ),
                            '1' => __( '1 Star', 'storezz-elements' ),
                            '2' => __( '2 Star', 'storezz-elements' ),
                            '3' => __( '3 Star', 'storezz-elements' ),
                            '4' => __( '4 Star', 'storezz-elements' ),
                            '5' => __( '5 Star', 'storezz-elements' ),
                        ],
                    ]
                );

                $this->add_control(
                    'testimonials',
                    [
                        'label' => __( 'Testimonials', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'fields' => $repeater->get_controls(),
                        'default' => [
                            [
                                'name' => __( 'John Doe', 'storezz-elements' ),
                                'designation' => __( 'Managing Director', 'storezz-elements' ),
                                'testimony' => __( 'John Doe has to say something about the business.', 'storezz-elements' ),
                            ],
                            [
                                'name' => __( 'Sarah Doe', 'storezz-elements' ),
                                'designation' => __( 'Blogger', 'storezz-elements' ),
                                'testimony' => __( 'Sarah has to say something about the business.', 'storezz-elements' ),
                            ],
                        ],
                        'title_field' => '{{{ name }}}',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_carousel_section',
                [
                    'label' => __( 'Carousel', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

                $this->add_control(
                    'loop',
                    [
                        'label' => __( 'Loop Slides', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'storezz-elements' ),
                        'label_off' => __( 'No', 'storezz-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]
                );

                $this->add_control(
                    'autoplay',
                    [
                        'label' => __( 'Autoplay', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'storezz-elements' ),
                        'label_off' => __( 'No', 'storezz-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]
                );

                $this->add_control(
                    'pause_on_hover',
                    [
                        'label' => __( 'Pause On Hover', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'storezz-elements' ),
                        'label_off' => __( 'No', 'storezz-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]
                );

                $this->add_control(
                    'show_dots',
                    [
                        'label' => __( 'Show Dots', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'storezz-elements' ),
                        'label_off' => __( 'No', 'storezz-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_name_style',
                [
                    'label' => __( 'Client Name', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'name_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider .name-designation .name' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'name_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-testimonial-slider .name-designation .name',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_testimony_style',
                [
                    'label' => __( 'Testimony', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'testimony_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider .testimonial .testimony' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'testimony_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-testimonial-slider .testimonial .testimony',
                    ]
                );

                $this->add_control(
                    'testimony_margin',
                    [
                        'label' => __( 'Margin', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'allowed_dimensions' => 'vertical',
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider .testimonial .testimony' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_designation_style',
                [
                    'label' => __( 'Designation', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'design_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider .name-designation .designation' => 'color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'design_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-testimonial-slider .name-designation .designation',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_ratings_style',
                [
                    'label' => __( 'Star Ratings', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'ratings_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'default' => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider .star-ratings' => 'color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_control(
                    'ratings_size',
                    [
                        'label' => __( 'Size', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 5,
                        'max' => 100,
                        'step' => 1,
                        'default' => 10,
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider .star-ratings span' => 'font-size: {{VALUE}}px'
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_dots_style',
                [
                    'label' => __( 'Dots', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'dots_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'default' => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider button.owl-dot' => 'background-color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_control(
                    'dots_height',
                    [
                        'label' => __( 'Thickness', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                        'default' => 2,
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider button.owl-dot' => 'height: {{VALUE}}px'
                        ],
                    ]
                );

                $this->add_control(
                    'dots_margin',
                    [
                        'label' => __( 'Margin', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'allowed_dimensions' => 'vertical',
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-testimonial-slider .owl-dots' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();
        }

        /** Render Layout **/
        protected function render() {
            $settings = $this->get_settings_for_display();

            $testimonials = $settings['testimonials'];

            if( !empty( $testimonials ) ) :
            ?>
                <div data-carousel-options='{"autoplay":"true","items":"2","loop":"true","nav":"true"}' class="storezz-testimonial-slider owl-carousel" id="storezz-testimonial-slider-<?php echo esc_attr( $this->get_id() ); ?>">

                    <?php foreach( $testimonials as $testimonial ) : ?>
                        <div class="testimonial">

                            <?php if( $testimonial['star_ratings'] ) : ?>
                                <div class="star-ratings">
                                    <?php for( $i = 1; $i<= $testimonial['star_ratings']; $i++ ) : ?>
                                        <span class="icon_star"></span>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>

                            <?php if( $testimonial['testimony'] ) : ?>
                                <div class="testimony">
                                    <?php
                                        echo wp_kses( $testimonial['testimony'], array(
                                            'br' => array()
                                        ) );
                                    ?>
                                </div>
                            <?php endif; ?>

                            <div class="name-design">
                                <?php if( $testimonial['image'] ) : ?>
                                    <?php
                                        $img = wp_get_attachment_image_src( $testimonial['image']['id'], 'storezz-testimonial-slider' );
                                        $img_src = $img ? $img[0] : $testimonial['image']['url'];
                                        $img_alt = get_post_meta( $testimonial['image']['id'], '_wp_attachment_image_alt', true );
                                    ?>
                                    <div class="image">
                                        <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />
                                    </div>
                                <?php endif; ?>

                                <?php if( $testimonial['name'] ) : ?>
                                    <div class="name-designation">
                                        <?php if( $testimonial['name'] ) : ?>
                                            <span class="name"><?php echo esc_html( $testimonial['name'] ); ?></span>
                                        <?php endif; ?>

                                        <?php if( $testimonial['designation'] ) : ?>
                                            <span class="designation"><?php echo esc_html( $testimonial['designation'] ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            <?php
            endif;
        }

        protected function _content_template() {}
    }
