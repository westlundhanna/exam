<?php

    $title = get_sub_field('title');
    $image = get_sub_field('image');
    $link = get_sub_field('pagelink');
    $linktext = get_sub_field('linktext');

    ?>    
    <div class="fullwidth-section" style="background-image: url('<?php echo $image; ?>');">
        <?php
            if($title): ?>
                <h2 class="fullwidth-section__title white"><?php echo $title; ?></h2>
            <?php
            endif;
            if($link): ?>
                <a href="<?php echo $link; ?>"><?php echo $linktext; ?></a>
            <?php
            endif;
        ?>
    </div>

