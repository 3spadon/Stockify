function spawnError(error,field) {
  document.getElementById('messageErreur').removeAttribute('hidden');
  document.getElementById('messageErreur').innerHTML=error;
  document.getElementById('messageErreur').style.color="darkred";
  document.getElementById(field).style.borderColor="red";
}

function checkForm(){

    var str = document.getElementById('password').value;
    var strBis = document.getElementById('passwordBis').value;

    if (str.length>=8 && str.match( /[A-Z]/g) && str.match(/[a-z]/g)) {
      document.getElementById('messageErreurPassword').setAttribute('hidden','true');
      document.getElementById("password").style.borderColor="#28a745";
      document.getElementById("password").style.backgroundImage = "url('img/valide.svg')";
      if(str==strBis){
        document.getElementById('messageErreurPassword').setAttribute('hidden','true');
        document.getElementById("password").style.borderColor="#28a745";
        document.getElementById("password").style.backgroundImage = "url('img/valide.svg')";
        document.getElementById("passwordBis").style.borderColor="#28a745";
        document.getElementById("passwordBis").style.backgroundImage = "url('img/valide.svg')";
        document.forms['inscriptionForm'].submit();
      }
      else{
        document.getElementById('messageErreurPassword').removeAttribute('hidden');
        document.getElementById("password").style.backgroundImage = "url('img/cross.svg')";
        document.getElementById("password").style.borderColor="#dc3545";
        document.getElementById("passwordBis").style.backgroundImage = "url('img/cross.svg')";
        document.getElementById("passwordBis").style.borderColor="#dc3545";
        document.getElementById('messageErreurPassword').innerHTML="Les mots de passe ne correspondent pas, veuillez entrer deux mots de passe identiques.";
        const element = document.querySelector('form');
        element.addEventListener('submit', event => {
          event.preventDefault();
          // actual logic, e.g. validate the form
          console.log('Form submission cancelled.');
        });
      }
    }
    else{
      document.getElementById('messageErreurPassword').removeAttribute('hidden');
      document.getElementById("password").style.backgroundImage = "url('img/cross.svg')";
      document.getElementById("password").style.borderColor="#dc3545";
      document.getElementById('messageErreurPassword').innerHTML="Le mot de passe ne correspond pas aux critières requis.";
      const element = document.querySelector('form');
      element.addEventListener('submit', event => {
        event.preventDefault();
        // actual logic, e.g. validate the form
        console.log('Form submission cancelled.');
      });
    }

    //document.forms['myform'].submit();
}

document.getElementById("btnValiderInscription").addEventListener('click',checkForm);
