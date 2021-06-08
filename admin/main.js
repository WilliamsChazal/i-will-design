document.getElementById('submit').addEventListener('click',  (event)=>{
    let password = document.getElementById('input-password').value;
    let confirmation = document.getElementById('input-confirmation').value;
    console.log(password); 
    console.log(confirmation);
        if(password != confirmation) /* Si password est différent de confirmation */{
            document.getElementById('error').innerHTML='Les mots de passe ne sont pas identiques'; 
            document.getElementById('error').style.color ='red';
            event.preventDefault();
        } else{

        }
});

