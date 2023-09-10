<div class="page-wrapper">
    <div class="container-fluid">
        <style>
            {
                margin: 0 !important;
                padding: 0 !important;
                box-sizing: border-box !important;

                svg {
                    all: unset;
                }
            }

            body {
                background-color: #eee !important;
            }

            svg {
                display: inline-block;
            }

            .box-view-nome h3 {
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 700 !important;
                font-size: 16px !important;
                color: #fff !important;
                padding-left: 5px;
            }

            .activebtn {
                color: var(--tblr-link-color);
                text-decoration: none;
                box-shadow: -1px 0px 3px rgba(0, 0, 0, 0.1), 1px 0px 3px rgba(0, 0, 0, 0.1),
                    0px 4px 3px rgba(0, 0, 0, 0.15) !important;
                border-radius: 8px !important;
            }

            .cabecalho {
                display: flex !important;
                width: 100% !important;
                padding: 15px 14px !important;
                border-radius: 8px !important;
                margin-top: 12px !important;
                background-color: #fff !important;
                justify-content: space-between !important;
                align-items: center !important;
                margin-bottom: 14px !important;
            }

            .cabecalho h1 {
                color: #4a5576 !important;
                font-weight: 700 !important;
                font-family: "Open Sans", sans-serif !important;
                font-size: 24px !important;
            }

            .cabecalho span img {
                width: 20px !important;
                height: 20px !important;
            }

            .box-processo {
                display: flex !important;
                flex-direction: column !important;
                justify-content: space-between !important;
                align-items: center !important;
                width: 100% !important;
                padding: 24px 70px !important;
                border-radius: 8px !important;
                background-color: #fff !important;
            }

            .box-processo .box-info-processo,
            .box-info-processo-buttons,
            .box-view-processo {
                width: 100% !important;
                display: flex !important;
                margin-bottom: 24px !important;
            }

            .box-info-processo div:nth-child(1),
            .box-info-processo-buttons div:nth-child(1) {
                flex: 5 !important;
            }

            .box-info-processo div:nth-child(2),
            .box-info-processo-buttons div:nth-child(2) {
                flex: 4 !important;
                padding: 0 0x !important;
            }

            .box-info-processo .box-yellow,
            .box-info-processo .box-red {
                display: inline-block !important;

                text-align: center !important;
                padding: 0px 13px !important;
                margin-bottom: 10px !important;
                color: #fff !important;
                font-family: "Inter", sans-serif !important;
                font-weight: 600 !important;
                border-radius: 18px !important;
            }

            .box-info-processo-buttons div:nth-child(1) {
                display: flex !important;
                gap: 8px !important;
            }

            .box-info-processo-buttons div:nth-child(1) a {
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 600 !important;
                font-size: 16px !important;
                padding: 7px 14px !important;
                background: #ffffff !important;
                color: #344767 !important;
                text-decoration: none !important;
            }

            .box-info-processo-buttons .green-btn,
            .box-info-processo-buttons .blue-btn {
                padding: 8px 22px !important;
                margin-left: 5px !important;
                box-shadow: 0px 1px 2px rgb(0 0 0 / 15%) !important;
                border-radius: 8px !important;
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 700 !important;
                display: flex;
                font-size: 16px !important;
                text-decoration: none !important;
                color: #fff !important;
                gap: 8px;
            }

            .box-info-processo-buttons div:nth-child(1) a:focus {
                box-shadow: -1px 0px 3px rgba(0, 0, 0, 0.1), 1px 0px 3px rgba(0, 0, 0, 0.1),
                    0px 4px 3px rgba(0, 0, 0, 0.15) !important;
                border-radius: 8px !important;
            }

            .box-info-processo-buttons div:nth-child(1) a:focus svg {
                filter: brightness(0) saturate(100%) invert(68%) sepia(77%) saturate(2044%) hue-rotate(148deg) brightness(94%) contrast(91%) !important;
            }

            .box-info-processo-buttons .green-btn,
            .box-info-processo-buttons .blue-btn {
                padding: 8px 22px !important;
                margin-left: 5px !important;
                box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.15) !important;
                border-radius: 8px !important;
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 700 !important;
                font-size: 16px !important;
                text-decoration: none !important;
                color: #fff !important;
            }

            .box-info-processo-buttons .green-btn svg,
            .box-info-processo-buttons .blue-btn svg {
                margin-left: 5px !important;
                margin-bottom: -3px !important;
            }

            .box-info-processo .box-yellow {
                background-color: #fabe33 !important;
                margin-left: 27px !important;
            }

            .box-info-processo .box-red {
                background-color: #c10909 !important;
                margin-left: 13px !important;
            }

            .box-info-processo-buttons .green-btn {
                background-color: #04845e !important;
            }

            .box-info-processo-buttons .blue-btn {
                background-color: #17c1e8 !important;
            }

            .box-info-processo h4 {
                margin-bottom: 8px !important;
                font-family: "Open Sans" !important;
                font-style: normal !important;
                font-weight: 700 !important;
                font-size: 18px !important;
                color: #4a5576 !important;
                line-height: 21px !important;
            }

            .box-info-processo p {
                font-family: "Inter", sans-serif !important;
                font-style: normal !important;
                font-weight: 600 !important;
                font-size: 14px !important;
                color: #4a5576 !important;
                line-height: 21px !important;
            }

            .modal-backdrop {
                --tblr-backdrop-zindex: 1050;
                --tblr-backdrop-bg: none;
                --tblr-backdrop-opacity: 0.24;
                position: fixed;
                top: 0;
                left: 0;
                z-index: var(--tblr-backdrop-zindex);
                height: 0;
                olor: none;
            }

            /* Btn Forms */
            .btn-cancel,
            .btn-cancel:hover {
                padding: 8px 22px;
                gap: 8px;
                background: #c10909;
                box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.15);
                border-radius: 8px;
                color: #fff;
                font-family: "Inter";
                font-style: normal;
                font-weight: 700;
                font-size: 16px;
                line-height: 150%;
            }


            .btn-sucess,
            .btn-sucess:hover {
                padding: 8px 22px;
                gap: 8px;
                background-color: #04845e;
                box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.15);
                border-radius: 8px;
                color: #fff;
                font-family: "Inter";
                font-style: normal;
                font-weight: 700;
                font-size: 16px;
                line-height: 150%;
            }


            /* Modal Emitir */
            .title-modal {
                font-family: "Inter";
                font-style: normal;
                font-weight: 700;
                font-size: 24px;
                line-height: 150%;
                color: #4a5576;
            }

            .modal-content {
                background-color: #f4f5f6;
            }

            .modal-header {
                padding: 5px 15px;
                border-bottom: none;
            }

            .modal-footer-emitir {
                padding: 0 15px;
                border-top: none;
            }

            .box-info-processo p span {
                font-family: "Inter", sans-serif !important;
                font-style: normal !important;
                font-weight: normal !important;
                font-size: 14px !important;
                color: #4a5576 !important;
                line-height: 21px !important;
            }

            .box-view-processo {
                height: 285px !important;
                overflow-y: auto !important;
                flex-direction: column !important;
                font-family: "Inter", sans-serif !important;
            }

            .box-view-container {
                display: flex !important;
                margin-bottom: 8px !important;
                background-color: #8591a4 !important;
                border-radius: 8px !important;
            }

            .box-view-nome,
            .box-processo-nome,
            .box-documentos-nome {
                flex: 3 !important;
                background-color: #8591a4 !important;
                border-radius: 8px !important;
            }

            .box-view-nome h3 {
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 700 !important;
                font-size: 16px !important;
                color: #fff !important;
            }

            .box-view-doc,
            .box-processo-doc,
            .box-documentos-doc {
                border: 1px solid #8591a4 !important;
                flex: 9 !important;
                display: flex !important;
                align-items: center !important;
                justify-content: space-between !important;
                background-color: #ffffff !important;
                padding: 8px !important;
                color: #4a5576 !important;
                border-radius: 8px !important;
            }

            .box-view-doc a {
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 400 !important;
                font-size: 14px !important;
                line-height: 14px !important;
                color: #4a5576 !important;
                text-decoration: none !important;
            }

            /* Despachos */
            .box-processo-nome {
                flex: 4 !important;
            }

            .box-processo-doc {
                flex: 8 !important;
            }

            .box-processo-nome h3 {
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 700 !important;
                font-size: 16px !important;
                line-height: 150% !important;
                color: #fff !important;
            }

            .box-processo-nome p {
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 400 !important;
                font-size: 14px !important;
                line-height: 150% !important;
                color: #fff !important;
            }

            .box-processo-doc p {
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 400 !important;
                font-size: 14px !important;
                text-align: justify !important;
                line-height: 150% !important;
                color: #4a5576 !important;
            }

            /* Documentos */
            .box-documentos-nome {
                flex: 6 !important;
            }

            .box-documentos-nome h3 {
                font-family: "Inter" !important;
                font-style: normal !important;
                font-weight: 700 !important;
                font-size: 16px !important;
                line-height: 150% !important;
                color: #fff !important;
            }

            .box-documentos-doc {
                flex: 4 !important;
                justify-content: flex-end !important;
            }

            .modal {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 1050;
                display: none;
                overflow: hidden;
                -webkit-overflow-scrolling: touch;
                outline: 0;
            }

            .modal-content {
                position: relative;
                background-color: #fff;
                -webkit-background-clip: padding-box;
                background-clip: padding-box;
                border: 1px solid #999;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 6px;
                outline: 0;
                -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
                box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
            }
        </style>
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap"
            rel="stylesheet" />
        </head>
        <div >
            <header class="cabecalho container">
                <h1>Histórico do Processo</h1>
                <a href="#">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.0023 13.5C9.04797 13.5 8.13276 13.1313 7.45797 12.4749C6.78318 11.8185 6.40408 10.9283 6.40408 10C6.40408 9.07174 6.78318 8.1815 7.45797 7.52513C8.13276 6.86875 9.04797 6.5 10.0023 6.5C10.9566 6.5 11.8718 6.86875 12.5466 7.52513C13.2214 8.1815 13.6005 9.07174 13.6005 10C13.6005 10.9283 13.2214 11.8185 12.5466 12.4749C11.8718 13.1313 10.9566 13.5 10.0023 13.5ZM17.6407 10.97C17.6818 10.65 17.7127 10.33 17.7127 10C17.7127 9.67 17.6818 9.34 17.6407 9L19.8099 7.37C20.0052 7.22 20.0566 6.95 19.9333 6.73L17.8772 3.27C17.7538 3.05 17.4762 2.96 17.25 3.05L14.6902 4.05C14.1556 3.66 13.6005 3.32 12.9528 3.07L12.5724 0.42C12.5313 0.18 12.3154 0 12.0584 0H7.94616C7.68915 0 7.47326 0.18 7.43214 0.42L7.05176 3.07C6.40408 3.32 5.84894 3.66 5.31435 4.05L2.7545 3.05C2.52832 2.96 2.25075 3.05 2.12738 3.27L0.0712765 6.73C-0.0623704 6.95 -0.00068705 7.22 0.194643 7.37L2.36384 9C2.32271 9.34 2.29187 9.67 2.29187 10C2.29187 10.33 2.32271 10.65 2.36384 10.97L0.194643 12.63C-0.00068705 12.78 -0.0623704 13.05 0.0712765 13.27L2.12738 16.73C2.25075 16.95 2.52832 17.03 2.7545 16.95L5.31435 15.94C5.84894 16.34 6.40408 16.68 7.05176 16.93L7.43214 19.58C7.47326 19.82 7.68915 20 7.94616 20H12.0584C12.3154 20 12.5313 19.82 12.5724 19.58L12.9528 16.93C13.6005 16.67 14.1556 16.34 14.6902 15.94L17.25 16.95C17.4762 17.03 17.7538 16.95 17.8772 16.73L19.9333 13.27C20.0566 13.05 20.0052 12.78 19.8099 12.63L17.6407 10.97Z"
                            fill="#344767" />
                    </svg>
                </a>
            </header>

            <div wire:ignore.self tabindex="-1" role="dialog" aria-hidden="true" class="modal " id="modal-mensagem">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span style="color: #111">×</span>
                            </button>
                            <h4 class="modal-title title-modal">Emissão de Documento</h4>
                        </div>
                        <div class="modal-body">
                            <form>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label title-label">Unidade/posto de atendimento:</label>
                                    <livewire:users.servicestation-select :defaultValue="$service_station" />
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name"
                                        class="col-form-label">Atribuir:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <livewire:users.users-select :defaultValue="$user" />
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label title-label">Observação:</label>
                                    <textarea wire:model="content" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label title-label">Status do processo:</label>
                                    <select wire:model="status" class="form-control" name="cars" id="cars">
                                        @foreach (App\Models\Process::SITUATION_TYPES_LABELS as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer modal-footer-emitir">
                            <div style="
                          display: flex;
                          justify-content: space-between;
                          align-items: center;
                        "
                                class="form-group">
                                <div
                                    style="
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                          ">




                                    <button type="button" class="btn-modal btn btn-default btn-cancel"
                                        data-dismiss="modal">
                                        Cancelar
                                    </button>
                                </div>




                                <button type="button" wire:click="sendForwarding()"
                                    class="btn-modal btn btn-default btn-sucess" data-dismiss="modal">
                                    Enviar
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main class="box-processo">
            <div class="box-info-processo">
                <div>
                    <h4>Processo: <span>{{$process->code}}</span></h4>
                    <p style="margin-top:10px">Nome: <span>{{ strtoupper($process->name) }}</span></p>
                    <p style="margin-top:10px">Cpf: <span>{{ $process->citizen->cpf }}</span></p>
                    <p style="margin-top:10px">Rg: <span>{{ $process->citizen->rg }}</span></p>
                    <p style="margin-top:10px">Último acesso: <span>{{ $this->getLastAcessUser()->name }}</span></p>
                    <p style="margin-top:10px">Horário do ultimo acesso: <span> {{ $this->getLastAcessHour() }} </span></p>
                    <br />
                    <hr>
                </div>
                <div>
                    <p>Status do Processo<span class="box-yellow">{{ $process->getSituation() }}</span></p>
                    <p>Status de Pagamento <span class="box-red">{{ $process->getPaymentStatus() }}</span></p>
                </div>
            </div>
            <div class="box-info-processo-buttons">
                <div>

                    <!-- Despachos -->
                    <a class="{{ $viewBox == 'despachs' ? 'activebtn' : '' }}" wire:click="$set('viewBox', 'despachs')">
                        <svg width="22" height="16" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            @if ($viewBox == 'despachs')
                                <path d="M10 0V6H18V0M10 18H18V8H10M0 18H8V12H0M0 10H8V0H0V10Z" fill="#206bc4" />
                            @else
                                <path d="M10 0V6H18V0M10 18H18V8H10M0 18H8V12H0M0 10H8V0H0V10Z" fill="#344767" />
                            @endif

                        </svg>
                        Despachos
                    </a>
                    <!-- Documentos -->
                    <a wire:click="$set('viewBox', 'documents')"
                        class="{{ $viewBox == 'documents' ? 'activebtn' : '' }}">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">

                            @if ($viewBox == 'documents')
                                <path
                                    d="M10 16H5.5C3.98 16 2.68333 15.4767 1.61 14.43C0.536667 13.3767 0 12.0933 0 10.58C0 9.28 0.39 8.12 1.17 7.1C1.95667 6.08 2.98333 5.43 4.25 5.15C4.67 3.61667 5.50333 2.37667 6.75 1.43C8.00333 0.476667 9.42 0 11 0C12.9533 0 14.6067 0.68 15.96 2.04C17.32 3.39333 18 5.04667 18 7C19.1533 7.13333 20.1067 7.63333 20.86 8.5C21.62 9.35333 22 10.3533 22 11.5C22 12.7533 21.5633 13.8167 20.69 14.69C19.8167 15.5633 18.7533 16 17.5 16H12V8.85L13.6 10.4L15 9L11 5L7 9L8.4 10.4L10 8.85V16Z"
                                    fill="#206bc4"></path>
                            @else
                                <path
                                    d="M10 16H5.5C3.98 16 2.68333 15.4767 1.61 14.43C0.536667 13.3767 0 12.0933 0 10.58C0 9.28 0.39 8.12 1.17 7.1C1.95667 6.08 2.98333 5.43 4.25 5.15C4.67 3.61667 5.50333 2.37667 6.75 1.43C8.00333 0.476667 9.42 0 11 0C12.9533 0 14.6067 0.68 15.96 2.04C17.32 3.39333 18 5.04667 18 7C19.1533 7.13333 20.1067 7.63333 20.86 8.5C21.62 9.35333 22 10.3533 22 11.5C22 12.7533 21.5633 13.8167 20.69 14.69C19.8167 15.5633 18.7533 16 17.5 16H12V8.85L13.6 10.4L15 9L11 5L7 9L8.4 10.4L10 8.85V16Z"
                                    fill="#344767"></path>
                            @endif
                        </svg>
                        Documentos
                    </a>

                </div>
                <div style="display:flex !important">
                    @can('permission', 'process.edit')
                    <a href="#" class="green-btn" id="#btn-mensagem" data-toggle="modal"
                        data-target="#modal-mensagem">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 11H11V15H9V11H5V9H9V5H11V9H15M10 0C8.68678 0 7.38642 0.258658 6.17317 0.761205C4.95991 1.26375 3.85752 2.00035 2.92893 2.92893C1.05357 4.8043 0 7.34784 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7362 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20C12.6522 20 15.1957 18.9464 17.0711 17.0711C18.9464 15.1957 20 12.6522 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0Z"
                                fill="white" />
                        </svg>
                        Emitir
                    </a>
                    @endif
                     <!--
                    <a href="#" class="blue-btn">
                        <svg width="20" height="20" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 0C4.05 0 0 4.05 0 9C0 13.95 4.05 18 9 18C13.95 18 18 13.95 18 9C18 4.05 13.95 0 9 0ZM7.2 13.5L2.7 9L3.969 7.731L7.2 10.953L14.031 4.122L15.3 5.4L7.2 13.5Z"
                                fill="white" />
                        </svg>
                        Trâmite
                    </a>
                     -->
                </div>
            </div>
            @if ($viewBox == 'despachs')
                <div style="width: 100% !important;" class="box-view-despachos">




                    @foreach ($dispatchs as $key => $item)
                        @if ($item->type == 1 || $item->type == 2)
                            <div onclick="modalInfoUser('{{ json_encode($item->user) }}','{{ $item->user->getUnit()->name ?? '' }}', '{{ $item->user->getFunction()->name ?? '' }}')"
                                class="flex box-view-container">
                                <div class="col-xs-5 box-processo-nome">
                                    <div style="padding:1%">
                                        <h3>Despacho {{ $dispatchs->count() - $key }}, Status: {{ $item->statusString }}</h3>
                                        <p><strong>Data:</strong>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y \à\s H\hi') }}
                                        </p>
                                        <p>
                                            @if ($item->type == 1)
                                                SERVIDOR:
                                            @else
                                                USUÁRIO:
                                            @endif {{ $item->user->name }}
                                        </p>
                                        <p><strong>Função:</strong> {{$item->user->getUnit()->name ?? 'Não vinculado'}}</p>
                                        <p><strong>Unidade:</strong> {{$item->user->getFunction()->name ?? 'Não vinculado'}}</p>
                                    </div>

                                </div>
                                <div class="col-xs-7 box-processo-doc">
                                    <p>
                                         {{ $item->comment }}

                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($item->type == 3)
                        <div  onclick="modalInfoUser('{{ json_encode($item->user) }}','{{ $item->user->getUnit()->name ?? '' }}', '{{ $item->user->getFunction()->name ?? '' }}')"
                            class="flex box-view-container">
                            <div style="background-color: #04845e !important" class="col-xs-5 box-processo-nome">
                                <div style="padding:1%">
                                    <h3>Despacho {{ $key + 1 }}, Status: {{ $item->statusString }}</h3>
                                    <p><strong>Data:</strong>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y \à\s H\hi') }}
                                    </p>
                                    <p>
                                        @if ($item->type == 1)
                                            SERVIDOR:
                                        @else
                                            USUÁRIO:
                                        @endif {{ $item->user->name }}
                                    </p>
                                    <p><strong>Função:</strong> {{$item->user->getUnit()->name ?? 'Não vinculado'}}</p>
                                    <p><strong>Unidade:</strong> {{$item->user->getFunction()->name ?? 'Não vinculado'}}</p>
                                </div>

                            </div>
                            <div class="col-xs-7 box-processo-doc">
                                <p>
                                     {{ $item->comment }}

                                </p>
                            </div>
                        </div>
                        @endif
                    @endforeach


            @endif

            @if ($viewBox == 'documents')
                <div  style="width: 100% !important;"  class="box-view-processo">
                    <div class="box-view-processo">
                        @php
                            $documents = json_decode($this->process->citizen->digitalized_documents);
                            $countDocs = 0;
                        @endphp
                        @foreach ($documents as $item)
                            <div class="box-view-container">
                                <div class="box-view-nome">
                                    <h3>{{ ucwords($this->getDocumentByType($item->type)) }}</h3>
                                </div>
                                <div class="box-view-doc">
                                    <a target="_blank" href="/{{ str_replace('public', 'storage', $item->file) }}">
                                        <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 13V7H0L7 0L14 7H10V13H4ZM0 17V15H14V17H0Z" fill="#344767" />
                                        </svg>
                                        {{ $item->name ?? $item->file }}
                                    </a>
                                    <p>{{ (new DateTime($item->date ?? ''))->setTimezone(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y H:i:s') ?? ''}}</p>

                                </div>
                            </div>
                        @endforeach
                    </div>
            @endif
        </main>


        <!-- Javascript -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            $(function() {
                //código para exibir os modais
                $("#btn-mensagem").click(function() {
                    $("#modal-mensagem").modal('show');
                });
            });

            function modalInfoUser(userString, unity, func) {

                let userObject = JSON.parse(userString)
                Swal.fire({
                    title: 'Info Usuario ' + userObject.name,
                    icon: 'info',
                    html: `
                  <strong>Unidade:</strong> ${unity}<br>
                  <strong>Função:</strong> ${func}<br>
                  <strong>Cpf:</strong> ${userObject.cpf}<br>
                  <strong>Rg:</strong> ${userObject.rg}
              `,
                    showCloseButton: true,


                })
            }
        </script>
    </div>
</div>
