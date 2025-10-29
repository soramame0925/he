<?php
/*
Template Name: Discoverページ（ショート動画）
*/
get_header(); ?>

<main class="mno-discover-container">
  <h1 class="mno-discover-title">ショート動画一覧</h1>

  <?php
  $query = new WP_Query([
    'post_type'      => 'short_videos',
    'posts_per_page' => 10,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();

      // --- ACFデータを取得 ---
      $thumbnail  = get_field('thumbnail_image');
      $circle     = get_field('circle_name');
      $voice      = get_field('voice_actors');
      $voice_type = get_field('voice_pitch');
      $count_label = get_field('custom_count_label');
      $count_value = get_field('custom_count_value');
      $chobit     = get_field('chobit_embed');
      $review     = get_field('linked_review');
      $dlsite     = get_field('dlsite_url');
  ?>
      <article class="mno-discover-item">
        <!-- サムネ -->
        <?php if ($thumbnail) : ?>
          <div class="mno-thumb">
            <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
          </div>
        <?php endif; ?>

        <!-- Chobit埋め込み -->
        <?php if ($chobit) : ?>
          <div class="mno-chobit-embed">
            <?php echo $chobit; ?>
          </div>
        <?php endif; ?>

        <!-- メタ情報 -->
        <div class="mno-meta">
          <div class="mno-meta-left">
            <?php if ($voice) : ?>
  <div class="mno-meta-row">
    <div class="mno-meta-label">声優</div>
    <div class="mno-meta-value">
      <?php
      // 全角・半角カンマどちらも分割対象にする
      $voices = preg_split('/[、,]/u', $voice);
      foreach ($voices as $v) {
        $v = trim($v);
        if (!$v) continue; // 空白要素スキップ
        $url = home_url('/?s=' . urlencode($v));
        echo '<a href="' . esc_url($url) . '" class="mno-meta-link">' . esc_html($v) . '</a> ';
      }
      ?>
    </div>
  </div>
<?php endif; ?>


           <?php if ($circle) : ?>
  <div class="mno-meta-row">
    <div class="mno-meta-label">サークル</div>
    <div class="mno-meta-value">
      <?php
      $url = home_url('/?s=' . urlencode($circle));
      echo '<a href="' . esc_url($url) . '" class="mno-meta-link">' . esc_html($circle) . '</a>';
      ?>
    </div>
  </div>
<?php endif; ?>

            <?php
            $voice_type = get_field('voice_pitch');
            if ($voice_type) :
              if (is_array($voice_type)) {
                $voice_type = implode('、', $voice_type);
              }
            ?>
              <div class="mno-meta-row">
                <div class="mno-meta-label">声のタイプ</div>
                <div class="mno-meta-value"><?php echo esc_html($voice_type); ?></div>
              </div>
            <?php endif; ?>

            <?php if ($count_value) : ?>
              <div class="mno-meta-row">
                <div class="mno-meta-label"><?php echo esc_html($count_label ?: 'Count'); ?></div>
                <div class="mno-meta-value"><?php echo esc_html($count_value); ?></div>
              </div>
            <?php endif; ?>
          </div>

          <div class="mno-meta-right">
            <?php if ($review) : ?>
              <button class="mno-btn-review" type="button">詳細を見る</button>
            <?php endif; ?>
            <?php if ($dlsite) : ?>
              <a href="<?php echo esc_url($dlsite); ?>" target="_blank" rel="noopener" class="mno-btn-dlsite">DLsiteで購入</a>
            <?php endif; ?>
          </div>
        </div>
		  
		  		  <!-- ボトムシート -->
<div class="mno-bottom-sheet" id="reviewSheet">
  <div class="mno-sheet-overlay"></div>
  <div class="mno-sheet-content">
    <button class="mno-sheet-close">&times;</button>
    <div class="mno-sheet-body">
      <?php if ($review) :
        $post = get_post($review);
        setup_postdata($post);
        echo apply_filters('the_content', get_the_content());
        wp_reset_postdata();
      endif; ?>
    </div>
  </div>
</div>
		  
      </article>



  <?php
    endwhile;
    wp_reset_postdata();
  else :
    echo '<p>ショート動画はまだありません。</p>';
  endif;
  ?>
</main>

<?php get_footer(); ?>