<div >
       <input
       class="form-control"
          type="text"
          class="form-input"
          placeholder="Pesquisar Posto de atendimento..."
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
          @if(!empty($stations) && $closed == false)
          @foreach($stations as $i => $station)
          <a
             wire:click="selectItem({{$station['id']}}, '{{$station['service_station_name']}}')"
             class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
             >{{ $station['service_station_name'] }}</a>
          @endforeach
          @else

          @endif
       </div>
       @endif
 </div>

