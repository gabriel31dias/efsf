<div class="page-wrapper">
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
   <div class="container-fluid">
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
                  por CPF/RG</span>
               </p>
            </div>
            <div class="emissao-registro">
               <div class="bloco-one">
                  <p>Emissão de registro civil</p>
                  <a id="btn-mensagem" style="font-weight: 600;" class="btn btn-primary" 
                     >
                  Encaminhar ▶️
                  </a>
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
         <div  class="box-despacho">
            <div onclick="modalInfoUser('{{json_encode($item->user)}}')" onmouseover="this.style.backgroundColor='#206bc4'; this.style.color='white';" onmouseout="this.style.backgroundColor='#a0bee6'; this.style.color='black';" class="info-despacho">
               <h1 style="font-size: 17px;"><b>Despacho {{ $key + 1 }}</b></h1>
               <h3 style="font-size: 17px;">@if($item->type == 1)SERVIDOR:@endif {{$item->user->name}}</h3>
               <p>Unidade: <span>{{$item->user->getUnit()->name ?? ''}}</span></p>
               <p>Função: <span>{{$item->user->getFunction()->name ?? ''}}</span></p>
               <p>Data: <span>{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</span></p>
               <p>Hora: <span>{{date('H:i:s', strtotime($item->created_at))}}</span></p>
            </div>
            <div class="emissao-despacho">
               <div class="bloco-two">
                  <div style="flex: 20%; margin-top: 40px;">
                     <p>Primeiro despacho é enviado automaticamente pelo usuário do atendimento ao setor
                        de triagem
                     </p>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         <div wire:ignore.self  tabindex="-1"
            role="dialog"  aria-hidden="true"  class="modal " id="modal-mensagem">
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
                           <label for="recipient-name" class="col-form-label">Encaminhar: {{$service_station}}</label>
                           <livewire:users.servicestation-select />
                        </div>
                        <div class="form-group">
                           <label for="recipient-name" class="col-form-label">Atribuir:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                           <livewire:users.users-select
                              :defaultValue="$user"
                              :customEvent="'selectedUfIdent'"
                              />
                        </div>
                        <div style="display: flex" class="form-group">
                           <label  for="recipient-name" class="col-form-label">Comentario:&nbsp;</label>
                           <textarea wire:model="content"  class="form-control" ></textarea>
                        </div>

                        <div style="display: flex" class="form-group">
                        <label  for="recipient-name" class="col-form-label">Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <select class="form-control" name="cars" id="cars">
                                @foreach (App\Models\Process::SITUATION_TYPES_LABELS as $key => $item)
                                 <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                     </form>
                  </div>
                  <div class="modal-footer">
                    
                        <a wire:click="sendForwarding()" style="background-color: #a0bee6; font-weight: 500" type="button"
                           class="btn-modal btn btn-default" >
                        Enviar
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Javascript -->
      <script>
         document.addEventListener('turbolinks:load', () => {
               //código para exibir os modais
               $("#btn-mensagem").click(function() {
                   $("#modal-mensagem").modal('show');
               });
         
         });
         
         function modalInfoUser(userString){
          
           let userObject = JSON.parse(userString)
           Swal.fire({
               title: 'Info Usuario '+ userObject.name,
               icon: 'info',
               html: `
                   <strong>Cpf:</strong> ${userObject.cpf}<br>
                   <strong>Rg:</strong> ${userObject.rg}
               `,
               showCloseButton: true,
               
              
           })
         }
      </script>
   </div>
</div>