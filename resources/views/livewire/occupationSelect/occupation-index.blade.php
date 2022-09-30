<div>
    <div class="relative">
       <input
       class="form-control"
          type="text"
          class="form-input"
          placeholder="Pesquisar Profissão..."
          wire:model="query"
          wire:keydown.escape="reset1"
          wire:keydown.tab="reset1"
          wire:keydown.arrow-up="decrementHighlight"
          wire:keydown.arrow-down="incrementHighlight"
          wire:keydown.enter="selectContact"
          />
       <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          <div class="list-item">Searching...</div>
       </div>
       @if(!empty($query))
       <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          @if(!empty($occupations) && $closed == false)
          @foreach($occupations as $i => $item)
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
