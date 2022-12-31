usersList = document.querySelector(".users-list"),
billDoneBtn=usersList.querySelector(".check-bill");

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/bill_list.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
              usersList.innerHTML = data;
          }
      }
    }
    xhr.send();
  }, 500);




  billDoneBtn.onclick = ()=>{   //DONE BUTTON IN BILLS
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/bill_paid.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                console.log(data)
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