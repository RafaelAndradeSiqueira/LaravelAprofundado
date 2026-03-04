# Mini API — Laravel 12 (Jobs, Filas, Cache e Schedule)

## Sobre o Projeto

Este projeto consiste em uma API desenvolvida com **Laravel 12** com foco na aplicação prática de conceitos fundamentais de performance e processamento assíncrono, incluindo:

- Jobs e Filas (Queues)
- Cache com Redis
- Agendamento de tarefas (Scheduler)
- Envio de e-mails com SMTP
- Ambiente containerizado com Docker

A proposta é demonstrar uma arquitetura simples, porém organizada e eficiente, aplicando boas práticas do ecossistema Laravel.

---

## Funcionalidades

### Cadastro de Usuários

Ao realizar o cadastro de um usuário:

1. A API retorna a resposta imediatamente.
2. Um **Job** é despachado para a fila.
3. O envio do e-mail de boas-vindas é processado de forma **assíncrona**.

Essa abordagem garante melhor experiência ao usuário, evitando que o tempo de envio do e-mail impacte a resposta da requisição.

- Serviço de e-mail utilizado: **Mailtrap**
- Processamento realizado via **Queue**

---

### Listagem de Usuários com Cache

A rota `/usuarios` implementa cache utilizando **Redis**.

#### Fluxo:

- A primeira requisição consulta o banco de dados.
- O resultado é armazenado no Redis por **1 minuto**.
- Requisições subsequentes dentro desse intervalo retornam os dados diretamente do cache.
- Após o tempo definido, o cache é invalidado.

#### Benefícios:

- Redução significativa de consultas ao banco
- Melhor tempo de resposta
- Aproveitamento do Redis como banco em memória
- Redução de carga na aplicação

---

### ⏱️ Limpeza Automática com Scheduler

Foi configurado o **Laravel Scheduler** para executar automaticamente, a cada 1 minuto, um comando responsável por limpar o cache da listagem de usuários.

Isso garante:

- Dados atualizados
- Controle de invalidação de cache
- Automatização do processo

---

## Tecnologias Utilizadas

- **Laravel 12**
- **Redis**
- **SQLite**
- **Mailtrap**
- **Docker**

---

## Arquitetura Aplicada

- API REST
- Processamento assíncrono com Jobs
- Filas para tarefas em background
- Cache estratégico para otimização de leitura
- Scheduler para automação de tarefas
- Separação clara de responsabilidades

---

## Objetivo do Projeto

Consolidar conhecimentos práticos em:

- Processamento assíncrono
- Estratégias de cache
- Performance de aplicações
- Organização arquitetural no Laravel

O foco principal está na melhoria de desempenho e na aplicação de boas práticas para aplicações escaláveis.

---
