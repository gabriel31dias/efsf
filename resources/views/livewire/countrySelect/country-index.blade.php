<div>
    <div class="relative">
       <input
       class="form-control"
          type="text"
          class="form-input"
          placeholder="Pesquisar Pais..."
          wire:model="query"
          wire:keydown.escape="reset"
          wire:keydown.tab="reset"
          wire:keydown.arrow-up="decrementHighlight"
          wire:keydown.arrow-down="incrementHighlight"
          wire:keydown.enter="selectContact"
          />
       <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          <div class="list-item">Searching...</div>
       </div>
       @if(!empty($query))
       <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="reset"></div>
       <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          @if(!empty($countries) && $closed == false)
          @foreach($countries as $i => $item)
          <a
             wire:click="selectItem({{$item['id']}}, '{{$item['name']}}')"
             class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
             >{{ $item['name'] }}</a>
          @endforeach
          @else

          @endif
       </div>
       @endif
    </div>
 </div>