import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * adding removing class from dropdown list
 */
// let parents = document.querySelectorAll('.hasChild');
// parents.forEach(item => {
//     item.addEventListener("click",function(){
//         if(!item.classList.contains('open')){
//             item.classList.add('open');
//         }else{
//             item.classList.remove('open');
//         }
//     });
// });