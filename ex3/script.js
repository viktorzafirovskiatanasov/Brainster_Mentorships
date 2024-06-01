$(document).ready(function() {
    // Function to search for TV shows
    function searchShows() {
        const searchInput = $("#searchInput").val();
        const resultsContainer = $("#results");
        resultsContainer.empty();

        $.ajax({
            url: `http://api.tvmaze.com/search/shows?q=${searchInput}`,
            method: "GET",
            dataType: "json",
            success: function(data) {
                data.forEach(function(result) {
                    const show = result.show;
                    const showCard = $("<div>").addClass("card mt-3");
                    const cardBody = $("<div>").addClass("card-body");
                    const showTitle = $("<h5>").addClass("card-title").text(show.name);
                    const showImage = $("<img>").addClass("card-img-top w-25").attr("src", show.image.medium);
                    const showSummary = $("<p>").addClass("card-text").html(show.summary);
                    const episodesButton = $("<button>").addClass("btn btn-primary mt-2").text("Episodes");
                    const episodesDiv = $("<div>").addClass("episodes");

                    episodesButton.on("click", function() {
                        fetchEpisodes(show.id, episodesDiv);
                    });

                    cardBody.append(showTitle, showImage, showSummary, episodesButton);
                    showCard.append(cardBody, episodesDiv);
                    resultsContainer.append(showCard);
                });
            },
            error: function(error) {
                console.error("Error searching for shows: " + error);
            }
        });
    }

    function fetchEpisodes(showId, episodesDiv) {
        $.ajax({
            url: `http://api.tvmaze.com/shows/${showId}/episodes`,
            method: "GET",
            dataType: "json",
            success: function(episodes) {
                episodesDiv.empty();
                if (episodes.length > 0) {
                    const episodesList = $("<ul>");
                    episodes.forEach(function(episode) {
                        const episodeItem = $("<li>").text(`S${episode.season}E${episode.number} - ${episode.name}`);
                        episodesList.append(episodeItem);
                    });
                    episodesDiv.append(episodesList);
                } else {
                    episodesDiv.text("No episodes found for this show.");
                }
            },
            error: function(error) {
                console.error("Error fetching episodes: " + error);
            }
        });
    }

    $("#searchButton").on("click", searchShows);
});
