<?php
class Storezz_Instagram_Feeds_Widget extends \Elementor\Widget_Base {
    /** Widget Name **/
    public function get_name() {
        return 'storezz-instagram-feeds';
    }

    /** Widget Title **/
    public function get_title() {
        return esc_html__( 'Instagram Feeds', 'storezz-elements' );
    }

    /** Widget Icon **/
    public function get_icon() {
        return 'eicon-instagram-gallery';
    }

    /** Categories **/
    public function get_categories() {
        return [ 'storezz-elements' ];
    }

    /** Dependencies */
    public function get_script_depends() {
        return [ 'jquery-instagramfeed' ];
    }

    /** Widget Controls **/
    protected function _register_controls() {

        $this->start_controls_section(
            'insta_content_section',
            [
                'label' => __( 'Instagram Feeds', 'storezz-elements' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'fetch_by',
                [
                    'label' => __( 'Fetch By', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'username',
                    'options' => [
                        'username'  => __( 'Username', 'storezz-elements' ),
                        'tag' => __( 'Tag', 'storezz-elements' ),
                    ],
                ]
            );

            $this->add_control(
                'username',
                [
                    'label' => __( 'Username', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '', 'storezz-elements' ),
                    'placeholder' => __( 'Enter the instagram username', 'storezz-elements' ),
                    'condition'     => [
                        'fetch_by' => 'username',
                    ],
                ]
            );

            $this->add_control(
                'tag',
                [
                    'label' => __( 'Tag', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '', 'storezz-elements' ),
                    'placeholder' => __( 'Enter the instagram tag', 'storezz-elements' ),
                    'condition'     => [
                        'fetch_by' => 'tag',
                    ],
                ]
            );

            $this->add_control(
                'display_profile',
                [
                    'label' => __( 'Display Profile', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'storezz-elements' ),
                    'label_off' => __( 'No', 'storezz-elements' ),
                    'return_value' => '',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'insta_feeds',
                [
                    'label' => __( 'Number of Photos', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 12,
                    'step' => 1,
                    'default' => 8,
                ]
            );

            $this->add_control(
                'column_layout',
                [
                    'label' => __( 'Column Layout', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'column-4',
                    'options' => [
                        'column-3'  => __( '3 Column', 'storezz-elements' ),
                        'column-4'  => __( '4 Column', 'storezz-elements' ),
                        'column-5'  => __( '5 Column', 'storezz-elements' ),
                        'column-6'  => __( '6 Column', 'storezz-elements' ),
                        'column-7'  => __( '7 Column', 'storezz-elements' ),
                    ],
                ]
            );

            $this->add_control(
                'image_size',
                [
                    'label' => __( 'Image Size', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '640',
                    'options' => [
                        '150'  => __( '150x150', 'storezz-elements' ),
                        '240'  => __( '240x240', 'storezz-elements' ),
                        '320'  => __( '320x320', 'storezz-elements' ),
                        '480'  => __( '480x480', 'storezz-elements' ),
                        '640'  => __( '640x640', 'storezz-elements' ),
                    ],
                ]
            );

            $this->add_control(
                'margin',
                [
                    'label' => __( 'Margin', 'storezz-elements' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 30,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 10,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .storezz-instagram-feed .instagram_gallery a' => 'padding:{{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .storezz-instagram-feed .instagram_gallery' => 'margin:-{{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
    }

    /** Render Layout **/
    protected function render() {
        $settings = $this->get_settings_for_display();
        $username = isset( $settings['username'] ) ? $settings['username'] : '';
        $tag = isset( $settings['tag'] ) ? $settings['tag'] : '';

        $column_layout = isset( $settings['column_layout'] ) ? $settings['column_layout'] : 'column-4';
        $insta_datas = $this->get_insta_datas();

        if( !$username && !$tag ) {
            ?>
            <div class="storezz-error">
                <?php esc_html_e( 'Please set the Username or Tag name.', 'storezz-elements' ); ?>
            </div>
            <?php
        }
        ?>
            <div class="storezz-instagram-feed <?php echo esc_attr( $column_layout ); ?>" id="storezz-instagram-feed-<?php echo esc_attr( $this->get_id() ); ?>" data-insta="<?php echo esc_attr( $insta_datas ); ?>">
            </div>
        <?php
        // $this->render_script();
    }

    /** Render Script */
    protected function render_script() {
        $insta_datas = $this->get_insta_datas();

        $id = '#storezz-instagram-feed-' . $this->get_id();
        /*
        ?>
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    var insta_args = {};
                    <?php if( $fetch_by == 'username' ) : ?>
                        insta_args = {
                            'username': '<?php echo esc_html( $username ); ?>',
                            'container': "<?php echo esc_html( $id ); ?>",
                            'display_profile': <?php echo esc_html( $display_profile ); ?>,
                            'display_biography': false,
                            'display_gallery': true,
                            'callback': null,
                            'styling': false,
                            'items': <?php echo esc_html( $insta_feeds ); ?>,
                            'image_size': <?php echo esc_html( $image_size ); ?>
                        };
                    <?php elseif( $fetch_by == 'tag' ) : ?>
                        insta_args = {
                            'tag': '<?php echo esc_html( $tag ); ?>',
                            'container': "<?php echo esc_html( $id ); ?>",
                            'display_profile': <?php echo esc_html( $display_profile ); ?>,
                            'display_biography': false,
                            'display_gallery': true,
                            'callback': null,
                            'styling': false,
                            'items': <?php echo esc_html( $insta_feeds ); ?>,
                            'image_size': <?php echo esc_html( $image_size ); ?>
                        };
                    <?php endif; ?>

                    $.instagramFeed(insta_args);
                });
            </script>
        <?php
        */
    }

    /** Get Insta Datas */
    protected function get_insta_datas() {
        $settings = $this->get_settings_for_display();

        $fetch_by = isset( $settings['fetch_by'] ) ? $settings['fetch_by'] : 'username';
        $username = isset( $settings['username'] ) ? $settings['username'] : '';
        $tag = isset( $settings['tag'] ) ? $settings['tag'] : '';
        $insta_feeds = isset( $settings['insta_feeds'] ) ? $settings['insta_feeds'] : 8;
        $image_size = isset( $settings['image_size'] ) ? $settings['image_size'] : '640';
        $display_profile = ( $settings['display_profile'] ) ? 'true' : 'false';

        $insta_datas = array(
            'container' => '#storezz-instagram-feed-' . $this->get_id(),
            'display_profile' => $display_profile,
            'display_biography' => 'false',
            'display_gallery' => 'true',
            'callback' => 'null',
            'styling' => 'false',
            'items' => $insta_feeds,
            'image_size' => $image_size
        );

        if( $fetch_by == 'username' ) {
            $insta_datas['username'] = $username;
        } elseif( $fetch_by == 'tag' ) {
            $insta_datas['tag'] = $tag;
        }

        return json_encode( $insta_datas );
    }
}
