<?php
class Storezz_Countdown_Widget extends \Elementor\Widget_Base {
    /** Widget Name **/
    public function get_name() {
        return 'storezz-countdown';
    }

    /** Widget Title **/
    public function get_title() {
        return esc_html__( 'Countdown', 'storezz-elements' );
    }

    /** Widget Icon **/
    public function get_icon() {
        return 'eicon-countdown';
    }

    /** Categories **/
    public function get_categories() {
        return [ 'storezz-elements' ];
    }

    /** Widget Controls **/
    protected function _register_controls() {

        $this->start_controls_section(
            'countdown_content_section',
            [
                'label' => __( 'Countdown', 'storezz-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'layout',
                [
                    'label' => __( 'Layout', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'calender',
                    'options' => [
                        'calender'  => __( 'Calender', 'storezz-elements' ),
                        'boxer'  => __( 'Boxer', 'storezz-elements' ),
                        'circle'  => __( 'Circular', 'storezz-elements' ),
                        'simple' => __( 'Simple', 'storezz-elements' ),
                    ],
                ]
            );

            $this->add_control(
                'countdown_date',
                [
                    'label' => __( 'Countdown Date', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::DATE_TIME,
                    'placeholder' => '2020-11-21 12:00'
                ]
            );

            $this->add_control(
                'year_text',
                [
                    'label' => __( 'Year Text', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Years', 'storezz-elements' ),
                    'separator' => 'before'
                ]
            );

            $this->add_control(
                'month_text',
                [
                    'label' => __( 'Month Text', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Months', 'storezz-elements' ),
                ]
            );

            $this->add_control(
                'week_text',
                [
                    'label' => __( 'Week Text', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Weeks', 'storezz-elements' ),
                ]
            );

            $this->add_control(
                'day_text',
                [
                    'label' => __( 'Day Text', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Days', 'storezz-elements' ),
                ]
            );

            $this->add_control(
                'hour_text',
                [
                    'label' => __( 'Hour Text', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Hours', 'storezz-elements' ),
                ]
            );

            $this->add_control(
                'minute_text',
                [
                    'label' => __( 'Minute Text', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Minutes', 'storezz-elements' ),
                ]
            );

            $this->add_control(
                'second_text',
                [
                    'label' => __( 'Seconds Text', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Seconds', 'storezz-elements' ),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'label_style',
            [
                'label' => __( 'Label', 'storezz-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'label_color',
                [
                    'label' => __( 'Color', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .storezz-countdown.calender ul li .label,{{WRAPPER}} .storezz-countdown.boxer ul li .label' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'label_bgcolor',
                [
                    'label' => __( 'Background Color', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .storezz-countdown.calender ul li .label,{{WRAPPER}} .storezz-countdown.boxer ul li .label' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'label_typography',
                    'label' => __( 'Typography', 'storezz-elements' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .storezz-countdown.calender ul li .label,{{WRAPPER}} .storezz-countdown.boxer ul li .label',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'counter_style',
            [
                'label' => __( 'Counter', 'storezz-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'counter_color',
                [
                    'label' => __( 'Color', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .storezz-countdown.calender ul li .value,{{WRAPPER}} .storezz-countdown.boxer ul li .value' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'counter_bgcolor',
                [
                    'label' => __( 'Background Color', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Scheme_Color::get_type(),
                        'value' => \Elementor\Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .storezz-countdown.calender ul li .value,{{WRAPPER}} .storezz-countdown.boxer ul li .value' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'counter_typography',
                    'label' => __( 'Typography', 'storezz-elements' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .storezz-countdown.calender ul li .value,{{WRAPPER}} .storezz-countdown.boxer ul li .value',
                ]
            );

        $this->end_controls_section();
    }

    /** Render Layout **/
    protected function render() {
        $settings = $this->get_settings_for_display();

        $countdown_date = $settings['countdown_date'] ? $settings['countdown_date'] : '';
        $layout = $settings['layout'] ? $settings['layout'] : 'calender';
        $year_text = $settings['year_text'] ? $settings['year_text'] : esc_html__( 'Years', 'storezz-elements' );
        $month_text = $settings['month_text'] ? $settings['month_text'] : esc_html__( 'Years', 'storezz-elements' );
        $week_text = $settings['week_text'] ? $settings['week_text'] : esc_html__( 'Years', 'storezz-elements' );
        $day_text = $settings['day_text'] ? $settings['day_text'] : esc_html__( 'Years', 'storezz-elements' );
        $hour_text = $settings['hour_text'] ? $settings['hour_text'] : esc_html__( 'Years', 'storezz-elements' );
        $minute_text = $settings['minute_text'] ? $settings['minute_text'] : esc_html__( 'Years', 'storezz-elements' );
        $second_text = $settings['second_text'] ? $settings['second_text'] : esc_html__( 'Years', 'storezz-elements' );

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
            <div class="storezz-error"><?php esc_html__( 'Set the valid countdown date', 'storezz-elements' ); ?></div>
            <?php
        }
        ?>
            <div class="storezz-countdown <?php echo esc_attr( $layout ); ?>" id="storezz-countdown-<?php echo esc_attr( $this->get_id() ); ?>" data-countdown="<?php echo esc_attr( $countdown_data ); ?>">Countdown</div>
        <?php
    }
}
