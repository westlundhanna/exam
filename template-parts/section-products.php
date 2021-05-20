<?php
if(have_rows('produkter')) { ?>
    <div class="products-section">     
        <?php
        while (have_rows('produkter')) {    
            the_row();
            if(get_row_layout() == 'produktsektion') {
                $section_title = get_sub_field('sektionstitel');
                $product_fields = get_sub_field('produktinfo'); ?>
                <h2><?php echo $section_title; ?></h2> 
                <div class="products-wrapper"><?php
                    foreach($product_fields as $post_object) {
                        foreach($post_object as $post_object_item) { 
                            $reg_price = get_post_meta( $post_object_item->ID, '_regular_price', true );
                            $price = get_post_meta( $post_object_item->ID, '_price', true );
                            $sale = get_post_meta( $post_object_item->ID, '_sale_price', true ); 
                            ?>
                            <a href="<?php echo get_permalink($post_object_item->ID); ?>" class="product-container grow"> <?php
                                echo get_the_post_thumbnail($post_object_item, 'large'); ?>
                                <h3><?php echo $post_object_item->post_title; ?></h3> 
                                <div class="price-container"><?php
                                    if($sale) { ?>
                                        <p class="sale-price"><?php echo 'Reapris: ' . wc_price($sale);?></p><?php
                                    }else{ ?>
                                        <p class="regular-price"><?php echo wc_price($price); ?></p><?php
                                    } ?>
                                </div>
                            </a> 
                            <?php
                        }
                    } ?>
                </div> <?php
            }
        }   
        ?>
    </div>   
<?php
}