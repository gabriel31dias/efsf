<div wire:ignore.self data-keyboard="false" data-backdrop="static" wire:ignore.self
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
         <div style="text-align: center" class="modal-body" wire:ignore.self>

            <a style="display: none; margin:1%" id="capturar" onclick=""  class="btn btn-primary " class="btn btn-primary inline-flex">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera" width="24" height="24"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path>
                  <circle cx="12" cy="13" r="3"></circle>
               </svg>
               Capturar foto
            </a>


            <a style="display: none; margin:1%" id="capturar-novamente"  onclick="  $('#capturar-novamente').hide();$('#capturar').hide(); $('#video').show(); $('#capturar').show() ; $('#canvas').hide(); "  class="btn btn-primary " class="btn btn-primary inline-flex">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-history-toggle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 8v4l3 3"></path>
                    <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"></path>
                    <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"></path>
                    <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"></path>
                    <path d="M8.56 20.31a9 9 0 0 0 3.44 .69"></path>
                    <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"></path>
                    <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"></path>
                    <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"></path>
                    <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"></path>
                 </svg>
                Capturar novamente
             </a>

            <a id="start-camera"  onclick="$('#image-preview').hide();$('#video').show() ;$('#capturar').show() ;$('#anexar').hide();$('#start-camera').hide();setupStartCaptureImage();" class="btn btn-primary inline-flex">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-smile" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="9"></circle>
                <line x1="9" y1="10" x2="9.01" y2="10"></line>
                <line x1="15" y1="10" x2="15.01" y2="10"></line>
                <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
             </svg>
               Captura Facial
            </a>

            <a id="anexar" wire:change="addFileCapture();showLoadingPhoto()"  onclick="$('#file-capture-image').trigger('click'); "  class="btn btn-primary inline-flex">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                  <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
               </svg>
               Anexar
            </a>

            <a  onclick="saveImageFacial()" id="salvar-captura"  class="btn btn-success" class="btn btn-primary inline-flex">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                    <circle cx="12" cy="14" r="2"></circle>
                    <polyline points="14 4 14 8 8 8 8 4"></polyline>
                 </svg>
                Salvar
            </a>


            <img id="image-preview" style="margin: 1%" src="{{$file_capture_image_preview}}">

            <!-- input imagem anexo -->
            <input  style="display: none"  wire:model="file_capture_image" name="file-capture-image" type="file"  id="file-capture-image">
            <!-- input imagem capturada via camera tranformada em string pós a captura -->
            <input  style="display: none" wire:model="file_capture_image_string" name="file-capture-image_string" type="text"  id="file-capture-image_string">

            <div class="cssbox">
                <canvas  style="display: none" id="canvas" width="1000" height="600"></canvas>
            </div>


            <video style="display: none" width="100%" height="100%"  id="video" width="320" height="240" autoplay></video>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>


