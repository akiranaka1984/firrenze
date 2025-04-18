$(function() {
	if (window.matchMedia('screen and (min-width:1024px)').matches) {
		$('#schedule_nav ul li a').each(function() {
			var href = $(this).attr('href');
			var schedulePath = location.pathname;
			var scheduleSearch = location.search;
			var scheduleLocation = schedulePath + scheduleSearch;

			if (scheduleLocation === href) {
				$(this).parent().addClass('current');
			} else {
				$(this).parent().removeClass('current');
			}
		});
	}
});