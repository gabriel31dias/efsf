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
                    Bloqueio de Certidão
                </h2>
             </div>
             <!-- Page title actions -->
             <div class="col-12 col-md-auto  ms-auto d-print-none">
                <div class="btn-list">
               @if ($action == 'update')
                  @livewire('global.delete-button', ['objectModel' => $blockedCertificate, 'redirectBack' => true, 'permission' => 'blocked.delete'])
                @endif
                   <a wire:click="saveRegistry" class="btn btn-primary items-center inline-flex  ">
                      <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                      <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
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
                           <label class="form-label">Cartório<span class="error_tag">*</span></label>
                            @livewire('registry-select.registry-select', ['defaultValue' => $blockedCertificate])
                           @error('fields.registry_id') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Nº do Livro<span class="error_tag">*</span></label>

                            <div class="input-group input-group-flat">
                                <input wire:model="fields.book_number" type="number" min="0" class="form-control" autocomplete="off">
                            </div>
                        @error('fields.book_number') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Letra do livro<span class="error_tag">*</span></label>

                            <div class="input-group input-group-flat">
                              <select wire:model="fields.book_letter" class="form-select"
                                 aria-label="Default select example">
                                 <option value="" selected disabled>Selecione...</option>
                                 @foreach (BlockedCertificate::BOOK_LETTERS as $value)
                                 <option value="{{ $value }}">{{ $value }}</option>
                                 @endforeach
                              </select>
                           </div>
                        @error('fields.book_letter') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Nº da Folha<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.sheet_number" type="number" min="0" class="form-control" autocomplete="off">
                           </div>
                           @error('fields.sheet_number') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-2">
                        <div class="mb-3">
                           <label class="form-label">Lado<span class="error_tag">*</span></label>

                            <div class="input-group input-group-flat">
                              <select wire:model="fields.sheet_side" class="form-select"
                                 aria-label="Default select example">
                                 <option value="" selected disabled>Selecione...</option>
                                 <option value="Frente">Frente</option>
                                 <option value="Verso">Verso</option>
                              </select>
                           </div>
                        @error('fields.sheet_side') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                     <div class="col-lg-3">
                        <div class="mb-3">
                           <label class="form-label">Nº do termo<span class="error_tag"> *</span></label>
                           <div class="input-group input-group-flat">
                              <input wire:model="fields.registry_number" type="text" min="0" class="form-control" autocomplete="off">
                           </div>
                           @error('fields.registry_number') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>
                     </div>

                  <div class="col-lg-12">
                     <div class="mb-3">
                        <label class="form-label">OBSERVAÇÃO</label>
                        <div class="input-group input-group-flat">
                           <textarea wire:model="fields.note"
                              class="form-control" autocomplete="off" required maxlength="500"> </textarea>
                        </div>
                        @error('fields.note') <span class="text-danger"> {{ $message }}</span> @enderror
                     </div>
                  </div>
                </div>

             </div>
          </div>

    </div>
 </div>
