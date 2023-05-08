<div x-data="{
    isOpen:1,
    select(value) {
    this.isOpen = value
    }
    }" class="card page-wrapper">
 @include('livewire.citizen.dialogs.dialog-capture')

 @if($process || $inProcessing)
   @if(isset($process->divergence) && $process->divergence == true)
      <div data-status-process="none" class="alert animated flipInX alert-danger alert-dismissible flipOutX"><strong>
       Status: {{ App\Models\Process::SITUATION_TYPES_LABELS[$process->situation]}} </strong>
      <p> Comentário: {{ $process->last_message }}.</p>
      <br>
      <button wire:click="setAdjusted()" type="button" class=" bg-success  focus:ring-4 rounded-lg
          text-sm p-2.5 text-center text-white" x-data="{id:'modal-change-state'}" x-on:click="modal=true">
            Marcar como corrigido
      </button>

      <span class="close" data-dismiss="alert"><i class="fa fa-times-circle"></i></span>

    </div>
   @else
      <div data-status-process="blocked" style="display:flex" class="alert animated flipInX alert-warning alert-dismissible flipOutX"><strong style="display:flex">
      <svg style="margin:1%" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M15 4.55a8 8 0 0 0 -6 14.9m0 -4.45v5h-5"></path>
   <path d="M18.37 7.16l0 .01"></path>
   <path d="M13 19.94l0 .01"></path>
   <path d="M16.84 18.37l0 .01"></path>
   <path d="M19.37 15.1l0 .01"></path>
   <path d="M19.94 11l0 .01"></path>
</svg>  Este cidadão está em processamento, portanto, não pode ser editado até que o processo atual seja concluído.</strong>
      </div>

   @endif

 @endif

 <div data-keyboard="false" data-backdrop="static" wire:ignore.self
   class="modal modal-blur fade" id="modal-search" tabindex="-1"
   role="dialog" aria-hidden="true">
   <div data-backdrop="static"
      class="modal-dialog modal-lg modal-dialog-centered"
      role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Consultar</h5>
            <button type="button" class="btn-close"
               data-bs-dismiss="modal"
               aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-lg-6 mb-3">
                  <label class="form-label">CPF</label>
                  <input onclick="IMask(
                     this, {
                     mask: '000.000.000-00'
                     });" wire:model="searchCpf" placeholder="Cpf do cidadão"
                     type="text" class="form-control cpf"
                     name="example-text-input"
                     placeholder="Busque por Nome, Rg, Genero, Data de nascimento, Filiação">
               </div>
               <div class="col-lg-6 mb-3">
                  <label class="form-label">RG</label>
                  <input wire:model="searchRg"
                     placeholder="RG do cidadão"
                     type="text" class="form-control"
                     name="example-text-input"
                     placeholder="Busque por Nome, Rg, Genero, Data de nascimento, Filiação">
               </div>
            </div>
            <label>Outros dados para pesquisa</label>
            <div class="row">
               <div class="col-lg-6 mb-3">
                  <label class="form-label">Nome</label>
                  <input wire:model="searchName"
                     placeholder="Nome cidadão"
                     type="text" class="form-control"
                     name="example-text-input"
                     placeholder="Busque por Nome, Rg, Genero, Data de nascimento, Filiação">
               </div>
               <div class="col-lg-6 mb-3">
                  <label class="form-label">Gênero</label>
                  <div class="input-group input-group-flat">
                     <select wire:model="searchGenrer"
                        class="form-control ps-0"
                        name="select">

                        @foreach ($genres as $item)
                        <option
                           value="{{$item['id']}}">{{$item['name']}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-6 mb-3">
                  <label class="form-label">Data de
                  nascimento</label>
                  <input id="nsc" onclick="IMask(
                     this, {
                     mask: '00/00/0000'
                     });" wire:model="searchBirth" placeholder="Data nascimento"
                     type="text" class="form-control date"
                     name="example-text-input"
                     placeholder="Busque por Nome, Rg, Genero, Data de nascimento, Filiação">
               </div>
               <div class="col-lg-6 mb-3">
                  <label class="form-label">Filiação</label>
                  <input wire:model="searchFilitation"
                     placeholder="Filiação" type="text"
                     class="form-control"
                     name="example-text-input"
                     placeholder="Busque por Nome, Rg, Genero, Data de nascimento, Filiação">
               </div>
            </div>
         </div>
         <div class="modal-footer">
            @can('permission', 'citizen.create')
            <a style="margin-bottom:30px"
               wire:click="goSearch()"
               onclick="$('#modal-list').modal('hide');"
               class="btn btn-primary inline-flex">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <svg xmlns="http://www.w3.org/2000/svg"
                  class="icon icon-tabler icon-tabler-plus"
                  width="24" height="24" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor"
                  fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"
                     fill="none"></path>
                  <line x1="12" y1="5" x2="12" y2="19"></line>
                  <line x1="5" y1="12" x2="19" y2="12"></line>
               </svg>
               Cadastrar
            </a>
            @endcan
            <a style="margin-bottom:30px"
               wire:click="goSearch()"
               onclick="$('#modal-list').modal('show');"
               class="btn btn-primary inline-flex">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <svg xmlns="http://www.w3.org/2000/svg"
                  class="icon icon-tabler icon-tabler-search"
                  width="24" height="24" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor"
                  fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"
                     fill="none"></path>
                  <circle cx="10" cy="10" r="7"></circle>
                  <line x1="21" y1="21" x2="15"
                     y2="15"></line>
               </svg>
               Pesquisar
            </a>
         </div>
      </div>
   </div>
</div>

