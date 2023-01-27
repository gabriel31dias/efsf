
<!DOCTYPE html>
<html lang="pt-br">

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

/** Paper sizes **/
body.A3               .sheet { width: 297mm; height: 419mm }
body.A3.landscape     .sheet { width: 420mm; height: 296mm }
body.A4               .sheet { width: 210mm; height: 296mm }
body.A4.landscape     .sheet { width: 297mm; height: 209mm }
body.A5               .sheet { width: 148mm; height: 209mm }
body.A5.landscape     .sheet { width: 210mm; height: 147mm }
body.letter           .sheet { width: 216mm; height: 279mm }
body.letter.landscape .sheet { width: 280mm; height: 215mm }
body.legal            .sheet { width: 216mm; height: 356mm }
body.legal.landscape  .sheet { width: 357mm; height: 215mm }

/** Padding area **/
.sheet.padding-10mm { padding: 10mm }
.sheet.padding-15mm { padding: 15mm }
.sheet.padding-20mm { padding: 20mm }
.sheet.padding-25mm { padding: 25mm }

/** For screen preview **/
@media screen {
  body { background: #e0e0e0 }
  .sheet {
    background: white;
    box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
    margin: 5mm auto;
  }
}

/** Fix for Chrome issue #273306 **/
@media print {
           body.A3.landscape { width: 420mm }
  body.A3, body.A4.landscape { width: 297mm }
  body.A4, body.A5.landscape { width: 210mm }
  body.A5                    { width: 148mm }
  body.letter, body.legal    { width: 216mm }
  body.letter.landscape      { width: 280mm }
  body.legal.landscape       { width: 357mm }
}
    /*! normalize.css v7.0.0 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,footer,header,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figcaption,figure,main{display:block}figure{margin:1em 40px}hr{box-sizing:content-box;height:0;overflow:visible}pre{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:inherit}b,strong{font-weight:bolder}code,kbd,samp{font-family:monospace,monospace;font-size:1em}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}audio,video{display:inline-block}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,input{overflow:visible}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:1px dotted ButtonText}fieldset{padding:.35em .75em .625em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{display:inline-block;vertical-align:baseline}textarea{overflow:auto}[type=checkbox],[type=radio]{box-sizing:border-box;padding:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details,menu{display:block}summary{display:list-item}canvas{display:inline-block}template{display:none}[hidden]{display:none}/*# sourceMappingURL=normalize.min.css.map */
    @page {
      size: A4;
    }

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

<body class="A4">
  <section class="sheet">
    <div style=" background-color: #a9d0f5;height:10%" class="cabecalho ">

        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width:192pt;">
                <div class="logo">
                    <img src="https://logodownload.org/wp-content/uploads/2018/10/policia-militar-sp-logo.png" alt="Logo Polícia Técnica">

                  </div>
            </div>
            <div style="position:absolute; left:150pt; width:192pt;">
                <p>Governo do estado do Amapá</p>
        <p>Polícia Técnico-Científica</p>
        <p>Departamento de indentificação civil e criminal</p>

        <br>
        <p class="paragraph">Prontuário Civil</p>
            </div>
            <div style="margin-left:500pt;">
                <div style="float: rigth;" >
                    <p>Processo: <span>xxxxxxxxx</span></p>
                    <br>

                    <div style="position: relative;
                    top: 1%;
                    border: 3px solid #000;
                    height: 100px;
                    flex: 1;
                    margin-right: 8px;
                    background-color: #fff;" class="foto-pessoa">
                      <p>foto do cidadão</p>
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
        @endforeach</span> </p>
        <div class="info-complementar">
          <p>Nascido (A)
            <span style="margin-left: 15px;">{{$citizen->birth_date}}</span>
            <b style="margin-left: 80px;">EM<span style="margin-left: 15px;">Macapá - AP</span></b>
          </p>
          <p>Nacionalide
            <span style="margin-left: 9px;">Brasileira</span>
            <b style="margin-left: 80px;">Procedência<span style="margin-left: 15px;">Testando</span></b>
          </p>

          <p>Documento de Origem
            <span style="margin-left: 9px;">Certidão</span>
          </p>

          <p>Nome Anterior:
            <span style="margin-left: 9px;">Se Houver</span>
            <b style="margin-left: 80px;">Estado Civil<span style="margin-left: 15px;">Casada</span></b>
          </p>

          <p>Profissão
            <span style="margin-left: 9px;">Doméstica</span>
            <b style="margin-left: 112px;">Telefone<span style="margin-left: 15px;">Santa Rita</span></b>
          </p>

          <p>NIT/NIS/PIS/PASEP
            <span style="margin-left: 9px;">O nº social</span>
          </p>

          <p>Sexo
            <span style="margin-left: 1px;">Feminino</span>
            <b style="margin-left: 5px;">Cutis<span style="margin-left: 3px;">Teste</span></b>
            <b style="margin-left:5px;">Cabelo<span style="margin-left: 3px;">Concatenar cor e tipo</span></b>
            <b style="margin-left: 5px;">Olhos<span style="margin-left: 3px;">Concatenar cor e tipo</span></b>
            <b style="margin-left: 5px;">Altura<span style="margin-left: 3px;">1.64</span></b>
          </p>



        </div>
      </div>



    </div>
    <p class="caracteristicas">Outras Características:
      <span style="margin-left: 10px; font-weight: normal; text-transform: uppercase;">Concatenar Tudo (;)</span>

      <div class="assinatura">
        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width:192pt;">
                <div class="assinatura-one">
                    <p>Assinatura do Cidadão</p>
                  </div>
            </div>
            <div style="position:absolute; left:200pt; width:192pt;">
                <div class="assinatura-two">
                    <p style="margin-bottom: 5px; font-weight: bold; text-transform: uppercase; font-size: 12px;">Posto de atendimento<span style="margin-left: 10px; font-weight: normal; text-transform: uppercase; font-size: 11px;">SUPER FÁCIL ZONA OESTE</span></p>

                    <p style="margin-bottom: 5px; font-weight: bold; text-transform: uppercase; font-size: 12px;">Qualificado (a) em: <span style="margin-left: 10px; font-weight: normal; text-transform: uppercase; font-size: 11px;">26/01/2023</span></p>

                    <p style="margin-bottom: 5px; font-weight: bold; text-transform: uppercase; font-size: 12px;">Atendente (a) em: <span style="margin-left: 10px; font-weight: normal; text-transform: uppercase; font-size: 11px;">Maria Eunice Medeiros</span></p>

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
          <span style="font-weight: normal; margin-left: 25px;">0000000000000000</span>
          <b style="margin-left: 25px;">Zona:<span style="font-weight: normal; margin-left: 25px;">0000000000000000</span></b>
          <b style="margin-left:25px;">SEÇÃO<span style="font-weight: normal; margin-left: 25px;">0000000000000000</span></b>
        </p>

        <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">IDENTIDADE PROFISSIONAL: <span style="font-weight: normal; margin-left: 25px;">CONCATENAR TUDO (,)</span></p>

        <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CART. DE TRAB. E PREVID. SOCIAL: <span style="font-weight: normal; margin-left: 25px;">00000000000</span></p>

        <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CART. NACIONAL DE HABILITAÇÃO: <span style="font-weight: normal; margin-left: 25px;">00000000000</span></p>

        <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CERTIFICADO MILITAR:<span style="font-weight: normal; margin-left: 25px;">00000000000</span></p>

        <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">TIPO SANGUÍNEO E O FATOR RH: <span style="font-weight: normal; margin-left: 25px;">O+</span></p>

        <p style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase; font-size: 12px;">CONDIÇÕES ESPECÍFICAS DE SAÚDE: <span style="font-weight: normal; margin-left: 25px;">♿♿♿♿</span></p>
      </div>
    </div>
    <div style="margin-top: 5px;" class="box-anotacoes box-tables">
      <table class="gn-seletable">
        <tbody>
          <tr>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
          </tr>
          <tr>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
          </tr>
          <tr>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
            <td>Polegar Direito</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</body>

</html>



