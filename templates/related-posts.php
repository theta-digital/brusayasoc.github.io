<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

$justitia_link        = get_permalink();
$justitia_post_format = get_post_format();
$justitia_post_format = empty( $justitia_post_format ) ? 'standard' : str_replace( 'post-format-', '', $justitia_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item related_item_style_1 post_format_' . esc_attr( $justitia_post_format ) ); ?>>
	<?php
	justitia_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'justitia_filter_related_thumb_size', justitia_get_thumb_size( (int) justitia_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
			'show_no_image' => justitia_get_theme_setting( 'allow_no_image' ),
			'singular'      => false,
			'post_info'     => '<div class="post_header entry-header">'
						. '<div class="post_categories">' . wp_kses_post( justitia_get_post_categories( '' ) ) . '</div>'
						. '<h6 class="post_title entry-title"><a href="' . esc_url( $justitia_link ) . '">' . wp_kses_data( get_the_title() ) . '</a></h6>'
						. ( in_array( get_post_type(), array( 'post', 'attachment' ) )
								? '<span class="post_date"><a href="' . esc_url( $justitia_link ) . '">' . wp_kses_data( justitia_get_date() ) . '</a></span>'
								: '' )
					. '</div>',
		)
	);
	?>
</div>
