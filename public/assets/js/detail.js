$(function() {
	$("img.thumb").click(function() {
		var ImgSrc = $(this).attr("src");
		var ImgAlt = $(this).attr("alt");
		$("img.large").attr({src:ImgSrc,alt:ImgAlt});
		$("img.large").hide();
		$("img.large").fadeIn("slow");
		return false;
	});


	if (window.matchMedia('(min-width:1024px)').matches) {
		var optionH = $('#option').outerHeight(true);
		var faqH = $('#faq').outerHeight(true);
		var girlsBlogTtlH = $('#girls_blog_pc .ttl').outerHeight(true);
		var girlsBlogH = faqH - (optionH + girlsBlogTtlH);
		var girlsBlogPB = 80;
		var girlsBlogFrameH = girlsBlogH - girlsBlogPB;

		$('#girls_blog_pc iframe').css('height', girlsBlogFrameH);
	}
});