import romanticFilterScripts from "./partials/romantic-filter";
import luxuryFilterScripts from "./partials/luxury-filter";
import intimateFilterScripts from "./partials/intimate-filter";
import moreFilterScripts from "./partials/more-filter";

export default {
    init() {
        function handle() {
            //------------------------ ( Search Code ) -----------\\
            const suggestionEl = $(
                '[data-id="hotel-search-input-wrapper"] [data-id="search-suggestion"]'
            );
            const searchParams = new URLSearchParams(location.search);
            const defaultQuery = searchParams.get("query");

            if (defaultQuery) {
                $('[data-id="hotel-search-input-wrapper"] input').val(
                    defaultQuery
                );
                $(
                    '[data-id="hotel-search-input-wrapper"] [data-id="remove-search"]'
                ).show();
                $(
                    '[data-id="hotel-search-input-wrapper"] [data-id="down-arrow"]'
                ).hide();
            }

            const debounce = (func, wait) => {
                let timeout;

                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };

                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            };

            function fetchAutocompleteSuggestions(query) {
                var url = `/api/hotel-location-suggestion?q=${encodeURIComponent(
                    query
                )}`;
                fetch(url)
                    .then((response) => response.json())
                    .then((datas) => {
                        if (
                            // datas.length &&
                            $(
                                '[data-id="hotel-search-input-wrapper"] input'
                            ).is(":focus")
                        ) {
                            if (datas.length) {
                                let html = ``;

                                datas.forEach((data) => {
                                    html += `<li data-id="address" class="text-sm text-[#5B5B5B] py-1 px-2 cursor-pointer hover:text-[#000000]" tabindex="-1">${data.address}</li> `;
                                });

                                suggestionEl.find("ul").html(html);
                            } else {
                                suggestionEl
                                    .find("ul")
                                    .html(
                                        `<li class="px-2 py-1 text-xs text-gray-400 cursor-pointer " tabindex="-1">No results.</li>`
                                    );
                            }
                            suggestionEl.fadeIn(200);
                        } else {
                            suggestionEl
                                .find("ul")
                                .html(
                                    `<li class="px-2 py-1 text-xs text-gray-400 cursor-pointer " tabindex="-1">No results.</li>`
                                );

                            // suggestionEl.fadeOut(200);
                        }
                    })
                    .catch((error) => {
                        console.error(
                            "Error fetching autocomplete suggestions:",
                            error
                        );
                    });
            }

            document
                .querySelector('[data-id="hotel-search-input-wrapper"] input')
                .addEventListener(
                    "input",
                    debounce((event) => {
                        var query = event.target.value;
                        if (query) {
                            fetchAutocompleteSuggestions(query);
                            $(
                                '[data-id="hotel-search-input-wrapper"] [data-id="remove-search"]'
                            ).show();
                            $(
                                '[data-id="hotel-search-input-wrapper"] [data-id="down-arrow"]'
                            ).hide();
                        } else {
                            $(
                                '[data-id="hotel-search-input-wrapper"] [data-id="remove-search"]'
                            ).hide();
                            $(
                                '[data-id="hotel-search-input-wrapper"] [data-id="down-arrow"]'
                            ).show();
                            suggestionEl.fadeOut(200);
                        }
                    }, 300)
                );

            $("body").on(
                "focus",
                '[data-id="hotel-search-input-wrapper"] input',
                function () {
                    if ($(this).val())
                        fetchAutocompleteSuggestions($(this).val());
                }
            );

            $("body").on(
                "focusout",
                '[data-id="hotel-search-input-wrapper"] input',
                function () {
                    $(
                        '[data-id="hotel-search-input-wrapper"] [data-id="search-suggestion"]'
                    ).fadeOut(200);
                }
            );

            $("body").on(
                "click",
                '[data-id="hotel-search-input-wrapper"] [data-id="search-suggestion"] [data-id="address"]',
                function () {
                    $('[data-id="hotel-search-input-wrapper"] input').val(
                        $(this).text()
                    );
                    if (typeof livewire !== "undefined") {
                        livewire.emit("filter-query", $(this).text());
                    }
                }
            );

            $("body").on(
                "click",
                '[data-id="hotel-search-input-wrapper"] [data-id="remove-search"]',
                function () {
                    if (typeof livewire !== "undefined") {
                        livewire.emit("filter-query", "");
                    }

                    $('[data-id="hotel-search-input-wrapper"] input').val("");
                    $(this).hide();
                    $(
                        '[data-id="hotel-search-input-wrapper"] [data-id="down-arrow"]'
                    ).show();
                }
            );

            $("body").on("submit", "form#hotel-search-form", (e) => {
                e.preventDefault();
                const input = $('[data-id="hotel-search-input-wrapper"] input');

                if (input.val()) {
                    if (typeof livewire !== "undefined") {
                        livewire.emit("filter-query", input.val());
                    }

                    input.blur();
                } else {
                    input.focus();
                }
            });
            //  $('body').on('click', '#hotel-search-btn', () => {
            //      const inputVal = $('[data-id="hotel-search-input-wrapper"] input').val();
            //      if (typeof livewire !== 'undefined') {
            //          livewire.emit('filter-query', inputVal);
            //      }
            //  })

            //------------------------ ( Mobile Filter ) -----------\\

            const listingFiltersEl = $("#listing-filters");

            $("#mobile-listing-filter-toggle-btn").on("click", (e) => {
                if (listingFiltersEl.hasClass("slide-down")) {
                    listingFiltersEl.removeClass("slide-down");
                    $("body").css("overflow", "auto");
                } else {
                    listingFiltersEl.addClass("slide-down");
                    $("body").css("overflow", "hidden");
                }
            });

            $('[data-main-id="close-mobile-filter-btn"]').on("click", (e) => {
                listingFiltersEl.removeClass("slide-down");
                $("body").css("overflow", "auto");
            });

            // ---------------------------(Reset) -------------------\\
            window.addEventListener("hotel-listing-filtered", (event) => {
                $('[data-main-id="reset-btn"]').show();
                // listingFiltersEl.show().addClass("slide-down");
            });
            window.addEventListener("hotel-listing-not-filtered", (event) => {
                $('[data-main-id="reset-btn"]').hide();
            });

            $('[data-main-id="reset-btn"]').on("click", (e) => {
                e.stopPropagation();
                if (typeof livewire !== "undefined") {
                    livewire.emit("reset-all-filters");
                    $('[data-id="hotel-search-input-wrapper"] input').val(""); // reset search input...
                    $(
                        '[data-id="hotel-search-input-wrapper"] [data-id="remove-search"]'
                    ).hide();
                }
            });
        }

        $(document).ready(handle);

        romanticFilterScripts.init();
        luxuryFilterScripts.init();
        intimateFilterScripts.init();
        moreFilterScripts.init();
    },
};
