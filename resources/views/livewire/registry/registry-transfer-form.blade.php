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
                    TRANSFERÊNCIA
                </h2>
             </div>
             <!-- Page title actions -->
             <div class="col-12 col-md-auto  ms-auto d-print-none">
                <div class="btn-list">
               @if ($action == 'update')
                  @livewire('global.delete-button', ['objectModel' => $this->registrySuspension, 'redirectBack' => true])
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
                    
                  <div class="col-lg-3">
                     <div class="mb-3">
                        <label class="form-label">UF origem</label>
                        @livewire('uf-select.uf-select', ['defaultValue' => null])
                     </div>
                  </div>

                  <div class="col-lg-3">
                     <div class="mb-3">
                        <label class="form-label">Município origem</label>
                        @livewire('county-select.county-select', ['defaultValue' => null])
                     </div>
                  </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                           <label class="form-label">Cartório origem<span class="error_tag">*</span></label>
                            @livewire('registry-select.registry-select', ['defaultValue' => $registryTransfer])
                           @error('fields.registry_origin_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>


                     <div class="col-lg-3">
                        <div class="mb-3">
                           <label class="form-label">UF destino</label>
                           @livewire('uf-select.uf-select', ['defaultValue' => null, 'customEvent' => 'filterUfTransfer'])
                        </div>
                     </div>
   
                     <div class="col-lg-3">
                        <div class="mb-3">
                           <label class="form-label">Município destino</label>
                           @livewire('county-select.county-select', ['defaultValue' => null, 'customEvent' => 'filterCountyTransfer', 'is_transfer' => true])
                        </div>
                     </div>

                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label class="form-label">Cartório destino<span class="error_tag">*</span></label>
                            @livewire('registry-select.registry-select', ['defaultValue' => $registryTransfer, 'customEventSelect' => 'selectedDestination', 'is_transfer' => true])
                           @error('fields.registry_destination_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                </div>

             </div>
          </div>

          

          @if (count($this->citizenConflict))
          <div>
            <div class="flex justify-between mt-4">
               <div class="text-lg font-black">
                 Conflitos de Registros
               </div>
               <div>
                  <button wire:click="donwloadCitizenConflict" class="btn btn-success items-center inline-flex mb-2">
                     <i class="ti ti-file-download"></i>
                     <span class="ml-1">Download</span> 
                  </button>
               </div>
            </div>
        
            <div class="card-body">
               <div id="table-default" class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th><button class="table-sort" >RG</button></th>
                           <th><button class="table-sort" >Nome</button></th>
                           <th><button class="table-sort" >CPF</button></th>
                           <th><button class="table-sort" >Data de nascimento</button></th>
                        </tr>
                     </thead>
                     <tbody class="table-tbody">
                        @foreach($this->citizenConflict as $citizen)
                            
                        <tr class="hover:bg-gray-200 hover:text-black">
                           <td >{{ $citizen->rg }}</td>
                           <td >{{ $citizen->name }}</td>
                           <td >{{ $citizen->cpf }}</td>
                           <td >{{ $citizen->birth_date }}</td>

                        </tr>
                        @endforeach
        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
          @endif

    </div>
 </div>