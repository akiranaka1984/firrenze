$(function() {
	$('#tab p:first a').addClass('active');
	$('#tab_contents > .tab_inner').hide();
	if ($('#tab p:first a').hasClass('active')) {
		$('#tab_contents > #one').show()
	} else {
		$('#tab_contents > #two').show()
	}

	$('#tab p a').click(function() {
		$('#tab_contents > .tab_inner').hide();
		$('#tab p a').removeClass('active');
		$(this).addClass('active');

		if ($('#tab p:first a').hasClass('active')) {
			$('#tab_contents > #one').show()
		} else {
			$('#tab_contents > #two').show()
		}

		return false;
	});

});