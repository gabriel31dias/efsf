

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
                  Usuários
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
               <div class="btn-list">
                  <span class="d-none d-sm-inline">
                  @if(isset($user->id))
                    @if($user->status == false)
                        <a wire:click="enableDisableRegister" class="btn btn-white">
                            Habilitar
                        </a>
                    @else
                        <a wire:click="enableDisableRegister" class="btn btn-white">
                            Desabilitar
                        </a>
                    @endif
                  @endif


                 @if(isset($user->id))
                    @if($user->blocked == false)
                      <a wire:click="blockUnblockRegister" class="btn btn-danger">
                        <i style="margin-left:3%"  class="ti ti-alert-circle"></i>  Bloquear
                      </a>
                    @else
                      <a wire:click="blockUnblockRegister" class="btn btn-success">
                        <i style="margin:1%" class="ti ti-alert-circle"></i>  Desbloquear
                      </a>
                    @endif
                 @endif


                  </span>
                  <a wire:click="createUser" class="btn btn-primary d-none d-sm-inline-block">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <line x1="12" y1="5" x2="12" y2="19" />
                     <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                  Salvar
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
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
         <div class="modal-content">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="mb-3">
                        <label class="form-label">Nome Completo <span class="error_tag">*</span></label>
                        <div class="input-group input-group-flat">
                           <input wire:model="fields.nome" maxlength="70" type="text" class="form-control"  autocomplete="off" required>
                        </div>
                        @if (in_array("nome", $errorsKeys))
                            <div  class="error_tag" role="alert">
                                Este campo é obrigatório
                            </div>
                        @endif
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="mb-3">
                        <label class="form-label">Cpf <span class="error_tag">*</span></label>
                        <div class="input-group input-group-flat">
                            @if($action == "update")
                                <input maxlength="15" disabled wire:model="fields.cpf" type="text" class="form-control cpf"  autocomplete="off">
                            @else
                                <input maxlength="15" wire:model="fields.cpf" type="text" class="form-control cpf"  autocomplete="off">
                            @endif
                        </div>
                        @if (in_array("cpf", $errorsKeys))
                            <div  class="error_tag" role="alert">
                                Este campo é obrigatório
                            </div>
                        @endif
                     </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="mb-3">
                       <label class="form-label">Cep</label>
                       <div class="input-group input-group-flat">
                          <input id="cep"  onblur="pesquisacep(this.value);" wire:model="fields.cep" type="text" class="form-control"  autocomplete="off">
                       </div>
                    </div>
                 </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-4">
                  <div class="mb-3">
                     <label class="form-label">Tipo de Logradouro</label>
                        <livewire:users.typestreets-select :typestreet="$type_street" />
                  </div>
               </div>
               <div class="col-lg-6">
                <div class="mb-3">
                   <label class="form-label">Endereço</label>
                   <div class="input-group input-group-flat">
                      <input id="rua" wire:model="fields.endereco" type="text" class="form-control" autocomplete="off">
                   </div>
                   @if (in_array("endereco", $errorsKeys))
                     <div  class="error_tag" role="alert">
                       Este campo é obrigatório
                     </div>
                   @endif
                </div>
             </div>
             <div class="col-lg-2">
                <div class="mb-3">
                   <label class="form-label">Nº</label>
                   <div class="input-group input-group-flat">
                      <input  wire:model="fields.numero" type="text" class="form-control"  autocomplete="off">
                   </div>
                </div>
             </div>

            </div>
         </div>
         <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">
                   <label class="form-label">Bairro</label>
                   <div class="input-group input-group-flat">
                      <input id="bairro" wire:model="fields.bairro" type="text" class="form-control"  autocomplete="off">
                   </div>
                </div>
             </div>
            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Complemento</label>
                  <div class="input-group input-group-flat">
                     <input  id="bairro" wire:model="fields.complemento" type="text" class="form-control"  autocomplete="off">
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                   <label class="form-label">Cidade</label>
                   <div class="input-group input-group-flat">
                      <input id="cidade" wire:model="fields.cidade" type="text" class="form-control"  autocomplete="off">
                   </div>
                </div>
             </div>
         </div>
         <div class="row">
            <div class="col-lg-3">
               <div class="mb-3">
                  <label class="form-label">UF</label>
                  <div class="input-group input-group-flat">
                     <input id="uf" maxlength="4"type_streat  wire:model="fields.uf" type="text" class="form-control"  autocomplete="off">
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Celular <span style="color: red">*</span></label>
                  <div class="input-group input-group-flat">
                     <input id="phone"  wire:model="fields.celular" type="text" class="form-control phone" autocomplete="off">
                  </div>
               </div>
            </div>
            <div class="col-lg-5">
                <div class="mb-3">
                   <label class="form-label">Email <span style="color: red">*</span></label>
                   <div class="input-group input-group-flat">
                      <input  maxlength="50" wire:model="fields.email" type="email" class="form-control"  autocomplete="off">
                   </div>
                </div>
             </div>
         </div>

         <div class="row">

            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Confirmação de email <span style="color: red">*</span></label>
                  <div class="input-group input-group-flat">
                     <input  maxlength="50" wire:model="fields.email_confirm" type="text" class="form-control "  autocomplete="off">
                  </div>
                  @if ($fields['email_confirm'] != $fields['email'])
                    <div  class="error_tag" role="alert">
                        O email digitado está diferente da confirmação
                    </div>
                  @endif
               </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                   <label class="form-label">Login <span style="color: red">*</span></label>
                   <div class="input-group input-group-flat">
                    @if($action == "update")
                        <input disabled wire:model="fields.login" type="text" class="form-control"  autocomplete="off">
                    @else
                        <input  wire:model="fields.login" type="text" class="form-control"  autocomplete="off">
                    @endif
                   </div>
                   @if (in_array("login", $errorsKeys))
                     <div  class="error_tag" role="alert">
                       Este campo é obrigatório
                     </div>
                   @endif
                </div>
             </div>
             <div class="col-lg-4">
                <div class="mb-3">
                   <label class="form-label">Senha<span style="color: red">*</span></label>
                   <div class="input-group input-group-flat">
                    @if($action == "update")
                         <a wire:click="openModalChangPassword" class="btn btn-info d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            Alterar senha
                         </a>
                    @else
                        <input  wire:model="fields.senha" minlength="8" maxlength="10" type="text" class="form-control"  autocomplete="off">
                    @endif
                   </div>

                    @if (in_array("login", $errorsKeys))
                     <div  class="error_tag" role="alert">
                         Este campo é obrigatório
                     </div>
                    @endif
                </div>
             </div>
         </div>
         <div class="row">


         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="mb-3">
                  <label class="form-label">Perfil de Acesso</label>
                    <livewire:users.profile-select :perfil_name="$perfil_namex"/>
               </div>
            </div>
            <div class="col-lg-12">

            </div>
         </div>

         <div class="container-fluid card">
            <label style="margin-top:1%" class="form-label">Postos de atendimento</label>
            <div class="input-group mb-3">
                <livewire:users.servicestation-select />
                <div class="input-group-append">
                    <a style="text-align: center" wire:click="addServicePoint" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg  style="text-align: center" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <line x1="12" y1="5" x2="12" y2="19" />
                           <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                    </a>
                </div>
              </div>
            <div >
                <div class="card-body">
                   <div id="table-default" class="table-responsive">
                      <table class="table">
                         <thead>
                            <tr>
                               <th><button class="table-sort" data-sort="sort-name">Postos de atendimento</button></th>
                               <th><button class="table-sort" data-sort="sort-city">Sigla</button></th>
                               <th><button class="table-sort" data-sort="sort-type">Cep</button></th>
                               <th><button class="table-sort" data-sort="sort-score">Endereço</button></th>
                               <th><button class="table-sort" data-sort="sort-date">Numero</button></th>
                               <th><button class="table-sort" data-sort="sort-quantity">Bairro</button></th>
                               <th><button class="table-sort" data-sort="sort-progress">Cidade</button></th>
                            </tr>
                         </thead>
                         <tbody class="table-tbody">
                            @foreach ($servicesPoints as $item)
                              <tr>
                                <td class="sort-name">{{  $item['service_station_name'] }}</td>
                                <td class="sort-city">{{ $item['acronym_post'] }}</td>
                                <td class="sort-type">{{  $item['cep'] }}</td>
                                <td class="sort-score">{{ $item['address'] }}</td>
                                <td class="sort-date" >{{ $item['number'] }}</td>
                                <td class="sort-quantity">{{ $item['district'] }}</td>
                                <td class="sort-quantity">{{ $item['city'] }}</td>
                               </tr>
                            @endforeach
                         </tbody>
                      </table>
                   </div>
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
