<style>
    .container {
        max-width: 1024px;
        border: 3px solid #111;
        padding: 10px 0;
        border-radius: 10px;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .form-group {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    #recipient-name::placeholder {
        color: #a0bee6;
        text-align: center;
    }

    .titles {
        width: 100%;
        padding: 0 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .subtitles {
        width: 100%;
        padding: 0 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pgt-styles {
        background-color: #3dea02;
        padding: 5px;
        border-radius: 5px;
        color: red;
    }

    .box-main,
    .box-despacho {
        width: 100%;
        padding: 0 80px;
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        gap: 30px;
    }

    .box-despacho {
        gap: 0;
    }

    .info-cidadao,
    .info-despacho {
        background-color: #a0bee6;
        flex: 30%;
        padding: 10px;
    }

    .emissao-registro {
        flex: 70%;
        padding: 10px;
    }

    .emissao-despacho {
        flex: 70%;
        padding: 10px;
        gap: 0;
        border: 2px solid #a0bee6;
    }

    .bloco-one {
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 20px;
        border-bottom: 3px solid darkblue;
        padding-bottom: 10px;
    }

    .bloco-two {
        display: flex;
    }

    .scroll {
        height: 380px;
        overflow: scroll;
        overflow-x: hidden;
    }
</style>
<div class="page-wrapper">
    <div class="container-fluid">


        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <title></title>
            <meta name="description" content="" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="stylesheet" href="./style.css" />

        </head>

        <body>
            <div>
                <div class="titles">
                    <div>
                        <span style="font-size: 24px; font-weight: 600;">Processo</span>
                        <span style="margin-left: 10px; font-size: 13px">{{$process->process}}</span>
                    </div>
                    <div>
                        <span style="color: red">Situação de pagamento: </span><span class="pgt-styles">{{$process->getPaymentStatus()}}</span>
                    </div>
                    <div>
                        <span style="font-weight: 600">Situação: </span>
                        <span style="margin-left: 10px; font-size: 16px">{{$process->getSituation()}}</span>
                    </div>
                </div>

                <div style="margin-top: 5px" class="subtitles">

                    <div>
                        <span style="font-size: 16px; font-weight: 600;">Posto de Atendimento: </span><span
                            style="font-size: 15px;">Superfácil</span>
                    </div>
                </div>

                <div class="box-main">
                    <div class="info-cidadao">
                        <h3 style="font-size: 17px;">{{ strtoupper($process->name) }}</h3>
                        <p>CPF: <span>{{ $process->citizen->cpf }}</span></p>
                        <p>RG: <span>{{ $process->citizen->rg }}</span></p>
                        <hr>
                        <p>Último acesso: <span></span></p>
                        <p>Hora: <span>00:00</span></p>
                        <br />
                        <p style="color: red; text-align: center;">Histórico de processos vinculados a esse cidadão -
                            por CPF/RG</span></p>
                    </div>

                    <div class="emissao-registro">
                        <div class="bloco-one">
                            <p>Emissão de registro civil</p>
                            <button style="font-weight: 600;" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-mensagem">
                                Encaminhar ▶️
                            </button>
                        </div>

                        <div class="bloco-two">
                            <div style="flex: 20%; margin-top: 40px;">
                                <p>Anexos:</p>
                                <p>Qtd</p>
                            </div>

                            <div class="scroll" style="flex: 80%; margin: 40px 0; ">

                                @php
                                    $documents = json_decode($this->process->citizen->digitalized_documents);
                                    $countDocs = 0;
                                @endphp

                                @foreach ($documents as $item)
                                    <div style="border-bottom: 1px solid #a0bee6;">
                                        <p> {{ ucwords($this->getDocumentByType($item->type)) }} :</p>
                                        <a target="_blank" style="margin-left: 40px;"
                                            href="/{{ str_replace('public', 'storage', $item->file) }}">Link Acesso</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                @foreach ($dispatchs as $key => $item)
                    <div class="box-despacho">
                        <div class="info-despacho">
                            <h1 style="font-size: 17px;"><b>Despacho {{ $key + 1 }}</b></h1>
                            <h3 style="font-size: 17px;">@if($item->type == 1)SERVIDOR:@endif {{$item->user->name}}</h3>
                            <p>CPF: <span>{{$item->user->cpf ?? ''}}</span></p>
                            <p>RG: <span>{{$item->user->rg ?? ''}}</span></p>
                            <p>UNIDADE: <span>{{$item->user->getUnit()->name ?? ''}}</span></p>
                            <p>FUNÇÃO: <span>{{$item->user->getFunction()->name ?? ''}}</span></p>
                            <p>DATA: <span>{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</span></p>
                            <p>HORA: <span>{{date('H:i:s', strtotime($item->created_at))}}</span></p>
                        </div>
                        <div class="emissao-despacho">
                            <div class="bloco-two">
                                <div style="flex: 20%; margin-top: 40px;">
                                    <p>Primeiro despacho é enviado automaticamente pelo usuário do atendimento ao setor
                                        de triagem</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="modal fade" id="modal-mensagem">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>×</span>
                                </button>
                                <h4 class="modal-title">Processo</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Encaminhar:</label>
                                        <input type="text" placeholder="Unidade / Posto Atendimento"
                                            class="form-control" id="recipient-name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name"
                                            class="col-form-label">Atribuir:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <input type="text" placeholder="Usuário" class="form-control"
                                            id="recipient-name" />
                                    </div>
                                    <div style="display: flex" class="form-group">
                                        <label style="visibility: hidden" for="recipient-name"
                                            class="col-form-label">Atribuir:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
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
                                        <label for="recipient-name" class="col-form-label">Situação:&nbsp;&nbsp;</label>

                                        <input type="text" class="form-control" id="recipient-name" />
                                    </div>

                                    <button style="background-color: #a0bee6; font-weight: 500" type="button"
                                        class="btn-modal btn btn-default" data-dismiss="modal">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Javascript -->
            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script>
                $(function() {
                    //código para exibir os modais
                    $("#btn-mensagem").click(function() {
                        $("#modal-mensagem").modal();
                    });
                });
            </script>
        </body>

        </html>
    </div>
</div>
