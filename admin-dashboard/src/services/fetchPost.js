const BASE_URL = '/api/'; // Cambia esto por la URL base de tu API

export async function fetchPostForm(endpoint, body, method="POST") {
    try {
    const response = await fetch(`${BASE_URL}${endpoint}`, {
      method: method,
      body: body,
    });
    if (!response.ok) {
      const errorResponse = await response.json();

      return { errors: errorResponse.errors || "Ocurrió un error, si el error continúa por favor recarga la página." };
    }

    const result = await response.json();
    return { data: result };
  } catch (err) {
    return { errors: err.message || err };
  }
}

  export async function fetchPost(endpoint, payload, method = "POST") {
    try {
      const response = await fetch(`${BASE_URL}${endpoint}`, {
        method: method,
        credentials: 'include',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload),
      });
  
      if (!response.ok) {
        const errorResponse = await response.json();
  
        return { errors: errorResponse.errors || "Ocurrió un error, si el error continúa por favor recarga la página." };
      }
  
      const result = await response.json();
      return result;
    } catch (err) {
      return { errors: err.message || err };
    }
  }
  