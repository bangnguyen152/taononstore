console.log("helllo")
const modalSearch = document.querySelector('.modal-search');
const searchBtn = document.querySelector('.nav-btn__search');
const closeSearchBtn = document.querySelector('.search-close');
searchBtn.addEventListener('click', () => {
    modalSearch.classList.remove('hidden')
})
closeSearchBtn.addEventListener('click', () => {
    modalSearch.classList.add('hidden')
})
