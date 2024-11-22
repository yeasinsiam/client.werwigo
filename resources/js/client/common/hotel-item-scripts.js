export default function (hotelEl) {
    // --------------------------------(  Score Element  ) ----------------------\\
    const scoreEl = hotelEl.find('[data-id="view-score-container"] > div');
    hotelEl
        .find('[data-id="view-score-container"] button')
        .off("click")
        .on("click", (e) => {
            e.stopPropagation();
            if (scoreEl.hasClass("showing")) {
                scoreEl.fadeOut(200).removeClass("showing");
            } else {
                scoreEl.fadeIn(200).addClass("showing");
            }
        });
    $("body").on("click", function (event) {
        const modal = scoreEl;

        if (!modal.is(event.target) && !modal.has(event.target).length) {
            // event.stopPropagation();
            scoreEl.fadeOut().removeClass("showing");
        }
    });

    //------------------------- ( Thumbnail Scripts )-------------------------
    const thumbsSwiper = hotelEl.find(
        '[data-id="hotel-listing-gallery-thumb-sliders"]'
    );

    thumbsSwiper.each((i, swiper) => {
        Object.assign(swiper, {
            nested: true,
            // spaceBetween: 20,
            slidesPerView: 1,
            pagination: true,
            mousewheel: {
                forceToAxis: true,
                thresholdDelta: 40,
            },
        });

        swiper.initialize();
    });
}
