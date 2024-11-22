// import { debounce, fetchAutocompleteSuggestions } from "../../utils/helper";

import hotelItemScripts from "../common/hotel-item-scripts";
import { getIsMobileScreen } from "../utils/helper";

export default {
    isMobileScreen: window.innerWidth < 640,

    initSlidersScripts: () => {
        // const swiperEl = document.querySelector(
        //     "#how-escapelove-works-section swiper-container"
        // );
        // const swiperParams = {
        //     navigation: {
        //         // prevEl: "#how-escapelove-works-section .swiper-navigation-left",
        //         nextEl: "#how-escapelove-works-section .swiper-navigation-right",
        //     },
        //     spaceBetween: 20,

        //     injectStyles: [
        //         `
        //         .swiper   {
        //             padding-bottom: 10px;
        //         }
        //     `,
        //     ],

        //     breakpoints: {
        //         0: {
        //             slidesPerView: 1,
        //             // spaceBetween: 10,
        //         },
        //         768: {
        //             slidesPerView: 2,
        //             // spaceBetween: 10,
        //         },
        //         1024: {
        //             slidesPerView: 3,
        //             // spaceBetween: 10,
        //         },
        //     },
        // };
        // Object.assign(swiperEl, swiperParams);
        // swiperEl.initialize();

        // _________________Init Romantic Escape Slider __________________\\

        // const romanticEscapeSliderEl = document.querySelector(
        //     "#romantic-escape-slider"
        // );
        // Object.assign(romanticEscapeSliderEl, {
        //     spaceBetween: 20,

        //     breakpoints: {
        //         0: {
        //             slidesPerView: "auto",
        //         },
        //         // 768: {
        //         //     slidesPerView: 2,
        //         // },
        //         1024: {
        //             slidesPerView: 4,
        //         },
        //     },
        // });
        // romanticEscapeSliderEl.initialize();

        // _________________Init Your Recent Search Slider __________________\\

        const yourRecentSearchSliderEl = document.querySelector(
            "#your-search-slider"
        );

        if (yourRecentSearchSliderEl) {
            Object.assign(yourRecentSearchSliderEl, {
                spaceBetween: 20,

                breakpoints: {
                    0: {
                        slidesPerView: "auto",
                    },
                    // 768: {
                    //     slidesPerView: 2,
                    // },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });
            yourRecentSearchSliderEl.initialize();
        }

        // _________________Init about ooohotels Slider __________________\\

        // const aboutOoohotelsSliderEl = document.querySelector(
        //     "#about-ooohotels-slider"
        // );
        // Object.assign(aboutOoohotelsSliderEl, {
        //     spaceBetween: 30,
        //     pagination: true,

        //     breakpoints: {
        //         0: {
        //             slidesPerView: "auto",
        //         },
        //         // 768: {
        //         //     slidesPerView: 2,
        //         // },
        //         1024: {
        //             slidesPerView: 3,
        //         },
        //     },
        // });
        // aboutOoohotelsSliderEl.initialize();

        // _________________Init Your favorites  Slider __________________\\
        // const yourFavoriteSliderEl = document.querySelector(
        //     "#your-favorite-slider"
        // );
        // Object.assign(yourFavoriteSliderEl, {
        //     spaceBetween: 20,

        //     breakpoints: {
        //         0: {
        //             slidesPerView: "auto",
        //         },
        //         // 768: {
        //         //     slidesPerView: 2,
        //         // },
        //         1024: {
        //             slidesPerView: 2,
        //         },
        //     },
        // });
        // yourFavoriteSliderEl.initialize();
    },

    initLiveWireHotelsSectionScripts() {
        // const initCategoryFilterHotelsScripts = () => {
        //     const componentId = $("#category-filter-hotels-section").attr(
        //         "wire:id"
        //     );

        //     const handler = () => {
        //         const categoryFilterHotelsSectionEl = $(
        //             "#category-filter-hotels-section"
        //         );

        //         const initCategoryListingScripts = () => {
        //             // -------------- init category (scrolls) -------------------\\
        //             const categoryListEl = categoryFilterHotelsSectionEl.find(
        //                 '[data-id="category-list"]'
        //             );

        //             const parentContainer = categoryListEl.find("ul");
        //             const itemsContainer = parentContainer.find("li");
        //             const scrollLeftButton =
        //                 categoryListEl.find('[data-id="prev"]');
        //             const scrollRightButton =
        //                 categoryListEl.find('[data-id="next"]');

        //             scrollLeftButton.off("click").on("click", function () {
        //                 parentContainer.animate(
        //                     {
        //                         scrollLeft: "-=400px",
        //                     },
        //                     300
        //                 );
        //             });

        //             scrollRightButton.off("click").on("click", function () {
        //                 parentContainer.animate(
        //                     {
        //                         scrollLeft: "+=400px",
        //                     },
        //                     300
        //                 );
        //             });

        //             parentContainer.off("scroll").on("scroll", function () {
        //                 updateScrollButtons();
        //             });

        //             function updateScrollButtons() {
        //                 var scrollLeft = parentContainer.scrollLeft();

        //                 if (scrollLeft <= 0) {
        //                     scrollLeftButton.hide();
        //                 } else {
        //                     scrollLeftButton.show();
        //                 }

        //                 if (
        //                     Math.round(
        //                         parentContainer.prop("scrollWidth") -
        //                             parentContainer.prop("scrollLeft") -
        //                             parentContainer.outerWidth()
        //                     ) <= 10
        //                 ) {
        //                     scrollRightButton.hide();
        //                 } else {
        //                     scrollRightButton.show();
        //                 }
        //             }

        //             updateScrollButtons();
        //         };

        //         const initCategoryHotelsSlider = () => {
        //             const swipers = categoryFilterHotelsSectionEl.find(
        //                 '[data-select="category-sliders"]'
        //             );

        //             swipers.each((i, swiper) => {
        //                 Object.assign(swiper, {
        //                     spaceBetween: 20,
        //                     slidesPerView: "auto",
        //                     freeMode: true,
        //                     mousewheel: {
        //                         forceToAxis: true,
        //                     },
        //                 });

        //                 swiper.initialize();
        //             });
        //         };

        //         const initHotelListingScripts = () => {
        //             categoryFilterHotelsSectionEl
        //                 .find('[data-select="single-hotel-item"]')
        //                 .each(function (index, el) {
        //                     // initSingleHotelScripts($(el));
        //                     hotelItemScripts($(el));
        //                 });
        //         };

        //         const initCategorySortingFilterScripts = () => {
        //             $(window).on("category-sorting-filtered", function (e) {
        //                 const categorySlug = e.originalEvent.detail;

        //                 setTimeout(function () {
        //                     $([
        //                         document.documentElement,
        //                         document.body,
        //                     ]).animate(
        //                         {
        //                             scrollTop: $(
        //                                 `#category-list-${categorySlug}`
        //                             ).offset().top,
        //                         },
        //                         100
        //                     );
        //                 }, 700);
        //             });
        //         };

        //         initCategoryListingScripts();
        //         initCategoryHotelsSlider();
        //         initHotelListingScripts();
        //         initCategorySortingFilterScripts();
        //     };

        //     Livewire.hook("component.initialized", (component) => {
        //         if (component.id == componentId) {
        //             handler();
        //         }
        //     });

        //     Livewire.hook("message.processed", (message, component) => {
        //         if (component.id == componentId) {
        //             handler();
        //         }
        //     });

        //     $(window).on("popstate", function (event) {
        //         handler();
        //     });

        //     //Nprogress
        //     Livewire.hook("message.sent", (message, component) => {
        //         if (component.id == componentId)
        //             NProgress.configure({
        //                 showSpinner: false,
        //             }).start();
        //     });
        //     Livewire.hook("message.processed", (message, component) => {
        //         if (component.id == componentId) NProgress.done();
        //     });
        // };
        const initLivewireHotelListingSidebarDetailsPopupScripts = () => {
            const hotelListingSectionEl = $("#hotel-listing-section");
            const componentId = hotelListingSectionEl.attr("wire:id");

            // data-select='hotel-listing-filtered-hide'

            const handler = () => {
                const hotelItemEls = hotelListingSectionEl.find(
                    '[data-select="single-hotel-item"]'
                );

                const initGalleryScroll = (el) => {
                    const galleryListEl = el;

                    const parentContainer = galleryListEl.find("ul");
                    const itemsContainer = parentContainer.find("li");
                    const scrollLeftButton =
                        galleryListEl.find('[data-id="prev"]');
                    const scrollRightButton =
                        galleryListEl.find('[data-id="next"]');

                    scrollLeftButton.off("click").on("click", function () {
                        parentContainer.animate(
                            {
                                scrollLeft: "-=400px",
                            },
                            300
                        );
                    });

                    scrollRightButton.off("click").on("click", function () {
                        parentContainer.animate(
                            {
                                scrollLeft: "+=400px",
                            },
                            300
                        );
                    });

                    parentContainer.off("scroll").on("scroll", function () {
                        updateScrollButtons();
                    });

                    function updateScrollButtons() {
                        var scrollLeft = parentContainer.scrollLeft();

                        if (scrollLeft <= 0) {
                            scrollLeftButton.hide();
                        } else {
                            scrollLeftButton.show();
                        }
                        if (
                            Math.round(
                                parentContainer.prop("scrollWidth") -
                                    parentContainer.prop("scrollLeft") -
                                    parentContainer.outerWidth()
                            ) <= 10
                        ) {
                            scrollRightButton.hide();
                        } else {
                            scrollRightButton.show();
                        }
                    }

                    // updateScrollButtons();
                };

                hotelItemEls.each(function (index, el) {
                    var popupBtn = $(el).find('[data-id="link"]');
                    var popup = $(el).find('[data-id="details-popup"]');
                    var popupCloseBtn = $(el).find('[data-id="close-popup"]');
                    var mapPopupBtn = $(el).find('[data-id="open-map-popup"]');
                    var mapEl = $(el).find(
                        '[data-id="left-sidebar"] [data-id="map"]'
                    );

                    popupBtn.off("click").on("click", (e) => {
                        if (
                            !getIsMobileScreen() &&
                            !$(e.target).hasClass("swiper-navigation-left") &&
                            !$(e.target)
                                .parent()
                                .hasClass("swiper-navigation-left") &&
                            !$(e.target).hasClass("swiper-navigation-right") &&
                            !$(e.target)
                                .parent()
                                .hasClass("swiper-navigation-right")
                        ) {
                            e.preventDefault();

                            popup.fadeIn(200);
                            // popup.removeClass("translate-x-full");
                            popup
                                .find('[data-id="sidebar"]')
                                .removeClass("translate-x-full");

                            $("body").css("overflow", "hidden");
                        }
                    });

                    popupCloseBtn.off("click").on("click", (e) => {
                        popup
                            .find('[data-id="sidebar"]')
                            .addClass("translate-x-full");
                        mapEl.hide();
                        setTimeout(function () {
                            popup.fadeOut(200);
                        }, 400);
                        $("body").css("overflow", "auto");
                    });

                    mapPopupBtn.off("click").on("click", (e) => {
                        mapEl.fadeIn(200);
                    });

                    // $(window)
                    //     // .off("scroll")
                    //     .on("scroll", function () {
                    //         var element = $("#hotel-listing-section");
                    //         var elementTop = element.offset().top;
                    //         var windowTop = $(window).scrollTop();
                    //         if (elementTop - 30 <= windowTop) {
                    //             popup
                    //                 .find('[data-id="left-sidebar"]')
                    //                 .addClass("pt-[50px]")
                    //                 .removeClass("pt-[45px]");
                    //         } else {
                    //             popup
                    //                 .find('[data-id="left-sidebar"]')
                    //                 .removeClass("pt-[50px]")
                    //                 .addClass("pt-[45px]");
                    //         }
                    //     });

                    // initGalleryScroll(
                    //     popup.find('[data-id="popup-details-gallery"]')
                    // );
                });
            };

            // Livewire.hook("component.initialized", (component) => {
            //     if (component.id == componentId) {
            //         handler();
            //     }
            // });
            document.addEventListener("livewire:load", function () {
                handler();
            });
            document.addEventListener("livewire:update", function () {
                handler();
            });

            window.addEventListener("hotel-filtered", () => {
                const popup = hotelListingSectionEl
                    .find('[data-select="single-hotel-item"]')
                    .find('[data-id="details-popup"]');
                popup.find('[data-id="sidebar"]').addClass("translate-x-full");
                popup.find('[data-id="left-sidebar"] [data-id="map"]').hide();

                setTimeout(function () {
                    popup.fadeOut(200);
                }, 400);
            });

            // Livewire.hook("message.processed", (message, component) => {
            //     if (component.id == componentId) {
            //         handler();
            //     }
            // });

            $(window).on("popstate", function (event) {
                handler();
            });

            // window.addEventListener("livewire:update", function () {
            // });

            //Nprogress
            Livewire.hook("message.sent", (message, component) => {
                if (component.id == componentId)
                    NProgress.configure({
                        showSpinner: false,
                    }).start();
            });
            Livewire.hook("message.processed", (message, component) => {
                if (component.id == componentId) NProgress.done();
            });
        };

        const initLoadMoreScripts = () => {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            console.log("sf");
                            Livewire.emit("load-more-hotels");
                        }
                    });
                },
                {
                    root: null,
                }
            );

            const loadMoreEl = $("#hotel-listing-section-load-more");
            if (loadMoreEl.length) observer.observe(loadMoreEl[0]);
        };

        const initLiveWireHotelListingSection = () => {
            const hotelListingSectionEl = $("#hotel-listing-section");

            // data-select='hotel-listing-filtered-hide'

            const handler = () => {
                const hotelItemEls = hotelListingSectionEl.find(
                    '[data-select="single-hotel-item"]'
                );

                hotelItemEls.each(function (index, el) {
                    hotelItemScripts($(el));
                });

                if (hotelItemEls.length) {
                    $("[data-select='hotel-listing-filtered-hide']").fadeOut(
                        200
                    );
                } else {
                    $("[data-select='hotel-listing-filtered-hide']").fadeIn(
                        200
                    );
                }
            };

            document.addEventListener("livewire:load", function () {
                handler();
            });
            document.addEventListener("livewire:update", function () {
                handler();
            });

            $(window).on("popstate", function (event) {
                handler();
            });
        };

        // initCategoryFilterHotelsScripts();
        initLiveWireHotelListingSection();
        initLoadMoreScripts();
        initLivewireHotelListingSidebarDetailsPopupScripts();
    },

    init() {
        $(document).ready(() => {
            this.initSlidersScripts();
        });
        this.initLiveWireHotelsSectionScripts();

        document.addEventListener("hotel-filtered", function () {
            $("html, body").scrollTop(0);
        });
    },
};
