Guión
=====

Security
--------

1. Configuración. security.yml -> security.yml.normal, plantilla profile.html.twig NO FOS,
   database cursosf2.

2. Explicar conceptos: user provider, firewall, acces_control, encoder, role_hierarchy

3. Definir un user_provider sencillo -> in_memory (explicar encoders en la clase user)

4. Definir un firewall de tipo http basic y probar

5. Definir un firewall de tipo form y probar

6. Definir un user_provider entity, cambiar en firewall y probar (explicar encoders en la clase user)

7. Definir un user_provider chain y probar

8. Control de acceso y jerarquía de roles

9. Control de acceso en las acciones y las plantillas

10. ACL's

11. Definir un user_provider custom y probar

12. ¿¿ Definir un firewall custom y probar ??

FOSUserBundle
-------------

1. Instalación con composer y registro en AppKernel.php

2. Creación de las entidades User y Group

3. Actualización de la base de datos + Fixtures

4. Cambio security.yml

5. Configurar en config.yml

6. Usar plantilla profile.html.twig FOS

7. Acciones del FOS

   - Login
   - Cambiar password
   - Editar perfil/Ver perfil
   - Registro
   - Registro con mail

8. Estrategia cambio de  plantillas

9. Estrategia cambio de acciones:

   1. basada en eventos
   2. basada en sobreescribir