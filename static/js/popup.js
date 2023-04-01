// This function is used to update user
const update = (formName, id) => {
  // Select the form element based on the formName parameter
  const form = document.getElementById(`${formName}-form`);
  // Select the button element based on the formName parameter and add an event listener to it
  const btn = document.getElementById(`${formName}-btn`);

  btn.addEventListener("click", () => {
    // Create a new input element to hold the id value
    const newInput = document.createElement("input");
    // Set the type of the input element to "hidden"
    newInput.setAttribute("type", "hidden");
    // Set the name attribute of the input element to "user_id"
    newInput.setAttribute("name", "user_id");
    // Set the value attribute of the input element to the id parameter
    newInput.setAttribute("value", id);
    // Append the new input element to the form
    form.appendChild(newInput);
    // Submit the form
    form.submit();
  });
};

// This function is used to handle pop-up display
const popupAction = (popupName, id, form) => {
  // Select the pop-up element based on the popupName parameter
  const poupUp = document.querySelector(`[data-popup-name="${popupName}"]`);
  // Toggle the visibility of the pop-up by adding or removing the "hide-popup" class
  poupUp.classList.toggle("hide-popup");

  // If an id parameter is provided, call the update function with the popupName and id parameters
  if (id && !form) {
    update(popupName, id);
  }
  if (id && form) {
    window.updatePlace(id);
  }
};
