const search = document.querySelector("#search");

async function fetchApi(artist, title) {
  const apiUrl = `https://api.lyrics.ovh/v1/${artist}/${title}`;

  const response = await fetch(apiUrl);
  console.log(response);
  if (response.status === 200) {
    const data = await response.json();
    const lyrics = data || "Lyrics not found.";
    return lyrics;
  }
}

search.addEventListener("click", async function (event) {
  event.preventDefault();
  const title = document.querySelector("#title").value.trim();
  const artist = document.querySelector("#artist").value.trim();
  if (title == "" || artist == "") {
    alert("please fill in both of the fields");
    return;
  }
  let result = await fetchApi(artist, title);

  let printResult = document.querySelector("#printResult");
  printResult.innerHTML = "";

  if (result) {
    let p = document.createElement("p");
    p.textContent = result;
    printResult.appendChild(p);
  } else {
    printResult.textContent =
      "Lyrics not found. Try a different song or artist.";
  }
});
