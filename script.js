const modals = document.querySelectorAll('.modal');
const closemodal =document.querySelectorAll('.close-Modal-btn');
const addRevenuBtn =document.querySelector('.Add-revenu-btn');
const addRevenuForm =document.querySelector('.Add-revenu-form');
const addExpencesBtn =document.querySelector('.Add-expences-btn');
const addExpencesForm =document.querySelector('.Add-expences-form');



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
addExpencesBtn.addEventListener('click',()=>{
        addExpencesForm.classList.remove('hidden');
})

closemodal.forEach((closemdl)=>{
    closemdl.addEventListener('click',(e)=>{
        const parentModal = closemdl.closest('.modal');
        if (parentModal) {
            parentModal.classList.add('hidden');
        }
    })
})

  const ctx = document.getElementById('LineChart');
  const dtx = document.getElementById('DonutChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(dtx, {
  type: 'doughnut',
  data : {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
},
  options: {
    rotation: -90,
    circumference: 180,
  }
})