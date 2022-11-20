<div x-data="{
    isOpen:1,
    select(value) {
    this.isOpen = value
    }
    }" class="card page-wrapper">



    @include('livewire.citizen.dialogs.dialog-capture')
    @include('livewire.citizen.dialogs.dialog-search')

    <style>
    canvas {
        height: 100%;
        width: 100%;
        display: block;
     }
    </style>


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

                   <a onclick="$('#modal-captura-facial').modal('show');"  class="btn btn-primary inline-flex">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-face-id" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                        <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                        <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                        <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                        <line x1="9" y1="10" x2="9.01" y2="10"></line>
                        <line x1="15" y1="10" x2="15.01" y2="10"></line>
                        <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                     </svg>
                    Captura Facial
                 </a>

                   <a wire:click="createCitizen" class="btn btn-primary inline-flex">
                      <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                         <line x1="12" y1="5" x2="12" y2="19"/>
                         <line x1="5" y1="12" x2="19" y2="12"/>
                      </svg>
                      Salvar
                   </a>



                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-12">
    <div>

    <ul class="nav nav-tabs" data-bs-toggle="tabs" role="tablist">
       <li class="nav-item" role="presentation">
          <a wire:click="setSelectedTab('dados-basicos')"
          class="nav-link @if($selectedTab == "" || $selectedTab == "dados-basicos") active @else   @endif"
          data-bs-toggle="tab" aria-selected="true" role="tab">Dados Básicos</a>
       </li>
       <li role="presentation">
          <a wire:click="setSelectedTab('endereco')"
          class="nav-link @if($selectedTab == "endereco") active @else   @endif"
          data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">Endereço</a>
       </li>
       <li class="nav-item" role="presentation">
          <a wire:click="setSelectedTab('certidao')" data-bs-toggle="tab" aria-selected="false"
          class="nav-link @if($selectedTab == "certidao") active @else   @endif"
          role="tab" tabindex="-1">Certidão</a>
       </li>
       <li class="nav-item" role="presentation">
          <a wire:click="setSelectedTab('outros_dados')"  data-bs-toggle="tab" aria-selected="false"
          class="nav-link @if($selectedTab == "outros_dados") active @else   @endif"
          role="tab" tabindex="-1">Outros dados</a>
       </li>
       <li class="nav-item" role="presentation">
          <a wire:click="setSelectedTab('outros_documentos')"  data-bs-toggle="tab" aria-selected="false"
          class="nav-link @if($selectedTab == "outros_documentos") active @else   @endif"
          role="tab" tabindex="-1">Outros documentos</a>
       </li>
       <li class="nav-item" role="presentation">
          <a wire:click="setSelectedTab('caracteristicas')"  data-bs-toggle="tab" aria-selected="false"
          class="nav-link @if($selectedTab == "caracteristicas") active @else   @endif"
          role="tab" tabindex="-1">Características</a>
       </li>
       <li class="nav-item" role="presentation">
          <a wire:click="setSelectedTab('documentos_digitalizados')"  data-bs-toggle="tab" aria-selected="false"
          class="nav-link @if($selectedTab == "documentos_digitalizados") active @else   @endif"
          role="tab" tabindex="-1">Documentos digitalizados</a>
       </li>
    </ul>
    <div class="card-body">
    <div class="tab-content">
    @if($selectedTab == "" || $selectedTab == "dados-basicos")
    <div id="dados-basicos" role="tabpanel">
       <div class="page-body">
          <div class="container-fluid">
             <div class="modal-content">
                <div class="modal-body">
                   <div class="row">
                      <div class="col-lg-2">
                         <div class="mb-3">
                            <label class="form-label">Rg<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.rg" maxlength="70" type="text"
                                  class="form-control ps-0" autocomplete="off"
                                  required>
                            </div>
                            @if (in_array("rg", $errorsKeys))
                            <div class="error_tag" role="alert">
                               O campo Rg é obrigatório
                            </div>
                            @endif
                         </div>
                      </div>
                      <div class="col-lg-3">
                         <div class="mb-3">
                            <label class="form-label ">CPF<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.cpf" maxlength="15"
                                  type="text" class="form-control cpf"
                                  autocomplete="off" required>
                            </div>
                            @if (in_array("cpf", $errorsKeys))
                            <div class="error_tag" role="alert">
                               O campo Cpf é obrigatório
                            </div>
                            @endif
                         </div>
                      </div>
                      <div class="col-lg-7">
                         <div class="mb-3">
                            <label class="form-label">Nome do Cidadão<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.name"
                                  type="text" class="form-control ps-0"
                                  autocomplete="off" required>
                            </div>
                            @if (in_array("name", $errorsKeys))
                            <div class="error_tag" role="alert">
                               O campo Nome é obrigatório
                            </div>
                            @endif
                         </div>
                      </div>
                      <div class="container-fluid ">
                         <div style="margin-top: 1%; " class="row">
                         </div>
                         <div class="row">
                            <div class="col-lg-6">
                               <div class="mb-3">
                                  <label class="form-label">Filiação 1</label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.filiation1"
                                        maxlength="11" type="text"
                                        class="form-control ps-0"
                                        autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="mb-3">
                                  <label class="form-label">Filiação 2</label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.filiation2"
                                        maxlength="11" type="text"
                                        class="form-control ps-0"
                                        autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col-lg-6">
                                  <a style="margin-bottom:30px"
                                     wire:click="addNewFiliationField"
                                     class="btn btn-primary inline-flex">
                                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                     <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"
                                           fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                     </svg>
                                     Adicionar mais filiações
                                  </a>
                               </div>
                            </div>
                            <div class="row">
                               @foreach ($otherFiliations as $index => $item)
                               <div class="col-lg-6">
                                  <div class="mb-3">
                                     <label
                                        class="form-label">{{$item}}</span></label>
                                     <div class="input-group input-group-flat">
                                        <input
                                           wire:model="otherFiliationsValues.{{$index}}"
                                           maxlength="11" type="text"
                                           class="form-control ps-0"
                                           autocomplete="off" required>
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
                            <label class="form-label">Data de Nascimento<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input onclick="IMask(
                                this, {
                                mask: '00/00/0000'
                                });" wire:model="fields.birth_date" maxlength="11"
                                  type="text" class="form-control ps-0 date"
                                  autocomplete="off" required>
                            </div>
                         </div>
                         @if (in_array("birth_date", $errorsKeys))
                         <div class="error_tag" role="alert">
                            O campo Data de Nascimento é obrigatório
                         </div>
                         @endif
                      </div>
                      <div class="col-lg-2">
                         <div class="mb-3">
                            <label class="form-label">Gênero<span
                               class="error_tag">*</span></label>
                            <livewire:genres-select.genres-select
                               :genre_name="$genre_name"
                               :genre="$currentGenre"
                               />
                         </div>
                         @if (in_array("genre_id", $errorsKeys))
                         <div class="error_tag" role="alert">
                            O campo Data de Nascimento é obrigatório
                         </div>
                         @endif
                      </div>
                      @if($other_genre == true)
                      <div class="col-lg-2">
                         <label class="form-label">Sexo Biológico<span
                            class="error_tag">*</span></label>
                         <div class="input-group input-group-flat">
                            <select wire:model="fields.genre_biologic_id" class="form-control ps-0" name="select">
                               <option value="0">Selecione</option>
                               <option value="1">Masculino</option>
                               <option value="2">Feminino</option>
                            </select>
                         </div>
                         @if (in_array("genre_biologic_id", $errorsKeys))
                         <div class="error_tag" role="alert">
                            O campo Data de Nascimento é obrigatório
                         </div>
                         @endif
                      </div>
                      @endif
                      <div class="col-lg-2">
                         <div class="mb-3">
                            <label class="form-label">Estado Civil<span
                               class="error_tag">*</span></label>
                            <livewire:marital-status-select.marital-status-select
                               :marital_status="$currentMatiral"/>
                         </div>
                      </div>
                      <div class="col-lg-6">
                         <div class="mb-3">
                            <label class="form-label">País<span
                               class="error_tag">*</span></label>
                            <livewire:country-select.country-select
                               :country="$currentCountry"/>
                         </div>
                      </div>
                      @if($imigration == true)
                      <div class="col-lg-4">
                         <label class="form-label">Situação Migração<span
                            class="error_tag">*</span></label>
                         <div class="input-group input-group-flat">
                            <select
                               wire:change="checkNaturalized($event.target.value)"
                               wire:model="fields.migration_situation"
                               class="form-control ps-0" name="select">
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
                            <label class="form-label">Portaria Nr<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11"
                                  wire:model="fields.portaria_nr" type="text"
                                  class="form-control ps-0" autocomplete="off"
                                  required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11" wire:model="fields.data"
                                  type="text" class="form-control ps-0"
                                  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">DOU Nr<span class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11" wire:model="fields.dou_nr"
                                  type="text" class="form-control ps-0"
                                  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Seção/Folha<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11"
                                  wire:model="fields.secao_folha" type="text"
                                  class="form-control ps-0" autocomplete="off"
                                  required>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data DOU<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input maxlength="11" wire:model="fields.data_dou"
                                  type="text" class="form-control ps-0"
                                  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      @endif
                      <div class="col-lg-1">
                         <div class="mb-3">
                            <label class="form-label">UF<span class="error_tag">*</span></label>
                            <livewire:uf-select.uf-select
                               :uf="$currentUf"
                               />
                         </div>
                      </div>
                      <div class="col-lg-3">
                         <div class="mb-3">
                            <label class="form-label">Município de Naturalidade<span
                               class="error_tag">*</span></label>
                            <livewire:county-select.county-select
                               :county="$currentCounty"
                               />
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Profissão<span
                               class="error_tag">*</span></label>
                            <livewire:occupations-select.occupation-select
                               :occupation="$currentOccupation"
                               />
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Indicador Social<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <select @change="select($event.target.options[$event.target.selectedIndex].value)
                                  " wire:model="fields.social_indicator_id" class="form-control ps-0"
                                  name="select">
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
                            <label class="form-label">Nº Social<span
                               class="error_tag">*</span></label>
                            <div class="input-group input-group-flat">
                               <input x-show="isOpen == 1 || isOpen == 2" id='1'
                                  wire:model="fields.n_social" type="text"
                                  class="form-control pis_pasep" autocomplete="off"
                                  required>
                               <input x-show="isOpen == 3 || isOpen == 4" id='2'
                                  wire:model="fields.n_social" type="text"
                                  class="form-control nis" autocomplete="off"
                                  required>
                               @if (in_array("n_social", $errorsKeys))
                               <div class="error_tag" role="alert">
                                  O campo Posto de atendimento é obrigatório
                               </div>
                               @endif
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Posto de atendimento<span
                               class="error_tag">*</span></label>
                            <livewire:users.servicestation-select
                               :station="$currentServiceStation"
                               />
                            @if (in_array("service_station_id", $errorsKeys))
                            <div class="error_tag" role="alert">
                               O campo Posto de atendimento é obrigatório
                            </div>
                            @endif
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Via do RG<span
                               class="error_tag">*</span></label>
                            <select wire:model="fields.via_rg" class="form-control ps-0"
                               name="select">
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
                         @if (in_array("via_rg", $errorsKeys))
                         <div class="error_tag" role="alert">
                            O campo Via do rg é obrigatório
                         </div>
                         @endif
                      </div>
                      @if(isset($citizen['updated_at']) && $citizen['updated_at'])
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data da Atualização<span
                               class="error_tag">*</span></label>
                            <input maxlength="11"
                               value="{{date('d-m-Y', strtotime($citizen['updated_at']))}}"
                               type="text" class="form-control ps-0"
                               autocomplete="off" disabled required>
                         </div>
                      </div>
                      @endif
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">Data Cadastro<span
                               class="error_tag">*</span></label>
                            <input id="date" maxlength="11" type="text"
                               class="form-control ps-0" autocomplete="off" disabled
                               value="{{date('d-m-Y', strtotime($citizen['created_at'] ?? null))}}"
                               required>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="mb-3">
                            <label class="form-label">CID</label>
                            <select wire:model="fields.cid" class="form-control ps-0"
                               name="select">
                               <option value="0">Selecione</option>
                               <option value="1">Deficiente Físico</option>
                               <option value="2">Deficiente Visual</option>
                               <option value="3">Deficiente Intelectual</option>
                               <option value="4">Deficiente Auditivo</option>
                               <option value="5">Autista</option>
                            </select>
                         </div>
                         @if (in_array("cid", $errorsKeys))
                         <div class="error_tag" role="alert">
                            O campo CID é obrigatório
                         </div>
                         @endif
                      </div>

                      <div wire:ignore.self class="modal modal-blur fade" id="modal-list"
                         tabindex="-1" role="dialog" aria-hidden="true">
                         <div class="modal-dialog modal-lg modal-dialog-centered"
                            role="document">
                            <div class="modal-content">
                               <div class="modal-header">
                                  <h5 class="modal-title">Resultados encontrados</h5>
                                  <button type="button" class="btn-close"
                                     data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                                  <div class="row">
                                     <table class="table">
                                        <thead class="thead-dark">
                                           <tr>
                                              <th scope="col">Nome</th>
                                              <th scope="col">Rg</th>
                                              <th scope="col">Cpf</th>
                                              <th scope="col">Data Dascimento</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                           @if($citizens)
                                           @foreach($citizens as $item)
                                           <tr wire:click="editCitizen({{$item['id']}})">
                                              <td>{{$item->name}}</td>
                                              <td>{{$item->rg}}</td>
                                              <td>{{$item->cpf}}</td>
                                              <td>{{$item->created_at}}</td>
                                           </tr>
                                           @endforeach
                                        </tbody>
                                     </table>
                                     @endif
                                  </div>
                               </div>
                               <div class="modal-footer">
                                  <a href="#" class="btn btn-link link-secondary"
                                     data-bs-dismiss="modal">
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
    </div>
    @endif
    @if($selectedTab == "endereco")
    <div id="endereco" role="tabpanel">
       <div class="page-body">
          <div class="container-fluid">
             <div class="row">
                <div class="col-lg-3 mb-3">
                   <label class="form-label ">Zona {{$zone}}<span class="error_tag">*</span></label>
                   <div wire:ignore class="input-group input-group-flat">
                      <select wire:model="zone"  class="form-control ps-0" wire:ignore>
                         <option value="0">Selecione</option>
                         <option value="1">Rural</option>
                         <option value="2">Urbana</option>
                      </select>
                   </div>
                </div>
                <div class="col-lg-4 mb-3">
                   <label class="form-label">CEP<span class="error_tag">*</span></label>
                   <div class="input-group input-group-flat">
                      <input wire:model="fields.zip_code" maxlength="70" type="text"
                         class="form-control ps-0"
                         autocomplete="off" required>
                   </div>
                   @if (in_array("zip_code", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Cep é obrigatório
                   </div>
                   @endif
                </div>
                @if($zone == "1" || $zone == 1)
                <div  class="col-lg-4 mb-3">
                   <label class="form-label">Tipo de Logradouro<span class="error_tag">*</span></label>
                   <livewire:users.typestreets-select :typestreet="$curretTypeStreet"
                      :type="'country_street'"/>
                   @if (in_array("country_street", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Cep é obrigatório
                   </div>
                   @endif
                </div>
                @else
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Tipo de Logradouro<span class="error_tag">*</span></label>
                   <livewire:users.typestreets-select :typestreet="$curretTypeStreet"/>
                </div>
                @endif
                @if($zone != "1" || $zone != 1)
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Endereço<span
                      class="error_tag">*</span></label>
                   <input wire:model="fields.address" maxlength="70" type="text"
                      class="form-control ps-0"
                      autocomplete="off" required>
                   @if (in_array("address", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Endereço é obrigatório
                   </div>
                   @endif
                </div>
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Nº<span class="error_tag">*</span></label>
                   <input wire:model="fields.number" maxlength="70" type="text"
                      class="form-control ps-0"
                      autocomplete="off" required>
                   @if (in_array("number", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Nº é obrigatório
                   </div>
                   @endif
                </div>
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Complemento<span
                      class="error_tag">*</span></label>
                   <input wire:model="fields.complement" maxlength="70" type="text"
                      class="form-control ps-0"
                      autocomplete="off" required>
                   @if (in_array("complement", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Complemento é obrigatório
                   </div>
                   @endif
                </div>
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Procedência<span
                      class="error_tag">*</span></label>
                   <input wire:model="fields.provenance" maxlength="70" type="text"
                      class="form-control ps-0"
                      autocomplete="off" required>
                   @if (in_array("provenance", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Procedência é obrigatório
                   </div>
                   @endif
                </div>
                @endif
                @if($zone == "1")
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Nome<span
                      class="error_tag">*</span></label>
                   <input wire:model="fields.name_place" maxlength="70" type="text"
                      class="form-control ps-0"
                      autocomplete="off" required>
                   @if (in_array("name_place", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Nome é obrigatório
                   </div>
                   @endif
                </div>
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Ponto de Referência<span
                      class="error_tag">*</span></label>
                   <input wire:model="fields.reference_point" maxlength="70"
                      type="text"
                      class="form-control ps-0"
                      autocomplete="off" required>
                   @if (in_array("reference_point", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Ponto de Referência é obrigatório
                   </div>
                   @endif
                </div>
                @endif
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Tel. Celular<span
                      class="error_tag">*</span></label>
                   <input onclick="IMask(
                      this, {
                      mask: '(00)00000-0000'
                      });"  wire:model="fields.cell" maxlength="70" type="text"
                      class="form-control  ps-0"
                      autocomplete="off" required/>
                   @if (in_array("cell", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Tel. Celular é obrigatório
                   </div>
                   @endif
                </div>
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Tel. fixo<span
                      class="error_tag">*</span></label>
                   <input onclick="IMask(
                      this, {
                      mask: '(00)00000-0000'
                      });" wire:model="fields.telephone" maxlength="70" type="text"
                      class="form-control ps-0"
                      autocomplete="off" required/>
                   @if (in_array("telephone", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Tel. fixo é obrigatório
                   </div>
                   @endif
                </div>
                <div class="col-lg-4 mb-3">
                   <label class="form-label">Email</label>
                   <input  wire:model="fields.email"
                      type="text" class="form-control ps-0"
                      autocomplete="off" required>
                </div>
             </div>
          </div>
       </div>
    </div>
    @endif
    @if($selectedTab == "nomes_anteriores")
    <div id="nomes_anteriores" role="tabpanel">
    <div class="page-body">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-6 mb-3">
             <label class="form-label ">Nomes anteriores<span class="error_tag">*</span></label>
             <input wire:model="fields.names_previous"  maxlength="70" type="text"
                class="form-control ps-0 "
                autocomplete="off" required>
          </div>
          <div class="col-lg-6 mb-3">
             <label class="form-label ">Filiações anteriores<span class="error_tag">*</span></label>
             <input wire:model="fields.filitions_previous"  maxlength="70" type="text"
                class="form-control ps-0 "
                autocomplete="off" required>
          </div>
       </div>
    </div>
    @endif
    @if($selectedTab == "outros_documentos")
    <div id="nomes_anteriores" role="tabpanel">
       <div class="page-body">
          <div class="container-fluid">
             <div class="row">
                <div class="col-lg-2 mb-3">
                   <label class="form-label ">CNI<span class="error_tag">*</span></label>
                   <input wire:model="fields.cni"  maxlength="70" type="text"
                      class="form-control ps-0 " autocomplete="off" required>
                </div>
                <div class="col-lg-3 mb-3">
                   <label class="form-label ">Carteira nacional do sus<span class="error_tag">*</span></label>
                   <input wire:model="fields.national_card_sus"  maxlength="70" type="text"
                      class="form-control ps-0 "
                      autocomplete="off" required>
                </div>

                <div class="col-lg-2 mb-3">
                    <label class="form-label ">Fator Rh<span class="error_tag">*</span></label>
                    <input wire:model="fields.rh_factor"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>

                 <div class="col-lg-2 mb-3">
                    <label class="form-label ">Tipo sanguineo<span class="error_tag">*</span></label>
                    <input wire:model="fields.blood_type"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>

                 <div class="col-lg-3 mb-3">
                    <label class="form-label ">CID<span class="error_tag">*</span></label>
                    <div class="input-group input-group-flat">
                       <select  wire:model="fields.cid_wallet"  class="form-control ps-0" wire:ignore>
                          <option value="0">Selecione</option>
                          <option value="1">Deficiente Físico</option>
                          <option value="2">Deficiente Visual</option>
                          <option value="3">Deficiente Intelectual</option>
                          <option value="4">Deficiente Auditivo</option>
                          <option value="5">Autista</option>
                       </select>
                    </div>
                 </div>

                <div class="col-lg-4 mb-3">
                   <label class="form-label ">Titulo de eleitor<span class="error_tag">*</span></label>
                   <input wire:model="fields.voter_registration"  maxlength="70" type="text"
                      class="form-control ps-0 "
                      autocomplete="off" required>
                </div>
                <div class="col-lg-2 mb-3">
                   <label class="form-label ">Nº<span class="error_tag">*</span></label>
                   <input wire:model="fields.number_voter"  maxlength="70" type="text"
                      class="form-control ps-0 "
                      autocomplete="off" required>
                </div>
                <div class="col-lg-3 mb-3">
                   <label class="form-label ">Zona<span class="error_tag">*</span></label>
                   <input wire:model="fields.zone_voter"  maxlength="70" type="text"
                      class="form-control ps-0 "
                      autocomplete="off" required>
                </div>
                <div class="col-lg-3 mb-3">
                   <label class="form-label ">Seção<span class="error_tag">*</span></label>
                   <input wire:model="fields.section"  maxlength="70" type="text"
                      class="form-control ps-0 "
                      autocomplete="off" required>
                </div>
                <div class="col-lg-4 mb-4">
                   <label class="form-label ">Carteira nacional habilitação<span class="error_tag">*</span></label>
                   <input wire:model="fields.national_drivers_license"  maxlength="70" type="text"
                      class="form-control ps-0 "
                      autocomplete="off" required>
                </div>
                <div class="col-lg-4 mb-3">
                   <label class="form-label ">Certificado de reservista<span class="error_tag">*</span></label>
                   <input wire:model="fields.reservist_certificate"  maxlength="70" type="text"
                      class="form-control ps-0 "
                      autocomplete="off" required>
                </div>

                <div class="col-lg-4 mb-4">
                    <label class="form-label ">Carteira trabalho providência social<span class="error_tag">*</span></label>
                    <input wire:model="fields.social_security_work_card"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>


                 <div class="col-lg-4 mb-3">
                    <label class="form-label ">Numero Ctps<span class="error_tag">*</span></label>
                    <input wire:model="fields.ctps_number"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>

                 <div class="col-lg-4 mb-3">
                    <label class="form-label ">Serie<span class="error_tag">*</span></label>
                    <input wire:model="fields.serie_wallet"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>

                 <div class="col-lg-4 mb-3">
                    <label class="form-label ">Uf carteira<span class="error_tag">*</span></label>
                    <livewire:uf-select.uf-select
                       :defaultValue="$currentUfCarteira"
                       :customEvent="'selectedUfCarteira'"
                       />
                 </div>
                 <label class="form-label ">Identidade profissional 1<span class="error_tag">*</span></label>
                 <div class="col-lg-4 mb-3">
                    <label class="form-label ">Número de identidade profissional<span class="error_tag">*</span></label>
                    <input wire:model="fields.professional_id_number_1"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>

                 <div class="col-lg-4 mb-3">
                    <label class="form-label ">Sigla de identidade profissional<span class="error_tag">*</span></label>
                    <input wire:model="fields.professional_identity_acronym_1"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>

                 <div class="col-lg-3 mb-3">
                    <label class="form-label ">Uf identidade profissional<span class="error_tag">*</span></label>
                    <livewire:uf-select.uf-select
                       :defaultValue="$currentUfIdent"
                       :customEvent="'selectedUfIdent'"
                       />
                 </div>



                 <label class="form-label ">Identidade profissional 2<span class="error_tag">*</span></label>

                <div class="col-lg-4 mb-3">
                    <label class="form-label ">Número de identidade profissional<span class="error_tag">*</span></label>
                    <input wire:model="fields.professional_id_number_2"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>

                 <div class="col-lg-4 mb-3">
                    <label class="form-label ">Sigla de identidade profissional<span class="error_tag">*</span></label>
                    <input wire:model="fields.professional_identity_acronym_2"  maxlength="70" type="text"
                       class="form-control ps-0 "
                       autocomplete="off" required>
                 </div>




                <div class="col-lg-3 mb-3">
                   <label class="form-label ">Uf identidade profissional<span class="error_tag">*</span></label>
                   <livewire:uf-select.uf-select
                      :defaultValue="$currentUfIdent"
                      :customEvent="'selectedUfIdent'"
                      />
                </div>





             </div>
          </div>
       </div>
       @endif
       @if($selectedTab == "outros_dados")
       <div id="nome_social" role="tabpanel">
          <div class="page-body">
             <div class="container-fluid">
                <div class="row">
                   <div class="col-lg-12">
                      <div class="card mb-3">
                         <div class="card-body row">
                            <label class="mb-3" >Nome social</label>
                            <div class="col-lg-3 mb-3">
                               <label class="form-label ">Inclusão do nome social<span class="error_tag">*</span></label>
                               <div class="input-group input-group-flat">
                                  <select  wire:model="fields.social_name_visible"  class="form-control ps-0" wire:ignore>
                                     <option value="0">Selecione</option>
                                     <option value="1">Suprimir</option>
                                     <option value="2">Imprimir</option>
                                  </select>
                               </div>
                               @if (in_array("certificate", $errorsKeys))
                               <div class="error_tag" role="alert">
                                  O campo Certidão é obrigatório
                               </div>
                               @endif
                            </div>
                            <div class="col-lg-6 mb-3">
                               <label class="form-label ">Nome social<span class="error_tag">*</span></label>
                               <input wire:model="fields.name_social"  maxlength="70" type="text"
                                  class="form-control ps-0 "
                                  autocomplete="off" required>
                            </div>
                         </div>
                      </div>
                      <div class="card mb-3">
                         <div class="card-body row">
                            <div id="gemeo" role="tabpanel">
                               <div class="row">
                                  <label class="mb-3" >Gemeos</label>
                                  <div class="col-lg-3 mb-3">
                                     <label class="form-label ">Nº de RG de irmão gêmeo<span class="error_tag">*</span></label>
                                     <input wire:model="fields.rg_gemeo"  maxlength="70" type="text"
                                        class="form-control ps-0 "
                                        autocomplete="off" required>
                                     @if (in_array("certificate", $errorsKeys))
                                     <div class="error_tag" role="alert">
                                        O campo Certidão é obrigatório
                                     </div>
                                     @endif
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                     <label class="form-label ">Nome de irmão gêmeo<span class="error_tag">*</span></label>
                                     <input wire:model="fields.name_gemeo"  maxlength="70" type="text"
                                        class="form-control ps-0 "
                                        autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="card mb-3">
                         <div class="card-body row">
                            <div id="gemeo" role="tabpanel">
                               <div class="row">
                                  <label class="mb-3" >Nomes anteriores</label>
                                  <div class="col-lg-6 mb-3">
                                     <label class="form-label ">Nomes anteriores<span class="error_tag">*</span></label>
                                     <input wire:model="fields.names_previous"  maxlength="70" type="text"
                                        class="form-control ps-0 "
                                        autocomplete="off" required>
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                     <label class="form-label ">Filiações anteriores<span class="error_tag">*</span></label>
                                     <input wire:model="fields.filitions_previous"  maxlength="70" type="text"
                                        class="form-control ps-0 "
                                        autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   @endif
                   @if($selectedTab == "caracteristicas")
                   <div class=" mb-3">
                      <div class=" row">
                         <div id="gemeo" role="tabpanel">
                            <div class="row">
                               @foreach($caracteristics as $ca)
                               @if($ca->type == "Amputação")
                               <div class="col-lg-3 mb-3">
                                  <label   label class="form-label ">Altura<span class="error_tag">*</span></label>
                                  <input wire:model="fields.height" maxlength="70" type="text"
                                     class="form-control ps-0 "
                                     autocomplete="off" required>
                               </div>
                               @endif
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label ">{{$ca->type}}<span class="error_tag">*</span></label>
                                  <select    wire:model="fieldsFeatures.{{ strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))}}" class="form-control ps-0" name="select">
                                    <option value="0">Selecione</option>
                                    @foreach($ca->items as $item)
                                     <option  value="{{$item}}">{{$item}}</option>
                                     @endforeach
                                  </select>
                               </div>
                               @endforeach
                            </div>
                         </div>
                      </div>
                   </div>
                   @endif
                   @if($selectedTab == "documentos_digitalizados")
                   <div class=" mb-3">
                         <div id="gemeo" role="tabpanel">
                            @foreach($fieldsDigitalizedDocuments as $key => $item)
                            <div class="row">
                               <div class="col-lg-5 mb-3">

                              @if(isset($fieldsDigitalizedDocuments[$key]['file']) && $fieldsDigitalizedDocuments[$key]['file'] != '' )
                                 <input  value="{{$this->getDocument($fieldsDigitalizedDocuments[$key]['type'])}}"   maxlength="70" type="text" class="form-control ps-0 " autocomplete="off" readonly>
                              @else
                                 <select  wire:model="fieldsDigitalizedDocuments.{{$key}}.type" class="form-control ps-0" wire:ignore>
                                    <option value="0">Selecione</option>
                                    @unless(in_array("1",$jaUtilizados)) <option value="1">CPF</option> @endif
                                    @unless(in_array("2",$jaUtilizados)) <option value="2">PIS</option> @endif
                                    @unless(in_array("3",$jaUtilizados)) <option value="3">PASEP</option> @endif
                                    @unless(in_array("4",$jaUtilizados)) <option value="4">COMPROVANTE DE ENDEREÇO</option> @endif
                                    @unless(in_array("5",$jaUtilizados)) <option value="5">Laudo Médico</option> @endif
                                    @unless(in_array("6",$jaUtilizados)) <option value="6">TITULO ELEITOR</option> @endif
                                    @unless(in_array("7",$jaUtilizados)) <option value="7">IDENTIFICAÇÃO PROFISSIONAL</option> @endif
                                    @unless(in_array("8",$jaUtilizados)) <option value="8">CARTEIRA DE TRABALHO E PREVIDENCIA SOCIAL – CTPS</option> @endif
                                    @unless(in_array("9",$jaUtilizados)) <option value="9">CARTEIRA NACIONAL DE HABILITAÇÃO – CNH</option> @endif
                                    @unless(in_array("10",$jaUtilizados)) <option value="10">CERTIFICADO MILITAR</option> @endif
                                    @unless(in_array("11",$jaUtilizados)) <option value="11">EXAME TIPO SANGUINEO/FATOR RH</option> @endif
                                    @unless(in_array("12",$jaUtilizados)) <option value="12">COMPROVANTE DE VULNERABILIDADE OU A CONDIÇÃO PARTICULAR DE SAÚDE</option> @endif
                                    @unless(in_array("13",$jaUtilizados)) <option value="13">CARTÃO DE BENEFICIO SOCIAL</option> @endif
                                    @unless(in_array("14",$jaUtilizados)) <option value="14">ENCAMINHAMENTO SOCIAL</option> @endif
                                    @unless(in_array("15",$jaUtilizados)) <option value="15">BOLETIM DE OCORRENCIA</option> @endif
                                    @if($fields['name_social']) <option value="16">DECLARAÇÃO DE NOME SOCIAL</option> @endif
                                    @if($currentMatiral=='casado')<option value="17">CERTIDÃO DE CASAMENTO</option> @endif
                                    @if($currentMatiral=='divorciado')<option value="18">CERTIDÃO DE CASAMENTO/DIVORCIADO</option> @endif
                                    @if($fields['type_of_certificate'] == 2) <option value="19">CERTIDÃO DE NASCIMENTO</option> @endif
                                    @if($fields['type_of_certificate'] == 6) <option value="20">Certidão de casamento/COM AVERBAÇÃO DE SEPARAÇÃO</option> @endif
                                    @if($fields['type_of_certificate'] == 7) <option value="21">Certidão de casamento/CASAMENTO COM AVERBAÇÃO DE ÓBITO</option> @endif
                                    @if($fields['migration_situation'] == 2 || $fields['migration_situation'] == 3) <option value="22">CERTIDÃO DE NASCIMENTO/CASAMENTO ESTRANGEIRA</option> @endif
                                 </select>
                              @endif

                               </div>
                               <div class="col-lg-3 mb-3">
                                    @if(isset($fieldsDigitalizedDocuments[$key]['file'] ) && $fieldsDigitalizedDocuments[$key]['file'] != '' && strpos( $fieldsDigitalizedDocuments[$key]['file'], "tmp") == false)
                                        <a href="" target="_blank" >

                                            <a onclick="window.open('/{{ str_replace("public","storage", $fieldsDigitalizedDocuments[$key]['file']) }}', '_blank')" class="btn btn-primary inline-flex">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="2"></circle>
                                                    <path d="M12 19c-4 0 -7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7c-.42 .736 -.858 1.414 -1.311 2.033"></path>
                                                    <path d="M15 19l2 2l4 -4"></path>
                                                 </svg>
                                                Abrir documento
                                             </a>

                                             <a href="/{{ str_replace("public","storage", $fieldsDigitalizedDocuments[$key]['file']) }}" download  class="btn btn-primary inline-flex">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                    <polyline points="7 11 12 16 17 11"></polyline>
                                                    <line x1="12" y1="4" x2="12" y2="16"></line>
                                                 </svg>
                                                Download
                                             </a>
                                        </a>
                                    @else
                                     @if(isset($fieldsDigitalizedDocuments[$key]['type']) && $fieldsDigitalizedDocuments[$key]['type'])
                                        <input wire:change="addedDocument();" type="file"   wire:model="fieldsDigitalizedDocuments.{{$key}}.file">
                                     @else
                                        <input wire:change="addedDocument();" type="file"   wire:model="fieldsDigitalizedDocuments.{{$key}}.file" disabled>
                                     @endif
                                    @endif
                               </div>
                            </div>
                                  @endforeach

                            </div>

                      </div>
                   </div>
                   @endif
                   @if($selectedTab == "certidao")
                   <div id="certidao" role="tabpanel">
                      <div class="page-body">
                         <div class="container-fluid">
                            <div class="row">
                               <div class="col-lg-2 mb-3">
                                  <label class="form-label ">CERTIDÃO<span class="error_tag">*</span></label>
                                  <div class="input-group input-group-flat">
                                     <select wire:model="fields.certificate" class="form-control ps-0" wire:ignore>
                                        <option value="0">Selecione</option>
                                        <option value="1">Nova</option>
                                        <option value="2">Antiga</option>
                                     </select>
                                  </div>
                                  @if (in_array("certificate", $errorsKeys))
                                  <div class="error_tag" role="alert">
                                     O campo Certidão é obrigatório
                                  </div>
                                  @endif
                               </div>
                               @if($fields['certificate'] == 2 || $fields['certificate'] == "2")
                               <div class="col-lg-2 mb-3">
                                  <label class="form-label ">Tipo De Certidão<span class="error_tag">*</span></label>
                                  <div  class="input-group input-group-flat">
                                     <select wire:model="fields.type_of_certificate" class="form-control ps-0" wire:ignore>
                                        <option value="0">Selecione</option>
                                        <option value="1">Casado</option>
                                        <option value="2">Nascimento</option>
                                        <option value="3">Igualdade</option>
                                        <option value="4">Naturalização</option>
                                        <option value="5">Casamento/Divorcio</option>
                                        <option value="6">Casamento/Separação</option>
                                        <option value="7">Casamento/Óbito</option>
                                     </select>
                                  </div>
                                  @if (in_array("type_of_certificate", $errorsKeys))
                                  <div class="error_tag" role="alert">
                                     O campo Tipo de certificado é obrigatório
                                  </div>
                                  @endif
                               </div>
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Nº do Termo ou Ordem<span
                                     class="error_tag">*</span></label>
                                  <input wire:model="fields.term_number"  maxlength="70" type="text"
                                     class="form-control ps-0 "
                                     autocomplete="off" required>
                               </div>
                               <div class="col-lg-2 mb-3">
                                  <label class="form-label ">Nº Do Livro<span class="error_tag">*</span></label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="fields.book_number"  maxlength="70" type="text"
                                     class="form-control ps-0 "
                                     autocomplete="off" required>
                                  </div>
                                  @if (in_array("book_number", $errorsKeys))
                                  <div class="error_tag" role="alert">
                                     O campo Número do livro é obrigatório
                                  </div>
                                  @endif
                               </div>
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Letra Do Livro<span
                                     class="error_tag">*</span></label>
                                  <div  class="input-group input-group-flat">
                                     <select wire:model="fields.book_letter" class="form-control ps-0" @if($fields['type_of_certificate'] == 3 || $fields['type_of_certificate'] ==  4) disabled  @endif>
                                     <option value="0">Selecione</option>
                                     @if($fields['type_of_certificate'] == 1 || $fields['type_of_certificate'] == 6 || $fields['type_of_certificate'] == 7 )
                                     <option value="B">B</option>
                                     <option value="B AUX">B Aux</option>
                                     <option value="E">E</option>
                                     @endif
                                     @if($fields['type_of_certificate'] == 2 )
                                     <option value="A">A</option>
                                     <option value="E">E</option>
                                     @endif
                                     </select>
                                  </div>
                                  @if (in_array("book_letter", $errorsKeys))
                                  <div class="error_tag" role="alert">
                                     O campo Letra do livro é obrigatório
                                  </div>
                                  @endif
                               </div>
                               @if($fields['type_of_certificate'] == 3 || $fields['type_of_certificate'] ==  4)
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Doc. encaminhado com o processo<span
                                     class="error_tag">*</span></label>
                                  <div  class="input-group input-group-flat">
                                     <select wire:model="fields.forwarded_with_process" class="form-control ps-0" >
                                        <option value="0">Selecione</option>
                                        <option value="1">Original e copia (certidão nascimento)</option>
                                        <option value="2">Original e copia (certidão casamento)</option>
                                        <option value="3">Original e copia (certidão casamento/divorcio)</option>
                                        <option value="4">Original e copia (certidão casamento/divorcio)</option>
                                        <option value="5">Original e copia (certidão casamento/separação)</option>
                                        <option value="6">Original e copia (certidão casamento/obito)</option>
                                        <option value="7">Original e copia (cert/dou naturalização)</option>
                                        <option value="8">Original e copia (cert/dou naturalização casamento/divorciado)</option>
                                     </select>
                                  </div>
                               </div>
                               @endif
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Nº da folha<span
                                     class="error_tag">*</span></label>
                                  <input wire:model="fields.sheet_number" maxlength="70" type="text"
                                     class="form-control ps-0 "
                                     autocomplete="off" required>
                                  @if (in_array("sheet_number", $errorsKeys))
                                  <div class="error_tag" role="alert">
                                     O campo Letra do livro é obrigatório
                                  </div>
                                  @endif
                               </div>
                               <div class="col-lg-1">
                                  <div class="mb-3">
                                     <label class="form-label">UF<span class="error_tag">*</span></label>
                                     <livewire:uf-select.uf-select
                                        :defaultValue="$currentUfCert"
                                        :customEvent="'selectedUfCert'"
                                        />
                                  </div>
                               </div>
                               <div class="col-lg-3">
                                  <div class="mb-3">
                                     <label class="form-label">Município de Naturalidade<span
                                        class="error_tag">*</span></label>
                                     <livewire:county-select.county-select
                                        :defaultValue="$currentCountyCert"
                                        :customEvent="'selectedCountyCert'"
                                        />
                                     @if (in_array("sheet_number", $errorsKeys))
                                     <div class="error_tag" role="alert">
                                        O campo Município de Naturalidade é obrigatório
                                     </div>
                                     @endif
                                  </div>
                               </div>
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Cartório<span
                                     class="error_tag">*</span></label>
                                  @livewire('registry-select.registry-select', ['defaultValue' => $registrySuspension])
                               </div>
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Certidão do Cadastro Anterior<span
                                     class="error_tag">*</span></label>
                                  <input wire:model="fields.previous_registration_certificate" maxlength="70" type="text"
                                     class="form-control ps-0 "
                                     autocomplete="off" required>
                                  @if (in_array("previous_registration_certificate", $errorsKeys))
                                  <div class="error_tag" role="alert">
                                     O campo Certidão do Cadastro Anterior é obrigatório
                                  </div>
                                  @endif
                               </div>
                               @endif
                               @if($fields['certificate'] == 1)
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Data de Assentamento da Certidão<span
                                     class="error_tag">*</span></label>
                                  <input onclick="IMask(
                                     this, {
                                     mask: '00/00/0000'
                                     });" wire:model="fields.certificate_entry_date"  wire:change="changeRegistration" maxlength="70" type="text"
                                     class="form-control date ps-0 "
                                     autocomplete="off" required>
                               </div>
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Indicativo de Casamento Homoafetivo<span
                                     class="error_tag">*</span></label>
                                  <div  class="input-group input-group-flat">
                                     <select name="same_sex_marriage" wire:model="fields.same_sex_marriage" class="form-control ps-0" wire:ignore>
                                        <option value="0">Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label ">Tipo De Certidão<span class="error_tag">*</span></label>
                                  <div  class="input-group input-group-flat">
                                     <select wire:model="fields.type_of_certificate_new" class="form-control ps-0">
                                        <option value="0">Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Matricula  {{$registrationError}}<span
                                     class="error_tag">*</span></label>
                                  <input wire:change="changeRegistration" onclick="IMask(
                                     this, {
                                     mask: '000000 00 00 0000 0 00000 000 0000000 00'
                                     });" maxlength="70" type="text"
                                     wire:model="fields.matriculation"
                                     class="form-control ps-0 "
                                     autocomplete="off" required>
                                  @if ($registrationError == false)
                                  <div class="error_tag" role="alert">
                                     Existe um problema ná matricula inserida por favor, verifique em seu cartório de origem.
                                  </div>
                                  @endif
                               </div>
                               @endif
                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Data da Certidão/DOU<span
                                     class="error_tag">*</span></label>
                                  <input onclick="IMask(
                                     this, {
                                     mask: '00/00/0000'
                                     });" wire:change="changeRegistration" wire:model="fields.dou_certificate_date" maxlength="70" type="text"
                                     class="form-control ps-0 "
                                     autocomplete="off" required>
                                  @if($fields['dou_certificate_date'])
                                  @unless($this->checkDataIsValid($fields['dou_certificate_date']))
                                  <div class="error_tag" role="alert">
                                     A data esta com um formato invalida.
                                  </div>
                                  @endif
                                  @endif
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   @endif
                   <div class="tab-pane" id="tabs-settings-7" role="tabpanel">
                   </div>
                </div>
             </div>
          </div>
       </div>
 </form>
 <script>
    document.addEventListener('turbolinks:load', () => {
        let path = window.location.pathname;
        if (!path.includes("edit")) {
            var today = new Date();
            $('#modal-search').modal('show');
            $('#date').val(today.toISOString().substring(0, 10));
        }
    })

    window.addEventListener('closeModalSearch', ({detail: {user}}) => {
        $('#modal-search').modal('hide');
    })

    window.addEventListener('closeModalList', ({detail: {user}}) => {
        $('#modal-list').modal('hide');
    })

    window.addEventListener('selectedTab', ({detail: {tab}}) => {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    })

    $('#modal-report').on('shown.bs.modal', function (e) {
        var elements = document.querySelector('#nsc');
        var momentMask = new IMask(element, {
            mask: '00/00/0000'
        });
    })


    $("#modal-captura-facial" ).on('shown.bs.modal', function(){
        setupStartCaptureImage()
    });


    function convertFileToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
        });
    }

    let isImageSelected = false
    let tipeCaputure = ''

    function saveImageFacial(){
        if(isImageSelected == false){
            Swal.fire('Antes de salvar capture, ou insira um anexo.', '', 'warning')
            return false
        }
        if (tipeCaputure == 1){
            Swal.fire('Foto salva com sucesso.', '', 'success')
        }else{
            let canvas = document.querySelector("#canvas");
            const base64Canvas = canvas.toDataURL("image/jpeg").split(';base64,')[1];
            $("#file-capture-image_string").val(base64Canvas);

            Livewire.emit('setFaceCapture', base64Canvas)
            Swal.fire('Foto salva com sucesso.', '', 'success')
        }

        $('#modal-captura-facial').modal('hide')

    }

    function setupStartCaptureImage(){
        let camera_button = document.querySelector("#start-camera");
        let video = document.querySelector("#video");
        let click_button = document.querySelector("#capturar");
        let canvas = document.querySelector("#canvas");

        camera_button.addEventListener('click', async function() {
   	        let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
	        video.srcObject = stream;
        });

        document.getElementById("file-capture-image").addEventListener("change",async function({target}){
            isImageSelected = true
            tipeCaputure = 1
            if (target.files && target.files.length) {
                const imagePreviewBase64 = await convertFileToBase64(target.files[0]);
                Livewire.emit('setImagePreview', imagePreviewBase64)
                document.getElementById("salvar-captura").style.display = "flex";

            }
        })


        click_button.addEventListener('click', function() {
            $('#canvas').show()
            $('#capturar-novamente').show()
            $('#salvar-captura').show()

            $('#video').hide()

            $('#capturar').hide()

            $('#image-preview').hide()


            isImageSelected = true
            tipeCaputure = 2

   	        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
   	        let image_data_url = canvas.toDataURL('image/jpeg');



   	        // data url of the image
   	        console.log(image_data_url);
        });
    }



 </script>
 </div>
