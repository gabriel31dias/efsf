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
                        Assinaturas/Diretor
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">

                        <a wire:click="save" class="btn btn-primary items-center inline-flex">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" input-group-append
                                class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <label class="form-label">Nome Servidor<span class="error_tag"> *</span></label>
                                <div class="input-group input-group-flat">
                                    <livewire:users.users-select :defaultValue="$user" />
                                </div>
                                @error('fields.name')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label class="form-label">Cpf<span class="error_tag"> *</span></label>
                            <div class="input-group input-group-flat">
                                <input wire:model="cpf" maxlength="70" type="text" class="form-control"
                                    autocomplete="off" disabled />
                            </div>
                        </div>
                        <div style="margin-bottom: 10px" class=" container-fluid card">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tipo Anexo<span class="error_tag">
                                                {{ $attachmentType }} *</span></label>
                                        <select wire:model="attachmentType" class="form-control ps-0" wire:ignore="">
                                            <option value="0">Selecione</option>
                                            <option value="1">OFÍCIO</option>
                                            <option value="2">MEMORANDO</option>
                                            <option value="3">REQUERIMENTO</option>

                                        </select>
                                        @error('fields.name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Arquivo<span class="error_tag"> *</span></label>
                                        <div class="input-group input-group-flat">
                                            <input wire:model="file" id="file-input-other" type="file">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-1">
                                    <a style="margin-top: 13%" wire:click="addNewFile"
                                        class="btn btn-primary items-center inline-flex">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 5l0 14"></path>
                                            <path d="M5 12l14 0"></path>
                                         </svg>
                                    </a>
                                </div>


                            </div>
                        @foreach ($attachments as $key => $item)
                        <div style="margin-bottom: 10px" class=" container-fluid card">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tipo Anexo<span class="error_tag">
                                               *</span></label>
                                        <select wire:model="item.{{$key}}.type" value="1" class="form-control ps-0" >
                                            <option selected value="1">{{$typeFiles[$item['type']] ?? $item['type']}}</option>
                                        </select>
                                        @error('fields.name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Arquivo selecionado<span class="error_tag"> *</span></label>
                                        <div class="input-group input-group-flat">
                                            <a  wire:click="addNewFile"
                                            class="btn btn-primary items-center inline-flex">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                <path d="M14 4l0 4l-6 0l0 -4"></path>
                                             </svg>
                                             Download
                                        </a>

                                        <a  wire:click="addNewFile"
                                            class="btn btn-danger items-center inline-flex">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                <path d="M14 4l0 4l-6 0l0 -4"></path>
                                             </svg>
                                             Remover
                                        </a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                        @endforeach


                        <div class="container-fluid card">
                            <div class="col-sm-6 mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <a wire:click="goUnit" class="btn btn-primary items-center inline-flex">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                </path>
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                </path>
                                                <path d="M16 5l3 3"></path>
                                            </svg>

                                        </a>
                                    </div>
                                    <input type="text" class="form-control" wire:model="unit"
                                        placeholder="Unidade" aria-label="" aria-describedby="basic-addon2"
                                        disabled />
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><button class="table-sort" data-sort="sort-name">Função/cargo</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @foreach ($functions as $item)
                                        <tr>
                                            <td>
                                                {{ $item->name }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div wire:ignore style="margin-bottom: 1%" class="container-fluid card col-md-6 col-lg-6">
                            <div>
                                <div class="card-body p-4 text-center">

                                    <a href="#" class="d-block"><img id="preview-image"
                                            style="max-height: 400px; width: 100%"
                                            src="@if (isset($directorSign['file_signature'])) {{ '/storage/signatures/' . $directorSign['file_signature'] }} @else {{ '/pencil.jpg' }} @endif"
                                            class="card-img-top"></a>

                                </div>
                                <div class="d-flex">
                                    <a id="select-image-button" class="card-btn btn-primary ">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-file-plus" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path
                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                            </path>
                                            <path d="M12 11l0 6"></path>
                                            <path d="M9 14l6 0"></path>
                                        </svg>
                                        Anexar assiantura
                                    </a>
                                    <input wire:model="fileSign" style="display: none" id="file-input"
                                        type="file">

                                    <a onclick="downloadPreview()" class="card-btn btn-primary ">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-cloud-download" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4">
                                            </path>
                                            <path d="M12 13l0 9"></path>
                                            <path d="M9 19l3 3l3 -3"></path>
                                        </svg>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const selectImageButton = document.getElementById('select-image-button');
        const fileInput = document.getElementById('file-input');

        const previewImage = document.getElementById('preview-image');


        selectImageButton.addEventListener('click', () => {
            fileInput.click()
        });

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                previewImage.src = reader.result;
            });

            reader.readAsDataURL(file);
        });

        function downloadPreview() {
            var img = document.getElementById('preview-image');
            var canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);
            var dataURL = canvas.toDataURL('image/jpeg', 1.0);
            var link = document.createElement('a');
            link.href = dataURL;
            link.download = 'assinatura.png';
            link.click();
        }
    </script>
</div>
