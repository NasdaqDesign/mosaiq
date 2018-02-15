<div class="form-section">
	<div class="form-group">
		<?php $mb->the_field('description'); ?>
		<label>Description</label>
		<p><em>What is the product?</em></p>
		<textarea id="productDescription" class="ckeditor" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
	</div>
	<div class="form-group">
		<?php $mb->the_field('our_goals'); ?>
		<label>Design Goals</label>
		<p><em>What are our goals? Why is design working on it?</em></p>
		<textarea id="ourGoals" class="ckeditor" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
	</div>
	<div class="form-group">
		<?php $mb->the_field('biz_goals'); ?>
		<label>Business Goals</label>
		<p><em>What is the product missing? What are the perceptions that sales hopes to dispel? etc..</em></p>
		<textarea id="bizGoals" class="ckeditor" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
	</div>
</div>
