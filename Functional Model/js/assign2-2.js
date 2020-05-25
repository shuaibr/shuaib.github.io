var na = document.querySelector("#form");
 var textInputs = document.querySelectorAll(".iform1");
na.addEventListener("submit", function(event){
  event.preventDefault();
  inputCheck();
});


var array =[document.querySelector("input[name='firstname']"),
  document.querySelector("input[name='lastname']"),
  document.querySelector("input[name='email']"),
  document.querySelector("input[name='password']"),
  document.querySelector("input[name='pass_repeat']"),
  document.querySelector("input[name='Address']"),
  document.querySelector("input[name='city']"),
  document.querySelector("input[name='state']"),
  document.querySelector("input[name='zip']"),
  document.querySelector("input[name='Birthday']"),
  document.querySelector("input[name='Phone']")];

  var namerica = document.getElementById("namerica");
  var eu = document.getElementById("eu");
  var samerica = document.getElementById("samerica");
  var conts = document.getElementById("cont")
  var radiodiv = document.getElementById("radiodiv");
  var checkbox = document.getElementById("checkbox");
  var checkboxdiv = document.getElementById("checkboxdiv");
  var agreebutton = document.getElementById("agreebutton");
  var eudiv = document.getElementById("eudiv");
  var checkboxdiv2 = document.getElementById("checkboxdiv2");

function inputCheck() {
  for(i=0; i<array.length; i++){
    if(array[i].value == ""){
      empty(array[i]);
    } else {
      filled(array[i]);
    }
    if(!samerica.checked && !namerica.checked && !eu.checked){
      empty(conts);
    }else{
      conts.style.background = "green";
      filled(conts);
    }
  }
}
function empty(shuaib) {
//    alert(_src);
  shuaib.style.backgroundColor= "pink";
  shuaib.style.borderColor = "red";
  shuaib.style.backgroundImage = "url('images/error.png')";
  shuaib.style.backgroundRepeat = "repeat-y";
  shuaib.style.backgroundPosition = "right";
}

function filled(shuaib){
  shuaib.style.backgroundColor= "white";
  shuaib.style.borderColor = "";
  shuaib.style.backgroundImage = "";
}
