  <div id="intimate-scoring-filter" class="group">
      <button type="button" class="text-[14px]  flex justify-between items-center w-full text-[#A929E5] font-medium">
          Intimate
          <i class="w-5 h-2 leading-none text-black fas fa-sort-up"></i>
      </button>

      <div class="pt-2">
          <input type="text" />
      </div>
  </div>

  {{--
  @push('footer')
      <script>
          $(document).ready(() => {
              const searchParams = new URLSearchParams(location.search);

              const defaultIntimateScoringFrom = searchParams.get('intimate-scoring-from');
              const defaultIntimateScoringTo = searchParams.get('intimate-scoring-to');


              const ionRangeSlider = $("#intimate-scoring-filter input").ionRangeSlider({
                  type: "double",
                  skin: "big",
                  from: defaultIntimateScoringFrom || 1,
                  to: defaultIntimateScoringTo || 5,
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
                              for: 'intimate',
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
          #intimate-scoring-filter .slider-container.irs {
              height: 40px;
          }

          #intimate-scoring-filter .slider-container .irs {
              font-family: Poppins !important;
          }

          #intimate-scoring-filter .slider-container .irs-line {
              height: 3px;
              border: none;
              background: #e3e3e3;
              top: 9px;
          }

          #intimate-scoring-filter .slider-container .irs-bar {
              height: 3px;
              border: none;
              background: #A929E5;
              box-shadow: none;
              top: 9px;
          }

          #intimate-scoring-filter .slider-container .irs-handle {
              top: 0px;
              width: 20px;
              height: 20px;
              border: none;
              background: #A929E5 !important;
              box-shadow: none;
              cursor: pointer;
          }

          #intimate-scoring-filter .slider-container .irs-handle:hover {
              background: #A929E5 !important;
          }

          #intimate-scoring-filter .slider-container .irs-min,
          #intimate-scoring-filter .slider-container .irs-max {
              font-size: 13px;
              color: #848383;
              top: 22px;
              background: none;
          }

          #intimate-scoring-filter .slider-container .irs-from,
          #intimate-scoring-filter .slider-container .irs-to {
              font-size: 13px;
              color: #848383;
              top: 22px;
              background: none;
          }
      </style>
  @endpush
