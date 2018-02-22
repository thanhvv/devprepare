<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
/* class Theme_Options sẽ chứa toàn bộ code tạo options trong theme từ Redux Framework */
if ( ! class_exists( 'Theme_Options' ) ) {
    class Theme_Options {
        /* Tái tạo các biến có trong Redux Framework */
        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;
        public function __construct() {
            if ( ! class_exists( 'ReduxFramework' ) ) {
                return;
            }
            // This is needed. Bah WordPress bugs.  ;)
            if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->initSettings();
            } else {
                add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
            }
        }
        /**
        Thiết lập các method muốn sử dụng
        Method nào được khai báo trong này thì cũng phải được sử dụng
        **/
public function initSettings() {
// Set the default arguments Phương thức này sẽ thiết lập một số tùy chọn cho cái Theme Options.
    $this->setArguments();
// Create the sections and fields Đây là phương thức quan trọng nhất, dùng để chia phân mục các tùy chọn trong Theme Options, và chúng ta cũng sẽ khai báo các field tùy chọn bên trong phương thức này.
    $this->setSections();
    if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
    return;
    }
    $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
}

public function setSections() {
// ACTUAL DECLARATION OF SECTIONS
$this->sections[] = array(
    'title'  => __( 'Logo', 'sage' ),
    'desc'   => __( 'All setting for header on this theme','sage' ),
    'icon'   => 'el el-home',
    'fields' => array(
        array(
            'id'       => 'logo-on',
            'type'     => 'switch',
            'title'    => __( 'Enable image logo', 'sage' ),
            'compiler' => 'bool',
            'desc'     => __( 'Do you want enable image logo', 'sage' ),
            'on'		=> __('Enable','sage'),
            'off'		=> __('Disable','sage'),
            ),
        array(
            'id'       => 'logo-image',
            'type'     => 'media',
            'title'    => __( 'Logo Image', 'sage' ),
            'desc'     => __( 'Image that you want to use as logo', 'sage' ),
            ),
        array(
            'id'       => 'logo-image-color',
            'type'     => 'media',
            'title'    => __( 'Logo Color Image ', 'sage' ),
            'desc'     => __( 'Image that you want to use as logo', 'sage' ),
            ),
        array(
            'id'       => 'apply-now',
            'type'     => 'text',
            'title'    => __( 'Apply now ', 'sage' ),
            'desc'     => __( 'Insert link apply now', 'sage' ),
            ),
        )
);

//SOCIAL
$this->sections[] = array(
    'title'   => __('Working hours','sage'),
    'icon'    => 'el el-puzzle',
    'heading' => __('Working hours','sage'),
    'desc'    => '<br />'.__('All setting for Working hours on this theme','sage').'<br />',
    'fields'  => array(
        array(
            'id'    => 'opt-text-twitter',
            'type'  => 'text',
            'title' => __('Twitter','sage'),
            ),
        array(
            'id'       => 'opt-text-google',
            'type'     => 'text',
            'title'    => __( 'Google', 'sage' ),
            ),
        array(
            'id'    => 'opt-text-facebook',
            'type'  => 'text',
            'title' => __('Facebook','sage'),
            ),
        array(
            'id'       => 'opt-text-tumbler',
            'type'     => 'text',
            'title'    => __( 'Tumbler', 'sage' ),
            ),
        array(
            'id'       => 'opt-text-morning',
            'type'     => 'text',
            'title'    => __( 'Morning', 'sage' ),
            ),
        array(
            'id'       => 'opt-text-afternoon',
            'type'     => 'text',
            'title'    => __( 'Afternoon', 'sage' ),
            ),
        ),
);
//CONTACT
$this->sections[] = array(
    'title'   => __('Contact','sage'),
    'icon'    => 'el el-puzzle',
    'heading' => __('Contact','sage'),
    'desc'    => '<br />'.__('All setting for contact on this theme','sage').'<br />',
    'fields'  => array(
        array(
            'id'    => 'opt-text-add-contact',
            'type'  => 'text',
            'title' => __('Address','sage'),
            ),
        array(
            'id'       => 'opt-text-phone-contact',
            'type'     => 'text',
            'title'    => __( 'Phone', 'sage' ),
            ),
        array(
            'id'       => 'opt-text-fax-contact',
            'type'     => 'text',
            'title'    => __( 'Fax', 'sage' ),
            ),
        array(
            'id'       => 'opt-text-email-contact',
            'type'     => 'text',
            'title'    => __( 'Email', 'sage' ),
            ),
        ),
);
//FOOTER
$this->sections[] = array(
    'title'   => __('Footer','sage'),
    'icon'    => 'el el-puzzle',
    'heading' => __('Footer','sage'),
    'desc'    => '<br />'.__('All setting for footer on this theme','sage').'<br />',
    'fields'  => array(
        array(
            'id'    => 'opt-text-footer',
            'type'  => 'text',
            'title' => __('Footer description','sage'),
            ),
        array(
            'id'       => 'opt-text-cp-footer',
            'type'     => 'text',
            'title'    => __( 'Coypright', 'sage' ),
            ),
        ),
);
//CONSTANT
$this->sections[] = array(
    'title'   => __('Constant','sage'),
    'icon'    => 'el el-puzzle',
    'heading' => __('Constant','sage'),
    'desc'    => '<br />'.__('All setting for constant on this theme','sage').'<br />',
    'fields'  => array(
        array(
            'id'    => 'opt-introduce-constant',
            'type'  => 'text',
            'title' => __('Introduce','sage'),
            ),
        array(
            'id'       => 'opt-partner-constant',
            'type'     => 'text',
            'title'    => __( 'Partner', 'sage' ),
            ),
        array(
            'id'       => 'opt-news-constant',
            'type'     => 'text',
            'title'    => __( 'News', 'sage' ),
            ),
        array(
            'id'       => 'opt-experience-constant',
            'type'     => 'text',
            'title'    => __( 'Experience', 'sage' ),
            ),
        array(
            'id'       => 'opt-event-constant',
            'type'     => 'text',
            'title'    => __( 'Event', 'sage' ),
            ),
        array(
            'id'       => 'opt-question-constant',
            'type'     => 'text',
            'title'    => __( 'Question', 'sage' ),
            ),
        ),
);
}
/**
Thiết lập cho method setAgruments
Method này sẽ chứa các thiết lập cơ bản cho trang Options Framework như tên menu chẳng hạn
**/
public function setArguments() {
    $theme = wp_get_theme(); // Lưu các đối tượng trả về bởi hàm wp_get_theme() vào biến $theme để làm một số việc tùy thích.
    $this->args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'           => 'tp_options',// Tên biến trả dữ liệu của từng options, ví dụ: tp_options['field_1']
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'       => $theme->get( 'Name' ), // Thiết lập tên theme hiển thị trong Theme Options
    // Name that appears at the top of your panel
    'display_version'    => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'          => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'     => true,
    // Show the sections below the admin menu item or not
    'menu_title'         => __( 'Themes Options', 'redux-framework-demo' ),
    'page_title'         => __( 'Themes Options', 'redux-framework-demo' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'     => 'AIzaSyAs0iVWrG4E_1bG244-z4HRKJSkg7JVrVQ',
    // Must be defined to add google fonts to the typography module
    'async_typography'   => false,
    // Use a asynchronous font on the front end or font string
    'admin_bar'          => true,
    // Show the panel pages on the admin bar
    'global_variable'    => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'           => true,
    // Show the time the page took to load, etc
    'customizer'         => true,
    // Enable basic customizer support
    // OPTIONAL -> Give you extra features
    'page_priority'      => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'        => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'   => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'          => '',
    // Specify a custom URL to an icon
    'last_tab'           => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'          => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'          => '_options',
    // Page slug used to denote the panel
    'save_defaults'      => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'       => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'       => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => false,
    // Shows the Import/Export panel when not used as a field.
    // CAREFUL -> These options are for advanced use only
    'transient_time'     => 60 * MINUTE_IN_SECONDS,
    'output'             => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'         => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'           => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'system_info'        => false,
    // REMOVE
    // HINTS -  Chức năng Hint tạo dấu chấm hỏi ở mỗi option để hướng dẫn người dùng */
    'hints'              => array(
        'icon'          => 'icon-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
            ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
            ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
                ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
                ),
            ),
        )
);
// Panel Intro text -> before the form
if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
    if ( ! empty( $this->args['global_variable'] ) ) {
        $v = $this->args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $this->args['opt_name'] );
    }
    $this->args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
} else {
    $this->args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
}
                // Add content after the form.
$this->args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );
}
}
/* Kích hoạt class Theme_Options vào Redux Framework */
global $reduxConfig;
$reduxConfig = new Theme_Options();
}
