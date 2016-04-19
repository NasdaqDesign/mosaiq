<div class="form-section">
	<div class="row">
		<div class="col-md-6">
			<h2>Pain Points</h2>
			<?php while($mb->have_fields_and_multi('pains')): ?>
			<?php $mb->the_group_open(); ?>
			<div class="goal-repeatable">
				<div class="form-group">
					<label>Pain Point</label>
					<a href="#" class="dodelete icon">delete</a>
					<?php $mb->the_field('pain_point'); ?>
					<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
				</div>
			</div>
			<?php $mb->the_group_close(); ?>
			<?php endwhile; ?>

			<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-pains button">Add Pain Point</a></p>
		</div>
		<div class="col-md-6">
			<h2>Goals</h2>
			<?php while($mb->have_fields_and_multi('goals')): ?>
			<?php $mb->the_group_open(); ?>
			<div class="goal-repeatable">
				<div class="form-group">
					<label>Goal</label>
					<a href="#" class="dodelete icon">delete</a>
					<?php $mb->the_field('goal'); ?>
					<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
				</div>
			</div>
			<?php $mb->the_group_close(); ?>
			<?php endwhile; ?>

			<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-goals button">Add Goal</a></p>
		</div>
	</div>
</div>
