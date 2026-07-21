/* ==========================================
        TECHSPACE JAVASCRIPT
=========================================== */



/* ==========================================
        LUCIDE ICONS
=========================================== */


lucide.createIcons();







/* ==========================================
        PREMIUM MOBILE NAVIGATION
=========================================== */


const menuToggle =
document.querySelector(".menu-toggle");


const navMenu =
document.querySelector(".nav-menu");



if(menuToggle && navMenu){


    menuToggle.addEventListener("click",()=>{


        navMenu.classList.toggle("active");


        menuToggle.classList.toggle("open");



        const icon =
        menuToggle.querySelector("i");



        if(menuToggle.classList.contains("open")){


            icon.setAttribute(
            "data-lucide",
            "x"
            );


        }

        else{


            icon.setAttribute(
            "data-lucide",
            "menu"
            );


        }



        lucide.createIcons();


    });




    // Close menu after clicking a link

    document.querySelectorAll(".nav-menu a")
    .forEach(link=>{


        link.addEventListener("click",()=>{


            navMenu.classList.remove("active");


            menuToggle.classList.remove("open");


        });


    });



}



/* ==========================================
        NAVBAR SCROLL EFFECT
=========================================== */


const header = document.querySelector(".header");



window.addEventListener("scroll",()=>{


    if(window.scrollY > 50){


        header.classList.add("scrolled");


    }

    else{


        header.classList.remove("scrolled");


    }


});








/* ==========================================
        ACTIVE NAVIGATION
=========================================== */


const sections = document.querySelectorAll("section");



window.addEventListener("scroll",()=>{


    let current="";



    sections.forEach(section=>{


        const sectionTop = section.offsetTop - 150;


        const sectionHeight = section.clientHeight;



        if(
            scrollY >= sectionTop &&
            scrollY < sectionTop + sectionHeight
        ){

            current = section.getAttribute("class");

        }


    });



    navLinks.forEach(link=>{


        link.classList.remove("active");



        if(
            link.getAttribute("href")
            .includes(current)
        ){

            link.classList.add("active");

        }


    });


});







/* ==========================================
        SCROLL REVEAL ANIMATION
=========================================== */


const revealElements =
document.querySelectorAll(
".program-card, .path-card, .project-card, .feature-card"
);



const revealObserver =
new IntersectionObserver(
(entries)=>{


    entries.forEach(entry=>{


        if(entry.isIntersecting){


            entry.target.classList.add("show");


        }


    });


},
{

    threshold:.15

});





revealElements.forEach(element=>{


    revealObserver.observe(element);


});







/* ==========================================
        FOOTER YEAR
=========================================== */


const year =
document.querySelector(".footer-bottom p");



if(year){


    year.innerHTML =
    `© ${new Date().getFullYear()} TechSpace. All Rights Reserved.`;


}







/* ==========================================
        BUTTON RIPPLE EFFECT
=========================================== */


const buttons =
document.querySelectorAll(".btn");



buttons.forEach(button=>{


    button.addEventListener(
        "click",
        function(e){


            const ripple =
            document.createElement("span");


            ripple.classList.add("ripple");


            this.appendChild(ripple);



            setTimeout(()=>{


                ripple.remove();


            },600);



        }
    );


});
/* ==========================================
        STATISTICS COUNTER
=========================================== */


const statNumbers =
document.querySelectorAll(".stat-card h2");


let statsStarted = false;



function startCounter(){


    if(statsStarted)
    return;



    statNumbers.forEach(number=>{


        let target =
        parseInt(number.innerText);



        let count = 0;



        let speed =
        target / 80;



        function update(){


            count += speed;



            if(count < target){


                number.innerText =
                Math.floor(count);



                requestAnimationFrame(update);


            }

            else{


                number.innerText =
                target + "+";


            }


        }



        update();


    });



    statsStarted=true;


}




const statsSection =
document.querySelector(".stats");



if(statsSection){


window.addEventListener("scroll",()=>{


    let position =
    statsSection.getBoundingClientRect().top;



    if(position <
    window.innerHeight - 100){


        startCounter();


    }


});


}







/* ==========================================
        SCROLL PROGRESS BAR
=========================================== */


const progressBar =
document.createElement("div");


progressBar.className =
"scroll-progress";


document.body.appendChild(progressBar);



window.addEventListener("scroll",()=>{


let scrollTop =
document.documentElement.scrollTop;



let height =
document.documentElement.scrollHeight -
document.documentElement.clientHeight;



progressBar.style.width =
(scrollTop / height) * 100 + "%";


});







/* ==========================================
        BACK TO TOP BUTTON
=========================================== */


const backTop =
document.createElement("button");


backTop.innerHTML="↑";


backTop.className="back-top";


document.body.appendChild(backTop);



window.addEventListener("scroll",()=>{


if(window.scrollY > 500){


backTop.classList.add("show");


}

else{


backTop.classList.remove("show");


}


});



backTop.onclick=()=>{


window.scrollTo({

top:0,

behavior:"smooth"

});


};







/* ==========================================
        HERO FLOATING EFFECT
=========================================== */


const heroImage =
document.querySelector(".hero-image");



if(heroImage){


heroImage.classList.add("floating");


}







/* ==========================================
        CARD TILT EFFECT
=========================================== */


const cards =
document.querySelectorAll(
".program-card, .path-card, .project-card, .feature-card"
);



cards.forEach(card=>{


card.addEventListener("mousemove",(e)=>{


let box =
card.getBoundingClientRect();



let x =
e.clientX - box.left;



let y =
e.clientY - box.top;



let rotateY =
(x - box.width/2) / 20;



let rotateX =
(box.height/2 - y) / 20;



card.style.transform = `

perspective(800px)

rotateX(${rotateX}deg)

rotateY(${rotateY}deg)

scale(1.03)

`;



});




card.addEventListener("mouseleave",()=>{


card.style.transform="";


});


});





console.log(
"TechSpace Enhancement Loaded 🚀"
);