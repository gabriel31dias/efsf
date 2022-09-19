<div x-data="{
    isOpen:1,
    select(value) {
    this.isOpen = value
    }
    }" class="page-wrapper">
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
                      Cidadão
                   </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                   <div class="btn-list">
                      <span class="d-none d-sm-inline">
                      </span>
                      <a wire:click="createCitizen" class="btn btn-primary d-none d-sm-inline-block">
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
                      <div class="col-lg-2">
                         <div class="mb-3">
                            <label class="form-label">Rg<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.rg" maxlength="70" type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                            @if (in_array("rg", $errorsKeys))
                            <div  class="error_tag" role="alert">
                               O campo Rg é obrigatório
                            </div>
                            @endif
                         </div>
                      </div>
                      <div class="col-lg-3">
                         <div class="mb-3">
                            <label class="form-label ">CPF<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.cpf" maxlength="15"  type="text" class="form-control cpf"  autocomplete="off" required>
                            </div>
                            @if (in_array("cpf", $errorsKeys))
                            <div  class="error_tag" role="alert">
                               O campo Cpf é obrigatório
                            </div>
                            @endif
                         </div>
                      </div>
                      <div class="col-lg-7">
                         <div class="mb-3">
                            <label class="form-label">Nome do Cidadão<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.name" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                            @if (in_array("name", $errorsKeys))
                            <div  class="error_tag" role="alert">
                               O campo Nome é obrigatório
                            </div>
                            @endif
                         </div>
                      </div>
                      <div class="container-fluid ">
                         <div  style="margin-top: 1%; " class="row">
                         </div>
                         <div class="row">
                            <div class="col-lg-6">
                               <div class="mb-3">
                                  <label class="form-label">Filiação 1</label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.filiation1" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="mb-3">
                                  <label class="form-label">Filiação 2</label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.filiation2" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-lg-6">
                                  <a style="margin-bottom:30px" wire:click="addNewFiliationField" class="btn btn-primary d-none d-sm-inline-block">
                                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                     </svg>
                                     Adicionar mais filiações
                                  </a>
                               </div>
                            </div>
                            <div class="row">
                               @foreach ($otherFiliations as $item)
                               <div class="col-lg-6">
                                  <div class="mb-3">
                                     <label class="form-label">{{$item}}</span></label>
                                     <div class="input-group input-group-flat">
                                        <input wire:model="fields.other_filiations" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                                     </div>
                                  </div>
                               </div>
                               @endforeach
                            </div>
                         </div>
                      </div>
                      <div></div>
                      <div class="col-lg-2">
                         <div class="mb-3">
                            <label class="form-label">Data de Nascimento (dia/mês/ano)<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.birth_date" maxlength="11"  type="text" class="form-control ps-0 date"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-2">
                         <div class="mb-3">
                            <label class="form-label">Gênero<span class="error_tag">*</span></label>
                            <livewire:genres-select.genres-select :genre_name="$genre_name"/>
                         </div>
                      </div>
                      @if($other_genre == true)
                      <div class="col-lg-2">
                         <label  class="form-label">Sexo Biológico<span class="error_tag">*</span></label>
                         <div class="input-group input-group-flat">
                            <select class="form-control ps-0"  name="select">
                               <option value="1">Masculino</option>
                               <option value="2">Feminino</option>
                            </select>
                         </div>
                      </div>
                      @endif
                      <div class="col-lg-2">
                         <div class="mb-3">
                            <label class="form-label">Estado Civil<span class="error_tag">*</span></label>
                            <livewire:marital-status-select.marital-status-select  :marital_status="$marital_status"/>
                         </div>
                      </div>
                      <div class="col-lg-6">
                         <div class="mb-3">
                            <label class="form-label">País<span class="error_tag">*</span></label>
                            <livewire:country-select.country-select />
                         </div>
                      </div>
                      @if($imigration == true)
                      <div class="col-lg-4">
                         <label  class="form-label">Situação Migração<span class="error_tag">*</span></label>
                         <div class="input-group input-group-flat">
                            <select wire:change="checkNaturalized($event.target.value)" wire:model="fields.migration_situation"  class="form-control ps-0"  name="select">
                               <option value="1">Brasileiro Nascido</option>
                               <option value="2">Naturalizado</option>
                               <option value="3">Direito de Igualdade</option>
                            </select>
                         </div>
                      </div>
                      @endif
                      @if($naturalized == true)
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Portaria Nr<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11" wire:model="fields.portaria_nr" type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11" wire:model="fields.data" type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">DOU Nr<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11" wire:model="fields.dou_nr"  type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Seção/Folha<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11" wire:model="fields.secao_folha"   type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data DOU<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11" wire:model="fields.data_dou"   type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      @endif
                      <div class="col-lg-1">
                         <div class="mb-3">
                            <label class="form-label">UF<span class="error_tag">*</span></label>
                            <livewire:uf-select.uf-select />
                         </div>
                      </div>
                      <div class="col-lg-3">
                         <div class="mb-3">
                            <label class="form-label">Município de Naturalidade<span class="error_tag">*</span></label>
                            <livewire:county-select.county-select />
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Profissão<span class="error_tag">*</span></label>
                            <livewire:occupations-select.occupation-select />
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Indicador Social<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <select @change="select($event.target.options[$event.target.selectedIndex].value)
                                  "  wire:model="fields.social_indicator_id"  class="form-control ps-0"  name="select">
                                  <option value="1">PIS</option>
                                  <option value="2">PASEP</option>
                                  <option value="3">NIS</option>
                                  <option value="4">NIT</option>
                               </select>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Nº Social<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input x-show="isOpen == 1 || isOpen == 2" id='1' wire:model="fields.n_social"   type="text" class="form-control pis_pasep"  autocomplete="off" required>
                               <input x-show="isOpen == 3 || isOpen == 4" id='2' wire:model="fields.n_social"   type="text" class="form-control nis"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Posto de atendimento<span class="error_tag">*</span></label>
                            <livewire:users.servicestation-select />
                         </div>
                      </div>
                      <div class="col-lg-3">
                         <div class="mb-3">
                            <label class="form-label">Via do RG<span class="error_tag">*</span></label>
                            <select  wire:model="fields.via_rg"  class="form-control ps-0"  name="select">
                               <option value="0">Selecione</option>
                               <option value="1">1a</option>
                               <option value="2">2a</option>
                               <option value="3">3a</option>
                               <option value="4">4a</option>
                               <option value="5">5a</option>
                               <option value="6">6a</option>
                               <option value="7">7a</option>
                               <option value="8">8a</option>
                            </select>
                         </div>
                      </div>
                      @if(isset($fields['updated_at']) && $fields['updated_at'])
                      <div  class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data da Atualização<span class="error_tag">*</span></label>
                            <input  maxlength="11" wire:model="fields.updated_at" type="text" class="form-control ps-0"  autocomplete="off" disabled required>
                         </div>
                      </div>
                      @endif
                      <div  class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data Cadastro<span class="error_tag">*</span></label>
                            <input id="date" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" disabled required>
                         </div>
                      </div>
                      <div  class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">CID</label>
                            <select  wire:model="fields.cid"  class="form-control ps-0"  name="select">
                               <option value="0">Selecione</option>
                               <option value="1">Deficiente Físico</option>
                               <option value="2">Deficiente Visual</option>
                               <option value="3">Deficiente Intelectual</option>
                               <option value="4">Deficiente Auditivo</option>
                               <option value="5">Autista</option>
                            </select>
                         </div>
                      </div>
                      <div wire:ignore.self class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                               <div class="modal-header">
                                  <h5 class="modal-title">PESQUISA RÁPIDA</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                                  <div class="mb-3">
                                     <label class="form-label">Pesquisar</label>
                                     <input wire:model="searchCitizen" type="text" class="form-control" name="example-text-input" placeholder="Busque por Nome, Rg, Genero, Data de nascimento, Filiação">
                                  </div>
                               </div>
                               <div class="modal-body">
                                  <div class="row">
                                     <table class="table">
                                        <thead class="thead-dark">
                                           <tr>
                                              <th scope="col">Nome</th>
                                              <th scope="col">Rg</th>
                                              <th scope="col">Cpf</th>
                                              <th scope="col">Genero</th>
                                              <th scope="col">Data Dascimento</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($citizens as $item)
                                            <tr wire:click="setCitizen({{$item['id']}})">
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->rg}}</td>
                                                <td>{{$item->cpf}}</td>
                                                <td>{{$item->genre_id}}</td>
                                                <td>{{$item->created_at}}</td>
                                             </tr>
                                            @endforeach
                                        </tbody>
                                     </table>
                                     {{ $citizens->links() }}
                                  </div>
                               </div>
                               <div class="modal-footer">
                                  <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                  Cancel
                                  </a>

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
    <script>
       document.addEventListener('turbolinks:load', () => {
           var today = new Date();
           $('#modal-report').modal('show');
           $('#date').val( today.toISOString().substring(0, 10));
       })




    </script>
 </div>
