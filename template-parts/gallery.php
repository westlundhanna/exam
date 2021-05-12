<?php 

    if(have_rows('galleri')) {
        while(have_rows('galleri')): the_row(); 
            if(get_row_layout('bild')):
                $image1 = get_sub_field('bild1');
                $image2 = get_sub_field('bild2');
                $button = get_sub_field('button');
            endif;
        endwhile;
    }
?>

<section class="gallery-images">
    <img class="gallery-image" src="<?php echo $image1; ?>" alt="">
    <img class="gallery-image" src="<?php echo $image2; ?>" alt="">
    <?php var_dump($button); ?>

</section>        


