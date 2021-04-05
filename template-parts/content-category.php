<div class="blog-post border-bottom pb-4 mb-4">
	  <div class="col-md-4 m-0 p-0">
                              <?php if ( has_post_thumbnail() ): ?>
                              <?php the_post_thumbnail('medium', array ('class' => 'rounded img-fluid'));?>
                              <?php else: ?>
                              <img src="https://picsum.photos/300/300"  class="rounded img-fluid" alt="postthumbnail">
                              <?php endif;?>
                     </div>
        <h2 class="blog-post-title"><a href ="<?php the_permalink()?>"><?php the_title() ?></a></h2>
        <p class="blog-post-meta"><?php the_date(  );?></br><a><?php the_author_posts_link(  );?></a></p>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink()?>" class="btn btn-outline-primary btn-sm mt-3 mb-4" type="button">Read more</a>

      </div><!-- /.blog-post -->