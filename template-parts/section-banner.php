<?php
    $term_id = get_queried_object()->term_id;
    $post_id = 'product_cat_'.$term_id;
    $page_id = wc_get_page_id( 'shop' );
if(get_field('banner', $post_id) || get_field('banner', $page_id) || get_field('banner')):
?>
<div class="banner">
    <?php
        if(is_product_category()):
            the_field('banner', $post_id);
        elseif($page_id):
            the_field('banner', $page_id);
        else: 
            the_field('banner');
        endif;
    ?>
</div>
<?php
endif;