<style>
    .modal .modal-dialog { width: 100%; }

    td
{
    height: 50px;
    width: 50px;
}

#cssTable td
{
    text-align: center;
    vertical-align: middle;
}
</style>



<div data-keyboard="false" data-backdrop="static" wire:ignore.self
class="modal modal-blur fade" id="modal-captura-assinatura" tabindex="-1"
role="dialog"  aria-hidden="true">
<div data-backdrop="static" style="width:1250px;"
   class="modal-dialog modal-xl modal-dialog-centered"
   role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Captura de assinatura</h5>
         <button type="button" class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1></h1>
        <img style="margin: 1%" wire:ignore id="image-sign" style="width: 100%; height: 100%" >

        @if($justificationSign)
            <div class="alert alert-danger" role="alert">
                {{$justificationSign}}
            </div>
        @endif

        <a id="cartorio-assinatura"   onclick="callColectorSignature()" class="btn btn-primary inline-flex">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-certificate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <circle cx="15" cy="15" r="3"></circle>
               <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5"></path>
               <path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73"></path>
               <line x1="6" y1="9" x2="18" y2="9"></line>
               <line x1="6" y1="12" x2="9" y2="12"></line>
               <line x1="6" y1="15" x2="8" y2="15"></line>
            </svg>
          CARTÓRIO
         </a>

         <a id="normal-assinatura" class="btn btn-primary inline-flex">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <circle cx="12" cy="12" r="9"></circle>
             <line x1="9" y1="10" x2="9.01" y2="10"></line>
             <line x1="15" y1="10" x2="15.01" y2="10"></line>
             <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
          </svg>
          NORMAL
         </a>

         <a  onclick="$('#justificativa-text').toggle();$('#salvar-jus').toggle();$('#justificar-assinatura').toggle();" id="justificar-assinatura"  class="btn btn-warning" class="btn btn-primary inline-flex">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-justified" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="4" y1="6" x2="20" y2="6"></line>
                <line x1="4" y1="12" x2="20" y2="12"></line>
                <line x1="4" y1="18" x2="16" y2="18"></line>
             </svg>
             JUSTIFICAR ASSINATURA
        </a>

        <a style="display: none" id="salvar-jus"  onclick="saveJus()" class="btn btn-success" class="btn btn-primary inline-flex">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                <circle cx="12" cy="14" r="2"></circle>
                <polyline points="14 4 14 8 8 8 8 4"></polyline>
            </svg>
             SALVAR JUSTIFICATIVA
        </a>

        <a   id="anexar-assinatura" onclick="triggerFileSign()" class="btn btn-primary" class="btn btn-primary inline-flex">
         <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
         </svg>
          ANEXAR ASSINATURA
        </a>

        <a  id="salvar-assinatura"  wire:click="createAttachmentSignature()" class="btn btn-success" class="btn btn-primary inline-flex">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                <circle cx="12" cy="14" r="2"></circle>
                <polyline points="14 4 14 8 8 8 8 4"></polyline>
            </svg>
             SALVAR ASSINATURA
        </a>



        <div id="justificativa-text" style="margin: 1%;display:none" class="form-group">
            <label for="exampleFormControlTextarea1">Descreva a justificativa</label>
            <textarea id="justificativa-text-input" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>





        <form style="display: none" wire:submit.prevent="save">
            <input id="fileSign" onchange="onFileSelectedSign(event)" type="file" wire:model="signFile">
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            <button type="submit">Save Photo</button>
        </form>

      </div>
   </div>
</div>
</div>

<div data-keyboard="false" data-backdrop="static" wire:ignore.self
class="modal modal-blur fade" id="modal-captura-biometrica" tabindex="-1"
role="dialog"  aria-hidden="true">
<div data-backdrop="static" style="width:1250px;"
   class="modal-dialog modal-xl modal-dialog-centered"
   role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Captura biométrica</h5>
         <button type="button" class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <table style="
            width: 100%;
            height: 100%;" border="1" cellpadding="100" cellspacing="10">
            <caption>Table Caption</caption>
            <thead>
                <tr>
                    <th class="border">Polegar esquerdo</th>
                    <th  class="border">Indicador esquerdo</th>
                    <th  class="border">Médio esquerdo</th>
                    <th  class="border">Anelar esquerdo</th>
                    <th  class="border">Minimo esquerdo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td style="height:100px;"  class="select-biometri border context-menu-one" ></td>
                  <td style="height:100px;"   class="select-biometri border context-menu-one"></td>
                  <td style="height:100px;"  class="select-biometri border context-menu-one " ></td>
                  <td style="height:100px;"   class="select-biometri border context-menu-one"  ></td>
                  <td style="height:100px;"  class="select-biometri border context-menu-one"  ></td>
                </tr>
                <thead>
                    <tr>
                        <th class="border">Polegar direito</th>
                        <th  class="border">Indicador direito</th>
                        <th  class="border">Médio direito</th>
                        <th  class="border">Anelar direito</th>
                        <th  class="border">Minimo direito</th>
                    </tr>
                </thead>
                <tr >
                  <td style="height:100px; " class="select-biometri border context-menu-one"  >

                  </td>
                  <td style="height:100px;"  class="select-biometri border context-menu-one"  ></td>
                  <td style="height:100px;"  class="select-biometri border context-menu-one" ></td>
                  <td style="height:100px;"  class="select-biometri border context-menu-one " ></td>
                  <td style="height:100px;"  class="select-biometri border context-menu-one"  ></td>
                </tr>
            </tbody>
        </table>


      </div>
   </div>
