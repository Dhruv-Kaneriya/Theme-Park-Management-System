password = document.getElementsById("password");
confirm_password = document.getElementsById("confirm_password");
password_match = document.getElementById("password_match");

function validatePassword() {
  console.log(password);
  if (password.value === confirm_password.value) {
    return true;
  }
  password_match.className = "flex justify-center text-sm text-orange-900";
  return false;
}
