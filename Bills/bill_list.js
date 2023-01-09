usersList = document.querySelector(".users-list"),


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

function donee(){
  let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/bill_paid.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            console.log('DONEE');
          }
      }
    }
}

var btnn=document.querySelectorAll(".done");

for(var i=0;i< btnn.length; i++){
  btnn[i].addEventListener('click', donee);
}