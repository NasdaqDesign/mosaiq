<?php
$primaryPersona = get_post_meta(get_the_ID(), '_participant_primary_persona', true);
$primaryPersonaStr = '';

if(!empty($primaryPersona)){
	$personaCounts[$primaryPersona]++;
	$primaryPersonaStr = 'pers' . $primaryPersona;
}
