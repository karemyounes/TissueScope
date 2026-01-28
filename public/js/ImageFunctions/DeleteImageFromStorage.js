export async function DeleteImageFromStorage(OldImage) {

    let NewForm = new FormData()

    NewForm.append('path',OldImage)

    const secResponce = await fetch('/DeleteImages',{
        method: 'POST',
        headers: {
            //'X-CSRF-TOKEN': '{{ csrf_token() }}'
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: NewForm,
    })
}