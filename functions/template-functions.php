<?php
defined('ABSPATH') or die;



function add_fullwidth_hero_under_header() {
    if( have_rows('hero') ):
		while ( have_rows('hero') ) : the_row();
			if( get_row_layout() == 'hero' ): 
				get_template_part('./template-parts/section-hero');  
			endif;
		endwhile;
	endif;  
}