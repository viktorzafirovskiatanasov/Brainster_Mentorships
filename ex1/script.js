$(document).ready(function () {
    $("#getJoke").on("click", function () {
        const settings = {
            async: true,
            crossDomain: true,
            url: 'https://matchilling-chuck-norris-jokes-v1.p.rapidapi.com/jokes/random',
            method: 'GET',
            headers: {
                accept: 'application/json',
                'X-RapidAPI-Key': 'bd2a2f2d5amsh9ae953597e77cc9p1f8047jsn743994a0d64b',
                'X-RapidAPI-Host': 'matchilling-chuck-norris-jokes-v1.p.rapidapi.com'
            }
        };
        $.ajax(settings).done(function (response) {

            if (response && response.value) {
                const joke = response.value.replace("Chuck Norris", "Denis Ziberi");

                const jokeContainer = $("#jokeContainer");
                jokeContainer.text(joke);
            } else {
                const jokeContainer = $("#jokeContainer");
                jokeContainer.text("Chuck Norris didn't tell a joke this time.");
            }
        });

    });
});



