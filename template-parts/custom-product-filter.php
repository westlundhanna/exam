<?php 
    $sizes = get_terms('pa_storlek', ['filterby' => 'name']);
    $colors = get_terms('pa_farg', ['filterby' => 'name']);
    $styles = get_terms('pa_stil', ['filterby' => 'name']);
    
    $taxonomy1   = 'pa_storlek';
    $label_name1 = wc_attribute_label( $taxonomy1 );

    $taxonomy2   = 'pa_farg'; 
    $label_name2 = wc_attribute_label( $taxonomy2 );

    $taxonomy3   = 'pa_stil'; 
    $label_name3 = wc_attribute_label( $taxonomy3 );
    
?>
<div class="wc_filtering_wrapper">
    <form id="filterproducts" method="get" action="#filterproducts">
        <div class="filter-select__container">
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
            <div class="filter-clear">
                <input class="filter-clear" name="rensa" value="Rensa filter" type="submit"></input>
            </div>
        </div>
    </form>
</div>
<?php 