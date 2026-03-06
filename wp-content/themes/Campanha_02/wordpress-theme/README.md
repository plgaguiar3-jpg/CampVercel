# Fátima Gavioli — Tema WordPress da Campanha 2026

## Sobre

Tema WordPress convertido do site React/Vite da campanha política da **Prof. Fátima Gavioli**. Um tema one-page com seções de Hero, Sobre, Propostas, Notícias, Galeria, Depoimentos e Contato.

## Instalação

1. Copie a pasta `wordpress-theme` para `wp-content/themes/gavioli-campanha/`
2. Ative o tema em **Aparência → Temas**
3. Vá em **Configurações → Leitura** e defina "Sua página inicial exibe" como **Últimos posts** ou defina uma página estática como página inicial.

## Personalização (Customizer)

Acesse **Aparência → Personalizar** para editar:

- **Hero / Banner Principal** — Imagem de fundo, título, subtítulo, textos dos botões
- **Seção Sobre** — Foto da candidata, nome, textos biográficos
- **Seção Contato** — Telefone, e-mail, URLs das redes sociais
- **Rodapé** — Slogan

## Seção de Notícias

A seção de notícias puxa automaticamente os **3 posts mais recentes** do WordPress. Se não houver posts publicados, exibe conteúdo placeholder.

## Seção de Galeria

Para adicionar imagens à galeria:
1. Faça upload das imagens na **Biblioteca de Mídia**
2. Adicione o meta campo personalizado `_gavioli_gallery` com valor `1` a cada imagem

## Formulário de Contato

O formulário funciona via AJAX com proteção por nonce do WordPress. As mensagens são enviadas para o e-mail do administrador configurado em **Configurações → Geral**.

## Imagens

Adicione suas imagens nos seguintes locais via Customizer:
- **Hero**: imagem de fundo (recomendado: 1920×1080)
- **Sobre**: foto da candidata (recomendado: 800×900)

## Estrutura de Arquivos

```
gavioli-campanha/
├── style.css              # CSS principal + metadados do tema
├── functions.php          # Setup, enqueue, AJAX, SVG icons
├── header.php             # <head>, navbar
├── footer.php             # rodapé, scripts
├── front-page.php         # template da página inicial
├── index.php              # fallback
├── page.php               # template de página genérica
├── single.php             # template de post individual
├── 404.php                # página não encontrada
├── inc/
│   └── customizer.php     # opções do Customizer
├── template-parts/
│   ├── hero.php
│   ├── about.php
│   ├── proposals.php
│   ├── news.php
│   ├── gallery.php
│   ├── testimonials.php
│   └── contact.php
└── assets/
    └── js/
        └── main.js        # menu mobile, scroll suave, animações, AJAX do form
```

## Requisitos

- WordPress 6.0+
- PHP 7.4+

## Créditos

Fontes: [Montserrat](https://fonts.google.com/specimen/Montserrat) & [Lato](https://fonts.google.com/specimen/Lato) (Google Fonts)
Ícones: Lucide (SVG inline)
