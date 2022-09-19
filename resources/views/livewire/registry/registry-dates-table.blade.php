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
                      
                      <button type="button" class="text-red-700 border-2 border-red-700 hover:bg-red-700 
                                                   hover:text-white focus:ring-4 font-medium rounded-lg 
                                                     text-sm p-2.5 text-center inline-flex items-center mr-2 ">
                         <i class="ti ti-trash"></i>
                      </button>
                   </div>

                   </td>

                </tr>
                @endforeach

             </tbody>
          </table>
       </div>
    </div>
 </div>