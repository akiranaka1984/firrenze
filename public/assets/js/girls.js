$(function() {
	$('.girls_nav ul li:nth-of-type(1)').on('click', function() {
		if ($('.girls_nav ul li:nth-of-type(2) p:nth-of-type(2)').hasClass('girls_search_btn_active') == true) {
			$('.girls_nav ul li:nth-of-type(2) p:nth-of-type(2)').removeClass('girls_search_btn_active');
			$('.girls_nav ul li:nth-of-type(2) .inner').removeClass('girls_nav_open');
			$('.girls_nav ul li:nth-of-type(2) .inner p').removeClass('girls_nav_slide');
			$('.girls_schedule_mail').removeClass('girls_slide');
			$('.girls_schedule_mail').hide();

		}


		$('.girls_nav ul li:nth-of-type(1) p:nth-of-type(2)').toggleClass('girls_search_btn_active');

		if ($('.girls_search').hasClass('girls_slide') == false) {
			$('.girls_search').addClass('girls_slide');
			$('.girls_search').show();
		} else {
			$('.girls_search').removeClass('girls_slide');
			$('.girls_search').hide();
		}
	});



	$('.girls_nav ul li:nth-of-type(2)').on('click', function() {
		if ($('.girls_nav ul li:nth-of-type(1) p:nth-of-type(2)').hasClass('girls_search_btn_active') == true) {
			$('.girls_nav ul li:nth-of-type(1) p:nth-of-type(2)').removeClass('girls_search_btn_active');
			$('.girls_nav ul li:nth-of-type(1) .inner').removeClass('girls_nav_open');
			$('.girls_nav ul li:nth-of-type(1) .inner p').removeClass('girls_nav_slide');
			$('.girls_search').removeClass('girls_slide');
			$('.girls_search').hide();
		}


		$('.girls_nav ul li:nth-of-type(2) p:nth-of-type(2)').toggleClass('girls_search_btn_active');

		if ($('.girls_schedule_mail').hasClass('girls_slide') == false) {
			$('.girls_schedule_mail').addClass('girls_slide');
			$('.girls_schedule_mail').show();
		} else {
			$('.girls_schedule_mail').removeClass('girls_slide');
			$('.girls_schedule_mail').hide();
		}
	});
});