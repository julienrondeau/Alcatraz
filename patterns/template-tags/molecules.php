<?php
/**
 * Pattern Library Molecules.
 *
 * @package alcatraz
 */


/**
 * The Alcatraz Grid
 *
 * @param   array   The arguments.
 * @return  string  The grid HTML.
 */
function alcatraz_grid( $args = array() ) {

	$defaults = array(
		'gutter' => true,
	);
	$args = wp_parse_args( $args, $defaults );

	// Build our classes string.
	$classes = 'row';
	if ( ! $args['gutter'] ) {
		$classes .= ' no-gutter';
	}

	ob_start();

	for ( $i = 1; $i < 12; $i++ ) :

		$col_1 = $i;
		$col_2 = 12 - $i; ?>

	<div class="<?php esc_attr_e( $classes ); ?>">
		<div class="alcatraz-col-<?php esc_attr_e( $col_1 ); ?>"><?php esc_html_e( $col_1 ); ?></div>
		<div class="alcatraz-col-<?php esc_attr_e( $col_2 ); ?>"><?php esc_html_e( $col_2 ); ?></div>
	</div>

	<?php endfor; ?>

	<div class="<?php esc_attr_e( $classes ); ?>">
		<div class="alcatraz-col-12"><?php esc_html_e( '12', 'alcatraz' ); ?></div>
	</div>

	<?php return ob_get_clean();
}

/**
 * Cards
 *
 * @param   array   The arguments.
 * @return  string  The HTML.
 */
function alcatraz_card( $args = array() ) {

	$defaults = array(
		'src'         => 'https://unsplash.it/300/200/?random',
		'use_img_src' => true,
		'title'     => 'Lorem ipsum dolor',
		'excerpt'     => 'Vel ad enim nostrum, eam te odio ubique corpora. Ne eum tota tation ancillae, reque altera mea te. Integre commune indoctum his ea.',
		'link'        => '#',
		'class'       => '',
	);
	$args = wp_parse_args( $args, $defaults );

	ob_start(); ?>

	<div class="alcatraz-card alcatraz-col-4 <?php esc_attr_e( $args['class'] ); ?>">

		<div class="card-image">
			<?php echo wp_kses_post( alcatraz_image( array( 'src' => $args['src'], 'use_img_src' => true ) ) ); ?>
		</div>

		<header class="card-header">
			<h3 class="card-title"><a href="<?php echo esc_url( $args['link'] ); ?>"><?php esc_html_e( $args['title'] ); ?></a></h3>
		</header>

		<div class="card-content">
			<?php esc_html_e( $args['excerpt'] ); ?>
		</div>

		<footer class="card-footer">
			<?php echo wp_kses_post( alcatraz_button( array( 'type' => 'text', 'link' => $args['link'], 'button_text' => 'Read More' ) ) ); ?>
		</footer>

	</div>

	<?php return ob_get_clean();
}
