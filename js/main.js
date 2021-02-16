(function () {
  const navigation = document.querySelector(".site-header");
  const logo = document.querySelector(".site-title");
  const menuItem = document.querySelectorAll(".menu-item");
  const typingText = document.getElementById("text-desc")
    ? document.getElementById("text-desc").innerHTML
    : "";

  const menuButton = document.querySelector(".menu-toggle")
    ? document.querySelector(".menu-toggle")
    : "";

  const learnMoreBtn = document.getElementById("learn-more")
    ? document.getElementById("learn-more")
    : "";

  if (!document.body.classList.contains("home")) {
    navigation.classList.add("nav-background");
  }

  const tabs = document.querySelectorAll(".bio__tab")
    ? document.querySelectorAll(".bio__tab")
    : "";

  const tabsContainer = document.querySelector(".bio__tab-container")
    ? document.querySelector(".bio__tab-container")
    : "";

  const tabsContent = document.querySelectorAll(".bio__content")
    ? document.querySelectorAll(".bio__content")
    : "";

  //
  // Handle navigation menu shrinking on scroll.
  //

  window.onscroll = function () {
    scrollFunction();
  };

  console.log();

  function scrollFunction() {
    if (
      document.body.scrollTop > 30 ||
      document.documentElement.scrollTop > 30
    ) {
      navigation.style.position = "fixed";
      navigation.style.maxHeight = "3rem";
      if (document.body.classList.contains("home")) {
        navigation.classList.add("nav-background");
      }
      logo.style.fontSize = "1.6rem";
      logo.style.margin = "0.5rem 1.5rem";
      if (window.screen.availWidth >= 768) {
        menuItem.forEach(function (item) {
          item.style.fontSize = "1rem";
          item.style.padding = "0 0.5rem";
        });
      }
      menuButton.style.top = "0.3rem";
    } else {
      navigation.style.position = "absolute";
      if (document.body.classList.contains("home")) {
        navigation.classList.remove("nav-background");
      }
      navigation.style.maxHeight = "5rem";
      logo.style.fontSize = "2.2rem";
      logo.style.margin = "1rem 1.5rem";
      if (window.screen.availWidth >= 768) {
        menuItem.forEach(function (item) {
          item.style.fontSize = "1.2rem";
          item.style.padding = "0.9rem 0.5rem";
        });
      }
      menuButton.style.top = "1.5rem";
    }
  }

  //
  // Smooth scrolling
  //
  if (document.body.classList.contains("home")) {
    document
      .querySelector(".main-navigation")
      .addEventListener("click", function (e) {
        // Matching strategy
        if (e.target.parentElement.classList.contains("menu-item")) {
          e.preventDefault();
          const id = e.target.getAttribute("href");
          document.querySelector(id).scrollIntoView({ behavior: "smooth" });
        }
      });
  }

  learnMoreBtn.addEventListener("click", function (e) {
    e.preventDefault();
    const id = e.target.getAttribute("href");
    document.querySelector(id).scrollIntoView({ behavior: "smooth" });
  });

  //
  // Handle hover effect for menu.
  //

  const handleHover = function (e) {
    if (e.target.closest(".menu-item")) {
      const link = e.target.closest(".menu-item");
      // const site = link.closest(".site-header").querySelector(".site-branding");
      const siblings = link
        .closest(".site-header")
        .querySelectorAll(".menu-item");
      siblings.forEach((el) => {
        if (el !== link) el.style.opacity = this;
      });
      // site.style.opacity = this;
    }
  };

  navigation.addEventListener("mouseover", handleHover.bind(0.5));
  navigation.addEventListener("mouseout", handleHover.bind(1));

  //
  // Header background for blog posts and pages and !front-page
  //

  //
  // Typing effect
  //

  let element = document.getElementById("description");
  if (!element) return;
  let part = 0;
  let partIndex = 0;
  let intervalVal;
  let cursor = document.querySelector("#cursor");

  function type() {
    let text = typingText.substring(0, partIndex + 1);
    element.innerHTML = text;
    partIndex++;

    if (text === typingText) {
      clearInterval(intervalVal);
      // setTimeout(function () {
      //   intervalVal = setInterval(deleteText, 50);
      // }, 500);
    }
  }

  // function deleteText() {
  //   let text = typingText.substring(0, partIndex - 1);
  //   element.innerHTML = text;
  //   partIndex--;
  //   if (text === "") {
  //     clearInterval(intervalVal);
  //     if (part == typingText.length - 1) part = 0;
  //     else part++;
  //     partIndex = 0;
  //     setTimeout(function () {
  //       intervalVal = setInterval(type, 100);
  //     });
  //   }
  // }

  intervalVal = setInterval(type, 100);

  //
  // Tabs
  //
  tabsContainer.addEventListener("click", function (e) {
    const clicked = e.target.closest(".bio__tab");

    // Guard clause
    if (!clicked) return;

    // Remove active classes
    tabs.forEach((t) => t.classList.remove("bio__tab--active"));
    tabsContent.forEach((c) => c.classList.remove("bio__content--active"));

    // Active tab
    clicked.classList.add("bio__tab--active");

    // Active content area
    document
      .querySelector(`.bio__content--${clicked.dataset.tab}`)
      .classList.add("bio__content--active");
  });

  //
  // Slider
  //

  const slider = function () {
    const slides = document.querySelectorAll(".project");
    const slider = document.querySelector(".portfolio--container");
    const btnLeft = document.querySelector(".slider__btn--left");
    const btnRight = document.querySelector(".slider__btn--right");
    const dotContainer = document.querySelector(".dots");
    let curSlide = 0;
    const maxSlide = slides.length;

    const createDots = function () {
      slides.forEach(function (_, i) {
        dotContainer.insertAdjacentHTML(
          "beforeend",
          `<button class="dots__dot" data-slide="${i}"></button>`
        );
      });
    };

    const activateDot = function (slide) {
      document
        .querySelectorAll(".dots__dot")
        .forEach((dot) => dot.classList.remove("dots__dot--active"));

      document
        .querySelector(`.dots__dot[data-slide="${slide}"  ]`)
        .classList.add("dots__dot--active");
    };

    const goToSlide = function (slide) {
      slides.forEach(
        (s, i) => (s.style.transform = `translateX(${100 * (i - slide)}%)`)
      );
    };

    const nextSlide = function () {
      if (curSlide === maxSlide - 1) {
        curSlide = 0;
      } else {
        curSlide++;
      }

      goToSlide(curSlide);
      activateDot(curSlide);
    };

    const prevSlide = function () {
      if (curSlide === 0) {
        curSlide = maxSlide - 1;
      } else {
        curSlide--;
      }

      goToSlide(curSlide);
      activateDot(curSlide);
    };

    const automaticSlide = function () {
      nextSlide();
      setTimeout(automaticSlide, 5000);
    };

    function init() {
      createDots();
      goToSlide(0);
      activateDot(curSlide);
      automaticSlide();
    }
    init();

    btnRight.addEventListener("click", nextSlide);

    btnLeft.addEventListener("click", prevSlide);

    document.addEventListener("keydown", function (e) {
      if (e.key === "ArrowLeft") prevSlide();
      if (e.key === "ArrowRight") nextSlide();
    });

    dotContainer.addEventListener("click", function (e) {
      if (e.target.classList.contains("dots__dot")) {
        const { slide } = e.target.dataset;
        goToSlide(slide);
        activateDot(slide);
      }
    });
  };
  slider();
})();
