<div>
   <div class="relative">
      <input
      class="form-control ps-0"
         type="text"
         class="form-input"
         placeholder="Search Tipo logradouro..."
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

         @if(!empty($type_streets) && $closed == false)
         @foreach($type_streets as $i => $type_street)
         <a
            wire:click="selectItem({{$type_street['id']}}, '{{$type_street['name_type_street']}}')"
            class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
            >{{ $type_street['name_type_street'] }}</a>
         @endforeach
         @else
         <div class="list-item">No results!</div>
         @endif
      </div>
      @endif
   </div>
</div>
