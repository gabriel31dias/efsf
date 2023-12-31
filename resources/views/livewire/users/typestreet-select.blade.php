<div>
   <div class="relative">
      <input
      class="form-control"
         type="text"
         class="form-input"
         placeholder="Tipo logradouro..."
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

         @if(!empty($type_streets) && $closed == false)
         @foreach($type_streets as $i => $type_street)
         <a
            wire:click="selectItem({{$type_street['id']}}, '{{$type_street['name_type_street']}}')"
            class="text-decoration-none hover:cursor-pointer hover:bg-sky-600 rounded hover:text-white p-2 list-item list-none {{ $highlightIndex === $i ? 'bg-sky-600 text-white' : '' }}"
            >{{ $type_street['name_type_street'] }}</a>
         @endforeach
         @else

         @endif
      </div>
      @endif
   </div>
</div>
