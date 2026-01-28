import {SaveImageInStorage} from  './SaveImageInStorage.js' 
import {DeleteImageFromStorage} from  './DeleteImageFromStorage.js'

let OldImage = '' ;

let path = window.Path.path

image.onchange = async function () {

    // get image input by id
    let Image = document.getElementById('image');

    // get the file that i upload
    let RealImage = Image.files[0];

    // get the avatar to put selected image inside 
    let Avatar = document.getElementById('Avatar');

    // check if there is file or no
    if(RealImage && RealImage.type.substr(0,5) == 'image'){

        let result = await SaveImageInStorage(RealImage , path)

        if(OldImage) {
            await DeleteImageFromStorage(OldImage)
        }
        
        // send image path to img tag src to show
        Avatar.src = '/storage/' + result

        OldImage = result

        Avatar.style.display = 'block'
        let Alert = document.getElementById('alert')
        Alert.style.display = 'none'

        let ImagePath = document.getElementById('path')
        ImagePath.setAttribute('value',result);
    }else {

        if( RealImage && RealImage.type.substr(0,5) != 'image' ) {
            let Alert = document.getElementById('alert')
            Alert.style.display = 'block'
        }

        image.value = ''
        Avatar.removeAttribute('src')
        Avatar.style.display = 'none'
        if(OldImage) {
            await DeleteImageFromStorage(OldImage)
        }
        ImagePath.removeAttribute('value');
}

}