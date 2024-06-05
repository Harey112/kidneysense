function loginAccount(){

    var username = document.getElementById('login_username').value;
    var password = document.getElementById('login_password').value;
    var message = document.getElementById("message");

    let user = JSON.stringify({'username': username, 'password': password});
    
    let params = {
        method: "POST",
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        },
        body: user
      };
    
      fetch("util_functions/login.php", params)
      .then(response => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then(data => {
        console.log(data.message);
        if(data.success === true){
          message.style.color = 'white';
          setTimeout(()=>{
            window.location.href = 'home.php';
          }, 500);
        }else{
          message.style.color = 'red';
        }
        
        message.innerText = data.message;
        
      })
      .catch(error => {
        console.error(error.code+": "+error.message);
        message.style.color = 'red';
        message.innerText = error.message;
      });
    
}
