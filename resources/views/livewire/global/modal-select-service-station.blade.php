<div>
    <div x-data="{ modal: @entangle('modal') }">
        <div class="nav-link px-0">
            <button href="#" x-data="{ id: 'modal-change-service' }" x-on:click="modal=true" class="nav-link d-flex lh-1 " data-bs-toggle="dropdown" aria-label="Open user menu">
               <i class="ti ti-building-arch text-gray-600"></i>
            </button>
        </div>
        <section :class="{ 'absolute h-screen flex items-center justify-center': modal }">
            <div class="fixed inset-0 z-10 flex flex-col items-center justify-end overflow-y-auto bg-gray-600 bg-opacity-50 sm:justify-start"
                x x-show="modal" x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <div class="w-full px-2 py-20 transition-all transform sm:max-w-2xl" role="dialog" aria-modal="true"
                    aria-labelledby="modal-headline" x-show="modal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4" x-on:click.away="modal=false">
                    <div class="bg-white rounded-md w-full h-full shadow-sm p-3">
                        <h1 class="text-lg font-black text-gray-600 mb-4">Alterar Posto de Atendimento </h1>

                        <div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Posto de Atendimento</label>
                                        <livewire:users.servicestation-select user_stations_only="true" :defaultValue="$serviceStation" />
                                    </div>
                                </div>

                                <div class="flex justify-end mt-4">
                                    <button type="button" x-on:click="modal = false"
                                        class="text-white bg-gray-500 hover:bg-gray-600 
                                        hover:text-white focus:ring-4 font-medium rounded-lg 
                                          text-sm p-2.5 text-center inline-flex items-center mr-2">Cancelar</button>

                                    <button type="button" wire:click="changeServiceStationSession"
                                        class="text-white bg-blue-500 hover:bg-blue-600 
                                        hover:text-white focus:ring-4 font-medium rounded-lg 
                                          text-sm p-2.5 text-center inline-flex items-center mr-2">Trocar Posto</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </section>
    </div>
</div>
