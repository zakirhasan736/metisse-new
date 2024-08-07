<div class="offcanvas__wrapper">
   <div class="offcanvas__close">
      <button class="offcanvas__close-btn offcanvas-close-btn">
         <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
   </div>
   <div class="offcanvas__content">

   <?php if ( !empty($tp_side_logo) ) : ?>
      <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
         <div class="offcanvas__logo logo">
         <a href="<?php print esc_url( home_url( '/' ) );?>">
                <img src="<?php echo esc_url($tp_side_logo); ?>" alt="<?php echo esc_url($tp_side_logo_alt); ?>">
             </a>
         </div>
      </div>
      <?php endif;?>

      <div class="offcanvas__search mb-40">
         <form name="myform" method="GET"  action="<?php echo esc_url(home_url('/shop')); ?>">
            <div class="offcanvas__search-input">
               <input placeholder="<?php echo esc_attr__('Search for products...', 'tpcore'); ?>" type="text"  name="s" class="searchbox" maxlength="128" value="<?php echo get_search_query(); ?>">
               <button type="submit">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M18.9999 19L14.6499 14.65" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>  
               </button>
            </div>
         </form>
      </div>

      <?php if($settings['tp_offcanvas_category_switch'] == 'yes') : ?>
      <div class="offcanvas__category pb-40">
         <button class="tp-offcanvas-category-toggle">
            <i class="fa-solid fa-bars"></i>
            <?php echo esc_html($settings['tp_offcanvas_category_text']); ?>
         </button>
         <div class="tp-category-mobile-menu">
            <nav class="tp-category-menu-content">
               
            </nav>
         </div>
      </div>
      <?php endif;?>

      <div class="tp-main-menu-mobile fix mb-40"></div>

      <?php if (!empty($link)) : ?>
        <div class="offcanvas__btn">
            <a class="tp-btn-2 tp-btn-border-2 tp-el-box-btn" target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($rel); ?>" href="<?php echo esc_url($link); ?>"><?php echo esc_html($settings['tp_tpbtn_text']); ?></a>
        </div>
    <?php endif; ?>

   </div>

   <div class="offcanvas__bottom">
      <div class="offcanvas__footer d-flex align-items-center justify-content-between">

         <?php if($settings['tp_offcanvas_currency_switch'] == 'yes') : ?>
         <div class="offcanvas__currency-wrapper currency">

         <?php if(!empty($settings['tp_offcanvas_currency_shortcode'])) : ?>
            <?php echo do_shortcode($settings['tp_offcanvas_currency_shortcode']); ?>

         <?php else : ?>
            <span class="offcanvas__currency-selected-currency tp-currency-toggle" id="tp-offcanvas-currency-toggle"><?php echo esc_html__('Currency : USD', 'tpcore'); ?></span>
            <ul class="offcanvas__currency-list tp-currency-list">
               <li><?php echo esc_html__('USD', 'tpcore'); ?></li>
               <li><?php echo esc_html__('YEAN', 'tpcore'); ?></li>
               <li> <?php echo esc_html__('EURO', 'tpcore'); ?></li>
            </ul>
         <?php endif; ?>
            
         </div>
         <?php endif; ?>

         <?php if($settings['tp_offcanvas_lang_switch'] == 'yes') : ?>
         <!-- language start -->
         <?php shofy_offcanvas_lang_defualt(); ?>
         <!-- language end -->
         <?php endif; ?>

      </div>
   </div>
</div>
      