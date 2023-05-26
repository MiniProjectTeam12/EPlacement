const passwordInput = document.getElementById("password");
const passwordError = document.getElementById("password-error");

passwordInput.addEventListener("input", () => {
  const passwordValue = passwordInput.value.trim();
  const passwordPattern = /^[a-zA-Z0-9]{6,}$/;

  if (!passwordPattern.test(passwordValue)) {
    passwordError.textContent =
      "Password must be at least 6 characters and contain only letters and numbers.";
  } else {
    passwordError.textContent = "";
  }
});

const fileInput = document.getElementById("photo-upload");
const uploadMessage = document.getElementById("upload-message");

fileInput.addEventListener("change", () => {
  const file = fileInput.files[0];
  if (file) {
    uploadMessage.textContent = "Photo uploaded successfully!";
  } else {
    uploadMessage.textContent = "";
  }
});
