<!DOCTYPE html>
<html style="background-color: #fff" lang="pt-br">
   <head>
      <meta charset="utf-8" />
      <title>A4</title>
      <style>
         @page { margin: 0 }
         body { margin: 0 }
         .sheet {
         margin: 0;
         overflow: hidden;
         position: relative;
         box-sizing: border-box;
         page-break-after: always;
         }
         body { background: #e0e0e0 }
         @media screen {
         }
         /** Fix for Chrome issue #273306 **/
         * {
         margin: 0;
         padding: 0;
         font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
         }
         .cabecalho {
         background-color: #a9d0f5;
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 10px;
         gap: 10px;
         }
         .cabecalho h1 {
         margin: 0;
         }
         .logo img {
         width: 100px;
         }
         .info-gov {
         flex: 6;
         margin: 7px;
         }
         .info-gov p,
         .info-processo {
         color: #0431b4;
         font-size: 12px;
         font-weight: bold;
         text-transform: uppercase;
         margin-bottom: 5px;
         }
         .paragraph {
         font-size: 24px !important;
         color: #0431b4;
         }
         .info-processo {
         flex: 2;
         display: flex;
         flex-direction: column;
         }
         .info-processo img {
         width: 100px;
         margin-left: 49px;
         }
         .infos-gerais {
         position: relative;
         padding: 10px;
         gap: 10px;
         display: flex;
         }
         .info-pessoa {
         margin-top: 20px;
         flex: 4;
         font-size: 11px;
         }
         .info-pessoa p {
         font-weight: bold;
         margin-bottom: 5px;
         text-transform: uppercase;
         }
         .info-pessoa span {
         font-weight: normal;
         }
         .foto-pessoa {
         position: relative;
         top: -30px;
         border: 3px solid #000;
         height: 180px;
         flex: 1;
         margin-right: 8px;
         background-color: #fff;
         }
         .info-complementar p {
         margin-bottom: 10px;
         }
         .assinatura {
         display: flex;
         gap: 40px;
         justify-content: space-between;
         padding: 10px;
         }
         .assinatura-one {
         flex: 1;
         border: 1px solid #111;
         text-align: center;
         line-height: 80px;
         }
         .assinatura-two {
         flex: 1;
         }
         .caracteristicas {
         display: flex;
         padding: 2px 10px;
         font-size: 13px;
         font-weight: bold;
         }
         .box-anotacoes {
         padding: 0 10px;
         }
         .box-anotacoes .title {
         margin: 10px;
         text-align: center;
         text-transform: uppercase;
         font-weight: bold;
         font-size: 13px;
         }
         .anotacoes {
         padding: 5px;
         border: 1px solid #111;
         }
         table.gn-seletable {
         font-family: arial, sans-serif;
         border-collapse: collapse;
         width: 100%;
         }
         .gn-seletable td {
         border: 1px solid #111;
         text-align: left;
         padding: 25px;
         }
      </style>
   </head>
   <body style="background-color: #fff" class="A4">
      <section class="sheet">
         <div style=" background-color: #a9d0f5;height:11%" class="cabecalho ">
            <div style="clear:both; position:relative;">
               <div style="position:absolute; left:0pt; width:192pt;">
                  <div class="logo">
                     <img style="width: 90px" src="https://pca-sic.msbtec.com.br/politec.png" alt="Logo Polícia Técnica">
                  </div>
               </div>
               <div style="position:absolute; left:80pt; width:192pt;">
                  <label style="color:#004aad">Governo do estado do Amapá</label>
                  <label style="color:#004aad">Polícia Técnico-Científica</label>
                  <label style="color:#004aad">Departamento de indentificação civil e criminal</label>
                  <br>
                  <p style="color:#004aad" class="paragraph">Prontuário Civil</p>
               </div>
               <div style="margin-left:460pt;">
                  <div style="float: rigth;" >
                     <label style="display: flex;color:#004aad">Processo: <span>{{$citizen->process}}</span></label>
                     <br>
                     <div style="position: relative;
                        top: 1%;
                        border: 3px solid #000;
                        height: 130px;
                        flex: 1;
                        margin-right: 8px;
                        background-size: cover;
                        background-image: url('{{$photo}}');" class="foto-pessoa">
                        <img style="width: 90px;z-index:10000px"   scr="https://pca-sic.msbtec.com.br/politec.png"/>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div style="margin-top: 1px" class="infos-gerais">
            <div class="info-pessoa">
               <p>CPF<span style="margin-left: 45px;">{{$citizen->cpf}}</span></p>
               <p>Nome<span style="margin-left: 30px;">{{$citizen->name}}</span></p>
               <p style="margin-bottom: 20px;">Filiação<span style="margin-left: 15px; line-height: 25px;"> @foreach ($filiations as $item)
                  {{$item}} e
                  @endforeach</span>
               </p>
               <div class="info-complementar">
                  <p>Nascido (A)
                     <span style="margin-left: 15px;">{{ date("d/m/Y", strtotime($citizen->birth_date)) }}</span>
                     <b style="margin-left: 80px;">EM<span style="margin-left: 15px;">{{ $birthCity->name ?? '' }} - {{ $uf->name ?? '' }}</span></b>
                  </p>
                  <p>Nacionalide
                     <span style="margin-left: 9px;">Brasileira</span>
                     <b style="margin-left: 80px;">Procedência<span style="margin-left: 15px;">Testando</span></b>
                  </p>
                  <p>Documento de Origem
                     <span style="margin-left: 9px;">Certidão</span>
                  </p>
                  <p>Nome Anterior:
                     <span style="margin-left: 9px;">{{ $citizen->names_previous ?? ''}}</span>
                     <b style="margin-left: 80px;">Estado Civil <span style="margin-left: 15px;">
                     {{$maritalStatus->name ?? '' }} (a)
                     </span></b>
                  </p>
                  <p>Profissão
                     <span style="margin-left: 9px;">{{ $profession->name ?? '' }}</span>
                     <b style="margin-left: 112px;">Telefone<span style="margin-left: 15px;">{{ $citizen->cell ?? ''}}</span></b>
                  </p>
                  <p>NIT/NIS/PIS/PASEP
                     <span style="margin-left: 9px;">O nº social</span>
                  </p>
                  <p>Sexo <b>{{$genre->name}}</b>
                     <b style="margin-left: 40px;">CÚTIS:<span style="margin-left: 15px;">{{ strtolower($features->{'c-tis'} ?? '') ?? ''}}</span></b>
                     <b style="margin-left: 40px;">CABELO:<span style="margin-left: 15px;">{{ strtolower($features->{'cor-do-cabelo-'} ?? '') ?? ''}}</span></b>
                     <b style="margin-left: 40px;">OLHOS:<span style="margin-left: 15px;">{{ strtolower($features->{'cor-dos-olhos'} ?? '') ?? ''}}</span></b>
                     <b style="margin-left: 40px;">ALTURA:<span style="margin-left: 15px;">{{$citizen->height}}</span></b>
                  </p>
                  @php
                  $featuresSelected = ['c-ti', 'cor-do-cabelo-', 'cor-dos-olhos']
                  @endphp
                  <p class="info-complementar"> Outras Características:
                     <br>
                     @foreach ($features as $key => $item)
                     @foreach ($featuresx as  $itemx)
                     @if(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $itemx->name))) == $key && in_array($key, $featuresSelected) !==  1 )
                     <b >{{$itemx->name}}:</b><span style="margin-left: 3px;"> {{ strtolower($features->{$key})}},</span>
                     @endif
                     @endforeach
                     @endforeach
                  </p>
               </div>
            </div>
         </div>
         <div class="assinatura">
            <div style="clear:both; position:relative;">
               <div style="position:absolute; left:0pt; width:260pt;">
                  <div class="assinatura-one">
                     <p>Assinatura do Cidadão</p>
                  </div>
               </div>
               <div style="position:absolute; left:300pt; width:192pt;">
                  <div class="assinatura-two">
                     <p style="margin-bottom: 5px; font-weight: bold; text-transform: uppercase; font-size: 12px;">Posto de atendimento<span style="margin-left: 10px; font-weight: normal; text-transform: uppercase; font-size: 11px;">SUPER FÁCIL ZONA OESTE</span></p>
                     <p style="margin-bottom: 5px; font-weight: bold; text-transform: uppercase; font-size: 12px;">Qualificado (a) em: <span style="margin-left: 10px; font-weight: normal; text-transform: uppercase; font-size: 11px;">{{ date("d/m/Y", strtotime($citizen->updated_at))  ?? ''}}</span></p>
                     <p style="margin-bottom: 5px; font-weight: bold; text-transform: uppercase; font-size: 12px;">Atendente (a) em: <span style="margin-left: 10px; font-weight: normal; text-transform: uppercase; font-size: 11px;">{{ Auth::user()->name }}
                        </span>
                     </p>
                     <p style="margin-bottom: 5px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CPF<span style="margin-left: 10px; font-weight: normal; text-transform: uppercase; font-size: 11px;">SUPER FÁCIL ZONA OESTE</span></p>
                  </div>
               </div>
            </div>
         </div>
         </p>
         <div style="margin-top:90px" class="box-anotacoes">
            <p class="title">Anotações</p>
            <div class="anotacoes">
               <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">Cart. Nac. Saúde</p>
               <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">Título Nº
                  <span style="font-weight: normal; margin-left: 25px;">{{ $citizen->voter_registration }}</span>
                  <b style="margin-left: 25px;">Zona:<span style="font-weight: normal; margin-left: 25px;">{{ $citizen->zone_voter }}</span></b>
                  <b style="margin-left:25px;">SEÇÃO<span style="font-weight: normal; margin-left: 25px;">{{ $citizen->section }}</span></b>
               </p>
               <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">IDENTIDADE PROFISSIONAL: <span style="font-weight: normal; margin-left: 25px;">CONCATENAR TUDO (,)</span></p>
               <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CART. DE TRAB. E PREVID. SOCIAL: <span style="font-weight: normal; margin-left: 25px;">{{ $citizen->social_security_work_card }}</span></p>
               <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CART. NACIONAL DE HABILITAÇÃO: <span style="font-weight: normal; margin-left: 25px;">{{ $citizen->national_drivers_license }}</span></p>
               <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CERTIFICADO MILITAR:<span style="font-weight: normal; margin-left: 25px;">{{ $citizen->reservist_certificate }}</span></p>
               <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">TIPO SANGUÍNEO E O FATOR RH: <span style="font-weight: normal; margin-left: 25px;">{{ $citizen->blood_type }}</span></p>
               <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CONDIÇÕES ESPECÍFICAS DE SAÚDE: <span style="font-weight: normal; margin-left: 25px;">
                  @if($citizen->cid == '1')
                  <img style="width:15px;height:16px" id="fisico" src="https://pca-sic.msbtec.com.br/3.png"/>
                  @endif
                  @if($citizen->cid == '2')
                  <img style="width:15px;height:16px" id="cego" src="https://pca-sic.msbtec.com.br/2.png"/>
                  @endif
                  @if($citizen->cid == '4')
                  <img style="width:15px;height:16px" id="surdo" src="https://pca-sic.msbtec.com.br/4.png"/>
                  @endif
                  @if($citizen->cid == '3')
                  <img style="width:15px;height:16px" id="intelect" src="https://pca-sic.msbtec.com.br/1.png" />
                  @endif
                  @if($citizen->cid == '5')
                  <img style="width:15px;height:16px" id="autista" src="https://pca-sic.msbtec.com.br/5.png"/>
                  @endif
                  </span>
               </p>
            </div>
         </div>
         <div style="margin-top: 5px;" class="box-anotacoes box-tables">
            <table class="gn-seletable">
               <tbody>
                  <tr>
                    <td >Polegar esquerdo</td>
                    <td >Indicador esquerdo</td>
                    <td  >Médio esquerdo</td>
                    <td >Anelar esquerdo</td>
                    <td >Minimo esquerdo</td>
                  </tr>
                  <tr>
                  <td >Polegar direito</td>
                    <td >Indicador direito</td>
                    <td  >Médio direito</td>
                    <td >Anelar direito</td>
                    <td >Minimo direito</td>
                  </tr>
                 
               </tbody>
            </table>
         </div>
      </section>
   </body>
</html>