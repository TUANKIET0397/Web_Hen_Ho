const form = document.querySelector(".signup form"),
eventBtn = form.querySelector(".eventButton"),
errorText = form.querySelector(".error-text");

const password = document.querySelector("#pass");
const confirm = document.querySelector("#confirmPass");

form.onsubmit = (e) => {

    e.preventDefault();
}

eventBtn.onclick = () => {

    if (confirm.value !== password.value) {
        errorText.textContent = "Mật khẩu không khớp!";
        errorText.style.display = "block"; // Hiển thị lỗi
        return; // Dừng quá trình đăng ký nếu sai
    } else {
        errorText.style.display = "none"; // Ẩn lỗi nếu đúng
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./assets/php/signup.php", true);
    xhr.onload = () => { 
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response.trim();
                if (data === "success") {
                    location.href="index.php";
                } else {
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            } 
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}


