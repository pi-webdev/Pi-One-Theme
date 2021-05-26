<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="blog-post border-bottom pb-4 mb-4">
	  <div class=" post thumbnail col-md-4 m-0 p-0">
                              <?php if ( has_post_thumbnail() ): ?>
                              <?php the_post_thumbnail('medium', array ('class' => 'rounded img-fluid'));?>
                              <?php else: ?>
                              <img src="https://picsum.photos/300/300"  class="rounded img-fluid" alt="postthumbnail">
                              <?php endif;?>
                     </div> <!--postthumbnail_if not use picsum photo thumbnail-->
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
      <?php the_date(  );?></br>
      <a><?php the_author_posts_link(  );?></a>
    </p><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
        if ( is_single() ) :
			the_content();
        else :
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'pi-one' ) );
        endif;


			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pi-one' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
  <footer class="entry-footer">
		<?php pione_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- /.blog-category-->

                              
	
	
	
