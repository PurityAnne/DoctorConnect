const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent the form from submitting and reloading the page

  const formData = new FormData(form); // create a new FormData object to store the form data

  // use fetch API to submit the form data to the PHP file
  fetch('appointment.php', {
    method: 'POST',
    body: formData,
  })
  .then(response => {
    if (response.ok) {
      // send email to the doctor
      fetch('send_email.php', {
        method: 'POST',
        body: formData,
      });
      alert('Appointment booked successfully!');
      form.reset(); // reset the form after successful submission
    } else {
      throw new Error('Network response was not ok');
    }
  })
  .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
    alert('There was a problem submitting the form. Please try again later.');
  });
});
