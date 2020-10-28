var letters = /^[A-Za-z]+$/;
var numchar = /^[0-9a-zA-Z]+$/;
var numbers = /^[0-9]+$/;
var space = " ";
var err_code = [
  "letter_error",
  "letter_error",
  "email_error",
  "pass_length",
  "pass_match",
  "phone_error"
];
var err_text = [
  "Enter only letters for",
  "Enter only letters for",
  "Enter valid email format, example: user@hostname.com",
  "Use between 6 and 18 characters for your password",
  "Both your passwords should match!",
  "Please use valid phone format! ###-###-####"
];
var val_code = [];
var element = null;
var j_element = null;

var na = document.querySelector("#form");
var textInputs = document.querySelectorAll(".iform1");

var array = [
  document.querySelector("input[name='firstname']"),
  document.querySelector("input[name='lastname']"),
  document.querySelector("input[name='email']"),
  document.querySelector("input[name='password']"),
  document.querySelector("input[name='pass_repeat']"),
  document.querySelector("input[name='Address']"),
  document.querySelector("input[name='city']"),
  document.querySelector("input[name='state']"),
  document.querySelector("input[name='zip']"),
  document.querySelector("input[name='Birthday']"),
  document.querySelector("input[name='Phone']")
];

var namerica = document.getElementById("namerica");
var eu = document.getElementById("eu");
var samerica = document.getElementById("samerica");
var radiodiv = document.getElementById("radiodiv");
var checkbox = document.querySelector("input[type=checkbox]");
var checkboxdiv = document.getElementById("chkbox");
var errdiv = document.getElementById("errs");
var agreebutton = document.getElementById("agreebutton");
var eudiv = document.getElementById("eudiv");

na.addEventListener("submit", function(event) {
  event.preventDefault(event);

  for (i = 0; i < array.length; i++) {
    element = array[i];
    if (element.value == "") {
      //check empty
      var err_check = document.querySelector("#" + element.name) !== null;
      if (err_check == false) {
        //if not in err list
        error(element); //make red
        var errPara = document.createElement("p"); //create para element
        var errText = document.createTextNode(
          "You are missing " + element.name
        ); //add text to para
        errPara.setAttribute("id", element.name);
        errPara.appendChild(errText); //append child to para node
        errdiv.appendChild(errPara); //append node to div, which is parent
        // alert("Node length: " + errdiv.childNodes.length + " Actual i val: " + parseInt(i) + " i+3 val: " + parseInt(i+3));
        // err_val.push(i);
      }
    } else if (element.value != "") {
      valid(element);
      var err_check = document.querySelector("#" + element.name) !== null;
      if (err_check) {
        document.getElementById(element.name).remove();
      }
      console.log("Err_check: ", err_check, " val of i: ", i); //initialize query selector for element name as id

      validationCheck(element, i);
    }
  }
  // var cont = document.querySelector("continent");
  // if (cont.value === "") {
  //   console.log("cont is empty");
  // } else {
  //   console.log("cont is not empty");
  //   console.log("continent is: ", cont.value);
  // }

  if (checkbox.checked == false && val_code.indexOf("cb") == -1) {
    chkbox_error(checkboxdiv);
    var errPara = document.createElement("p"); //create para element
    var errText = document.createTextNode(
      "Please accept all terms and conditions"
    ); //add text to para
    errPara.setAttribute("id", "cb");
    errPara.appendChild(errText); //append child to para node
    errdiv.appendChild(errPara); //append node to div, which is parent
  } else if (checkbox.checked == true && val_code.indexOf("cb") > -1) {
    chkbox_valid(checkboxdiv);
    var err_check = document.querySelector("#cb") !== null;
    if (err_check) {
      document.getElementById("cb").remove();
    }
  }

  if (errdiv.childNodes.length > 3) {
    errdiv.style.display = "block";
  } else if (errdiv.childNodes.length == 3) {
    errdiv.style.display = "none";
  }
});

function validationCheck(element, i) {
  if (i == 0 || i == 1) {
    char_spaceCheck(element, i);
  } else if (i == 2) {
    emailCheck(element);
  } else if (i == 3) {
    passLenCheck(element);
  } else if (i == 4) {
    passMatch(element);
  } else if (i == 10) {
    numCheck(element);
  }
}

function char_spaceCheck(element, x) {
  j_element = element.value;
  if (j_element.match(letters) == null && j_element.match(space) == null) {
    error(element);
    if (val_code.indexOf(x) == -1) {
      val_code.push(x);
      var errPara = document.createElement("p"); //create para element
      var errText = document.createTextNode(err_text[x] + " " + array[x].name); //add text to para
      errPara.setAttribute("id", err_code[x] + x);
      errPara.appendChild(errText); //append child to para node
      errdiv.appendChild(errPara); //append node to div, which is parent
    }
  } else if (
    j_element == "" ||
    (j_element.match(letters) != null || j_element.match(space) != null)
  ) {
    valid(element);
    val_code[val_code.indexOf(x)] = "";
    if (
      val_code.indexOf(0) == -1 &&
      document.querySelector("#" + err_code[x] + x) != null
    ) {
      document.getElementById(err_code[x] + x).remove();
    } else if (
      val_code.indexOf(1) == -1 &&
      document.querySelector("#" + err_code[x] + x) != null
    ) {
      document.getElementById(err_code[x] + x).remove();
    }
  }
}

