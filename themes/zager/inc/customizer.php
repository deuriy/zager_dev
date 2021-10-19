<?php
/**
 * UnderStrap Theme Customizer
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function reaction_login_logo() {
	$logo = get_theme_mod( 'login_logo' );

	// If no login logo set, then abort output.
	if( '' === $logo || false === $logo ) {
		return;
	}
	?>
	<style type="text/css">
		body.login div#login h1 a {
			width: 310px;
			height: 110px;
			background-image: url( '<?php echo esc_attr( $logo ); ?>' );
			background-size: contain;
			background-position: top center;
		}
	</style>
	<?php
}
add_action( 'login_head', 'reaction_login_logo' );

function reaction_theme_color() {
	?>
	<meta name="theme-color" content="<?php echo esc_attr( get_theme_mod( 'theme_color', '#EEEEEE' ) ); ?>">
	<?php
}
add_action( 'wp_head', 'reaction_theme_color' );
add_action( 'admin_head', 'reaction_theme_color' );
add_action( 'login_head', 'reaction_theme_color' );

function reaction_customize_register( $wp_customize ) {

	 // Add setting for logo uploader
	$wp_customize->add_setting( 'login_logo' );

	// Add setting for Android Chrome Theme Color
	$wp_customize->add_setting( 'theme_color', array(
		'default' => '#EEEEEE',
	) );

	// Add control for login logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'login_logo', array(
		'label'    => 'Login Page Logo',
		'section'  => 'title_tagline',
		'settings' => 'login_logo',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_color', array(
		'label'   => 'Android Chrome Theme Color',
		'section' => 'title_tagline',
		'settings' => 'theme_color',
	) ) );

}
add_action( 'customize_register', 'reaction_customize_register' );
