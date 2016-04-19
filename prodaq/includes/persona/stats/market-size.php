<div class="market-size">
	<div class="container">

		<div class="market-size__content">
			<div class="row">
				<div class="col-md-3 <?php if(count($mega_cap) == 0): echo 'none'; endif ?>">

					<h2>Mega Cap</h2>
					<h4>$100 Billion +</h4>
					<p><strong><?php echo count($mega_cap) . '</strong> Interviews'; ?></p>
				</div>
				<div class="col-md-3 <?php if(count($large_cap) == 0): echo 'none'; endif ?>">

					<h2>Large Cap</h2>
					<h4>$10 Billion +</h4>
					<p><strong><?php echo count($large_cap) . '</strong> Interviews'; ?></p>
				</div>
				<div class="col-md-3 <?php if(count($medium_cap) == 0): echo 'none'; endif ?>">

					<h2>Mid Cap</h2>
					<h4>$2 - $10 Billion</h4>
					<p><strong><?php echo count($medium_cap) . '</strong> Interviews'; ?></p>
				</div>
				<div class="col-md-3 <?php if(count($h4_cap) == 0): echo 'none'; endif ?>">

					<h2>Small Cap</h2>
					<h4> $2 Billion</h4>
					<p><strong><?php echo count($h4_cap) . '</strong> Interviews'; ?></p>
				</div>
			</div>
		</div>

	</div>
</div>
