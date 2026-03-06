# Tema Campanha Eleitoral - WordPress

## 📋 Descrição

Tema WordPress profissional para sites de campanhas eleitorais, inspirado no design do site de Fátima Gavioli. Com layout responsivo, seções dinâmicas e integração com posts e categorias do WordPress.

## 🎨 Características

- ✅ Design profissional e moderno
- ✅ Totalmente responsivo (mobile, tablet, desktop)
- ✅ 7 seções principais:
  - Hero com CTA
  - Propostas Impactantes
  - Perguntas Frequentes (FAQ com accordion)
  - Plano de Ação
  - Notícias da Campanha
  - Vozes/Testemunhos
  - Sobre e Contato

- ✅ Imagens com direitos livres (Unsplash, Pexels)
- ✅ Menu sticky com efeito scroll
- ✅ Formulário de contato
- ✅ Customizador WordPress para informações de contato
- ✅ Suporte a redes sociais

## 🚀 Começando

### 1. Instalação

1. Ative o tema em **Aparência → Temas**
2. Clique em "Ativar" no tema "Campanha Eleitoral"

### 2. Configuração Inicial

#### 2.1 Personalizar informações de contato

1. Vá em **Aparência → Personalizar**
2. Clique em **Informações de Contato**
3. Preencha:
   - Telefone
   - WhatsApp
   - Endereço
   - Horário de Atendimento
4. Clique em **Publicar**

#### 2.2 Logo do Site

1. Em **Personalizar**, clique em **Identidade do Site**
2. Clique em **Logo do Site**
3. Upload da sua imagem de logo
4. Publique

#### 2.3 Menu Principal

1. Vá em **Aparência → Menus**
2. Crie um novo menu (ex: "Menu Principal")
3. Adicione páginas/links
4. Em **Configurações do Menu**, marque **Menu Principal**
5. Salve

## 📝 Criando Conteúdo

### Categorias Obrigatórias

Crie as seguintes **Categorias** em **Posts → Categorias**:

1. **propostas** - Para posts da seção "Propostas Impactantes"
2. **faq** - Para perguntas frequentes
3. **plano-acao** - Para propostas do plano de ação
4. **noticias** - Para notícias da campanha
5. **vozes** - Para testemunhos e apoiadores

### Criando Posts

#### Proposta (na categoria "propostas")

```
Título: Saúde Pública de Qualidade
Categorias: propostas
Conteúdo: Descrição da proposta...
```

#### FAQ (na categoria "faq")

```
Título: Qual é sua principal proposta?
Categorias: faq
Conteúdo: Resposta em detalhes...
```

#### Plano de Ação (na categoria "plano-acao")

```
Título: Educação Forte
Categorias: plano-acao
Conteúdo: Descrição dos objetivos...
```

#### Notícia (na categoria "noticias")

```
Título: Grande evento em sua cidade
Categorias: noticias
Data: Será mostrada automaticamente
Conteúdo: Texto da notícia...
Imagem destaque: será exibida no card
```

#### Voz/Testemunho (na categoria "vozes")

```
Título: Ana Silva
Categorias: vozes
Conteúdo: Seu depoimento ou apoio...
Meta "profissão": Professora (opcional)
```

## 🖼️ Imagens

### Imagens Usadas (Direitos Livres)

- **Hero**: Unsplash - Política/Comunidade
- **Propostas**: Unsplash - Saúde, Educação, Segurança, Economia, Ambiente
- **Notícias**: Unsplash - Eventos/Assembleia
- **Vozes**: Pravatar - Avatares randômicos
- **Sobre**: Unsplash - Pessoa profissional

### Como Trocar Imagens

#### Arquivo Featured Image (Post Thumbnail)

1. Ao editar um post, clique em **Imagem Destaque**
2. Upload ou escolha da biblioteca
3. Salve o post

#### Imagens do Index.php

Se desejar customizar as URLs das imagens, edite o arquivo `index.php` e procure por:

```php
// Linha do hero
style="background-image: linear-gradient(...), url('SEU_URL_AQUI')"

// Array de imagens
$imagens_propostas = array(
    'https://seu-url-aqui',
    ...
);
```

## 🎯 Estrutura de Cores

- **Azul Primário**: #1e3c72
- **Azul Secundário**: #2a5298
- **Vermelho Acento**: #ff6b6b
- **Texto Escuro**: #2c3e50
- **Texto Claro**: #ecf0f1

Edite em `style.css` na seção `:root` para mudar cores globalmente.

## 📱 Layout Responsivo

- **Desktop**: 1200px max-width
- **Tablet**: 768px breakpoint
- **Mobile**: Responsivo desde 320px

## 🛠️ Custom Post Types (Opcional)

Se desejar usar estruturas mais avançadas, o tema suporta:

- `candidato` - Para perfil do candidato
- `evento` - Para agendar eventos
- `proposta` - Para propostas estruturadas
- `doacao` - Para registrar doações

Access em **Painel Administrativo** quando criados.

## 🔗 Redes Sociais

Configure no arquivo `footer.php` ou adicione via Customizer:

- Facebook
- Twitter
- Instagram
- YouTube
- WhatsApp

## 📧 Formulário de Contato

### Opção 1: Contact Form 7 (Recomendado)

1. Instale o plugin **Contact Form 7**
2. Crie um formulário
3. Note o ID do formulário
4. No `index.php`, substitua `id="1"` pelo seu ID:

```php
echo do_shortcode( '[contact-form-7 id="SEU_ID"]' );
```

### Opção 2: Formulário Padrão

O formulário padrão está incluso. Trate as submissões conforme necessário.

## 🚀 SEO

O tema inclui suporte para:

- Title tags dinâmicas
- Meta descriptions (com Yoast SEO ou similar)
- Open Graph (integração recomendada)
- Schema markup básico

## 📊 Scripts Inclusos

- `main.js` - Funcionalidades interativas
- FAQ Accordion
- Smooth Scroll
- Menu Mobile Toggle
- Lazy Load de imagens
- Validação de formulários

## ⚖️ Licença

GPL v2 ou posterior

## 🆘 Suporte

Para dúvidas ou problemas, consulte a documentação do WordPress ou contact desenvolvimento.

---

**Última atualização**: Março 2026
