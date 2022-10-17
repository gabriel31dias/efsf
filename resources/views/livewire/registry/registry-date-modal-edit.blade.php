<div x-data="{modal: @entangle('modal')}">
    <button type="button" class="text-blue-700 border-2 border-blue-700 hover:bg-blue-700 
    hover:text-white focus:ring-4 font-medium rounded-lg 
      text-sm p-2.5 text-center inline-flex items-center mr-2" x-data="{id:'modal-edit-registry'}"
        x-on:click="modal=true">
        <i class="ti ti-pencil"></i>
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
                    <h1 class="text-lg font-black text-gray-600 mb-4">Editar Data</h1>

                    <div>
                            <div class="row" >
                                <div class="col-lg-6">
                                   <div class="mb-3">
                                      <label class="form-label">Data da Criação</label>
                                      <div class="input-group input-group-flat">
                                         <input wire:model="fieldsUpdateDate.created_date" type="date"
                                            class="form-control" autocomplete="off" required>
                                      </div>
                                      @error('fieldsUpdateDate.created_date') <span class="text-danger"> {{ $message }}</span> @enderror
                                   </div>
                                </div>
        
                                <div class="col-lg-6">
                                   <div class="mb-3">
                                      <label class="form-label">Data de Encerramento</label>
                                      <div class="input-group input-group-flat">
                                         <input wire:model="fieldsUpdateDate.closing_date" type="date"
                                            class="form-control" autocomplete="off" required>
                                      </div>
                                      @error('fieldsUpdateDate.closing_date') <span class="text-danger"> {{ $message }}</span> @enderror
                                   </div>
                                </div>

                                <div class="col-lg-6">
                                 <div class="mb-3">
                                    <label class="form-label">Data da Incorporação</label>
                                    <div class="input-group input-group-flat">
                                       <input wire:model="fieldsUpdateDate.incorporated_date" type="date"
                                          class="form-control" autocomplete="off" required>
                                    </div>
                                    @error('fieldsUpdateDate.incorporated_date') <span class="text-danger"> {{ $message }}</span> @enderror
                                 </div>
                              </div>
      
                              <div class="col-lg-6">
                                 <div class="mb-3">
                                    <label class="form-label">Data de Desincorporação</label>
                                    <div class="input-group input-group-flat">
                                       <input wire:model="fieldsUpdateDate.unincorporated_date" type="date"
                                          class="form-control" autocomplete="off" required>
                                    </div>
                                    @error('fieldsUpdateDate.unincorporated_date') <span class="text-danger"> {{ $message }}</span> @enderror
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="mb-3">
                                    <label class="form-label">Cartório Incorporado</label>
                                    @livewire('registry-select.registry-select', ['defaultValue' => $this->registryDate->incorporated_registry])
                                    @error('fieldsUpdateDate.created_date') <span class="text-danger"> {{ $message }}</span> @enderror
                                 </div>
                              </div>
      
                              <div class="col-lg-6">
                                 <div class="mb-3">
                                    <label class="form-label">N do Acervo</label>
                                    <select wire:model="fieldsUpdateDate.collection_number" class="form-control ps-0"
                                       name="select">
                                       <option value="" selected >Selecione</option>
                                       @for ($i = 2; $i <= 30; $i++)
                                          @if (!in_array($i,$this->ignore_number))
                                             <option  value="{{ $i }}">{{ $i }}</option> 
                                          @endif
                                       @endfor
                                    </select>
                                    @error('fieldsUpdateDate.collection_number') <span class="text-danger"> {{ $message }}</span> @enderror
                                 </div>
                              </div>
        
                                <div class="col-lg-12">
                                   <div class="mb-3">
                                      <label class="form-label">Observação</label>
                                      <div class="input-group input-group-flat">
                                         <input wire:model="fieldsUpdateDate.note" type="text"
                                            class="form-control" autocomplete="off" required>
                                      </div>
                                      @error('fieldsUpdateDate.note') <span class="text-danger"> {{ $message }}</span> @enderror
                                   </div>
                                </div>
                             </div>


                             <div class="flex justify-end mt-4">
                                <button x-on:click="modal = false" class="text-white bg-gray-500 hover:bg-gray-600 
                                hover:text-white focus:ring-4 font-medium rounded-lg 
                                  text-sm p-2.5 text-center inline-flex items-center mr-2">Cancelar</button>

                                <button wire:click="saveRegistry" class="text-white bg-blue-500 hover:bg-blue-600 
                                hover:text-white focus:ring-4 font-medium rounded-lg 
                                  text-sm p-2.5 text-center inline-flex items-center mr-2">Atualizar</button>
                             </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>