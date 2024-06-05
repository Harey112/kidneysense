var container1 = document.getElementById('container1');
var otherContent = document.getElementById('other_content');
var uniForm = document.getElementById('uni_form');


var loginForm = '\
<div style="background-color: white; border-radius: 10px;">\
<img src="img/Chronic Kidney Disease Prediction System.png" alt="" srcset="">\
</div><br><br>\
<input type="text" name="username" id="login_username" placeholder="Username"><br>\
<input type="password" name="password" id="login_password" placeholder="Password"><br><br>\
<button type="button" onclick="loginAccount()">Login</button>\
<p id="message" style="font-size: small; color: red; height: 20px"></p>';


var registerForm = '\
<div>\
    <label>Lastname:</label><br>\
    <input type="text" name="lastname" id="reg_lastname">\
</div>\
<div>\
    <label>Firstname:</label><br>\
    <input type="text" name="fistname" id="reg_firstname">\
</div>\
<div>\
    <label>Middlename:</label><br>\
    <input type="text" name="middlename" id="reg_middlename">\
</div>\
<div>\
    <label>Username:</label><br>\
    <input type="text" name="username" id="reg_username">\
</div>\
<div style="width: 290px">\
    <label>Type:</label><br>\
    <select name="usertype" style="width: 280px; margin-left: 10px" id="reg_type">\
        <option value=""></option>\
        <option value="user">User</option>\
        <option value="admin">Admin</option>\
    </select>\
</div>\
<div>\
    <label>Password:</label><br>\
    <input type="password" name="username" id="reg_password">\
</div>\
<div>\
    <label>Confirm Password:</label><br>\
    <input type="password" name="username" id="reg_c_pass">\
</div>\
<button type="button" onclick="register()">Register</button>\
<p id="message" style="font-size: small; color: red; height: 20px"></p>\
';


var loginContent = '\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<h1 style="z-index: 1;">Login</h1>\
<p style="z-index: 1;">No Account? <span class="clickable_text" onclick="gotoRegister();">Register Here!</span></p>\
';


var registerContent = '\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<div class="circle"></div>\
<h1 style="z-index: 1;">Register</h1>\
<p style="z-index: 1;">Already have an account? Go to <span class="clickable_text" onclick="gotoLogin();"> login.</span></p>\
';

var container1Dimension = container1.getBoundingClientRect();
var uniFormDimension = uniForm.getBoundingClientRect();


otherContent.style.width = container1Dimension.width - uniFormDimension.width + "px";
otherContent.style.marginLeft = uniFormDimension.width+ 'px';
uniForm.innerHTML = loginForm;
otherContent.innerHTML = loginContent;


function gotoRegister(){
    uniForm.style.marginLeft = container1Dimension.width - uniFormDimension.width + "px";
    otherContent.style.marginLeft = '0px';
    setTimeout(()=>{
        uniForm.innerHTML = registerForm;
        otherContent.innerHTML = registerContent;
    }, 250);
}


function gotoLogin(){
    otherContent.style.width = container1Dimension.width - uniFormDimension.width + "px";
    otherContent.style.marginLeft = uniFormDimension.width+ 'px';
    uniForm.style.marginLeft = "0px"
    setTimeout(()=>{
        uniForm.innerHTML = loginForm;
        otherContent.innerHTML = loginContent;
    }, 250)
    
}



window.addEventListener('resize', function() {
    location.reload();
});


async function sleep(ms){
    return new Promise(resolve => setTimeout(resolve, ms));
}


function randomRange(min, max){
    return Math.floor(Math.random() * (max - min + 1)) + min;
}





async function animateCircles(){
    var otherContentDimension = otherContent.getBoundingClientRect();
        while(true){

        var circles = document.querySelectorAll('.circle');
        circles.forEach((circle)=>{
            var size = randomRange(10, 50);
            circle.style.width = size+'px';
            circle.style.height = size+'px';
            circle.style.opacity = randomRange(.5, 1);
            circle.style.margin = `${randomRange(-otherContentDimension.height, otherContentDimension.height)}px 0 0 ${randomRange(-otherContentDimension.width, otherContentDimension.width)}px`

        })
        await sleep(3000);
    }
}

setTimeout(()=>{animateCircles()}, 1000);

if(view === 'register'){
    gotoRegister();
}



