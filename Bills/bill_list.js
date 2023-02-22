usersList = document.querySelector(".users-list"),

function scrollToBottom(){
  usersList.scrollTop = usersList.scrollHeight;
}

usersList.scrollTo(0, usersList.scrollHeight);

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

