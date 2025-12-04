const modals = document.querySelectorAll('.modal');
const closemodal =document.querySelectorAll('.close-Modal-btn');
const addRevenuBtn =document.querySelector('.Add-revenu-btn');
const addRevenuForm =document.querySelector('.Add-revenu-form');



modals.forEach((mdl)=>{
    mdl.addEventListener('click',(e)=>{
        if(e.target.classList.contains('modal')){
            mdl.classList.add('hidden');
        }
    })
})


addRevenuBtn.addEventListener('click',()=>{
        addRevenuForm.classList.remove('hidden');
})

closemodal.forEach((closemdl)=>{
    closemdl.addEventListener('click',(e)=>{
        const parentModal = closemdl.closest('.modal');
        if (parentModal) {
            parentModal.classList.add('hidden');
        }
    })
})