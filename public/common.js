$(document).ready(function(){
$('select[name="catlistbox[]"]').bootstrapDualListbox();
	$('select[name="roundlistbox[]"]').bootstrapDualListbox();


});

function showRound(eventid, id){
	window.location='/panel/rounds-settings/edit/'+eventid+'/'+id;
}

function showCategory(id){
	window.location='/panel/settings/edit/'+id;
}
