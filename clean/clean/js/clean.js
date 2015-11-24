(function ($) {
    $(".bg-img img").one("load", function () {
        img = this;
        var vibrant = new Vibrant(img);
        var swatches = vibrant.swatches()
        applyColorPaletteFromImage(swatches);
    }).each(function () {
        if (this.complete) $(this).load();
    });


    $(window).on('resize', function () {
        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
        var maxWidth = parseInt($(".article-main").width());
        var lineHeight = parseInt($(".title h1").css("font-size"));
        var x = 0;
        var y = lineHeight - 10
        var text = $(".title h1").text()

        $(canvas).attr('height', parseInt($(".title h1").height()));
        $(canvas).attr('width', parseInt($(".title h1").width()));
        context.font = $(".title h1").css("font-weight") + " " + $(".title h1").css("font-size") + " " + $(".title h1").css("font-family");
        context.fillStyle = $("body").css('background-color');
        context.fillRect(0, 0, $(canvas).attr('width'), $(canvas).attr('height'));
        context.globalCompositeOperation = 'destination-out';

        wrapText(context, text, x, y, maxWidth, lineHeight);

        $(canvas).css("background", "transparent");
    }).trigger("resize");
})(jQuery);

function applyColorPaletteFromImage($swatches) {
    $styleCss = $("style#clean_color_palette").html();

    $styleCss = $styleCss.replace("{paletteVibrant}", "rgba(" + $swatches.Vibrant.rgb.toString() + ", 1.0)");
    $styleCss = $styleCss.replace("{paletteMuted}", "rgba(" + $swatches.Muted.rgb.toString() + ", 1.0)");
    $styleCss = $styleCss.replace("{paletteDarkVibrant}", "rgba(" + $swatches.DarkVibrant.rgb.toString() + ", 1.0)");
    $styleCss = $styleCss.replace("{paletteDarkMuted}", "rgba(" + $swatches.DarkMuted.rgb.toString() + ", 1.0)");
    $styleCss = $styleCss.replace("{paletteLightVibrant}", "rgba(" + $swatches.LightVibrant.rgb.toString() + ", 1.0)");
    
    $styleCss = $styleCss.replace("{primaryColor}", "rgba(" + $swatches.Vibrant.rgb.toString() + ", 1.0)");
    $styleCss = $styleCss.replace("{primaryColorHover}", "rgba(" + $swatches.Muted.rgb.toString() + ", 1.0)");
    $styleCss = $styleCss.replace("{primaryColorVisited}", "rgba(" + $swatches.Vibrant.rgb.toString() + ", 1.0)");

    $("#clean_color_palette").html($styleCss).promise().done(function () {;
        $("body").addClass("vibrant-applied");
    });
}

function wrapText(context, text, x, y, maxWidth, lineHeight) {
    var words = text.split(' ');
    var line = '';

    for (var n = 0; n < words.length; n++) {
        var testLine = line + words[n] + ' ';
        var metrics = context.measureText(testLine);
        var testWidth = metrics.width;
        if (testWidth > maxWidth && n > 0) {
            context.fillText(line, x, y);
            line = words[n] + ' ';
            y += lineHeight;
        }
        else {
            line = testLine;
        }
    }
    context.fillText(line, x, y);
}




/*
  $(".entry-header").on('click', function () {
        $(this).parents(".type-post").addClass('selected').siblings(".type-post").removeClass("selected");
        $(".menu-trigger").addClass('post-open');
        $(".menu-trigger").removeClass("nav-open");
        $(".site-main").removeClass("nav-open");
        $("#sidebar").removeClass("nav-open");
       
    });

    $(".menu-trigger").on('click', function () {
        if ($(this).hasClass("post-open")) {
            $(".type-post").removeClass('selected');
            $(".menu-trigger").removeClass('post-open');
        } else if ($(this).hasClass("nav-open")) {
            $(".type-post").removeClass('selected');
            $(".menu-trigger").removeClass('post-open');
            $(this).removeClass("nav-open");
            $(".site-main").removeClass("nav-open");
            $("#sidebar").removeClass("nav-open");
        }else {
            $(this).addClass("nav-open");
            $(".site-main").addClass("nav-open");
            $("#sidebar").addClass("nav-open");

        }
    });
 */