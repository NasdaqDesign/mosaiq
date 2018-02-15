<?php
	if(!empty($screens)){
		echo '<div class="container">
		<h2>Screenshots</h2>
		<div class="product__screens-wrapper hidden-xs">';
		foreach($screens as $screen){


			echo '<div class="product__screens-item">';
			echo '<a class="screenshot" data-fancybox-title="'. $screen['title'] .'" rel="group" href="'. $screen['image'] .'"><img src="'. $screen['image'] .'" alt="" /></a>';
			echo '</div>';

		}
		echo '</div>'; // End wrapper
		echo '</div>';
	}
	else{

}?>
