var timer;

// button hover effect for portfolio
$(".button").hover(function() {
	timer = setTimeout(function () {
            $(".button").css("backgroundColor", "mediumvioletred");
			$(".button").css("color", "white");
        }, 70);
	
},
function() {
	clearTimeout(timer);
	$(".button").css("backgroundColor", "white")
	$(".button").css("color", "black");
});

