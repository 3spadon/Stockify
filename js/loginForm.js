function spawnError(error,color) {
  document.getElementById('underLoginFormMessage').removeAttribute('hidden');
  document.getElementById('underLoginFormMessage').innerHTML=error;
  document.getElementById('underLoginFormMessage').style.color=color;
}
