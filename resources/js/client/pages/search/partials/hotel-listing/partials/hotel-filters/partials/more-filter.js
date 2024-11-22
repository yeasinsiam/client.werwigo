export default {
    init() {
        const handle = () => {
            const isMobileScreen = window.innerWidth < 640;
            const wrapperEl = $("#hotel-listing-more-filter");
            const dropdownEl = $(
                '#hotel-listing-more-filter  [data-id="dropdown"]'
            );
            // const resetEl = $('#hotel-listing-more-filter  [data-id="reset-btn"]')
            const selectionEl = $(
                '#hotel-listing-more-filter  [data-id="selection"]'
            );
            // _________________(Callbacks)_________________//
            const handleOpenDropdown = () => {
                wrapperEl.addClass("opened");
                dropdownEl.fadeIn(200);
            };
            const handleHideDropdown = () => {
                wrapperEl.removeClass("opened");
                dropdownEl.fadeOut(200);
            };

            const handleToggleDropdown = () => {
                if (wrapperEl.hasClass("opened")) {
                    handleHideDropdown();
                } else {
                    handleOpenDropdown();
                }
            };

            const handleResetAllValues = () => {
                // Reset (Booking Type)
                wrapperEl
                    .find(
                        '[data-id="booking-type-filter"] input[type="checkbox"]'
                    )
                    .prop("checked", false);

                // Reset (Categories)
                wrapperEl
                    .find(
                        '[data-id="categories-filter"] input[type="checkbox"]'
                    )
                    .prop("checked", false);
                // Reset (Tags)
                wrapperEl
                    .find('[data-id="tags-filter"] input[type="checkbox"]')
                    .prop("checked", false);
                wrapperEl
                    .find('[data-id="amenities-filter"] input[type="checkbox"]')
                    .prop("checked", false);

                // wrapperEl.removeClass('selected');
            };

            const handleApply = () => {
                // Apply (Booking Type)
                const allBookingTypeCheckedCheckbox = wrapperEl.find(
                    '[data-id="booking-type-filter"] input[type="checkbox"]:checked'
                );

                // Apply (Categories)
                const allCategoriesCheckedCheckbox = wrapperEl.find(
                    '[data-id="categories-filter"] input[type="checkbox"]:checked'
                );
                // Apply (Tags)
                const allTagsCheckedCheckbox = wrapperEl.find(
                    '[data-id="tags-filter"] input[type="checkbox"]:checked'
                );
                // Apply (Amenities)
                const allAmenitiesCheckedCheckbox = wrapperEl.find(
                    '[data-id="amenities-filter"] input[type="checkbox"]:checked'
                );

                if (
                    allBookingTypeCheckedCheckbox.length ||
                    allCategoriesCheckedCheckbox.length ||
                    allTagsCheckedCheckbox.length ||
                    allAmenitiesCheckedCheckbox.length
                ) {
                    selectionEl
                        .find("span")
                        .text(
                            allBookingTypeCheckedCheckbox.length +
                                allCategoriesCheckedCheckbox.length +
                                allTagsCheckedCheckbox.length +
                                allAmenitiesCheckedCheckbox.length
                        );

                    wrapperEl.addClass("selected");
                } else {
                    wrapperEl.removeClass("selected");
                    // handleResetAllValues();
                }

                if (typeof livewire !== "undefined") {
                    livewire.emit("filter-hotel-more", {
                        booking_type: allBookingTypeCheckedCheckbox
                            .map(function () {
                                return $(this).val();
                            }, [])
                            .get(),

                        categories: allCategoriesCheckedCheckbox
                            .map(function () {
                                return $(this).val();
                            }, [])
                            .get(),
                        tags: allTagsCheckedCheckbox
                            .map(function () {
                                return $(this).val();
                            }, [])
                            .get(),
                        amenities: allAmenitiesCheckedCheckbox
                            .map(function () {
                                return $(this).val();
                            }, [])
                            .get(),
                    });
                    // livewire.emit("filter-hotel-more", {
                    //     for: "booking_type",
                    //     values: allBookingTypeCheckedCheckbox
                    //         .map(function () {
                    //             return $(this).val();
                    //         }, [])
                    //         .get(),
                    // });
                }

                if (!isMobileScreen) {
                    handleHideDropdown();
                }
            };

            const setDefaultSelected = () => {
                const searchParams = new URLSearchParams(location.search);

                // (Booking Type)
                const booking_type = Array.from(searchParams.keys())
                    .filter((key) => key.startsWith("booking_type["))
                    .map((key) => searchParams.get(key));

                if (booking_type.length) {
                    wrapperEl
                        .find(
                            '[data-id="booking-type-filter"] input[type="checkbox"]'
                        )
                        .each((index, el) => {
                            if (booking_type.includes($(el).val())) {
                                $(el).prop("checked", true);
                            }
                        });
                }
                // (Categories)
                const categories = Array.from(searchParams.keys())
                    .filter((key) => key.startsWith("categories["))
                    .map((key) => searchParams.get(key));

                if (categories.length) {
                    wrapperEl
                        .find(
                            '[data-id="categories-filter"] input[type="checkbox"]'
                        )
                        .each((index, el) => {
                            if (categories.includes($(el).val())) {
                                $(el).prop("checked", true);
                            }
                        });
                }

                // (Tags)
                const tags = Array.from(searchParams.keys())
                    .filter((key) => key.startsWith("tags["))
                    .map((key) => searchParams.get(key));

                if (tags.length) {
                    wrapperEl
                        .find('[data-id="tags-filter"] input[type="checkbox"]')
                        .each((index, el) => {
                            if (tags.includes($(el).val())) {
                                $(el).prop("checked", true);
                            }
                        });
                }
                // (Amenities)
                const amenities = Array.from(searchParams.keys())
                    .filter((key) => key.startsWith("amenities["))
                    .map((key) => searchParams.get(key));

                if (amenities.length) {
                    wrapperEl
                        .find(
                            '[data-id="amenities-filter"] input[type="checkbox"]'
                        )
                        .each((index, el) => {
                            if (amenities.includes($(el).val())) {
                                $(el).prop("checked", true);
                            }
                        });
                }

                if (
                    booking_type.length ||
                    categories.length ||
                    tags.length ||
                    amenities.length
                ) {
                    selectionEl
                        .find("span")
                        .text(
                            booking_type.length +
                                categories.length +
                                tags.length +
                                amenities.length
                        );

                    wrapperEl.addClass("selected");
                }

                // selectionEl.find("span").text(booking_type.length);
                // wrapperEl.addClass("selected");

                // handleHideDropdown();
            };

            // -------------------- Actions -------------------- \\
            setDefaultSelected();
            // -------------------- Events -------------------- \\

            // $(document).on('mouseenter', '#hotel-listing-more-filter', function(event) {
            //     event.stopPropagation();
            //     handleOpenDropdown();
            // });
            // $(document).on('mouseleave', '#hotel-listing-more-filter', function(event) {
            //     event.stopPropagation();
            //     handleHideDropdown();
            // });

            $('#hotel-listing-more-filter  [data-id="label"]').on(
                "click",
                function (event) {
                    // event.stopPropagation();
                    handleToggleDropdown();
                }
            );

            $("body").on("click", function (event) {
                const modal = $("#hotel-listing-more-filter");

                if (
                    !modal.is(event.target) &&
                    !modal.has(event.target).length
                ) {
                    if (!isMobileScreen) handleHideDropdown();
                    setDefaultSelected();
                }
            });

            $('#hotel-listing-more-filter [data-id="reset-btn"]').on(
                "click",
                function (event) {
                    // event.stopPropagation();
                    handleResetAllValues();
                }
            );

            $('#hotel-listing-more-filter [data-id="apply-btn"]').on(
                "click",
                function (event) {
                    // event.stopPropagation();
                    handleApply();
                }
            );

            window.addEventListener("hotel-listing-filter-reseted", (event) => {
                wrapperEl.removeClass("selected");
                handleResetAllValues();
            });

            $('#hotel-listing-more-filter input[type="checkbox"]').on(
                "change",
                () => {
                    if (isMobileScreen) {
                        handleApply();
                    }
                }
            );
        };

        $(document).ready(handle);
    },
};
