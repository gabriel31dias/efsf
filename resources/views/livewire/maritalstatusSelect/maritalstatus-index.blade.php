<div>
    <div class="relative">
       <input
       class="form-control"
          type="text"
          class="form-input"
          placeholder="Pesquisar estado civil..."
          wire:model="query"
          wire:keydown.escape="reset1"
          wire:keydown.arrow-up="decrementHighlight"
          wire:keydown.arrow-down="incrementHighlight"
          wire:keydown.enter="selectContact"
          />
       <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          <div class="">Searching...</div>
       </div>
       @if(!empty($query))
       <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
          @if(!empty($maritalStatus) && $closed == false)
          @foreach($maritalStatus as $i => $item)
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
