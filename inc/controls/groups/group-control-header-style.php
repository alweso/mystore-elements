<?php
    use Elementor\Controls_Manager;
    use Elementor\Group_Control_Base;

    if (!defined('ABSPATH'))
        exit;

    class Group_Control_Header_Style extends Group_Control_Base {

        protected static $fields;

        public static function get_type() {
            return 'storezz-header-style';
        }

        protected function init_fields() {
            $fields = [];

            // $fields['color'] = [
            //     'label' => __('Color', 'storezz-elements'),
            //     'type' => Controls_Manager::TEXT,
            // ];

            $fields['header_color'] = [
                'label' => __( 'Color', 'storezz-elements' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .storezz-header, {{WRAPPER}} .storezz-header a' => 'color: {{VALUE}}',
                ],
            ];

            $fields['header_margin'] = [
                'label' => __( 'Margin', 'storezz-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'selectors' => [
                    '{{WRAPPER}} .storezz-header' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
                ],
            ];

            return $fields;
        }

        protected function get_default_options() {
            return [
                'popover' => false,
            ];
        }

    }
