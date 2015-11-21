/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - ($(window).height() / 10))
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

// Get the good info on page about releases
$.get('https://api.github.com/repos/rigelk/lemuret/releases', function (data) {
    if (data.length > 0) {
	var releases = data.filter(function (release) {
	    return !release.prerelease;
	});
	releases = releases.sort(function (v1, v2) {
	    return Date.parse(v2.published_at) - Date.parse(v1.published_at);
	});

	if (releases[0]) {
	    $('#download-button').attr('href', releases[0].html_url);
	    $('#download-button').text('');
	    $('#download-button').append('<i class="fa fa-download fa-fw"></i> ');
	    $('#download-button').append(releases[0].tag_name);
	    $('#download-legend').text('latest stable');
	} else {
	    $.get('https://api.github.com/repos/rigelk/lemuret/releases', function (latest) {
		latest = latest.sort(function (v1, v2) {
		    return Date.parse(v2.published_at) - Date.parse(v1.published_at);
		});
		$('#download-button').attr('href', latest[0].html_url);
		$('#download-button').text('');
		$('#download-button').append('<i class="fa fa-download fa-fw"></i> ');
		$('#download-button').append(latest[0].tag_name);
		$('#download-legend').text('prerelease');
	    });
	}
    } else {
	$('#download-button').text('No release so far');
    }
});
