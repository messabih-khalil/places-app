const showMap = (lat, lng) => {
  var location = {
    lat: lat,
    lng: lng,
  };
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: location,
  });
  var marker = new google.maps.Marker({
    position: location,
    map: map,
  });
};

const searchByName = async (e) => {
  const inputValue = document.getElementById("place_name");
  let placesBox = document.querySelector(".boxes");
  let searchPlaces = ``;
  if (inputValue.value !== "") {
    await $.ajax({
      type: "GET",
      url: `http://localhost/places_app/places/controllers/GET_BY_NAME.php?place_name=${inputValue.value}`,

      success: (data) => {
        data = JSON.parse(data);

        data.map((e) => {
          searchPlaces += `
                       <div class="box" onclick="showMap(${e.lat}, ${e.lng})">
                <!-- image -->
                <div class="image-box">
                <img src="${e.image_path}" alt="">
                </div>
                <!-- place details -->
                <div class="place-details">
                    <!-- title -->
                    <p class="title">${e.name}</p>
                    <!-- description -->
                    <p class="description">
                    ${e.description}
                    </p>

                    <!-- comment button -->
                    <i class="ri-message-2-line" id="open_popup"></i>
                </div>
            </div>
                       `;
        });
        placesBox.innerHTML = searchPlaces;
      },
    });
  }
};

document
  .getElementById("search_button")
  .addEventListener("click", searchByName);

// comment popup

let place_id;

const showComments = (id) => {
  // set place id globaly to use it from add comment
  place_id = id;

  // Toggle popup
  document.getElementById("popup").classList.toggle("hide-popup");

  // Get comment by place id
  $.ajax({
    type: "GET",
    url: `http://localhost/places_app/comments/controllers/GET_COMMENTS.php?place_id=${id}`,
    success: (data) => {
      data = JSON.parse(data);

      let comments;

      if (data.length > 0) {
        data.map((e) => {
          comments += `
                  <div class="comment-box">
                      <!-- image -->
                      <!--  -->
                      <div class="comment-data">
                          <div class="user-info">
                              <span>${e.created_at}</span>
                          </div>
  
                          <p>
                          ${e.comment_text}
                          </p>
                      </div>
                  </div>`;
        });
        // place comment popup body
        document.querySelector(".comments").innerHTML = comments;
      }
    },
  });
};

// Add Comment

const addComment = () => {
  const inputValue = document.getElementById("comment_input");

  if (inputValue.value !== "") {
    const requestBody = {
      comment_text: inputValue.value,
      place_id: place_id,
    };
    $.ajax({
      type: "POST",
      url: `http://localhost/places_app/comments/controllers/POST_COMMENT.php`,
      data: JSON.stringify(requestBody),
      dataType: "json",
      contentType: "application/json",
      success: (data) => {
        comment = `
                      <div class="comment-box">
                          <!-- image -->
                          <!--  -->
                          <div class="comment-data">
                              <div class="user-info">
                                  <span>${data.created_at}</span>
                              </div>

                              <p>
                              ${data.comment_text}
                              </p>
                          </div>
                      </div>`;

        // place comment popup body
        document.querySelector(".comments").innerHTML += comment;
      },
    });
  }
};

// close popup

const closePopup = () => {
  document.getElementById("popup").classList.toggle("hide-popup");
};
