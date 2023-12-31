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
                      PERFIL DE ÚSUARIO
                   </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                   <div class="btn-list">
                      <span class="d-none d-sm-inline">
                     @can('permission', 'profile.delete')
                      @if(isset($profile->id))
                      @if($profile->status == false)
                      <a wire:click="enableDisableRegister" class="btn btn-white">
                      Habilitar
                      </a>
                      @else
                      <a wire:click="enableDisableRegister" class="btn btn-white">
                      Desabilitar
                      </a>
                      @endif
                      @endif
                      @endcan
                      </span>
                      <a wire:click="saveProfile" class="btn btn-primary inline-flex">
                         <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
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
             <div class="card-body">
                <div class="card">
                    <div class="card-body">
                   <div class="modal-content ">
                      <div class="modal-body">
                         <div class="row">
                            <div class="col-lg-4 ">
                               <div class="mb-3">
                                  <label class="form-label ">Nome perfil<span class="error_tag">*</span></label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.nome_perfil" maxlength="70" type="text" class="form-control ps-0"  autocomplete="off" required>
                                  </div>
                                  @if (in_array("nome_perfil", $errorsKeys))
                                  <div  class="error_tag" role="alert">
                                     O campo Nome do perfil é obrigatório
                                  </div>
                                  @endif
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="mb-3">
                                  <label class="form-label">Prazo para expiração (em dias)<span class="error_tag">*</span></label>
                                  <div class="input-group input-group-flat">
                                     <input maxlength="11" wire:model="fields.prazo_expiração"  type="text" class="form-control ps-0"  autocomplete="off" required>
                                  </div>
                                  @if (in_array("prazo_expiração", $errorsKeys))
                                  <div  class="error_tag" role="alert">
                                     O campo Prazo para expiração é obrigatório
                                  </div>
                                  @endif
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="mb-3">
                                  <label class="form-label">Prazo para expiração por inatividade (em dias)<span class="error_tag">*</span></label>
                                  <div class="input-group input-group-flat">
                                     <input maxlength="11" wire:model="fields.prazo_expiração_inatividade"  type="text" class="form-control ps-0"  autocomplete="off" required>
                                  </div>
                                  @if (in_array("prazo_expiração_inatividade", $errorsKeys))
                                  <div  class="error_tag" role="alert">
                                     O campo Prazo para expiração por inatividade é obrigatório
                                  </div>
                                  @endif
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>

         
            <div class="col-lg-12">
                <div class="card shadow-md">
                    <div class="font-bold p-4 mb-0">Permissões</div>
                    <div class="px-4 pb-2">
                        <div class="row">
                            @foreach($permissions as $group => $p)
                                <div class="col-sm-3 py-2 divide-x divide-slate-400">
                                    <span class="font-bold">{{ $group }}</span>
                                    <input type="checkbox" wire:model='selectAllValue.{{ $group }}' wire:change='selectAllGroup("{{ $group }}", $event.target.checked)' class="-ml-3"  id="">
                                    <ul class="mt-2">
                                        @foreach($p as $permission)
                                        <li>
                                          <input type="checkbox" wire:model='profile_permissions' value="{{ $permission['id'] }}" id="">
                                          <label for="permissions" class="text-sm">{{ $permission['name'] }}</label>
                                        </li>
                                        @endforeach
                                    </ul>
        
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
        
        </div>
      </form>
    </div>
