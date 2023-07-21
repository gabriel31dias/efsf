

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
                  GÊNEROS
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
               <div class="btn-list">
                  <span class="d-none d-sm-inline">

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
   <div class="card">
      <div class="card-body">
         <div class="modal-content">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="mb-3">
                        <label class="form-label">Nome gênero<span class="error_tag">*</span></label>
                        <div class="input-group input-group-flat">
                           <input wire:model="fields.name" maxlength="70" type="text" class="form-control ps-0"  autocomplete="off" required>
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
</form>
</div>
