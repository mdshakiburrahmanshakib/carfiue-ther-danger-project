function showPassword() {
    var x = document.getElementById("signInPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }