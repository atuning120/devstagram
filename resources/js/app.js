import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

Dropzone.autoDiscover= false;

const dropzone= new Dropzone('#dropzone', {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp,.tiff",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,
})

dropzone.on('sending', function(file, xhr, formData){
    console.log('Enviando imagen al servidor');
});

dropzone.on('success', function(file, response){
    console.log(response);
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on('error', function(file, message){
    console.log(message);
}
);

dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = "";
}); 
