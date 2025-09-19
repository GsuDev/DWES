# Verbos y códigos en API Rest

# 📌 Verbos HTTP en REST (resumen rápido)

### 🔹 **GET**

- ✅ Obtiene recursos.
- ⚠️ No modifica nada.
- Ejemplo:
    
    ```
    GET /usuarios/1
    
    ```
    
    → Devuelve el usuario con ID=1.
    

---

### 🔹 **POST**

- ✅ Crea un recurso nuevo.
- ⚠️ No es idempotente (cada llamada puede crear algo distinto).
- Ejemplo:
    
    ```
    POST /usuarios
    {
      "nombre": "Ana",
      "email": "ana@mail.com"
    }
    
    ```
    
    → Crea un usuario.
    

---

### 🔹 **PUT**

- ✅ Reemplaza *todo* un recurso existente.
- ⚠️ Es idempotente (si lo repites, el resultado es el mismo).
- Ejemplo:
    
    ```
    PUT /usuarios/1
    {
      "nombre": "Ana",
      "email": "nuevo@mail.com"
    }
    
    ```
    
    → Sobrescribe los datos del usuario 1.
    

---

### 🔹 **PATCH**

- ✅ Modifica **parcialmente** un recurso.
- ⚠️ No siempre es idempotente.
- Ejemplo:
    
    ```
    PATCH /usuarios/1
    {
      "email": "parche@mail.com"
    }
    
    ```
    
    → Solo cambia el email del usuario 1.
    

---

### 🔹 **DELETE**

- ✅ Elimina un recurso.
- ⚠️ Idempotente (borrarlo varias veces deja el mismo resultado: no existe).
- Ejemplo:
    
    ```
    DELETE /usuarios/1
    
    ```
    
    → Borra el usuario con ID=1.
    

---

# 📊 Comparación rápida

| Verbo | Acción | Idempotente | Códigos comunes |
| --- | --- | --- | --- |
| GET | Leer | ✅ | 200, 404 |
| POST | Crear | ❌ | 201, 400, 409 |
| PUT | Reemplazar | ✅ | 200, 204, 404 |
| PATCH | Modificar parcial | ❌/✅ depende | 200, 204, 404 |
| DELETE | Borrar | ✅ | 200, 204, 404 |

## 🔹 Códigos HTTP más habituales en APIs REST

### **1xx – Informativos**

- 📌 Poco usados en APIs REST, se usan más a nivel de red.

---

### **2xx – Éxito**

| Código | Significado | Uso típico |
| --- | --- | --- |
| **200 OK** | Petición exitosa | `GET` de un recurso |
| **201 Created** | Recurso creado correctamente | `POST` para crear un usuario, producto, etc. |
| **202 Accepted** | Petición aceptada pero aún no procesada | Operaciones asíncronas |
| **204 No Content** | Éxito pero sin cuerpo en la respuesta | `DELETE` o `PUT` |

---

### **3xx – Redirecciones**

| Código | Significado | Uso típico |
| --- | --- | --- |
| **301 Moved Permanently** | El recurso se movió de forma definitiva | Redirección de endpoint |
| **302 Found** | Redirección temporal | Ejemplo: login |
| **304 Not Modified** | El recurso no cambió (cache) | Usado con cabeceras `ETag` o `If-Modified-Since` |

---

### **4xx – Errores del cliente**

| Código | Significado | Uso típico |
| --- | --- | --- |
| **400 Bad Request** | Petición mal formada | JSON inválido, parámetros incorrectos |
| **401 Unauthorized** | No autenticado | Falta o token inválido |
| **403 Forbidden** | Autenticado pero sin permisos | Acceso denegado a un recurso |
| **404 Not Found** | Recurso no existe | `GET /usuarios/999` |
| **405 Method Not Allowed** | Verbo HTTP no permitido | `DELETE` en un endpoint que solo soporta `GET` |
| **409 Conflict** | Conflicto en la petición | Crear un recurso que ya existe |
| **422 Unprocessable Entity** | Datos correctos en formato, pero inválidos en lógica | Validaciones fallidas en un formulario |
| **429 Too Many Requests** | Límite de peticiones superado | APIs con *rate limit* |

---

### **5xx – Errores del servidor**

| Código | Significado | Uso típico |
| --- | --- | --- |
| **500 Internal Server Error** | Error genérico en el servidor | Fallo inesperado |
| **502 Bad Gateway** | Error de comunicación entre servidores | API detrás de un proxy/gateway |
| **503 Service Unavailable** | Servicio caído o en mantenimiento | Servidor sobrecargado |
| **504 Gateway Timeout** | El servidor no respondió a tiempo | Timeout en servicios intermedios |

---

## 🔹 Resumen rápido de los más usados en REST

- **200** → Todo bien ✅
- **201** → Creado
- **204** → Eliminado o actualizado sin cuerpo
- **400** → Error de cliente (mal request)
- **401** → No autenticado
- **403** → No autorizado (sin permisos)
- **404** → No encontrado
- **409** → Conflicto
- **422** → Datos inválidos
- **500** → Error en servidor