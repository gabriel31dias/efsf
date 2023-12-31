<div class="page-wrapper">
   <div class="container-fluid">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row g-2 align-items-center">
            <div class="col">
               <h2 class="page-title">
                  SUSPENÇÃO DE CERTIDÃO
               </h2>
            </div>
         </div>
      </div>
   </div>
   <div class="col-12 col-md-auto ms-auto d-print-none">
      <div class="btn-list">
         @can('permission', 'suspension.create')
         <a wire:click="addSuspension" class="btn btn-primary items-center inline-flex" data-bs-toggle="modal"
            data-bs-target="#modal-report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
               stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <line x1="12" y1="5" x2="12" y2="19"></line>
               <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Cadastrar suspensão

         </a>
         @endcan
      </div>
   </div>
   <div class="page-body">
      <div class="container_fluid">
         <div class="container-fluid" class="input-icon">
            <span class="input-icon-addon">
               <!-- Download SVG icon from http://tabler-icons.io/i/search -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <circle cx="10" cy="10" r="7"></circle>
                  <line x1="21" y1="21" x2="15" y2="15"></line>
               </svg>
            </span>
            <input wire:model="searchTerm" type="text" value="" class="form-control" placeholder="Pesquisar.."
               aria-label="Search in website">
         </div>
         <br>
         <div class="card">
            <div class="card-body">
               <div id="table-default" class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th><button class="table-sort" >Nome do cartório</button></th>
                           <th><button class="table-sort" >UF</button></th>
                           <th><button class="table-sort" >Município</button></th>
                           <th><button class="table-sort" >Data início</button></th>
                           <th><button class="table-sort" >Data fim</button></th>
                        </tr>
                     </thead>
                     <tbody class="table-tbody">
                        @foreach ($suspensions as $suspension)
                        <tr @can('permission', 'suspension.edit') wire:click="clickUpdate({{$suspension->id}}) @endcan">
                           <td class="">{{$suspension->registry->name}}</td>
                           <td class="">{{$suspension->registry->uf->name}}</td>
                           <td class="">{{$suspension->registry->county->name}}</td>
                           <td class="">{{$suspension->start_date->format('d/m/Y')}}</td>
                           <td class="">{{$suspension->end_date->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               {{ $suspensions->links() }}
            </div>
         </div>
      </div>
   </div>