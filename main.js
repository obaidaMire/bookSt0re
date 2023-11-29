let cards = document.querySelectorAll(
  ".chapters .container .chapter-cards .card"
);

let pars = document.querySelectorAll(
  ".chapters .container .chapter-cards .card .card-p"
);
let books = document.querySelectorAll(".books .container .card");

let search = document.querySelector("#search")

let overlay = document.querySelector(".overlay")

cards.forEach((card) => {
  card.addEventListener("click", function () {
    card.classList.toggle("clicked");

    cards.forEach((c) => {
      if (c !== card) {
        c.classList.remove("clicked");
      }
    });
  });
});

books.forEach((book) => {
  book.addEventListener("click", function () {
    book.classList.toggle("clicked");

    books.forEach((c) => {
      if (c !== book) {
        c.classList.remove("clicked");
      }
    });
  });
});

search.onclick = function() {
  overlay.style.display = "block"
}

