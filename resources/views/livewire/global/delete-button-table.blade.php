    <div x-data="{modal: @entangle('modal')}">
    <button  x-on:click="modal=true" class="text-decoration-none hover:cursor-pointer text-red-700 border-2 border-red-700 hover:bg-red-700 
    hover:text-white focus:ring-4 font-medium rounded-lg 
      text-sm p-2.5 text-center inline-flex items-center mr-2 ">
<i class="ti ti-trash"></i>
    </button>

    <div data-keyboard="false" data-backdrop="static"  wire:ignore.self :class="{'show block': modal}" class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div data-backdrop="static" class="modal-dialog modal-lg modal-dialog-centered" role="document">
           <div class="modal-content shadow-md">
              <div class="modal-header">
                 <h5 class="modal-title">Apagar Registro</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="text-lg text-gray-600 text-center p-4 font-medium">Você esta preste a excluir um registro, esta ação não poderá ser desfeita, tem certeza ?</div>
            </div>
              <div class="modal-footer">
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

