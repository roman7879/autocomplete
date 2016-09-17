var MIN_LENGTH = 3;

$( document ).ready(function() {
	$("#keyword").keyup(function() {
		var keyword = $("#keyword").val();
		if (keyword.length >= MIN_LENGTH) {
			$.get( "auto-complete.php", { keyword: keyword } )
			.done(function( data ) {
				$('#results').html('');
				var results = jQuery.parseJSON(data);
				$(results).each(function(key, value) {		
				//	for(var key in value) {
				//	$('#results').append('<div class="item">' + value[key] + '</div>');
				//	console.log('key: ' + key + '\n' + 'value: ' + value[key]);
					$('#results').append('<div class="item">' + '<a href=getProduct.php?id=' + value['value'] + '>' + value['label'] + '</a>' + '</div>');
					
				//	}
				
				
})

			    $('.item').click(function() {
			    	var text = $(this).html();
			    	$('#keyword').val(text);
			    })

			});
		} else {
			$('#results').html('');
		}
	});

    $("#keyword").blur(function(){
    		$("#results").fadeOut(500);
    	})
        .focus(function() {		
    	    $("#results").show();
    	});

});
