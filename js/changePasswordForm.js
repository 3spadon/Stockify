function spawnError(error) {
  //On supprime l'attribut 'hidden' masquant le message d'erreur (qui existe déjà)
  document.getElementById('message').removeAttribute('hidden');
  //On édite le contenu du message d'erreur avec l'erreur passée en paramètre
  document.getElementById('message').innerHTML=error;
  //On colore le message d'erreur en rouge foncé
  document.getElementById('message').style.color="darkred";
  if(error=="<b>Le nouveau mot de passe ne correspond pas au critères requis.</b>"){
  //On modifie le rappel des caractéristiques pour passer certaines parties en gras
  document.getElementById('passwordComplianceText').innerHTML="Pour rappel: votre mot de passe doit avoir une longueur d'<b>au moins 8 caractères</b>, contenir au <b>moins une majuscule</b> et <b>une minuscule</b>.";
  }
}

function cleanError(){
  //On cache le message d'erreur
  document.getElementById('message').setAttribute('hidden','true');
}

function spawnSuccess(message){
  //On supprime l'attribut 'hidden' masquant le message d'erreur (qui existe déjà)
  document.getElementById('message').removeAttribute('hidden');
  //On édite le contenu du message d'erreur avec l'erreur passée en paramètre
  document.getElementById('message').innerHTML=message;
  //On colore le message d'erreur en rouge foncé
  document.getElementById('message').style.color="darkgreen";
}

function checkForm(){
  //On attribue le contenu des champs à des variables plus simples à manipuler
  var oldPassword = document.getElementById("oldPassword").value;
  var newPassword = document.getElementById("newPassword").value;
  var newPasswordBis = document.getElementById("newPasswordBis").value;

  //-- Vérification champs vides --
  if(oldPassword.length==0){
    //On affiche un message d'erreur
    spawnError("<b>Le champ 'Mot de passe actuel' est vide.</b>");
    //On bloque l'envoi du formulaire
    const element = document.querySelector('form');
    element.addEventListener('submit', event => {
      event.preventDefault();
      // (pour la phase de développement) On affiche un message dans la console javascript du navigateur
      console.log('Form submission cancelled due to empty password field(s).');
    });
  }
  else{
    //On recache le message d'erreur
    cleanError();
    if(newPassword.length==0){
      //On affiche un message d'erreur
      spawnError("<b>Le champ 'Nouveau mot de passe' est vide.</b>");
      const element = document.querySelector('form');
      element.addEventListener('submit', event => {
        event.preventDefault();
        // (pour la phase de développement) On affiche un message dans la console javascript du navigateur
        console.log('Form submission cancelled due to empty password field(s).');
      });
    }
    else{
      //On recache le message d'erreur
      cleanError()
      if(newPasswordBis.length==0){
        //On affiche un message d'erreur
        spawnError("<b>Le champ 'Confirmer le mot de passe' est vide.</b>");
        //On bloque l'envoi du formulaire
        const element = document.querySelector('form');
        element.addEventListener('submit', event => {
          event.preventDefault();
          // (pour la phase de développement) On affiche un message dans la console javascript du navigateur
          console.log('Form submission cancelled due to empty password field(s).');
        });
      }
      else{
        cleanError();
        //-- Vérification du nouveau mot de passe --
        //Si le nv. mot de passe correspond au critères requis
        if (newPassword.length>=8 && newPassword.match( /[A-Z]/g) && newPassword.match(/[a-z]/g)) {
          if(newPassword==newPasswordBis){//Si les deux champs "nouveau mot de passe" sont bien identiques
            //On recache le message d'erreur
            cleanError();
            //On réactive le bouton de façon à ce que le formulaire soit envoyé puis traité
            document.getElementById("btnChangePassword").onclick="checkForm";
            //Au cas où on envoie le formulaire également en Javascript
            document.forms['changePasswordForm'].submit();
          }
          else{//Si les deux champs "nouveau mot de passe" ne sont pas identiques
            //On affiche un message d'erreur grâce à la fonction créée ci-dessus
            spawnError("Les deux nouveaux mot de passe ne sont pas identiques.");
            //On bloque l'envoi du formulaire
            const element = document.querySelector('form');
            element.addEventListener('submit', event => {
              event.preventDefault();
              // (pour la phase de développement) On affiche un message dans la console javascript du navigateur
              console.log('Form submission cancelled due to empty password field(s).');
            });
          }
        }
        else{ //Si le nv. mot de passe ne correspond pas au critères requis
          //On affiche un message d'erreur grâce à la fonction créée ci-dessus
          spawnError("<b>Le nouveau mot de passe ne correspond pas au critères requis.</b>");
          //On bloque l'envoi du formulaire
          const element = document.querySelector('form');
          element.addEventListener('submit', event => {
            event.preventDefault();
            // (pour la phase de développement) On affiche un message dans la console javascript du navigateur
            console.log('Form submission cancelled due to empty password field(s).');
          });
        }
        //-- Fin vérification du nouveau mot de passe --
      }
    }
  }
  //-- Fin vérification champs vides --
}
//Listener d'évenement, lorsque le bouton 'btnChangePassword' est cliqué on lance la fonction 'checkForm'
document.getElementById("btnChangePassword").addEventListener('click',checkForm);
