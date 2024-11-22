export default {
    initLiveWireFaqSectionScripts() {
        const faqSectionEl = $("#faq-section");
        const componentId = faqSectionEl.attr("wire:id");

        const handler = () => {
            faqSectionEl
                .find('[data-id="single-faq"] [data-id="toggle-faq-btn"]')
                .on("click", function () {
                    const wrapperEl = $(this).parents('[data-id="single-faq"]');
                    const additionalDetailsEl = wrapperEl.find(
                        '[data-id="single-faq-details"]'
                    );

                    if (wrapperEl.attr("aria-expanded") == "false") {
                        wrapperEl.attr("aria-expanded", true);
                        additionalDetailsEl.slideDown();
                    } else {
                        wrapperEl.attr("aria-expanded", false);
                        additionalDetailsEl.slideUp();
                    }
                });
        };

        Livewire.hook("component.initialized", (component) => {
            if (component.id == componentId) {
                handler();
            }
        });

        Livewire.hook("message.processed", (message, component) => {
            if (component.id == componentId) {
                handler();
            }
        });
    },

    initContactUsSendMail() {
        $("#show-contact-us-form-btn").on("click", function () {
            $("#desktop-contact-message-popup").fadeIn(200);
        });
        $("#desktop-contact-message-popup .handle-close").on(
            "click",
            function () {
                $("#desktop-contact-message-popup").fadeOut(200);
            }
        );
    },

    initAboutUsSlider() {
        const aboutOoohotelsSliderEl = document.querySelector(
            "#about-ooohotels-slider"
        );
        Object.assign(aboutOoohotelsSliderEl, {
            spaceBetween: 30,
            pagination: true,

            breakpoints: {
                0: {
                    slidesPerView: "auto",
                },
                // 768: {
                //     slidesPerView: 2,
                // },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
        aboutOoohotelsSliderEl.initialize();
    },

    init() {
        this.initLiveWireFaqSectionScripts();
        $(document).ready(() => {
            this.initContactUsSendMail();
            this.initAboutUsSlider();
        });
    },
};
