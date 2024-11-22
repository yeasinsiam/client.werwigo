  <div id="price-per-night-filter" class="group">
      <button type="button" class="text-[14px]  flex justify-between items-center w-full text-[#000000] font-medium">

          Romantic
          <i class="w-5 h-2 leading-none text-black fas fa-sort-up"></i>

      </button>

      <div class="pt-2">
          <input type="text" />
      </div>
  </div>


  {{-- @push('footer')
      <script>
          $(document).ready(() => {
              const searchParams = new URLSearchParams(location.search);

              const defaultRomanticScoringFrom = searchParams.get('romantic-scoring-from');
              const defaultRomanticScoringTo = searchParams.get('romantic-scoring-to');


              const ionRangeSlider = $("#price-per-night-filter input").ionRangeSlider({
                  type: "double",
                  skin: "big",
                  from: defaultRomanticScoringFrom || 1,
                  to: defaultRomanticScoringTo || 5,
                  min: 1,
                  max: 5,
                  hide_min_max: true,
                  hide_from_to: false,
                  extra_classes: "slider-container",
                  onFinish: function(data) {
                      const {
                          from,
                          to
                      } = data;

                      if (typeof livewire !== 'undefined') {
                          livewire.emit('filter-hotel-scoring', {
                              for: 'romantic',
                              from,
                              to
                          })
                      }
                  },
              });



              window.addEventListener('hotel-listing-filter-reseted', event => {
                  ionRangeSlider.data("ionRangeSlider").update({
                      from: 1,
                      to: 5
                  })
              })


              //   $(document).on('click', '#price-per-night-filter > button', (e) => {
              //       const el = $('#price-per-night-filter > div');

              //       if (el.hasClass('slide-down')) {
              //           el.slideUp().removeClass('slide-down');
              //       } else {

              //           el.slideDown().addClass('slide-down');
              //       }
              //   })

          })
      </script>
  @endpush --}}


  @push('header')
      <style>
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
              top: 9px;
          }

          #price-per-night-filter .slider-container .irs-bar {
              height: 3px;
              border: none;
              background: #000000;
              box-shadow: none;
              top: 9px;
          }

          #price-per-night-filter .slider-container .irs-handle {
              top: 0px;
              width: 20px;
              height: 20px;
              border: none;
              background: #000000 !important;
              box-shadow: none;
              cursor: pointer;
          }

          #price-per-night-filter .slider-container .irs-handle:hover {
              background: #000000 !important;
          }

          #price-per-night-filter .slider-container .irs-min,
          #price-per-night-filter .slider-container .irs-max {
              font-size: 13px;
              color: #848383;
              top: 22px;
              background: none;
          }

          #price-per-night-filter .slider-container .irs-from,
          #price-per-night-filter .slider-container .irs-to {
              font-size: 13px;
              color: #848383;
              top: 22px;
              background: none;
          }
      </style>
  @endpush
