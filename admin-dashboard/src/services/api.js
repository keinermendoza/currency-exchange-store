// api.js
import axios from 'axios';

// Crea una instancia de axios utilizando los valores globales (si existen)
const api = axios.create({
    baseURL: "/api/",
    withCredentials: true, // Para enviar las cookies de WordPress
});

// // Configura el header X-WP-Nonce de forma global
// if (window.Passport) {
//   api.defaults.headers.common['X-WP-Nonce'] = window.Passport.nonce;
// }

export default api;
