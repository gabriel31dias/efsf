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
