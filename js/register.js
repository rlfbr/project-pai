let showPass = () => {
     if (document.getElementById('password-input').type === "password") {
          document.getElementById('password-input').type = "text"
     } else {
          document.getElementById('password-input').type = "password"
     }
}