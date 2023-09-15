
@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
  </head>
  <body>
   <div class="page-wrapper ">
    <div class="container-fluid ">
      <h1 class="display-6 fw-bold text-primary mb-4">Consulta</h1>
      <form class="row g-2 mb-4">
        <div class="col-lg-2">
          <label for="inputCPF" class="form-label">CPF</label>
          <input type="text" class="form-control" id="inputPassword2" />
        </div>

        <div class="col-lg-2">
          <label for="inputRG" class="form-label">RG</label>
          <input type="text" class="form-control" id="inputRG" />
        </div>

        <div class="col-lg-4">
          <label for="inputRG" class="form-label">Nome cidadão</label>
          <input type="text" class="form-control" id="inputRG" />
        </div>

        <div style="margin-top: 20px" class="col-auto">
          <button type="submit" class="btn btn-primary mt-3">
            <i class="bi bi-search"></i> Pesquisar
          </button>

          <button type="submit" class="btn btn-primary mt-3">
            Pesquisa avançada
          </button>

          <button type="submit" class="btn btn-primary mt-3">
            <span class="bi-plus"></span> Cadastrar
          </button>
        </div>
      </form>

      <br>
      <br>
        
      <div class="d-flex align-items-center box-filter">
        <form class="row g-2 mb-4 col-lg-9 p-2 border  border-4">
        <div class="col-lg-6">
          <label for="inputRG" class="form-label">Nomes anteriores</label>
          <input type="text" class="form-control" id="inputRG" />
        </div>

        <div class="col-lg-6">
          <label for="inputRG" class="form-label">Filiações (dados básicos)</label>
          <input type="text" class="form-control" id="inputRG" />
        </div>

        <div class="col-lg-6">
          <label for="inputRG" class="form-label">Data de nascimento</label>
          <input type="text" class="form-control" id="inputRG" />
        </div>

        <div class="col-lg-6">
          <label for="inputRG" class="form-label">Nomes social</label>
          <input type="text" class="form-control" id="inputRG" />
        </div>
      </form>

      <div class="col-lg-3 p-4">
        <p class="text-danger">Consulta avançada</p>
      </div>
      </div>


      <table class="table align-middle">
  <thead>
    <tr>
      <th scope="col">Nome do cidadão</th>
      <th scope="col">RG</th>
      <th scope="col">CPF</th>
      <th scope="col">Filiação</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Banco</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Gabriel Dias Oliveira</td>
      <td>23.897.458-5</td>
      <td>623.564.982-90</td>
      <td class="text-center">Ronaldo Názario ferreira <br> Orlanda ferreira da silva</td>
      <td>28/07/2017</td>
      <td>Acervo antigo</td>
      <td>Entregue</td>
    </tr>
    <tr>
      <td>Gabriel Dias Oliveira</td>
      <td>23.897.458-5</td>
      <td>623.564.982-90</td>
      <td class="text-center">Ronaldo Názario ferreira <br> Orlanda ferreira da silva costa</td>
      <td>28/07/2017</td>
      <td>SIC Atual</td>
      <td>Entregue</td>
    </tr>
    <tr>
      <td>Gabriel Dias Oliveira</td>
      <td>23.897.458-5</td>
      <td>623.564.982-90</td>
      <td class="text-center">Ronaldo Názario ferreira <br> Orlanda ferreira da silva</td>
      <td>28/07/2017</td>
      <td>Acervo antigo</td>
      <td>Atualizado</td>
    </tr>
  </tbody>
</table>
    </div>
 </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
   

@endsection

