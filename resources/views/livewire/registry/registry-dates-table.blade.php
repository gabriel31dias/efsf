<div>
    <div class="flex justify-between mt-4">
       <div class="text-lg font-black">
          Datas de Abertura e Encerramento do Cartório
       </div>
       
       <livewire:registry.registry-date-modal-create :registry_id="$registry_id" />

    </div>

    <div class="card-body">
       <div id="table-default" class="table-responsive">
          <table class="table">
             <thead>
                <tr>
                   <th><button class="table-sort" data-sort="sort-city">Data de Abertura</button></th>
                   <th><button class="table-sort" data-sort="sort-type">Data de Encerramento</button></th>
                   <th><button class="table-sort" data-sort="sort-score">Observação</button></th>
                   <th></th>
                </tr>
             </thead>
             <tbody class="table-tbody">
                @foreach ($dates as $date)
                    
                <tr class="hover:bg-gray-200 hover:text-black">
                   <td class="sort-name">{{ $date->created_date->format('d/m/Y') }}</td>
                   <td class="sort-city">{{ $date->closing_date ? $date->closing_date->format('d/m/Y') : '' }}</td>
                   <td class="sort-type">{{ $date->note }}</td>
                   <td>
                      <div class="flex">
                      <livewire:registry.registry-date-modal-edit :registryDate="$date" :wire:key="$date->id" />
                      @livewire('global.delete-button', ['objectModel' => $date, 'redirectBack' => false, 'type' => 'table', 'deleteEvent' => 'refreshRegistryForm'], key('delete' . $date->id))
                      
                   </div>

                   </td>

                </tr>
                @endforeach

             </tbody>
          </table>
       </div>
    </div>
 </div>