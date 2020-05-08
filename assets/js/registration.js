const container = document.getElementById('container');
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');

signUpButton.addEventListener('click', () => {container.classList.add('right-panel-active');});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});

const btnSgnUp = document.getElementById('crt-acc');
const btnSgnIn  = document.getElementById('enter');
const btnOut  = document.getElementById('log_out');

btnSgnUp.addEventListener('click', signUp);
btnSgnIn.addEventListener('click', signIn);
btnOut.addEventListener('click', signOut);

  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDgRiquuf6dKVp-fKJ4Rm_VpK5VmdUt_-g",
    authDomain: "webapp-builder-273411.firebaseapp.com",
    databaseURL: "https://webapp-builder-273411.firebaseio.com",
    projectId: "webapp-builder-273411",
    storageBucket: "webapp-builder-273411.appspot.com",
    messagingSenderId: "842554051486",
    appId: "1:842554051486:web:cbaf6f479e3385e824248f"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  const auth = firebase.auth();

  function signUp(){
		
    var email = document.getElementById("reg-id");
    var password = document.getElementById("reg-pas");
    const promise = auth.createUserWithEmailAndPassword(email.value, password.value);
    promise.catch(e => alert(e.message));
    alert("Signed Up");
    window.location.href = "after_registration.html";
}


function signIn(){
    
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    
    const promise = auth.signInWithEmailAndPassword(email.value, password.value);
    promise.catch(e => alert(e.message));   
}

function signOut(){
		
    auth.signOut();
    alert("Signed Out");
    window.location.href = "start.html";
    
}


auth.onAuthStateChanged(function(user){  
    if(user){
        var email = user.email;
        alert("Active User " + email);
        
        window.location.href = "after_registration.html";
        
    }else{
        alert("No Active User");
        //no user is signed in
    }
})
