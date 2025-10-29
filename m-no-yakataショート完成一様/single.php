<?php get_header(); ?>

<main class="mno-container">
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post(); ?>

      <article <?php post_class('mno-single'); ?>>
        <h1 class="mno-single__title"><?php the_title(); ?></h1>

        <?php
        if ( function_exists( 'mno_pm_render_single_template' ) ) {
          echo mno_pm_render_single_template( get_the_ID() );
        } else {
          echo '<div class="mno-single__content">' . apply_filters( 'the_content', get_the_content() ) . '</div>';
        }
        ?>
      </article>

    <?php endwhile;
  else : ?>
    <p>記事が見つかりませんでした。</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
