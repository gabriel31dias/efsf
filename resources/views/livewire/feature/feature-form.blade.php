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
                            
                            CARACTERÍSTICAS
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            @can('permission', 'feature.enable')
                                
                            <span class="d-none d-sm-inline">
                                @if(isset($feature->id))
                                @if($feature->status == false)
                                <a wire:click="enableDisableRegister" class="btn btn-success">
                                    Habilitar
                                </a>
                                @else
                                <a wire:click="enableDisableRegister" class="btn btn-danger">
                                    Desabilitar
                                </a>
                                @endif
                                @endif
                            </span>
                            @endcan

                            <a wire:click="saveFeature" class="btn btn-primary items-center inline-flex">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
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
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Nome da característica <span class="error_tag"> *</span></label>
                                    <div class="input-group input-group-flat">
                                        <input wire:model="fields.name" maxlength="70" type="text"
                                            class="form-control" autocomplete="off">
                                    </div>
                                    @error('fields.name') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label style="" class="form-label">Características</label>
                                <div class="input-group mb-1">
                                 <input wire:model="feature_option_name" maxlength="70" type="text" class="form-control" autocomplete="off" >
                                   <div class="input-group-append">
                                      <a style="text-align: center" wire:click="addFeatureOptions"
                                         class="btn btn-primary d-none d-sm-inline-block">
                                         <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                         <svg style="text-align: center" xmlns="http://www.w3.org/2000/svg" class=""
                                            width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                         </svg>
                                      </a>
                                   </div>

                                </div>
                                @error('feature_options') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Multi seleção<span class="error_tag"> *</span></label>
                                    <select wire:model="fields.mult_select" class="form-control ps-0" name="select">
                                        <option >Selecione</option>
                                        <option value="true">Sim</option>
                                        <option value="false">Não</option>
                                     </select>
                                    @error('fields.mult_select') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    @if (!empty($feature_options))

                     <div>
                        <div class="card-header">
                            Características
                        </div>
                        <div class="card-body">
                           <div id="table-default" class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th><button class="table-sort" data-sort="sort-name">Nome</button></th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody class="table-tbody">
                                    @if ($action == 'create')
                                        @foreach ($feature_options as $option)
                                            <tr class="hover:bg-gray-100 hover:text-black">
                                                <td class="sort-name">{{ $option }}</td>
                                                <td class="">
                                                        <a wire:click="removeFeatureOption('{{ $option }}')" class="text-decoration-none hover:cursor-pointer hover:bg-gray-800 text-gray-700
                                                        hover:text-white focus:ring-4 font-medium rounded-lg
                                                        text-sm p-2.5 text-center inline-flex items-center mr-2 ">
                                                        <i class="ti ti-trash"></i>
                                                        </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else

                                    @foreach ($feature->feature_options as $option)
                                    <tr class="hover:bg-gray-100 hover:text-black">
                                        <td class="sort-name">{{ $option->name }}</td>
                                        <td class="">
                                            @livewire('global.delete-button', ['objectModel' => $option, 'redirectBack' => false, 'type' => 'table', 'deleteEvent' => 'refreshFeatureForm', 'permission' => 'feature.delete'], key('delete' . $option->id))
                                        </td>
                                    </tr>
                                    @endforeach


                                    @endif
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     @endif

                </div>
            </div>
        </div>
</div>
