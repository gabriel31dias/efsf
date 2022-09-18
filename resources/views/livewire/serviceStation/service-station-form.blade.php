<div class="page-wrapper">
   <form>
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
                     Posto de Atendimento
                  </h2>
               </div>
               <!-- Page title actions -->
               <div class="col-12 col-md-auto ms-auto d-print-none">
                  <div class="btn-list">
                     <span class="d-none d-sm-inline">
                        @if(isset($serviceStation->id))
                        @if($serviceStation->status == false)
                        <a wire:click="enableDisableRegister" class="btn btn-white">
                           Habilitar
                        </a>
                        @else
                        <a wire:click="enableDisableRegister" class="btn btn-white">
                           Desabilitar
                        </a>
                        @endif
                        @endif
                     </span>
                     <a wire:click="saveStation" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                           <line x1="12" y1="5" x2="12" y2="19" />
                           <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Salvar
                     </a>
                     <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                        data-bs-target="#modal-report" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
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
         </div>
      </div>
      <div class="page-body">
         <div class="container-fluid">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Nome do posto<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.service_station_name" maxlength="70" type="text"
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.service_station_name') <span class="text-danger"> {{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Sigla do Posto<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.acronym_post" maxlength="70" type="text"
                                 class="form-control" autocomplete="off" required>
                           </div>
                           @error('fields.acronym_post') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Tipo do Posto<span class="error_tag"> *</span></label>

                           <div class="input-group input-group-flat">
                              <select wire:model="fields.type_of_post" class="form-select"
                                 aria-label="Default select example">
                                 <option value="" selected disabled>Selecione...</option>
                                 @foreach (ServiceStation::LABEL_TYPES as $key => $item)
                                 <option value="{{ $key }}">{{ $item }}</option>
                                 @endforeach
                              </select>
                           </div>
                           @error('fields.type_of_post') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Hora Início<span class="error_tag"> *</span></label>

                           <div class="input-group input-group-flat">
                              <input wire:model="fields.start_hour" maxlength="70" type="time" class="form-control"
                                 autocomplete="off" required>
                           </div>
                           @error('fields.start_hour') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Hora Fim<span class="error_tag"> *</span></label>

                           <div class="input-group input-group-flat">
                              <input wire:model="fields.end_hour" maxlength="70" type="time" class="form-control"
                                 autocomplete="off" required>
                           </div>
                           @error('fields.end_hour') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Cep<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input id="cep" onblur="pesquisacep(this.value);" wire:model="fields.cep" type="text"
                                 class="form-control" autocomplete="off">
                           </div>
                           @error('fields.cep') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Tipo de Logradouro<span class="error_tag"> *</span></label>
                           <livewire:users.typestreets-select :typestreet="$type_street" />
                           @error('fields.type_of_street') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>


                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label class="form-label">Endereço<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input id="rua" wire:model="fields.address" type="text" class="form-control"
                                 autocomplete="off">
                           </div>
                           @error('fields.address') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Nº<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.number" type="text" class="form-control" autocomplete="off">
                           </div>
                           @error('fields.number') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Bairro<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input id="bairro" wire:model="fields.district" type="text" class="form-control"
                                 autocomplete="off">
                           </div>
                           @error('fields.district') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Complemento<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input id="bairro" wire:model="fields.complement" type="text" class="form-control"
                                 autocomplete="off">
                           </div>
                           @error('fields.complement') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">Cidade<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input id="cidade" wire:model="fields.city" type="text" class="form-control"
                                 autocomplete="off">
                           </div>
                           @error('fields.city') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="mb-3">
                           <label class="form-label">UF<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input id="uf" maxlength="4" wire:model="fields.uf" type="text" class="form-control"
                                 autocomplete="off">
                           </div>
                           @error('fields.uf') <span class="text-danger"> {{ $message }}</span> @enderror

                        </div>
                     </div>



                     <div x-data="{showPosto: @entangle('isExternalDelivery')}">

                        <div class="col-lg-4 mt-2">
                           <div class="form-check">
                              <input class="form-check-input" wire:click="handleChangeExternal" wire:model="isExternalDelivery" type="checkbox" >
                              <label class="form-check-label">
                                 Local de Entrega em outro posto
                              </label>
                           </div>
                        </div>



                        <div x-show="showPosto" class="col-lg-6">

                           <label style="margin-top:1%" class="form-label">Posto de Entrega</label>
                           <div class="input-group mb-3">
                              <livewire:users.servicestation-select />
                              <div class="input-group-append">
                                 <a style="text-align: center" wire:click="addServicePoint"
                                    class="btn btn-primary d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg style="text-align: center" xmlns="http://www.w3.org/2000/svg" class="icon"
                                       width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                       fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                       <line x1="12" y1="5" x2="12" y2="19" />
                                       <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>


                     @if (isset($deliveryPoint))

                     <div>
                        <div class="card-header">
                           Local de Entrega
                        </div>
                        <div class="card-body">
                           <div id="table-default" class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th><button class="table-sort" data-sort="sort-name">Posto de
                                             Atenndimento</button></th>
                                       <th><button class="table-sort" data-sort="sort-city">Sigla</button></th>
                                       <th><button class="table-sort" data-sort="sort-type">Cep</button></th>
                                       <th><button class="table-sort" data-sort="sort-score">Endereço</button></th>
                                       <th><button class="table-sort" data-sort="sort-date">Numero</button></th>
                                       <th><button class="table-sort" data-sort="sort-quantity">Bairro</button></th>
                                       <th><button class="table-sort" data-sort="sort-progress">Cidade</button></th>
                                    </tr>
                                 </thead>
                                 <tbody class="table-tbody">
                                    <tr>
                                       <td class="sort-name">{{ $deliveryPoint['service_station_name'] }}</td>
                                       <td class="sort-city">{{ $deliveryPoint['acronym_post'] }}</td>
                                       <td class="sort-type">{{ $deliveryPoint['cep'] }}</td>
                                       <td class="sort-score">{{ $deliveryPoint['address'] }}</td>
                                       <td class="sort-date">{{ $deliveryPoint['number'] }}</td>
                                       <td class="sort-quantity">{{ $deliveryPoint['district'] }}</td>
                                       <td class="sort-quantity">{{ $deliveryPoint['city'] }}</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     @endif

                     @if ($this->action == 'update' && isset($this->serviceStation))
                     <input type="hidden" wire:model="id" value="{{ $this->serviceStation->id }}">
                     @endif
                  </div>
               </div>
            </div>

         <div x-data="{ type: @entangle('fields.type_of_post') }" x-show="type == {{ ServiceStation::EVENTS_TYPE }}">

         <div class="card mt-4">
            <div class="card-header">
               Dados Evento
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="mb-3">
                        <label class="form-label">Data Inicio<span class="error_tag"> *</span></label>
                        <div class="input-group input-group-flat">
                           <input wire:model="fieldsEvent.start_date" maxlength="70" type="text"
                              class="form-control" autocomplete="off" required>
                        </div>
                        @error('fieldsEvent.start_date') <span class="text-danger"> {{ $message }}</span>
                        @enderror
                     </div>
                  </div>

                  <div class="col-lg-4">
                     <div class="mb-3">
                        <label class="form-label">Data de Entrega<span class="error_tag"> *</span></label>
                        <div class="input-group input-group-flat">
                           <input wire:model="fieldsEvent.delivery_date" maxlength="70" type="text"
                              class="form-control" autocomplete="off" required>
                        </div>
                        @error('fieldsEvent.delivery_date') <span class="text-danger"> {{ $message }}</span>
                        @enderror
                     </div>
                  </div>


                        <div class="col-lg-2">
                           <div class="mb-3">
                              <label class="form-label">Acesso ao posto expira em: <span class="error_tag">
                                    *</span></label>
                              <div class="input-group input-group-flat">
                                 <input wire:model="fieldsEvent.expiry" type="number" class="form-control"
                                    autocomplete="off">
                              </div>
                              <span class="text-info">Informar período em dias</span> <br>
                              @error('fieldsEvent.expiry') <span class="text-danger"> {{ $message }}</span> @enderror

                           </div>
                        </div>
                     </div>

               </div>
            </div>
         </div>
      </div>

      </div>
   </form>
</div>