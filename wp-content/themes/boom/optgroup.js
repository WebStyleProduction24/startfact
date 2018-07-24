jQuery(document).ready(function($){

	var selectEngines = $('select[name=engines]');
	var foundin = $('option:contains("optgroup-")', selectEngines);

  $.each(foundin, function(value){
	var updated = $(this).val().replace('optgroup-','');
	$(this).nextUntil('option:contains("endoptgroup")').wrapAll('<optgroup label="'+updated+'"></optgroup>');
  });

  $('option:contains("optgroup-"), option:contains("endoptgroup")', selectEngines).remove();

});