jQuery(document).ready(function () {
    // Initialize all Slick sliders
    jQuery('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false, // Set to true if custom arrows are needed
        fade: true,
        asNavFor: '.slider-nav',
        // autoplay: true,
        // autoplaySpeed: 100000,
    });

    jQuery('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        infinite: true,
        centerPadding: '0px',
    });

    // // Handle Slick slider accessibility attributes
    // jQuery(document)
    //     .on('focus', '.slick-slide', function () {
    //         jQuery(this).removeAttr('aria-hidden').attr('inert', 'false');
    //     })
    //     .on('blur', '.slick-slide', function () {
    //         jQuery(this).attr('aria-hidden', 'true').attr('inert', 'true');
    //     });

    // Tab switching functionality
    const tabs = document.querySelectorAll('.tab-link');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            const tabId = this.getAttribute('data-tab');

            // Remove active class from all tabs and contents
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            // Add active class to the clicked tab and its corresponding content
            this.classList.add('active');
            document.getElementById(tabId).classList.add('active');

            // Optionally, update the background color dynamically
            const mainContentTabs = document.querySelector('.main-content-tabs');
            if (mainContentTabs) {
                mainContentTabs.className = `main-content-tabs bg-${tabId}`;
            }
        });
    });

    // WOW-like animation functionality
   //بديل كامل ومتجاوب لمكتبه واو بفانكشن واحد 
//محمد حامد
/*global $, jQuery, console, alert, promp*/
jQuery(window).on("load scroll", function () {
	"use strict";
	jQuery(".wow").css("animation-play-state", "paused");
	jQuery(".wow").each(function () {
		if (!(jQuery(this).data("wow-duration"))) {
			jQuery(this).data("wow-duration", "1s");
		}
		if (jQuery(this).data("wow-offset") + jQuery(this).offset().top <= jQuery(window).scrollTop() + jQuery(window).height() || (!(jQuery(this).data("wow-offset")) && jQuery(this).offset().top <= jQuery(window).scrollTop() + jQuery(window).height())) {
			jQuery(this).css("animation-play-state", "running ");
			jQuery(this).css({
				"animationDuration": jQuery(this).data("wow-duration"),
				"animationDelay": jQuery(this).data("wow-delay"),
				"animationIterationCount": jQuery(this).data("wow-iteration")
			});
		}
	});
});
});
