  <div id="luxury-scoring" class="group">
      <button type="button" class="text-sm  flex justify-between items-center w-full text-[#000] font-medium">
          Luxurious
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

              const defaultLuxuryScoringFrom = searchParams.get('luxury-scoring-from');
              const defaultLuxuryScoringTo = searchParams.get('luxury-scoring-to');

              const ionRangeSlider = $("#luxury-scoring input").ionRangeSlider({
                  type: "double",
                  skin: "big",
                  from: defaultLuxuryScoringFrom || 1,
                  to: defaultLuxuryScoringTo || 5,
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
                              for: 'luxury',
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


          })
      </script>
  @endpush --}}


  @push('header')
      <style>
          #luxury-scoring .slider-container.irs {
              height: 40px;
          }

          #luxury-scoring .slider-container .irs {
              font-family: Poppins !important;
          }

          #luxury-scoring .slider-container .irs-line {
              height: 3px;
              border: none;
              background: #e3e3e3;
              top: 9px;
          }

          #luxury-scoring .slider-container .irs-bar {
              height: 3px;
              border: none;
              background: #000;
              box-shadow: none;
              top: 9px;
          }

          #luxury-scoring .slider-container .irs-handle {
              top: 0px;
              width: 20px;
              height: 20px;
              border: none;
              background: #000 !important;
              box-shadow: none;
              cursor: pointer;
          }

          #luxury-scoring .slider-container .irs-handle:hover {
              background: #000 !important;
          }

          #luxury-scoring .slider-container .irs-min,
          #luxury-scoring .slider-container .irs-max {
              font-size: 13px;
              color: #848383;
              top: 22px;
              background: none;
          }

          #luxury-scoring .slider-container .irs-from,
          #luxury-scoring .slider-container .irs-to {
              font-size: 13px;
              color: #848383;
              top: 22px;
              background: none;
          }
      </style>
  @endpush
