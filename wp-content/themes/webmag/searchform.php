<!-- вырезан из header.php // корректируем по https://wp-kama.ru/function/get_search_form -->
<button class="search-btn"><i class="fa fa-search"></i></button>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-form">
        <input class="search-input" type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="Enter Your Search ...">
        <button class="search-close" type="button"><i class="fa fa-times"></i></button>
    </div>
</form>
