# Primeira API em Laravel

#### API Construida para o Desafio Edição #1:
[Desafio Alura](https://www.alura.com.br/challenges/back-end)

---
#### Clonando o Projeto
<details><summary><b> Mostrar instruções </b></summary>

* Ter o Git instalado
* Rodar no terminal o comando `git clone + url do projeto`, por exemplo:
`git clone git@github.com:douglasfdev/laravel-challenge-1.git`

</details>

---
#### Como rodar o projeto?
<details><summary><b> Mostrar instruções </b></summary>

* Ter o PHP instalado em sua maquina com o composer e o laravel.
* Rodar no terminal dentro da pasta do projeto o comando: `php artisan serve`.

</details>

---
## Rotas e Documentação

```http
GET http://localhost:8000/api/videos
```
Resposta é um array de objeto JSON {Status 200 OK}
```json
[
    {
        "title": "titulo",
        "duration": "tempo",
        "description": "descricao",
        "url": "URL"
    }
]
```
---
```http
GET http://localhost:8000/api/videos/{id}
```
* **URL**

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `uuid` | `string` | **Obrigatório**. UUID obrigatório para buscar um registro no banco de dados|

<br />

Resposta é um único registro de vídeo buscando pelo ID {Status 200 OK}
```json
{
    "title": "titulo",
    "duration": "tempo",
    "description": "descricao",
    "url": "URL"
}
```
---
```http
POST http://localhost:8000/api/videos/
```
| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `title` | `string` | **Obrigatório**. Titúlo do vídeo obrigatório|
| `duration` | `string` | **Obrigatório**. Duração do vídeo obritaória|
| `description` | `string` | **Obrigatório**. Descrição é obrigatória|
| `url` | `string` | **Obrigatório**. URL é obrigatória|
<br />

Resposta do corpo: {Status 201 Created}
```json
{
    "title": "Primeiro Video",
    "duration": "15min",
    "description": "Descricao",
    "url": "URL"
}
```
---
```http
PATCH http://localhost:8000/api/videos/{id}
```
* **URL**

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `uuid` | `string` | **Obrigatório**. UUID obrigatório para buscar um registro no banco de dados|

* **Corpo**

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `title` | `string` | **Obrigatório**. Titúlo do vídeo obrigatório|
| `duration` | `string` | **Obrigatório**. Duração do vídeo obritaória|
| `description` | `string` | **Obrigatório**. Descrição é obrigatória|
| `url` | `string` | **Obrigatório**. URL é obrigatória|
<br />

Resposta do corpo: {Status 202 Accepted}
```json
{
    "title": "Primeiro Video",
    "duration": "15min",
    "description": "Descricao",
    "url": "URL"
}
```
---

```http
PATCH http://localhost:8000/api/videos/{id}
```
* **URL**

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `uuid` | `string` | **Obrigatório**. UUID obrigatório para buscar um registro no banco de dados|

Resposta: {Status 204 No Content}