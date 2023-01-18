  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.10/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyCdNupOhQHJkBcWiyZz3ADUcnikvvbLX7A",
    authDomain: "storm3blog.firebaseapp.com",
    projectId: "storm3blog",
    storageBucket: "storm3blog.appspot.com",
    messagingSenderId: "297114289984",
    appId: "1:297114289984:web:38fdd64e6a7b5eb4b19ca5",
    measurementId: "G-QK5DLKH3P4"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
