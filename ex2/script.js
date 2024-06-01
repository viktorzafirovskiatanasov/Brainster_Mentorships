$(document).ready(function() {
    function populateBreedList() {
        const breedSelect = $("#breedSelect");
        $.ajax({
            url: "https://dog.ceo/api/breeds/list/all",
            method: "GET",
            dataType: "json",
            success: function(data) {
                for (const breed in data.message) {
                    const option = $("<option>").val(breed).text(breed);
                    breedSelect.append(option);
                }
            },
            error: function(error) {
                console.error("Error fetching breeds: " + error);
            }
        });
    }

    function getImages() {
        const breedSelect = $("#breedSelect");
        const selectedBreed = breedSelect.val();
        const imagesContainer = $("#images");
        imagesContainer.empty();

        $.ajax({
            url: `https://dog.ceo/api/breed/${selectedBreed}/images`,
            method: "GET",
            dataType: "json",
            success: function(data) {
                if (data.status === "success") {
                    data.message.forEach(function(imageUrl) {
                        const imgElement = $("<img>").attr("src", imageUrl);
                        imagesContainer.append(imgElement);
                    });
                } else {
                    imagesContainer.text("No images found for this breed.");
                }
            },
            error: function(error) {
                imagesContainer.text("An error occurred while fetching images.");
                console.error("Error fetching images: " + error);
            }
        });
    }

    populateBreedList();

    $("#getImages").on("click", getImages);
});