<div style="width:100%">
   <div class="relative">
      <input
      class="form-control"
         type="text"
         class="form-input"
         placeholder="Pesquisar Usuário de acesso..."
         wire:model="query"
         wire:keydown.escape="reset1"
         wire:keydown.arrow-up="decrementHighlight"
         wire:keydown.arrow-down="incrementHighlight"
         wire:keydown.enter="selectContact"
         />
      <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
      </div>
      @if(!empty($query))
      <div  class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
         @if(!empty($users) && $closed == false)
         @foreach($users as $i => $user)
         <a
         
            wire:click="selectItem({{$user['id']}}, '{{$user['name']}}')"
            class="text-decoration-none  hover:cursor-pointer hover:bg-sky-600 rounded hover:text-white p-2 list-item list-none {{ $highlightIndex === $i ? 'bg-sky-600 text-white' : '' }}"
            >{{ $user['name'] }}</a>
         @endforeach
         @else

         @endif
      </div>
      @endif
   </div>
</div>
