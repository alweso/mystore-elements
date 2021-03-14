<?php
    use Elementor\Controls_Manager;
    use Elementor\Group_Control_Base;

    if (!defined('ABSPATH'))
        exit;

    class Group_Control_Header extends Group_Control_Base {

        protected static $fields;

        public static function get_type() {
            return 'storezz-header';
        }

        protected function init_fields() {
            $fields = [];

            $fields['title'] = [
                'label' => __('Title', 'storezz-elements'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ];

            $fields['link'] = [
                'label' => __('Link', 'storezz-elements'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => true,
                ],
            ];

            $fields['tag'] = [
                'label' => __('Tag', 'storezz-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__('H1', 'storezz-elements'),
                    'h2' => esc_html__('H2', 'storezz-elements'),
                    'h3' => esc_html__('H3', 'storezz-elements'),
                    'h4' => esc_html__('H4', 'storezz-elements'),
                    'h5' => esc_html__('H5', 'storezz-elements'),
                    'h6' => esc_html__('H6', 'storezz-elements'),
                    'span' => esc_html__('span', 'storezz-elements'),
                    'div' => esc_html__('div', 'storezz-elements')
                ],
                'default' => 'h2',
            ];

            return $fields;
        }

        protected function get_default_options() {
            return [
                'popover' => false,
            ];
        }

    }
