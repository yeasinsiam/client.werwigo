import { debounce, fetchAutocompleteSuggestions } from "../../utils/helper";

export default {
    isMobileScreen: window.innerWidth < 640,
    // isSearchPage: location.pathname == "/search",
    isSearchPage: true,

    setFilterValues: function (type, data, withCountDisplay = false) {
        switch (type) {
            case "romantic-scoring":
                {
                    const { from, to } = data;
                    if (from != 1 || to != 10) {
                        this.renderJsonData(
                            "romantic-scoring-from",
                            from,
                            withCountDisplay
                        );
                        this.renderJsonData(
                            "romantic-scoring-to",
                            to,
                            withCountDisplay
                        );
                    } else {
                        this.renderJsonData(
                            "romantic-scoring-from",
                            null,
                            withCountDisplay
                        );
                        this.renderJsonData(
                            "romantic-scoring-to",
                            null,
                            withCountDisplay
                        );
                    }
                }
                break;

            case "intimate-scoring":
                {
                    const { from, to } = data;

                    if (from != 1 || to != 10) {
                        this.renderJsonData(
                            "intimate-scoring-from",
                            from,
                            withCountDisplay
                        );
                        this.renderJsonData(
                            "intimate-scoring-to",
                            to,
                            withCountDisplay
                        );
                    } else {
                        this.renderJsonData(
                            "intimate-scoring-from",
                            null,
                            withCountDisplay
                        );
                        this.renderJsonData(
                            "intimate-scoring-to",
                            null,
                            withCountDisplay
                        );
                    }
                }
                break;

            case "luxurious-scoring":
                {
                    const { from, to } = data;
                    if (from != 1 || to != 10) {
                        this.renderJsonData(
                            "luxurious-scoring-from",
                            from,
                            withCountDisplay
                        );
                        this.renderJsonData(
                            "luxurious-scoring-to",
                            to,
                            withCountDisplay
                        );
                    } else {
                        this.renderJsonData(
                            "luxurious-scoring-from",
                            null,
                            withCountDisplay
                        );
                        this.renderJsonData(
                            "luxurious-scoring-to",
                            null,
                            withCountDisplay
                        );
                    }
                }
                break;

            // case "booking-type":
            //     {
            //         this.renderJsonData("booking-type", data,withCountDisplay);
            //     }
            //     break;
            case "category":
                {
                    this.renderJsonData("category", data, withCountDisplay);
                }
                break;
            case "tags":
                {
                    this.renderJsonData("tags", data, withCountDisplay);
                }
                break;
            case "amenities":
                {
                    this.renderJsonData("amenities", data, withCountDisplay);
                }
                break;
            case "query":
                {
                    this.renderJsonData("query", data, withCountDisplay);
                }
                break;
            case "google-rating":
                {
                    this.renderJsonData(
                        "google-rating",
                        data,
                        withCountDisplay
                    );
                }
                break;
            case "check-in":
                {
                    this.renderJsonData("check-in", data, withCountDisplay);
                }
                break;
            case "check-out":
                {
                    this.renderJsonData("check-out", data, withCountDisplay);
                }
                break;
            case "adults":
                {
                    this.renderJsonData("adults", data, withCountDisplay);
                }
                break;
            case "rooms":
                {
                    this.renderJsonData("rooms", data, withCountDisplay);
                }
                break;

            case "active-sort":
                {
                    this.renderJsonData("active-sort", data, withCountDisplay);
                }
                break;
            case "rating-from":
                {
                    this.renderJsonData("rating-from", data, withCountDisplay);
                }
                break;
            case "rating-to":
                {
                    this.renderJsonData("rating-to", data, withCountDisplay);
                }
                break;

            default:
                break;
        }
    },

    renderFilterActive: function (withCountDisplay = true) {
        const filterSectionWrapper = $("#hotel-filters-section");
        const data = JSON.parse(filterSectionWrapper.attr("data-filters"));

        let activeCount = 0;

        if (
            (data["romantic-scoring-from"] &&
                data["romantic-scoring-from"] != 1) ||
            (data["romantic-scoring-to"] && data["romantic-scoring-to"] != 10)
        ) {
            activeCount++;
        }
        if (
            (data["intimate-scoring-from"] &&
                data["intimate-scoring-from"] != 1) ||
            (data["intimate-scoring-to"] && data["intimate-scoring-to"] != 10)
        ) {
            activeCount++;
        }
        if (
            (data["luxurious-scoring-from"] &&
                data["luxurious-scoring-from"] != 1) ||
            (data["luxurious-scoring-to"] && data["luxurious-scoring-to"] != 10)
        ) {
            activeCount++;
        }

        // if (data["booking-type"]?.length) activeCount++;
        if (data["category"]) activeCount++;
        if (data["tags"]?.length) activeCount++;
        if (data["amenities"]?.length) activeCount++;
        if (data["query"]) activeCount++;
        if (data["google-rating"]) {
            activeCount++;
        }
        if (data["active-sort"] && data["active-sort"] != "from-recent") {
            activeCount++;
        }
        if (
            (data["rating-from"] && data["rating-from"] != 1) ||
            (data["rating-to"] && data["rating-to"] != 10)
        ) {
            activeCount++;
        }

        // Note:: no need for adult and rooms & checkout and check-in
        // if (data["check-in"] && data["check-out"]) {
        //     activeCount++;
        // }

        if (activeCount) {
            $('[data-select="reset-btn"]').fadeIn(100);
            if (withCountDisplay) {
                $('[data-id="active-filter-count"]')
                    .fadeIn(100)
                    .text(`(${activeCount})`);
            }
        } else {
            if (withCountDisplay)
                $('[data-id="active-filter-count"]').fadeOut(100).text("");
            $('[data-select="reset-btn"]').fadeOut(100);
        }
    },

    renderJsonData: function (type, value = null, withCountDisplay = false) {
        const filterSectionWrapper = $("#hotel-filters-section");

        var data = {};
        if (type != "reset") {
            var data = JSON.parse(filterSectionWrapper.attr("data-filters"));
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
        // Set active Count
        this.renderFilterActive(withCountDisplay);
    },

    // setFilterValues: function (data) {},

    handleResetFilteredData: function () {
        const filterSectionWrapper = $("#hotel-filters-section");

        this.renderJsonData("reset");
        this.renderFilterActive();

        if (this.isSearchPage) {
            livewire.emit("reset-all-filters");
        }
        $("body").trigger("reset-all-filters");
        $('[data-select="reset-btn"]').fadeOut(100);
    },

    handleInitScripts: function () {
        const $this = this;
        const searchParams = new URLSearchParams(location.search);
        const filterSectionWrapper = $("#hotel-filters-section");
        const defaultFilterData = JSON.parse(
            filterSectionWrapper.attr("data-filters")
        );

        this.renderFilterActive();

        //------------------------ ( Search Code ) -----------\\
        const initSearchScripts = () => {
            const searchWrapperEl = filterSectionWrapper.find(
                '[data-id="hotel-search-filter-wrapper"]'
            );
            const searchSuggestionEl = searchWrapperEl.find(
                '[data-id="search-suggestion"]'
            );
            const searchInputEl = searchWrapperEl.find("input");
            const removeSearchEl = searchWrapperEl.find(
                '[data-id="remove-search"]'
            );
            const searchArrowDown = searchWrapperEl.find(
                '[data-id="search-down-arrow"]'
            );

            const autoComplectSuggestionSuccessCallback = (datas) => {
                if (searchInputEl.is(":focus")) {
                    if (datas.length) {
                        let html = ``;

                        datas.forEach((data) => {
                            html += `<li data-id="address" class="text-sm text-[#5B5B5B] py-1 px-2 cursor-pointer hover:text-[#000000]" tabindex="-1">${data.address}</li> `;
                        });

                        searchSuggestionEl.find("ul").html(html);
                    } else {
                        searchSuggestionEl
                            .find("ul")
                            .html(
                                `<li class="px-2 py-1 text-xs text-gray-400 cursor-pointer " tabindex="-1">No results.</li>`
                            );
                    }
                    searchSuggestionEl.fadeIn(200);
                } else {
                    searchSuggestionEl
                        .find("ul")
                        .html(
                            `<li class="px-2 py-1 text-xs text-gray-400 cursor-pointer " tabindex="-1">No results.</li>`
                        );
                    // searchSuggestionEl.fadeOut(200);
                }
            };

            if (searchParams.get("query")) {
                searchInputEl.val(searchParams.get("query"));
                removeSearchEl.show();
                searchArrowDown.hide();
            }

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                if (newSearchParams.get("query")) {
                    searchInputEl.val(newSearchParams.get("query"));
                    removeSearchEl.show();
                    searchArrowDown.hide();
                } else {
                    searchInputEl.val("");
                    removeSearchEl.hide();
                    searchArrowDown.show();
                }
            });

            searchInputEl.on(
                "input",
                debounce((event) => {
                    var query = event.target.value;
                    if (query) {
                        $this.setFilterValues("query", query);
                        fetchAutocompleteSuggestions(
                            query,
                            autoComplectSuggestionSuccessCallback
                        );
                    } else {
                        searchSuggestionEl.fadeOut(200);
                        $this.setFilterValues("query", "");
                    }
                    // if (query) {
                    //     $('#hotel-filters-section [data-id="hotel-search-filter-wrapper"] [data-id="remove-search"]').show();
                    // } else {
                    //     $('#hotel-filters-section [data-id="hotel-search-filter-wrapper"] [data-id="remove-search"]').hide();

                    // }
                }, 300)
            );

            // document
            //     .querySelector("#hotel-filters-section [data-id="hotel-search-filter-wrapper"] input")
            //     .addEventListener(
            //         "input",

            //     );

            searchInputEl.on("focus", function () {
                if ($(this).val())
                    fetchAutocompleteSuggestions(
                        $(this).val(),
                        autoComplectSuggestionSuccessCallback
                    );
            });

            searchInputEl.on("focusout", () => {
                searchSuggestionEl.fadeOut(200);
            });

            $("body").on(
                "click",
                '#hotel-filters-section [data-id="hotel-search-filter-wrapper"] [data-id="search-suggestion"] [data-id="address"]',
                function () {
                    const searchText = $(this).text();
                    searchInputEl.val(searchText);

                    $this.setFilterValues("query", searchText);

                    // if (!$this.isSearchPage) {
                    //     window.location = `/search?query=${sugText}`;
                    // } else {
                    //     livewire.emit("filter-query", sugText);
                    // }

                    //     livewire.emit("filter-query", sugText);

                    removeSearchEl.fadeIn(100);
                    searchArrowDown.hide();
                }
            );

            removeSearchEl.on("click", function () {
                searchInputEl.val("");
                $this.setFilterValues("query", "");

                // if ($this.isSearchPage) {
                //     livewire.emit("filter-query", "");
                // }
                $(this).hide();
                searchArrowDown.fadeIn(200);
            });

            $("body").on("reset-all-filters", function (event, value) {
                searchInputEl.val("");
                removeSearchEl.hide();
                searchArrowDown.fadeIn(100);
            });

            // $("body").on("click", "#hotel-search-btn", (e) => {
            //     const input = $("#hotel-filters-section [data-id="hotel-search-filter-wrapper"] input");
            //     if (!input.val()) {
            //         e.preventDefault();
            //         input.focus();
            //     }
            // });
        };

        const initFilterSlideDowns = () => {
            const showFilterEl = $('[data-select="show-filter"]');

            const moreFiltersWrapperEl = filterSectionWrapper.find(
                '[data-id="more-filters-wrapper"]'
            );

            const closeFilterBtn = filterSectionWrapper.find(
                '[data-id="more-filters-wrapper"] [data-select="close-filter-btn"]'
            );

            showFilterEl.on("click", function () {
                if (moreFiltersWrapperEl.hasClass("slide-down")) {
                    moreFiltersWrapperEl.removeClass("slide-down").fadeOut(200);
                    $("body").css("overflow", "auto");
                } else {
                    moreFiltersWrapperEl.addClass("slide-down").fadeIn(200);
                    $("body").css("overflow", "hidden");
                }

                return false;
            });

            closeFilterBtn.on("click", () => {
                moreFiltersWrapperEl.removeClass("slide-down").fadeOut(200);
                $("body").css("overflow", "auto");
            });

            // Outside Click
            // $("body").on("click", function (event) {
            //     const modal = moreFiltersWrapperEl;
            //     const modalTwo = $('[data-id="calender-selector-wrapper"]');

            //     // console.log(
            //     //     modalTwo.has(event.target),
            //     //     modalTwo.is(event.target)
            //     // );

            //     if (
            //         !modal.is(event.target) &&
            //         !modal.has(event.target).length &&
            //         modalTwo.is(event.target) &&
            //         modalTwo.has(event.target).length
            //     ) {
            //         console.log("asdf");
            //         moreFiltersWrapperEl.removeClass("slide-down").fadeOut(200);
            //     }
            // });
        };

        const initRomanticFilterScripts = () => {
            const ionRangeSliderWrapper = filterSectionWrapper.find(
                '[data-id="romantic-scoring-filter"]'
            );

            const setActive = (from, to) => {
                if (from > 1 || to < 10) {
                    ionRangeSliderWrapper.find(".irs-bar").addClass("active");

                    ionRangeSliderWrapper
                        .find(".irs-handle.from")
                        .addClass("active");
                    ionRangeSliderWrapper
                        .find(".irs-handle.to")
                        .addClass("active");
                } else {
                    ionRangeSliderWrapper
                        .find(".irs-bar")
                        .removeClass("active");

                    ionRangeSliderWrapper
                        .find(".irs-handle.from")
                        .removeClass("active");
                    ionRangeSliderWrapper
                        .find(".irs-handle.to")
                        .removeClass("active");
                }
            };

            const ionRangeSlider = ionRangeSliderWrapper
                .find("input")
                .ionRangeSlider({
                    type: "double",
                    skin: "big",
                    from: defaultFilterData["romantic-scoring-from"] || 1,
                    to: defaultFilterData["romantic-scoring-to"] || 10,
                    min: 1,
                    max: 10,
                    hide_min_max: true,
                    hide_from_to: false,
                    extra_classes: "slider-container",
                    onFinish: function (data) {
                        const { from, to } = data;

                        $this.setFilterValues("romantic-scoring", {
                            from,
                            to,
                        });

                        setActive(from, to);
                    },
                });

            setActive(
                defaultFilterData["romantic-scoring-from"],
                defaultFilterData["romantic-scoring-to"]
            );

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                const romanticScoringFrom = newSearchParams.get(
                    "romantic-scoring-from"
                );

                let from = 1,
                    to = 10;

                if (
                    romanticScoringFrom &&
                    romanticScoringFrom >= 1 &&
                    romanticScoringFrom <= 10
                ) {
                    ionRangeSlider.data("ionRangeSlider").update({
                        from: romanticScoringFrom,
                    });
                    from = romanticScoringFrom;
                } else {
                    ionRangeSlider.data("ionRangeSlider").update({
                        from: 1,
                    });
                }
                // -------------------------
                const romanticScoringTo = newSearchParams.get(
                    "romantic-scoring-to"
                );

                if (
                    romanticScoringTo &&
                    romanticScoringTo >= 1 &&
                    romanticScoringTo <= 10
                ) {
                    ionRangeSlider.data("ionRangeSlider").update({
                        to: romanticScoringTo,
                    });
                    to = romanticScoringTo;
                } else {
                    ionRangeSlider.data("ionRangeSlider").update({
                        to: 10,
                    });
                }

                $this.setFilterValues("romantic-scoring", {
                    from,
                    to,
                });
                this.renderFilterActive();
                setActive(from, to);
            });

            $("body").on("reset-all-filters", function (event, value) {
                ionRangeSlider.data("ionRangeSlider").update({
                    from: 1,
                    to: 10,
                });
            });
        };
        const initIntimateFilterScripts = () => {
            const ionRangeSliderWrapper = filterSectionWrapper.find(
                '[data-id="intimate-scoring-filter"]'
            );

            const setActive = (from, to) => {
                if (from > 1 || to < 10) {
                    ionRangeSliderWrapper.find(".irs-bar").addClass("active");

                    ionRangeSliderWrapper
                        .find(".irs-handle.from")
                        .addClass("active");
                    ionRangeSliderWrapper
                        .find(".irs-handle.to")
                        .addClass("active");
                } else {
                    ionRangeSliderWrapper
                        .find(".irs-bar")
                        .removeClass("active");

                    ionRangeSliderWrapper
                        .find(".irs-handle.from")
                        .removeClass("active");
                    ionRangeSliderWrapper
                        .find(".irs-handle.to")
                        .removeClass("active");
                }
            };

            const ionRangeSlider = ionRangeSliderWrapper
                .find("input")
                .ionRangeSlider({
                    type: "double",
                    skin: "big",
                    from: defaultFilterData["intimate-scoring-from"] || 1,
                    to: defaultFilterData["intimate-scoring-to"] || 10,
                    min: 1,
                    max: 10,
                    hide_min_max: true,
                    hide_from_to: false,
                    extra_classes: "slider-container",
                    onFinish: function (data) {
                        const { from, to } = data;
                        $this.setFilterValues("intimate-scoring", {
                            from,
                            to,
                        });

                        setActive(from, to);
                    },
                });

            setActive(
                defaultFilterData["intimate-scoring-from"],
                defaultFilterData["intimate-scoring-to"]
            );

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                const intimateScoringFrom = newSearchParams.get(
                    "intimate-scoring-from"
                );

                let from = 1,
                    to = 10;

                if (
                    intimateScoringFrom &&
                    intimateScoringFrom >= 1 &&
                    intimateScoringFrom <= 10
                ) {
                    ionRangeSlider.data("ionRangeSlider").update({
                        from: intimateScoringFrom,
                    });
                    from = intimateScoringFrom;
                } else {
                    ionRangeSlider.data("ionRangeSlider").update({
                        from: 1,
                    });
                }
                // -------------------------
                const intimateScoringTo = newSearchParams.get(
                    "intimate-scoring-to"
                );

                if (
                    intimateScoringTo &&
                    intimateScoringTo >= 1 &&
                    intimateScoringTo <= 10
                ) {
                    ionRangeSlider.data("ionRangeSlider").update({
                        to: intimateScoringTo,
                    });
                    to = intimateScoringTo;
                } else {
                    ionRangeSlider.data("ionRangeSlider").update({
                        to: 10,
                    });
                }

                $this.setFilterValues("intimate-scoring", {
                    from,
                    to,
                });
                this.renderFilterActive();
                setActive(from, to);
            });

            $("body").on("reset-all-filters", function (event, value) {
                ionRangeSlider.data("ionRangeSlider").update({
                    from: 1,
                    to: 10,
                });
            });
        };
        const initLuxuriousFilterScripts = () => {
            const ionRangeSliderWrapper = filterSectionWrapper.find(
                '[data-id="luxurious-scoring-filter"]'
            );

            const setActive = (from, to) => {
                if (from > 1 || to < 10) {
                    ionRangeSliderWrapper.find(".irs-bar").addClass("active");

                    ionRangeSliderWrapper
                        .find(".irs-handle.from")
                        .addClass("active");
                    ionRangeSliderWrapper
                        .find(".irs-handle.to")
                        .addClass("active");
                } else {
                    ionRangeSliderWrapper
                        .find(".irs-bar")
                        .removeClass("active");

                    ionRangeSliderWrapper
                        .find(".irs-handle.from")
                        .removeClass("active");
                    ionRangeSliderWrapper
                        .find(".irs-handle.to")
                        .removeClass("active");
                }
            };

            const ionRangeSlider = ionRangeSliderWrapper
                .find("input")
                .ionRangeSlider({
                    type: "double",
                    skin: "big",
                    from: defaultFilterData["luxurious-scoring-from"] || 1,
                    to: defaultFilterData["luxurious-scoring-to"] || 10,
                    min: 1,
                    max: 10,
                    hide_min_max: true,
                    hide_from_to: false,
                    extra_classes: "slider-container",
                    onFinish: function (data) {
                        const { from, to } = data;
                        $this.setFilterValues("luxurious-scoring", {
                            from,
                            to,
                        });

                        setActive(from, to);
                    },
                });

            setActive(
                defaultFilterData["luxurious-scoring-from"],
                defaultFilterData["luxurious-scoring-to"]
            );

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                const luxuriousScoringFrom = newSearchParams.get(
                    "luxurious-scoring-from"
                );

                let from = 1,
                    to = 10;

                if (
                    luxuriousScoringFrom &&
                    luxuriousScoringFrom >= 1 &&
                    luxuriousScoringFrom <= 10
                ) {
                    ionRangeSlider.data("ionRangeSlider").update({
                        from: luxuriousScoringFrom,
                    });
                    from = luxuriousScoringFrom;
                } else {
                    ionRangeSlider.data("ionRangeSlider").update({
                        from: 1,
                    });
                }
                // ------------  -------------
                const luxuriousScoringTo = newSearchParams.get(
                    "luxurious-scoring-to"
                );

                if (
                    luxuriousScoringTo &&
                    luxuriousScoringTo >= 1 &&
                    luxuriousScoringTo <= 10
                ) {
                    ionRangeSlider.data("ionRangeSlider").update({
                        to: luxuriousScoringTo,
                    });
                    to = luxuriousScoringTo;
                } else {
                    ionRangeSlider.data("ionRangeSlider").update({
                        to: 10,
                    });
                }

                $this.setFilterValues("luxurious-scoring", {
                    from,
                    to,
                });
                this.renderFilterActive();
                setActive(from, to);
            });

            $("body").on("reset-all-filters", function (event, value) {
                ionRangeSlider.data("ionRangeSlider").update({
                    from: 1,
                    to: 10,
                });
            });
        };

        // const initBookingTypeFilterScripts = () => {
        //     const bookingTypeFilterEl = filterSectionWrapper.find(
        //         '[data-id="booking-type-filter"]'
        //     );

        //     if (defaultFilterData["booking-type"]?.length) {
        //         bookingTypeFilterEl
        //             .find('input[type="checkbox"]')
        //             .each((index, el) => {
        //                 if (
        //                     defaultFilterData["booking-type"].includes(
        //                         $(el).val()
        //                     )
        //                 ) {
        //                     $(el).prop("checked", true);
        //                 }
        //             });
        //     }

        //     $(window).on("popstate", () => {
        //         const newSearchParams = new URLSearchParams(location.search);
        //         const bookingType = Array.from(newSearchParams.entries())
        //             .filter(([key]) => key.startsWith("booking-type["))
        //             .map(([, value]) => value);

        //         if (bookingType?.length) {
        //             bookingTypeFilterEl
        //                 .find('input[type="checkbox"]')
        //                 .each((index, el) => {
        //                     if (bookingType.includes($(el).val())) {
        //                         $(el).prop("checked", true);
        //                     } else {
        //                         $(el).prop("checked", false);
        //                     }
        //                 });
        //         } else {
        //             bookingTypeFilterEl
        //                 .find('input[type="checkbox"]')
        //                 .each((index, el) => {
        //                     $(el).prop("checked", false);
        //                 });
        //         }

        //         // sync value
        //         const val = $(this).find("input").val();

        //         if (val == "all") {
        //             $this.setFilterValues("booking-type", []);
        //         } else {
        //             const inputCheckedValue = bookingTypeFilterEl
        //                 .find('input[type="checkbox"]:checked')
        //                 .map(function () {
        //                     return $(this).val();
        //                 }, [])
        //                 .get();
        //             $this.setFilterValues("booking-type", inputCheckedValue);
        //         }

        //         this.renderFilterActive();
        //     });

        //     bookingTypeFilterEl.find("label").on("change", function () {
        //         const val = $(this).find("input").val();

        //         if (val == "all") {
        //             bookingTypeFilterEl.find("input").each(function (i, e) {
        //                 if ($(e).val() != "all") {
        //                     $(e).prop("checked", false);
        //                 }
        //             });
        //             $this.setFilterValues("booking-type", []);
        //         } else {
        //             bookingTypeFilterEl.find("input").each(function (i, e) {
        //                 if ($(e).val() == "all") {
        //                     $(e).prop("checked", false);
        //                 }
        //             });
        //             const inputCheckedValue = bookingTypeFilterEl
        //                 .find('input[type="checkbox"]:checked')
        //                 .map(function () {
        //                     return $(this).val();
        //                 }, [])
        //                 .get();
        //             $this.setFilterValues("booking-type", inputCheckedValue);
        //         }
        //     });

        //     $("body").on("reset-all-filters", function (event, value) {
        //         bookingTypeFilterEl.find("input").prop("checked", false);
        //     });
        // };
        const initCategoriesFilterScripts = () => {
            const categoriesFilterEl = $("#filter-category-list");
            const setCategory = (category) => {
                categoriesFilterEl
                    .find('input[type="radio"]')
                    .each((index, el) => {
                        if ($(el).val() == category) {
                            $(el).prop("checked", true);
                        } else {
                            $(el).prop("checked", false);
                        }
                    });

                $this.setFilterValues("category", category);
                this.renderFilterActive();
            };
            // default active category
            if (defaultFilterData["category"]) {
                categoriesFilterEl
                    .find('input[type="radio"]')
                    .each((index, el) => {
                        if ($(el).val() == defaultFilterData["category"]) {
                            $(el).prop("checked", true);
                        } else {
                            $(el).prop("checked", false);
                        }
                    });
            } else {
                categoriesFilterEl
                    .find('[data-id="cat-item-all"] input[type="radio"]')
                    .prop("checked", true);
            }
            // active category selected
            // $(window).on("active-category-selected", function (e) {
            //     const selectedSlug = e.originalEvent.detail;
            //     if (selectedSlug) {
            //         setCategories([selectedSlug]);
            //     } else {
            //         setCategories([]);
            //     }
            // });
            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                const category = newSearchParams.get("category");
                setCategory(category);
            });
            categoriesFilterEl
                .find('[data-select="sort-item"]')
                .on("click", function (e) {
                    e.preventDefault();
                    if (!$(this).find("input").is(":checked")) {
                        const val = $(this).find("input").val();
                        livewire.emit("filter-hotel-listing-sort", val);
                        // $this.setFilterValues("category", val);
                        // $this.renderFilterActive();
                        categoriesFilterEl
                            .find('input[type="radio"]')
                            .each((index, el) => {
                                if ($(el).val() == val) {
                                    $(el).prop("checked", true);
                                } else {
                                    $(el).prop("checked", false);
                                }
                            });
                    } else {
                        livewire.emit("filter-hotel-listing-sort", "");
                        // $this.setFilterValues("category", "");
                        // $this.renderFilterActive();
                        categoriesFilterEl
                            .find('input[type="radio"]')
                            .prop("checked", false);
                    }
                });
            categoriesFilterEl
                .find('[data-select="best-google-review-item"]')
                .on("click", function (e) {
                    e.preventDefault();
                    if (!$(this).find("input").is(":checked")) {
                        const val = $(this).find("input").val();
                        livewire.emit(
                            "filter-hotel-listing-best-google-review",
                            val
                        );
                        // $this.setFilterValues("category", val);
                        // $this.renderFilterActive();
                        categoriesFilterEl
                            .find('input[type="radio"]')
                            .each((index, el) => {
                                if ($(el).val() == val) {
                                    $(el).prop("checked", true);
                                } else {
                                    $(el).prop("checked", false);
                                }
                            });
                    } else {
                        livewire.emit(
                            "filter-hotel-listing-best-google-review",
                            ""
                        );
                        // $this.setFilterValues("category", "");
                        // $this.renderFilterActive();
                        categoriesFilterEl
                            .find('input[type="radio"]')
                            .prop("checked", false);
                    }
                });
            categoriesFilterEl
                .find('[data-select="cat-item"]')
                .on("click", function (e) {
                    e.preventDefault();
                    if (!$(this).find("input").is(":checked")) {
                        const val = $(this).find("input").val();
                        livewire.emit("filter-hotel-listing-category", val);
                        $this.setFilterValues("category", val);
                        $this.renderFilterActive();
                        categoriesFilterEl
                            .find('input[type="radio"]')
                            .each((index, el) => {
                                if ($(el).val() == val) {
                                    $(el).prop("checked", true);
                                } else {
                                    $(el).prop("checked", false);
                                }
                            });
                    } else {
                        livewire.emit("filter-hotel-listing-category", "");
                        $this.setFilterValues("category", "");
                        $this.renderFilterActive();
                        categoriesFilterEl
                            .find('input[type="radio"]')
                            .prop("checked", false);
                    }
                });
            $("body").on("reset-all-filters", function (event, value) {
                categoriesFilterEl
                    .find('input[type="radio"]')
                    .prop("checked", false);
            });
            // -------------- init category (scrolls) -------------------\\
            (function () {
                const parentContainer = categoriesFilterEl.find("ul");
                const itemsContainer = parentContainer.find("li");
                const scrollLeftButton =
                    categoriesFilterEl.find('[data-id="prev"]');
                const scrollRightButton =
                    categoriesFilterEl.find('[data-id="next"]');

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
            })();
        };

        const initTagsFilterScripts = () => {
            const tagsFilterEl = filterSectionWrapper.find(
                '[data-id="tags-filter"]'
            );

            if (defaultFilterData["tags"]?.length) {
                tagsFilterEl
                    .find('input[type="checkbox"]')
                    .each((index, el) => {
                        if (defaultFilterData["tags"].includes($(el).val())) {
                            $(el).prop("checked", true);
                        }
                    });
            }

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                const tags = Array.from(newSearchParams.entries())
                    .filter(([key]) => key.startsWith("tags["))
                    .map(([, value]) => value);

                if (tags?.length) {
                    tagsFilterEl
                        .find('input[type="checkbox"]')
                        .each((index, el) => {
                            if (tags.includes($(el).val())) {
                                $(el).prop("checked", true);
                            } else {
                                $(el).prop("checked", false);
                            }
                        });
                } else {
                    tagsFilterEl
                        .find('input[type="checkbox"]')
                        .each((index, el) => {
                            $(el).prop("checked", false);
                        });
                }

                const inputCheckedValue = tagsFilterEl
                    .find('input[type="checkbox"]:checked')
                    .map(function () {
                        return $(this).val();
                    }, [])
                    .get();

                $this.setFilterValues("tags", inputCheckedValue);
                this.renderFilterActive();
            });

            tagsFilterEl.find("label").on("change", function () {
                const inputCheckedValue = tagsFilterEl
                    .find('input[type="checkbox"]:checked')
                    .map(function () {
                        return $(this).val();
                    }, [])
                    .get();

                $this.setFilterValues("tags", inputCheckedValue);
            });

            $("body").on("reset-all-filters", function (event, value) {
                tagsFilterEl.find("input").prop("checked", false);
            });
        };
        const initAmenitiesFilterScripts = () => {
            const amenitiesFilterEl = filterSectionWrapper.find(
                '[data-id="amenities-filter"]'
            );

            if (defaultFilterData["amenities"]?.length) {
                amenitiesFilterEl
                    .find('input[type="checkbox"]')
                    .each((index, el) => {
                        if (
                            defaultFilterData["amenities"].includes($(el).val())
                        ) {
                            $(el).prop("checked", true);
                        }
                    });
            }

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                const amenities = Array.from(newSearchParams.entries())
                    .filter(([key]) => key.startsWith("amenities["))
                    .map(([, value]) => value);

                if (amenities?.length) {
                    amenitiesFilterEl
                        .find('input[type="checkbox"]')
                        .each((index, el) => {
                            if (amenities.includes($(el).val())) {
                                $(el).prop("checked", true);
                            } else {
                                $(el).prop("checked", false);
                            }
                        });
                } else {
                    amenitiesFilterEl
                        .find('input[type="checkbox"]')
                        .each((index, el) => {
                            $(el).prop("checked", false);
                        });
                }

                const inputCheckedValue = amenitiesFilterEl
                    .find('input[type="checkbox"]:checked')
                    .map(function () {
                        return $(this).val();
                    }, [])
                    .get();

                $this.setFilterValues("amenities", inputCheckedValue);
                this.renderFilterActive();
            });

            amenitiesFilterEl.find("label").on("change", function () {
                const inputCheckedValue = amenitiesFilterEl
                    .find('input[type="checkbox"]:checked')
                    .map(function () {
                        return $(this).val();
                    }, [])
                    .get();

                $this.setFilterValues("amenities", inputCheckedValue);
            });

            $("body").on("reset-all-filters", function (event, value) {
                amenitiesFilterEl.find("input").prop("checked", false);
            });
        };

        const initGoogleReviewFilterScripts = () => {
            const googleReviewsFilterEl = filterSectionWrapper.find(
                '[data-id="google-ratings-filter"]'
            );
            const starsEl = googleReviewsFilterEl.find(
                '[data-select="rating-stars"]'
            );

            const setActiveStar = (el) => {
                const activeStartNumber = el.data("id");

                // el.removeClass("fal fa-star text-[#8A8A8A]").addClass(
                //     "fas fa-star text-[#F4BE18]"
                // );

                for (let index = 1; index <= activeStartNumber; index++) {
                    googleReviewsFilterEl
                        .find(
                            `[data-id="${index}"][data-select="rating-stars"]`
                        )
                        .removeClass("fal fa-star text-[#8A8A8A]")
                        .addClass("fas fa-star text-[#F4BE18]");
                }

                for (let index = 5; index > activeStartNumber; index--) {
                    googleReviewsFilterEl
                        .find(
                            `[data-id="${index}"][data-select="rating-stars"]`
                        )
                        .removeClass("fas fa-star text-[#F4BE18]")
                        .addClass("fal fa-star text-[#8A8A8A]");
                }

                googleReviewsFilterEl.attr(
                    "data-filter-value",
                    activeStartNumber
                );
                $this.setFilterValues("google-rating", activeStartNumber);
            };

            const removeAllActiveStar = () => {
                starsEl
                    .removeClass("fas fa-star text-[#F4BE18]")
                    .addClass("fal fa-star text-[#8A8A8A]");

                googleReviewsFilterEl.attr("data-filter-value", "");
                $this.setFilterValues("google-rating", "");
            };

            const toggleActiveStar = (el) => {
                const activeStartNumber =
                    googleReviewsFilterEl.attr("data-filter-value");

                if (activeStartNumber == el.data("id")) {
                    removeAllActiveStar();
                } else {
                    setActiveStar(el);
                }
            };

            if (defaultFilterData["google-rating"]) {
                setActiveStar(
                    googleReviewsFilterEl.find(
                        `[data-id="${defaultFilterData["google-rating"]}"][data-select="rating-stars"]`
                    )
                );
            }

            starsEl.click(function (e) {
                const el = $(e.target);
                toggleActiveStar(el);
            });

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                if (newSearchParams.get("google-rating")) {
                    setActiveStar(
                        googleReviewsFilterEl.find(
                            `[data-id="${newSearchParams.get(
                                "google-rating"
                            )}"][data-select="rating-stars"]`
                        )
                    );
                } else {
                    removeAllActiveStar();
                }
            });

            $("body").on("reset-all-filters", function (event, value) {
                removeAllActiveStar();
            });
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
                                $this.setFilterValues(
                                    "check-in",
                                    firstDate.format("MM/DD/YYYY")
                                );
                                $this.setFilterValues(
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

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                if (
                    newSearchParams.get("check-in") &&
                    newSearchParams.get("check-out")
                ) {
                    calendar.settings.selected.dates = [
                        `${moment(
                            newSearchParams.get("check-in"),
                            "MM/DD/YYYY"
                        ).format("YYYY-MM-DD")}:${moment(
                            newSearchParams.get("check-out"),
                            "MM/DD/YYYY"
                        ).format("YYYY-MM-DD")}`,
                    ];
                    checkInEl.text(
                        moment(
                            newSearchParams.get("check-in"),
                            "MM/DD/YYYY"
                        ).format("ddd, DD/MM/YY")
                    );
                    checkOutEl.text(
                        moment(
                            newSearchParams.get("check-out"),
                            "MM/DD/YYYY"
                        ).format("ddd, DD/MM/YY")
                    );
                    calendar.update();
                } else {
                    calendar.reset();
                    checkInEl.text("Check In");
                    checkOutEl.text("Check Out");
                }
            });

            $("body").on("reset-all-filters", function (event, value) {
                calendar.reset();
                checkInEl.text("Check In");
                checkOutEl.text("Check Out");
            });

            // $(document).on("click", function (event) {
            //     const modal = $("#{{ $id }}");

            //     if (
            //         !modal.is(event.target) &&
            //         !modal.has(event.target).length &&
            //         !$(event.target).hasClass("vanilla-calendar-day__btn")
            //     ) {
            //         handleHideDropdown();
            //     }
            // });
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
                $this.setFilterValues("adults", pCount);
                if (1 >= pCount) {
                    adultMinusEl.attr("disabled", "disabled");
                } else {
                    adultMinusEl.removeAttr("disabled");
                }
            };
            const setRoomCount = (count) => {
                const pCount = parseInt(count);
                roomsCountEl.text(pCount);
                $this.setFilterValues("rooms", pCount);
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

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);

                if (newSearchParams.get("adults")) {
                    adultCountEl.text(parseInt(newSearchParams.get("adults")));
                } else {
                    adultCountEl.text(2);
                }
                if (newSearchParams.get("rooms")) {
                    roomsCountEl.text(parseInt(newSearchParams.get("rooms")));
                } else {
                    roomsCountEl.text(2);
                }
            });

            $("body").on("reset-all-filters", function (event, value) {
                setAdultCount(2);
                setRoomCount(1);
            });
        };
        initSearchScripts();
        initFilterSlideDowns();

        initRomanticFilterScripts();
        initIntimateFilterScripts();
        initLuxuriousFilterScripts();

        initGoogleReviewFilterScripts();
        initCheckoutCheckInScripts();
        intiGuestAndRoomsFilterScripts();

        // initBookingTypeFilterScripts();
        initCategoriesFilterScripts();
        initTagsFilterScripts();
        initAmenitiesFilterScripts();

        // --------------- (Reset filters) ------------------ \\
        $('[data-select="reset-btn"]').on("click", () => {
            $this.handleResetFilteredData();
        });
        // --------------- (Apply filters) ------------------ \\
        filterSectionWrapper
            .find('[data-select="apply-btn"]')
            .on("click", () => {
                const data = JSON.parse(
                    filterSectionWrapper.attr("data-filters")
                );

                if (Object.keys(data).length) {
                    if (!$this.isSearchPage) {
                        function buildQueryString(params) {
                            var queryString = "";
                            for (var key in params) {
                                if (Array.isArray(params[key])) {
                                    for (
                                        var i = 0;
                                        i < params[key].length;
                                        i++
                                    ) {
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

                        // console.log(buildQueryString(data));

                        window.location = `/search?${buildQueryString(data)}`;
                    } else {
                        // check if one category is selected

                        // livewire.emit("filter-hotels", data);
                        livewire.emit("filter-hotels", {
                            "romantic-scoring-from":
                                data["romantic-scoring-from"] || 1,
                            "romantic-scoring-to":
                                data["romantic-scoring-to"] || 10,
                            "intimate-scoring-from":
                                data["intimate-scoring-from"] || 1,
                            "intimate-scoring-to":
                                data["intimate-scoring-to"] || 10,
                            "luxurious-scoring-from":
                                data["luxurious-scoring-from"] || 1,
                            "luxurious-scoring-to":
                                data["luxurious-scoring-to"] || 10,

                            // "booking-type": data["booking-type"]?.length
                            //     ? data["booking-type"]
                            //     : [],
                            // categories: data["categories"]?.length
                            //     ? data["categories"]
                            //     : [],
                            tags: data["tags"]?.length ? data["tags"] : [],
                            amenities: data["amenities"]?.length
                                ? data["amenities"]
                                : [],
                            query: data["query"] || "",
                            googleRating: data["google-rating"] || "",
                            checkIn: data["check-in"] || "",
                            checkOut: data["check-out"] || "",
                            adults: data["adults"] || 2,
                            rooms: data["rooms"] || 1,
                        });
                        this.renderFilterActive();

                        // livewire.emit("filter-hotel-scoring", {
                        //     for: "romantic",
                        //     from: data["romantic-scoring-from"] || 1,
                        //     to: data["romantic-scoring-to"] || 10,
                        // });
                    }
                } else {
                    $this.handleResetFilteredData();
                }

                // hide filter
                const moreFiltersWrapperEl = filterSectionWrapper.find(
                    '[data-id="more-filters-wrapper"]'
                );
                moreFiltersWrapperEl.removeClass("slide-down").fadeOut(200);
                if (this.isMobileScreen) $("body").css("overflow", "auto");
            });

        // --------------- (Sync set active filters) ------------------ \\
        $(window).on("sync-set-active", (e) => {
            const defaultActives = e.originalEvent.detail;
            $this.renderFilterActive(true);

            console.log(defaultActives);

            if (defaultActives.isRatingFromToActive) {
                $this.setFilterValues("rating-from", "lorem", true);
                $this.setFilterValues("rating-to", "lorem", true);
            } else if (defaultActives.isRatingFromToActive != null) {
                $this.setFilterValues("rating-from", "", true);
                $this.setFilterValues("rating-to", "", true);
            }

            if (defaultActives.isGStarActive) {
                $this.setFilterValues("google-rating", "lorem", true);
            } else if (defaultActives.isGStarActive != null) {
                $this.setFilterValues("google-rating", "", true);
            }

            if (defaultActives.activeSort) {
                $this.setFilterValues("active-sort", "lorem", true);
            } else if (defaultActives.activeSort != null) {
                $this.setFilterValues("active-sort", "", true);
            }
        });
    },

    initStickyCategoryToHeader: function () {
        // $(window).scroll(function () {
        const containerEl = $("#hotel-filters-section-wrapper");
        //     var scrollPosition = $(this).scrollTop();
        //     var targetPosition = 50; // Set the scroll position where you want to apply the CSS
        //     if (scrollPosition >= targetPosition) {
        //         // Apply your CSS styles or class to the element
        //         // containerEl.addClass("sticky shadow-lg");
        //         containerEl.addClass("sticky-to-top");
        //     } else {
        //         // Remove the CSS styles or class if the scroll position is above the target
        //         // containerEl.removeClass("sticky shadow-lg ");
        //         containerEl.removeClass("sticky-to-top");
        //     }
        // });

        $(window).on("scroll", function () {
            var element = $("#hotel-listing-section");
            var elementTop = element.offset().top;
            var windowTop = $(window).scrollTop();
            if (elementTop - 30 <= windowTop) {
                containerEl.addClass("sticky-to-top");
            } else {
                containerEl.removeClass("sticky-to-top");
            }
        });
    },

    init: function () {
        $(document).ready(() => {
            this.handleInitScripts();
            this.initStickyCategoryToHeader();

            const filterEl = $("#mobile-rating-and-g-rating-filter");
            const filterDropdownEl = filterEl.find('[data-id="dropdown"]');
            filterEl.click((e) => {
                e.stopPropagation();
                filterDropdownEl.fadeIn(200);
            });

            $(document).on("click", function (event) {
                var targetElement = event.target;
                var $myElement = filterDropdownEl;

                // Check if the clicked element is not the element itself or its descendant
                if (
                    !$myElement.is(targetElement) &&
                    $myElement.has(targetElement).length === 0
                ) {
                    filterDropdownEl.fadeOut(200);
                }
            });
        });
    },
};
