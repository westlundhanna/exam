
<?php
if(have_rows('sale_flash')):
    while(have_rows('sale_flash')): the_row(); 
        $text = get_sub_field('kampanjtext');
        $color = get_sub_field('bakgrundsfarg');
        $repeater = get_field('sale_flash');   
    endwhile;
endif;
?>
<section class="sale-flash__wrapper">
    <?php
        foreach($repeater as $item) {
            if($item['bakgrundsfarg'] == 'svart: Svart'): 
                $color = '#000';
            elseif($item['bakgrundsfarg'] == 'rosa: Rosa'): 
                $color = '#E2C0DF';
            else: 
                $color = '#6FA9B6';
            endif;
            ?>
            <div class="sale-flash__card" style="background-color: <?php echo $color; ?>">
                <?php
                echo $item['kampanjtext'];;

                ?>
            </div>
        <?php
        } 
    ?>
        
    
</section>