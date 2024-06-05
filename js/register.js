function register() {
  var lastname = document.getElementById("reg_lastname").value;
  var firstname = document.getElementById("reg_firstname").value;
  var middlename = document.getElementById("reg_middlename").value;
  var usertype = document.getElementById("reg_type").value;
  var username = document.getElementById("reg_username").value;
  var password = document.getElementById("reg_password").value;
  var c_password = document.getElementById("reg_c_pass").value;
  var message = document.getElementById("message");

  var user = JSON.stringify({
    lastname: lastname,
    firstname: firstname,
    middlename: middlename,
    usertype: usertype,
    username: username,
    password: password,
    c_password: c_password
  });


  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8"
    },
    body: user
  };


  if(!(lastname == '' || firstname == '' || middlename ==  '' || usertype == '' || username == '' || password == '')){

          fetch("util_functions/register.php", params)
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
  }else{
    message.style.color = 'red';
    message.innerText = "Please fill all requirements."
  }

}