let ld=document.querySelector(".ld"),
 bod=document.querySelector("body"),
 wrap=document.querySelector(".wrapper");
 let lMode=localStorage.getItem("LightMode");

const enableLight=()=>{
    ld.classList.add("light");
    bod.classList.add("light");
    // wrap.classList.add("light");

    localStorage.setItem('LightMode', 'enabled')
}


const disableLight=()=>{
    ld.classList.remove("light");
    bod.classList.remove("light");
    // wrap.classList.remove("light");

    localStorage.setItem('LightMode', 'disabled')
}

if(lMode==='enabled'){
    enableLight();
}

ld.onclick=(e)=>{
    lMode=localStorage.getItem("LightMode");
    if(lMode==='disabled'){
        enableLight();
    }else if(lMode==='enabled'){
        disableLight();
    }else{
        console.log(lMode);
    }

}


// ld.addEventListener("click", ()=>{
//     if(localStorage.getItem("theme")=="dark"){
//         localStorage.setItem("theme", "light");
//     }else{
//         localStorage.setItem("theme", "dark");
//     }
//     ld.classList.toggle("light");
//     bod.classList.toggle("light");
//     wrap.classList.toggle("light");
// })