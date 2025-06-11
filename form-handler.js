const form = document.getElementById('contactForm');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const formData = new FormData(form);
  const phone = formData.get("phone");
  const captcha = formData.get("captcha");
  const errors = [];

  const phoneRegex = /^\d{3}-\d{3}-\d{4}$/;
  if (!phoneRegex.test(phone)) {
    errors.push("El número de teléfono debe tener el formato 123-456-7890.");
  }

  if (captcha.trim() === "") {
    errors.push("Debes resolver el CAPTCHA.");
  }

  if (errors.length > 0) {
    document.getElementById("errors").innerHTML = errors.join("<br>");
    return;
  }

  fetch(form.action, {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    document.getElementById("errors").innerHTML = "";
    document.getElementById("response").innerHTML = data;
    form.reset();
  })
  .catch(error => {
    console.error('Error:', error);
  });
});
