export default {
    documentReadyScript: function () {
        const initCategoriesFilterScripts = () => {
            const categoriesFilterEl = $("#filter-category-list");
            const searchParams = new URLSearchParams(location.search);

            // default active category
            function setAllAsDefault() {
                categoriesFilterEl
                    .find('input[type="radio"]')
                    .prop("checked", false);
                categoriesFilterEl
                    .find('[data-id="cat-item-all"] input[type="radio"]')
                    .prop("checked", true);
            }
            function setDefault(searchParams) {
                const activeSortSearchParams = searchParams.get("active-sort");
                const bestGoogleRatingSearchParams =
                    searchParams.get("best-google-rating");
                const categorySearchParams = searchParams.get("category");
                if (activeSortSearchParams) {
                    categoriesFilterEl
                        .find('input[type="radio"]')
                        .each((index, el) => {
                            if ($(el).val() == activeSortSearchParams) {
                                $(el).prop("checked", true);
                            } else {
                                $(el).prop("checked", false);
                            }
                        });
                }
                if (bestGoogleRatingSearchParams) {
                    categoriesFilterEl
                        .find('input[type="radio"]')
                        .each((index, el) => {
                            if ($(el).val() == "best-google-review") {
                                $(el).prop("checked", true);
                            } else {
                                $(el).prop("checked", false);
                            }
                        });
                }
                if (categorySearchParams) {
                    categoriesFilterEl
                        .find('input[type="radio"]')
                        .each((index, el) => {
                            if ($(el).val() == categorySearchParams) {
                                $(el).prop("checked", true);
                            } else {
                                $(el).prop("checked", false);
                            }
                        });
                }

                if (
                    !activeSortSearchParams &&
                    !bestGoogleRatingSearchParams &&
                    !categorySearchParams
                ) {
                    setAllAsDefault();
                }
            }
            setDefault(searchParams);

            window.addEventListener("search-filter-active", () => {
                categoriesFilterEl
                    .find('[data-id="cat-item-all"]')
                    .addClass("reset");
                categoriesFilterEl
                    .find('[data-id="cat-item-all"] [data-id="inactive"]')
                    .hide();

                categoriesFilterEl
                    .find('[data-id="cat-item-all"] [data-id="active"]')
                    .show();
            });
            window.addEventListener("search-filter-inactive", () => {
                categoriesFilterEl
                    .find('[data-id="cat-item-all"]')
                    .removeClass("reset");

                categoriesFilterEl
                    .find('[data-id="cat-item-all"] [data-id="inactive"]')
                    .show();

                categoriesFilterEl
                    .find('[data-id="cat-item-all"] [data-id="active"]')
                    .hide();
            });

            $(window).on("popstate", () => {
                const newSearchParams = new URLSearchParams(location.search);
                setDefault(newSearchParams);
            });

            categoriesFilterEl
                .find('[data-select="sort-item"]')
                .on("click", function (e) {
                    e.preventDefault();
                    if (!$(this).find("input").is(":checked")) {
                        const val = $(this).find("input").val();
                        livewire.emit("filter-hotel-listing-sort", val);
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
                        setAllAsDefault();
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

                        setAllAsDefault();
                    }
                });
            categoriesFilterEl
                .find('[data-select="cat-item"]')
                .on("click", function (e) {
                    e.preventDefault();
                    if (!$(this).find("input").is(":checked")) {
                        const val = $(this).find("input").val();

                        livewire.emit("filter-hotel-listing-category", val);
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

                        setAllAsDefault();
                    }
                });
        };
        const initStickyCategoryToHeader = () => {
            const containerEl = $("#hotel-filters-section-wrapper");

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
        };

        initCategoriesFilterScripts();
        initStickyCategoryToHeader();
    },

    scripts: function () {
        // -------------- init category (scrolls) -------------------\\
        (function () {
            const categoriesFilterEl = $("#filter-category-list");
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

        const initFilterPopup = () => {
            // Resetting Active Classes
            const handleActivesReset = (list) => {
                list.forEach((item) => item.classList.remove("active"));
            };

            const modalWrapper = document.querySelector("#search-filter-popup");

            // Toggle Modal
            const toggleBtn = $('[data-id="toggle-filter-modal"]');
            const closeModal = document.querySelector(".modal__close");

            const modalShow = (willPushState = true) => {
                $(modalWrapper)
                    .addClass("showing")
                    .show()
                    .find(".modal__wrapper")
                    .show();

                $("body").css("overflow", "hidden");

                if (willPushState) {
                    const newSearchParams = new URLSearchParams(
                        location.search
                    );
                    newSearchParams.set("show-search-popup", true);
                    history.pushState(
                        null,
                        "",
                        `${location.pathname}?${newSearchParams.toString()}`
                    );
                }
            };
            const modalHide = (willPushState = true) => {
                $(modalWrapper)
                    .removeClass("showing")
                    .hide()
                    .find(".modal__wrapper")
                    .hide();
                $("body").css("overflow", "auto");

                if (willPushState) {
                    const newSearchParams = new URLSearchParams(
                        location.search
                    );
                    newSearchParams.delete("show-search-popup");
                    history.pushState(
                        null,
                        "",
                        `${location.pathname}?${newSearchParams.toString()}`
                    );
                }
            };

            const setDefaultShowOrHide = () => {
                const newSearchParams = new URLSearchParams(location.search);

                if (newSearchParams.get("show-search-popup") == "true") {
                    modalShow(false);
                } else {
                    modalHide(false);
                }
            };

            setDefaultShowOrHide();

            $(window).on("popstate", () => {
                setDefaultShowOrHide();
            });

            toggleBtn.on("click", (e) => {
                e.preventDefault();
                // if ($(modalWrapper).hasClass("showing")) {
                //     modalHide();
                // } else {
                modalShow();
                // }
                // modalWrapper.classList.add("show");
            });

            closeModal.addEventListener("click", () => {
                modalHide();
                // modalWrapper.classList.remove("show");
            });

            // Close Modal on Window click
            window.addEventListener("click", (e) => {
                if (e.target === modalWrapper) {
                    modalHide();
                }
            });

            window.addEventListener("close-hotel-filter-popup", (e) => {
                modalHide();
            });

            // Tabs
            const tagsWrapper = document.querySelector(".tags__wrapper");
            const tabButtons = document.querySelectorAll(".tab__button");
            const tabPanels = document.querySelectorAll(".tab__panel");

            tabButtons.forEach((btn, i) => {
                btn.addEventListener("click", () => {
                    handleActivesReset(tabButtons);
                    handleActivesReset(tabPanels);
                    tabButtons[i].classList.add("active");
                    tabPanels[i].classList.add("active");
                });
            });
        };
        initFilterPopup();
    },

    init: function () {
        document.addEventListener("livewire:load", () => {
            this.scripts();
        });
        document.addEventListener("livewire:update", () => {
            this.scripts();
        });

        $(document).ready(() => {
            this.documentReadyScript();
        });
    },
};
