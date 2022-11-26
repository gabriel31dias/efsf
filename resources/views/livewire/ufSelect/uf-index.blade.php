<div>
    <div class="relative">
       <input
       class="form-control"
          type="text"
          class="form-input"
          placeholder="Pesquisar Uf..."
          wire:model="query"
          wire:keydown.escape="resetValue"
          wire:keydown.tab="resetValue"
          wire:keydown.arrow-up="decrementHighlight"
          wire:keydown.arrow-down="incrementHighlight"
          wire:keydown.enter="selectContact"
          />
       <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          <div class="list-item">Searching...</div>
       </div>
       @if(!empty($query))
       <div class=" absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          @if(!empty($ufs) && $closed == false)
          @foreach($ufs as $i => $item)
          <a
             wire:click="selectItem({{$item['id']}}, '{{$item['acronym']}}')"
             class="text-decoration-none  hover:cursor-pointer hover:bg-sky-600 rounded hover:text-white p-2 list-item list-none {{ $highlightIndex === $i ? 'bg-sky-600 text-white' : '' }}"
             >{{ strtoupper($item['acronym']) }}</a>
          @endforeach
          @else

          @endif
       </div>
       @endif
    </div>
 </div>
