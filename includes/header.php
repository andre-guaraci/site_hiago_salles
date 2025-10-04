<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Covil do Pai Hiago</title>
  <link rel="stylesheet" href="/style.css">
  <!-- Pixel de rastreamento -->
   <?php if ($_SERVER['HTTP_HOST'] === 'https://paihiagosalles.com.br/'): ?>
       <!-- Facebook Pixel -->
<script>
  !function(f,b,e,v,n,t,s){
    if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version="2.0";
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,"script",
    "https://connect.facebook.net/en_US/fbevents.js");
  fbq("init", "SEU_PIXEL_ID");
  fbq("track", "PageView");
</script>
<noscript>
  <img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=SEU_PIXEL_ID&ev=PageView&noscript=1"/>
</noscript>

<!-- Google Analytics (GA4) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=SEU_GA_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'SEU_GA_ID');
</script>
    <?php endif; ?> 
</head>
<body>
  <header class="header">
    <img src="/assets/img/logo.png" alt="Logo Tata Quimbanda" />
    <h1>Curso Premium de Quimbanda</h1>
  </header>
