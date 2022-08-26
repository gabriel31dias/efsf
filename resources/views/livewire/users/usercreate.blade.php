

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
                  Usuários
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
               <div class="btn-list">
                  <span class="d-none d-sm-inline">
                  <a href="#" class="btn btn-white">
                  Filtrar
                  </a>
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
                  <div class="col-lg-6">
                     <div class="mb-3">
                        <label class="form-label">Nome Completo</label>
                        <div class="input-group input-group-flat">
                           <input  wire:model="name" type="text" class="form-control ps-0"  autocomplete="off">
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="mb-3">
                        <label class="form-label">Cpf</label>
                        <div class="input-group input-group-flat">
                           <input  wire:model="cpf" type="text" class="form-control ps-0"  autocomplete="off">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-6">
                  <div class="mb-3">
                     <label class="form-label">Cep</label>
                     <div class="input-group input-group-flat">
                        <input  wire:model="cep" type="text" class="form-control ps-0"  autocomplete="off">
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="mb-3">
                     <label class="form-label">Tipo de Logradouro</label>
                        <livewire:users.typestreetsselect />
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="mb-3">
                  <label class="form-label">Endereço</label>
                  <div class="input-group input-group-flat">
                     <input wire:model="endereco" type="text" class="form-control ps-0" autocomplete="off">
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Nº</label>
                  <div class="input-group input-group-flat">
                     <input  wire:model="number" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="mb-3">
                  <label class="form-label">Complemento</label>
                  <div class="input-group input-group-flat">
                     <input  wire:model="complement" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Bairro</label>
                  <div class="input-group input-group-flat">
                     <input  wire:model="district" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="mb-3">
                  <label class="form-label">UF</label>
                  <div class="input-group input-group-flat">
                     <input  wire:model="uf" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Celular</label>
                  <div class="input-group input-group-flat">
                     <input   wire:model="celular" type="text" class="form-control ps-0" autocomplete="off">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="mb-3">
                  <label class="form-label">Email</label>
                  <div class="input-group input-group-flat">
                     <input   wire:model="email" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Confirmação de email</label>
                  <div class="input-group input-group-flat">
                     <input  wire:model="email_confirm" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="mb-3">
                  <label class="form-label">Login</label>
                  <div class="input-group input-group-flat">
                     <input  wire:model="login" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Senha</label>
                  <div class="input-group input-group-flat">
                     <input   wire:model="password" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="mb-3">
                  <label class="form-label">Perfil de Acesso</label>
                    <livewire:users.profileselect />
               </div>
            </div>
            <div class="col-lg-4">
               <div class="mb-3">
                  <label class="form-label">Posto de Atendimento</label>
                  <div class="input-group input-group-flat">
                     <input   wire:model="query" type="text" class="form-control ps-0"  autocomplete="off">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
