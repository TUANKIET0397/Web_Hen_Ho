const login = document.querySelector(".login form"),
    eventBtn = login.querySelector(".btn-submit"),
    errorText = login.querySelector(".error-text");

login.onsubmit = (e) =>{
    e.preventDefault();
}

eventBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./assets/php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response.trim();
              if(data === "success"){
                location.href = "index.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(login);
    xhr.send(formData);
}