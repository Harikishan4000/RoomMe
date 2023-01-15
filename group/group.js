const form = document.querySelector(".group form"),
continueBtn = form.querySelector(".button.join input"),
createBtn = form.querySelector(".button.create input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}


continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "add_user.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="../users.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }

          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);

}

createBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "new_grp.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="../users.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }

          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);

}
