/**
 * Copyright (c) 2015 Nick Hayward
 * All rights reserved
**/

$(document).ready(function() {
	var quotes = $(".quotes");
	var i = 0;

	function showQuotes() {
		if ( i == quotes.length ) {
			i = 0;
		}
		$(quotes[i]).fadeIn(1000);
		setTimeout(function() {
			$(quotes[i]).fadeOut(1000);
		}, 5000);
		setTimeout(function() {
			i++;
			setTimeout(showQuotes(), 1000);
		}, 6000);
	}

	showQuotes();
});