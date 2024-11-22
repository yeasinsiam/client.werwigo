export default {
    init() {
        const handle = () => {
            const searchParams = new URLSearchParams(location.search);

            const defaultIntimateScoringFrom = searchParams.get(
                "intimate-scoring-from"
            );
            const defaultIntimateScoringTo = searchParams.get(
                "intimate-scoring-to"
            );

            const ionRangeSlider = $(
                "#intimate-scoring-filter input"
            ).ionRangeSlider({
                type: "double",
                skin: "big",
                from: defaultIntimateScoringFrom || 1,
                to: defaultIntimateScoringTo || 5,
                min: 1,
                max: 5,
                hide_min_max: true,
                hide_from_to: false,
                extra_classes: "slider-container",
                onFinish: function (data) {
                    const { from, to } = data;

                    if (typeof livewire !== "undefined") {
                        livewire.emit("filter-hotel-scoring", {
                            for: "intimate",
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
