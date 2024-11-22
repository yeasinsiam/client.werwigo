<div id={{ $id }} wire:ignore>
    <div class="p-5 pt-7  bg-[#000000] text-white rounded-lg lg:p-6 lg:pt-7 lg:grid lg:grid-cols-8">
        <div class="lg:col-start-1 lg:col-end-6 lg:flex lg:items-end">
            <h3 class="w-full text-2xl font-bold font-['Baloo_Tammudu_2'] lg:text-right lg:text-3xl lg:leading-none">
                Get
                Secret
                Promo for couples</h3>
        </div>
        <div class="lg:flex lg:justify-end lg:col-start-7 lg:col-end-9">
            <button
                class="show-popup-button  block py-2 w-full max-lg:mt-1 rounded-sm   bg-[#000000]  [box-shadow:0px_4px_4px_0px_rgba(0,0,0,0.25)]">Click
                here</button>
        </div>
    </div>

    {{-- ____Popup____ --}}
    <div class="popup hidden w-screen h-screen bg-black/30 fixed inset-0 z-[999] ">

        <div class="flex items-center justify-center w-full h-full">
            <div class="max-w-lg px-5 lg:px-0">
                <div class="relative p-8 pt-12 bg-[#000000] rounded-lg">

                    <button
                        class="close-popup-btn  absolute -right-3 -top-3 w-[30px] h-[30px] border border-white bg-[#B0AFAF] rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-[#B0AFAF]">
                        <i class="text-white far fa-times"></i>
                    </button>
                    <div class="space-y-3 text-white">

                        <h3 class="w-full text-2xl font-bold font-['Baloo_Tammudu_2']  lg:text-3xl lg:leading-none">
                            Get secret promo for your next romantic escape!</h3>
                        <p class="">Insert your name and email, we will send you news and special promo to your
                            email.
                        </p>
                    </div>

                    <form action="#" method="POST" class="mt-10">
                        <div class="flex flex-col gap-2 lg:flex-row">

                            <div class="relative lg:max-w-[158px]">
                                <input required="" type="text" placeholder="Your Name*"
                                    class="shadow-lg w-full px-4 py-3 pl-9 rounded-[3px] text-[#000000] font-medium text-[13px] placeholder:text-[#000000] placeholder:font-medium placeholder:text-[13px] focus:ring-2 focus:ring-offset-1 focus:ring-[#F88] focus:outline-none
                                    lg:pl-7">
                                <i
                                    class="fas fa-user absolute top-2/4  left-2 [transform:translate(0%,-50%)] text-[#000000] text-sm"></i>
                            </div>

                            <div class="relative flex-1">
                                <input required="" type="email" placeholder="Your Email*"
                                    class="shadow-lg w-full px-4 py-3 pl-9 rounded-[3px] text-[#000000] font-medium text-[13px] placeholder:text-[#000000] placeholder:font-medium placeholder:text-[13px] focus:ring-2 focus:ring-offset-1 focus:ring-[#F88] focus:outline-none">
                                <i
                                    class="fas fa-envelope absolute top-2/4  left-2 [transform:translate(0%,-50%)] text-[#000000] text-xl"></i>


                                <button type="submit"
                                    class="max-lg:hidden absolute top-2/4  right-1 [transform:translate(0%,-50%)] text-sm font-medium bg-[#000000] text-white px-[10px] py-2 rounded-[3px] focus:ring-1 focus:ring-offset-1  focus:ring-red-100">
                                    Yes, I Want
                                </button>
                            </div>

                            <div class="lg:hidden">
                                <button type="submit"
                                    class="block w-full text-sm font-medium bg-white text-[#000000] px-[10px] py-2 rounded-[3px] focus:ring-1 focus:ring-offset-1 focus:ring-offset-[#000000] focus:ring-white">
                                    Yes, I Want
                                </button>
                            </div>



                        </div>



                        <label
                            class="mt-2 text-sm text-[#000000] font-medium
                                        relative flex  items-center gap-x-2 cursor-pointer">
                            <input required="" type="checkbox" name="fate_type[]" class="absolute opacity-0 peer"
                                checked>

                            <span
                                class="w-[18px] h-[18px]  shadow-lg rounded-sm  bg-white block
                        relative peer-checked:after:absolute peer-checked:after:top-[3px] peer-checked:after:left-[7px] peer-checked:after:w-[5px] peer-checked:after:h-[10px] peer-checked:after:border-[#000000] peer-checked:after:border-r-2 peer-checked:after:border-b-2 peer-checked:after:rotate-45
                        "></span>
                            <span class="text-sm font-medium text-white ">GDPR sentence</span>

                        </label>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


{{-- @push('footer')
    <script>
        function init() {
            const bannerEl = $('#{{ $id }}');
            const popupEl = bannerEl.find('.popup');


            const handleOpenPopup = () => {
                popupEl.fadeIn(200);
            }

            const handleClosePopup = () => {
                popupEl.fadeOut(200);

            }

            $('body').on('click', function(event) {

                var modal = $('#{{ $id }} .popup > div > div');

                if (!modal.is(event.target) && !modal.has(event.target).length) {
                    handleClosePopup();
                }
            });

            $('#{{ $id }} .show-popup-button').on('click', (e) => {
                e.stopPropagation();
                handleOpenPopup()
            });

            $('#{{ $id }} .close-popup-btn').on('click', () => {
                handleClosePopup();
            });


        }
        // Init Popup
        $(document).ready(init)
        // document.addEventListener('livewire:update', init)
    </script>
@endpush --}}
