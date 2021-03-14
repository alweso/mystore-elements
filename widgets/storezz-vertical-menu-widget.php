<?php
    /**
     * Vertical Menu.
     */
    class Storezz_Vertical_Menu_Widget extends \Elementor\Widget_Base {

        /** Widget Name */
        public function get_name() {
            return 'storezz-vertical-menu-widget';
        }

        /** Widget Title */
        public function get_title() {
            return __( 'Vertical Menu', 'storezz-elements' );
        }

        /** Icon */
        public function get_icon() {
            return 'eicon-posts-grid';
        }

        /** Category */
        public function get_categories() {
            return [ 'storezz-elements' ];
        }

        /** Controls */
        protected function _register_controls() {
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Content', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

                $this->add_control(
                    'menu_heading',
                    [
                        'label' => __( 'Heading', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'Default title', 'storezz-elements' ),
                    ]
                );

                $this->add_control(
                    'heading_icon',
                    [
                        'label' => __( 'Heading Icon', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-star',
                            'library' => 'solid',
                        ],
                    ]
                );

                $this->add_control(
                    'heading_tag',
                    [
                        'label' => __( 'Heading Tag', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'h3',
                        'options' => Storezz_elements_tag_lists(),
                    ]
                );

                $this->add_control(
                    'menu',
                    [
                        'label' => __( 'Menu', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'none',
                        'options' => Storezz_elements_menulist(),
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'menu_heading_style',
                [
                    'label' => __( 'Menu Heading', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'menu_heading_bgcolor',
                    [
                        'label' => __( 'Background Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-vertical-menu .heading' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_control(
                    'menu_heading_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-vertical-menu .heading, {{WRAPPER}} .storezz-vertical-menu .heading .text' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'menu_heading_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-vertical-menu .heading .text',
                    ]
                );

            $this->end_controls_section();

            $this->start_controls_section(
                'menu_block_style',
                [
                    'label' => __( 'Menu Box', 'storezz-elements' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

                $this->add_control(
                    'menu_block_border_color',
                    [
                        'label' => __( 'Border Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-vertical-menu ul li:after' => 'background-color: {{VALUE}}',
                            '{{WRAPPER}} .storezz-vertical-menu ul' => 'border-color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_control(
                    'menu_block_bgcolor',
                    [
                        'label' => __( 'Background Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-vertical-menu ul' => 'background-color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_control(
                    'menu_text_color',
                    [
                        'label' => __( 'Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-vertical-menu ul a' => 'color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_control(
                    'menu_text_hover_color',
                    [
                        'label' => __( 'Hover Color', 'storezz-elements' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'scheme' => [
                            'type' => \Elementor\Scheme_Color::get_type(),
                            'value' => \Elementor\Scheme_Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .storezz-vertical-menu ul a:hover' => 'color: {{VALUE}}'
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_typography',
                        'label' => __( 'Typography', 'storezz-elements' ),
                        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .storezz-vertical-menu ul a',
                    ]
                );

            $this->end_controls_section();
        }

        /** Render Layout */
        protected function render() {
            $settings = $this->get_settings_for_display();

            $menu_heading = $settings['menu_heading'] ? $settings['menu_heading'] : '';
            $heading_icon = $settings['heading_icon'] ? $settings['heading_icon'] : array();
            $heading_tag = $settings['heading_tag'] ? $settings['heading_tag'] : 'h3';
            $menu = $settings['menu'] ? $settings['menu'] : 'none';

            $before_heading = '<' . esc_attr($heading_tag) . ' class="text">';
            $after_heading = '</' . esc_attr($heading_tag) . '>';

            if( $menu !== 'none' ) {
            ?>
                <div class="storezz-vertical-menu" id="storezz-vertical-menu-<?php echo esc_attr( $this->get_id() ) ?>">
                    <?php if( $before_heading !== '' ) : ?>
                        <div class="heading">
                            <div class="icon">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['heading_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <?php echo $before_heading . esc_html( $menu_heading ) . $after_heading; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                        wp_nav_menu( array(
                            'menu' => $menu,
                            'container' => false
                        ) );
                    ?>
                </div>
            <?php
            }
        }
    }
