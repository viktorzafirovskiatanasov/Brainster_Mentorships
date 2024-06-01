async function fetchPosts() {
  let response = await fetch("https://jsonplaceholder.typicode.com/posts");
  let posts = await response.json();
  sessionStorage.setItem("posts", JSON.stringify(posts));
}

let result = document.querySelector("#result");
result.style.display = "none";
let getPosts = document.querySelector("#GetPost");
getPosts.addEventListener("click", function () {
  let posts = JSON.parse(sessionStorage.getItem("posts"));
  result.style.display = "block";
  renderPosts(posts);
});
function renderPosts(posts) {
  // fetchPosts();
  //let posts = JSON.parse(sessionStorage.getItem("posts"));
  let cards = document.querySelector("#cards");
  cards.innerHTML = "";

  posts.forEach((post) => {
    const cardDiv = document.createElement("div");
    cardDiv.className = "card mb-5 shadow-lg";
    const ulElement = document.createElement("ul");
    ulElement.className = "list-group list-group-flush";
    const liTitle = document.createElement("li");
    liTitle.className = "list-group-item";
    liTitle.textContent = `Title: ${post.title}`;
    const liId = document.createElement("li");
    liId.className = "list-group-item";
    liId.textContent = `ID: ${post.id}`;
    const liBody = document.createElement("li");
    liBody.className = "list-group-item";
    liBody.textContent = `Body: ${post.body}`;

    ulElement.appendChild(liId);
    ulElement.appendChild(liTitle);
    ulElement.appendChild(liBody);

    cardDiv.appendChild(ulElement);

    cards.appendChild(cardDiv);
  });
}

let search = document.querySelector("#search");
search.addEventListener("keyup", function () {
  let cards = document.querySelector("#cards");
  let searchTerm = search.value.toLowerCase();
  let posts = JSON.parse(sessionStorage.getItem("posts"));
  cards.innerHTML = "";
  if (searchTerm.trim() === "") {
    renderPosts(posts);
  } else {
    let filteredPosts = posts.filter((post) =>
      post.title.toLowerCase().includes(searchTerm)
    );
    if (filteredPosts.length > 0) {
      renderPosts(filteredPosts);
    } else {
      cards.textContent = "No matching posts found.";
    }
  }
});

// create a post

let submitPost = document.querySelector("#submitPost");
let form = document.querySelector("#Form");

submitPost.addEventListener("click", function (event) {
  event.preventDefault();

  let title = document.querySelector("#title").value;
  let content = document.querySelector("#content").value;

  if (!title || !content) {
    alert("Please fill in both title and content fields.");
    return;
  }

  const newPost = {
    title,
    body: content,
    userId: 1,
  };

  fetch("https://jsonplaceholder.typicode.com/posts", {
    method: "POST",
    body: JSON.stringify(newPost),
    headers: {
      "Content-type": "application/json; charset=UTF-8",
    },
  })
    .then((response) => response.json())
    .then((json) => {
      console.log("New post created with ID:", json.id);
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
