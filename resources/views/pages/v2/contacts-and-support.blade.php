@php
    $termsOfServiceSection = \App\Models\TermsOfServiceSection::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>werwigo - Find your next travel vibes</title>
    <link rel="stylesheet" href="{{ asset('/') }}home-assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}home-assets/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @livewireStyles
    <style>
        /*
! tailwindcss v3.3.3 | MIT License | https://tailwindcss.com
*/

        /*
1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
*/

        *,
        ::before,
        ::after {
            box-sizing: border-box;
            /* 1 */
            border-width: 0;
            /* 2 */
            border-style: solid;
            /* 2 */
            border-color: #e5e7eb;
            /* 2 */
        }

        ::before,
        ::after {
            --tw-content: '';
        }

        /*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured `sans` font-family by default.
5. Use the user's configured `sans` font-feature-settings by default.
6. Use the user's configured `sans` font-variation-settings by default.
*/

        html {
            line-height: 1.5;
            /* 1 */
            -webkit-text-size-adjust: 100%;
            /* 2 */
            -moz-tab-size: 4;
            /* 3 */
            tab-size: 4;
            /* 3 */
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            /* 4 */
            font-feature-settings: normal;
            /* 5 */
            font-variation-settings: normal;
            /* 6 */
        }

        /*
1. Remove the margin in all browsers.
2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
*/

        body {
            margin: 0;
            /* 1 */
            line-height: inherit;
            /* 2 */
        }

        /*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

        hr {
            height: 0;
            /* 1 */
            color: inherit;
            /* 2 */
            border-top-width: 1px;
            /* 3 */
        }

        /*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted;
        }

        /*
Remove the default font size and weight for headings.
*/

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit;
        }

        /*
Reset links to optimize for opt-in styling instead of opt-out.
*/

        a {
            color: inherit;
            text-decoration: inherit;
        }

        /*
Add the correct font weight in Edge and Safari.
*/

        b,
        strong {
            font-weight: bolder;
        }

        /*
1. Use the user's configured `mono` font family by default.
2. Correct the odd `em` font sizing in all browsers.
*/

        code,
        kbd,
        samp,
        pre {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            /* 1 */
            font-size: 1em;
            /* 2 */
        }

        /*
Add the correct font size in all browsers.
*/

        small {
            font-size: 80%;
        }

        /*
Prevent `sub` and `sup` elements from affecting the line height in all browsers.
*/

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        /*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

        table {
            text-indent: 0;
            /* 1 */
            border-color: inherit;
            /* 2 */
            border-collapse: collapse;
            /* 3 */
        }

        /*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            /* 1 */
            font-feature-settings: inherit;
            /* 1 */
            font-variation-settings: inherit;
            /* 1 */
            font-size: 100%;
            /* 1 */
            font-weight: inherit;
            /* 1 */
            line-height: inherit;
            /* 1 */
            color: inherit;
            /* 1 */
            margin: 0;
            /* 2 */
            padding: 0;
            /* 3 */
        }

        /*
Remove the inheritance of text transform in Edge and Firefox.
*/

        button,
        select {
            text-transform: none;
        }

        /*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

        button,
        [type='button'],
        [type='reset'],
        [type='submit'] {
            -webkit-appearance: button;
            /* 1 */
            background-color: transparent;
            /* 2 */
            background-image: none;
            /* 2 */
        }

        /*
Use the modern Firefox focus style for all focusable elements.
*/

        :-moz-focusring {
            outline: auto;
        }

        /*
Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

        :-moz-ui-invalid {
            box-shadow: none;
        }

        /*
Add the correct vertical alignment in Chrome and Firefox.
*/

        progress {
            vertical-align: baseline;
        }

        /*
Correct the cursor style of increment and decrement buttons in Safari.
*/

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto;
        }

        /*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

        [type='search'] {
            -webkit-appearance: textfield;
            /* 1 */
            outline-offset: -2px;
            /* 2 */
        }

        /*
Remove the inner padding in Chrome and Safari on macOS.
*/

        ::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to `inherit` in Safari.
