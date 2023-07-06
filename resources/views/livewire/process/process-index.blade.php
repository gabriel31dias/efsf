<div class="page-wrapper">
    <div class="container-fluid">
       <!-- Page title -->
       <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
             <div class="col">
                <h2 class="page-title">
                    Processos
                </h2>
             </div>
          </div>
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
                            <th><button class="table-sort" >Processo</button></th>
                            <th><button class="table-sort" >Nome do cidadão</button></th>
                            <th><button class="table-sort" >Posto de atendimento</button></th>
                            <th><button class="table-sort" >Data</button></th>
                            <th><button class="table-sort" >Biometria</button></th>
                            <th><button class="table-sort" >Situação</button></th>
                            <th><button class="table-sort" >Pagamento</button></th>
                         </tr>
                      </thead>

                      <tbody class="table-tbody">

                         @foreach ($process as $pr)
                            <tr wire:click="clickUpdate({{$pr->id}})">
                                <td>{{ $pr->process }}</td>
                                <td>{{ $pr->citizen->name }}</td>
                                <td>{{
                                    $pr->serviceStation->service_station_name
                                 }}</td>
                                <td>{{ $pr->created_at }}</td>
                                <td>{{ $pr->getBiometriStatus() }}</td> 
                                <td>{{ $pr->getSituation() }}</td>
                                <td>{{ $pr->getPaymentStatus() }}</td>
                            </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
                {{ $process->links() }}
             </div>
          </div>
       </div>
    </div>
