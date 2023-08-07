<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        IMPRIMIR RG
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-auto ms-auto d-print-none">
        @can('permission', 'print.create')
            <div class="btn-list">
                <a href="#" wire:click.prevent="print" target="_blank" class="btn btn-primary bg-blue-500 items-center inline-flex font-bold" >
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <i class="ti  ti-printer mr-2"></i>
                    Imprimir todos
                </a>
                <a href="#" wire:click.prevent="print" target="_blank" class="btn btn-primary items-center inline-flex font-bold" >
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <i class="ti  ti-printer mr-2"></i>
                    Imprimir selecionados
                </a>
            </div>
        @endcan
    </div>
    <div class="page-body">
        <div class="container_fluid">
            {{-- START FILTER --}}
            <div class="bg-white p-3 rounded-md shadow-md">
                <h1 class="mb-3 text-lg font-bold">Filtrar</h1>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Data inicial</label>
                            <div class="input-group input-group-flat">
                                <input wire:model="filter.startDate" type="date" class="form-control"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Data Final</label>
                            <div class="input-group input-group-flat">
                                <input wire:model="filter.endDate" type="date" class="form-control"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Posto de atendimento</label>
                            <livewire:users.servicestation-select />

                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mb-3">Pesqusiar</button>
            </div>

            {{-- END FILTER --}}
            <br>
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><button class="table-sort">Processo</button></th>
                                    <th><button class="table-sort">Nome</button></th>
                                    <th><button class="table-sort">CPF/RG</button></th>
                                    <th><button class="table-sort">Posto de atendimento</button></th>
                                    <th><button class="table-sort">Unidade</button></th>
                                    <th><button class="table-sort">nº de cédula</button></th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @foreach ($items as $item)
                                    <tr wire:click='select({{ $item->id }})'>
                                        <td><input  wire:model="selected.{{ $item->id }}" type="checkbox" class="border-gray-300 rounded h-3 w-3" /></td>
                                        <td>{{ $item->process }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->citizen->cpf }}/{{ $item->citizen->rg }}</td>
                                        <td>{{ $item->serviceStation->service_station_name }}</td>
                                        <td> - </td>
                                        <td> - </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>

</div>