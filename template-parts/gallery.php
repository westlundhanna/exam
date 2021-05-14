<?php 
$term_id = get_queried_object()->term_id;
$post_id = 'product_cat_'.$term_id;

if(have_rows('galleri')): ?>
    <section class="gallery-images"> <?php
    while(have_rows('galleri')): the_row(); 
        $image = get_sub_field('bild');
        $title = get_sub_field('rubrik'); 
        $buttons = get_sub_field('knapp'); 
        foreach($buttons as $item) {
            if($item['titel']) {
                $btn_title = $item['titel'];
            }
            if($item['kategorilank']) {
                foreach($item['kategorilank'] as $category) {
                    $term_link = get_term_link($category, 'product_cat');
                }
            }
        }
        ?>  
        <div class="gallery-image" style="background-image: url('<?php echo $image; ?>');">
            <div class="gallery-content">
                <h2 class="gallery-title"><?php echo $title; ?></h2>
                <a href="<?php echo $term_link; ?>"><button><?php echo $btn_title; ?></button></a>
            </div>
        </div> <?php
    endwhile; ?>
    </section> <?php
endif;      


