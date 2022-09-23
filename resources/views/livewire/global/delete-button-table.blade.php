    <div x-data="{modal: @entangle('modal')}">
    <button  x-on:click="modal=true" class="text-decoration-none hover:cursor-pointer text-red-700 border-2 border-red-700 hover:bg-red-700 
    hover:text-white focus:ring-4 font-medium rounded-lg 
      text-sm p-2.5 text-center inline-flex items-center mr-2 ">
<i class="ti ti-trash"></i>
    </button>

    <section :class="{'absolute h-screen flex items-center justify-center': modal}">
        <div class="fixed inset-0 z-10 flex flex-col items-center justify-end overflow-y-auto bg-gray-600 bg-opacity-50 sm:justify-start"
            x x-show="modal"
            x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="w-full h-1/2 px-2 py-20 transition-all transform sm:max-w-2xl" role="dialog" aria-modal="true"
                aria-labelledby="modal-headline" x-show="modal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4" x-on:click.away="modal=false">
                <div class="bg-white rounded-md w-full h-full shadow-sm p-3 grid">
                    
                    <div class="flex justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-1/5 text-orange-400 mt-4"  fill="currentColor"  viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                      </svg>
                </div>
                <div class="flex justify-center">
                    <div class="font-black text-3xl text-gray-600">Atenção </div>
                </div>
                <div class="flex justify-center">
                    <div class="text-lg text-gray-600 text-center p-4 font-medium">Você esta preste a excluir um registro, esta ação não poderá ser desfeita, tem certeza ?</div>
                </div>

                    <div>

                                <div class="flex justify-center mt-2">
                                <button x-on:click="modal = false" class="text-white bg-gray-500 hover:bg-gray-600 
                                hover:text-white focus:ring-4 font-medium rounded-lg 
                                    text-sm p-2.5 text-center inline-flex items-center mr-2">Cancelar</button>

                                <button wire:click="delete" class="text-white bg-red-600 hover:bg-red-700 
                                hover:text-white focus:ring-4 font-medium rounded-lg 
                                    text-sm p-2.5 text-center inline-flex items-center mr-2">Apagar</button>
                                </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

