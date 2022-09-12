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
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Rg<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.rg" maxlength="70" type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label ">CPF<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.cpf" maxlength="15"  type="text" class="form-control cpf"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Nome do Cidadão<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.name" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="container-fluid ">
                         <div  style="margin-top: 1%; " class="row">
                            <div class="col-lg-1">
                               <H3>Filiações</H3>
                            </div>
                            <div class="col-lg-4">
                               <a wire:click="addNewFiliationField" class="btn btn-primary d-none d-sm-inline-block">
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
                            <div class="col-lg-4">
                               <div class="mb-3">
                                  <label class="form-label">Filiação 1</label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.filiation1" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="mb-3">
                                  <label class="form-label">Filiação 2</label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.filiation2" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="mb-3">
                                  <label class="form-label">Filiação 3</span></label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.filiation3" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               @foreach ($otherFiliations as $item)
                               <div class="col-lg-4">
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
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data de Nascimento (dia/mês/ano)<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.birth_date" maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Gênero<span class="error_tag">*</span></label>
                            <livewire:genres-select.genres-select />
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Estado Civil<span class="error_tag">*</span></label>
                            <livewire:marital-status-select.marital-status-select />
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">País<span class="error_tag">*</span></label>
                            <livewire:country-select.country-select />
                         </div>
                      </div>
                      @if($imigration == true)

                         <div class="col-lg-4">
                            <div class="mb-3">
                               <label  class="form-label">Situação Migração<span class="error_tag">*</span></label>
                               <div class="input-group input-group-flat">
                                  <select wire:change="checkNaturalized($event.target.value)" wire:model="fields.migration_situation"  class="form-control ps-0"  name="select">
                                     <option value="1">Brasileiro Nascido</option>
                                     <option value="2">Naturalizado</option>
                                     <option value="3">Direito de Igualdade</option>
                                  </select>
                               </div>
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
                                  <input maxlength="11" wire:model="fields.secao_folha"   type="text" class="form-control ps-0"  autocomplete="off" required>
                               </div>
                            </div>
                         </div>
                      @endif
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">UF<span class="error_tag">*</span></label>
                            <livewire:uf-select.uf-select />
                         </div>
                      </div>
                      <div class="col-lg-4">
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
                               <input maxlength="11"  type="text" class="form-control ps-0"  autocomplete="off" required>
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



    </script>
 </div>
