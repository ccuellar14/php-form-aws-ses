# ✉️ Enviar Correos con AWS SES en PHP (Interfaz Web)

Este proyecto proporciona una interfaz web en PHP para enviar correos electrónicos utilizando **Amazon SES (Simple Email Service)** mediante el SDK oficial de AWS.

---

## 🧰 Requisitos

- PHP 7.2 o superior
- Composer
- Servidor web compatible con PHP (Apache, Nginx, etc.)
- Cuenta de AWS con SES habilitado
- Correo(s) verificados en SES si estás en modo sandbox

---

## ⚙️ Instalación

1. **Clona el repositorio o descarga los archivos**
  ```bash
   git clone https://github.com/tuusuario/aws-php-ses.git
   cd aws-php-ses
   ```

2. **Instala dependencias con Composer**
  ```bash
  composer install
  ```

3. **Configura tus credenciales de AWS**

Puedes hacerlo de una de estas formas:

 - Recomendado: Usando variables de entorno o el archivo ~/.aws/credentials
 - Alternativamente: Edita send-email.php y agrega tus claves directamente (⚠️ solo para pruebas, no recomendado en producción)

4. **Sube a tu servidor o usa php -S para probar localmente**

  ```bash
  php -S localhost:8000
  ```

5. **Abre el navegador y visita:**
  ```bash
  http://localhost:8000/send-email.php
  ```

**📤 Cómo usar**

  1. Ingresa un correo verificado como remitente.
  2. Ingresa la dirección de destino.
  3. Escribe el asunto y el cuerpo del correo.
  4. Haz clic en “Enviar Correo”.
  5. Si todo va bien, verás un mensaje confirmando el envío junto con el MessageId.

**📌 Notas Importantes**

  - Si tu cuenta de SES está en sandbox, debes verificar tanto el correo del remitente como el destinatario.
  - Si estás en modo producción, solo necesitas verificar el remitente.
  - SES puede tardar unos segundos en procesar el envío.

**🔐 Seguridad**
Nunca subas tus claves de AWS al repositorio.

Para producción, usa variables de entorno o IAM roles si estás desplegando en servicios como EC2, Lambda o ECS.

Habilita HTTPS si se usará públicamente.

**📄 Licencia**

Este proyecto está disponible bajo la MIT License.

**✉️ Créditos**

Desarrollado por @ccuellar14.

Basado en AWS SDK para PHP:
https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/ses-examples-send-email.html