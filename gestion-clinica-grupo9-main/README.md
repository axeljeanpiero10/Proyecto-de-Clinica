# 🏥 Sistema de Gestión Clínica - Grupo 9

Proyecto grupal del curso **Integración 1**, desarrollado en PHP, MySQL, JavaScript, HTML y CSS. El sistema permite gestionar especialidades, médicos, pacientes, diagnósticos, recetas y más.

---

## 📦 Estructura del Proyecto
/LOGIN

├── img/

│ └── (imágenes del sistema)

├── js/

│ ├── especialidades.js

│ └── medicos.js

├── php/

│ ├── conexion.php

│ ├── medicos.php

│ ├── guardar_medico.php

│ ├── eliminar_medico.php

│ └── ...

├── especialidades.html

├── login2.html

├── ...

---

---

## 🛠️ Requisitos

- ✅ [XAMPP](https://www.apachefriends.org/es/index.html) (PHP + MySQL)
- ✅ Navegador Web (Chrome, Firefox, etc.)
- ✅ Editor de código (VS Code recomendado)
- ✅ Git (para clonar o actualizar el repositorio)
O descargar el ZIP desde GitHub y descomprimirlo.
---

## 🚀 Pasos para levantar el sistema

### 1️⃣ Clonar el repositorio
2️⃣ Configurar XAMPP
 Copia la carpeta LOGIN a:
C:/xampp2/htdocs/
Inicia Apache y MySQL desde el panel de control de XAMPP.

3️⃣ Importar la base de datos
Abre phpMyAdmin

Crea una base de datos llamada: gestion_clinica
Importa el archivo:/LOGIN/base_datos/gestion_clinica.sql
4️⃣ Verificar conexión a la base de datos
Abre el archivo:
/LOGIN/php/conexion.php
Asegúrate que tenga esta línea (por defecto en XAMPP):
$conexion = new mysqli("localhost", "root", "", "gestion_clinica");
⚠️ Usuario: root
⚠️ Contraseña: (vacía)
5️⃣ Probar el sistema
Abre tu navegador y entra a:
http://localhost/LOGIN/especialidades.html
Desde ahí puedes acceder a los distintos módulos:
✅ Especialidades
✅ Médicos
✅ Pacientes
✅ Diagnósticos
✅ Tratamientos
✅ Recetas
✅ Citas

✅ Recomendaciones
No modificar conexion.php si no sabes cómo funciona la conexión.

No editar el script SQL directamente si ya fue importado.

Prueba los formularios antes de subir cambios a GitHub.

Si haces cambios, recuerda usar:
git add .
git commit -m "Descripción del cambio"
git push
