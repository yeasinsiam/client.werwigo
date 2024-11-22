import { getIsMobileScreen } from "./utils/helper";

import HomePageScripts from "./pages/index";
import hotelShow from "./pages/hotels/show";
import SearchPageScripts from "./pages/search";
import FavoritesPageScripts from "./pages/favorites";
import MyAccountContactsAdnSupportScripts from "./pages/my-account/contacts-and-support";
import MyAccountProfileScripts from "./pages/my-account/profile";
import LoginScripts from "./pages/login";
import SignUpScripts from "./pages/signup";

import hotelSearchFilterSectionScripts from "./common/hotel-search-filter-section-scripts";

switch (window.routeName) {
    case "en.home":
        HomePageScripts.init();
        break;
    case "it.home":
        HomePageScripts.init();
        break;

    case "en.hotels.show":
        hotelShow.init();
        break;
    case "it.hotels.show":
        hotelShow.init();
        break;

    // case "/search":
    //     SearchPageScripts.init();
    //     break;
    case "en.favorites":
        FavoritesPageScripts.init();
        break;
    case "it.favorites":
        FavoritesPageScripts.init();
        break;

    case "en.login":
        LoginScripts.init();
        break;
    case "it.login":
        LoginScripts.init();
        break;

    case "en.sign-up":
        SignUpScripts.init();
        break;
    case "it.sign-up":
        SignUpScripts.init();
        break;

    case "en.contacts-and-support":
        MyAccountContactsAdnSupportScripts.init();
        break;
    case "it.contacts-and-support":
        MyAccountContactsAdnSupportScripts.init();
        break;

    // case "/my-account/contacts-and-support":
    //     MyAccountContactsAdnSupportScripts.init();
    //     break;
    // case "/my-account/profile":
    //     MyAccountProfileScripts.init();
    //     break;
}

//================ ( globalPopupScripts ) =================== \\
function globalPopupScripts() {
    //    ________________( Loin popups )_____________________\\
    const initLoginPopupScripts = () => {
        const searchParams = new URLSearchParams(location.search);
        const myAccountNavigationEl = $(
            '[data-select="my-account-navigation"]'
        );
        const loginPopupEl = $("#desktop-login-popup");
        const registerPopupEl = $("#desktop-register-popup");

        if (!myAccountNavigationEl.length) return;

        // Default
        if (
            searchParams.get("login") &&
            !getIsMobileScreen() &&
            loginPopupEl.data("authenticated") != 1
        ) {
            loginPopupEl.fadeIn(200);
        }

        myAccountNavigationEl.on("click", function (e) {
            event.stopPropagation();
            event.preventDefault();
            event.stopImmediatePropagation();
            const isAuthenticated = $(this).data("authenticated") == 1;
            // show popup only for unauthenticated and desktop
            if (!isAuthenticated && !getIsMobileScreen()) {
                e.preventDefault();

                const newSearchParams = new URLSearchParams(location.search);
                newSearchParams.set("register", true);
                window.location = `${
                    location.pathname
                }?${newSearchParams.toString()}`;
                // history.pushState(
                //     null,
                //     "",
                //     `${location.pathname}?${newSearchParams.toString()}`
                // );
            } else {
                window.location = "/sign-up";
            }
        });

        // close
        loginPopupEl.find(".handle-close").on("click", () => {
            // loginPopupEl.fadeOut(200);

            const newSearchParams = new URLSearchParams(location.search);
            if (!newSearchParams.get("login")) return;

            newSearchParams.delete("login");

            window.location = `${
                location.pathname
            }?${newSearchParams.toString()}`;
            // history.pushState(
            //     null,
            //     "",
            //     `${location.pathname}?${newSearchParams.toString()}`
            // );
        });

        // register click
        loginPopupEl.find('[data-id="register-btn"]').on("click", function (e) {
            e.preventDefault();
            const newSearchParams = new URLSearchParams(location.search);

            newSearchParams.delete("login");
            newSearchParams.set("register", true);

            window.location = `${
                location.pathname
            }?${newSearchParams.toString()}`;
        });

        //switch to register
        // loginPopupEl.find('[data-id="register-btn"]').on("click", (e) => {
        //     e.preventDefault();
        //     const registerPopupEl = $("#desktop-register-popup");
        //     const newSearchParams = new URLSearchParams(location.search);
        //     newSearchParams.delete("login");
        //     newSearchParams.set("register", true);
        //     loginPopupEl.fadeOut(200);
        //     registerPopupEl.fadeIn(200);
        //     history.pushState(
        //         { id: "register-popup", isShow: true },
        //         null,
        //         `${location.pathname}/?${newSearchParams.toString()}`
        //     );
        // });
    };
    //    ________________( Register popups )_____________________\\
    const initRegisterPopupScripts = () => {
        const searchParams = new URLSearchParams(location.search);
        const myAccountNavigationEl = $(
            '[data-select="my-account-navigation"]'
        );
        const registerPopupEl = $("#desktop-register-popup");

        if (!myAccountNavigationEl.length) return;

        // Default
        if (
            searchParams.get("register") &&
            !getIsMobileScreen() &&
            registerPopupEl.data("authenticated") != 1
        ) {
            registerPopupEl.fadeIn(200);
        }

        // close
        registerPopupEl.find(".handle-close").on("click", () => {
            // registerPopupEl.fadeOut(200);
            const newSearchParams = new URLSearchParams(location.search);
            newSearchParams.delete("register");
            window.location = `${
                location.pathname
            }?${newSearchParams.toString()}`;

            // history.pushState(
            //     null,
            //     "",
            //     `${location.pathname}?${newSearchParams.toString()}`
            // );
        });

        registerPopupEl.find('[data-id="login-btn"]').on("click", function (e) {
            e.preventDefault();
            const newSearchParams = new URLSearchParams(location.search);
            newSearchParams.delete("register");
            newSearchParams.set("login", true);
            window.location = `${
                location.pathname
            }?${newSearchParams.toString()}`;
        });
    };

    initLoginPopupScripts();
    initRegisterPopupScripts();
}

