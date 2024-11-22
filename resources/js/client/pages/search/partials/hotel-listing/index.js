import hotelFiltersScripts from "./partials/hotel-filters";

export default {
    componentId: null,
    isMobileScreen: window.innerWidth < 640,

    initHotelListingsScripts() {
        const handler = () => {
            const hotelIds = JSON.parse(
                $("#hotel-listing-wrapper").attr("data-hotel-ids")
            );

            hotelIds.forEach((id) => {
                const hotelListEl = $(`#hotel-listing-${id}`);
                // const moreDetailsEl = hotelListEl.find(".more-details");

                // const showMoreDetails = () => {
                //     // Show current
                //     hotelListEl.attr("aria-expanded", true);
                //     hotelListEl
                //         .find('[data-id="main-wrapper"]')
                //         .addClass("absolute top-0 z-30 pb-28");
                //     moreDetailsEl.slideDown(500);

                //     $([document.documentElement, document.body]).animate(
                //         {
                //             scrollTop: hotelListEl.offset().top,
                //         },
                //         200
                //     );
                // };

                // const hideMoreDetails = () => {
                //     hotelListEl.attr("aria-expanded", false);
                //     moreDetailsEl.slideUp(500, () => {
                //         hotelListEl
                //             .find('[data-id="main-wrapper"]')
                //             .removeClass("absolute top-0 z-30 pb-28");
                //     });
                // };

                // const handleToggleDetails = ($this) => {
                //     if (hotelListEl.attr("aria-expanded") == "false") {
                //         const hotelId = $($this)
                //             .parents("[data-hotel-id]")
                //             .attr("data-hotel-id");
                //         Livewire.emit("store-hotel-to-recent-search", hotelId);

                //         showMoreDetails();
                //     } else {
                //         hideMoreDetails();
                //     }
                // };

                // hotelListEl
                //     .find(".toggle-details-btn")
                //     .off("click")
                //     .on("click", function (e) {
                //         if (
                //             this.isMobileScreen ||
                //             $(this).attr("toggle-details-ignore-on-desktop") ==
                //                 undefined
                //         ) {
                //             e.preventDefault();
                //             handleToggleDetails(this);
                //         }
                //     });

                // $("body").on("click", function (event) {
                //     var modal = hotelListEl;

                //     if (
                //         !modal.is(event.target) &&
                //         !modal.has(event.target).length
                //     ) {
                //         hideMoreDetails();
                //     }
                // });

                // hotelListEl
                //     .find('[data-id="hotel-listing-gallery-thumb-sliders" ]')
                //     .each((key, swiperEl) => {
                //         // swiperEl.addEventListener("click", (event) => {
                //         //     console.log("otasia");
                //         // });
                //         let clickTimeout;
                //         $(swiperEl)
                //             .off("click")
                //             .on("click", function (e) {
                //                 if (!clickTimeout) {
                //                     clickTimeout = setTimeout(function () {
                //                         clickTimeout = null;
                //                         // Your code here...
                //                         handleToggleDetails(swiperEl);
                //                     }, 200); // Adjust the delay time as needed
                //                 }
                //             });
                //     });

                // --------------------------------(  Score Element  ) ----------------------\\
                // const scoreEl = hotelListEl.find(
                //     '[data-id="mobile-view-score-container"] > div'
                // );
                // hotelListEl
                //     .find('[data-id="mobile-view-score-container"] button')
                //     .off("click")
                //     .on("click", (e) => {
                //         e.stopPropagation();
                //         if (scoreEl.hasClass("showing")) {
                //             scoreEl.fadeOut(200).removeClass("showing");
                //         } else {
                //             scoreEl.fadeIn(200).addClass("showing");
                //         }
                //     });
                // $("body").on("click", function (event) {
                //     const modal = hotelListEl.find(
                //         '[data-id="mobile-view-score-container"]'
                //     );

                //     if (
                //         !modal.is(event.target) &&
                //         !modal.has(event.target).length
                //     ) {
                //         scoreEl.fadeOut().removeClass("showing");
                //     }
                // });

                // hotelListEl.find('[data-id="mobile-view-score-container"] > div').off('click').on('click', (e) => {
                //     e.stopPropagation();
                // })

                //-------------------------------------- (Booking Online link Popup Scripts)---------------------------- \\
                // const bannerEl = hotelListEl.find(
                //     '[data-id="show-booking-online-links"]'
                // );
                // const popupEl = hotelListEl.find(
                //     '[data-id="show-booking-online-popup"]'
                // );

                // if (bannerEl.length) {
                //     const handleOpenPopup = () => {
                //         popupEl.fadeIn(200);
                //     };
                //     const handleClosePopup = () => {
                //         popupEl.fadeOut(200);
                //     };
                //     $("body").on("click", function (event) {
                //         var modal = hotelListEl.find(
                //             '[data-id="show-booking-online-popup"] > div > div'
                //         );
                //         if (
                //             !modal.is(event.target) &&
                //             !modal.has(event.target).length
                //         ) {
                //             handleClosePopup();
                //         }
                //     });

                //     hotelListEl
                //         .find('[data-id="show-booking-online-links"]')
                //         .on("click", (e) => {
                //             e.preventDefault();
                //             e.stopPropagation();
                //             handleOpenPopup();
                //         });
                //     hotelListEl
                //         .find('[data-id="close-booking-online-popup"]')
                //         .on("click", () => {
                //             handleClosePopup();
                //         });
                // }

                //------------------------- ( Gallery Scripts )-------------------------
                // const hotelDetailsPopupModal = hotelListEl.find(
                //     '[data-id="hotel-gallery-popup"]'
                // );

                // // Handle Open
                // hotelListEl
                //     .find('[data-id="show-hotel-gallery-popup"]')
                //     .off("click")
                //     .on("click", (e) => {
                //         e.preventDefault();
                //         hotelDetailsPopupModal.attr("aria-expanded", "true");
                //         $("body").css("overflow", "hidden");
                //         hotelDetailsPopupModal.fadeIn(200);

                //         //________________________||_________________________\\
                //         const miniThumbnailsSwiperEl =
                //             hotelDetailsPopupModal.find(
                //                 '[data-id="hotel-details-popup-mini-thumbs"]'
                //             )[0];
                //         Object.assign(miniThumbnailsSwiperEl, {
                //             breakpoints: {
                //                 0: {
                //                     slidesPerView: 2,
                //                 },
                //                 1290: {
                //                     slidesPerView: 3,
                //                 },
                //             },
                //         });

                //         miniThumbnailsSwiperEl.initialize();
                //         const miniThumbsElSwiper =
                //             miniThumbnailsSwiperEl.swiper;

                //         miniThumbsElSwiper.slideTo(0);
                //         // for 2 slide
                //         if (window.innerWidth <= 1024) {
                //             if (miniThumbsElSwiper.slides.length > 2) {
                //                 $(miniThumbsElSwiper.slides[1])
                //                     .find("div.relative")
                //                     .attr("data-remaining", true)
                //                     .find("div.load-more-text")
                //                     .show()
                //                     .find("span")
                //                     .text(
                //                         `${
                //                             miniThumbsElSwiper.slides.length - 2
                //                         }+`
                //                     );
                //             }

                //             // for 3 slide
                //         } else {
                //             if (miniThumbsElSwiper.slides.length > 3) {
                //                 $(miniThumbsElSwiper.slides[2])
                //                     .find("div.relative")
                //                     .attr("data-remaining", true)
                //                     .find("div.load-more-text")
                //                     .show()
                //                     .find("span")
                //                     .text(
                //                         `${
                //                             miniThumbsElSwiper.slides.length - 3
                //                         }+`
                //                     );
                //             }
                //         }

                //         miniThumbsElSwiper.on("slideChange", function () {
                //             $(miniThumbnailsSwiperEl)
                //                 .find(".load-more-text")
                //                 .hide();
                //         });
                //         //________________________||_________________________\\
                //     });

                // // Handle Close
                // hotelDetailsPopupModal
                //     .find(".handle-close")
                //     .off("click")
                //     .on("click", () => {
                //         hotelDetailsPopupModal.attr("aria-expanded", "false");
                //         $("body").css("overflow", "auto");
                //         hotelDetailsPopupModal.fadeOut(200);
                //     });
                //------------------------- ( Thumbnail Scripts )-------------------------
                const thumbsSwiper = hotelListEl.find(
                    '[data-id="hotel-listing-gallery-thumb-sliders"]'
                );

                thumbsSwiper.each((i, swiper) => {
                    Object.assign(swiper, {
                        spaceBetween: 20,
                        slidesPerView: 1,
                        pagination: true,
                    });

                    swiper.initialize();
                });
            });
        };

        Livewire.hook("component.initialized", (component) => {
            if (component.id == this.componentId) {
                handler();
            }
        });
        Livewire.hook("message.processed", (message, component) => {
            if (component.id == this.componentId) {
                handler();
            }
        });
    },

    initNProgressLoadingIndicator() {
        Livewire.hook("message.sent", (message, component) => {
            if (component.id == this.componentId)
                NProgress.configure({
                    showSpinner: false,
                }).start();
        });
        Livewire.hook("message.processed", (message, component) => {
            if (component.id == this.componentId) NProgress.done();
        });
    },

    init() {
        // hotelFiltersScripts.init();

        this.componentId = $("#hotel-listing").attr("wire:id");
        this.initHotelListingsScripts();
        this.initNProgressLoadingIndicator();
    },
};