function emailCheck(element) {
  j_element = element.value;
  var at_index = j_element.indexOf("@");
  var dot_index = j_element.indexOf(".");
  var pre_at = j_element.substring(0, at_index);
  var btwn = j_element.substring(at_index + 1, dot_index);
  var post_dot = j_element.substring(dot_index + 1, j_element.length);

  if (
    (val_code.indexOf("email") == -1 && at_index >= dot_index) ||
    at_index == -1 ||
    dot_index == -1 ||
    pre_at.match(numchar) == null ||
    btwn.match(numchar) == null ||
    post_dot.match(letters) == null ||
    pre_at.length < 1 ||
    btwn.length < 1 ||
    post_dot.length < 1
  ) {
    error(element);
    if (val_code.indexOf("email") == -1) {
      val_code.push("email");
      var errPara = document.createElement("p"); //create para element
      var errText = document.createTextNode(err_text[2]); //add text to para
      errPara.setAttribute("id", err_code[2]);
      errPara.appendChild(errText); //append child to para node
      errdiv.appendChild(errPara); //append node to div, which is parent
    }
  } else {
    valid(element);
    if (
      val_code.indexOf("email") != -1 &&
      document.querySelector("#" + err_code[2]) != null
    ) {
      document.getElementById(err_code[2]).remove();
      val_code[val_code.indexOf("email")] = "";
    }
  }
}

function numCheck(element) {
  j_element = element.value;
  var dash1 = j_element.indexOf("-");
  var dash2 = j_element.indexOf("-", dash1 + 1);
  var num1 = j_element.substring(0, dash1);
  var num2 = j_element.substring(dash1 + 1, dash2);
  var num3 = j_element.substring(dash2 + 1, j_element.length);

  if (
    dash1 == -1 ||
    dash2 == -1 ||
    num1.match(numbers) == null ||
    num2.match(numbers) == null ||
    num3.match(numbers) == null ||
    num1.length != 3 ||
    num2.length != 3 ||
    (num3.length != 4 && err_code.indexOf("phone") == -1)
  ) {
    error(element);
    if (val_code.indexOf("phone") == -1) {
      val_code.push("phone");
      var errPara = document.createElement("p"); //create para element
      var errText = document.createTextNode(err_text[5]); //add text to para
      errPara.setAttribute("id", err_code[5]);
      errPara.appendChild(errText); //append child to para node
      errdiv.appendChild(errPara); //append node to div, which is parent
    }
  } else {
    valid(element);
    if (
      val_code.indexOf("phone") != -1 &&
      document.querySelector("#" + err_code[5]) != null
    ) {
      document.getElementById(err_code[5]).remove();
      val_code[val_code.indexOf("phone")] = "";
    }
  }
}

function passLenCheck(element) {
  j_element = element.value;
  if (j_element.length < 6 || j_element.length > 18) {
    error(element);
    if (val_code.indexOf("passLen") == -1) {
      val_code.push("passLen");
      var errPara = document.createElement("p"); //create para element
      var errText = document.createTextNode(err_text[3]); //add text to para
      errPara.setAttribute("id", err_code[3]);
      errPara.appendChild(errText); //append child to para node
      errdiv.appendChild(errPara); //append node to div, which is parent
    }
  } else {
    valid(element);

    if (
      val_code.indexOf("passLen") != -1 &&
      document.querySelector("#" + err_code[3]) != null
    ) {
      document.getElementById(err_code[3]).remove();
      val_code[val_code.indexOf("passLen")] = "";
    }
  }
}

function passMatch(element) {
  j_element = element.value;
  if (array[3].value != array[4].value) {
    error(element);
    if (val_code.indexOf("passMatch") == -1) {
      val_code.push("passMatch");
      var errPara = document.createElement("p"); //create para element
      var errText = document.createTextNode(err_text[4]); //add text to para
      errPara.setAttribute("id", err_code[4]);
      errPara.appendChild(errText); //append child to para node
      errdiv.appendChild(errPara); //append node to div, which is parent
    }
  } else {
    valid(element);
    if (
      val_code.indexOf("passMatch") != -1 &&
      document.querySelector("#" + err_code[4]) != null
    ) {
      document.getElementById(err_code[4]).remove();
      val_code[val_code.indexOf("passMatch")] = "";
    }
  }
}

function chkbox_error(element) {
  element.style.padding = "5px 50px 10px 5px";
  element.style.backgroundColor = "pink";
  element.style.borderColor = "red";
  element.style.backgroundImage = "url('images/error.png')";
  element.style.backgroundRepeat = "no-repeat";
  element.style.backgroundPosition = "right";
  element.style.borderRadius = "4px";
  val_code.push("cb");
}

function chkbox_valid(element) {
  element.style.backgroundColor = "white";
  element.style.borderColor = "";
  element.style.backgroundImage = "";
  val_code[val_code.indexOf("cb")] = "";
}

function error(element) {
  element.style.backgroundColor = "pink";
  element.style.borderColor = "red";
  element.style.backgroundImage = "url('images/error.png')";
  element.style.backgroundRepeat = "no-repeat";
  element.style.backgroundPosition = "right";
}

function valid(element) {
  element.style.backgroundColor = "white";
  element.style.borderColor = "";
  element.style.backgroundImage = "";
}
