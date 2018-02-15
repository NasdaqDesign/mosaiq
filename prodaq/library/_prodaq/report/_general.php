<div class="form-section">
			<div class="form-group">
				<label>Researchers</label>
				<?php $mb->the_field('researchers'); ?>
				<input type="text" name="<?php $mb->the_name(); ?>" placeholder="Separate by comma" value="<?php $mb->the_value(); ?>"/>
			</div>
			<div class="form-group">
				<?php $mb->the_field('research_goals'); ?>
				<label>Research Goals</label>
				<textarea id="researchGoals" class="ckeditor" rows="3" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
			</div>
			<div class="form-group">
				<?php $mb->the_field('approach'); ?>
				<label>Project Approach</label>
				<textarea id="projectApproach" class="ckeditor" rows="3" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
			</div>
			<div class="form-group">
				<?php $mb->the_field('audience'); ?>
				<label>Audience</label>
				<textarea id="audience" class="ckeditor" rows="3" name="<?php $mb->the_name(); ?>" rows="5"><?php $mb->the_value(); ?></textarea>
			</div>
</div>
