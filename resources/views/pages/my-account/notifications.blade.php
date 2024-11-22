@extends('layouts.main.index')
@section('meta-title', 'Notifications - oooHotels')

@section('hideHeaderFooter', true)

@section('content')
    <div class="font-['SF Pro Display']  max-w-xl mx-auto px-4">
        <header class="flex items-end justify-between max-w-xl mx-auto pt-14">
            <a href="{{ url()->previous() }}" class="flex items-center justify-center w-5 h-5 bg-white rounded-sm">
                <i class="leading-none text-md far fa-angle-left"></i>
            </a>
            <h3 class="text-lg font-semibold">Notifications</h3>
            <div></div>
        </header>

        <div class="mt-10 space-y-3">
            <div class="flex items-center gap-2">
                <i class="fas fa-circle text-[#000000] text-[7px] "></i>
                <div class="flex flex-1 items-start gap-[10px] p-3 bg-[rgba(249,72,118,0.06)] rounded-lg">
                    <svg class="mt-2" width="20" height="20" viewBox="0 0 28 28" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.5781 9.12333L14.5948 14.3267C14.2331 14.5367 13.7781 14.5367 13.4048 14.3267L4.42143 9.12333C3.77976 8.74999 3.61643 7.87499 4.10643 7.32666C4.44476 6.94166 4.82976 6.62666 5.2381 6.40499L11.5614 2.90499C12.9148 2.14666 15.1081 2.14666 16.4614 2.90499L22.7848 6.40499C23.1931 6.62666 23.5781 6.95333 23.9164 7.32666C24.3831 7.87499 24.2198 8.74999 23.5781 9.12333Z"
                            fill="#000000" />
                        <path
                            d="M13.3349 16.4967V24.4533C13.3349 25.34 12.4366 25.9233 11.6432 25.5383C9.2399 24.36 5.19156 22.155 5.19156 22.155C3.76823 21.35 2.60156 19.32 2.60156 17.6517V11.6317C2.60156 10.71 3.5699 10.1267 4.36323 10.5817L12.7516 15.4467C13.1016 15.6683 13.3349 16.065 13.3349 16.4967Z"
                            fill="#000000" />
                        <path
                            d="M14.665 16.4967V24.4533C14.665 25.34 15.5634 25.9233 16.3567 25.5383C18.76 24.36 22.8084 22.155 22.8084 22.155C24.2317 21.35 25.3984 19.32 25.3984 17.6517V11.6317C25.3984 10.71 24.43 10.1267 23.6367 10.5817L15.2484 15.4467C14.8984 15.6683 14.665 16.065 14.665 16.4967Z"
                            fill="#000000" />
                    </svg>
                    <div class="flex justify-between flex-1">
                        <div class="flex flex-col">
                            <h4 class="text-sm font-semibold">Request Accepted</h4>
                            <span class="text-xs"><b>Love Villa </b> Accepted your Request</span>
                        </div>
                        <span class="text-[10px] font-semibold whitespace-nowrap">9.56 AM</span>
                    </div>
                </div>
            </div>

            <div class="flex items-start gap-[10px] p-3 pl-0  rounded-lg">
                <svg class="mt-2" width="20" height="20" viewBox="0 0 28 28" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.8335 2.33333H8.16683C4.94683 2.33333 2.3335 4.935 2.3335 8.14333V15.12V16.2867C2.3335 19.495 4.94683 22.0967 8.16683 22.0967H9.91683C10.2318 22.0967 10.6518 22.3067 10.8502 22.5633L12.6002 24.885C13.3702 25.9117 14.6302 25.9117 15.4002 24.885L17.1502 22.5633C17.3718 22.2717 17.7218 22.0967 18.0835 22.0967H19.8335C23.0535 22.0967 25.6668 19.495 25.6668 16.2867V8.14333C25.6668 4.935 23.0535 2.33333 19.8335 2.33333ZM9.3335 14C8.68016 14 8.16683 13.475 8.16683 12.8333C8.16683 12.1917 8.69183 11.6667 9.3335 11.6667C9.97516 11.6667 10.5002 12.1917 10.5002 12.8333C10.5002 13.475 9.98683 14 9.3335 14ZM14.0002 14C13.3468 14 12.8335 13.475 12.8335 12.8333C12.8335 12.1917 13.3585 11.6667 14.0002 11.6667C14.6418 11.6667 15.1668 12.1917 15.1668 12.8333C15.1668 13.475 14.6535 14 14.0002 14ZM18.6668 14C18.0135 14 17.5002 13.475 17.5002 12.8333C17.5002 12.1917 18.0252 11.6667 18.6668 11.6667C19.3085 11.6667 19.8335 12.1917 19.8335 12.8333C19.8335 13.475 19.3202 14 18.6668 14Z"
                        fill="#000000" />
                </svg>

                <div class="flex justify-between flex-1">
                    <div class="flex flex-col">
                        <h4 class="text-sm font-semibold">Message Received</h4>
                        <span class="text-xs text-[#74737A]">You Received a Message from Villa Palace</span>
                    </div>
                    <span class="text-[10px] whitespace-nowrap text-[#74737A]">9.56 AM</span>
                </div>
            </div>
            <div class="flex items-start gap-[10px] p-3 pl-0  rounded-lg">

                <svg class="mt-2" width="20" height="20" viewBox="0 0 25 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.5289 1.78945L16.7107 6.18226C16.8969 6.50984 17.1483 6.79515 17.4492 7.02032C17.7501 7.24549 18.0939 7.40565 18.4592 7.49076L22.405 8.14501C24.9272 8.5656 25.5152 10.4037 23.7047 12.2419L20.6255 15.3417C20.357 15.6454 20.1604 16.0065 20.0505 16.3977C19.9406 16.789 19.9203 17.2002 19.9911 17.6005L20.8731 21.4325C21.5694 24.4545 19.9601 25.6384 17.3141 24.0495L13.6175 21.8375C13.2404 21.6383 12.8209 21.5342 12.3951 21.5342C11.9692 21.5342 11.5497 21.6383 11.1727 21.8375L7.47446 24.0495C4.82847 25.6228 3.21921 24.4545 3.91553 21.4325L4.79752 17.602C4.85656 17.197 4.82765 16.784 4.71278 16.3914C4.59791 15.9987 4.39982 15.6358 4.13216 15.3277L1.05136 12.2263C-0.759053 10.4037 -0.171055 8.5656 2.35114 8.12943L6.29692 7.47518C6.66331 7.39295 7.00838 7.23392 7.30965 7.00847C7.61092 6.78302 7.86163 6.49619 8.04544 6.16669L10.2272 1.77388C11.4187 -0.593882 13.3374 -0.593882 14.5289 1.78945Z"
                        fill="#000000" />
                </svg>


                <div class="flex justify-between flex-1">
                    <div class="flex flex-col">
                        <h4 class="text-sm font-semibold">Message Received</h4>
                        <span class="text-xs text-[#74737A]">You Received a Message from Villa Palace</span>
                    </div>
                    <span class="text-[10px] whitespace-nowrap text-[#74737A]">9.56 AM</span>
                </div>
            </div>



        </div>



    </div>

@endsection
