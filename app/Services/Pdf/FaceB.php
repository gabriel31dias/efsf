<?php

namespace App\Services\Pdf;

use Codedge\Fpdf\Fpdf\Fpdf;

class FaceB extends Fpdf {
  // Definir as constantes de margem
  const MARGIN_TOP = 12.5;
  const MARGIN_LEFT = 3;
  const MARGIN_BOTTOM = 13;
  const MARGIN_RIGHT = 2.5;

  // Definir as constantes de tamanho de coluna
  const COLUMN_WIDTH_1 = 102;
  const COLUMN_WIDTH_2 = 102.5;

  // Definir a altura do cartão
  const CARD_HEIGHT = 67.5;

  // Método para renderizar os cartões
  public function renderCards($processes) {
    // Definir a posição inicial na página
    $x = self::MARGIN_LEFT;
    $y = self::MARGIN_TOP;

    $this->SetFontSize(7);
    //$this->SetTextColor(125,0,125);
    // Loop para renderizar os cartões
    for ($i = 1; $i <= 8; $i++) {
      // Definir a posição do cartão na página
      $column_width = ($i % 2 == 0) ? self::COLUMN_WIDTH_2 : self::COLUMN_WIDTH_1;

     /*  $this->SetXY($x, $y);
      $this->Cell($column_width, self::CARD_HEIGHT, "", 1, 1); */
      $citizen = $processes[$i-1]->citizen;
      /* RG */
      $this->setXY($x+15,$y+9);
      $this->Cell($column_width, 2, $citizen->rg);

      /* VIA */
      $this->setXY($x+40,$y+9);
      $this->Cell($column_width, 2, "2ª Via");

      /* VIA */
      $this->setXY($x+67,$y+9);
      $this->Cell($column_width, 2, date('d/m/Y'));


      /* NOME SOCIAL */
      $this->setXY($x+10,$y+14);
      $this->Cell($column_width, 2, $citizen->name);

      /* NOME */
      $this->setXY($x+5,$y+18);
      $this->Cell($column_width, 2, $citizen->name_social);

      /* FILIACOES */
      $this->setXY($x+5,$y+24);
      $this->MultiCell($column_width, 4, $citizen->filiations_text_print);

      /* NATURALIDADE */
      $this->setXY($x+5,$y+35);
      $this->Cell($column_width, 2, $citizen->county->name . "-" . $citizen->uf->acronym);


      /* DATA DE NASCIMENTO */
      $this->setXY($x+72,$y+35);
      $this->Cell($column_width, 2, \Carbon\Carbon::createFromFormat('Y-d-m', $citizen->birth_date)->format('d/m/Y'));

      /* CERTIDAO DADOS */
      $this->setXY($x+10,$y+40);
      $this->MultiCell($column_width-30, 4, "CART. NAS. 00511601552010100558261026181130, CART.JUCA,MACAPÁ-AP,17/09/2014");

          
      /* DATA DE NASCIMENTO */
      $this->setXY($x+18,$y+50);
      $this->Cell($column_width, 2, $citizen->cpf);

      /* PIS/NIS/ETC */
      $this->setXY($x+50,$y+50);
      $this->Cell($column_width, 2, 'PIS/PASEP ' . $citizen->n_social);


      /* INFO QUE NAO SEI  */
      $this->setXY($x+72,$y+55);
      $this->Cell($column_width, 2,"1834841-2/443");
      

      // Verificar se precisa deslocar para a próxima linha
      if ($i % 2 == 0) {
        $x = self::MARGIN_LEFT;
        $y += self::CARD_HEIGHT;
      } else {
        $x += $column_width;
      }
      
    }
  }
  public function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link=''){
    $txt = utf8_decode($txt);
    parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
 }

  // Método para definir as margens da página
  public function SetMargem() {
    $this->SetMargins(self::MARGIN_LEFT, self::MARGIN_TOP, self::MARGIN_RIGHT);
    $this->SetAutoPageBreak(true, self::MARGIN_BOTTOM);
  }
}

?>