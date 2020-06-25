function spawnError(error,field) {
  document.getElementById('messageErreur').removeAttribute('hidden');
  document.getElementById('messageErreur').innerHTML=error;
  document.getElementById('messageErreur').style.color="darkred";
  document.getElementById(field).style.borderColor="red";
  if(field=="passwordBis"){
    document.getElementById("password").style.borderColor="red";
  }
}

function checkForm(){
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var zip = document.getElementById('zip').value;
    var password = document.getElementById('password').value;
    var passwordBis = document.getElementById('passwordBis').value;

    if((firstName.match(/[\W]/))||(firstName.length==0)){
      document.getElementById('messageErreurDetailsUtilisateur').removeAttribute('hidden');
      document.getElementById('messageErreurDetailsUtilisateur').innerHTML="Le champ prénom n'est pas correctement rempli.";
      document.getElementById("firstName").style.backgroundImage = "url('img/cross.svg')";
      document.getElementById("firstName").style.borderColor="#dc3545";
      const element = document.querySelector('form');
      element.addEventListener('submit', event => {
        event.preventDefault();
        // actual logic, e.g. validate the form
        console.log('Form submission cancelled due to first name.');
      });
    }
    else{
      document.getElementById('messageErreurDetailsUtilisateur').setAttribute('hidden','true');
      document.getElementById("firstName").style.borderColor="#28a745";
      document.getElementById("firstName").style.backgroundImage = "url('img/valide.svg')";
      if((lastName.match(/[\W]/))||(lastName.length==0)){
        document.getElementById('messageErreurDetailsUtilisateur').removeAttribute('hidden');
        document.getElementById('messageErreurDetailsUtilisateur').innerHTML="Le champ nom n'est pas correctement rempli.";
        document.getElementById("lastName").style.backgroundImage = "url('img/cross.svg')";
        document.getElementById("lastName").style.borderColor="#dc3545";
        const element = document.querySelector('form');
        element.addEventListener('submit', event => {
          event.preventDefault();
          // actual logic, e.g. validate the form
          console.log('Form submission cancelled due to last name.');
        });
      }
      else{
        document.getElementById('messageErreurDetailsUtilisateur').setAttribute('hidden','true');
        document.getElementById("lastName").style.borderColor="#28a745";
        document.getElementById("lastName").style.backgroundImage = "url('img/valide.svg')";
        if((zip.match(/[\W]/))||(zip.length==0)){
          document.getElementById('messageErreurDetailsUtilisateur').removeAttribute('hidden');
          document.getElementById('messageErreurDetailsUtilisateur').innerHTML="Le champ code postal n'est pas correctement rempli.";
          document.getElementById("zip").style.backgroundImage = "url('img/cross.svg')";
          document.getElementById("zip").style.borderColor="#dc3545";
          const element = document.querySelector('form');
          element.addEventListener('submit', event => {
            event.preventDefault();
            // actual logic, e.g. validate the form
            console.log('Form submission cancelled due to zipCode.');
          });
        }
        else{
          document.getElementById('messageErreurDetailsUtilisateur').setAttribute('hidden','true');
          document.getElementById("zip").style.borderColor="#28a745";
          document.getElementById("zip").style.backgroundImage = "url('img/valide.svg')";
          if((password.length==0)||(passwordBis.length==0)){
            document.getElementById('messageErreurPassword').removeAttribute('hidden');
            document.getElementById("password").style.backgroundImage = "url('img/cross.svg')";
            document.getElementById("password").style.borderColor="#dc3545";
            document.getElementById("passwordBis").style.backgroundImage = "url('img/cross.svg')";
            document.getElementById("passwordBis").style.borderColor="#dc3545";
            document.getElementById('messageErreurPassword').innerHTML="Au moins l'un des champs mots de passe est vide.";
            const element = document.querySelector('form');
            element.addEventListener('submit', event => {
              event.preventDefault();
              // actual logic, e.g. validate the form
              console.log('Form submission cancelled due to empty password field(s).');
            });
          }
          else{
            if (password.length>=8 && password.match( /[A-Z]/g) && password.match(/[a-z]/g)) {
              document.getElementById('messageErreurPassword').setAttribute('hidden','true');
              document.getElementById("password").style.borderColor="#28a745";
              document.getElementById("password").style.backgroundImage = "url('img/valide.svg')";
              if(password==passwordBis){
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
                  console.log('Form submission cancelled due to not matching password.');
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
                console.log('Form submission cancelled due to password not compliant.');
              });
            }
          }
        }
      }
    }
}

document.getElementById("btnValiderInscription").addEventListener('click',checkForm);
