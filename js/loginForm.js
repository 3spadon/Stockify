function spawnError(error,color) {
  document.getElementById('underLoginFormMessage').removeAttribute('hidden');
  document.getElementById('underLoginFormMessage').innerHTML=error;
  document.getElementById('underLoginFormMessage').style.color=color;
  document.getElementsByClassName('navbar')[0].style.padding="1.7rem 1rem";
  document.getElementsByClassName('navbar')[0].style.paddingTop="0.6rem";
  document.getElementsByClassName('navbar')[0].style.paddingBottom="1.8rem";


}
