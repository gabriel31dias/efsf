<div >
    <div  class="relative">
       <input

       autocomplete="off"
       class="form-control"
          type="text"
          class="form-input"
          placeholder="Pesquisar cartorio..."
          wire:model="query"
          wire:keydown.escape="  "
          wire:keydown.arrow-up="decrementHighlight"
          wire:keydown.arrow-down="incrementHighlight"
          wire:keydown.enter="selectContact"
          />
{{--        <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          <div class="list-item">Searching...</div>
       </div> --}}
       @if(!empty($query))
       <div style=" height: 200px;
       overflow-y: scroll;" class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          @if(!empty($registries) && $closed == false)
          @foreach($registries as $i => $item)
          <a
             wire:click="selectItem({{$item['id']}}, '{{$item['name']}}')"
             class="text-decoration-none  hover:cursor-pointer hover:bg-sky-600 rounded hover:text-white p-2 list-item list-none {{ $highlightIndex === $i ? 'highlight' : '' }}"
             >{{ $item['name'] }}</a>
          <div class="fixed top-0 bottom-0 left-0 right-0 -z-10" wire:click="resetValue"></div>

          @endforeach
          @else

          @endif
       </div>
       @endif
    </div>
 </div>
