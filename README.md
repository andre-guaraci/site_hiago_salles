# Projeto Tata de Quimbanda - Hiago Salles - Nganga Ngunjiletango

Landing page premium para curso de Quimbanda "Covil do pai Hiago"— Respeita a paleta de cores, requisitos de segurança, rastreamento de pixels e responsividade.

## Estrutura

- index.php: página principal
- style.css: estilos globais (cores/typografia/responsividade)
- includes/header.php e footer.php: componentes reutilizáveis
- config/: variáveis sensíveis (jamais subir chaves!)
- assets/: imagens, fontes, futuros vídeos

## Segurança

Nunca exponha tokens/API keys em arquivos públicos ou JS. Use variáveis de ambiente (.env/server).
