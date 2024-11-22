import { getIsMobileScreen } from "../../utils/helper";

export default {
    initThumbnailSlidersScripts: () => {
        //------------------------- ( Thumbnail Scripts )-------------------------
        const thumbsSwiper = $(
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
    },
    // -------------- init category (scrolls) -------------------\\
    initGalleryScroll: function () {
        if (getIsMobileScreen()) {
            const galleryListEl = $("#gallery-list");

            const parentContainer = galleryListEl.find("ul");
            const itemsContainer = parentContainer.find("li");
            const scrollLeftButton = galleryListEl.find('[data-id="prev"]');
            const scrollRightButton = galleryListEl.find('[data-id="next"]');

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

            updateScrollButtons();
        }
    },

    initPopupGalleryScripts: function () {
        const galleryPopupModalEl = $('[data-id="hotel-gallery-popup"]');

        // Handle Open
        $('[data-select="show-hotel-gallery-popup"]')
            .off("click")
            .on("click", (e) => {
                e.preventDefault();
                galleryPopupModalEl.attr("aria-expanded", "true");
                $("body").css("overflow", "hidden");
                galleryPopupModalEl.fadeIn(200);

                //________________________||_________________________\\
                const miniThumbnailsSwiperEl = galleryPopupModalEl.find(
                    '[data-id="hotel-details-popup-mini-thumbs"]'
                )[0];
                Object.assign(miniThumbnailsSwiperEl, {
                    breakpoints: {
                        0: {
                            slidesPerView: 2,
                        },
                        1290: {
                            slidesPerView: 3,
                        },
                    },
                });

                miniThumbnailsSwiperEl.initialize();
                const miniThumbsElSwiper = miniThumbnailsSwiperEl.swiper;

                miniThumbsElSwiper.slideTo(0);
                // for 2 slide
                if (window.innerWidth <= 1024) {
                    if (miniThumbsElSwiper.slides.length > 2) {
                        $(miniThumbsElSwiper.slides[1])
                            .find("div.relative")
                            .attr("data-remaining", true)
                            .find("div.load-more-text")
                            .show()
                            .find("span")
                            .text(`${miniThumbsElSwiper.slides.length - 2}+`);
                    }

                    // for 3 slide
                } else {
                    if (miniThumbsElSwiper.slides.length > 3) {
                        $(miniThumbsElSwiper.slides[2])
                            .find("div.relative")
                            .attr("data-remaining", true)
                            .find("div.load-more-text")
                            .show()
                            .find("span")
                            .text(`${miniThumbsElSwiper.slides.length - 3}+`);
                    }
                }

                miniThumbsElSwiper.on("slideChange", function () {
                    $(miniThumbnailsSwiperEl).find(".load-more-text").hide();
                });
                //________________________||_________________________\\
            });

        // Handle Close
        galleryPopupModalEl
            .find(".handle-close")
            .off("click")
            .on("click", () => {
                galleryPopupModalEl.attr("aria-expanded", "false");
                $("body").css("overflow", "auto");
                galleryPopupModalEl.fadeOut(200);
            });
    },

    initFilterScriptScripts: function () {
        const filterSectionWrapper = $("#change-filters-wrapper");
        const defaultFilterData = JSON.parse(
            filterSectionWrapper.attr("data-filters")
        );
        const closeFilterBtn = filterSectionWrapper.find(
            '[data-select="close-filter-btn"]'
        );
        const changeFilterButtonEl = $('[data-id="change-filter-button-el"]');

        const setFilterValues = (type, data) => {
            const renderJsonData = (type, value = null) => {
                var data = {};
                if (type != "reset") {
                    var data = JSON.parse(
                        filterSectionWrapper.attr("data-filters")
                    );
                    data[type] = value;
                }

                // Remove undefined or null properties
                for (var key in data) {
                    if (
                        data[key] === undefined ||
                        data[key] === null ||
                        (Array.isArray(data[key]) && data[key].length === 0)
                    ) {
                        delete data[key];
                    }
                }

                filterSectionWrapper.attr("data-filters", JSON.stringify(data));
            };
            switch (type) {
                case "check-in":
                    {
                        renderJsonData("check-in", data);
                    }
                    break;
                case "check-out":
                    {
                        renderJsonData("check-out", data);
                    }
                    break;
                case "adults":
                    {
                        renderJsonData("adults", data);
                    }
                    break;
                case "rooms":
                    {
                        renderJsonData("rooms", data);
                    }
                    break;

                default:
                    break;
            }
        };

        const initCheckoutCheckInScripts = () => {
            const checkoutCheckInWrapper = filterSectionWrapper.find(
                '[data-id="checkout-and-checkin-filter"]'
            );

            const toggleCalenderBtnEl = checkoutCheckInWrapper.find(
                'button[data-id="toggle-calender-btn"]'
            );

            const calenderWrapperEl = checkoutCheckInWrapper.find(
                '[data-id="calender-selector-wrapper"]'
            );

            const checkInEl = $('[data-id="check-in"]');
            const checkOutEl = $('[data-id="check-out"]');
            // const dateInputWrapper = $("#{{ $id }}  #date-inputs-wrapper");
            // const dateSelectorWrapper = $("#{{ $id }}  #date-selector-wrapper");

            // const searchParams1 = new URLSearchParams(location.search);
            // console.log(searchParams1.get("check-in"));
            // default active check-in checkout date
            const defaultSelectedDates =
                defaultFilterData["check-in"] && defaultFilterData["check-out"]
                    ? {
                          checkIn: moment(
                              defaultFilterData["check-in"],
                              "MM/DD/YYYY"
                          ),
                          checkOut: moment(
                              defaultFilterData["check-out"],
                              "MM/DD/YYYY"
                          ),
                      }
                    : null;

            // _________________(Callbacks)_________________//
            const handleOpenDropdown = () => {
                calenderWrapperEl.addClass("calender-showing");
                calenderWrapperEl.slideDown(200);
            };
            const handleHideDropdown = () => {
                calenderWrapperEl.removeClass("calender-showing");
                calenderWrapperEl.slideUp(200);
            };

            const calendar = new VanillaCalendar(
                checkoutCheckInWrapper.find('[data-id="calendar"]')[0],
                // checkoutCheckInWrapper.find("#calender")[0],
                {
                    type: "multiple",
                    settings: {
                        range: {
                            disablePast: true,
                        },
                        selection: {
                            day: "multiple-ranged",
                        },
                        selected: {
                            dates: defaultSelectedDates
                                ? [
                                      `${defaultSelectedDates.checkIn.format(
                                          "YYYY-MM-DD"
                                      )}:${defaultSelectedDates.checkOut.format(
                                          "YYYY-MM-DD"
                                      )}`,
                                  ]
                                : [],
                        },
                        visibility: {
                            daysOutside: false,
                            weekend: false,
                            theme: "light",
                        },
                    },

                    actions: {
                        clickDay(event, dates) {
                            const sortedDates = dates.sort(
                                (a, b) => +new Date(a) - +new Date(b)
                            );
                            if (sortedDates.length > 1) {
                                const firstDate = moment(sortedDates[0]);
                                const lastDate = moment(
                                    sortedDates[sortedDates.length - 1]
                                );

                                checkInEl.text(
                                    firstDate.format("ddd, DD/MM/YY")
                                );
                                checkOutEl.text(
                                    lastDate.format("ddd, DD/MM/YY")
                                );
                                setFilterValues(
                                    "check-in",
                                    firstDate.format("MM/DD/YYYY")
                                );
                                setFilterValues(
                                    "check-out",
                                    lastDate.format("MM/DD/YYYY")
                                );

                                handleHideDropdown();
                            } else if (sortedDates.length == 1) {
                                const firstDate = moment(sortedDates[0]);
                                checkInEl.text(
                                    firstDate.format("ddd, DD/MM/YY")
                                );
                                checkOutEl.text("Check Out");
                            } else {
                                checkInEl.text("Check In");
                                checkOutEl.text("Check Out");
                            }
                        },
                    },
                }
            );
            calendar.init();

            // render default selected
            if (defaultSelectedDates) {
                checkInEl.text(
                    defaultSelectedDates.checkIn.format("ddd, DD/MM/YY")
                );
                checkOutEl.text(
                    defaultSelectedDates.checkOut.format("ddd, DD/MM/YY")
                );
            }
            // -------------------- Events -------------------- \\

            toggleCalenderBtnEl.on("click", function (event) {
                // event.stopImmediatePropagation();
                if (calenderWrapperEl.hasClass("calender-showing")) {
                    handleHideDropdown();
                } else {
                    handleOpenDropdown();
                }
            });

            calenderWrapperEl
                .find(".close-dropdown-btn")
                .on("click", function (event) {
                    handleHideDropdown();
                });
        };

        const intiGuestAndRoomsFilterScripts = () => {
            const guestAndRoomsFilterWrapperEl = filterSectionWrapper.find(
                '[data-id="guest-and-rooms-filter"]'
            );
            const adultMinusEl = guestAndRoomsFilterWrapperEl.find(
                '[data-id="adult-minus"]'
            );
            const adultCountEl = guestAndRoomsFilterWrapperEl.find(
                '[data-id="adult-count"]'
            );
            const adultPlusEl = guestAndRoomsFilterWrapperEl.find(
                '[data-id="adult-plus"]'
            );
            const roomsMinusEl = guestAndRoomsFilterWrapperEl.find(
                '[data-id="rooms-minus"]'
            );
            const roomsCountEl = guestAndRoomsFilterWrapperEl.find(
                '[data-id="rooms-count"]'
            );
            const roomsPlusEl = guestAndRoomsFilterWrapperEl.find(
                '[data-id="rooms-plus"]'
            );

            // -------------------- Handlers -------------------- \\
            const setAdultCount = (count) => {
                const pCount = parseInt(count);
                adultCountEl.text(pCount);
                setFilterValues("adults", pCount);
                console.log(pCount);
                if (1 >= pCount) {
                    adultMinusEl.attr("disabled", "disabled");
                } else {
                    adultMinusEl.removeAttr("disabled");
                }
            };
            const setRoomCount = (count) => {
                const pCount = parseInt(count);
                roomsCountEl.text(pCount);
                setFilterValues("rooms", pCount);
                if (1 >= pCount) {
                    roomsMinusEl.attr("disabled", "disabled");
                } else {
                    roomsMinusEl.removeAttr("disabled");
                }
            };

            // -------------------- actions -------------------- \\
            adultCountEl.text(defaultFilterData["adults"]);
            roomsCountEl.text(defaultFilterData["rooms"]);

            // -------------------- events -------------------- \\
            adultPlusEl.on("click", function (event) {
                const pCount = parseInt(adultCountEl.text());
                setAdultCount(pCount + 1);
            });
            adultMinusEl.on("click", function (event) {
                const pCount = parseInt(adultCountEl.text());
                setAdultCount(pCount - 1);
            });
            roomsPlusEl.on("click", function (event) {
                const pCount = parseInt(roomsCountEl.text());
                setRoomCount(pCount + 1);
            });
            roomsMinusEl.on("click", function (event) {
                const pCount = parseInt(roomsCountEl.text());
                setRoomCount(pCount - 1);
            });
        };

        // --------------- (Apply filters) ------------------ \\
        filterSectionWrapper
            .find('[data-select="apply-btn"]')
            .on("click", () => {
                const data = JSON.parse(
                    filterSectionWrapper.attr("data-filters")
                );

                function buildQueryString(params) {
                    var queryString = "";
                    for (var key in params) {
                        if (Array.isArray(params[key])) {
                            for (var i = 0; i < params[key].length; i++) {
                                queryString +=
                                    encodeURIComponent(key + "[]") +
                                    "=" +
                                    encodeURIComponent(params[key][i]) +
                                    "&";
                            }
                        } else {
                            queryString +=
                                encodeURIComponent(key) +
                                "=" +
                                encodeURIComponent(params[key]) +
                                "&";
                        }
                    }
                    // Remove the trailing '&' character
                    queryString = queryString.slice(0, -1);
                    return queryString;
                }

                window.location = `?${buildQueryString(data)}`;

                // hide filter
                // const moreFiltersWrapperEl = filterSectionWrapper.find(
                //     '[data-id="more-filters-wrapper"]'
                // );
                // moreFiltersWrapperEl.removeClass("slide-down").fadeOut(200);
                // if (this.isMobileScreen) $("body").css("overflow", "auto");
            });

        changeFilterButtonEl.on("click", () => {
            filterSectionWrapper.fadeIn(200);
            $("body").css("overflow", "hidden");
        });

        closeFilterBtn.on("click", () => {
            filterSectionWrapper.fadeOut(200);
            $("body").css("overflow", "auto");
        });

        intiGuestAndRoomsFilterScripts();
        initCheckoutCheckInScripts();
    },

    inputGoogleMapPopupScripts: function () {
        const mapPopupBtnEl = $("#open-map-popup");
        const mapPopupEl = $("#map-popup-wrapper");
        const closeMapPopupEl = mapPopupEl.find(
            '[data-select="close-filter-btn"]'
        );

        mapPopupBtnEl.on("click", () => {
            mapPopupEl.fadeIn(200);
            $("body").css("overflow", "hidden");
        });

        closeMapPopupEl.on("click", () => {
            mapPopupEl.fadeOut(200);
            $("body").css("overflow", "auto");
        });
    },

    init() {
        $(document).ready(() => {
            this.initThumbnailSlidersScripts();
            this.initGalleryScroll();
            this.initPopupGalleryScripts();
            this.initFilterScriptScripts();
            this.inputGoogleMapPopupScripts();
        });
    },
};
