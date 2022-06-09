<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="blog-post border-bottom pb-4 mb-4">
  <div class="card shadow">
	  <figure class=" post thumbnail col-md-4 m-0 p-0">
                              <?php if ( has_post_thumbnail() ): ?>
                              <?php the_post_thumbnail('medium', array ('class' => 'post-thumbnail-img img-fluid'));?>
                              <?php else: ?>
                              <img src="https://picsum.photos/300/300"  class="post-thumbnail-img img-fluid" alt="postthumbnail">
                              <?php endif;?>
							  </figure> <!--postthumbnail_if not use picsum photo thumbnail-->
							  <div class="card-body">
							  <header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<p class="entry-meta">
			<?php pione_theme_posted_on(); ?>
      <a><?php pione_theme_posted_by(); ?></a>
    </p><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
        if ( is_single() ) :
			the_content();
        else :
            the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pi-one' ) );
        endif; ?>
		<div><a href="<?php the_permalink()?>" class="btn btn-primary mt-3 mb-4" type="button"><?php echo esc_html__( 'Read more...', 'pi-one');?></a></div>
			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pi-one' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
  <footer class="entry-footer">
		<?php pione_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
			</div><!--end-card-body-->
 </div><!--end-card-->
</article><!-- /.blog-category-->
