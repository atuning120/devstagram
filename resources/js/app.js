import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

Dropzone.autoDiscover= false;

if(document.querySelector('#dropzone')) {
    const dropzone= new Dropzone('#dropzone', {
        dictDefaultMessage: "Sube aqui tu imagen",
        acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp,.tiff",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar archivo",
        maxFiles: 1,
        uploadMultiple: false,


        init: function() {
            if(document.querySelector('input[name="imagen"]').value.trim()){
                const imagenPublicada= {};
                imagenPublicada.size=1234;
                imagenPublicada.name= document.querySelector('input[name="imagen"]').value;

                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

                imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
            }
        }
    });

    dropzone.on('success', function(file, response){
        document.querySelector('input[name="imagen"]').value= response.imagen;
    });

    dropzone.on('removedfile', function(){
        const inputImagen= document.querySelector('input[name="imagen"]');
        if(inputImagen){
            inputImagen.value= '';
        }
    });

    
}
