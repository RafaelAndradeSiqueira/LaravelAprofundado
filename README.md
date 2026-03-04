Descrição

Este projeto foi desenvolvido com o objetivo de consolidar, na prática, conceitos fundamentais do ecossistema Laravel, incluindo:

Processamento assíncrono com Jobs e Filas

Cache com Redis

Agendamento de tarefas com Schedule

Envio de e-mails utilizando SMTP (Mailtrap)

Ambiente containerizado com Docker

Trata-se de uma API simples de cadastro de usuários com foco em performance e organização de processamento em background.

Funcionalidades
Cadastro de Usuários

Ao realizar o cadastro de um usuário:

A API retorna a resposta imediatamente.

Um Job é despachado para a fila.

O Job é responsável por processar e enviar um e-mail de boas-vindas de forma assíncrona.

Essa abordagem evita que o tempo de envio do e-mail impacte o tempo de resposta da requisição.

O envio de e-mails é realizado utilizando o Mailtrap como servidor SMTP.

Listagem de Usuários com Cache

A rota /usuarios implementa cache utilizando Redis.

Fluxo:

A primeira requisição consulta os dados diretamente no banco de dados.

O resultado é armazenado no Redis por 1 minuto.

Requisições subsequentes dentro desse intervalo retornam os dados diretamente do cache.

Isso reduz consultas ao banco e melhora significativamente o tempo de resposta.

A utilização do Redis como banco em memória permitiu reduzir praticamente pela metade o tempo médio da consulta.

Limpeza Automática de Cache

Foi configurado o Schedule do Laravel para executar automaticamente, a cada 1 minuto, um comando responsável por limpar o cache da listagem de usuários.

Isso garante que os dados não permaneçam desatualizados por períodos prolongados.

Tecnologias Utilizadas

Laravel 12

Redis

SQLite

Mailtrap

Docker

Estrutura de Processamento

Requisições HTTP tratadas pela API

Jobs responsáveis por tarefas assíncronas

Filas para gerenciamento de processamento em background

Cache em Redis para otimização de leitura

Schedule para execução automática de comandos

Ambiente

O projeto utiliza Redis via Docker para gerenciamento de cache.
A imagem do Redis utilizada está documentada na configuração do ambiente.

Objetivo

Demonstrar, de forma prática, a aplicação de:

Processamento assíncrono

Estratégias de cache

Agendamento automático de tarefas

Separação de responsabilidades para melhorar performance e organização do código

O foco principal do projeto é arquitetura e desempenho em aplicações Laravel.
