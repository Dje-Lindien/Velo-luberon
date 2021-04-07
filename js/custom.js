var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementsByClassName("navbar").style.top = "0";
  } else {
    document.getElementsByClassName("navbar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
// } 


// // Pour masquer la division :
// document.getElementById("formulaire").style.display = none;
// // /Pour afficher la division :
// document.getElementById("formulaire").style.display = block;


//  Scroll haut de page 
document.addEventListener('DOMContentLoaded', function() {
  window.onscroll = function(ev) {
    document.getElementById("cRetour").className = (window.pageYOffset > 100) ? "cVisible" : "cInvisible";
  };
});



// Onclick search-icon 
let togg1 = document.getElementById("togg1");
// let togg2 = document.getElementById("togg2");
let d1 = document.getElementById("d1");
// let d2 = document.getElementById("d2");

  togg1.addEventListener("click", () => {
      if(getComputedStyle(d1).display != "none"){
          d1.style.display = "none";
      } else {
          d1.style.display = "block";
      }
  })


  // let click_cat = document.getElementById("click_cat");
  // let cats = document.getElementById("cats");

  //   click_cat.addEventListener("click", () => {
  //     if(getComputedStyle(cats).display != "none") {
  //       cats.style.display = "none";
  //     } else {
  //       cats.style.display = "block";
  //     }
  //   })

