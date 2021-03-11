<?php
class My_Store_Countdown_Widget extends \Elementor\Widget_Base {
    /** Widget Name **/
    public function get_name() {
        return 'ms-countdown';
    }

    /** Widget Title **/
    public function get_title() {
        return esc_html__( 'Countdown', 'meta-store-elements' );
    }

    /** Widget Icon **/
    public function get_icon() {
        return 'eicon-countdown';
    }

    /** Categories **/
    public function get_categories() {
        return [ 'meta-store-elements' ];
    }

    /** Widget Controls **/
    protected function _register_controls() {

        $this->start_controls_section(
            'countdown_content_section',
            [
                'label' => __( 'Countdown', 'meta-store-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'layout',
                [
                    'label' => __( 'Layout', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'calender',
                    'options' => [
                        'calender'  => __( 'Calender', 'meta-store-elements' ),
                        'boxer'  => __( 'Boxer', 'meta-store-elements' ),
                        'circle'  => __( 'Circular', 'meta-store-elements' ),
                        'simple' => __( 'Simple', 'meta-store-elements' ),
                    ],
                ]
            );

            $this->add_control(
                'countdown_date',
                [
                    'label' => __( 'Countdown Date', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::DATE_TIME,
                    'placeholder' => '2020-11-21 12:00'
                ]
            );

            $this->add_control(
                'year_text',
                [
                    'label' => __( 'Year Text', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Years', 'meta-store-elements' ),
                    'separator' => 'before'
                ]
            );

            $this->add_control(
                'month_text',
                [
                    'label' => __( 'Month Text', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Months', 'meta-store-elements' ),
                ]
            );

            $this->add_control(
                'week_text',
                [
                    'label' => __( 'Week Text', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Weeks', 'meta-store-elements' ),
                ]
            );

            $this->add_control(
                'day_text',
                [
                    'label' => __( 'Day Text', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Days', 'meta-store-elements' ),
                ]
            );

            $this->add_control(
                'hour_text',
                [
                    'label' => __( 'Hour Text', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Hours', 'meta-store-elements' ),
                ]
            );

            $this->add_control(
                'minute_text',
                [
                    'label' => __( 'Minute Text', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Minutes', 'meta-store-elements' ),
                ]
            );

            $this->add_control(
                'second_text',
                [
                    'label' => __( 'Seconds Text', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Seconds', 'meta-store-elements' ),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'label_style',
            [
                'label' => __( 'Label', 'meta-store-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'label_color',
                [
                    'label' => __( 'Color', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ms-countdown.calender ul li .label,{{WRAPPER}} .ms-countdown.boxer ul li .label' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'label_bgcolor',
                [
                    'label' => __( 'Background Color', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ms-countdown.calender ul li .label,{{WRAPPER}} .ms-countdown.boxer ul li .label' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'label_typography',
                    'label' => __( 'Typography', 'meta-store-elements' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ms-countdown.calender ul li .label,{{WRAPPER}} .ms-countdown.boxer ul li .label',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'counter_style',
            [
                'label' => __( 'Counter', 'meta-store-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'counter_color',
                [
                    'label' => __( 'Color', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ms-countdown.calender ul li .value,{{WRAPPER}} .ms-countdown.boxer ul li .value' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'counter_bgcolor',
                [
                    'label' => __( 'Background Color', 'meta-store-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ms-countdown.calender ul li .value,{{WRAPPER}} .ms-countdown.boxer ul li .value' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'counter_typography',
                    'label' => __( 'Typography', 'meta-store-elements' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .ms-countdown.calender ul li .value,{{WRAPPER}} .ms-countdown.boxer ul li .value',
                ]
            );

        $this->end_controls_section();
    }

    /** Render Layout **/
    protected function render() {
        $settings = $this->get_settings_for_display();

        $countdown_date = $settings['countdown_date'] ? $settings['countdown_date'] : '';
        $layout = $settings['layout'] ? $settings['layout'] : 'calender';
        $year_text = $settings['year_text'] ? $settings['year_text'] : esc_html__( 'Years', 'meta-store-elements' );
        $month_text = $settings['month_text'] ? $settings['month_text'] : esc_html__( 'Years', 'meta-store-elements' );
        $week_text = $settings['week_text'] ? $settings['week_text'] : esc_html__( 'Years', 'meta-store-elements' );
        $day_text = $settings['day_text'] ? $settings['day_text'] : esc_html__( 'Years', 'meta-store-elements' );
        $hour_text = $settings['hour_text'] ? $settings['hour_text'] : esc_html__( 'Years', 'meta-store-elements' );
        $minute_text = $settings['minute_text'] ? $settings['minute_text'] : esc_html__( 'Years', 'meta-store-elements' );
        $second_text = $settings['second_text'] ? $settings['second_text'] : esc_html__( 'Years', 'meta-store-elements' );

        $countdown_data = json_encode( array(
            'date' => $countdown_date,
            'layout' => esc_attr( $layout ),
            'text' => array(
                'year' => $year_text,
                'month' => $year_text,
                'week' => $year_text,
                'day' => $year_text,
                'hour' => $year_text,
                'minute' => $year_text,
                'second' => $year_text
            )
        ) );

        if( !$countdown_date ) {
            ?>
            <div class="ms-error"><?php esc_html__( 'Set the valid countdown date', 'meta-store-elements' ); ?></div>
            <?php
        }
        ?>
            <div class="ms-countdown <?php echo esc_attr( $layout ); ?>" id="ms-countdown-<?php echo esc_attr( $this->get_id() ); ?>" data-countdown="<?php echo esc_attr( $countdown_data ); ?>">Countdown</div>
        <?php
    }
}
