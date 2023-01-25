<!DOCTYPE html>
<html>
  <head>
    <style>
      /* CSS para estilizar o cabeçalho */
      header {
        margin: 0px;
        width: 100%;
        height: 30px;
        background-color: blue;
      }
    </style>
  </head>
  <body>
    <header>
    </header>
        @foreach ($features as $key => $item)
            {{ $features->{$key} }};
        @endforeach

        {{var_dump(professional_idents)}}
        @foreach ($filiations as $item)
            {{$item}} e
        @endforeach
    <!-- resto do conteúdo da página -->
  </body>
</html>
