<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pi-one
 */

?>

<section class="no-results not-found py-5">
	<header class="page-header">
		<h1 class="page-title text-center"><?php esc_html_e( 'Nothing Found', 'pi-one' ); ?></h1>
	</header><!-- .page-header -->
	<div class="alert alert-dismissible alert-warning shadow">
	<div class="page-content text-center">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pi-one' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<h2><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pi-one' ); ?></h2>
			<?php
			get_search_form();

		else :
			?>
			<h2><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pi-one' ); ?></h2>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</div>
	
</section><!-- .no-results -->
