$TeamTyro_Survey;

$(document).ready(function(){
	if($revisit){
		$('.content_load').load('colorgame.php');
	} else {
		$('.content_load').load('survey.php');
	}
});