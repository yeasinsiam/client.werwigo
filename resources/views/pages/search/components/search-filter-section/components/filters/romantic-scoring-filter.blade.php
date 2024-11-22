  <div id="price-per-night-filter" class="flex items-center gap-3 group">
      {{-- <button type="button" class="text-[14px]  flex justify-between items-center w-full text-[#000000] font-medium">

          Romantic
          <i class="w-5 h-2 leading-none text-black fas fa-sort-up"></i>

      </button> --}}

      <span class="text-[#0F172A] text-sm font-medium pt-3 w-[68px]">Romantic</span>

      <div class="relative flex-1 pt-2">
          <input type="text" />

          <div class="flex justify-between pt-1">
              <span class="text-[#596372] text-xs">€</span>
              <span class="text-[#596372] text-xs">€€€</span>
          </div>
      </div>
  </div>



  @push('header')
      {{-- <style>
          #price-per-night-filter .slider-container.irs {
              height: 40px;
          }

          #price-per-night-filter .slider-container .irs {
              font-family: Poppins !important;
          }

          #price-per-night-filter .slider-container .irs-line {
              height: 3px;
              border: none;
              background: #e3e3e3;
              /* top: 9px; */
          }

          #price-per-night-filter .slider-container .irs-bar {
              height: 3px;
              border: none;
              background: #6B6B6B;
              box-shadow: none;
              /* top: 9px; */
          }

          #price-per-night-filter .slider-container .irs-handle {
              /* top: 0px; */
              width: 20px;
              height: 20px;
              border: none;
              background: #6B6B6B !important;
              box-shadow: none;
              cursor: pointer;
          }

          #price-per-night-filter .slider-container .irs-handle:hover {
              background: #6B6B6B !important;
          }

          /* #price-per-night-filter .slider-container .irs-min,
                #price-per-night-filter .slider-container .irs-max {
                    font-size: 13px;
                    color: #848383;
                    top: 22px;
                    background: none;
                } */

          #price-per-night-filter .slider-container .irs-from,
          #price-per-night-filter .slider-container .irs-to {
              font-size: 13px;
              color: #848383;
              background: white;
              filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.05));
              top: -10px;
              padding: 3px 7px;
              border: .5px solid #e3e3e3;
              /* position: relative; */
              /* top: 22px; */
              /* background: none; */
          }


          #price-per-night-filter .slider-container .irs-from::after,
          #price-per-night-filter .slider-container .irs-to::after {
              /* content: '';
                                                                                            display: block;
                                                                                            position: absolute;
                                                                                            top: 100%;
                                                                                            left: 50%;
                                                                                            width: 0;
                                                                                            height: 0;
                                                                                            border-left: 5px solid transparent;
                                                                                            border-right: 5px solid transparent;
                                                                                            filter: drop-shadow(-1px 8px 0px #e3e3e3);
                                                                                            transform: translateX(-50%);
                                                                                            border-top: 7px solid #fff; */
              position: absolute;
              bottom: -1.5px;
              left: 50%;
              height: 7px;
              width: 7px;
              border: .5px solid #e3e3e3;
              border-right: none;
              border-top: none;
              content: " ";
              position: absolute;
              background: white;
              pointer-events: none;
              transform: rotate(-45deg) translateX(-50%);
          }
      </style> --}}
  @endpush
