<?php

namespace App\Services\Acervo;

use App\Models\Citizen;
use App\Models\Country;
use App\Models\County;
use App\Models\Filiation;
use App\Models\Genre;
use App\Models\MaritalStatus;
use App\Models\Registry;
use App\Models\Uf;

class CitizenSicOld
{

  public $rg;
  public $numcedula;
  public $data_expedicao;
  public $via;
  public $posto_atendimento;
  public $situacao_rg;
  public $nomecid;
  public $nome_anterior;
  public $nomesocial;
  public $incluirnome;
  public $cpfcid;
  public $isocial;
  public $numisocial;
  public $paicid;
  public $maecid;
  public $data_nascimento;
  public $genero;
  public $sexobio;
  public $cutis;
  public $barba;
  public $bigode;
  public $boca;
  public $cabelo;
  public $compleicao;
  public $arcada_superior;
  public $arcada_inferior;
  public $labios;
  public $nariz;
  public $olhos;
  public $orelhas;
  public $pescoco;
  public $rosto;
  public $sobrancelhas;
  public $testa;
  public $tracos;
  public $altura;
  public $estado_civil;
  public $profissao;
  public $numrescid;
  public $cep;
  public $bairro;
  public $municipio;
  public $complemento;
  public $residencia;
  public $fone;
  public $procedencia;
  public $naturalidade;
  public $uf_naturalidade;
  public $naturalidade_exterior;
  public $pais;
  public $situacao_migracao;
  public $tipo_certidao;
  public $termo;
  public $livro;
  public $letra_livro;
  public $folha;
  public $letra_folha;
  public $data_certidao;
  public $cod_cartorio;
  public $nome_cartorio;
  public $cart_nome_fantasia;
  public $certidao;
  public $codposemis;
  public $certidao_matricula;
  public $doccert;


  public function setAttributes(array $dados) {
    foreach ($dados as $chave => $valor) {
        $atributo = strtolower($chave); // Converter a chave para letras minúsculas
        if (property_exists($this, $atributo)) {
            $this->$atributo = $valor; // Setar o valor do atributo
        }
        }

        session()->put("CITIZEN_SIC_OLD_" . $this->rg, $this);
   }

   public function getCreateFields()
   {
    $mother = !empty($this->maecid) ? ["name" => $this->maecid, "type" => Filiation::TYPE_MATERNAL ] : null;
    $father = !empty($this->paicid) ? ["name" => $this->paicid, "type" => Filiation::TYPE_PATERNAL ] : null;
    $filiations = []; 
    $uf = ""; 
    $county = ""; 
    $registry = "";
    $country = "";
    $genre = ""; 
    $maritalStatus = "";
    if(is_array($mother)) $filiations[] = $mother;
    if(is_array($father)) $filiations[] = $father;

    if(!empty($this->uf_naturalidade)) $uf = Uf::where('acronym', $this->uf_naturalidade)->first();
    if(!empty($this->uf_naturalidade) && !empty($this->naturalidade)) $county = County::where('uf_id', $uf->id)->where('name', 'ilike' ,  "%$this->naturalidade%")->first();
    if(!empty($this->cod_cartorio)) $registry = Registry::where('id', $this->cod_cartorio)->first();
    if(!empty($this->pais)) $country = Country::where('name', 'ilike' ,  "%$this->pais%")->first();
    if(!empty($this->estado_civil)) $maritalStatus = MaritalStatus::where('name', 'ilike' ,  "%$this->estado_civil%")->first();
    if(!empty($this->genero)) $genre = Genre::where('name', 'ilike' ,  "%$this->genero%")->first();
    $biologicalSex = $this->getBiologicalSex($this->sexobio);



    $fields = [
    "name" => $this->nomecid,
    "cpf" => $this->formatarCpf($this->cpfcid),
    "rg" => $this->rg,
    "filiations" => $filiations,
    "birth_date" => $this->data_nascimento,
    "n_social" => $this->numisocial,
    "via_rg" => 2,
    "zip_code" => $this->cep,
    "address" => $this->residencia,
    "number" => $this->numrescid,
    "complement" => $this->complemento,
    "cell" => $this->fone,
    "telephone" => $this->fone,
    "certificate" => !empty($this->certidao_matricula) ? 1 : 2,
    "book_number" => $this->livro,
    "term_number" => $this->termo,
    "book_letter" => $this->letra_livro,
    "sheet_number" => $this->folha,
    "dou_certificate_date" => $this->data_certidao,
    "uf_certificate" => isset($uf) ? $uf->id : "",
    "county_certificate" => isset($county) ? $county->id : "",
    "matriculation" => $this->certidao_matricula,
    "name_social" => $this->nomesocial,
    "names_previous" => $this->nome_anterior,
    "height" => $this->altura,
    "county_certificate" => $county,
    "uf_certificate" => $uf, 
    "registry_certificate" => $registry,
    "country" => $country,
    "genre_biologic_id" => $biologicalSex,
    "genre" => $genre, 
    "maritalStatus" => $maritalStatus,
    "type_of_certificate" => $this->getTypeOfCertificate($this->tipo_certidao),
    "type_of_certificate_new" =>  $this->getTypeOfCertificate($this->tipo_certidao)
    ];


    return $fields;
   }

   function formatarCpf($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    $tamanhoAtual = strlen($cpf);

    if ($tamanhoAtual < 11) {
        $zerosFaltantes = 11 - $tamanhoAtual;
        $cpf = str_repeat('0', $zerosFaltantes) . $cpf;
    }

    $cpfFormatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);

    return $cpfFormatado;
}

function getTypeOfCertificate($value) {
    $lowercaseValue = $this->removeAccents(strtolower($value));
    foreach (Citizen::CERTIFICATE_TYPE as $key => $type) {
        $lowercaseType = $this->removeAccents(strtolower($type));
        if ($lowercaseType === $lowercaseValue) {
            return $key;
        }
    }
    return 0;
}

function getBiologicalSex($value) { 
        $value = strtolower($value);
        return match ($value) {
             'feminino' => "2" ,
             'masculino' => "1",
             default => "0"
        };
}

function removeAccents($str) {
    return str_replace(
        array('á', 'à', 'â', 'ã', 'ä', 'é', 'è', 'ê', 'ë', 'í', 'ì', 'î', 'ï', 'ó', 'ò', 'ô', 'õ', 'ö', 'ú', 'ù', 'û', 'ü'),
        array('a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u'),
        strtolower($str)
    );
}

}