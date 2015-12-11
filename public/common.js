$(document).ready(function(){
$('select[name="roundlistbox[]"]').bootstrapDualListbox();
});

function showRound(id){
	window.location='/panel/settings/edit/'+id;
}
