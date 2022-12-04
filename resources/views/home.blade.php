@extends('layouts.app')

@section('content')
<div class="container ">


    <div  class="page-body">
        <div style="margin-left:20%" class="container-xl">
          <div class="row row-deck row-cards">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                    <div class="col-lg-12">

                    <div class="input-icon">
                        <input type="text" value="" class="form-control form-control-rounded h-12 placeholder:text-gray-500" placeholder="Busca Rapida...">
                        <span class="input-icon-addon">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="10" cy="10" r="7"></circle><line x1="21" y1="21" x2="15" y2="15"></line></svg>
                        </span>
                      </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="row row-cards">
                            <div class="col-lg-4">
                              <div class="card card-md hover:shadow-lg hover:scale-105 bg-yellow-400 rounded-lg text-gray-100">
                                <div class="card-body">
                                  <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="">
                                            <i class="ti ti-user-check text-gray-100" style="font-size:70px !important"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                      <div class="font-bold text-3xl">
                                        120
                                      </div>

                                    </div>
                                    <div class="text-xl">
                                        Atendimentos
                                       </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card card-md hover:shadow-md hover:scale-105 hover:resize- bg-blue-800 rounded-lg text-gray-100">
                                  <div class="card-body">
                                    <div class="row align-items-center">
                                      <div class="col-auto">
                                          <div class="">
                                              <i class="ti ti-id text-gray-100" style="font-size:70px !important"></i>
                                          </div>
                                      </div>
                                      <div class="col">
                                        <div class="font-bold text-3xl">
                                          80
                                        </div>

                                      </div>
                                      <div class="text-xl">
                                        Identidades emitidas
                                       </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-4">
                                <div class="card card-md hover:shadow-md hover:scale-105 hover:resize- bg-sky-600 rounded-lg text-gray-100">
                                  <div class="card-body">
                                    <div class="row align-items-center">
                                      <div class="col-auto">
                                          <div class="">
                                              <i class="ti ti-user-check text-gray-100" style="font-size:70px !important"></i>
                                          </div>
                                      </div>
                                      <div class="col">
                                        <div class="font-bold text-3xl">
                                          70
                                        </div>

                                      </div>
                                      <div class="text-xl">
                                        Processo em Análise
                                       </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          </div>
                    </div>



                    </div>

                </div>

                

            </div>
        </div>
      </div>



    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if (session('updatePass'))
    <div class="alert alert-warning">{{ session('updatePass') }}</div>
    @endif


</div>
@endsection
