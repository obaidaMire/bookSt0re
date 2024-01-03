let searchInput = document.querySelector(".search");
let container1 = document.querySelector("#container1");
let container2 = document.querySelector("#container2");
searchInput.oninput = function () {
  $.ajax({
    type: "POST",
    url: "control.php?do=search",
    data: { word: searchInput.value },
		success: function (e) {
				container2.style.display = "grid";
				container2.innerHTML = e;
				container1.style.display = "none";
    },
  });
};
