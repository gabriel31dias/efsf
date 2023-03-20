<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Cadastro
                    </div>
                    <h2 class="page-title">
                        Unidades/PCA
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a wire:click="save" class="btn btn-primary items-center inline-flex">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg
                                class="hidden lg:block"
                                xmlns="http://www.w3.org/2000/svg"
                                input-group-append
                                class="icon"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Salvar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Nome<span class="error_tag"> *</span></label>
                                <div class="input-group input-group-flat">
                                    <input wire:model="fields.name" maxlength="70" type="text" class="form-control" autocomplete="off" />
                                </div>
                                @error('fields.name') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div  class="col-lg-3">
                            <label class="form-label">Sigla<span class="error_tag"> *</span></label>
                            <div class="input-group input-group-flat">
                                <input wire:model="fields.acronym" maxlength="70" type="text" class="form-control" autocomplete="off" />
                            </div>
                        </div>

                        <div class="container-fluid card">
                            <div class="col-sm-6 mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" wire:model="textFunction" placeholder="Digite a função/cargo" aria-label="Recipient's username" aria-describedby="basic-addon2" />
                                    <div class="input-group-append">
                                        <a wire:click="AddFunction" class="btn btn-primary items-center inline-flex">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg
                                                class="hidden lg:block"
                                                xmlns="http://www.w3.org/2000/svg"
                                                input-group-append
                                                class="icon"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                fill="none"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><button class="table-sort" data-sort="sort-name">Função/cargo</button></th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @foreach ($functions as $item)
                                        <tr>
                                            <td class="sort-name">
                                                @if($rowEdit == $item)
                                                    <input type="text" class="form-control" wire:model="currentEditValue" placeholder="Digite a função/cargo">
                                                @else
                                                    {{$item}}
                                                @endif
                                            </td>
                                            <td>

                                                @if($rowEdit)
                                                    <button  wire:click="saveNewValue('{{$item ?? null}}', '{{$fields["id"] ?? null }}')"  type="button" class="bg-green text-blue-700 border-2 border-blue-700 hover:bg-blue-700
                                                    hover:text-white focus:ring-4 font-medium rounded-lg
                                                    text-sm p-2.5 text-center inline-flex items-center mr-2" x-data="{id:'modal-edit-registry'}"
                                                    x-on:click="modal=true">
                                                    <i class="ti ti-device-floppy"></i>
                                                    </button>
                                                @else
                                                    <button  wire:click="setEditingRow('{{$item ?? null}}')"  type="button" class="text-blue-700 border-2 border-blue-700 hover:bg-blue-700
                                                    hover:text-white focus:ring-4 font-medium rounded-lg
                                                    text-sm p-2.5 text-center inline-flex items-center mr-2" x-data="{id:'modal-edit-registry'}"
                                                    x-on:click="modal=true">
                                                    <i class="ti ti-pencil"></i>
                                                    </button>
                                                @endif




                                                <button wire:click="destroy_unit('{{$item ?? null}}', '{{$fields["id"] ?? null }}' )" x-on:click="modal=true" class="text-decoration-none hover:cursor-pointer text-red-700 border-2 border-red-700 hover:bg-red-700
                                                hover:text-white focus:ring-4 font-medium rounded-lg
                                                  text-sm p-2.5 text-center inline-flex items-center mr-2 ">
                                            <i class="ti ti-trash"></i>
                                                </button></td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
