// Get NavBar Btns Container
const nav = document.getElementById('btns');

// Add Event To Entire document when CLick Out Side Nav Btns Container Close All Menus
document.addEventListener('click',function (event) {
    if(!nav.contains(event.target)) {
        // Get All Drop Downs
        let Btns = document.querySelectorAll('.menu');
        // Loop All menus and display none all 
        Btns.forEach(b => b.style.display = 'none');
    }
});


function dropDown ($id) {
    // Get All Drop Downs
    let Btns = document.querySelectorAll('.menu');

    // Get Specific btn To View It 
    let Btn = document.getElementById($id);

    // Save Btn Display
    let status = Btn.style.display

    // Loop All menus and display none all 
    Btns.forEach(b => b.style.display = 'none')

    if (status == 'flex') {
        Btn.style.display = 'none';
    } else {
        Btn.style.display = 'flex' ;
    }
}