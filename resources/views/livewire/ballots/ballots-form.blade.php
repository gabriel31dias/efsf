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
                        Cedulas
                    </h2>
                </div>
                <style>
                    table tr:nth-child(2):hover {
                        background-color: #eee;
                        color: #333;
                    }
                </style>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">


                        @unless ($ballots)
                            @if ($selectedTab == '' || $selectedTab == 'cadastro-lote')
                                <a wire:click="saveLot()" class="btn btn-primary items-center inline-flex">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" input-group-append
                                        class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Salvar
                                </a>
                            @endif

                            @if ($selectedTab == 'cadastro-avulso')
                                <a wire:click="saveAvulso()" class="btn btn-primary items-center inline-flex">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" input-group-append
                                        class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Salvar
                                </a>
                            @endif

                            @if ($selectedTab == 'inutilizacao')
                                <a wire:click="saveUseless()" class="btn btn-primary items-center inline-flex">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" input-group-append
                                        class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Salvar
                                </a>
                            @endif


                        @endunless

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if ($selectedTab == '' || $selectedTab == 'cadastro-lote')
                            <div id="dados-basicos" role="tabpanel">
                                <div class="page-body">
                                    <div class="container-fluid">

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Posto de atendimento :<span
                                                            class="error_tag"> *</span></label>
                                                    <div class="input-group input-group-flat">
                                                        <livewire:users.servicestation-select :defaultValue="$service_station" />


                                                    </div>
                                                    @error('fields.name')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <label class="form-label">Código Inicial<span class="error_tag">
                                                        *</span></label>
                                                <div class="input-group input-group-flat">
                                                    <input wire:model="fields.initial" maxlength="70" type="text"
                                                        class="form-control" autocomplete="off" />
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <label class="form-label">Código Final<span class="error_tag">
                                                        *</span></label>
                                                <div class="input-group input-group-flat">
                                                    <input wire:model="fields.final" maxlength="70" type="text"
                                                        class="form-control" autocomplete="off" />
                                                </div>
                                            </div>

                                            @if ($situationCedules)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="table-default" class="table-responsive">
                                                            <label style="margin-bottom: 1%">Situações
                                                                cédulas</label>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th><button class="table-sort">Cédula</button>
                                                                        </th>
                                                                        <th><button
                                                                                class="table-sort">Situação</button>
                                                                        </th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody class="table-tbody">
                                                                    @foreach ($situationCedules as $item)
                                                                        <tr>
                                                                            <td>{{ $item->cod_ballot }}</td>
                                                                            <td>
                                                                                <p>
                                                                                    {{ $item->situation }}</p>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($arrErros)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="table-default" class="table-responsive">
                                                            <label style="margin-bottom: 1%">Erros encontrados ao
                                                                cadastrar cédulas</label>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th><button class="table-sort">Cédula</button>
                                                                        </th>
                                                                        <th><button class="table-sort">Motivo do
                                                                                erro</button></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-tbody">
                                                                    @foreach ($arrErros as $item)
                                                                        <tr>
                                                                            <td>{{ $item['code'] }}</td>
                                                                            <td>
                                                                                <p style="color: red">
                                                                                    {{ $item['type'] }}</p>
                                                                            </td>
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
                        @endif


                        @if ($selectedTab == 'remanejamento')
                            <div id="dados-basicos" role="tabpanel">
                                <div class="page-body">
                                    <div class="container-fluid">

                                        <div class="row">


                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Posto de Origem:<span class="error_tag">
                                                            *</span></label>
                                                    <div class="input-group input-group-flat">
                                                        <livewire:users.servicestation-select :customEvent="'selectOrigem'" />
                                                    </div>

                                                    @if ($origemArr)
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div id="table-origim" class="table-responsive">
                                                                    <label style="margin-bottom: 1%">Cédulas do posto
                                                                        de origem</label>
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><button
                                                                                        class="table-sort">Cédula</button>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="table-tbody">
                                                                            @foreach ($origemArr as $k => $item)
                                                                                <tr wire:ignore
                                                                                    id="{{ $item->id }}"
                                                                                    onclick="selectRow('{{ $item->id }}')">
                                                                                    <td>{{ $item->cod_ballot }}</td>
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

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <div class="input-group input-group-flat">
                                                        @if ($destinoServiceStation)
                                                            <a style="margin: 30%" wire:click="Rearrange"
                                                                class="btn btn-primary items-center inline-flex">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                                <svg class="hidden lg:block"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    input-group-append="" width="24"
                                                                    height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor"
                                                                    fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <line x1="12" y1="5"
                                                                        x2="12" y2="19"></line>
                                                                    <line x1="5" y1="12"
                                                                        x2="19" y2="12"></line>
                                                                </svg>
                                                                Remanejar
                                                            </a>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">

                                                    <label class="form-label">Posto de Destino:<span
                                                            class="error_tag"> *</span></label>
                                                    <div class="input-group input-group-flat">
                                                        <livewire:users.servicestation-select :customEvent="'selectDestino'" />
                                                    </div>


                                                    @if ($destinoArr)
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div id="table-default" class="table-responsive">
                                                                    <label style="margin-bottom: 1%">Cédulas do posto
                                                                        de destino</label>
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th><button
                                                                                        class="table-sort">Cédula</button>
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="table-tbody">
                                                                            @foreach ($destinoArr as $item)
                                                                                <tr>
                                                                                    <td>{{ $item->cod_ballot }}</td>

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
                            </div>
                        @endif


                        @if ($selectedTab == 'inutilizacao')
                            <div id="dados-basicos" role="tabpanel">
                                <div class="page-body">
                                    <div class="container-fluid">

                                        <div class="row">



                                            <div class="col-lg-12">
                                                <label class="form-label">Cédulas para inutilizar:<span
                                                        class="error_tag">
                                                        *</span></label>
                                                <div class="input-group input-group-flat">
                                                    <input wire:model="fields.stringBallots" maxlength="70"
                                                        type="text" class="form-control" autocomplete="off" />
                                                </div>
                                                <p>Pode ser informado mais de cédula utilizando virgulas</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @if ($situationCedules)
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="table-default" class="table-responsive">
                                                <label style="margin-bottom: 1%">Situações
                                                    cédulas</label>
                                                <table class="table">
                                                    <thead>

                                                        <tr>
                                                            <th><button class="table-sort">Cédula</button></th>
                                                            <th><button class="table-sort">Situação</button></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-tbody">
                                                        @foreach ($situationCedules as $item)
                                                            <tr>
                                                                <td>{{ $item->cod_ballot }}</td>
                                                                <td>
                                                                    <p style="color: red">{{ $item->situation }}</p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($arrErros)
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="table-default" class="table-responsive">
                                                <label style="margin-bottom: 1%">Erros encontrados ao cadastrar
                                                    cédulas</label>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th><button class="table-sort">Cédula</button></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-tbody">
                                                        @foreach ($arrErros as $item)
                                                            <tr>
                                                                <td>{{ $item['code'] }}</td>
                                                                <td>
                                                                    <p style="color: gren">{{ $item['type'] }}</p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif


                        @if ($selectedTab == 'cadastro-avulso')
                            <div id="dados-basicos" role="tabpanel">
                                <div class="page-body">
                                    <div class="container-fluid">

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Posto de atendimento:<span
                                                            class="error_tag"> *</span></label>
                                                    <div class="input-group input-group-flat">
                                                        <livewire:users.servicestation-select :defaultValue="$service_station" />
                                                    </div>
                                                    @error('fields.name')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <label class="form-label">Cédulas avulsas:<span class="error_tag">
                                                        *</span></label>
                                                <div class="input-group input-group-flat">
                                                    <input wire:model="fields.stringBallots" maxlength="70"
                                                        type="text" class="form-control" autocomplete="off" />
                                                </div>
                                                Pode ser informado mais de cédula utilizando virgulas
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @if ($situationCedules)
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="table-default" class="table-responsive">
                                                <label style="margin-bottom: 1%">Situações
                                                    cédulas</label>
                                                <table class="table">
                                                    <thead>

                                                        <tr>
                                                            <th><button class="table-sort">Cédula</button></th>
                                                            <th><button class="table-sort">Situação</button></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-tbody">
                                                        @foreach ($situationCedules as $item)
                                                            <tr>
                                                                <td>{{ $item->cod_ballot }}</td>
                                                                <td>
                                                                    <p style="color: gren">{{ $item->situation }}</p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($arrErros)
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="table-default" class="table-responsive">
                                                <label style="margin-bottom: 1%">Erros encontrados ao cadastrar
                                                    cédulas</label>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th><button class="table-sort">Cédula</button></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-tbody">
                                                        @foreach ($arrErros as $item)
                                                            <tr>
                                                                <td>{{ $item['code'] }}</td>
                                                                <td>
                                                                    <p style="color: red">{{ $item['type'] }}</p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('selectedTab', ({
        detail: {
            tab
        }
    }) => {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    })

    function selectRow(rowId) {
        var tableRows = document.getElementsByTagName('tr');
        for (var i = 0; i < tableRows.length; i++) {
            if (tableRows[i].id === rowId) {
                tableRows[i].style.backgroundColor = '#206bc4';

                Livewire.emit('setSelectedItemToRearrange', rowId);
            }
        }


    }
</script>

</div>