</div>
</div>

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
                   @if ($this->action == 'update')
                     @livewire('citizen.modal-change-state', ['citizen' => $citizen])
                   @endif

                   @if($process)
                   <a  wire:click="viewCurrentProcess()"  class="btn btn-primary inline-flex">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                     </svg>
                     Visualizar processo atual
                   </a>
                   @endif

                   <a onclick="$('#modal-captura-biometrica').modal('show');"  class="btn btn-primary inline-flex">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-ring-finger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 13v-2.5a1.5 1.5 0 0 1 3 0v1.5"></path>
                        <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7a69.74 69.74 0 0 1 -.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47"></path>
                        <path d="M11 11.5v-2a1.5 1.5 0 1 1 3 0v2.5"></path>
                        <path d="M14 12v-6.5a1.5 1.5 0 0 1 3 0v6.5"></path>
                     </svg>
                     Captura Biométrica
                  </a>

                  <a onclick="$('#modal-captura-assinatura').modal('show');"  class="btn btn-primary inline-flex">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-writing" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z"></path>
                        <path d="M16 7h4"></path>
                        <path d="M18 19h-13a2 2 0 1 1 0 -4h4a2 2 0 1 0 0 -4h-3"></path>
                     </svg>
                    Captura de Assinatura
                  </a>
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
                 @if((Auth::user()->can('permission', 'citizen.create') || Auth::user()->can('permission', 'citizen.edit')) && ($this->action == 'create' || $this->citizen->state == \App\Models\Citizen::STATE_ACTIVE))
                   <a wire:click="createCitizen" class="btn btn-primary inline-flex">
                      <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                         <line x1="12" y1="5" x2="12" y2="19"/>
                         <line x1="5" y1="12" x2="19" y2="12"/>
                      </svg>
                      Finalizar
                   </a>
                   @endif
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
          <a onclick="loadMultSelectOutrosDocumentos()" wire:click="setSelectedTab('outros_documentos')"  data-bs-toggle="tab" aria-selected="false"
          class="nav-link @if($selectedTab == "outros_documentos") active @else   @endif"
          role="tab" tabindex="-1">Outros documentos</a>
       </li>
       <li class="nav-item" role="presentation">
          <a wire:click="setSelectedTab('caracteristicas');" onclick="loadMultSelectCaracteristicas()"  data-bs-toggle="tab" aria-selected="false"
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
                            <label class="form-label">Rg</label>
                            <div class="input-group input-group-flat">
                               <input wire:model="fields.rg" maxlength="70" type="text"
                                  class="form-control ps-0" autocomplete="off"
                                  required>
                            </div>
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
                                  <label class="form-label">Filiação</label>
                                  <div class="input-group input-group-flat">
                                     <input wire:model="filiation.name"
                                        type="text"
                                        class="form-control ps-0"
                                        autocomplete="off" required>
                                  </div>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="mb-3">
                                 <label style="" class="form-label">Tipo</label>
                                 <div class="input-group mb-1">
                                  <select wire:model="filiation.type" class="form-control">
                                    <option value="{{ \App\Models\Filiation::TYPE_MATERNAL }}">{{ \App\Models\Filiation::TYPE_LABEL[\App\Models\Filiation::TYPE_MATERNAL] }}</option>
                                    <option value="{{ \App\Models\Filiation::TYPE_PATERNAL }}">{{ \App\Models\Filiation::TYPE_LABEL[\App\Models\Filiation::TYPE_PATERNAL] }}</option>

                                 </select>
                                    <div class="input-group-append">
                                       <a style="text-align: center" wire:click="addFiliation"
                                          class="btn btn-primary d-none d-sm-inline-block">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                          <div class="flex">

                                          <svg style="text-align: center ml-2" xmlns="http://www.w3.org/2000/svg" class=""
                                             width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                                             <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                             <line x1="12" y1="5" x2="12" y2="19" />
                                             <line x1="5" y1="12" x2="19" y2="12" />
                                          </svg>
                                          Adicionar Filiação
                                       </div>

                                       </a>
                                    </div>

                                 </div>
                               </div>
                            </div>

                            @if (!empty($fields['filiations']))

                            <div class="p-2 rounded border-1 border-red-300">
                              <h2 class="text-md font-bold">Filiações</h2>
                                 <div class="card-body px-0 py-2">
                                    <div id="table-default" class="table-responsive">
                                       <table class="table">
                                          <thead>
                                             <tr>
                                                <th>Nome</th>
                                                <th>Tipo</th>
                                             </tr>
                                          </thead>
                                          <tbody class="table-tbody">
                                             @foreach ($fields['filiations'] as $filiation)
                                             <tr>
                                                <td class="sort-name">{{  $filiation['name'] }}</td>
                                                <td class="sort-city">{{  \App\Models\Filiation::TYPE_LABEL[$filiation['type']] }}</td>
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
                            O campo Sexo Biológico é obrigatório
                         </div>
                         @endif
                      </div>
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
                            <label class="form-label">Indicador Social</label>
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
                            <label class="form-label">Nº Social</label>
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
                               readonly="true"
                               />
                            @if (in_array("service_station_id", $errorsKeys))
                            <div class="error_tag" role="alert">
                               O campo Posto de atendimento é obrigatório
                            </div>
                            @endif
                         </div>
                      </div>
                      <div class="col-lg-2">
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

                      <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Isenção<span
                              class="error_tag">*</span></label>
                           <select wire:model="is_payment_free" class="form-control ps-0"
                              name="select">
                              <option value="0">NÃO ISENTO</option>
                              <option value="1">ISENTO</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Tipo de Isenção<span
                              class="error_tag">*</span></label>
                           <select wire:model="exemption_type" class="form-control ps-0"
                              name="select">
                              <option value="" disabled selected>Selecione</option>
                              @foreach (App\Models\Process::PAYMENT_EXEMPTION_TYPES as $type)
                                 <option value="{{ $type }}">{{ $type }}</option>
                              @endforeach
                           </select>
                        </div>
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
                   <label class="form-label ">Zona<span class="error_tag">*</span></label>
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
                      <input onclick="IMask(
                        this, {
                        mask: '00.000-000'
                        });" wire:model="fields.zip_code" maxlength="70" type="text"
                         class="form-control ps-0"
                         onblur="pesquisacep(this.value);"
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
                      O campo Logradouro é obrigatório
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
                   <input id="rua" wire:model="fields.address" maxlength="70" type="text"
                      class="form-control ps-0"
                      autocomplete="off" required>
                   @if (in_array("address", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Endereço é obrigatório
                   </div>
                   @endif
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label">Bairro<span
                       class="error_tag">*</span></label>
                    <input id="bairro" wire:model="fields.district" maxlength="70" type="text"
                       class="form-control ps-0"
                       autocomplete="off" required>
                    @if (in_array("address", $errorsKeys))
                    <div class="error_tag" role="alert">
                       O campo Bairro é obrigatório
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
                   <label class="form-label">Complemento</label>
                   <input wire:model="fields.complement" maxlength="70" type="text"
                      class="form-control ps-0"
                      autocomplete="off" required>
                   @if (in_array("complement", $errorsKeys))
                   <div class="error_tag" role="alert">
                      O campo Complemento é obrigatório
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
                   <label class="form-label">Tel. fixo</label>
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
                <div class="col-lg-4 mb-3">
                  <label class="form-label">Confirmar Email</label>
                  <input  wire:model="confirm_email"
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
             <div class="col-lg-12 mb-3">
                <label class="form-label ">Nomes anteriores<span class="error_tag">*</span></label>
                <input wire:model="fields.names_previous"  maxlength="70" type="text"
                   class="form-control ps-0 "
                   autocomplete="off" required>
             </div>
             <div class="col-lg-12 mb-3">
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
                      <label class="form-label ">CNI</label>
                      <input wire:model="fields.cni"  maxlength="70" type="text"
                         class="form-control ps-0 " autocomplete="off" required>
                   </div>
                   <div class="col-lg-3 mb-3">
                      <label class="form-label ">Carteira nacional do sus</label>
                      <input wire:model="fields.national_card_sus"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-2 mb-3">
                      <label class="form-label ">Fator Rh</label>
                      <input wire:model="fields.rh_factor"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-2 mb-3">
                      <label class="form-label ">Tipo sanguineo</label>
                      <input wire:model="fields.blood_type"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>

                   <div class="col-lg-4 mb-3">
                      <label class="form-label ">Título de eleitor (nº)</label>
                      <input wire:model="fields.voter_registration"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
{{--                    <div class="col-lg-2 mb-3">
                      <label class="form-label ">Nº<span class="error_tag">*</span></label>
                      <input wire:model="fields.number_voter"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div> --}}
                   <div class="col-lg-3 mb-3">
                      <label class="form-label ">Zona</label>
                      <input wire:model="fields.zone_voter"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-3 mb-3">
                      <label class="form-label ">Seção</label>
                      <input wire:model="fields.section"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-4 mb-4">
                      <label class="form-label ">Carteira nacional habilitação</label>
                      <input wire:model="fields.national_drivers_license"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-4 mb-3">
                      <label class="form-label ">Certificado de reservista</label>
                      <input wire:model="fields.reservist_certificate"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
{{--                    <div class="col-lg-4 mb-4">
                      <label class="form-label ">Carteira trabalho providência social</label>
                      <input wire:model="fields.social_security_work_card"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div> --}}
                   <div class="col-lg-4 mb-3">
                      <label class="form-label ">CTPS nº</label>
                      <input wire:model="fields.ctps_number"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-4 mb-3">
                      <label class="form-label ">Serie</label>
                      <input wire:model="fields.serie_wallet"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-4 mb-3">
                      <label class="form-label ">Uf carteira</label>
                      <livewire:uf-select.uf-select
                         :defaultValue="$currentUfCarteira"
                         :customEvent="'selectedUfCarteira'"
                         />
                   </div>
                   <label class="form-label ">Identidade profissional 1</label>
                   <div class="col-lg-4 mb-3">
                      <label class="form-label ">Número de identidade profissional</label>
                      <input wire:model="fields.professional_id_number_1"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-4 mb-3">
                      <label class="form-label ">Sigla de identidade profissional</label>
                      <input wire:model="fields.professional_identity_acronym_1"  maxlength="70" type="text"
                         class="form-control ps-0 "
                         autocomplete="off" required>
                   </div>
                   <div class="col-lg-3 mb-3">
                      <label class="form-label ">Uf identidade profissional</label>
                      <livewire:uf-select.uf-select
                         :defaultValue="$currentUfIdent"
                         :customEvent="'selectedUfIdent'"
                         />
                   </div>

                   @foreach($professionalIdentitys as $key => $item)

                   @php
                        $id_uf_profissional_identy = "uf_profissional_identy_".$key
                   @endphp

                   <div  class="row">
                      <label class="form-label ">Identidade profissional {{ $key+2 }}<span class="error_tag">*</span></label>
                      <div class="col-lg-4 mb-3">
                         <label class="form-label ">Número de identidade profissional<span class="error_tag">*</span></label>
                         <input wire:model="professionalIdentitysValues.{{$key}}.professional_id_number_1"  maxlength="70" type="text"
                            class="form-control ps-0 "
                            autocomplete="off" required>
                      </div>
                      <div class="col-lg-4 mb-3">
                         <label class="form-label ">Sigla de identidade profissional<span class="error_tag">*</span></label>
                         <input wire:model="professionalIdentitysValues.{{$key}}.professional_identity_acronym_1" maxlength="70" type="text"
                            class="form-control ps-0 "
                            autocomplete="off" required>
                      </div>
                      <div wire:ignore class="col-lg-4 mb-3">
                        <label class="form-label ">Uf identidade profissional<span class="error_tag">*</span></label>
                        <select id="{{$id_uf_profissional_identy}}" wire:model="professionalIdentitysValues.{{$key}}.uf_identy" onchange="livewire.emit('updated_uf_ident', ['{{$key}}', $('#{{$id_uf_profissional_identy}}').val()])" class="form-control multselectx"  >
                            @foreach($ufs as $uf)
                             <option value="{{$uf['acronym']}}">{{$uf['acronym']}}</option>
                            @endforeach
                         </select>
                      </div>
                   </div>
                   @endforeach
                </div>
                <div class="col-lg-4 mb-3">
                   <a onclick="loadMultSelectOutrosDocumentos()" style="margin-bottom:30px" wire:click="addNewProfessionalIdentitys" class="btn btn-primary">
                      <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                         <line x1="12" y1="5" x2="12" y2="19"></line>
                         <line x1="5" y1="12" x2="19" y2="12"></line>
                      </svg>
                      Adicionar identidades profissionais
                   </a>
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
                                  <label class="form-label ">Inclusão do nome social</label>
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
                                  <label class="form-label ">Nome social</label>
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
                                        <label class="form-label ">Nº de RG de irmão gêmeo</label>
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
                                        <label class="form-label ">Nome de irmão gêmeo</label>
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
                                    <div class="col-lg-6">
                                       <div class="mb-3">
                                          <label class="form-label ">Nomes anteriores</label>
                                          <div class="input-group mb-1">
                                          <input wire:model="tmpPreviousName"  maxlength="70" type="text"
                                             class="form-control ps-0 "
                                             autocomplete="off" required>
                                           <div class="input-group-append">
                                               <a style="text-align: center" wire:click="addNamesPrevious"
                                                  class="btn btn-primary d-none d-sm-inline-block">
                                                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                  <div class="flex">

                                                  <svg style="text-align: center ml-2" xmlns="http://www.w3.org/2000/svg" class=""
                                                     width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                     <line x1="12" y1="5" x2="12" y2="19" />
                                                     <line x1="5" y1="12" x2="19" y2="12" />
                                                  </svg>
                                                  Adicionar
                                               </div>

                                               </a>
                                            </div>

                                         </div>
                                       </div>
                                    </div>

                                    <div class="col-lg-6">
                                       <div class="mb-3">
                                          <label class="form-label ">Filiações anteriores</label>
                                          <div class="input-group mb-1">
                                          <input wire:model="tmpPreviousFiliation"  maxlength="70" type="text"
                                             class="form-control ps-0 "
                                             autocomplete="off" required>
                                           <div class="input-group-append">
                                               <a style="text-align: center" wire:click="addFiliationsPrevious"
                                                  class="btn btn-primary d-none d-sm-inline-block">
                                                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                  <div class="flex">

                                                  <svg style="text-align: center ml-2" xmlns="http://www.w3.org/2000/svg" class=""
                                                     width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                     <line x1="12" y1="5" x2="12" y2="19" />
                                                     <line x1="5" y1="12" x2="19" y2="12" />
                                                  </svg>
                                                  Adicionar
                                               </div>

                                               </a>
                                            </div>

                                         </div>
                                       </div>
                                    </div>

                                    @php
                                        $names = !empty($fields['names_previous']) ? explode(",", $fields['names_previous']) : [];
                                        $filiacoes = !empty($fields['filitions_previous']) ? explode(",", $fields['filitions_previous']) : [];
                                    @endphp

                                    @if (!empty($names))
                                    <div class="p-2 rounded border-1 border-red-300">
                                      <h2 class="text-md font-bold">Nomes Anteriores</h2>
                                         <div class="card-body px-0 py-2">
                                            <div id="table-default" class="table-responsive">
                                               <table class="table">
                                                  <thead>
                                                     <tr>
                                                        <th>Nome</th>
                                                     </tr>
                                                  </thead>
                                                  <tbody class="table-tbody">
                                                     @foreach ($names as $name)
                                                     <tr>
                                                        <td class="sort-name">{{  $name }}</td>
                                                     </tr>
                                                     @endforeach
                                                  </tbody>
                                               </table>
                                            </div>
                                         </div>
                                    </div>
                                    @endif

                                    @if (!empty($filiacoes))
                                    <div class="p-2 rounded border-1 border-red-300">
                                      <h2 class="text-md font-bold">Filiações Anteriores</h2>
                                         <div class="card-body px-0 py-2">
                                            <div id="table-default" class="table-responsive">
                                               <table class="table">
                                                  <thead>
                                                     <tr>
                                                        <th>Nome</th>
                                                     </tr>
                                                  </thead>
                                                  <tbody class="table-tbody">
                                                     @foreach ($filiacoes as $filiacao)
                                                     <tr>
                                                        <td class="sort-name">{{  $filiacao }}</td>
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
                            </div>
                         </div>
                      </div>
                      @endif
                      @if($selectedTab == "caracteristicas")
                      <div  class=" mb-3">
                         <div wire:ignore class=" row">
                            <div id="gemeo" role="tabpanel">
                               <div class="row">
                                  @foreach($caracteristics as $ca)
                                  @if($ca->type == "Cútis")
                                  <div class="col-lg-3 mb-3">
                                     <label   label class="form-label ">Altura<span class="error_tag">*</span></label>
                                     <input  onchange="loadMultSelectCaracteristicas()" wire:model="fields.height" maxlength="70" type="text"
                                        class="form-control ps-0 "
                                        autocomplete="off" required>
                                  </div>
                                  @endif
                                  <div class="col-lg-3 mb-3">
                                     <label class="form-label ">{{$ca->type}}</label>
                                     @if($ca->multiple == true)
                                     <div class="input-group ">
                                        @php
                                        $id_feature = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))
                                        @endphp
                                        <select onchange="livewire.emit('updated_feature', [ '{{$id_feature}}', $('#{{$id_feature}}').val() , '{{$ca->type}}'])"  id="{{ strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))}}" wire:model.lazy="fieldsFeatures.{{ strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))}}"  id="{{ strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))}}" wire:model.lazy="fieldsFeatures.{{ strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))}}"  class="form-control multselect" multiple="multiple" id="select2">
                                           @foreach($ca->items as $item)
                                           <option  value="{{$item}}">{{$item}}</option>
                                           @endforeach
                                        </select>
                                     </div>
                                     @else
                                     <select onchange="loadMultSelectCaracteristicas()" id="{{ strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))}}" name="{{ strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))}}" wire:ignore   wire:model="fieldsFeatures.{{ strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $ca->type)))}}" class="form-control ps-0" name="select">
                                        <option value="0">Selecione</option>
                                        @foreach($ca->items as $item)
                                        <option  value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                     </select>
                                     @endif
                                  </div>
                                  @endforeach
                               </div>
                            </div>
                         </div>
                      </div>
                      @endif
                      @if($selectedTab == "documentos_digitalizados")
                      <div  class=" mb-3">
                         <div id="gemeo" role="tabpanel">
                            @foreach($fieldsDigitalizedDocuments as $key => $item)
                            <div class="row">
                               <div class="col-lg-5 mb-3">
                                  @if(isset($fieldsDigitalizedDocuments[$key]['file']) && $fieldsDigitalizedDocuments[$key]['file'] != '' )
                                  <input value="{{$this->getDocument($fieldsDigitalizedDocuments[$key]['type'])}}"   maxlength="70" type="text" class="form-control ps-0 " autocomplete="off" readonly>
                                  @else
                                  <select  wire:model="fieldsDigitalizedDocuments.{{$key}}.type" class="form-control ps-0" wire:ignore>
                                     <option value="0">Selecione</option>
                                     @unless(in_array("1",$jaUtilizados))
                                     <option value="1">CPF</option>
                                     @endif
                                     @unless(in_array("2",$jaUtilizados))
                                     <option value="2">PIS</option>
                                     @endif
                                     @unless(in_array("3",$jaUtilizados))
                                     <option value="3">PASEP</option>
                                     @endif
                                     @unless(in_array("4",$jaUtilizados))
                                     <option value="4">COMPROVANTE DE ENDEREÇO</option>
                                     @endif
                                     @unless(in_array("5",$jaUtilizados))
                                     <option value="5">Laudo Médico</option>
                                     @endif
                                     @unless(in_array("6",$jaUtilizados))
                                     <option value="6">TITULO ELEITOR</option>
                                     @endif
                                     @unless(in_array("7",$jaUtilizados))
                                     <option value="7">IDENTIFICAÇÃO PROFISSIONAL</option>
                                     @endif
                                     @unless(in_array("8",$jaUtilizados))
                                     <option value="8">CARTEIRA DE TRABALHO E PREVIDENCIA SOCIAL – CTPS</option>
                                     @endif
                                     @unless(in_array("9",$jaUtilizados))
                                     <option value="9">CARTEIRA NACIONAL DE HABILITAÇÃO – CNH</option>
                                     @endif
                                     @unless(in_array("10",$jaUtilizados))
                                     <option value="10">CERTIFICADO MILITAR</option>
                                     @endif
                                     @unless(in_array("11",$jaUtilizados))
                                     <option value="11">EXAME TIPO SANGUINEO/FATOR RH</option>
                                     @endif
                                     @unless(in_array("12",$jaUtilizados))
                                     <option value="12">COMPROVANTE DE VULNERABILIDADE OU A CONDIÇÃO PARTICULAR DE SAÚDE</option>
                                     @endif
                                     @unless(in_array("13",$jaUtilizados))
                                     <option value="13">CARTÃO DE BENEFICIO SOCIAL</option>
                                     @endif
                                     @unless(in_array("14",$jaUtilizados))
                                     <option value="14">ENCAMINHAMENTO SOCIAL</option>
                                     @endif
                                     @unless(in_array("15",$jaUtilizados))
                                     <option value="15">BOLETIM DE OCORRENCIA</option>
                                     @endif
                                     @if($fields['name_social'])
                                     <option value="16">DECLARAÇÃO DE NOME SOCIAL</option>
                                     @endif
                                     @if($currentMatiral=='casado')
                                     <option value="17">CERTIDÃO DE CASAMENTO</option>
                                     @endif
                                     @if($currentMatiral=='divorciado')
                                     <option value="18">CERTIDÃO DE CASAMENTO/DIVORCIADO</option>
                                     @endif
                                     @if($fields['type_of_certificate'] == 2)
                                     <option value="19">CERTIDÃO DE NASCIMENTO</option>
                                     @endif
                                     @if($fields['type_of_certificate'] == 6)
                                     <option value="20">Certidão de casamento/COM AVERBAÇÃO DE SEPARAÇÃO</option>
                                     @endif
                                     @if($fields['type_of_certificate'] == 7)
                                     <option value="21">Certidão de casamento/CASAMENTO COM AVERBAÇÃO DE ÓBITO</option>
                                     @endif
                                     @if($fields['migration_situation'] == 2 || $fields['migration_situation'] == 3)
                                     <option value="22">CERTIDÃO DE NASCIMENTO/CASAMENTO ESTRANGEIRA</option>
                                     @endif
                                     @unless(in_array("23",$jaUtilizados))
                                     <option value="23">PRONTUÁRIO CIVIL</option>
                                     @endif
                                     @unless(in_array("24",$jaUtilizados))
                                     <option value="24">INDIVIDUAL DATILOSCÓPICA</option>
                                     @endif
                                     @unless(in_array("25",$jaUtilizados))
                                     <option value="25">CERTIDÃO DE CASAMENTO</option>
                                     @endif
                                     @unless(in_array("26",$jaUtilizados))
                                     <option value="26">CERTIDÃO DE NASCIMENTO</option>
                                     @endif
                                     @unless(in_array("27",$jaUtilizados))
                                     <option value="27">DIÁRIO OFICIAL DA UNIÃO-DOU</option>
                                     @endif
                                     @unless(in_array("28",$jaUtilizados))
                                     <option value="28">CERTIDÃO DE OPÇÃO DE NACIONALIDADE</option>
                                     @endif
                                     @unless(in_array("29",$jaUtilizados))
                                     <option value="29">CARTEIRA DE IDENTIDADE DE ESTRAGEIRO</option>
                                     @endif
                                     @unless(in_array("30",$jaUtilizados))
                                     <option value="30">CARTEIRA DE AUTISTA</option>
                                     @endif
                                  </select>
                                  @endif
                               </div>
                               <div class="col-lg-5 mb-3">
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
                                  <input type="text" id="name_document"/>
                                  <a  wire:click="deleteDoc('{{$fieldsDigitalizedDocuments[$key]['file']}}')" download  class="removebtn btn btn-danger inline-flex">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-x " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 10l4 4m0 -4l-4 4"></path>
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                     </svg>
                                     Remover
                                    </a>
                                  </a>
                                  @else
                                  @if(isset($fieldsDigitalizedDocuments[$key]['type']) && $fieldsDigitalizedDocuments[$key]['type'])

                                  <input id="fileInput" onchange="changedFile(event, '{{$key}}')"  type="file"   wire:model="fieldsDigitalizedDocuments.{{$key}}.file">
                                  @else
                                  <input id="fileInput" onchange="changedFile(event, '{{$key}}')" type="file"   wire:model="fieldsDigitalizedDocuments.{{$key}}.file" disabled>
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
                              {{-- COMENTADO PQ TEORICAMENTE E PRA TRAZER APENAS TEXTO DO ACERVO ANTERIOR
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
                               </div> --}}
                               @endif
                               @if($fields['certificate'] == 1)
                               <div class="col-lg-3 mb-3">
                                 <label class="form-label">Matricula<span
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
                                 <label class="form-label ">Tipo De Certidão<span class="error_tag">*</span></label>
                                 <div  class="input-group input-group-flat">
                                    <select wire:model="fields.type_of_certificate_new" class="form-control ps-0">
                                       <option value="0">Selecione</option>
                                       <option value="1">Nascimento</option>
                                       <option value="7">Nascimento no Exterionr</option>
                                       <option value="2">Casamento</option>
                                    </select>
                                 </div>
                              </div>

                               <div class="col-lg-3 mb-3">
                                  <label class="form-label">Tipo de Casamento<span
                                     class="error_tag">*</span></label>
                                  <div  class="input-group input-group-flat">
                                     <select name="same_sex_marriage" wire:model="fields.same_sex_marriage" class="form-control ps-0" wire:ignore>
                                        <option value="0">Selecione</option>
                                        <option value="1">Tradicional</option>
                                        <option value="2">Homoafetivo</option>
                                     </select>
                                  </div>
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
                      @if (isset($registrySelected))
                        <div class="row">
                           <div class="col-lg-6 font-bold">
                               <span class="text-sky-600">Cartório:</span>  {{ $registrySelected->name }}
                           </div>
                           <div class="col-lg-3 font-bold">
                              <span class="text-sky-600">UF:</span>  {{ $registrySelected->uf->name }}
                          </div>
                          <div class="col-lg-3 font-bold">
                           <span class="text-sky-600">Municipio:</span>  {{ $registrySelected->county->name }}
                       </div>
                        </div>
                      @endif
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

    var socket = io('https://websocket-pca-sic.msbtec.com.br');

    let imgSelectedCapture = ''


    setInterval(() => {
      const inputs = document.querySelectorAll('input, select, textarea');
      const dataProcessInfo = document.querySelector('[data-status-process]');
      if (dataProcessInfo) {

         if(dataProcessInfo.dataset.statusProcess == 'blocked'){
            for (let i = 0; i < inputs.length; i++) {
               inputs[i].disabled = true;
            }
            const removeBtns = document.querySelectorAll('.removebtn');
            for (let i = 0; i < removeBtns.length; i++) {
                removeBtns[i].style.display = 'none';
            }
         }
      }
    }, 10);





    document.addEventListener('turbolinks:load', () => {




        var socket = io('https://websocket-pca-sic.msbtec.com.br');
        criarRoom()

        socket.on('receiveMessage', function (data) {
            if (data.eventType == "teste"){
               alert("teste recebido")
               alert(JSON.stringify(data))
            }
        });

        let path = window.location.pathname;
        if (!path.includes("edit")) {
            var today = new Date();
            $('#modal-search').modal('show');
            $('#date').val(today.toISOString().substring(0, 10));
        }

        loadMultSelectCaracteristicas()

        $(function() {
            $.contextMenu({
                selector: '.context-menu-one',
                callback: function(key, options) {
                    if(key == 'UNABLE'){
                        options.$trigger[0].style.backgroundColor = '#206bc4';
                        options.$trigger[0].insertAdjacentHTML("beforeend",
                        ` <div  style="text-align:center;  display: flex;color:white;
                        justify-content: center;"><svg style="text-align:center;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="3" y1="3" x2="21" y2="21"></line>
                        <path d="M8 13.5v-5.5m.44 -3.562a1.5 1.5 0 0 1 2.56 1.062v1.5m0 4.008v.992m0 -6.5v-2a1.5 1.5 0 1 1 3 0v6.5m0 -4.5a1.5 1.5 0 0 1 3 0v6.5m0 -4.5a1.5 1.5 0 0 1 3 0v8.5a6 6 0 0 1 -6 6h-2c-2.114 -.292 -3.956 -1.397 -5 -3l-2.7 -5.25a1.7 1.7 0 0 1 2.75 -2l.9 1.75"></path>
                        </svg>
                        <label style="color:white">Impossibilidado</label>
                        </div>`);
                    }
                },
                items: {
                    "file": {name: "Anexar", icon: ""},
                    "UNABLE": {name: "Impossibilidado", icon: ""},
                }
            });


        });
    })

    function setUnableDigital(){


    }

    function changedFile(event, key) {
        const file = event.target.files[0];
        const fileName = file.name;
        console.log( event.target.files[0])

        Livewire.emit('addedDocument', []);
        Livewire.emit('setNameDocument', [fileName, key]);
    }



    function loadMultSelectCaracteristicas(){
        setTimeout(() => {
            $('.multselect').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                createTag: function (params) {
                    var term = $.trim(params.term);
                    return null;
                }});
        }, 200);
        let i = setInterval(() => {
            if( $('.multselect').length > 0 && $('.select2-hidden-accessible').length == 0 ) {
                $('.multselect').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                createTag: function (params) {
                    var term = $.trim(params.term);
                    return null;
                }});
            }else{

            }

        }, 1);
    }

    function callColectorSignature(){
        socket.emit("sendMessage", {
            clientapp: "server",
            room: "{{Auth::user()->cpf}}",
            eventType: "captura-",
            data: "{'teste': 'dwwdwdw'}"
        })
    }

    function saveSignature(){

    }

    function triggerFileSign(){
        document.getElementById("fileSign").click();
    }

    let justificativa;

    function saveJus(){
        justificativa = document.getElementById('justificativa-text-input').value
       Livewire.emit('justificativaEvent', justificativa)
    }


    function onFileSelectedSign(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById("image-sign");
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }

    function criarRoom(){
        socket.emit("create-room", {
            room: "{{Auth::user()->cpf}}"
        })
    }

    function showLoadingPhoto(){
      let timerInterval
      Swal.fire({
         title: 'Carregando imagem',
         html: '',
         timer: 6000,
         timerProgressBar: true,
         allowOutsideClick: false,

         didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft()
          }, 100)
         },
         willClose: () => {
            clearInterval(timerInterval)
         }
         }).then((result) => {
         /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
          }
      })
     }

     window.addEventListener('redirect',({detail:{url, delay}})=>{
        setTimeout(() => {
            Turbolinks.visit(url)
        }, delay);
    })



    function loadMultSelectOutrosDocumentos(){
        setTimeout(() => {
            $('.multselectx').select2({
                tokenSeparators: [',', ' '],
                createTag: function (params) {
                    var term = $.trim(params.term);
                    return null;
                }});
        }, 200);
        let i = setInterval(() => {
            if( $('.multselectx').length > 0 && $('.select2-hidden-accessible').length == 0 ) {
                $('.multselectx').select2({
                tokenSeparators: [',', ' '],
                createTag: function (params) {
                    var term = $.trim(params.term);
                    return null;
                }});
            }else{

            }

        }, 1);
    }



    window.addEventListener('closeModalSearch', ({detail: {user}}) => {
        $('#modal-search').modal('hide');
    })

    window.addEventListener('openModalProntuarioPrint', ({detail: {id}}) => {
        var left = (screen.width/2)-(500/2);
        var top = (screen.height/2)-(500/2);
        window.open('/generate-prontuario/'+id, 'title', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=+w'+', height='+'h, top='+top+', left='+left);

    })

    window.addEventListener('closeModalSign', ({detail: {user}}) => {
        $('#modal-captura-assinatura').modal('hide');
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
            //Livewire.emit('setFaceCapture', imgSelectedCapture)

        }else{

            let canvas = document.querySelector("#canvas");
            const base64Canvas = canvas.toDataURL("image/jpeg").split(';base64,')[1];
            $("#file-capture-image_string").val(base64Canvas);

            Livewire.emit('setFaceCapture', base64Canvas)

            Livewire.emit('setImagePreview', canvas.toDataURL("image/jpeg"))

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

        document.getElementById("file-capture-image").addEventListener("change",async ({target}) => {
         showLoadingPhoto()
         isImageSelected = true
            tipeCaputure = 1
            if (target.files && target.files.length) {
                const imagePreviewBase64 = await convertFileToBase64(target.files[0]);
                @this.setImagePreview(imagePreviewBase64);
                isImageSelected = true
                imgSelectedCapture = imagePreviewBase64
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
