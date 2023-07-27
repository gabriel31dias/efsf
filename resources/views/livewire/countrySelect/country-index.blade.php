<div>
    <div   class="relative">
       <input
       class="form-control"
          type="text"
          class="form-input"
          placeholder="Pesquisar pais..."
          wire:model="query"
          wire:keydown.escape="reset1"
          wire:keydown.arrow-up="decrementHighlight"
          wire:keydown.arrow-down="incrementHighlight"
          wire:keydown.enter="selectCountry"
          />
       <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          <div class="">Searching...</div>
       </div>
       @if(!empty($query))
       <div style="max-height: 200px;
       overflow-y: scroll;" class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          @if(!empty($countries) && $closed == false)
          @foreach($countries as $i => $item)
          <a
             wire:click="selectItem({{$item['id']}}, '{{$item['name']}}')"
             class="text-decoration-none  hover:cursor-pointer hover:bg-sky-600 rounded hover:text-white p-2 list-item list-none {{ $highlightIndex === $i ? 'bg-sky-600 text-white' : '' }}"
             >{{ $item['name'] }}</a>
          @endforeach
          @else

          @endif
       </div>
       @endif
    </div>
 </div>
