<div>
    <div class="relative">
       <input
       autocomplete="off"
       class="form-control"
          type="text"
          class="form-input"
          placeholder="Pesquisar unidade..."
          wire:model="query"
          wire:keydown.escape="resetValue"
          wire:keydown.arrow-up="decrementHighlight"
          wire:keydown.arrow-down="incrementHighlight"
          wire:keydown.enter="selectContact"
          />

       @if(!empty($query))
       <div style="max-height: 200px;
       overflow-y: scroll;" class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          @if(!empty($units) && $closed == false)
          @foreach($units as $i => $item)
          <a
             wire:click="selectItem({{$item['id']}}, '{{$item['name']}}')"
             class="text-decoration-none hover:cursor-pointer hover:bg-sky-600 rounded hover:text-white p-2 list-item list-none {{ $highlightIndex === $i ? 'bg-sky-600 text-white' : '' }}"
             >{{ $item['name'] }}</a>
          @endforeach
          @else

          @endif
       </div>
       @endif
    </div>
 </div>
