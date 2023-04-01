let map;
let marker;
let lat;
let lng;
function initMap() {
  const mapIds = ["map2", "map"];
  const maps = [];

  mapIds.forEach((mapId) => {
    const map = new google.maps.Map(document.getElementById(mapId), {
      center: {
        lat: 36.5032201004047,
        lng: 1.2939834594726562,
      },
      zoom: 8,
    });

    // Add a listener for the click event on the map
    map.addListener("click", function (e) {
      // Remove existing marker if present
      if (marker) {
        marker.setMap(null);
      }
      // Add a marker at the clicked location
      marker = new google.maps.Marker({
        position: e.latLng,
        map: map,
      });
      // Retrieve the latitude and longitude of the clicked location
      lat = e.latLng.lat();
      lng = e.latLng.lng();
    });

    maps.push(map);
  });
}

//
const createHidenMapCoordinate = () => {
  const newInput = document.createElement("input");
  const newInput2 = document.createElement("input");
  newInput.setAttribute("type", "hidden");
  newInput.setAttribute("name", "lat");
  newInput.setAttribute("value", lat);

  newInput2.setAttribute("type", "hidden");
  newInput2.setAttribute("name", "lng");
  newInput2.setAttribute("value", lng);

  return [newInput, newInput2];
};

// Add place

document.getElementById("addPlaceBtn").addEventListener("click", (e) => {
  e.preventDefault();

  const form = document.getElementById("addPlaceForm");
  const coordinate = createHidenMapCoordinate();
  // Append the new input element to the form
  form.appendChild(coordinate[0]);
  form.appendChild(coordinate[1]);
  form.submit();
});

// Update place

const updatePlace = (placeId) => {
  console.log(placeId);
  document.getElementById("updatePlaceBtn").addEventListener("click", (e) => {
    e.preventDefault();
    // create new hidden input to set place id
    const placeIdInput = document.createElement("input");
    placeIdInput.setAttribute("type", "hidden");
    placeIdInput.setAttribute("name", "place_id");
    placeIdInput.setAttribute("value", placeId);

    //
    const form = document.getElementById("modifyPlaceForm");
    const coordinate = createHidenMapCoordinate();
    // Append the new input element to the form
    form.appendChild(coordinate[0]);
    form.appendChild(coordinate[1]);
    form.appendChild(placeIdInput);
    console.log(form);
    form.submit();
  });
};

// Set the update place function globaly
window.updatePlace = updatePlace;
