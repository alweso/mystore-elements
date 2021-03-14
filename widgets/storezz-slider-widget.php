<?php
    /**
     * Storezz Slider Widget.
     */
    class Storezz_Slider_Widget extends \Elementor\Widget_Base {

        /** Widget Name */
        public function get_name() {
            return 'storezz-slider-widget';
        }

        /** Widget Title */
        public function get_title() {
            return __( 'Slider', 'storezz-elements' );
        }

        /** Icon */
        public function get_icon() {
            return 'eicon-slider-full-screen';
        }

        /** Category */
        public function get_categories() {
            return [ 'storezz-elements' ];
        }

        /** Dependencies */
        public function get_script_depends() {
            return [ 'owl-carousel' ];
        }

        /** Controls */
        protected function _register_controls() {
            $this->start_controls_section(
                'content',
                [
                    'label' => __( 'Slider', 'storezz-elements' ),
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
                    'subtitle', [
                        'label' => __( 'Sub Title', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'Slide Sub 1' , 'storezz-elements' ),
                        'label_block' => true,
                    ]
                );

                $repeater->add_control(
                    'title', [
                        'label' => __( 'Title', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'Slide 1' , 'storezz-elements' ),
                        'label_block' => true,
                    ]
                );

                $repeater->add_control(
                    'content',
                    [
                        'label' => __( 'Description', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'rows' => 10,
                        'default' => __( 'Default description', 'storezz-elements' ),
                        'placeholder' => __( 'Type your description here', 'storezz-elements' ),
                    ]
                );

                $repeater->add_control(
                    'btn_text',
                    [
                        'label' => __( 'Button Text', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'VIEW MORE', 'storezz-elements' ),
                        'placeholder' => __( 'Set Button Label text.', 'storezz-elements' ),
                        'label_block' => true
                    ]
                );

                $repeater->add_control(
                    'btn_link',
                    [
                        'label' => __( 'Link', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => __( 'https://your-link.com', 'storezz-elements' ),
                        'show_external' => true,
                        'default' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => true,
                        ],
                    ]
                );

                $this->add_control(
                    'slides',
                    [
                        'label' => __( 'Slides', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'fields' => $repeater->get_controls(),
                        'default' => [
                            [
                                'title' => __( 'Slide #1', 'storezz-elements' ),
                                'content' => __( 'Slide Content.', 'storezz-elements' ),
                            ],
                            [
                                'title' => __( 'Slide #2', 'storezz-elements' ),
                                'content' => __( 'Slide Content.', 'storezz-elements' ),
                            ],
                        ],
                        'title_field' => '{{{ title }}}',
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Image_Size::get_type(),
                    [
                        'name' => 'image_size', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                        'exclude' => [ 'custom' ],
                        'include' => [],
                        'default' => 'large',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'slide_style',
                [
                    'label' => __( 'Slide', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'slide_height',
                    [
                        'label' => __( 'Height', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 400,
                                'max' => 1000,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 550,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'slide_padding_left',
                    [
                        'label' => __( 'Content Left Spacing', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 300,
                                'step' => 1,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 0,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide .slide-content' => 'padding-left: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'subtitle_style',
                [
                    'label' => __( 'Subtitle', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'subtitle_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-subtitle' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'subtitle_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-slider .slide-content .slide-subtitle',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'title_style',
                [
                    'label' => __( 'Slider Title', 'storezz-elements' ),
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
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-slider .slide-content .slide-title',
                    ]
                );

                $this->add_control(
                    'title_spacing',
                    [
                        'label' => __( 'Spacing', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 5,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 0,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-title' => 'margin: {{SIZE}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'content_style',
                [
                    'label' => __( 'Slider Content', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'content_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-description' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'content_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-slider .slide-content .slide-description',
                    ]
                );

                $this->add_control(
                    'content_spacing',
                    [
                        'label' => __( 'Spacing', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 150,
                                'step' => 5,
                            ],
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 0,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-description' => 'margin: {{SIZE}}{{UNIT}} 0;',
                        ],
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'readmore_style',
                [
                    'label' => __( 'Readmore', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'readmore_bgcolor',
                    [
                        'label' => __( 'Background Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-btn' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_control(
                    'readmore_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-btn' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'readmore_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-slider .slide-content .slide-btn',
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'readmore_border',
                        'label' => __( 'Border', 'storezz-elements' ),
                        'selector' => '{{WRAPPER}} .storezz-slider .slide-content .slide-btn',
                    ]
                );

                $this->add_control(
                    'readmore_border_radius',
                    [
                        'label' => __( 'Border Radius', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );

                $this->add_control(
                    'readmore_heading',
                    [
                        'label' => __( 'Button Hover', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_control(
                    'readmore_bgcolor_hover',
                    [
                        'label' => __( 'Background Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-btn:hover' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_control(
                    'readmore_color_hover',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-slider .slide-content .slide-btn:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

            $this->end_controls_section();
        }

        /** Render Layout */
        protected function render() {
            $settings = $this->get_settings_for_display();
            $slides = isset( $settings['slides'] ) ? $settings['slides'] : array();
            $image_size = isset( $settings['image_size_size'] ) ? $settings['image_size_size'] : 'large';

            if( !empty( $slides ) ) :
            ?>
                <div class="storezz-slider owl-carousel" id="storezz-slider-<?php echo esc_attr( $this->get_id() ) ?>">
                    <?php foreach( $slides as $slide ) : ?>
                        <?php if( isset( $slide['image']['url'] ) ) : ?>
                            <?php
                                $image_url = $slide['image']['url'];
                                if( $slide['image']['id'] ) {
                                    $image = wp_get_attachment_image_src( $slide['image']['id'], $image_size );
                                    $image_url = $image[0];
                                }
                                $image_style = "style='background-image: url( ". esc_url( $image_url ) ." );'";
                            ?>
                            <div class="slide" <?php echo $image_style; ?> >
                                <div class="slide-content storezz-container">

                                    <?php if( $slide['subtitle'] ) : ?>
                                        <span class="slide-subtitle"><?php echo esc_html( $slide['subtitle'] ); ?></span>
                                    <?php endif; ?>

                                    <?php if( $slide['title'] ) : ?>
                                        <span class="slide-title">
                                            <?php
                                                echo wp_kses( $slide['title'], array(
                                                    'strong' => array(),
                                                    'br' => array()
                                                ) );
                                            ?>
                                        </span>
                                    <?php endif; ?>

                                    <p class="slide-description"><?php echo wp_kses( $slide['content'], array( 'br' => array() ) ); ?></p>
                                    <?php if( isset( $slide['btn_text'] ) && isset( $slide['btn_link']['url'] ) ) : ?>
                                        <a class="slide-btn" href="<?php echo esc_url( $slide['btn_link']['url'] ); ?>"><?php echo esc_html( $slide['btn_text'] ); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php
            endif;

            // $this->render_script();
        }

        /** Render Script */
        protected function render_script() {
            $settings = $this->get_settings_for_display();

            $id = '#storezz-slider-' . $this->get_id();
            ?>
                <script type="text/javascript">
                    jQuery(document).ready(function($){
                        $('<?php echo esc_attr( $id ); ?>').owlCarousel({
                            items: 1,
                            autoplay: false,
                            loop: true
                        });
                    });
                </script>
            <?php
        }
    }
