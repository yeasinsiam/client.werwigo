  <div class="flex flex-wrap" wire:sortable="handleSort">



      @foreach ($gallery as $image)
          <div wire:sortable.item="{{ $image->id }}" class="m-3" wire:key='hotel-gallery-item-{{ $image->id }}'
              @style(['position: relative'])>
              <img src="{{ $image->getUrl() }}" srcset="{{ $image->getSrcset() }}" alt="{{ $image->name }}"
                  class="w-44 h-44 rounded-lg object-cover hover:cursor-move" />



              @if ($gallery->count() !== 1)
                  <a onclick="confirm('Delete this image?') || event.stopImmediatePropagation()"
                      wire:click="removeImage('{{ $image->id }}')" class="text-danger" data-bs-toggle="tooltip"
                      data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i
                          class="fas fa-trash absolute top-1 right-2 cursor-pointer text-red-700"></i></a>
              @endif

          </div>
      @endforeach





  </div>
