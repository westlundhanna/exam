<?php
    $term_id = get_queried_object()->term_id;
    $post_id = 'product_cat_'.$term_id;
    $repeater = get_field('kategorier');
    

?>

<section class="product-categories">
    <?php
    foreach($repeater as $sub_field) {
        foreach($sub_field['lank_till_kategori'] as $term) {
            $term_link = get_term_link($term, 'product_cat');
        }
        ?>
        <a href="<?php echo $term_link; ?>" class="product-category__link">
            <div class="product-category grow fade" style="background: url('<?php echo $sub_field['bild']['url']; ?>')">
                <p><?php echo $sub_field['titel']; ?></p>
            </div>
            
        </a>
    <?php
    }
    ?>
    
</section>
<?php

