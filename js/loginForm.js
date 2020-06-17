function spawnError(error) {
  document.getElementById('err').removeAttribute('hidden');
  document.getElementById('err').innerHTML=error;
  document.getElementById('err').style.color=red;
  document.getElementById('login').style.height='240px';
}
