<?php
    $term_id = get_queried_object()->term_id;
    $post_id = 'product_cat_'.$term_id;

    $repeater = get_sub_field('knapp');
    $image = get_sub_field('bild');

?>
<section class="hero__wrapper" style="background-image: url('<?php echo $image['url']; ?>');">
    <div class="hero-content">
        <?php 
            foreach($repeater as $sub_field) {
                foreach($sub_field['produktkategori'] as $term) {
                    $term_link = get_term_link($term, 'product_cat');
                }
            }
        ?>
        <div class="button__wrapper">
            <button class="hero-button">
                <a href="<?php echo $term_link; ?>"><?php echo $sub_field['text']; ?><span></span></a>
            </button>
        </div>
    </div>

</section>