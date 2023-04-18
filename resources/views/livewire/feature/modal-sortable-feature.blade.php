<div x-data="{modal: @entangle('modal')}">
    <button type="button" class="border-2 bg-blue-700 hover:bg-blue-800 
    text-white focus:ring-4 font-medium rounded-lg 
      text-sm p-2.5 text-center inline-flex items-center mr-2" x-data="{id:'modal-edit-registry'}"
        x-on:click="modal=true">
        Ordenar
    </button>
    <section :class="{'absolute h-screen flex items-center justify-center': modal}">
        <div class="fixed inset-0 z-10 flex flex-col items-center justify-end overflow-y-auto bg-gray-600 bg-opacity-50 sm:justify-start"
            x x-show="modal"
            x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="w-full px-2 py-20 transition-all transform sm:max-w-2xl" role="dialog" aria-modal="true"
                aria-labelledby="modal-headline" x-show="modal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4" x-on:click.away="modal=false">
                <div class="bg-white rounded-md w-full h-full shadow-sm p-3">
                    <h1 class="text-lg font-black text-gray-600 mb-4">Ordenar</h1>

                    <div>
                        <table class="w-full">
                            <thead>
                              <tr>
                                <th class="px-4 py-2">Ordem</th>
                                <th class="px-4 py-2">Nome</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($this->features as $key => $feature)
                            <tr class="bg-white border-b hover:bg-gray-500 hover:text-gray-800">
                                <td class="px-4 py-2 w-10">
                                  <select wire:model='features.{{ $key }}.order' wire:change="changeOrder({{ $key }}, $event.target.value)" class="w-10 rounded-md border-gray-300">
                                    @for ($i = 1; $i <= sizeof($this->features); $i++)
                                     <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                  </select>
                                </td>
                                <td class="px-4 py-2">
                                    {{ $feature['name'] }}
                                </td>
                              </tr>
                              @endforeach

                            </tbody>
                          </table>
                    </div>
                    <div class="flex justify-end mt-4">
                      <button type="button" x-on:click="modal = false" class="text-white bg-gray-500 hover:bg-gray-600 
                      hover:text-white focus:ring-4 font-medium rounded-lg 
                        text-sm p-2.5 text-center inline-flex items-center mr-2">Cancelar</button>

                      <button type="button" wire:click="saveOrder" class="text-white bg-blue-500 hover:bg-blue-600 
                      hover:text-white focus:ring-4 font-medium rounded-lg 
                        text-sm p-2.5 text-center inline-flex items-center mr-2">Salvar Ordem</button>
                   </div>
                </div>
            </div>
            
        </div>

    </section>
</div>