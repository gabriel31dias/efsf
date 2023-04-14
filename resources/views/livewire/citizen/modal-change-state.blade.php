<div>
    <div x-data="{modal: @entangle('modal')}">
        <button type="button" class=" {{ \App\Models\Citizen::STATE_BADGE[$this->citizen->state] }}  focus:ring-4 rounded-lg 
          text-sm p-2.5 text-center inline-flex items-center mr-2 font-bold text-white" x-data="{id:'modal-change-state'}"
            x-on:click="modal=true">
            {{ \App\Models\Citizen::STATE_LABELS[$this->citizen->state] }}
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
                        <h1 class="text-lg font-black text-gray-600 mb-4">Alterar Condição do Cadastro </h1>
    
                        <div>
                                <div class="row" >
                                    <div class="col-lg-6">
                                       <div class="mb-3">
                                          <label class="form-label">Condição</label>
                                          <div class="input-group input-group-flat">
                                             <select wire:model="state" type="date"
                                                class="form-control" autocomplete="off" required>
                                                <option value="{{ \App\Models\Citizen::STATE_ACTIVE }}">{{ \App\Models\Citizen::STATE_LABELS[\App\Models\Citizen::STATE_ACTIVE] }}</option>
                                                <option value="{{ \App\Models\Citizen::STATE_INACTIVE }}">{{ \App\Models\Citizen::STATE_LABELS[\App\Models\Citizen::STATE_INACTIVE] }}</option>
                                                <option value="{{ \App\Models\Citizen::STATE_DECEASED }}">{{ \App\Models\Citizen::STATE_LABELS[\App\Models\Citizen::STATE_DECEASED] }}</option>

                                            </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Documento Condição</label>

                                        @if (isset($this->document))
                                            <a href="" target="_blank" >
                                                <a onclick="window.open('/{{ str_replace("public","storage", $document['path']) }}', '_blank')" class="btn btn-primary inline-flex">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="2"></circle>
                                                    <path d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033"></path>
                                                    <path d="M15 19l2 2l4 -4"></path>
                                                </svg>
                                                {{ $document['description'] ?? 'Abrir Documento' }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label class="form-label">Observação</label>
                                       <div class="input-group input-group-flat">
                                          <input wire:model="state_description" type="text"
                                             class="form-control" autocomplete="off" required>
                                       </div>
                                     </div>
                                </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                              <div class="col-lg-7">
                                                 <label class="form-label">Arquivo</label>
          
                                              <input class="block w-full text-sm file:text-white 
                                              file:bg-gradient-to-r from-sky-700 to-sky-900
                                              bg-gray-50 border-none shadow-md border file:border-none file:p-2 rounded-lg file:cursor-pointer cursor-pointer focus:outline-none" wire:model="state_document.file" type="file">
                                           </div>
                                              
                                              <div class="col-lg-5">
                                                 <label class="form-label">Descrição Arquivo</label>
                                                <div class="input-group input-group-flat">
                                                   <input wire:model="state_document.description" type="text"
                                                      class="form-control" autocomplete="off" required>
                                                </div>
                                              </div>
                                        </div>

                                 <div class="flex justify-end mt-4">
                                    <button type="button" x-on:click="modal = false" class="text-white bg-gray-500 hover:bg-gray-600 
                                    hover:text-white focus:ring-4 font-medium rounded-lg 
                                      text-sm p-2.5 text-center inline-flex items-center mr-2">Cancelar</button>
    
                                    <button type="button" wire:click="updateState" class="text-white bg-blue-500 hover:bg-blue-600 
                                    hover:text-white focus:ring-4 font-medium rounded-lg 
                                      text-sm p-2.5 text-center inline-flex items-center mr-2">Atualizar</button>
                                 </div>
    
                    </div>
                </div>
            </div>
    
        </section>
    </div>
</div>
