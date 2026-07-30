<div align="center">
  <img src="logo.png" alt="DevKnowledge Logo" width="200" />

  <h1>DevKnowledge API</h1>

  <p>
    <strong>Open-source REST API for structured programming knowledge.</strong><br/>
    Built to be consumed by educational platforms, developer tools, bots, and any application that needs reliable programming content.
  </p>

  <p>
    <img src="https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white" alt="Laravel 13" />
    <img src="https://img.shields.io/badge/PHP-8.4-777BB4?logo=php&logoColor=white" alt="PHP 8.4" />
    <img src="https://img.shields.io/badge/PostgreSQL-17-316192?logo=postgresql&logoColor=white" alt="PostgreSQL 17" />
    <img src="https://img.shields.io/badge/Octane-RoadRunner-00B1E4?logo=laravel&logoColor=white" alt="Octane RoadRunner" />
    <img src="https://img.shields.io/badge/Docker-Compose-2496ED?logo=docker&logoColor=white" alt="Docker" />
  </p>

  <p>
    <a href="#-descripción">Descripción</a> ·
    <a href="#-api-resources">API Resources</a> ·
    <a href="#-getting-started">Getting Started</a> ·
    <a href="#%EF%B8%8F-stack">Stack</a> ·
    <a href="#-testing--calidad">Testing</a> ·
    <a href="#-contributing">Contributing</a>
  </p>
</div>

---

## Descripción

**DevKnowledge** es una API REST de código abierto diseñada para centralizar y distribuir conocimiento estructurado sobre programación de manera estandarizada, accesible y reutilizable.

A diferencia de un sitio de documentación tradicional, DevKnowledge no está pensada para que el usuario final navegue artículos — está diseñada para que **las aplicaciones consuman información mediante HTTP** y reciban respuestas JSON listas para integrarse en cualquier proyecto.


### Problema que resuelve

Existen numerosas APIs públicas para acceder a información sobre clima, películas o geografía, pero no existe una API abierta y estructurada que proporcione **conocimiento de programación** listo para consumir. La mayoría de plataformas educativas almacenan su contenido de manera privada, haciendo imposible reutilizarlo.

DevKnowledge resuelve esto proporcionando una base de conocimiento abierta, organizada y mantenida por la comunidad.

---

## API Resources

La API expone contenido estructurado sobre múltiples tecnologías y lenguajes.

### Categorías de contenido

| Categoría | Descripción |
|---|---|
| Lenguajes de programación | Python, JavaScript, Rust, Go, PHP, etc. |
| Frameworks y librerías | Laravel, React, Vue, Django, etc. |
| Bases de datos | SQL, PostgreSQL, MongoDB, Redis, etc. |
| Herramientas de desarrollo | Docker, Git, CI/CD, etc. |
| Conceptos de informática | Algoritmos, estructuras de datos, etc. |
| Arquitectura de software | REST, microservicios, DDD, etc. |
| Buenas prácticas | SOLID, Clean Code, etc. |
| Patrones de diseño | Factory, Observer, Repository, etc. |

### Campos por recurso

| Campo | Descripción |
|---|---|
| `definition` | Definición concisa del concepto |
| `explanation` | Explicación detallada |
| `syntax` | Sintaxis del lenguaje o herramienta |
| `code_examples` | Ejemplos de código listos para usar |
| `exercises` | Ejercicios prácticos |
| `quiz` | Preguntas de evaluación |
| `common_errors` | Errores frecuentes y cómo evitarlos |
| `best_practices` | Buenas prácticas recomendadas |
| `references` | Referencias y documentación oficial |
| `related_topics` | Temas relacionados |
| `difficulty` | Nivel de dificultad |
| `study_time` | Tiempo estimado de estudio |

---

## Getting Started

### Pre-requisitos

- [Docker](https://www.docker.com/) y Docker Compose instalados.
- Una base de datos PostgreSQL 17 en [Neon](https://neon.tech) (o local).
vKnowledge-API
```


### Arquitectura

```text
Aplicación cliente
        │
        ▼
   Nginx (puerto 8080)
        │  proxy_pass
        ▼
Laravel Octane (RoadRunner, puerto 8000)
        │
        ├──────────────────┐
        ▼                  ▼
PostgreSQL (Neon)       Redis Cache
```

---


## Documentación de la API

La documentación completa de endpoints está disponible via **Swagger/OpenAPI** en:

```
http://localhost:8080/api/documentation
```

---

## Contributing

Las contribuciones son bienvenidas. Por favor, sigue este flujo:

1. Haz un fork del proyecto.
2. Crea tu rama: `git checkout -b feature/nueva-funcionalidad`
3. Haz commit: `git commit -m 'feat: add nueva funcionalidad'`
4. Push: `git push origin feature/nueva-funcionalidad`
5. Abre un Pull Request.

---

## Casos de Uso

La API está diseñada para ser consumida por:

- Plataformas educativas y LMS
- Aplicaciones móviles de aprendizaje
- Juegos educativos (como **DEVLO**)
- Extensiones para VS Code
- Bots de Discord y Telegram
- Sitios web de documentación
- Proyectos universitarios

---

