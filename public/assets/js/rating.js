const first = document.getElementById('first-star');
const second = document.getElementById('second-star');
const thir = document.getElementById('thir-star');
const fourth = document.getElementById('fourth-star');
const fifth = document.getElementById('fifth-star');
let isFirstOnClick = false;
let isSecondOnClick = false;
let isThirOnClick = false;
let isFourthOnClick = false;
let isFifthOnClick = false;
first.onclick = () => {
  if(isFirstOnClick){
    first.innerHTML = `<i class="bi bi-star"></i>`;
    second.innerHTML = `<i class="bi bi-star"></i>`;
    thir.innerHTML = `<i class="bi bi-star"></i>`;
    fourth.innerHTML = `<i class="bi bi-star"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isFirstOnClick = false;
  }else {
    first.innerHTML = `<i class="bi bi-star-fill"></i>`;
    second.innerHTML = `<i class="bi bi-star"></i>`;
    thir.innerHTML = `<i class="bi bi-star"></i>`;
    fourth.innerHTML = `<i class="bi bi-star"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isFirstOnClick = true;
    isSecondOnClick = false;
    isThirOnClick = false;
    isFourthOnClick = false;
    isFifthOnClick = false;
  }
}
second.onclick = () => {
  if(isSecondOnClick){
    first.innerHTML = `<i class="bi bi-star"></i>`;
    second.innerHTML = `<i class="bi bi-star"></i>`;
    thir.innerHTML = `<i class="bi bi-star"></i>`;
    fourth.innerHTML = `<i class="bi bi-star"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isSecondOnClick = false;
  }else {
    first.innerHTML = `<i class="bi bi-star-fill"></i>`;
    second.innerHTML = `<i class="bi bi-star-fill"></i>`;
    thir.innerHTML = `<i class="bi bi-star"></i>`;
    fourth.innerHTML = `<i class="bi bi-star"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isFirstOnClick = false;
    isSecondOnClick = true;
    isThirOnClick = false;
    isFourthOnClick = false;
    isFifthOnClick = false;
  }
}
thir.onclick = () => {
  if(isThirOnClick){
    first.innerHTML = `<i class="bi bi-star"></i>`;
    second.innerHTML = `<i class="bi bi-star"></i>`;
    thir.innerHTML = `<i class="bi bi-star"></i>`;
    fourth.innerHTML = `<i class="bi bi-star"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isThirOnClick = false;
  }else {
    first.innerHTML = `<i class="bi bi-star-fill"></i>`;
    second.innerHTML = `<i class="bi bi-star-fill"></i>`;
    thir.innerHTML = `<i class="bi bi-star-fill"></i>`;
    fourth.innerHTML = `<i class="bi bi-star"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isFirstOnClick = false;
    isSecondOnClick = false;
    isThirOnClick = true;
    isFourthOnClick = false;
    isFifthOnClick = false;
  }
}
fourth.onclick = () => {
  if(isFourthOnClick){
    first.innerHTML = `<i class="bi bi-star"></i>`;
    second.innerHTML = `<i class="bi bi-star"></i>`;
    thir.innerHTML = `<i class="bi bi-star"></i>`;
    fourth.innerHTML = `<i class="bi bi-star"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isFourthOnClick = false;
  }else {
    first.innerHTML = `<i class="bi bi-star-fill"></i>`;
    second.innerHTML = `<i class="bi bi-star-fill"></i>`;
    thir.innerHTML = `<i class="bi bi-star-fill"></i>`;
    fourth.innerHTML = `<i class="bi bi-star-fill"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isFirstOnClick = false;
    isSecondOnClick = false;
    isThirOnClick = false;
    isFourthOnClick = true;
    isFifthOnClick = false;
  }
}
fifth.onclick = () => {
  if(isFifthOnClick){
    first.innerHTML = `<i class="bi bi-star"></i>`;
    second.innerHTML = `<i class="bi bi-star"></i>`;
    thir.innerHTML = `<i class="bi bi-star"></i>`;
    fourth.innerHTML = `<i class="bi bi-star"></i>`;
    fifth.innerHTML = `<i class="bi bi-star"></i>`;
    isFifthOnClick = false;
  }else {
    first.innerHTML = `<i class="bi bi-star-fill"></i>`;
    second.innerHTML = `<i class="bi bi-star-fill"></i>`;
    thir.innerHTML = `<i class="bi bi-star-fill"></i>`;
    fourth.innerHTML = `<i class="bi bi-star-fill"></i>`;
    fifth.innerHTML = `<i class="bi bi-star-fill"></i>`;
    isFirstOnClick = false;
    isSecondOnClick = false;
    isThirOnClick = false;
    isFourthOnClick = false;
    isFifthOnClick = true;
  }
}