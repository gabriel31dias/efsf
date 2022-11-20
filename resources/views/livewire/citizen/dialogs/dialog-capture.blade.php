<div data-keyboard="false" data-backdrop="static" wire:ignore.self
   class="modal modal-blur fade" id="modal-captura-facial" tabindex="-1"
   role="dialog" aria-hidden="true">
   <div data-backdrop="static"
      class="modal-dialog modal-lg modal-dialog-centered"
      role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Modal Captura</h5>
            <button type="button" class="btn-close"
               data-bs-dismiss="modal"
               aria-label="Close"></button>
         </div>
         <div style="text-align: center" class="modal-body">

            <a style="display: none; margin:1%" id="capturar"  class="btn btn-primary " class="btn btn-primary inline-flex">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera" width="24" height="24"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path>
                  <circle cx="12" cy="13" r="3"></circle>
               </svg>
               Captura foto
            </a>


            <a style="display: none; margin:1%" id="capturar-novamente"  onclick="$('#video').show(); $('#capturar').show() ; $('#canvas').hide(); "  class="btn btn-primary " class="btn btn-primary inline-flex">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera" width="24" height="24"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path>
                   <circle cx="12" cy="13" r="3"></circle>
                </svg>
                Capturar novamente
             </a>

            <a onclick="downloadImage()" style="display: none; margin:1%" id="salvar-captura"  class="btn btn-primary " class="btn btn-primary inline-flex">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera" width="24" height="24"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path>
                   <circle cx="12" cy="13" r="3"></circle>
                </svg>
                Salvar
            </a>

            <a id="start-camera"  onclick="$('#video').show() ;$('#capturar').show() ;$('#anexar').hide();$('#start-camera').hide();setupStartCaptureImage();" class="btn btn-primary inline-flex">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera" width="24" height="24"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path>
                  <circle cx="12" cy="13" r="3"></circle>
               </svg>
               Captura Facial
            </a>

            <a id="anexar" wire:change="addFileCapture();"  onclick="$('#file-capture-image').trigger('click'); "  class="btn btn-primary inline-flex">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                  <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
               </svg>
               Anexar
            </a>

            <input  style="display: none"  wire:model="file_capture_image" name="file-capture-image" type="file"  id="file-capture-image">
            <div class="cssbox">
                <canvas style="display: none" id="canvas" width="1000" height="600"></canvas>
            </div>


            <video style="display: none" width="100%" height="100%"  id="video" width="320" height="240" autoplay></video>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>