*/

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            /* 1 */
            font: inherit;
            /* 2 */
        }

        /*
Add the correct display in Chrome and Safari.
*/

        summary {
            display: list-item;
        }

        /*
Removes the default spacing and border for appropriate elements.
*/

        blockquote,
        dl,
        dd,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        figure,
        p,
        pre {
            margin: 0;
        }

        fieldset {
            margin: 0;
            padding: 0;
        }

        legend {
            padding: 0;
        }

        ol,
        ul,
        menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /*
Reset default styling for dialogs.
*/

        dialog {
            padding: 0;
        }

        /*
Prevent resizing textareas horizontally by default.
*/

        textarea {
            resize: vertical;
        }

        /*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            /* 1 */
            color: #9ca3af;
            /* 2 */
        }

        /*
Set the default cursor for buttons.
*/

        button,
        [role="button"] {
            cursor: pointer;
        }

        /*
Make sure disabled buttons don't get the pointer cursor.
*/

        :disabled {
            cursor: default;
        }

        /*
1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: block;
            /* 1 */
            vertical-align: middle;
            /* 2 */
        }

        /*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

        img,
        video {
            max-width: 100%;
            height: auto;
        }

        /* Make elements with the HTML hidden attribute stay hidden by default */

        [hidden] {
            display: none;
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .tw-fixed {
            position: fixed
        }

        .tw-absolute {
            position: absolute
        }

        .tw-relative {
            position: relative
        }

        .tw-inset-0 {
            inset: 0px
        }

        .tw--right-3 {
            right: -0.75rem
        }

        .tw--top-3 {
            top: -0.75rem
        }

        .tw-left-2 {
            left: 0.5rem
        }

        .tw-top-0 {
            top: 0px
        }

        .tw-top-2\/4 {
            top: 50%
        }

        .tw-z-\[9999\] {
            z-index: 9999
        }

        .\!tw-m-0 {
            margin: 0px !important
        }

        .tw-mt-10 {
            margin-top: 2.5rem
        }

        .tw-mt-2 {
            margin-top: 0.5rem
        }

        .tw-mt-5 {
            margin-top: 1.25rem
        }

        .tw-mt-7 {
            margin-top: 1.75rem
        }

        .tw-block {
            display: block
        }

        .tw-inline-block {
            display: inline-block
        }

        .tw-flex {
            display: flex
        }

        .tw-hidden {
            display: none
        }

        .tw-h-\[30px\] {
            height: 30px
        }

        .tw-h-full {
            height: 100%
        }

        .tw-h-screen {
            height: 100vh
        }

        .tw-w-\[30px\] {
            width: 30px
        }

        .tw-w-full {
            width: 100%
        }

        .tw-w-screen {
            width: 100vw
        }

        .tw-flex-1 {
            flex: 1 1 0%
        }

        .tw--translate-y-5 {
            --tw-translate-y: -1.25rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .tw-flex-col {
            flex-direction: column
        }

        .tw-items-center {
            align-items: center
        }

        .tw-justify-center {
            justify-content: center
        }

        .tw-justify-between {
            justify-content: space-between
        }

        .tw-gap-3 {
            gap: 0.75rem
        }

        .tw-gap-4 {
            gap: 1rem
        }

        .tw-space-y-1> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.25rem * var(--tw-space-y-reverse))
        }

        .tw-space-y-2> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.5rem * var(--tw-space-y-reverse))
        }

        .tw-space-y-3> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.75rem * var(--tw-space-y-reverse))
        }

        .tw-overflow-y-scroll {
            overflow-y: scroll
        }

        .tw-rounded-full {
            border-radius: 9999px
        }

        .tw-rounded-lg {
            border-radius: 0.5rem
        }

        .tw-border {
            border-width: 1px
        }

        .tw-border-b {
            border-bottom-width: 1px
        }

        .tw-border-transparent {
            border-color: transparent
        }

        .tw-bg-\[\#000000\] {
            --tw-bg-opacity: 1;
            background-color: rgb(0 0 0 / var(--tw-bg-opacity))
        }

        .tw-bg-\[\#31020E\] {
            --tw-bg-opacity: 1;
            background-color: rgb(49 2 14 / var(--tw-bg-opacity))
        }

        .tw-bg-\[\#B0AFAF\] {
            --tw-bg-opacity: 1;
            background-color: rgb(176 175 175 / var(--tw-bg-opacity))
        }

        .tw-bg-\[\#F7F7F7\] {
            --tw-bg-opacity: 1;
            background-color: rgb(247 247 247 / var(--tw-bg-opacity))
        }

        .tw-bg-black\/50 {
            background-color: rgb(0 0 0 / 0.5)
        }

        .tw-bg-green-200 {
            --tw-bg-opacity: 1;
            background-color: rgb(187 247 208 / var(--tw-bg-opacity))
        }

        .tw-bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .\!tw-p-0 {
            padding: 0px !important
        }

        .tw-p-3 {
            padding: 0.75rem
        }

        .tw-p-4 {
            padding: 1rem
        }

        .tw-px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem
        }

        .tw-px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem
        }

        .tw-px-5 {
            padding-left: 1.25rem;
            padding-right: 1.25rem
        }

        .tw-px-7 {
            padding-left: 1.75rem;
            padding-right: 1.75rem
        }

        .tw-py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem
        }

        .tw-py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem
        }

        .tw-py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .tw-pb-3 {
            padding-bottom: 0.75rem
        }

        .tw-pb-5 {
            padding-bottom: 1.25rem
        }

        .tw-pt-5 {
            padding-top: 1.25rem
        }

        .tw-text-base {
            font-size: 1rem;
            line-height: 1.5rem
        }

        .tw-text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem
        }

        .tw-text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .tw-text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .tw-text-xs {
            font-size: 0.75rem;
            line-height: 1rem
        }

        .tw-font-bold {
            font-weight: 700
        }

        .tw-font-medium {
            font-weight: 500
        }

        .tw-font-semibold {
            font-weight: 600
        }

        .tw-text-\[\#5B5B5B\] {
            --tw-text-opacity: 1;
            color: rgb(91 91 91 / var(--tw-text-opacity))
        }

        .tw-text-\[\#6B7280\] {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .tw-text-\[\#8C7379\] {
            --tw-text-opacity: 1;
            color: rgb(140 115 121 / var(--tw-text-opacity))
        }

        .tw-text-green-900 {
            --tw-text-opacity: 1;
            color: rgb(20 83 45 / var(--tw-text-opacity))
        }

        .tw-text-red-600 {
            --tw-text-opacity: 1;
            color: rgb(220 38 38 / var(--tw-text-opacity))
        }

        .tw-text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .\[transform\:translateY\(-50\%\)\] {
            transform: translateY(-50%)
        }

        .placeholder\:tw-text-\[\#74737A\]::placeholder {
            --tw-text-opacity: 1;
            color: rgb(116 115 122 / var(--tw-text-opacity))
        }

        .focus\:tw-border-\[\#000000\]:focus {
            --tw-border-opacity: 1;
            border-color: rgb(0 0 0 / var(--tw-border-opacity))
        }

        .focus\:tw-outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px
        }

        .focus\:tw-ring-1:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
        }

        .focus\:tw-ring-2:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
        }

        .focus\:tw-ring-\[\#B0AFAF\]:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(176 175 175 / var(--tw-ring-opacity))
        }

        .focus\:tw-ring-offset-1:focus {
            --tw-ring-offset-width: 1px
        }

        .focus\:tw-ring-offset-2:focus {
            --tw-ring-offset-width: 2px
        }

        .aria-expanded\:tw-rounded-sm[aria-expanded="true"] {
            border-radius: 0.125rem
        }

        .aria-expanded\:tw-bg-\[\#f9fafb\][aria-expanded="true"] {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity))
        }

        .tw-group[aria-expanded="true"] .group-aria-expanded\:tw-block {
            display: block
        }

        .tw-group[aria-expanded="true"] .group-aria-expanded\:tw-hidden {
            display: none
        }

        .tw-group[aria-expanded="true"] .group-aria-expanded\:tw-border-none {
            border-style: none
        }

        @media not all and (min-width: 1024px) {
            .max-lg\:tw-px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem
            }
        }

        @media (min-width: 1024px) {
            .lg\:tw-max-w-lg {
                max-width: 32rem
            }

            .lg\:tw-flex-row {
                flex-direction: row
            }

            .lg\:tw-items-center {
                align-items: center
            }

            .lg\:tw-border {
                border-width: 1px
            }

            .lg\:tw-px-0 {
                padding-left: 0px;
                padding-right: 0px
            }


            .\!tw-max-w-3xl {
                max-width: 48rem !important
            }


            .tw-pb-36 {
                padding-bottom: 9rem;
            }
        }
    </style>
