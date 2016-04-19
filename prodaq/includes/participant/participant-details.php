<h1><?php echo the_title(); ?></h1>
<?php if(isset($title)){
	echo '<h4>' . $title . '</h4>';
}?>
<?php if(isset($company)){
	echo '<h4>' . $company . '</h4>';
}?>
<ul class="participant__contact">
	<?php
	if(!empty($email)){
		echo '<li><i class="icon">email</i> <a href="#">' . $email . '</a></li>';
	 }
	 if(!empty($phone)){
		 echo '<li><i class="icon">phone</i>' . $phone . '</li>';
		}
	 if(!empty($linkedin)){
		 echo '<li><i class="icon social">linkedin</i> <a href="' . $linkedin . '">LinkedIn</a></li>';
	 }?>

</ul>
<dl>
<?php if(!empty($company_industry)){
	echo '<dt>Industry</dt>';
		$industryJson = file_get_contents(get_template_directory() . '/library/data/industry.json');
		$industryArr = json_decode($industryJson, true);
		$industries = $industryArr[industryCodes];
		foreach($industries as $industry){
			if($industry[code] == $company_industry){
				echo '<dd>' . $industry['description'] . '</dd>';
			}
		}
} ?>
</dl>
<dl>
<?php if(!empty($company_size)){
	echo '<dt>Company Size</dt>';
		$sizeJson = file_get_contents(get_template_directory() . '/library/data/company-size.json');
		$sizeArr = json_decode($sizeJson, true);
		$sizes = $sizeArr[companySizes];
		foreach($sizes as $size){
			if($size[code] == $company_size){
				echo '<dd>' . $size['description'] . '</dd>';
			}
		}
} ?>
</dl>
<dl>
<?php if(!empty($company_market)){
	echo '<dt>Market Cap</dt>';
	echo '<dd>' . strtoupper($company_market) . '</dd>';
} ?>
</dl>
<dl>
	<?php if(!empty($city) || !empty($state) || !empty($country)){
		echo '<dt>Location</dt>';
	}
	echo '<dd>';
		if(!empty($city)){
			echo $city . ', ';
		}
		if(!empty($state)){
			echo $state . ' ';
		}
		if(!empty($country)){
			echo $country;
		}
	echo '</dd>';?>

</dl>
<?php if(isset($region)){
	echo '<dl>
		<dt>Region</dt>
		<dd>'. strtoupper($region) .'</dd>
	</dl>';
}?>
