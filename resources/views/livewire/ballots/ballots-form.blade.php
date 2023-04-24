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
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">

                    @unless($ballots)
                        @if($selectedTab == '' || $selectedTab == 'cadastro-lote')
                        <a wire:click="saveLot" class="btn btn-primary items-center inline-flex">
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

                        @if($selectedTab == 'cadastro-avulso')
                        <a wire:click="saveAvulso" class="btn btn-primary items-center inline-flex">
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


                        <ul class="nav nav-tabs" data-bs-toggle="tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a wire:click="setSelectedTab('cadastro-lote')"
                                class="nav-link @if($selectedTab == "" || $selectedTab == "cadastro-lote") active @else   @endif"
                                    data-bs-toggle="tab" aria-selected="true" role="tab">Cadastramento em lote</a>
                            </li>
                            <li role="presentation">
                                <a wire:click="setSelectedTab('cadastro-avulso')"
                                class="nav-link @if( $selectedTab == "cadastro-avulso") active @else   @endif"
                                    data-bs-toggle="tab" aria-selected="false" role="tab"
                                    tabindex="-1">Cadastramento avulso</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a wire:click="setSelectedTab('remanejamento')" data-bs-toggle="tab"
                                    aria-selected="false" class="nav-link    " role="tab"
                                    tabindex="-1">Remanejamento</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a wire:click="setSelectedTab('pesquisa')" data-bs-toggle="tab" aria-selected="false"
                                    class="nav-link    " role="tab" tabindex="-1">Pesquisa</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a wire:click="setSelectedTab('totalizacao')" data-bs-toggle="tab" aria-selected="false"
                                    class="nav-link    " role="tab" tabindex="-1">Totalização</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a wire:click="setSelectedTab('inutilizacao');"
                                    onclick="loadMultSelectCaracteristicas()" data-bs-toggle="tab" aria-selected="false"
                                    class="nav-link    " role="tab" tabindex="-1">Inutilização</a>
                            </li>
                        </ul>

                        @if ($selectedTab == '' || $selectedTab == 'cadastro-lote')
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

                                            @if($arrErros)
                                            <div class="card">
                                                <div class="card-body">
                                                   <div id="table-default" class="table-responsive">
                                                    <label style="margin-bottom: 1%">Erros encontrados ao cadastrar cédulas</label>
                                                      <table class="table">
                                                         <thead>
                                                            <tr>
                                                               <th><button class="table-sort" >Cédula</button></th>
                                                               <th><button class="table-sort" >Motivo do erro</button></th>
                                                            </tr>
                                                         </thead>
                                                         <tbody class="table-tbody">
                                                            @foreach ($arrErros as $item)
                                                               <tr >
                                                                <td  >{{ $item['code'] }}</td>
                                                                <td  ><p style="color: red">{{$item['type']}}</p></td>
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
                                                        <livewire:users.servicestation-select  :defaultValue="$service_station" />
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
                                                    <input wire:model="fields.stringBallots" maxlength="70" type="text"
                                                        class="form-control" autocomplete="off" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @if($arrErros)
                                <div class="card">
                                    <div class="card-body">
                                       <div id="table-default" class="table-responsive">
                                        <label style="margin-bottom: 1%">Erros encontrados ao cadastrar cédulas</label>
                                          <table class="table">
                                             <thead>
                                                <tr>
                                                   <th><button class="table-sort" >Cédula</button></th>
                                                   <th><button class="table-sort" >Motivo do erro</button></th>
                                                </tr>
                                             </thead>
                                             <tbody class="table-tbody">
                                                @foreach ($arrErros as $item)
                                                   <tr >
                                                    <td  >{{ $item['code'] }}</td>
                                                    <td  ><p style="color: red">{{$item['type']}}</p></td>
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
</script>

</div>