$(document).ready(globalPopupScripts);
document.addEventListener("livewire:update", globalPopupScripts);
$(window).on("popstate", globalPopupScripts);

//================ ( FooterScripts ) =================== \\
function footerScripts() {
    //    ________________( Language Selector )_____________________\\
    const desktopLanguageScript = () => {
        const langWrapper = $('[data-id="language-wrapper"]');

        // setting default

        const defaultDataKey = langWrapper
            .find('[data-id="language-button-wrapper"]')
            .attr("default-data-key");

        langWrapper
            .find('[data-id="language-button-wrapper"]')
            .text(
                langWrapper
                    .find('[data-id="language-button-dropdown"]')
                    .find(`[data-key="${defaultDataKey}"]`)
                    .text()
            );

        langWrapper.on("focus", () => {
            langWrapper
                .find('[data-id="language-button-dropdown"]')
                .fadeIn(200);
        });
        langWrapper.on("blur", () => {
            langWrapper
                .find('[data-id="language-button-dropdown"]')
                .fadeOut(200);
        });

        langWrapper
            .find('[data-id="language-button-dropdown"]')
            .find(`li`)
            .on("click", function () {
                const $this = $(this);

                langWrapper
                    .find('[data-id="language-button-wrapper"]')
                    .text($this.text());

                langWrapper.trigger("blur");
            });
    };

    const mobileLanguageScript = () => {
        const btnEl = $("#mobile-language-dropdown-btn");
        const dropdownEl = $("#mobile-language-dropdown");

        btnEl.on("click", (e) => {
            e.preventDefault();
            if (btnEl.hasClass("showing")) {
                dropdownEl.slideUp(200);

                btnEl.removeClass("showing");
            } else {
                dropdownEl.slideDown(200);
                btnEl.addClass("showing");
            }
        });
    };

    desktopLanguageScript();
    mobileLanguageScript();
}

$(document).ready(footerScripts);
//================ ( Global Scripts ) =================== \\
function globalScripts() {
    //    ________________(  show password text  )_____________________\\
    const initShowPassWordScripts = () => {
        $('[data-id="input-field-show-text"] [data-id="show-text"]').on(
            "click",
            function () {
                const input = $(this)
                    .parents('[data-id="input-field-show-text"]')
                    .find("input");

                if (input.attr("type") == "password") {
                    $(this).removeClass("fa-eye").addClass("fa-eye-slash");
                    input.attr("type", "text");
                } else {
                    $(this).removeClass("fa-eye-slash").addClass("fa-eye");
                    input.attr("type", "password");
                }
            }
        );
    };

    initShowPassWordScripts();
}
$(document).ready(globalScripts);
hotelSearchFilterSectionScripts.init();

//================ ( Header Scripts ) =================== \\
function headerScripts() {
    //    ________________(  show password text  )_____________________\\
    const initMobileMoreNavigationScripts = () => {
        const btnEl = $('[data-id="header-more-navigation-btn"]');
        const containerEl = $("#mobile-header-more-navigation");
        const containerCloseBtnEl = containerEl.find('[data-id="close-btn"]');

        btnEl.on("click", () => {
            if (getIsMobileScreen()) {
                containerEl.children("div").removeClass("translate-x-full");
                $("body").css("overflow", "hidden");
            }
        });

        containerCloseBtnEl.on("click", () => {
            containerEl.children("div").addClass("translate-x-full");
            $("body").css("overflow", "auto");
        });
    };
    // Sticky header
    // const initStickyCHeader = () => {
    //     $(window).scroll(function () {
    //         const containerEl = $("header");
    //         var scrollPosition = $(this).scrollTop();
    //         var targetPosition = 100; // Set the scroll position where you want to apply the CSS
    //         if (scrollPosition >= targetPosition) {
    //             // Apply your CSS styles or class to the element
    //             containerEl.addClass("sticky");
    //         } else {
    //             // Remove the CSS styles or class if the scroll position is above the target
    //             containerEl.removeClass("sticky");
    //         }
    //     });
    // };

    initMobileMoreNavigationScripts();
    // initStickyCHeader();
}
$(document).ready(headerScripts);
