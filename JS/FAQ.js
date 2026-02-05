const faq=document.querySelectorAll(".faq");

faq.forEach((faq)=>{
    faq.addEventListener("click",()=>{
        faq.classList.toggle("active");
    }); 

});

 
