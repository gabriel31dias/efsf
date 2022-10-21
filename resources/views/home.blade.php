@extends('layouts.app')

@section('content')
<div class="container">
    
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if (session('updatePass'))
    <div class="alert alert-warning">{{ session('updatePass') }}</div>
    @endif

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

        <div class="col-4">
            <div  style="" class="bg-white shadow-xl overflow-hidden rounded-lg ml-10 mt-8 text-gray-900 font-semibold text-center">
                <div class="flex items-center justify-around px-4 py-6">
                  <button class="p-2 rounded-md bg-blue-200 text-blue-600">
                    <svg class="w-4 h-4 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"></path></svg>
                  </button>
                  <div class="text-lg">Outubro, 2022</div>
                  <button class="p-2 rounded-md bg-blue-200 text-blue-600">
                    <svg class="w-4 h-4 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                  </button>
                </div>
                <div class="grid grid-cols-7 grid-col-dense grid-rows-6 p-6 gap-1">
                  <div class="text-blue-600">Segunda</div>
                  <div class="text-blue-600">Terca</div>
                  <div class="text-blue-600">Quarta</div>
                  <div class="text-blue-600">Quinta</div>
                  <div class="text-blue-600">Sexta</div>
                  <div class="text-blue-600">Sabado</div>
                  <div class="text-blue-600">Domingo</div>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">27</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">28</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">29</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">30</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">1</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">2</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">3</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">4</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">5</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">6</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">7</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">8</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">9</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">10</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">11</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">12</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">13</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">14</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">15</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">16</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">17</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">18</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">19</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">20</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">21</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">22</a>
                  <a href="#" class="hover:bg-blue-600 rounded-md p-2 bg-blue-500 text-white">23</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">24</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">25</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">26</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">27</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">28</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">29</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">30</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2">31</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">1</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">2</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">3</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">4</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">5</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">6</a>
                  <a href="#" class="hover:bg-blue-100 rounded-md p-2 text-gray-500">7</a>
                </div>
              </div>
        </div>

    </div>
</div>
@endsection
