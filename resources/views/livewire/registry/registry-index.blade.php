<div class="page-wrapper">
    <div class="container-fluid">
       <!-- Page title -->
       <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
             <div class="col">
                <h2 class="page-title">
                   Cartórios
                </h2>
             </div>
          </div>
       </div>
    </div>
    <div class="col-12 col-md-auto ms-auto d-print-none">
       <div class="btn-list">
          <a wire:click="addRegistry" class="btn btn-primary items-center inline-flex" data-bs-toggle="modal"
             data-bs-target="#modal-report">
             <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
             <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
             </svg>
             Cadastrar Cartório
          </a>
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
                            <th><button class="table-sort" >Código SIC</button></th>
                            <th><button class="table-sort" >CNS</button></th>
                            <th><button class="table-sort" >Nome</button></th>
                            <th><button class="table-sort" >Nome Fantasia</button></th>
                            <th><button class="table-sort" >UF</button></th>
                            <th><button class="table-sort" >Município</button></th>
                         </tr>
                      </thead>
                      <tbody class="table-tbody">
                         @foreach ($registries as $registry)
                         <tr wire:click="clickUpdate({{$registry['id']}})">
                            <td class="">{{$registry['sic_code']}}</td>
                            <td class="">{{$registry['cns']}}</td>
                            <td class="">{{$registry['name']}}</td>
                            <td class="">{{$registry['fantasy_name']}}</td>
                            <td class="">{{$registry['uf_id']}}</td>
                            <td class="">{{$registry['county_id']}}</td>
                         </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
                {{ $registries->links() }}
             </div>
          </div>
       </div>
    </div>