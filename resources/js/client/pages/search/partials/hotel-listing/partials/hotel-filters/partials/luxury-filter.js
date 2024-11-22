export default {
    init() {
        const handle = () => {
            const searchParams = new URLSearchParams(location.search);

            const defaultLuxuryScoringFrom = searchParams.get(
                "luxury-scoring-from"
            );
            const defaultLuxuryScoringTo =
                searchParams.get("luxury-scoring-to");

            const ionRangeSlider = $("#luxury-scoring input").ionRangeSlider({
                type: "double",
                skin: "big",
                from: defaultLuxuryScoringFrom || 1,
                to: defaultLuxuryScoringTo || 5,
                min: 1,
                max: 5,
                hide_min_max: true,
                hide_from_to: false,
                extra_classes: "slider-container",
                onFinish: function (data) {
                    const { from, to } = data;

                    if (typeof livewire !== "undefined") {
                        livewire.emit("filter-hotel-scoring", {
                            for: "luxury",
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
        };

        $(document).ready(handle);
    },
};
