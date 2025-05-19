<?php //フッターの最下部のテンプレート
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if (!defined('ABSPATH')) exit; ?>

<!-- フッター -->
<footer class="site-footer">
  <div class="footer-container">
    <!-- ロゴと問い合わせセクション -->
    <div class="footer-left">
      <div class="footer-logo">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_kodomoplus.png" alt="こどもプラス">
      </div>
      <p class="footer-info">ご不明点はこちらをご確認ください</p>
      <a href="<?php echo home_url('/faq/'); ?>" class="footer-btn">よくある質問</a>
      <p class="footer-info">解決しない場合はこちらへ</p>
      <a href="<?php echo home_url('/contact/'); ?>" class="footer-btn">お問い合わせ</a>
      
      <nav class="footer-nav">
        <ul>
          <li><a href="<?php echo home_url('/about/'); ?>">こどもプラスについて</a></li>
          <li><a href="<?php echo home_url('/column/'); ?>">お役立ちコラム</a></li>
          <li><a href="<?php echo home_url('/company/'); ?>">会社概要</a></li>
          <li><a href="<?php echo home_url('/privacy-policy/'); ?>">プライバシーポリシー</a></li>
        </ul>
      </nav>
    </div>
    
    <!-- 求人検索リンク -->
    <div class="footer-center">
      <h3 class="footer-heading">求人を探す</h3>
      <div class="footer-divider"></div>
      
      <!-- エリアから探す - job_location タクソノミー -->
      <div class="footer-search-group">
        <h4 class="search-category"><span class="dot"></span>エリアから探す</h4>
        <div class="search-links">
          <?php
          // 親タームのみを取得
          $parent_terms = get_terms([
            'taxonomy' => 'job_location',
            'parent' => 0,
            'hide_empty' => false,
          ]);
          
          if (!empty($parent_terms) && !is_wp_error($parent_terms)) {
            foreach ($parent_terms as $parent_term) {
              // 子タームを取得
              $child_terms = get_terms([
                'taxonomy' => 'job_location',
                'parent' => $parent_term->term_id,
                'hide_empty' => false,
              ]);
              
              echo '<div class="search-region">';
              echo '<p class="region-title">' . esc_html($parent_term->name) . '：</p>';
              
              if (!empty($child_terms) && !is_wp_error($child_terms)) {
                echo '<p class="region-links">';
                $links = [];
                foreach ($child_terms as $child_term) {
                  $links[] = '<a href="' . esc_url(get_term_link($child_term)) . '">' . esc_html($child_term->name) . '</a>';
                }
                echo implode('、', $links);
                echo '</p>';
              }
              
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>
      
      <!-- 職種から探す - job_position タクソノミー -->
      <div class="footer-search-group">
        <h4 class="search-category"><span class="dot"></span>職種から探す</h4>
        <ul class="search-list">
          <?php
          $position_terms = get_terms([
            'taxonomy' => 'job_position',
            'hide_empty' => false,
          ]);
          
          if (!empty($position_terms) && !is_wp_error($position_terms)) {
            foreach ($position_terms as $term) {
              echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
            }
          }
          ?>
        </ul>
      </div>
      
      <!-- 雇用形態から探す - job_type タクソノミー -->
      <div class="footer-search-group">
        <h4 class="search-category"><span class="dot"></span>雇用形態から探す</h4>
        <ul class="search-list">
          <?php
          $job_type_terms = get_terms([
            'taxonomy' => 'job_type',
            'hide_empty' => false,
          ]);
          
          if (!empty($job_type_terms) && !is_wp_error($job_type_terms)) {
            foreach ($job_type_terms as $term) {
              echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
            }
          }
          ?>
        </ul>
      </div>
      
      <!-- 施設形態から探す - facility_type タクソノミー -->
      <div class="footer-search-group">
        <h4 class="search-category"><span class="dot"></span>施設形態から探す</h4>
        <ul class="search-list">
          <?php
          $facility_terms = get_terms([
            'taxonomy' => 'facility_type',
            'hide_empty' => false,
          ]);
          
          if (!empty($facility_terms) && !is_wp_error($facility_terms)) {
            foreach ($facility_terms as $term) {
              echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
            }
          }
          ?>
        </ul>
      </div>
    </div>
    
    <!-- 特徴から探す - job_feature タクソノミー -->
    <div class="footer-right">
      <div class="footer-search-group">
        <h4 class="search-category"><span class="dot"></span>特徴から探す</h4>
        <div class="search-features">
          <?php
          // 親タームのみを取得
          $feature_parent_terms = get_terms([
            'taxonomy' => 'job_feature',
            'parent' => 0,
            'hide_empty' => false,
          ]);
          
          if (!empty($feature_parent_terms) && !is_wp_error($feature_parent_terms)) {
            foreach ($feature_parent_terms as $parent_term) {
              // 子タームを取得
              $feature_child_terms = get_terms([
                'taxonomy' => 'job_feature',
                'parent' => $parent_term->term_id,
                'hide_empty' => false,
              ]);
              
              echo '<div class="feature-group">';
              echo '<h5 class="feature-title">' . esc_html($parent_term->name) . '</h5>';
              
              if (!empty($feature_child_terms) && !is_wp_error($feature_child_terms)) {
                echo '<ul class="feature-list">';
                foreach ($feature_child_terms as $child_term) {
                  echo '<li><a href="' . esc_url(get_term_link($child_term)) . '">• ' . esc_html($child_term->name) . '</a></li>';
                }
                echo '</ul>';
              }
              
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  
  <!-- バナー -->
  <div class="footer-banners">
    <a href="<?php echo home_url('/qualification/'); ?>" class="footer-banner"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/footer-banner1.jpg" alt="運動保育士資格取得"></a>
    <a href="<?php echo home_url('/instruction/'); ?>" class="footer-banner"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/footer-banner2.jpg" alt="運動あそび指導"></a>
    <a href="<?php echo home_url('/classroom/'); ?>" class="footer-banner"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/footer-banner3.jpg" alt="運動教室"></a>
    <a href="<?php echo home_url('/franchise/'); ?>" class="footer-banner"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/footer-banner4.jpg" alt="こどもプラスFC加盟募集サイト"></a>
  </div>
</footer>