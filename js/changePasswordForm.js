function spawnError(error,field) {
  document.getElementById('messageErreur').removeAttribute('hidden');
  document.getElementById('messageErreur').innerHTML=error;
  document.getElementById('messageErreur').style.color="darkred";
  document.getElementById(field).style.borderColor="red";
  if(field=="passwordBis"){
    document.getElementById("newPassword").style.borderColor="red";
  }
}

function checkForm(){
  var password = document.getElementById("password").value;
  var newpassword = document.getElementById("newPassword").value;
  var newPasswordBis = document.getElementById("newPasswordbis").value;

  //-- Vérification champs vides --
  if(password.length==0){
    spawnError("Le champ 'Mot de passe actuel' est vide.","password");
    const element = document.querySelector('form');
    element.addEventListener('submit', event => {
      event.preventDefault();
      // actual logic, e.g. validate the form
      console.log('Form submission cancelled due to empty password field(s).');
    });
  }
  else{
    if(newPassword.length==0){
      const element = document.querySelector('form');
      element.addEventListener('submit', event => {
        event.preventDefault();
        // actual logic, e.g. validate the form
        console.log('Form submission cancelled due to empty password field(s).');
      });
    }
    else{
      if(newPasswordBis.length==0){
        const element = document.querySelector('form');
        element.addEventListener('submit', event => {
          event.preventDefault();
          // actual logic, e.g. validate the form
          console.log('Form submission cancelled due to empty password field(s).');
        });
      }
    }
  }
  //-- Fin vérification champs vides --

  if (newPassword.length>=8 && newPassword.match( /[A-Z]/g) && newPassword.match(/[a-z]/g)) {

  }
  else{
    spawnError("Le nouveau mot de passe ne correspond pas au critères requis.","newPasswordBis");
    const element = document.querySelector('form');
    element.addEventListener('submit', event => {
      event.preventDefault();
      // actual logic, e.g. validate the form
      console.log('Form submission cancelled due to empty password field(s).');
    });
  }
}

document.getElementById("btnValiderInscription").addEventListener('click',checkForm);