</head>

<body  style="padding-bottom: 11rem !important;">
    <!-- Navbar -->
    <nav class="px-2 py-4 navbar navbar-light bg-white/40 backdrop-blur-2xl fixed-top px-lg-5 lg:bg-transparent lg:backdrop-blur-none"
        style="background:white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div class="sitename">werwigo</div>
            </a>
            <button class="px-3 py-1 btn-download">Soon available</button>
        </div>
    </nav>
    <!-- Main section -->
    <div class="container main-container !tw-max-w-3xl" style="margin-top:120px !important;">
        {{-- Faq --}}
        <livewire:pages.my-account.contacts-and-supports.faqs />
        {{-- contact us btn --}}
        <div wire:ignore class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-gap-3 tw-mt-10 ">

            @if (session()->has('contact-success-message'))
                <p class="tw-px-5 tw-py-3 tw-text-sm tw-text-green-900 tw-bg-green-200 tw-rounded-lg">
                    {{ session()->get('contact-success-message') }}
                </p>
            @endif
            <h2 class="tw-text-lg tw-font-medium" style="text-align: center;">
                {{ __("Can't find what you're looking for?") }} </h2>
            <button id="show-contact-us-form-btn"
                class="tw-inline-block tw-px-5 tw-py-2 tw-text-sm tw-bg-[#000000] tw-text-white tw-rounded-lg focus:tw-ring-1 focus:tw-ring-offset-1 focus:ring-[#000000]">
                {{ __('Contact Us') }} </button>






        </div>
    </div>

    {{-- Contact Us message --}}
    <div wire:ignore id="desktop-contact-message-popup" role="dialog"
        class="tw-w-screen tw-h-screen hidden  tw-hidden  tw-fixed tw-top-0 tw-z-[9999]
                tw-overflow-y-scroll
                tw-inset-0 tw-bg-black/50 !tw-p-0 !tw-m-0">
        <div class="tw-flex tw-items-center tw-justify-center tw-w-full tw-h-full">

            <div class="tw-w-full tw--translate-y-5 max-lg:tw-px-3 lg:tw-max-w-lg">
                <div class="tw-relative tw-p-4 tw-pb-5 tw-bg-white tw-rounded-lg ">

                    {{-- Desktop Close Button --}}
                    <button
                        class="handle-close  tw-absolute tw--right-3 tw--top-3 tw-w-[30px] tw-h-[30px] tw-bg-[#B0AFAF] tw-rounded-full focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-[#B0AFAF]">
                        <i class="tw-text-white fa fa-times"></i>
                    </button>

                    <form action="{{ route('contacts-and-support.post-contact-mail') }}" method="POST"
                        class="tw-bg-white tw-rounded-lg " autocomplete="off">
                        @csrf

                        <h1 class="tw-text-xl tw-font-bold"> {{ __('Contact Us') }}</h1>
                        {{-- <p class="tw-text-sm tw-text-[#8C7379]">Start Explore your Vibes and Experience Love </p> --}}

                        <div class="tw-space-y-3 tw-mt-7">
                            <div>
                                <input type="text" required
                                    class="tw-border tw-px-3 tw-py-4 placeholder:tw-text-[#74737A] tw-text-sm  tw-rounded-lg tw-w-full"
                                    placeholder=" {{ __('Full Name') }} " name="full_name" autocomplete="false"
                                    value="{{ old('full_name', auth('admin')->user()?->full_name) }}" />
                                <ul class='tw-mt-2 tw-space-y-1 tw-text-sm tw-text-red-600'>
                                    @foreach ($errors->get('full_name') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <input type="email" required
                                    class="tw-border tw-px-3 tw-py-4 placeholder:tw-text-[#74737A] tw-text-sm  tw-rounded-lg tw-w-full"
                                    placeholder=" {{ __('Email') }} " name="email" autocomplete="false"
                                    value="{{ old('email', auth('admin')->user()?->email) }}" />
                                <ul class='tw-mt-2 tw-space-y-1 tw-text-sm tw-text-red-600'>
                                    @foreach ($errors->get('email') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <textarea required rows="6"
                                    class="tw-border tw-px-3 tw-py-4 placeholder:tw-text-[#74737A] tw-text-sm  tw-rounded-lg tw-w-full"
                                    placeholder=" {{ __('Message') }} " name="message" autocomplete="false">{{ old('messsage') }}</textarea>
                                <ul class='tw-mt-2 tw-space-y-1 tw-text-sm tw-text-red-600'>
                                    @foreach ($errors->get('message') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <button type="submit"
                            class="tw-block tw-w-full tw-px-2 tw-py-3 tw-mt-5 tw-text-base tw-bg-[#31020E] tw-font-medium tw-text-white tw-rounded-lg">
                            {{ __('Send') }} </button>

                    </form>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer -->
    <footer class="py-4 pt-5 mt-5 fixed-bottom" style="background:white;">
        <ul class="flex-row nav justify-content-center fw-bold">
            <li><a href="#" class="nav-link">Privacy Policy</a></li>
            <li><a href="{{ route('terms-of-service') }}" class="nav-link">Terms of service</a></li>
            @if (app()->isLocale('it'))
                <a href="{{ Route::localizedUrl('en') }}" class="nav-link"><i class="fa fa-globe"></i> English</a>
            @else
                <a href="{{ Route::localizedUrl('it') }}" class="nav-link"><i class="fa fa-globe"></i> Italiano</a>
            @endif
            <li><a href="{{ route('contacts-and-support') }}" class="nav-link">Help</a></li>

        </ul>
    </footer>





    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @livewireScripts

    <!-- Bootstrap JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <script>
        const scrpt = {
            initLiveWireFaqSectionScripts() {
                const faqSectionEl = $("#faq-section");
                const componentId = faqSectionEl.attr("wire:id");

                const handler = () => {
                    faqSectionEl
                        .find('[data-id="single-faq"] [data-id="toggle-faq-btn"]')
                        .on("click", function() {
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
                $("#show-contact-us-form-btn").on("click", function() {
                    $("#desktop-contact-message-popup").fadeIn(200);
                });
                $("#desktop-contact-message-popup .handle-close").on(
                    "click",
                    function() {
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



        scrpt.init();
    </script>

</body>

</html>
