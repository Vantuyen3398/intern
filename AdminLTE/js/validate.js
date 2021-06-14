function validateForm() {
  var x = document.forms["register"]["name"].value;
  var y = document.forms["register"]["email"].value;
  var z = document.forms["register"]["username"].value;
  var a = document.forms["register"]["password"].value;
  var b = document.forms["register"]["date"].value;
  var c = document.forms["register"]["avatar"].value;
  if (x == "" || y == "" || z == "" || a == "" || b == "" || c == "") {
    alert("Field must not be empty");
    return false;
  }
}

function validateCate(){
  var x = document.forms["category"]["name"].value;
  if(x == ""){
    alert("Field must not be empty");
    return false;
  }
}