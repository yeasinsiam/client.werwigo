export default {
    init() {
        function handler() {
            // const bannerEl = $("#{{ $id }}");
            const bannerEl = $("#listing-popup-banner");
            const popupEl = bannerEl.find(".popup");

            const handleOpenPopup = () => {
                popupEl.fadeIn(200);
            };

            const handleClosePopup = () => {
                popupEl.fadeOut(200);
            };

            $("body").on("click", function (event) {
                var modal = $("#listing-popup-banner .popup > div > div");

                if (
                    !modal.is(event.target) &&
                    !modal.has(event.target).length
                ) {
                    handleClosePopup();
                }
            });

            $("#listing-popup-banner .show-popup-button").on("click", (e) => {
                e.stopPropagation();
                handleOpenPopup();
            });

            $("#listing-popup-banner .close-popup-btn").on("click", () => {
                handleClosePopup();
            });
        }
        $(document).ready(handler);
    },
};
