<div class="front_page_section front_page_section_googlemap<?php
	$justitia_scheme = justitia_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! justitia_is_inherit( $justitia_scheme ) ) {
		echo ' scheme_' . esc_attr( $justitia_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( justitia_get_theme_option( 'front_page_googlemap_paddings' ) );
?>"
		<?php
		$justitia_css      = '';
		$justitia_bg_image = justitia_get_theme_option( 'front_page_googlemap_bg_image' );
		if ( ! empty( $justitia_bg_image ) ) {
			$justitia_css .= 'background-image: url(' . esc_url( justitia_get_attachment_url( $justitia_bg_image ) ) . ');';
		}
		if ( ! empty( $justitia_css ) ) {
			echo ' style="' . esc_attr( $justitia_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$justitia_anchor_icon = justitia_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$justitia_anchor_text = justitia_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $justitia_anchor_icon ) || ! empty( $justitia_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $justitia_anchor_icon ) ? ' icon="' . esc_attr( $justitia_anchor_icon ) . '"' : '' )
									. ( ! empty( $justitia_anchor_text ) ? ' title="' . esc_attr( $justitia_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
	<?php
	if ( justitia_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
		echo ' justitia-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$justitia_css      = '';
			$justitia_bg_mask  = justitia_get_theme_option( 'front_page_googlemap_bg_mask' );
			$justitia_bg_color_type = justitia_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $justitia_bg_color_type ) {
				$justitia_bg_color = justitia_get_theme_option( 'front_page_googlemap_bg_color' );
			} elseif ( 'scheme_bg_color' == $justitia_bg_color_type ) {
				$justitia_bg_color = justitia_get_scheme_color( 'bg_color', $justitia_scheme );
			} else {
				$justitia_bg_color = '';
			}
			if ( ! empty( $justitia_bg_color ) && $justitia_bg_mask > 0 ) {
				$justitia_css .= 'background-color: ' . esc_attr(
					1 == $justitia_bg_mask ? $justitia_bg_color : justitia_hex2rgba( $justitia_bg_color, $justitia_bg_mask )
				) . ';';
			}
			if ( ! empty( $justitia_css ) ) {
				echo ' style="' . esc_attr( $justitia_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
			$justitia_layout = justitia_get_theme_option( 'front_page_googlemap_layout' );
		if ( 'fullwidth' != $justitia_layout ) {
			echo ' content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$justitia_caption     = justitia_get_theme_option( 'front_page_googlemap_caption' );
			$justitia_description = justitia_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $justitia_caption ) || ! empty( $justitia_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $justitia_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $justitia_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $justitia_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses_post( $justitia_caption );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $justitia_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $justitia_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( wpautop( $justitia_description ), 'justitia_kses_content' );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $justitia_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$justitia_content = justitia_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $justitia_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $justitia_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $justitia_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $justitia_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses_post( $justitia_content );
				?>
				</div>
				<?php

				if ( 'columns' == $justitia_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $justitia_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
			<?php
			if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
				dynamic_sidebar( 'front_page_googlemap_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! justitia_exists_trx_addons() ) {
					justitia_customizer_need_trx_addons_message();
				} else {
					justitia_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
				}
			}
			?>
			</div>
			<?php

			if ( 'columns' == $justitia_layout && ( ! empty( $justitia_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>
