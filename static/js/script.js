const graybox = document.querySelector(".formContainer");
//const submit = document.getElementById("submit")

function changeRegisterStatus() {
  const registrationMode = document.getElementsByClassName("register");
  const signUpMode = graybox.querySelector("#sign-up");
  const logInMode = graybox.querySelector("#log-in");

  registrationMode[0].classList.toggle("active");
  registrationMode[1].classList.toggle("active");

  if (registrationMode[0].classList.contains("active")) {
    signUpMode.style.display = "flex";
    logInMode.style.display = "none";
  } else {
    signUpMode.style.display = "none";
    logInMode.style.display = "flex";
  }
}

const passwordElement = document.querySelectorAll("#password");

function displayPasswordStatus() {
  console.log("inside function")
  passwordElement.forEach(element => {
    const password = element.value;
    const error = element.parentElement.querySelector(".error-password");
    console.log(error);
    element.addEventListener("blur", function () {
      if (password.length > 14) {
        error.innerHTML = "password must have less than 15 characters";
        error.style.color = "red";
        console.log("long")
      } else if (password.length < 8) {
        error.innerHTML = "password must have more than 7 characters";
        error.style.color = "red";
        console.log("short")
      } else {
        error.innerHTML = "you're good to go";
        error.style.color = "green";
        console.log("good")
      }
    });
  });
}

const checkBox = document.querySelector("#show-password");

checkBox.addEventListener("click", function () {
  const passwordStatus =
    checkBox.parentElement.parentElement.querySelector("#password");

  if (checkBox.checked) {
    passwordStatus.type = "text";
  } else {
    passwordStatus.type = "password";
  }
});
