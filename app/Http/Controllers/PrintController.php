<?php

namespace App\Http\Controllers;

use App\Services\Pdf\FaceB;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('print.index');
    }

    public static function printFaceB($processes){ 
          // Criar um novo objeto CardPDF
          $pdf = new FaceB();

          // Definir as margens da página
          $pdf->SetMargem();
  
          // Adicionar uma nova página
          $pdf->AddPage();
  
          // Definir a fonte e o tamanho do texto
          $pdf->SetFont('Arial', '', 12);
  
          // Renderizar os cartões
          $pdf->renderCards($processes);
  
          // Gerar o PDF
          $output = $pdf->Output("S");
          return $output;
    }
}
