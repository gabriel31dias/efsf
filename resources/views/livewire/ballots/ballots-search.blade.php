<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Pesquisa de cédulas
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-auto ms-auto d-print-none">
        <div class="btn-list">

            @can('permission', 'director-signature.create')
              
                <a onclick="obterSelecionados()" class="text-decoration-none hover:cursor-pointer text-red-700 border-2 border-red-700 hover:bg-red-700
                                    hover:text-white focus:ring-4 font-medium rounded-lg
                                      text-sm p-2.5 text-center inline-flex items-center mr-2" 
                >
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->

                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M18 6l-12 12"></path>
   <path d="M6 6l12 12"></path>
</svg>
                   Inutilizar cédulas
                </a>
            </div>
           @endcan
    </div>
    <div class="page-body">
        <div class="container_fluid">

            <div class="container-fluid" class="input-icon">
                <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                    <svg wire:click="goUnit()" xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <line x1="21" y1="21" x2="15" y2="15"></line>
                    </svg>
                </span>
                <div class="row">
                    <div class="col-lg-6 mb-3">

                        <label class="form-label">Posto de atendimento<span class="error_tag">*</span></label>
                        <livewire:users.servicestation-select />


                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">Pesquisar<span class="error_tag">*</span></label>
                        <input wire:model="filters.searchString" type="text" value="" class="form-control"
                            placeholder="Pesquisar.." aria-label="Search in website">
                    </div>


                    <div class="col-lg-3 mb-3">
                        <label class="form-label">Status</label>
                        <select wire:model="filters.status" class="form-control ps-0" name="select">
                            <option value="A"> A</option>
                            <option value="D"> D</option>
                            <option value="U"> U</option>
                        </select>
                    </div>

                    <div class="col-lg-3 mb-3">

                        <label class="form-label">Intervalo<span class="error_tag">*</span></label>

                        <input wire:model="filters.initInteval" type="text" value="" class="form-control"
                            placeholder="Inicio..." aria-label="Search in website">


                    </div>

                    <div style="margin-top: 40px;" class="col-lg-1 mb-3">
                    
                        <label class="form-label">Até<span class="error_tag">*</span></label>
                    </div>

                    <div class="col-lg-3 mb-3">
                        <label class="form-label">Fim<span class="error_tag"></span></label>
                        
                        <input wire:model="filters.endInterval" type="text" value="" class="form-control"
                            placeholder="Fim..." aria-label="Search in website">
                    </div>
                </div>

                <div class="col-lg-3 mb-3">
                    <label class="form-label">Tipo de cédula</label>
                    <select class="form-control ps-0" wire:model="filters.typeBallotCedule" name="select">
                        <option value="A">Face A</option>
                        <option value="B">Face B</option>
                    </select>
                </div>

            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th><button class="table-sort"></button></th>
                                    <th><button class="table-sort">Nome servidor</button></th>
                                    <th><button class="table-sort">Cédula</button></th>
                                    <th><button class="table-sort">Face</button></th>
                                    <th><button class="table-sort">Posto de atendimento</button></th>
                                    <th><button class="table-sort">Status</button></th>
                                    <th><button class="table-sort">Data criação</button></th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">


                                @foreach ($items as $item)
                                    <tr>
                                        <td><input type="checkbox" value="{{ $item->id }}"> </td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            {{ $item->cod_ballot }}
                                        </td>
                                        <td>
                                            {{ $item->face }}
                                        </td>
                                        <td>{{ $item->serviceStation->service_station_name }}</td>
                                        <td>{{ $item->situation }}</td>
                                        <td>{{ $item->created_at }}</td>

                                        <td> <button

                                                wire:click="emitQuestionDestroy('{{ $item->id ?? null }}', '{{ $fields['id'] ?? null }}' )"
                                                x-on:click="modal=true"
                                                class="text-decoration-none hover:cursor-pointer text-red-700 border-2 border-red-700 hover:bg-red-700
                                    hover:text-white focus:ring-4 font-medium rounded-lg
                                      text-sm p-2.5 text-center inline-flex items-center mr-2 ">
                                                <i class="ti ti-trash"></i>
                                            </button>

                                      </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $items->links() }}
                </div>
            </div>

        </div>
        <script>

          function obterSelecionados() {
            var checkboxes = document.querySelectorAll('table input[type="checkbox"]');
            var selecionados = [];
            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    selecionados.push(checkbox.value);
                    Livewire.emit('emitQuestionInutilizeBallot', checkbox.value)
                }
            });

            return selecionados;
          }


          window.addEventListener('InutilizeBallot', ({detail: {id}}) => {
              confirmInutilize(id)
           })

            function confirmInutilize(id) {
                Swal.fire({
                    title: 'Tem certeza que seja inutilizar ?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    denyButtonText: `Não`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                       Livewire.emit('setUnitilized', id)
                    } else if (result.isDenied) {
                        
                    }
                })
            }


          window.addEventListener('destroyBallot', ({detail: {id}}) => {
              confirmDelete(id)
           })

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Tem certeza que seja excluir ?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Sim',
                    denyButtonText: `Não`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                       Livewire.emit('destroyBallotConfirme', id)
                    } else if (result.isDenied) {
                        
                    }
                })
            }
        </script>
    </div>
