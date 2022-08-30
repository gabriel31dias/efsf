<div>
   <div class="relative">
      <input
      class="form-control"
         type="text"
         class="form-input"
         placeholder="Pesquisar Perfis de acesso..."
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
         @if(!empty($profiles) && $closed == false)
         @foreach($profiles as $i => $profile)
         <a
            wire:click="selectItem({{$profile['id']}}, '{{$profile['name_profile']}}')"
            class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
            >{{ $profile['name_profile'] }}</a>
         @endforeach
         @else

         @endif
      </div>
      @endif
   </div>
</div>
