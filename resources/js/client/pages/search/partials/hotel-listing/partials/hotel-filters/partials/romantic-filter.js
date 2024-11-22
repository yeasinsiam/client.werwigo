export default {
    init() {
        const handle = () => {
            const searchParams = new URLSearchParams(location.search);

            const defaultRomanticScoringFrom = searchParams.get(
                "romantic-scoring-from"
            );
            const defaultRomanticScoringTo = searchParams.get(
                "romantic-scoring-to"
            );

            const ionRangeSlider = $(
                "#price-per-night-filter input"
            ).ionRangeSlider({
                type: "double",
                skin: "big",
                from: defaultRomanticScoringFrom || 1,
                to: defaultRomanticScoringTo || 5,
                min: 1,
                max: 5,
                hide_min_max: true,
                hide_from_to: false,
                extra_classes: "slider-container",
                onFinish: function (data) {
                    const { from, to } = data;

                    if (typeof livewire !== "undefined") {
                        livewire.emit("filter-hotel-scoring", {
                            for: "romantic",
                            from,
                            to,
                        });
                    }
                },
            });

            window.addEventListener("hotel-listing-filter-reseted", (event) => {
                ionRangeSlider.data("ionRangeSlider").update({
                    from: 1,
                    to: 5,
                });
            });

            //   $(document).on('click', '#price-per-night-filter > button', (e) => {
            //       const el = $('#price-per-night-filter > div');

            //       if (el.hasClass('slide-down')) {
            //           el.slideUp().removeClass('slide-down');
            //       } else {

            //           el.slideDown().addClass('slide-down');
            //       }
            //   })
        };

        $(document).ready(handle);
    },
};
