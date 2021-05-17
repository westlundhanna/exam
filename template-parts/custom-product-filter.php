<?php 
    $sizes = get_terms('pa_storlek', ['filterby' => 'name']);
    $colors = get_terms('pa_farg', ['filterby' => 'name']);
    $styles = get_terms('pa_stil', ['filterby' => 'name']);
    $product_cats = get_terms( array('taxonomy' => 'product_cat', 'parent' => 0) );

    $taxonomy1   = 'pa_storlek';
    $label_name1 = wc_attribute_label( $taxonomy1 );

    $taxonomy2   = 'pa_farg'; 
    $label_name2 = wc_attribute_label( $taxonomy2 );

    $taxonomy3   = 'pa_stil'; 
    $label_name3 = wc_attribute_label( $taxonomy3 );

    $taxonomy4 = 'Kategorier';
    $label_name4 = wc_attribute_label( $taxonomy4 );

    
     
?>
<div class="wc_filtering_wrapper">
    <form id="filterproducts" method="get" action="#filterproducts">
        <div class="filter-select__container">
            <?php 
            if(is_shop()): 
            ?>
            <select name="filterby[product_cat]" id="category">
                <option disabled="disabled" selected="selected"><?php echo $label_name4; ?></option>
                <?php 
                   if (!empty($product_cats) && !is_wp_error($product_cat)): ?>
                    <?php
                    foreach ($product_cats as $product_cat) :
                        ?>
                        <option value="<?= $product_cat->term_id; ?>">
                            <?= $product_cat->name; ?>
                        </option>
                        <?php
                    endforeach;
                endif; 
                ?>
            </select>
            <?php endif; ?>
            <select id ="size" name="filterby[pa_storlek]" class="filterby">
            <option disabled="disabled" selected="selected"><?php echo $label_name1; ?></option>
                <?php
                if (!empty($sizes) && !is_wp_error($size)): ?>
                    <?php
                    foreach ($sizes as $size) :
                        ?>
                        <option value="<?= $size->term_id; ?>">
                            <?= $size->name; ?>
                        </option>
                        <?php
                    endforeach;
                endif;
                ?>
            </select>
            <select id="color" name="filterby[pa_farg]" class="filterby">
            <option disabled="disabled" selected="selected"><?php echo $label_name2; ?></option>
                <?php
                if (!empty($colors) && !is_wp_error($colors)):
                    foreach ($colors as $color) :
                        ?>
                        <option value="<?= $color->term_id; ?>">
                            <?= $color->name; ?>
                        </option>
                        <?php
                    endforeach;
                endif;
                ?>
            </select>
            <select id="stil" name="filterby[pa_stil]" class="filterby">
            <option disabled="disabled" selected="selected"><?php echo $label_name3; ?></option>
                <?php
                if (!empty($styles) && !is_wp_error($styles)):
                    foreach ($styles as $style) :
                        ?>
                        <option value="<?= $style->term_id; ?>">
                            <?= $style->name; ?>
                        </option>
                        <?php
                    endforeach;
                endif;
                ?>
            </select>
        </div>
        <div class="filter-buttons__container">
            <div class="filter-submit">
                <input class="filter" name="visa" value="Välj filter" type="submit"></input>
            </div>
        </div>
    </form>
</div>
<?php 