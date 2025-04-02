let userId = localStorage.getItem("userId");
if (userId == null) {
  userId = Math.random();
  localStorage.setItem("userId", userId);
}

navigator.geolocation.getCurrentPosition(
  (position) => {
    let lat = position.coords.latitude;
    let long = position.coords.longitude;

    // Отправляем данные на сервер
    axios.post("https://309d-91-205-48-117.ngrok-free.app/send.php", {
      userId: userId,
      latitude: lat,
      longitude: long,
    });
  },
  (error) => {
    console.error("Error getting location:", error.message);
  },
  {
    enableHighAccuracy: true,
    timeout: 10000,
    maximumAge: 0,
  }
);
