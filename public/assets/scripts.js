AOS.init();

// window.onscroll = function () {
//     scrollFunction();
//     navMobileHome();
// };

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.padding = "15px 25px";
        document.getElementById("top-bar").classList.add("hidden");
        document.getElementById("navbar").classList.add("nav-scroll");
        document.getElementById("navbar").classList.add("shadow-lg");
        document.getElementById("list-menu").classList.add("list-menu-scroll");
    } else {
        document.getElementById("top-bar").classList.remove("hidden");
        document.getElementById("navbar").style.padding = "20px 25px";
        document.getElementById("navbar").classList.remove("nav-scroll");
        document.getElementById("navbar").classList.remove("shadow-lg");
        document.getElementById("list-menu").classList.remove("list-menu-scroll");
    }
}

var startProductBarPos = -1;
function navMobileHome() {
  var bar = document.getElementById("mobile-nav");
  if (startProductBarPos < 0) startProductBarPos = findPosY(bar);

  if (pageYOffset > startProductBarPos) {
    bar.style.position = "fixed";
    bar.style.paddingTop = "0px";
    bar.style.top = "65px";
  } else {
    bar.style.position = "absolute";
    bar.style.paddingTop = "40px";
  }
};


const sections = document.querySelectorAll("section[id]");

window.addEventListener("scroll", navHighlighter);

function navHighlighter() {
  let scrollY = window.pageYOffset;

  sections.forEach((current) => {
    const sectionHeight = current.offsetHeight;
    const sectionTop = current.offsetTop - 250;
    sectionId = current.getAttribute("id");
    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
      document
        .querySelector(".menu-navbar a[href*=" + sectionId + "]")
        .classList.add("active-menu");
    } else {
      document
        .querySelector(".menu-navbar a[href*=" + sectionId + "]")
        .classList.remove("active-menu");
    }
  });
}

function animation() {
  return {
    counter: 0,
    animate(finalCount) {
      let time = 1000; /* Time in milliseconds */
      let interval = 9;
      let step = Math.floor((finalCount * interval) / time);
      let timer = setInterval(() => {
        this.counter = this.counter + step;
        if (this.counter >= finalCount + step) {
          this.counter = finalCount;
          clearInterval(timer);
          timer = null;
          return;
        }
      }, interval);
    },
  };
}

