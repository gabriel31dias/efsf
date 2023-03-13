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
                                    <label class="form-label">UF</label>
                                    @livewire('uf-select.uf-select', ['defaultValue' => isset($this->registryDate->incorporated_registry) ? $this->registryDate->incorporated_registry->uf : null])
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="mb-3">
                                    <label class="form-label">Município</label>
                                    @livewire('county-select.county-select', ['defaultValue' => isset($this->registryDate->incorporated_registry) ? $this->registryDate->incorporated_registry->county : null])
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="mb-3">
                                    <label class="form-label">Cartório Incorporado</label>
                                    @livewire('registry-select.registry-select', ['defaultValue' => isset($this->registryDate->incorporated_registry) ? $this->registryDate->incorporated_registry : null])
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
                             <div class="col-lg-12">
                              <div class="row">
                                    <div class="col-lg-7">
                                       <label class="form-label">Arquivo</label>

                                    <input class="block w-full text-sm file:text-white 
                                    file:bg-gradient-to-r from-sky-700 to-sky-900
                                    bg-gray-50 border-none shadow-md border file:border-none file:p-2 rounded-lg file:cursor-pointer cursor-pointer focus:outline-none" wire:model="document.file" type="file">
                                    @error('document.file') <span class="text-danger">{{ $message }}</span> @enderror
                                 </div>
                                    
                                    <div class="col-lg-4">
                                       <label class="form-label">Descrição</label>
                                      <div class="input-group input-group-flat">
                                         <input wire:model="document.description" type="text"
                                            class="form-control" autocomplete="off" required>
                                      </div>
                                      @error('document.description') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-lg-1 ">
                                       <label class="form-label">&nbsp;</label>

                                       <a wire:click="storeDocument" class="btn btn-primary items-center ">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                          <svg class="block" xmlns="http://www.w3.org/2000/svg" class="icon" width="12" height="12" viewBox="0 0 24 24"
                                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                             <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                             <line x1="12" y1="5" x2="12" y2="19" />
                                             <line x1="5" y1="12" x2="19" y2="12" />
                                          </svg>
                                       </a>
                                    </div>
                              </div>
                             </div>

                             @if (sizeof($documents))
                              <div class="col-lg-12 bg-slate-50 p-1 shadow-md mt-4">
                              <div>
                                 <h2 class="text-base font-bold text-gray-600 mb-2">Documentos Cadastrados</h2>
                              </div>
                              @foreach ($documents as $document)
                                 <ul>
                                    <li class="border-y border-gray-300 py-2 flex justify-between px-2">
                                       {{ $document['description'] ?? '' }}
                                       <a href="" target="_blank" >
                                          <a onclick="window.open('/{{ str_replace("public","storage", $document['path']) }}', '_blank')" class="btn btn-primary inline-flex">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                             <circle cx="12" cy="12" r="2"></circle>
                                             <path d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033"></path>
                                             <path d="M15 19l2 2l4 -4"></path>
                                          </svg>
                                          Abrir documento
                                       </a>
                                    </li>
                                 </ul>
                              @endforeach

                             </div>
                             @endif


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