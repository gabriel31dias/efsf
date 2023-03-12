<div class="page-wrapper">
       <div class="container-fluid">
          <!-- Page title -->
          <div class="page-header d-print-none">
             <div class="row g-2 align-items-center">
                <div class="col">
                   <!-- Page pre-title -->
                   <div class="page-pretitle">
                      Cadastro
                   </div>
                   <h2 class="page-title">
                    Cartório
                   </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto  ms-auto d-print-none">
                   <div class="btn-list">
                  @if ($action == 'update')
                     @livewire('global.delete-button', ['objectModel' => $this->registry, 'redirectBack' => true, 'permission' => 'registry.delete'])
                   @endif
                      <a wire:click="saveRegistry" class="btn btn-primary items-center inline-flex  ">
                         <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                         <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                         </svg>
                         Salvar
                      </a>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="page-body">
          <div class="container-fluid">
             <div class="card">
                <div class="card-body">
                   <div class="row">
                     @if ($action == 'update')

                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Codigo SIC</label>
                           <div class="input-group input-group-flat">
                              <input type="text" value="{{ $this->registry->id }}"
                                 class="form-control" autocomplete="off" disabled>
                           </div>
                           @error('fields.sic_code') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     @endif
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Nome do Cartório<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.name" type="text"
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.name') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                    
                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">CNS<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.cns" type="text"
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.cns') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Nome Fantasia</label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.fantasy_name" type="text"
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.fantasy_name') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Titular</label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.holder_name" type="text"
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.holder_name') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Substituto</label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.support_name" type="text"
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.support_name') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Juiz</label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.judge_name" type="text"
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.judge_name') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-1">
                        <div class="mb-3">
                           <label class="form-label">Atribuição</label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.assignment" type="number" disabled
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.assignment') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                    
                     <div class="col-lg-1">
                        <div class="mb-3">
                           <label class="form-label">UF<span class="error_tag">*</span></label>
                           <livewire:uf-select.uf-select />
                           @error('fields.uf_id') <span class="text-danger"> {{ $message }}</span> @enderror

                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="mb-3">
                           <label class="form-label">Município<span class="error_tag">*</span></label>
                           <livewire:county-select.county-select />
                           @error('fields.county_id') <span class="text-danger"> {{ $message }}</span> @enderror

                        </div>
                     </div>

                      <div class="col-lg-5">
                        <div class="mb-3">
                           <label class="form-label">A Matricula neste cartório permite o valor XX para o dígito verificador?<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat w-1/5">
                              <select class="form-select" wire:model="fields.allow_digit">
                                    <option value="1">SIM</option>
                                    <option value="0">NAO</option>
                              </select>
                           </div>
                           @error('fields.allow_digit') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="row" x-data="{action: @entangle('action')}" x-show="action == 'create'" >
                        <div class="col-lg-3">
                           <div class="mb-3">
                              <label class="form-label">Data da Criação</label>
                              <div class="input-group input-group-flat">
                                 <input wire:model="fieldsCreateDate.created_date" type="date"
                                    class="form-control" autocomplete="off" required>
                              </div>
                              @error('fieldsCreateDate.created_date') <span class="text-danger"> {{ $message }}</span> @enderror
                           </div>
                        </div>

                        <div class="col-lg-3">
                           <div class="mb-3">
                              <label class="form-label">Data de Encerramento</label>
                              <div class="input-group input-group-flat">
                                 <input wire:model="fieldsCreateDate.closing_date" type="date"
                                    class="form-control" autocomplete="off" required>
                              </div>
                              @error('fieldsCreateDate.closing_date') <span class="text-danger"> {{ $message }}</span> @enderror
                           </div>
                        </div>

                     </div>
                     <div class="col-lg-12">
                        <div class="mb-3">
                           <label class="form-label">OBSERVAÇÃO</label>
                           <div class="input-group input-group-flat">
                              <textarea wire:model="fields.note"
                                 class="form-control" autocomplete="off" required maxlength="500"> </textarea>
                           </div>
                           @error('fields.note') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                   </div>

                     @if (isset($this->registry->opening_dates))
                        <livewire:registry.registry-dates-table :registry_id="$this->registry->id" :dates="$this->registry->opening_dates">
                     @endif
                </div>
             </div>
 
       </div>
    </div>