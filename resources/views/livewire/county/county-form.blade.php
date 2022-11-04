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
                    Município
                </h2>
             </div>
             <!-- Page title actions -->
             <div class="col-12 col-md-auto  ms-auto d-print-none">
                <div class="btn-list">
               @if ($action == 'update')
                  @livewire('global.delete-button', ['objectModel' => $this->county, 'redirectBack' => true])
                @endif
                   <a wire:click="save" class="btn btn-primary items-center inline-flex  ">
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
                    
                    <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">UF<span class="error_tag">*</span></label>
                            @livewire('uf-select.uf-select', ['defaultValue' => $uf])
                           @error('fields.uf_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-6">

                     <div class="mb-3">
                        <label class="form-label">Nome Município<span class="error_tag"> *</span></label>
                        <div class="input-group input-group-flat">
                            <input wire:model="fields.name" maxlength="70" type="text"
                                class="form-control" autocomplete="off">
                        </div>
                        @error('fields.name') <span class="text-danger"> {{ $message }}</span> @enderror
                    </div>
                     </div>
                     <div class="col-lg-3">

                    <div class="mb-3">
                        <label class="form-label">Código</label>
                        <div class="input-group input-group-flat">
                            <input wire:model="fields.code" maxlength="70" type="text"
                                class="form-control" autocomplete="off">
                        </div>
                        @error('fields.code') <span class="text-danger"> {{ $message }}</span> @enderror
                    </div>
                </div>
                </div>

                <div x-data="{showCounty: @entangle('is_district')}">

                  <div class="col-lg-4 mt-2">
                     <div class="form-check">
                        <input class="form-check-input" wire:model="is_district" type="checkbox" >
                        <label class="form-check-label">
                           Distrito
                        </label>
                     </div>
                  </div>



                  <div x-show="showCounty" class="col-lg-4">

                     <label style="margin-top:1%" class="form-label">Município Vinculado</label>
                     <div class="input-group mb-3 grid">
                        <livewire:county-select.county-select
                        :defaultValue="$countyRelation"
                        />   
                        @error('fields.county_id') <span class="text-danger"> {{ $message }}</span> @enderror
                  
                     </div>
                  </div>
               </div>

             </div>
          </div>

    </div>
 </div>