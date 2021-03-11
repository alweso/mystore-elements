<?php
class My_Store_Cta_Widget extends \Elementor\Widget_Base {
    /** Widget Name **/
    public function get_name() {
        return 'ms-cta';
    }

    /** Widget Title **/
    public function get_title() {
        return esc_html__( 'Call To Action', 'meta-store-elements' );
    }

    /** Widget Icon **/
    public function get_icon() {
        return 'eicon-instagram-gallery';
    }

    /** Categories **/
    public function get_categories() {
        return [ 'meta-store-elements' ];
    }

    /** Widget Controls **/
    protected function _register_controls() {

        $this->start_controls_section(
            'cta_content_section',
            [
                'label' => __( 'CTA', 'meta-store-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'image',
                [
                    'label' => __( 'Choose Image', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'separator' => 'before',
                    'default' => __( 'Title', 'meta-store-elements' ),
                ]
            );

            $this->add_control(
                'title_tag',
                [
                    'label' => __( 'Title Tag', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'h3',
                    'options' => My_Store_elements_tag_lists(),
                ]
            );

            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Sub Title', 'meta-store-elements' ),
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label' => __( 'Button Text', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Discover Now', 'meta-store-elements' ),
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'button_link',
                [
                    'label' => __( 'Button Link', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( '#', 'meta-store-elements' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'cta_additional_section',
            [
                'label' => __( 'Additional Settings', 'meta-store-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'content_position',
                [
                    'label' => __( 'Content Position', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'center-center',
                    'options' => array(
                        'top-left' => __( 'Top Left', 'meta-store-elements' ),
                        'top-center' => __( 'Top Center', 'meta-store-elements' ),
                        'top-right' => __( 'Top Right', 'meta-store-elements' ),
                        'center-left' => __( 'Center Left', 'meta-store-elements' ),
                        'center-center' => __( 'Center Center', 'meta-store-elements' ),
                        'center-right' => __( 'Center Right', 'meta-store-elements' ),
                        'bottom-left' => __( 'Bottom Left', 'meta-store-elements' ),
                        'bottom-center' => __( 'Bottom Center', 'meta-store-elements' ),
                        'bottom-right' => __( 'Bottom Right', 'meta-store-elements' ),
                    ),
                ]
            );

            $this->add_control(
                'image_height',
                [
                    'label' => __( 'Image Height', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 250,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ms-cta' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Image_Size::get_type(),
                [
                    'name' => 'image',
                    'exclude' => [ 'custom' ],
                    'include' => [],
                    'default' => 'large',
                ]
            );

            $this->add_control(
                'hover_effect',
                [
                    'label' => __( 'Hover Effect', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'hover1',
                    'options' => array(
                        'hover1' => __( 'Expansion', 'meta-store-elements' ),
                        'hover2' => __( 'Slice', 'meta-store-elements' ),
                    ),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style',
            [
                'label' => __( 'Title', 'meta-store-elements' ),
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
                        '{{WRAPPER}} .ms-cta .content .title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Typography', 'meta-store-elements' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ms-cta .content .title',
                ]
            );

            $this->add_control(
                'title_spacing',
                [
                    'label' => __( 'Spacing', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'allowed_dimensions' => 'vertical',
                    'selectors' => [
                        '{{WRAPPER}} .ms-cta .content .title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => __( 'Sub-Title', 'meta-store-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'subtitle_color',
                [
                    'label' => __( 'Color', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ms-cta .content .subtitle' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitle_typography',
                    'label' => __( 'Typography', 'meta-store-elements' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ms-cta .content .subtitle',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_style',
            [
                'label' => __( 'Button', 'meta-store-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'button_padding',
                [
                    'label' => __( 'Padding', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'selectors' => [
                        '{{WRAPPER}} .ms-cta .content .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'label' => __( 'Typography', 'meta-store-elements' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ms-cta .content .btn',
                ]
            );

            $this->start_controls_tabs(
                'button_tabs'
            );

                $this->start_controls_tab(
                    'buttons_normal_tab',
                    [
                        'label' => __( 'Normal', 'meta-store-elements' ),
                    ]
                );


                    $this->add_control(
                        'button_color_normal',
                        [
                            'label' => __( 'Color', 'meta-store-elements' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => \Elementor\Scheme_Color::get_type(),
                                'value' => \Elementor\Scheme_Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ms-cta .content .btn' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_bgcolor_normal',
                        [
                            'label' => __( 'Background Color', 'meta-store-elements' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => \Elementor\Scheme_Color::get_type(),
                                'value' => \Elementor\Scheme_Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ms-cta .content .btn' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'normal_border',
                            'label' => __( 'Border', 'meta-store-elements' ),
                            'selector' => '{{WRAPPER}} .ms-cta .content .btn',
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'buttons_hover_tab',
                    [
                        'label' => __( 'Hover', 'meta-store-elements' ),
                    ]
                );


                    $this->add_control(
                        'button_color_hover',
                        [
                            'label' => __( 'Color', 'meta-store-elements' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => \Elementor\Scheme_Color::get_type(),
                                'value' => \Elementor\Scheme_Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ms-cta .content .btn:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_control(
                        'button_bgcolor_hover',
                        [
                            'label' => __( 'Background Color', 'meta-store-elements' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => \Elementor\Scheme_Color::get_type(),
                                'value' => \Elementor\Scheme_Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ms-cta .content .btn:hover' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'hover_border',
                            'label' => __( 'Border', 'meta-store-elements' ),
                            'selector' => '{{WRAPPER}} .ms-cta .content .btn:hover',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /** Render Layout **/
    protected function render() {
        $settings = $this->get_settings_for_display();
        $image = $this->get_image_url();
        $content_postition = $settings['content_position'] ? $settings['content_position'] : 'center-center';
        $title_tag  = isset( $settings['title_tag'] ) ? $settings['title_tag'] : 'h3';
        $hover_effect  = isset( $settings['hover_effect'] ) ? $settings['hover_effect'] : 'hover1';

        $before_title = '<' . esc_attr($title_tag) . ' class="title">';
        $after_title = '</' . esc_attr($title_tag) . '>';

        $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
            <div class="ms-cta <?php echo esc_attr( $content_postition ); ?> <?php echo esc_attr($hover_effect); ?>" id="ms-cta-<?php echo esc_attr( $this->get_id() ); ?>">
                <?php if( $image['url'] ) : ?>
                    <div class="image">
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php
                        if( $settings['subtitle'] ) {
                            echo '<span class="subtitle">' . esc_html( $settings['subtitle'] ) . '</span>';
                        }

                        if( $settings['title'] ) {
                            echo $before_title . esc_html( $settings['title'] ) . $after_title;
                        }

                        if( $settings['button_link']['url'] && $settings['button_text'] ) {
                            echo '<a class="btn" href="' . esc_url( $settings['button_link']['url'] ) . '"' . $target . $nofollow . '>' . esc_html( $settings['button_text'] ) .'</a>';
                        }
                    ?>
                </div>
            </div>
        <?php
    }

    protected function get_image_url() {
        $settings = $this->get_settings_for_display();

        $image = $settings['image'] ? $settings['image'] : '';
        $image_size = $settings['image_size'] ? $settings['image_size'] : 'large';
        $imggg = array(
            'url' => '',
            'alt' => ''
        );
        if( !empty( $image ) ) {
            if( isset( $image['id'] ) && $image['id'] ) {
                $img = wp_get_attachment_image_src( $image['id'], $image_size );
                if($img) {
                    $imggg['url'] = $img[0];
                }
                $imggg['alt'] = get_post_meta( $image['id'], '_wp_attachment_image_alt', TRUE);
            } else {
                $imggg['url'] = isset( $image['url'] ) ? $image['url'] : '';
                $imggg['alt'] = '';
            }
        }

        return $imggg;
    }
}
