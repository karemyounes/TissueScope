// create new form data to add image inside to send to backend
export async function SaveImageInStorage(Image , Path) {
    let formData = new FormData();

    // append image to form data
    formData.append('image',Image)

    // append file that image save inside
    formData.append('path', Path)

    // send request to save image function to save image inside
    // To show it inside avatar
    const responce = await fetch('/SaveImages',{
        method: 'POST',
        headers: {
           // 'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData,
    })

    if(!responce.ok) {
        console.log('bad responce');
    }

    const result = await responce.json();

    return result;
}

// create new form data to add image inside to send to backend
// async function SaveImageInStorage() {
//     let formData = new FormData();

//     // append image to form data
//     formData.append('image',RealImage)

//     // append file that image save inside
//     formData.append('path','Brands')

//     // send request to save image function to save image inside
//     // To show it inside avatar
//     const responce = await fetch('/SaveImages',{
//         method: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': '{{ csrf_token() }}'
//         },
//         body: formData,
//     })

//     if(!responce.ok) {
//         console.log('bad responce');
//     }

//     const result = await responce.json();

//     return result;
// }