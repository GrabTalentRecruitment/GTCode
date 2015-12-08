/**
 * self.js
 *
 */

( function( $ ) {
	
	$(document).ready(function(){
		var getWinWidth = $(window).width();
		if(getWinWidth < 720){
			$('.site-content table').each(function(){
				$(this).wrap('<div class="mobile-table"></div>')
			});
		}
		
		$('.mobile-toggle').click(function(){
			$('.site-menu').toggle('toggled');
		});
	});
	
	
} )( jQuery );
