jQuery(document).ready(function ($) {
    const slider = $(".github-repo-slider");

    // Auto-scroll functionality
    let autoScroll = setInterval(() => {
        slider.animate({ scrollLeft: "+=300" }, 1000);
    }, 3000);

    // Pause auto-scroll on hover
    slider.hover(
        () => clearInterval(autoScroll),
        () => {
            autoScroll = setInterval(() => {
                slider.animate({ scrollLeft: "+=300" }, 1000);
            }, 3000);
        }
    );

    // Responsive touch drag support
    let isDragging = false;
    let startX;

    slider.on("mousedown touchstart", function (e) {
        isDragging = true;
        startX = e.pageX || e.originalEvent.touches[0].pageX;
        slider.css("cursor", "grabbing");
    });

    slider.on("mousemove touchmove", function (e) {
        if (!isDragging) return;
        const x = e.pageX || e.originalEvent.touches[0].pageX;
        const dx = startX - x;
        slider.scrollLeft(slider.scrollLeft() + dx);
        startX = x;
    });

    $(document).on("mouseup touchend", function () {
        isDragging = false;
        slider.css("cursor", "grab");
    });
});
